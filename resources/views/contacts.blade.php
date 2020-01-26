@extends('layouts.base-layout')

@section('content')
  <div class="content">
      <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


      	   
        <div class="container-fluid">

 <div class="row">
               <div class="col-sm-12 col-md-3">
                  <button  type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addContact"> <i class="material-icons">person</i> &nbsp; Add New Contact</button>
               </div>
              

                <div class="col-sm-12 col-md-3"> 
                  <button class="btn btn-success  btn-block" type="button" data-target="#importExcel" data-toggle="modal"><i class="material-icons">content_paste</i> &nbsp; Import Excel</button>
                </div>

                <div class="col-sm-12 col-md-3">
                            <a href="../assets/files/sample_contact.xlsx" download class="btn btn-info btn-block"><i class="material-icons">library_books</i> &nbsp; Sample file</a>
                </div>

                <div class="col-sm-12 col-md-3">
                  <button class="btn btn-primary btn-block"><i class="material-icons">book</i> &nbsp; Export Data</button>
                </div>

     </div>


          <div class="row">
            <div class="col-md-12">
             
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title "><i class="material-icons">contacts</i> &nbsp; Contacts</h4>
                 <!--  <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="refershtable">
                    <table class="table" id="clients_table">
                      <thead class="">
                        <th><b>
                          Sno
                        </b></th>
                        <th><b>
                          Name
                        </b></th>
                        <th><b>
                          Email
                        </b></th>
                        <th><b>
                          Mobile
                        </b></th>
                        <th><b>
                          Saved on
                        </b></th>
                        <th><b>
                          Actions
                        </b></th>
                      </thead>
                      <tbody>
      @foreach($contacts as $contact)
                        <tr>
                          <td>
                          {{ $loop->iteration }}
                          </td>
                    <td>
                    {{ $contact->name }}
                    </td>
                  <td>
                  {{ $contact->email }}
                  </td>
                
                  <td> {{ $contact->mobile }} </td>
                  <td>  {{ $contact->created_at }} </td> 
                          <td class="">
                            <button type="button" class="btn btn-info btn-link btn-sm " data-toggle="modal" data-target="#editContact" onclick="get_edit_details({{ $contact->id }},'{{ $contact->name }}','{{ $contact->email }}','{{ $contact->mobile }}')">
                                <i class="material-icons">edit</i>
                              </button>
                          <br>
                              <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#deleteClientModal" onclick="confirm_delete_client({{ $contact->id }},'{{ $contact->name }}')"><i class="material-icons">delete</i>
                              </button>
                          </td>
                        </tr>
               @endforeach              
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
         
          </div>
        </div>
      </div>


<!--Add contact  Modal -->
<div id="addContact" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="material-icons">person</i> &nbsp; Add Contact
</h4>
                 
                </div>
                <div class="card-body">
                  <form id="add_client" enctype="multipart/form-data">
                  	 <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="client_name">
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email">
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mobile Number</label>
                          <input type="text" class="form-control" name="mobile">
                        </div>
                      </div>
                      
                   

                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="close_add_client"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" onclick="add_client()" id="save_add_client"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
      </div>
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>


<!--Import  Modal -->
<div id="importExcel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title"><i class="material-icons">content_paste</i> &nbsp; Import Excel
</h4>
                 
                </div>
                <div class="card-body">
                  <form id="import_form" method="post" action="../controller/import_clients.php"  >
                  	 <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="file">Click here to Import file</label>
                          <input type="file" name="file" class="form-control" id="file" required>
                        </div>
                      </div>
               
                   

                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="import_client_close_btn"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" id="import_client_btn" onclick="import_client()"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
      </div>
  
    </div>

  </div>
</div>





<!--Confirm Delete  Modal -->
<div id="deleteClientModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="material-icons">delete</i> &nbsp; Delete this Contact?</h4>
                 
                </div>
                <div class="card-body">
                   <h6 class="text-secondary">Are you sure! to remove <span class="text-danger" id="delete_client_name">this Contact</span>? This action can't be Undo</h6>
                   <input type="hidden" name="delete_client_id" id="delete_client_id">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="delete_client_close_btn"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" id="delete_client_btn" onclick="delete_client()"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                
                </div>
              </div>
      </div>
  
    </div>

  </div>
</div>



<!--Edit contact  Modal -->
<div id="editContact" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title"><i class="material-icons">edit</i> &nbsp; Edit Contact
</h4>
                 
                </div>
                <div class="card-body">
                  <form id="edit_client" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit_client_id">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Name</label>
                          <input type="text" class="form-control" name="client_name" id="edit_client_name">
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Email</label>
                          <input type="text" class="form-control" name="email" id="edit_client_email">
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Mobile Number</label>
                          <input type="text" class="form-control" name="mobile" id="edit_client_mobile">
                        </div>
                      </div>
                     
                   

                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="close_edit_client"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" onclick="update_clients()" id="save_edit_client"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
      </div>
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script>

function data_table() {
  var table = $('#clients_table').DataTable({
     "stateSave": true
  });  
  // table
  // .order( [ 4, 'desc' ] )
  // .draw();
}

