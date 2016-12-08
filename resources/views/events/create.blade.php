@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un évenement</div>
                    <div class="panel-body">
                        {!! Form::open(array(
                        'route' => 'event.store',
                        'method' => 'POST')) !!}
                        {!! Form::label('title', 'Titre') !!}

                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Écrivez le nom de votre évènement'] ) !!}

                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Écrivez votre Description'] ) !!}

                        {!! Form::label('start', 'Debut') !!}

                        {!! Form::text('start', null, ['class' => 'form-control', 'placeholder' => 'Heure de début de l\'évènement'] ) !!}

                        {!! Form::label('finish', 'fin') !!}
                        {!! Form::text('finish', null, ['class' => 'form-control', 'placeholder' => 'Heure de fin de l\'évenement'] ) !!}

                        {!! Form::label('lieu', 'Lieu') !!}

                        {!! Form::text('lieu', null, ['class' => 'form-control', 'placeholder' => 'Le lieu de l\'évenement'] ) !!}

                        {!! Form::label('tarif', 'prix') !!}

                        {!! Form::text('tarif', null, ['class' => 'form-control', 'placeholder' => 'Tarif de l\'évenement'] ) !!}





                        {!! Form::submit('Publier',['class' => 'btn btn-info'] ) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection