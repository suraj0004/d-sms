@extends('layouts.base-layout')

@section('content')
 <!-- End Navbar -->
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="material-icons">edit</i> {{ $page_title }}</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form id="single_message" class="form">
             
                    <div class="row">
                      <div class="col-md-6 form-group" id="reciver_dropdown">
                        
                          <label class="">Select Reciver</label>
                          <select class="form-control" id="client" name="client" style="text-align: center;" onchange="run()">
                            <option value="">--Select--</option>
                         
                        <option value="test">Test</option>
                       
                          </select>
                        
                      </div>
                      <div class="col-md-6 ">
                      	<label class="">Reciver Contact Number</label>
                        <div class="form-group row">

                          <div class="col-md-1"><label class=""><i class="material-icons">perm_phone_msg</i></label></div>
                          <div class="col-md-10"><input id="client_number" name="client_number" type="number" class="form-control"></div>
                        </div>
                      </div>
                    </div>



                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group " id="twilio_number_dropdown">
                           <label class="">Sender ID</label>
                          <select class="form-control " name="twilio_number" id="twilio_number">
                            <option value="">From Number</option>
                           
                        
                          </select>
                        </div>
                      </div>
                         <div class="col-md-6">
                        <div class="form-group " id="message_type_dropdown">
                           <label class="">Message Type</label>
                        <select class="form-control" name="message_type" id="message_type">
                          <!-- <option value="">Select Message Type</option> -->
                            <option selected value="custom">Custom message</option>
                            <option value="template">Template message</option>
                          </select>
                        </div>
                      </div>
                    </div>


                 <div class="row">
      
                      <div class="col-md-12" id="template_message" style="display: none;" >
                                                           <span class="highlighter">
   <i class="fa fa-star fa-spin text-warning template_highlighter"></i>
</span>
                        <div class="form-group " id="template_message_dropdown">
    
                           <label class="">Templates</label>
                         <select class="form-control " name="select_template" id="select_template" on>
                            <option value="">Select Template</option>
                             
                          </select>
                        </div>
                      </div>
                   
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <!-- <label for="content">SMS Content</label> -->
                          <div class="form-group">
                            <label class="bmd-label-floating" id="messagebox_label"> Write Your Message Here,</label>
                            <textarea class="form-control" rows="5" id="messagebox" name="messagebox"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="reset" class="btn btn-default pull-right" id="reset_form"><i class="material-icons">cached</i></button>
                    <button type="button" onclick="send_message()" class="btn btn-success pull-right" id="send_btn"><i class="material-icons">send</i></button>

                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                  
                  <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <p class="card-category">Total Contacts</p>
                  <h3 class="card-title">
                 47
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                
                  </div>
                </div>
              </div>
                    <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">money</i>
                  </div>
                  <p class="card-category">Message Balance</p>
                  <h3 class="card-title">
                  <span id="total_sms_sent">1234</span>/10,000
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
              
                  </div>
                </div>
              </div>
                    <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">folder</i>
                  </div>
                  <p class="card-category">Templates</p>
                  <h3 class="card-title">
                 7
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                
                  </div>
                </div>
              </div>
                 
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
<script type="text/javascript">


function get_template_message(str) {
  if (str.length == 0) { 
        document.getElementById("messagebox").value = "";
        $("#messagebox_label").addClass("bmd-label-floating");
  }
  else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          document.getElementById("messagebox").value = this.responseText;
          $("#messagebox_label").removeClass("bmd-label-floating");
        }
    };
    xmlhttp.open("GET", "../controller/get_template.php?q=" + str, true);
    xmlhttp.send();
  }
}

function change_message_type(elem) {
  if(elem == 'custom') {
    document.getElementById("messagebox").value = "";
    document.getElementById('template_message').style.display='none';
  }
  if(elem == 'template') {
    document.getElementById('template_message').style.display='block';
  }
}




$('#reciver_dropdown').dropdown({


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
  var value = $("#client :selected").val();
      $('#client_number').val(value);
  },

  // custom props
  extendProps: []

});


$('#twilio_number_dropdown').dropdown({


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
  choice: function () {},

  // custom props
  extendProps: []

});




$('#message_type_dropdown').dropdown({


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
     var elem = document.getElementById('message_type').value;

       if(elem == 'custom') {
    document.getElementById("messagebox").value = "";
    document.getElementById('template_message').style.display='none';
  }
  if(elem == 'template') {
    document.getElementById('template_message').style.display='block';


        $(".template_highlighter").show();
   setTimeout(function() {
  
   $(".template_highlighter").hide();
}, 1200);
  }
  },

  // custom props
  extendProps: []

});




$('#template_message_dropdown').dropdown({


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
     var str = document.getElementById('select_template').value;

  if (str.length == 0) { 
        document.getElementById("messagebox").value = "";
        $("#messagebox_label").addClass("bmd-label-floating");
  }
  else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          document.getElementById("messagebox").value = this.responseText;
          $("#messagebox_label").removeClass("bmd-label-floating");
        }
    };
    xmlhttp.open("GET", "../controller/get_template.php?q=" + str, true);
    xmlhttp.send();
  }


  },

  // custom props
  extendProps: []

});


   function send_message() {
  $("#send_btn").html("<i class='fa fa-spinner fa-spin'></i>");
  $.ajax({
    type: 'post',
    url: '../controller/get_single_msg.php',
    data: $("#single_message").serialize(),
    success: function(status) {
      if(status=="200") {
        $("#send_btn").html('<i class="material-icons">send</i>');
        // message("success","Message Sent Successfully");
        $("#reset_form").click();
        swal({
  title: "Sent",
  text: "Message Sent Successfully.",
  icon: "success",
   buttons: false,
  timer: 2500,
});

         var total_sms_sent = $("#total_sms_sent").html();
      total_sms_sent = Number(total_sms_sent) + 1;
      $("#total_sms_sent").html(total_sms_sent);

      }
     
      else {
        // message("error",status);
        $("#send_btn").html('<i class="material-icons">send</i>');
      swal({
  title: "Opps!",
  text: "Message Not Sent.",
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