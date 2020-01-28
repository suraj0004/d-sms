@extends('layouts.base-layout')

@section('content')

  <!-- End Navbar -->
  <div class="content">
      <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


      	   
        <div class="container-fluid">




       <div class="row">
            <div class="col-md-12">
             
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title "><i class="material-icons">queue</i> &nbsp; {{ $page_title }}</h4>
                 <!--  <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="refershtable">
                    <table class="table text-center" id="message_table">
                      <thead class="">
                        <th><b>
                          Sno
                        </b></th>
                        
                        <th><b>
                        Receiver Mail
                        </b></th>
                       
                        <th><b>
                          Message
                        </b></th>

                         <th><b>
                          Added on
                        </b></th>

                         <th><b>
                          Scheduled time
                        </b></th>

                        <th><b>
                          Actions
                        </b></th>
                      </thead>
                      <tbody>
               
                        <tr>
                          <td>
                          1
                          </td>
                   
                  <td>receiver@disc-in.com</td>
                
                
                  <td style="max-width: 300px;">Message</td>
                 
                  <td>1 Jan,2020</td>
                  <td>1 Feb,2020</td>
                          <td class="">
                              <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#deleteMessageModal" onclick="confirm_delete_message(1,'receiver@disc-in.com','base64_encode(message)')"><i class="material-icons">delete</i>
                              </button>
                          </td>
                        </tr>
                          
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
         
          </div>
        </div>
      </div>



<!--Confirm Delete  Modal -->
<div id="deleteMessageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="material-icons">delete</i> &nbsp; Delete this Pending Message?</h4>
                 
                </div>
                <div class="card-body">
                   <h6 class="text-secondary">Are you sure! To Delete this Pending Message? . <br>
                      <b>Receiver: </b><span class="text-danger" id="number">00000</span> <br>
                     <b>Message: </b><span class="text-danger" id="message">message</span> <br>
                     This action can't be Undo</h6>
                   <input type="hidden" name="message_id" id="message_id">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="delete_message_close_btn"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" id="delete_message_btn" onclick="delete_message()"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                
                </div>
              </div>
      </div>
  
    </div>

  </div>
</div>


@endsection


@push('scripts')

<script type="text/javascript">


function data_table() {
    var table = $('#message_table').DataTable({
    	 "stateSave": true
    });  
    // table
    // .order( [ 4, 'desc' ] )
    // .draw();
  }

data_table();



function confirm_delete_message(id,title,msg) {

  // console.log(window.atob(msg));
  document.getElementById('template_id').value = Number(id);
  document.getElementById('title').innerHTML = title;
   document.getElementById('message').innerHTML = msg;
//    document.getElementById('message').innerHTML = window.atob(msg);
}
    function delete_message(){
      id = document.getElementById('template_id').value;
    $("#delete_message_btn").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
      type: 'POST',
      url: '../controller/delete_template.php',
      data: {"id":id},
      success: function(status){
        // console.log(status);
        if(status !="201"){

          $("#refershtable").html(status);
data_table();

          // message("success","Contact Deleted Successfully");
          $("#delete_message_btn").html('<i class="material-icons">check</i>');
          $("#delete_message_close_btn").click();
         
                 swal({
  title: "Deleted",
  text: "Message Deleted Successfully.",
  icon: "success",
   buttons: false,
  timer: 2500,
});

                  // window.location.reload();
        }


        else{
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




      function add_template(){
    $("#save_add_template").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
      type: 'POST',
      url: '../controller/add_new_template.php',
      data: $("#add_template").serialize(),
      success: function(res){
        if (res != 201 && res != 203) {
        	 $("#refershtable").html(res);
        	 data_table();


                           swal({
  title: "Imported",
  text: "Congrats! Clients imported successfully.",
  icon: "success",
   buttons: false,
  timer: 2500,
});
                          // window.location.reload();
        }
        else{
                                             swal({
  title: "Opps!",
  text: "Sorry! there was an error to import Clients.",
  icon: "error",
   buttons: false,
  timer: 2500,
}); 
        }
         $("#save_add_template").html('<i class="material-icons">check</i>');
          $("#close_add_client").click();
        // console.log(status);
//         if(status !="201" && status != "203"){
//         //  $("#refershtable").html(status);
//           $("#save_add_client").html('<i class="material-icons">check</i>');
//           $("#close_add_client").click();
//                  swal({
//   title: "Added",
//   text: "Contact Added Successfully.",
//   icon: "success",
//    buttons: false,
//   timer: 2500,
// });
//         }
//         else if(status=="201") {

//           // message("error","Something went wrong!");
//                            swal({
//   title: "Opps!",
//   text: "Something Went Wrong.",
//   icon: "error",
//    buttons: false,
//   timer: 2500,
// });
//           $("#save_add_client").html('<i class="material-icons">check</i>');
//           $("#close_add_client").click();
//         }
//         else{
//           // message("info","Contact Already Exist.");
//                                     swal({
//   title: "Sorry!",
//   text: "Contact Already Exist.",
//   icon: "info",
//    buttons: false,
//   timer: 2500,
// });
//           console.log("inss");
//           $("#save_add_client").html('<i class="material-icons">check</i>');
//         } 


      }
    });
  }




function get_edit_details(id,title,msg) {
  document.getElementById('edit_id').value = id;
  document.getElementById('edit_title').value = title;
//   document.getElementById('edit_message').value = window.atob(msg);
document.getElementById('edit_message').value = msg;


  document.getElementById('edit_title').click();

}

  function update_clients() {
   id =  document.getElementById('edit_id').value;
  title = document.getElementById('edit_title').value;
  message = document.getElementById('edit_message').value;
    $("#save_edit_client").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
      type: 'POST',
      url: '../controller/update_template.php',
      data: {"id":id,"title":title,"message":message},
      success: function(status){
        if(status !="203"){
          $("#save_edit_client").html('<i class="material-icons">check</i>');
          $("#close_edit_client").click();
          $("#refershtable").html(status);
          data_table();

          // message("success","Contact Updated Successfully.")
                           swal({
  title: "Updated",
  text: "Contact Updated Successfully.",
  icon: "success",
   buttons: false,
  timer: 2500,
});

                           //window.location.reload();
        }
        else {
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