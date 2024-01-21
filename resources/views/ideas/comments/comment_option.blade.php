@if (Auth::user()->name !== $comment->user->name)
@else
    @auth
        <form method="post" action={{ route('ideas.comments.destroy', $comment->id) }}>
            @csrf
            @method('delete')
            <button class="btn btn-dark btn-md fas fa-trash"></a>
        </form>
    @endauth
@endif
