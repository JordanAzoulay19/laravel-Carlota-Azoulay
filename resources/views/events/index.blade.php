@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des évenements</div>
                    <div class="panel-body">
                        Afficher la liste des évenements
                        @foreach($events as $event)
                            <h1>{{$event->id}}</h1>
                            <a href="{{ route('events.show', $event->id) }}">
                                <h2 style="color: #00A8EF ">{{$event->title}}</h2>
                            </a>


                            <p style="color: darkred ">{{$event->content}}</p>
                        @endforeach
                        {{$events->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection