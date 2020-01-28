@extends('layouts.base-layout')

@section('content')

     
      <!-- End Navbar -->
      <div class="content">
      <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


      	   
        <div class="container-fluid">

 <div class="row">
               <div class="col-sm-12 col-md-3">
                  <button  type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#addGroup"> <i class="material-icons">add</i> &nbsp; Create Group</button>
               </div>
              

            

     </div>


       <div class="row">
            <div class="col-md-12">
             
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title "><i class="material-icons">group</i> &nbsp; {{ $page_title }}</h4>
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
                         Group Name
                        </b></th>

                         <th><b>
                         Total Contacts
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
                   
                  <td>group one</td>

                  <td>4</td>
                
                          <td class="">
                            
                              <a href=" {{ route('viewGroup.group_name',['group_name' => 'Group Name']) }}" class="btn btn-info btn-link btn-sm "> <i class="material-icons">folder_shared</i></a>
                          <br>
                              <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#deleteMessageModal" onclick="confirm_delete_message(1,' base64_encode(group_one)')"><i class="material-icons">delete</i>
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
                  <h4 class="card-title"><i class="material-icons">delete</i> &nbsp; Delete this Group?</h4>
                 
                </div>
                <div class="card-body">
                   <h6 class="text-secondary">Are you sure! To Delete this Group?<br>
                      <!-- <b>Receiver: </b><span class="text-danger" id="number">00000</span> <br> -->
                     <b>Group: </b><span class="text-danger" id="group">group</span> <br>
                     This action can't be Undo</h6>
                   <input type="hidden" name="group_id" id="group_id">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="delete_message_close_btn"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" id="delete_message_btn" onclick="delete_message()"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                
                </div>
              </div>
      </div>
  
    </div>

  </div>
</div>


<!--Add group -->
<div id="addGroup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
         <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title"><i class="material-icons">add</i> &nbsp; Create Group
</h4>
                 
                </div>
                <div class="card-body">
                  <form id="import_form" method="post" action="../controller/import_clients.php" enctype="multipart/form-data">
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Group Name</label>
                          <input type="text" class="form-control" name="group_name">
                        </div>
                      </div>
                     <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="file">Click here to Import file</label>
                          <input type="file" name="file" class="form-control" id="file" required>
                        </div>
                      </div>
               
                   

                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="import_client_close_btn"><i class="material-icons">close</i></button>
                    <button type="button" class="btn btn-success pull-right" id="import_client_btn" onclick="create_new_group()"><i class="material-icons">check</i></button>
                   
                    <div class="clearfix"></div>
                  </form>
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



function confirm_delete_message(id,group) {

  // console.log(window.atob(msg));
  document.getElementById('group_id').value = Number(id);
  // document.getElementById('number').innerHTML = to;
//    document.getElementById('group').innerHTML = window.atob(group);
document.getElementById('group').innerHTML = group;
}
    function delete_message(){
      id = document.getElementById('group').innerHTML;
    $("#delete_message_btn").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
      type: 'POST',
      url: '../controller/delete_group.php',
      data: {"id":id},
      success: function(status){
        if(status !="201"){

// console.log(status);
          $("#refershtable").html(status);

          // message("success","Contact Deleted Successfully");
          $("#delete_message_btn").html('<i class="material-icons">check</i>');
          $("#delete_message_close_btn").click();
          // data_table();
                 swal({
  title: "Deleted",
  text: "Message Deleted Successfully.",
  icon: "success",
   buttons: false,
  timer: 2500,
});
                 data_table();

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





      function create_new_group(){
    $("#import_client_btn").html("<i class='fa fa-spinner fa-spin'></i>");
    var form = $('#import_form')[0];
    var data = new FormData(form);
    $.ajax({
      type: 'POST',
      url: '../controller/get_group1.php',
      data: data,
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
      success: function(res){
        // console.log(status);
        // var response = JSON.parse(res);
        if (res == 201 || res == 202 || res == 205 ) {

                                                       swal({
  title: "Opps!",
  text: "Sorry! there was an error to import Clients.",
  icon: "error",
   buttons: false,
  timer: 2500,
});



                         //  window.location.reload();
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
//         if(res  == 201){
//                                     swal({
//   title: "Opps!",
//   text: "Sorry! there was an error to import Clients.",
//   icon: "error",
//    buttons: false,
//   timer: 2500,
// });
 
//         }
//         else if(res == 203) {

//                            swal({
//   title: "Opps!",
//   text: "Invalid file format. Please select excel or csv file.",
//   icon: "info",
//    buttons: false,
//   timer: 2500,
// });
       


//         }
//            else if(res.search("Return Code") != -1) {

//                            swal({
//   title: "Opps!",
//   text: res,
//   icon: "error",
//    buttons: false,
//   timer: 2500,
// });
       


//         }
//         else{
//                        $("#refershtable").html(res);
         
//                  swal({
//   title: "Imported",
//   text: "Congrats! Clients imported successfully.",
//   icon: "success",
//    buttons: false,
//   timer: 2500,
// });
//         } 
          $("#import_client_btn").html('<i class="material-icons">check</i>');
          $("#import_client_close_btn").click();

      }
    });
  }



</script>



@endpush