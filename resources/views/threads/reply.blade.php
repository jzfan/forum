<div class="panel panel-default">
    <div class="panel-heading">
        <a href='#'>
            {{ $reply->owner->name }} said
        </a>{{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>