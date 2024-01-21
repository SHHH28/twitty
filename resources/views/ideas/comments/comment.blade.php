<div>
    @auth
        <form action={{ route('ideas.comments.create', $idea->id) }} method="post">
            @csrf
            <div class="mb-3">
                <textarea name="comment_content" class="fs-6 form-control" rows="1"></textarea>
                @error('comment_content')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary btn-sm"> Post Comment </button>
            </div>
        </form>
    @endauth
    <hr>
    @forelse ($idea->comments as $comment)
        @include('ideas.comments.comment_card')
    @empty
        <p class="text-center">No Comments Found!</p>
    @endforelse
</div>
