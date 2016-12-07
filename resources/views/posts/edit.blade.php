@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des articles</div>
                    <div class="panel-body">
                        {!! Form::model(
                        $post,
                        array(
                        'route' => array('post.update', $post->id),
                       'method' => 'PUT'))
                        !!}

                        {!! Form::label('title', 'Titre') !!}

                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Écrivez votre Titre'] ) !!}
                        <br />
                        {!! Form::label('content', 'Contenu') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Écrivez votre Contenu'] ) !!}
                        <br />



                        {!! Form::submit('Publier',['class' => 'btn btn-info'] ) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection