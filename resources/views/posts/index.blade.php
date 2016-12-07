@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des articles</div>
                    <div class="panel-body">
                        Afficher la liste des articles
                        @foreach($posts as $post)
                            <h1>{{$post->id}}</h1>
                            <a href="{{ route('post.show', $post->id) }}">
                                <h2 style="color: #00A8EF ">{{$post->title}}</h2>
                            </a>


                            <p style="color: darkred ">{{$post->content}}</p>
                        @endforeach
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection