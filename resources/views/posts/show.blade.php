@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$post->title}}</div>
                    <div class="panel-body">
                        {{ $post->content }}

                        <br />
                        <strong>Auteur :{{ $post->user->name }}</strong>
                        <br />
                        <a href="{{ route('post.edit', $post->id) }}">Modifier</a>
                        <br>
                        {!! Form::model(
                       $post,
                       array(
                       'route' => array('post.destroy', $post->id),
                      'method' => 'DELETE'))
                       !!}

                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                        <br />
                        <strong><a style="color: firebrick" href="{{ route('post.index') }}">Retour aux articles</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection