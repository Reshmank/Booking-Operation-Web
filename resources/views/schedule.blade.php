@extends('layouts.app')

@section('title')
<title> Schedule</title>
@endsection

@section('content')


<div class="main">
  <h2>Shedule Theature Booking</h2>


  @role('admin')

  <div class="alert_message"></div>

  <form id="scheduleForm" method="post" enctype="multipart/form-data" autocomplete="off">
  {{csrf_field()}}
<div class="row">

	<div class="col-md-12">
		<div class="col-md-6">



			  <div class="form-group">
    <label for="room_name">Room Name</label>

     <select class="form-control" name="room_name" id="room_name" required aria-describedby="emailHelp" placeholder="Enter Room Name">
        <option value="">Select Room</option>
     	<option value="room1">Room-1</option>
     	<option value="room1">Room-2</option>
     	<option value="room1">Room-3</option>
     	<option value="room1">Room-4</option>
     	<option value="room1">Room-5</option>
     	<option value="room1">Room-6</option>
     	<option value="room1">Room-7</option>
     	<option value="room1">Room-8</option>


     </select>


    
   
  </div>

		</div>

		<div class="col-md-6">

			  <div class="form-group">
    <label for="schedule_time">Schedule Time</label>
      <input  class="form-control fc-datetimepicker" required name="schedule_time" id="schedule_time" data-max="100" data-min="0"  required placeholder="Schedule Time" type="datetime">
   
  </div>


		</div>

	</div>


	<div class="col-md-12">
		<div class="col-md-6">

	    <div class="form-group">
    <label for="room_name">Doctor Name</label>

     <select class="form-control" name="doctor" required id="doctor" aria-describedby="emailHelp" placeholder="Enter Room Name">
        <option value="">Select Doctor</option>

        @foreach($doctors as $key=>$value)

          <option value="{{ $key }}">{{ $value }}</option>

        @endforeach
     	
     	

     </select>


    
   
  </div>

		</div>

		<div class="col-md-6">

	    <div class="form-group">
    <label for="room_name">Patient Name</label>

     <select name="patient" class="form-control" required id="patient" aria-describedby="emailHelp" placeholder="Enter Room Name">
        <option value="">Select Patient</option>

        @foreach($patients as $key=>$value)

          <option value="{{ $key }}">{{ $value }}</option>

        @endforeach
     	
     	

     </select>


    
   
  </div>

		</div>

	</div>

	<div class="col-md-12">
		<div class="col-md-6">

				<button class="btn btn-success pd-x-20" id="savebtn" type="submit" name="savebtn"><i class="fas fa-check mr-2"></i>Save</button>
			

		</div>
	</div>


</div>

</form>

@endrole



   <hr>



    <div class="row">

        <div class="col-md-12">


        <table class="table text-md-nowrap key-buttons" width="100%" id="schedule-table">
                                <thead>
                                <tr>
                                    <th data-data="DT_RowIndex" data-orderable="false">#</th>
                                    <th data-data="room">Room</th>
                                    <th data-data="doctor">Doctor</th>
                                    <th data-data="schedule_time" >Schedule Time</th>
                                    <th data-data="action" data-orderable="false">Action</th>
                                </tr>
                                </thead>
                            </table>

            



        </div>
        

    </div>








</div>






@endsection


@section('script')
<script type="text/javascript">


	
$(document).ready(function(){

    callBackDataTablesSan('#schedule-table',"{{ route('get.getSchedule') }}",{dom:'Bflrtip'});
});


	 var today = new Date();
    $('#schedule_time').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose: true,
            startDate:today
        });



$('#scheduleForm').on('submit',(function(e) {
    e.preventDefault();
    null_flag=0;
    var msg="";

    
            $('#savebtn').prop("disabled", true);
                $.ajax({
                    url: '/addSchedule',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function (output)
                    {
                        
                        if(output=="success")
                        {

                        	$('.alert_message').html('<div class="alert alert-success" role="alert">Successfully added</div>');

                            
                                
                            
                        }
                       
                        else
                        {
                            // -------Handiling Validation Errors----------------------------
                            var msg=" ";
                            var count=1;
                            if(output=='failed'){
                                var msg="1 : Make Some Changes";
                            }
                            jQuery.each(output.errors, function(key, value){
                                msg+=count+" : "+value+"<br>";
                                count++;
                            });
                            notify("error",msg);
                            msg=" ";
                            count=1;

                            //---------------------------------------------------------------
                        }


                    },
                    error: function (output) {
                        console.log(output);
                       $.notify(output);
                    }
                });
                setTimeout(function () {
                    $('#savebtn').prop("disabled", false);
                }, 3000);

     


}));







	

</script>









@endsection