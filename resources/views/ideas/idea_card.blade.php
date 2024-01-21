@guest
    <div class="mb-3">
@endguest
@auth
    <div class="">
@endauth
        <div class="card">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                            src="{{ $idea->user->getImageURL() }}" alt="{{ $idea->user->name }}">
                        <div>
                            @if(Auth::id() !== $idea->user ->id)
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('users.show', $idea->user->id) }}"> {{ $idea->user->name }} </a>
                                </h5>
                            @else
                                <h5 class="card-title mb-0">
                                    <span> {{ $idea->user->name }} </span>
                                </h5>
                            @endif
                        </div>
                    </div>
                    @include('ideas.idea_option')
                </div>
            </div>
            <div class="card-body">
                @include('ideas.idea_contents')
                @include('ideas.comments.comment')
            </div>
        </div>
    </div>
