<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0">
                        <span> {{ $user->name }} </span>
                    </h3>
                    @if (Auth::id() !== $user->id)
                    @else
                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    @endif
                </div>
            </div>
            <div>
                @auth
                    @if (Auth::id() === $user->id)
                        @if ($editing ?? false)
                            <button class="btn btn-dark btn-sm"> Save </button>
                            <a href="{{ route('profile') }}" class="btn btn-danger btn-sm"> <i class="fa fa-close"> </i></a>
                        @else
                            <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit"> </i></a>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('users.user_stat')
            @auth
                @if (Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm"> Unfollow </button>
                            </form>
                        @else
                            <form action="{{ route('users.follow', $user->id) }}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm"> Follow </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
