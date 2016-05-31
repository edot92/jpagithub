@extends('test.template')

	<!-- start: CSS -->
@section('conten-body')	
                   <table class="auto-size  table striped hovered cell-hovered border bordered" data-role="datatable" data-auto-width="true">
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
					   <tbody>
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
					   <!-- Modal (Pop up when detail button clicked) --> 
					   <div class="modal fade" id="myModal" name ="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						   <div class="modal-dialog">
							   <div class="modal-content">
								   <div class="modal-header">
									   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									   <h4 class="modal-title" id="myModalLabel">EDIT REGISTER</h4>
								   </div>
								   <div class="modal-body">
									   <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="" role ="form">
										   <div class="form-group">
											   <label class="control-label col-sm-2">label_:</label>
											   <div class="col-sm-10">
												   <input type="text" class="form-control" id="register_label_" name="register_label_" readonly="true" value="">
											   </div>
										   </div>
								
										   <div class="form-group">
											   <label class="control-label col-sm-2">rtu_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_rtu_" placeholder="register_rtu_">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2" for="pwd">tcp_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_tcp_" placeholder="register_tcp_">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2" for="pwd">size_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_size_" placeholder="register_size_">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2" for="pwd">multiply_:</label>
											   <div class="col-sm-10"> 
												   <input type="number" class="form-control" id="register_multiply_" placeholder="register_multiply_">
											   </div>
										   </div>
										   
									   </form>
								   </div>
								   <div class="modal-footer ">
									   <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
									   <input type="hidden" id="id" name="id" value="0">
								   </div>
							   </div>
						   </div>
						   </div>
						

						<meta name="_token" content="{!! csrf_token() !!}" />
					  
			
@stop