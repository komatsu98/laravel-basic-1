<li class="list-group-item">
    <strong>
        {{ $comment->created_at->diffForHumans() }} &nbsp;
    </strong>
    {{ $comment->body }}
</li>
