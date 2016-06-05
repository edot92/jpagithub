@extends('test.template')
@section('conten-body')
<h5> USER PAGE </h5>
 <td><button class="btn btn-info btn-xs btn-detail open-modalAddNew" value="" >ADD NEW</button></td>
  <table class="auto-size  table striped hovered cell-hovered border bordered" data-role="datatable" data-auto-width="true">
					   
					   <thead>
						   <tr>
							   <th>USERNAME</th>
							   <th>EMAIL</th>
							   <th>ROLE</th>
							   <th>ACTION</th>
						   </tr>
					   </thead>
					   <tbody>
						   @foreach($users as $user)
						   <tr>						      							  
							   <td>{{$user->name}}</td>
							   <td>{{$user->email}}</td>
							    @if($user->admin=="0")
							    <td>ADMIN</td>
								@elseif($user->admin=="1")
								<td>USER</td>
								@endif
									
							   <td><button class="btn btn-info btn-xs btn-detail open-modalUserEdit" value="{{$user->id}}" >EDIT</button>
							   <button class="btn btn-info btn-xs btn-detail open-UserDelete" value="{{$user->id}}" id="{{$user->id}}" name="{{$user->id}}">DELETE</button></td>							   
						   </tr>
						   @endforeach
					   </tbody>
					   <tfoot> 
                    </table>
					   <!-- Modal (Pop up when detail button clicked) --> 
					   <div class="modal fade" id="myModalUser" name ="myModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						   <div class="modal-dialog">
							   <div class="modal-content">
								   <div class="modal-header">
									   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									   <h4 class="modal-title" id="myModalLabel">EDIT USER</h4>
								   </div>
								   <br>
								   <div class="modal-body">
									
									   <form id="formUser" name="formUser" class="form-horizontal" novalidate="" role ="form">
										   <div class="form-group">
											   <label class="control-label col-sm-2">name</label>
											   <div class="col-sm-10">
												   <input type="text" class="form-control" id="userName" name="userName"  placeholder="user name">
											   </div>
										   </div>
								
										   <div class="form-group">
											   <label class="control-label col-sm-2">email</label>
											   <div class="col-sm-10"> 
												   <input type="email" class="form-control" id="userEmail"  name ="userEmail" placeholder="userEmail">
											   </div>
										   </div>
										   <div class="form-group">
											   <label class="control-label col-sm-2">role</label>
											   <div class="col-sm-10"> 
												  <select class="col-sm-4" name="userAdmin" id="userAdmin" name="" >
                                    <option value="1">User</option>
                                    <option value="0">Admin</option>
                                </select> 
											   </div>
										   </div>
			
										   
									   </form>
								   </div>
								   <div class="modal-footer ">
									   <button type="button" class="btn btn-primary" id="btn-saveUser" value="update">Save changes</button>
									   <input type="hidden" id="idUser" name="idUser" value="0">
								   </div>
							   </div>
						   </div>
						   </div>
						

						<meta name="_token" content="{!! csrf_token() !!}" />


@stop

@section('scripts') 
<script type="text/javascript" src="js/bootbox.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
		});  


			var url = '{{url('/user')}}';
					
		 	 $('.open-modalUserEdit').on('click', function(e) {
				        var id = $(this).val();

				        $.get(url + '/' + id, function (data) {
				            //success data
				            console.log(data);
				            dataSend=data;
				            $('#idUser').val(data.id);
				            $('#userName').val(data.name);
				            $('#userEmail').val(data.email);
				             $('#userAdmin').val(data.admin);
				             document.getElementById('myModalLabel').innerHTML="Edit User";
				            $('#btn-saveUser').val("update");

				           // $('#myModal').modal('show');
				           $('#myModalUser').appendTo('body').modal('show');


				        }) 
				    });
			
					}); // end show user edit

		 $('.open-modalAddNew').on('click', function(e) {
				        var id = $(this).val();
				        $('#formUser').trigger("reset");
				          $('#btn-saveUser').val("insert");
				          document.getElementById('myModalLabel').innerHTML="Add User";
				           $('#myModalUser').appendTo('body').modal('show');				   			
					}); // end show user edit

/**start button save**/
$("#btn-saveUser").one('click', function(e) {
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })

  e.preventDefault();

var status_ =$('#btn-saveUser').val();
  var formData = {
 
idUser: $('#idUser').val(),
userName: $('#userName').val(),
userEmail: $('#userEmail').val(),
userAdmin: $('#userAdmin').val(),

  }


  var id = $('#idUser').val();
 // var my_url = '{{url('useredit/{id}')}}';



  console.log(formData);
//alert(status_);
	var url_;
	if(status_=="update"){
	url_='{{url('useredit')}}'+ '/' + id;	

	}else if(status_=="insert"){
	url_='{{url('userinsert')}}';
	}

  $.ajax({

type: "GET",
url: url_,
data: formData,
dataType: 'json',
success: function (data) {
      console.log(data);

     
      $('#myModal').modal('hide');
      var link = '{{url(' / device_register')}}';
      //  $( "#tabelDeviceRegister_id" ).load(link);
      var newTable = "<table>";
      newTable += "<tr>";
      newTable += "<td>New Content</td>";
      newTable += "</tr>";
      newTable += "</table>";
      
     /* if(data=="ok"){
      	alert("sukses");
      }else{
      	alert("failed");
      }*/
       $('#formUser').trigger("reset");

       location.reload();

    },
error: function (data) {
	alert(('Error:', data));
      console.log('Error:', data);
       $('#formUser').trigger("reset");

    }
  });
}); /**start button save**/


// delete confirmation
 $('.open-UserDelete').on('click', function(e) {
   var txt;
    var r = confirm("anda yakin menghapus");
    if (r == true) {
        txt = "You pressed OK!";
          var id = $(this).val();
    	 //alert(txt+" "+id);
    	 
    } else {
        txt = "You pressed Cancel!";
    }
    
 	});
 /**
 * This tiny script just helps us demonstrate
 * what the various example callbacks are doing
 */


	</script>
@stop
