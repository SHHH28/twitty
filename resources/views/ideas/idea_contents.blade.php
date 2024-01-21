@if ($editing ?? false)
    <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"> {{ $idea->content }} </textarea>
            @error('content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="sumbit" class="btn btn-dark btn-sm"> Update </button>
        </div>
    </form>
@else
    <p class="IdeaContent fs-6 fw-light text-muted">
        {!! nl2br(e($idea->content)) !!}
    </p>
@endif
<div class="d-flex">
    <div>
        @include('ideas.likes.like_card')
    </div>
    <div>
        @include('ideas.comments.comments_count')
    </div>
    <div>
        <span class="fs-6 fw-light text-muted ms-2"> <span class="fas fa-clock"> </span>
            {{ date_format($idea->created_at, 'm-d-Y') }}
        </span>
    </div>
</div>
