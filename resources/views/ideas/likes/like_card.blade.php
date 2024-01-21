@guest
    <a href={{ route('login') }} class="fw-light nav-link fs-6">
        <span class="fas fa-heart me-1"> </span> {{  $idea->likes()->count() }}
    </a>
@endguest
@auth
    @if (Auth::user()->likesIdea($idea))
        <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
            @csrf
            <button class="fw-light nav-link fs-6">
                <span class="fas fa-heart me-1"> </span> {{ $idea->likes()->count() }}
            </button>
        </form>
    @else
        <form action="{{ route('ideas.like', $idea->id) }}" method="post">
            @csrf
            <button class="fw-light nav-link fs-6">
                <span class="fas fa-heart me-1"> </span> {{ $idea->likes()->count() }}
            </button>
        </form>
    @endif
@endauth
