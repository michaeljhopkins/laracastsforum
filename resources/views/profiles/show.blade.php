@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        {{ $profileUser->name }}
                        <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                    </h1>
                </div>
                @foreach($activities as $date => $activity)
                    <div class="page-header">
                        <h3>{{$date}}</h3>
                    </div>
                    @foreach($activity as $a)
                        @include("profiles.activities.$a->type")
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection