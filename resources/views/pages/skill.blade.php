@extends('layouts.app')

@section('content')
    <div class="form-group">
        {!! Form::open(['action' => 'StudentsController@addSkills', 'method' => 'POST']) !!}
            {{Form::label('std-requirement','Skills:')}}
            {{Form::textarea('std-requirement','',(['class' => 'form-control','placeholder' => 'Enter your skills seperated by comma(,)']))}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {{!! Form::close()!!}}
    </div>
@endsection