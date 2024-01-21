@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_nav')
        </div>
        <div class="col-6">
            @include('shared.user_edit')
            <hr>
            @forelse ($ideas as $idea)
                @include('shared.idea_card')
            @empty
                <p class="text-center">No Results Found!</p>
            @endforelse
        </div>
        <div class="col-3">
            @include('shared.search')
            @include('shared.who_to_follow')
        </div>
    </div>
@endsection
