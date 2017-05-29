@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Thread</div>

                    <div class="panel-body">
                        <form action="/threads" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="channel_id">Channel:</label>
                                <select name="channel_id" id="channel_id" class="form-control">
                                    <option value="">Choose One</option>
                                    @foreach(\Forum\Channel::all() as $c)
                                        <option value="{{$c->id}}" {{old('channel_id') == $c->id ? 'selected' : '' }}>
                                            {{$c->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{old('title')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Body:</label>
                                <textarea class="form-control" id="body" name="body" placeholder="title" rows="8" required>{{old('body')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $e)
                                        <li>{{$e}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
