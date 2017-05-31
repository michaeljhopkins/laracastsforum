@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} replied to
        <a href="{{$a->subject->thread->path()}}">{{$a->subject->thread->title}}</a>
    @endslot

    @slot('body')
        {{ $a->subject->body }}
    @endslot
@endcomponent