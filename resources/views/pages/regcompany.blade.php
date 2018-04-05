@extends('layouts.app')

@section('content')
    <div class="container">
    </br>
        <h1>Company Registration</h1>
        {!! Form::open() !!}
            <div class="form-group">
                {{Form::label('title', 'Name')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Company Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('email','Email Address')}}
                {{Form::email('email','',['class'=>'form-control', 'placeholder'=>'email@company'])}}
            </div>
            <div class="form-group">
                    {{Form::label('location','Location')}}
                    {{Form::text('location','',['class'=> 'form-control', 'placeholder'=>'Company Location'])}}
            </div>
            <div class="form-group">
                    {{Form::label('contact','Contact')}}
                    {{Form::text('contact','',['class'=> 'form-control', 'placeholder'=>'Company Number'])}}
                </div>
            <div class="form-group">
                {{Form::label('body', 'Description')}}
                {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Company Details'])}}
            </div>
           
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection


