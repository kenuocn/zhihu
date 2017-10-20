@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$question->title}}</div>
                    <div class="panel_heading">
                        <div class="topics">
                            @foreach($question->topics as $topic)
                                <a href=" /topic/{{$topic->id}}" class="TopicLink"><span class="topics">{{$topic->name}}</span></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="panel-body">
                       {!! $question->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
