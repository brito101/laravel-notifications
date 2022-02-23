@extends('layouts.app')

@section('content')
    <h1>Listagem de Posts</h1>
    @forelse ($posts as $post)
        {{ $post->title }}
        <hr>
    @empty
        <p>Nenhum post cadastrado!</p>
    @endforelse

    {{ $posts->links() }}
@endsection
