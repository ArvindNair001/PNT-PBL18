@extends('layouts.app')

@section('content')
    //content
    <div class="container">
        <div class="login-form">
                {{-- <form method="post" action="{{ route('jobs.apply') }}" autocomplete="off" > --}}
                        {{-- <form method="post" action="#" autocomplete="off" > --}}
            <div class="form-group">
                <button type="submit" id="check" class="btn btn-primary" name="btn-signup">Check for jobs</button>
             </div>
            {{-- </form> --}}
        </div>
    </div>
    
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        console.log('Hello Students');
        $('#check').on('click',function(){
            console.log('analyze pressed...')
            $.ajax({
                type: 'get',
                url: '/fetchJobs',
                processData: false,
                data: { },
                success: function(data){
                    console.log(data);
                    // $(document).createElement('table');
                    var newdata = JSON.parse(data);
                   console.log(newdata);
                   for(i=1; i<newdata[1].length;i++){
                        console.log(newdata[i]);
                        console.log(newdata[1][i].branch);
                        console.log(newdata[1][i].id);
                        // addCheckbox(newdata[i].skill,newdata[i].id)
                        
                    }
                },
                error: function(err){
                    console.log(err);
                }

            });
        });
    });
</script>
@endsection