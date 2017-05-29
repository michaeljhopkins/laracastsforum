<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="{{ $thread->path().'/replies' }}">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" id="body" class="form-control" placeholder="Have soemthing to say?" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Post</button>
        </form>
    </div>
</div>