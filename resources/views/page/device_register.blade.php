@extends('test.template')

	<!-- start: CSS -->
@section('conten-body')	
                   <table class=" table striped hovered cell-hovered border bordered" data-role="datatable" data-auto-width="true" id="tabelDeviceRegister_id">
					   <thead>
						   <tr>
							   <th>id</th>
							   <th>register_label_</th>
							   <th>register_rtu_</th>
							   <th>register_tcp_</th>
							   <th>register_size_</th>
							   <th>register_multiply_</th>
							   <th>ACTION</th>
						   </tr>
					   </thead>
					   <tbody id="tasks-list" name="tasks-list">
						   @foreach($deviceRegisters as $deviceRegister)
						   <tr>
						      
							   <td>{{$deviceRegister->id}}</td>
							   <td>{{$deviceRegister->register_label_}}</td>
							   <td>{{$deviceRegister->register_rtu_}}</td>
							   <td>{{$deviceRegister->register_tcp_}}</td>
							   <td>{{$deviceRegister->register_size_}}</td>
							   <td>{{$deviceRegister->register_multiply_}}</td>
							   <td><button class="btn btn-info btn-xs btn-detail open-modal" value="{{$deviceRegister->id}}" >Edit</button></td>							   
						   </tr>
						   @endforeach
					   </tbody>
					   <tfoot> 
                    </table>
                    <form>
   
					   <!-- Modal (Pop up when detail button clicked) --> 
					   <div class="modal fade" id="myModal" name ="myModal">
						   <div class="modal-dialog">
							   <div class="modal-content">
								   <div class="modal-header">
									   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									   <h4 class="modal-title" id="myModalLabel">EDIT REGISTER</h4>
								   </div>
								   <div class="modal-body">

									   <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="" role ="form" >
 <fieldset>
										   <div class="form-group">
											   <label class="control-label col-sm-2">label_:</label>
											   <div class="col-sm-10">
												   <input type="text" class="form-control" id="id" name="idn" readonly="true" value="">
												    <input type="text" class="form-control" id="register_label_" name="register_label_"  value="">
											   </div>
										   </div>
								
										   <div class="form-group">
											   <label class="control-label col-sm-2">rtu_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_rtu_" name="register_rtu_n" placeholder="register_rtu_">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2" for="pwd">tcp_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_tcp_" name="register_tcp_n" placeholder="register_tcp_">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2" for="pwd">size_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_size_" name="register_size_n" placeholder="register_size_">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2" for="pwd">multiply_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_multiply_" name="register_multiply_n" placeholder="register_multiply_">
											   </div>
										   </div>
										 </div>
										  
										   <div class="modal-footer ">
									   <button type="submit" class="btn btn-primary" id="btn-save" name ="btn-saven" value="">Save changes</button>
                       </fieldset></form>
                      
								   </div>
							   </div>

						   </div>
						   </div>
						

					<meta name="csrf-token" content="{{ csrf_token() }}" />


			
@stop

@section('scripts') 
	<script type="text/javascript">
	var idtabel;
	var Valid;
	var Valregister_label_;
	var Valregister_rtu_;
	var Valegister_tcp_;
	var Valregister_size_; 
	var Valregister_mu;
	
		$(document).ready(function(){
			
			var dataSend=[];
						$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});  

			/** event modal on show*/
			$('#myModal').on('shown.bs.modal', function () {
 				$('#frmTasks').trigger("reset");
			
$("#btn-save").one('click', function(e) {
			        $.ajaxSetup({
			            headers: {
			                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			            }
			        })

			        e.preventDefault(); 

			        var formData = {
			            id: $('#id').val(),
			             register_label_: $('#register_label_').val(),
			              register_rtu_: $('#register_rtu_').val(),
			               register_tcp_: $('#register_tcp_').val(),
			                register_size_: $('#register_size_').val(),
			                 register_multiply_: $('#register_multiply_').val(),
			        }

			        //used to determine the http verb to use [add=POST], [update=PUT]
			        var state = $('#btn-save').val();
			          	  
			   
			        var id = $('#id').val();
			        var my_url = '{{url('device_register_edit2')}}';
					
			       

			        console.log(formData);

			        $.ajax({

			            type: "GET",
			            url: '{{url('device_register_edit2')}}'+'/'+id,
			            data: formData,
			            dataType: 'json',
			            success: function (data) {
			                console.log(data); 

			                $('#frmTasks').trigger("reset");

			                $('#myModal').modal('hide');
			                var link='{{url('/device_register')}}';
			              //  $( "#tabelDeviceRegister_id" ).load(link);
	var newTable = "<table>";
 newTable += "<tr>";
 newTable += "<td>New Content</td>";
 newTable += "</tr>";
 newTable += "</table>";

document.getElementById("tabelDeviceRegister_id").innerHTML = newTable;
alert(newTable);
			                // $( "#body" ).load(link);
			//                  $.get('{{url('/device_register')}}', function (data) {

 // });
			            },
			            error: function (data) {
			                console.log('Error:', data);
			            }
			        });
			    });

			});// end modal show

		







							// on close

						  $("#myModal").on('hidden.bs.modal', function(){
							$('#frmTasks').trigger("reset");
														
								
							//alert("Modal window has been completely closed.");
						}); // end modal close


						var url = '{{url('/device_register_edit')}}';
					
							// .. it exists
					   //display modal form for task editing


				 //   $('.open-modal').one('click', function(e) {
				 	 $('.open-modal').on('click', function(e) {
				        var id = $(this).val();

				        $.get(url + '/' + id, function (data) {
				            //success data
				            console.log(data);
				            dataSend=data;
				            $('#id').val(data.id);
				            $('#register_label_').val(data.register_label_);
				            $('#register_rtu_').val(data.register_rtu_);
				             $('#register_tcp_').val(data.register_tcp_);
							 $('#register_size_').val(data.register_size_);
				  			$('#register_multiply_').val(data.register_multiply_);
				             
				            $('#btn-save').val("update");

				           // $('#myModal').modal('show');
				           $('#myModal').appendTo('body').modal('show');


				        }) 
				    });
						
				
						//create new task / update existing task
					//	$('#frmTasks').on('click', '.btn-save',function (e) {
 

			
					});

	</script>	
@stop