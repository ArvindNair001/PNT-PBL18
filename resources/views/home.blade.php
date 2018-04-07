@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="container">
                        <div class="form-group">
                                <div class="form-control" style="overflow: hidden;">
                                    <h4 style="float: left;">Apply for Job</h4>
                                    <a class="btn btn-primary btn-lg" style="float: right; " href="#" role="button">list available</a> 
                                </div>
                        </div>
                       <div class="form-group">
                           <div class="form-control" style="overflow: hidden;">
                               <h4 style="float: left;">Academic Data</h4>
                                <a class="btn btn-primary btn-lg" style="float: right;" href="/academics" role="button">Manage</a> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control" style="overflow: hidden;">
                                <h4 style="float: left;">Skills</h4>
                                    <a class="btn btn-primary btn-lg" style="float: right;" href="#" role="button">Manage</a> 
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
