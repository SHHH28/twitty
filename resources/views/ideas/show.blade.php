@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_nav')
        </div>
        <div class="col-6">
            {{-- @include('shared.error') --}}
            {{-- @include('shared.success')   --}}
            @include('ideas.idea_card')
        </div>
        <div class="col-3">
                @include('ideas.search')
                @include('shared.who_to_follow')
        </div>
    </div>
@endsection
