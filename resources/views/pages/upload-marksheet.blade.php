@extends('layouts.app')
@section('content')
    <div class="container">
    </br>
        <h1>Upload your Marksheets</h1>
        {!! Form::open(['action'=>'UploadController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <div class="form-control">
                    <h4>Resume</h4>   
                    {{-- {{Form::label('resume','Resume:')}} --}}
                    {{Form::file('resume')}}    
                </div>
            </div>

           
            

            <div class="form-group">
                <div class="form-control">
                    {{-- {{Form::label('marks-12','12th Marksheet:')}} --}}
                    <h4>12th Marksheet</h4>
                    {{Form::file('marks-12')}}    
                </div>
            </div>

            <div class="form-group">

                <div class="form-control">
                    <h4>10th Marksheet</h4>
                    {{-- {{Form::label('marks-10','10th Marksheet')}} --}}
                    {{Form::file('marks-10')}} 
                </div>
            </div>

            {{-- @for($i=0;$i<$cur_sem;$i++)
                <div class="form-group">
                    {{Form::file('sem-'+$i)}}

                </div>
            @endfor --}}
            
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection

