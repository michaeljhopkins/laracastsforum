@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{$a->subject->favorited->path()}}">
            {{ $profileUser->name }} favorited a reply
        </a>
    @endslot

    @slot('body')
        {{ $a->subject->favorited->body }}
    @endslot
@endcomponent