@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$event->title}}</div>
                    <div class="panel-body">
                        {{ $event->content }}

                        <br />
                        <strong>Auteur :{{ $event->user->name }}</strong>
                        <br />
                        <a href="{{ route('post.edit', $event->id) }}">Modifier</a>
                        <br>
                        {!! Form::model(
                       $event,
                       array(
                       'route' => array('event.destroy', $event->id),
                      'method' => 'DELETE'))
                       !!}

                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                        <br />
                        <strong><a style="color: firebrick" href="{{ route('event.index') }}">Retour aux articles</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection