@extends('layouts.app')

@section('content')
    {{-- <div class="form-group">
        {!! Form::open(['action' => 'StudentsController@addSkills', 'method' => 'POST']) !!}
            {{Form::label('std-requirement','Skills:')}}
            {{Form::textarea('std-requirement','',(['class' => 'form-control','placeholder' => 'Enter your skills seperated by comma(,)']))}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {{!! Form::close()!!}}
    </div> --}}
    <br>
<div class="container">

	<div id="login-form">
    <form method="post" action="{{ route('skills.add') }}" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Add your Skills</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            @csrf

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
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

            <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>

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
        $('#branch').on('change',function(){
            var dropdown = document.getElementById('branch');
            var choice = dropdown.options[dropdown.selectedIndex].value;
            console.log(choice);
            $.ajax({
                type: "get",
                url: "/fetchskills",
                data: {
                    branch: choice
                },
                success: function(data){
                    console.log('wow '+ data);
                    let newdata = JSON.parse(data);
                                
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
        }); 
    });
    
</script>
@endsection
