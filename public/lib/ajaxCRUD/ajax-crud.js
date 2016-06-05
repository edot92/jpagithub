	$(document).ready(function(){
						
						var url = {{url('/device_register_edit')}};
					
							// .. it exists
						
						
						//display modal form for task editing
						$('.open-modal').click(function(){
							var task_id = $(this).val();		
							
							
							$.get(url + '/' + task_id, function (data) {
								//success data
								
								$('#id').val(data.id);
								$('#register_label_').val(data.register_label_);
								$('#register_rtu_').val(data.register_rtu_);
								$('#register_tcp_').val(data.register_tcp_);
								$('#register_size_').val(data.register_size_);
								$('#register_multiply_').val(data.register_multiply_);
								$('#btn-save').val("update");
								//$('#myModal').modal('show');
								$('#myModal').appendTo("body").modal('show');
								
							}) 
						});
						
						/*
						
						//create new task / update existing task
						$("#btn-save").click(function (e) {
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
								}
							})
							
							e.preventDefault(); 
							
							var formData = {
								task: $('#task').val(),
								description: $('#description').val(),
							}
							
							//used to determine the http verb to use [add=POST], [update=PUT]
							var state = $('#btn-save').val();
							
							var type = "POST"; //for creating new resource
							var task_id = $('#task_id').val();;
							var my_url = url;
							
							if (state == "update"){
								type = "PUT"; //for updating existing resource
								my_url += '/' + task_id;
							}
							
							console.log(formData);
							
							$.ajax({
								
								type: type,
								url: my_url,
								data: formData,
								dataType: 'json',
								success: function (data) {
									console.log(data);
									
									var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
									task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
									task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';
									
									if (state == "add"){ //if user added a new record
										$('#tasks-list').append(task);
										}else{ //if user updated an existing record
										
										$("#task" + task_id).replaceWith( task );
									}
									
									$('#frmTasks').trigger("reset");
									
									$('#myModal').modal('hide')
								},
								error: function (data) {
									console.log('Error:', data);
								}
							});
						});*/
					});