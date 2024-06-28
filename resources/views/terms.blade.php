@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms : </h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nesciunt id vitae qui laboriosam deleniti
                laudantium
                illum officia, modi amet nihil. Quisquam quo, reiciendis non autem unde ut sequi voluptatum?</p>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