data_table();

  function add_client(){
  $("#save_add_client").html("<i class='fa fa-spinner fa-spin'></i>");
  $.ajax({
    type: 'POST',
    url: '{{ route("addContact") }}',
    data: $("#add_client").serialize(),
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){
      $("#save_add_client").html('<i class="material-icons">check</i>');
        $("#close_add_client").click();
       if (response.status == 1) {
                        swal({
title: "Added",
text: "Contact Added Successfully",
icon: "success",
 buttons: false,
timer: 2500,
});
      }
     
       if (response.status == 0) {
        swal({
title: "Opps!",
text: "Email Already Exists",
icon: "error",
 buttons: false,
timer: 2500,
});
       }
      // console.log(status);
//       window.location.reload();
//       if(status !="201" && status != "203"){
//        $("#refershtable").html(status);
//        data_table();
//         $("#save_add_client").html('<i class="material-icons">check</i>');
//         $("#close_add_client").click();
//                swal({
// title: "Added",
// text: "Contact Added Successfully.",
// icon: "success",
//  buttons: false,
// timer: 2500,
// });
//       }
//       else if(status=="201") {

//         // message("error","Something went wrong!");
//                          swal({
// title: "Opps!",
// text: "Something Went Wrong.",
// icon: "error",
//  buttons: false,
// timer: 2500,
// });
//         $("#save_add_client").html('<i class="material-icons">check</i>');
//         $("#close_add_client").click();
//       }
//       else{
//         // message("info","Contact Already Exist.");
//                                   swal({
// title: "Sorry!",
// text: "Contact Already Exist.",
// icon: "info",
//  buttons: false,
// timer: 2500,
// });
//         console.log("inss");
//         $("#save_add_client").html('<i class="material-icons">check</i>');
//       } 
    }
  });
}




  function import_client(){
  $("#import_client_btn").html("<i class='fa fa-spinner fa-spin'></i>");
  var form = $('#import_form')[0];
  var data = new FormData(form);
  $.ajax({
    type: 'POST',
    url: '../controller/import_clients.php',
    data: data,
      enctype: 'multipart/form-data',
      processData: false,  // Important!
      contentType: false,
      cache: false,
    success: function(res){
      // console.log(status);
      // var response = JSON.parse(res);
      if(res  == 201){
                                  swal({
title: "Opps!",
text: "Sorry! there was an error to import Clients.",
icon: "error",
 buttons: false,
timer: 2500,
});

      }
      else if(res == 203) {

                         swal({
title: "Opps!",
text: "Invalid file format. Please select excel or csv file.",
icon: "info",
 buttons: false,
timer: 2500,
});
     


      }
         else if(res.search("Return Code") != -1) {

                         swal({
title: "Opps!",
text: res,
icon: "error",
 buttons: false,
timer: 2500,
});
     


      }
      else{
                     $("#refershtable").html(res);
                     data_table();
       
               swal({
title: "Imported",
text: "Congrats! Clients imported successfully.",
icon: "success",
 buttons: false,
timer: 2500,
});
      } 
        $("#import_client_btn").html('<i class="material-icons">check</i>');
        $("#import_client_close_btn").click();

    }
  });
}




function confirm_delete_client(id,name) {
document.getElementById('delete_client_id').value = id;
 document.getElementById('delete_client_name').innerHTML = name;
}
  function delete_client(){
    id = document.getElementById('delete_client_id').value;
  $("#delete_client_btn").html("<i class='fa fa-spinner fa-spin'></i>");
  $.ajax({
    type: 'POST',
    url: '{{ route("deleteContact") }}',
    data: {"id":id},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){
      $("#delete_client_btn").html('<i class="material-icons">check</i>');
        $("#delete_client_close_btn").click();
      if(response.status == 1){
        // $("#refershtable").html(status);
        // data_table();
        // message("success","Contact Deleted Successfully");
    
               swal({
title: "Deleted",
text: "Contact Deleted Successfully.",
icon: "success",
 buttons: false,
timer: 2500,
});
      }
      if(response.status == 0){
        // message("error","Unable To Delete Contact");
        // $("#confirm").html('Confirm');
                                   swal({
title: "Opps!",
text: "Unable To Delete Contact.",
icon: "error",
 buttons: false,
timer: 2500,
});
      } 
      
    }
  });
}


function get_edit_details(id,name,email,mobile) {

document.getElementById('edit_client_id').value = id;
document.getElementById('edit_client_name').value = name;
document.getElementById('edit_client_email').value = email;
document.getElementById('edit_client_mobile').value = mobile;

document.getElementById('edit_client_name').click();

}

function update_clients() {
 id =  document.getElementById('edit_client_id').value;
name = document.getElementById('edit_client_name').value;
email = document.getElementById('edit_client_email').value;
mobile = document.getElementById('edit_client_mobile').value;
  $("#save_edit_client").html("<i class='fa fa-spinner fa-spin'></i>");
  $.ajax({
    type: 'POST',
    url: '{{ route("editContact") }}',
    data: {"id":id,"client_name":name,"email":email,"number":mobile},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){
      $("#save_edit_client").html('<i class="material-icons">check</i>');
        $("#close_edit_client").click();
      if(response.status == 1){
       
        // $("#refershtable").html(status);
        // data_table();
        // message("success","Contact Updated Successfully.")
                         swal({
title: "Updated",
text: "Contact Updated Successfully.",
icon: "success",
 buttons: false,
timer: 2500,
});
      }
      if(response.status == 0){
        console.log("Failed");
                         swal({
title: "Opps!",
text: "Something Went Wrong",
icon: "error",
 buttons: false,
timer: 2500,
});

      }
    }
  });
}


</script>
@endpush