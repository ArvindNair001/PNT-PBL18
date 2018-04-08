@extends('layouts.app')

@section('content')
<br>
<div class="container">

	<div id="login-form">
    <form method="post" action="{{ route('job.submit') }}" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Add Job</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            @csrf
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="jtitle" class="form-control" placeholder="Job Title" value="" />
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="jdescription" class="form-control" placeholder="Job Description" value=""/>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
            	<input type="number" name="jvacancy" class="form-control" placeholder="Job Vacancy" />
                </div>
                
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
                <input type="text" name="jrequirements" class="form-control" placeholder="Job Requirements"/>
                </div>
                
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Add Job</button>
            </div>
            
        </div>
    </form>
    </div>
</div>
@endsection



{{-- <?php
if(isset($_REQUEST['jtitle'])){
    $name = $_SESSION['username'];
    $cname = $_REQUEST['jtitle'];
    $cdetails = $_REQUEST['jdescription'];
    $cemail = $_REQUEST['jvacancy'];
    $clocation = $_REQUEST['jrequirements'];

    $query = "INSERT into jobs(`job_title`, `job_description`, `job_vacancy`, `job_requirements`,`job_added_by`) VALUES('$cname','$cdetails','$cemail','$clocation','$name')";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    header("Location: addjobs.php?msg=add_success");
}
?> --}}