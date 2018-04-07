@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="form-group">
                    <div class="form-control" style="overflow: hidden;">
                        <h4 style="float: left;">Marsheets</h4>
                        <a class="btn btn-primary btn-lg" style="float: right; " href="/upload" role="button">Upload</a> 
                    </div>
            </div>
                {!! Form::open(['action' => 'UploadController@semester', 'method' => 'POST']) !!}
                <div class="form-group">
                        <div class="form-control">
                                {{Form::label('cur_sem','Current SEM')}}                    
                                {{ Form::select('cur_sem', array(
                                    'SE' => array(4 => 'SEM 4'),
                                    'TE' => array(5 => 'SEM 5', 6 => 'SEM 6'),
                                    'BE' => array(7 => 'SEM 7', 8 => 'SEM 8'),
                                    ))}}
                        </div>
                    </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
                </div>
        <div class="form-group">
            <div class="form-control" style="overflow: hidden;">
                <h4 style="float: left;">Marks</h4>
                <a class="btn btn-primary btn-lg" style="float: right;" href="/academics/marks" role="button">Enter</a> 
            </div>
        </div>
    </div>
@endsection