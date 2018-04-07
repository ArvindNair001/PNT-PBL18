@extends('layouts.app')

@section('content')
    <div class="container">
    </br>
        <h1>Company Registration</h1>
        {!! Form::open(['action' => 'CompanyController@register', 'method' => 'POST']) !!}
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
                    {{Form::number('contact','',['class'=> 'form-control', 'placeholder'=>'Company Number'])}}
                </div>
            <div class="form-group">
                {{Form::label('body', 'Description')}}
                {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Company Details'])}}
            </div>
           
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection

{{-- 
<script>
        $(document).ready(function() {
            $(document).on('company-regform', '#reg-form', function(e) {
             var data = $("#reg-form").serialize();
             e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{url("/getContact")}}',
                    data: data,
                    success: function(data) {
                     alert("success");
                     console.log(data);
     
                    },
                    error: function(data) {
                        alert("error");
                    }
                });
                return false;
            });
        });
</script> --}}