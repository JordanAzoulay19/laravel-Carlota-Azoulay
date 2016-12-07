@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un article</div>
                    <div class="panel-body">
                        {!! Form::model(
                        $events,
                        array(
                        'route' => array('event.update', $events->id),
                       'method' => 'PUT'))
                        !!}
                        {!! Form::label('title', 'Titre') !!}

                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Écrivez votre Titre'] ) !!}
                        <br />
                        {!! Form::label('content', 'Contenu') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Écrivez votre Description'] ) !!}
                        <br />
                        {!! Form::label('datefirst', 'Debut') !!}

                        {!! Form::text('datefirst', null, ['class' => 'form-control', 'placeholder' => 'Début de l\'évènement'] ) !!}
                        <br />
                        {!! Form::label('dateend', 'fin') !!}
                        {!! Form::textarea('dateend', null, ['class' => 'form-control', 'placeholder' => 'Fin de l\'évenement'] ) !!}
                        <br />
                        {!! Form::label('place', 'Lieu') !!}

                        {!! Form::text('place', null, ['class' => 'form-control', 'placeholder' => 'Le lieu de l\'évenement'] ) !!}
                        <br />
                        {!! Form::label('price', 'prix') !!}

                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Prix de l\'évenement'] ) !!}
                        <br />




                        {!! Form::submit('Publier',['class' => 'btn btn-info'] ) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection