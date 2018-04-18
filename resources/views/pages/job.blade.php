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
                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                    <input type="number" name="jcriteria" step=0.01 class="form-control" placeholder="Minimum Criteria (0 for none)" />
                    </div>
                </div>    

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
                {{-- <input type="text" name="jbranch" class="form-control" placeholder="Job Requirements"/> --}}
                <select id="branch" name="jbranch" >
                    <option selected disabled >Select the Branch ...</option>
                    <option value="Computer">Computer</option>
                    <option value="IT">IT</option>
                    <option value="Electronics">Electronics</option>
                    <option value="EXTC">Electronics and Telecomm.</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Auto">Automobile</option>
                  </select> 
              </div>  
            </div>

            {{-- <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
                <input type="text" name="jrequirements" class="form-control" placeholder="Job Requirements"/>
              </div>  
            </div> --}}

            <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>

                    {{-- <div class="check_skills">

                    </div> --}}

                    {{-- <input type="text" name="jrequirements" class="form-control" placeholder="Job Requirements"/> --}}

                    <div id="cblist">
                        <input type="checkbox" value="first checkbox" id="cb1" hidden /> <label for="cb1" hidden>first checkbox</label>
                    </div>
                  </div>  
            </div>
            
            
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">Add Job</button>
            </div>
            
        </div>
    </form>
    </div>
</div>
@endsection


@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        console.log('Hello World');
        $('#branch').on('change',function(){
            var dropdown = document.getElementById('branch');
            var choice = dropdown.options[dropdown.selectedIndex].value;
            console.log(choice);
            // $.get('/fetchskills',function(data){
            //     console.log(data);
            // });

            $.ajax({
                type: "get",
                url: "/fetchskills",
                data: {
                    branch: choice
                },
                success: function(data){
                    console.log('wow '+ data);
                    // console.log(JSON.parse(data));
                    let newdata = JSON.parse(data);
                    // console.log(newdata);
                    
                    //clear DOM inside cblist
                    // let element = $('#cblist');
                                
                    for(i=0; i<newdata.length;i++){
                        // console.log(i);
                        console.log(newdata[i].skill);
                        console.log(newdata[i].id);
                        addCheckbox(newdata[i].skill,newdata[i].id)
                        
                    }
                },
                error: function(err){
                    console.log(err);
                }
            });
            function addCheckbox(name,id) {
                var container = $('#cblist');
                var inputs = container.find('input');
                var eleid = inputs.length+1;

                $('<input />', { type: 'checkbox', id: 'cb'+eleid, value:id, name:'skills[]' }).appendTo(container);
                $('<label />', { 'for': 'cb'+eleid, text: name }).appendTo(container);
                $('<br\>').appendTo(container);
            }
            // $.ajax({
            //           type: "GET",
            //           url: "jobs/fetchskills",
            //           processData: false,
            //           contentType: "text",
            //           data: ' ',
            //           success: function(resp) {
            //                   console.log(resp)
            //           },
            //           error: function(err) {
            //               console.log(err);
            //           }
            // });

        }); 
    });
    
</script>
@endsection









{{-- <?php
if(isset($_REQUEST['jtitle'])){
    $name = $_SESSION['username'];
    $cname = $_REQUEST['jtitle'];
    $cdetails = $_REQUEST['jdescription'];
    //$cemail = $_REQUEST['jvacancy'];
    //$clocation = $_REQUEST['jrequirements'];

    $query = "INSERT into jobs(`job_title`, `job_description`, `job_vacancy`, `job_requirements`,`job_added_by`) VALUES('$cname','$cdetails','$cemail','$clocation','$name')";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    header("Location: addjobs.php?msg=add_success");
}
?> --}}