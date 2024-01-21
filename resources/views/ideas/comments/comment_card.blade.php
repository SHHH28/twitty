<div class="d-flex align-items-start">
    <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
        alt="{{ $comment->user->name }}">
    <div class="w-100">
        <div class="d-flex justify-content-between">
            @if (Auth::id() !== $comment->user->id)
                <h5 class="card-title mb-0">
                    <a href="{{ route('users.show', $comment->user->id) }}"> {{ $comment->user->name }} </a>
                </h5>
            @else
                <h5 class="card-title mb-0">
                    <span> {{ $comment->user->name }} </span>
                </h5>
            @endif
            <small class="fs-6 fw-light text-muted">
                @if (now()->diffInHours($comment->created_at) < 1)
                    {{ now()->diffInMinutes($comment->created_at) }} minutes ago
                @elseif(now()->diffInHours($comment->created_at) > 24)
                    {{ now()->diffInDays($comment->created_at) }} days ago
                @else
                    {{ now()->diffInHours($comment->created_at) }} hours ago
                @endif
            </small>
            {{-- @include('ideas.comments.comment_option') --}}
        </div>
        <p class="fs-6 mt-3 fw-light">
            {!! nl2br(e($comment->content)) !!}
        </p>
        <hr>
    </div>
</div>
