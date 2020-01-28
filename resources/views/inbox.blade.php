@extends('layouts.base-layout')

@section('content')
  <!-- End Navbar -->
  <div class="content">
      <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


      	   
        <div class="container-fluid">

<div class="row">
  <div class="col-md-9">
    <div class="row">
            <div class="col-md-1">
              <form action="" method="post" name=f1 enctype="multipart/form-data" class="form-horizontal col-md-6">
              <input type=hidden name=todo value=submit>
            </div>
                 
                       <div class="col-md-4" id="month_dropdown">
                  <label class="" for=""><strong>Month :</strong></label>
                    
                    <select style="" class="form-control" name="month" value="">
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                    </div>
                   
                   <div class="col-md-4">
                      <label class="" for=""><strong>Year : </strong></label>
                    
                    <input class="form-control" type="number" name="year" size="4" value="2020">
                   
                    
                   </div>
                  
                   <div class="col-md-1">
                    <label class="" for=""><strong></strong></label>
                      <button type="submit" class="btn btn-default btn-sm"><i class="material-icons">search</i></button>
                   </div>
                 
                
              </form> 
               </div>
  </div>
  <div class="col-md-3">
     <label class="" for=""><strong></strong></label>
    <button type="button" class="btn btn-info btn-block text-center"><i class="material-icons">assignment_turned_in</i> &nbsp; Mark All as Read</button>
  </div>
</div>



       <div class="row">
            <div class="col-md-12">
             
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title "><i class="material-icons">inbox</i> &nbsp; {{ $page_title }}</h4>
                 <!--  <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="refershtable">
                    <table class="table text-center" id="inbox_message_table">
                      <thead class="">
                        <th><b>
                          Sno
                        </b></th>
                        
                       
                        <th><b>
                         Sender 
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
                   
                  
                  <td>sender@disc-in.com</td>
                
                
                  <td style="max-width: 300px;">Message</td>
                  <td>10 Jan,2020 | 10:15 AM</td>
                          <td class="">
                              <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#deleteMessageModal" onclick="confirm_delete_message(1,'sender@disc-in.com','Message')"><i class="material-icons">delete</i>
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
                      <b>Sender: </b><span class="text-danger" id="number">00000</span> <br>
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
$('#month_dropdown').dropdown({


  // read only
  readOnly: false,

  // min count
  minCount: 0,

  // error message
  minCountErrorMessage: '',

  // the maximum number of options allowed to be selected
  limitCount: Infinity,
  
  // error message
  limitCountErrorMessage: '',

  // search field
  input: '<input type="text" maxLength="20" placeholder="Search">',

  // dynamic data here
  data: [],

  // is search able?
  searchable: true,

  // when there's no result
  searchNoData: '<li style="color:#ddd">No Results</li>',


  // callback
  choice: function () {

  
  },

  // custom props
  extendProps: []

});

  function data_table() {
    var table = $('#inbox_message_table').DataTable();  
    // table
    // .order( [ 4, 'desc' ] )
    // .draw();
  }

data_table();



function confirm_delete_message(id,from,msg) {

  // console.log(window.atob(msg));
  document.getElementById('message_id').value = Number(id);
  document.getElementById('number').innerHTML = from;
//    document.getElementById('message').innerHTML = window.atob(msg);
document.getElementById('message').innerHTML = msg;
}
    function delete_message(){
      id = document.getElementById('message_id').value;
    $("#delete_message_btn").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
      type: 'POST',
      url: '../controller/delete_received_msg.php',
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
  text: "Message Deleted Successfully.",
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
  text: "Unable To Delete Message.",
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