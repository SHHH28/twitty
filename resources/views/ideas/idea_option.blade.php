<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="options" data-bs-toggle="dropdown"
        aria-expanded="false">
    </button>
    <ul class="dropdown-menu" aria-labelledby="options">
        @auth
            @if (Auth::user()->name !== $idea->user->name)
                <li>
                    <a class="dropdown-item" href="{{ route('ideas.show', $idea->id) }}">
                        view
                    </a>
                </li>
            @else
                <form method="post" action={{ route('ideas.destroy', $idea->id) }}>
                    @csrf
                    @method('delete')
                    <li>
                        <a class="dropdown-item" href="{{ route('ideas.edit', $idea->id) }}">
                            edit
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('ideas.show', $idea->id) }}">
                            view
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item">delete</a>
                    </li>
                </form>
            @endif
        @endauth
        @guest
            <li>
                <a class="dropdown-item" href="{{ route('ideas.show', $idea->id) }}">
                    view
                </a>
            </li>
        @endguest
    </ul>
</div>
