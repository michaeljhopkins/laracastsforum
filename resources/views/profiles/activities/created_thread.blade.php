@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} published
        <a href="{{$a->subject->path()}}">{{$a->subject->title}}</a>
    @endslot
    @slot('body')
        {{ $a->subject->body }}
    @endslot
@endcomponent