<hr>
@auth
    <form action="" method="post" class="form">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <input type="text" name="title" placeholder="Título" class="form-control bg-white">
        </div>
        <div class="form-group">
            <textarea name="body" cols="30" rows="5" placeholder="Comentário" class="form-control my-2 bg-white"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
@else
    <p>Para comentar é preciso estar logado. <a href="{{ route('login') }}">Clique aqui para logar</a></p>
@endauth
