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
                  <h4 class="card-title "><i class="material-icons">send</i> &nbsp; {{ $page_title }}</h4>
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
                          Reciver
                        </b></th>
                       
                        <th><b>
                          Message
                        </b></th>
                        <th><b>
                          Date
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
                  <td>10 Jan,2020 | 10:15 AM</td>
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
                  <h4 class="card-title"><i class="material-icons">delete</i> &nbsp; Delete this Message?</h4>
                 
                </div>
                <div class="card-body">
                   <h6 class="text-secondary">Are you sure! To Delete this Message. <br>
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
var table;
  function data_table() {
     table = $('#message_table').DataTable({
     	 "stateSave": true
     });  
    // table
    // .order( [ 4, 'desc' ] )
    // .draw();
  }

data_table();



function confirm_delete_message(id,to,msg) {

  // console.log(window.atob(msg));
  document.getElementById('message_id').value = Number(id);
  document.getElementById('number').innerHTML = to;
//    document.getElementById('message').innerHTML = window.atob(msg);
   document.getElementById('message').innerHTML = msg;
}
    function delete_message(){
    	var page = table.page.info();
    	page = Number(page.page) + Number(1);
      id = document.getElementById('message_id').value;
    $("#delete_message_btn").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
      type: 'POST',
      url: '../controller/delete_sent_msg.php',
      data: {"id":id},
      success: function(status){
        if(status !="201"){
          $("#refershtable").html(status);

          // message("success","Contact Deleted Successfully");
          $("#delete_message_btn").html('<i class="material-icons">check</i>');
          $("#delete_message_close_btn").click();
          data_table();

                 swal({
  title: "Deleted",
  text: "Message Deleted Successfully. page = "+page,
  icon: "success",
   buttons: false,
  timer: 2500,
});
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

</script>
@endpush