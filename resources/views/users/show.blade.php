@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_nav')
        </div>
        <div class="col-6">
            @include('shared.success')
            @include('users.user_card')
            <hr>
            @forelse ($ideas as $idea)
                @include('ideas.idea_card')
            @empty
                <p class="text-center">No Results Found!</p>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('ideas.search')
            @include('shared.who_to_follow')
        </div>
    </div>
@endsection
