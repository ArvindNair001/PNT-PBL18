<?php 
    if(isset($_GET['sem'])){
        $cur = $_GET['sem'];
    }
?>
@extends('layouts.app')

@section('content')


{!! Form::open(['action' => 'UploadController@addmarks', 'method' => 'POST']) !!}
    @for($i=1;$i<=$cur;$i++)
        <div class="form-group col-sm-3">
            <div class="form-control"> 
                {{Form::label("sem-$i", "SEM-$i")}}
                {{Form::number("sem-$i", '', ['step' => 0.01, 'placeholder' => "SEM - $i"])}}
            </div>
        </div>
    @endfor
    {{Form::hidden('sem-value',$cur)}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
{{-- <div class="container">
    </br>
        <h1>Enter Your Makrs</h1>
        {!! Form::open() !!}            
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
    </div> --}}
@endsection