@forelse ($blog->comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $comment->user->name }} says...

            <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
        </div>

        <div class="panel-body">
            <p>{{ $comment->body }}</p>
        </div>
    </div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">Não encontrado!!</div>

        <div class="panel-body">
            <p>Desculpe! Nenhum comentário encontrado para esta postagem.</p>
        </div>
    </div>
@endforelse
