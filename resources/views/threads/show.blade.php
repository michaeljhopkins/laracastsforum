@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{$thread->creator->name}}</a> posted:
                        {{ $thread->title }}
                    </div>
                    <div class="panel-body">
                        <div class="body">
                            {{ $thread->body }}
                        </div>
                    </div>
                </div>
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach
                {{ $replies->links() }}
                @if(auth()->check())
                    @include('partials.addReply')
                @else
                    <p class="text-center">Please <a href="{{route('login')}}">sign in</a></p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->creator->name }}</a>,
                            and currently has {{ $thread->replies_count }} {{str_plural('comment',$thread->replies_count)}}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection