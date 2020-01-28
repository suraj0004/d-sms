@extends('layouts.base-layout')

@section('content')
 <!-- End Navbar -->
 <div class="content" id="root_container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title"><i class="material-icons">edit</i> {{ $page_title }}</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form id="sent_bulk_sms" class="form">


  <div class="row">
                  <div class="col-md-6 ">
                  
                      <div class="form-group" id="msg_type_dropdown">
             

                          <label> Reciver Type</label>
                        <select name="msg_type" id="msg_type" class="form-control">
                          <option  value="">Select Reciver</option>
                          <option value="group">Group Contacts</option>
                          <option value="clients">Contacts</option>
                        </select>
                      </div>
                    
                  </div>

                      <div class="col-md-6 form-group" id="sending_type_dropdown">
                 <!-- <label class="col-form-label" for="appendedInput">Select Schedule</label> -->
                 <!-- <div class="controls"> -->
                 <!-- <div class="input-group"> -->
                   <label class="" id=""> Schedule Type</label>
                   <select id="sending_type" class="form-control" name="sending_type"  required>
                      
                      <option selected value="send_now">Send Now</option>
                      <option value="scheduled">Make Schedule</option>
                  </select>
                <!-- </div> -->
                <!-- </div> -->
                </div>
  </div>

<div class="row">
       
                    <div class="col-md-12  form-group" style="display:none" id="first_box">

<span class="highlighter">
   <i class="fa fa-star fa-spin text-warning group_highlighter"></i>
</span>
                      <label class="">
                       
                      Select Group</label>
                      <select name="group_name"  class="form-control" required>
                        
                     
                          <option value="">Gropu</option>
                       
                    </select>
                  </div>
</div>
<!--  style="display:none" -->
                  <!-- <label class="" for="">Select Contacts</label> -->

<div class="row" >
  <div class="demo col-md-12" id="clients_wrap" style="display:none; margin-bottom: 15px">

    <span class="highlighter">
   <i class="fa fa-star fa-spin text-warning contact_highlighter"></i>
</span>
  <label class="">
 
Select Contacts</label>
  <select class="form-control" style="display:none"  name="clients_name[]" multiple required>
    <option value="All">Select All</option>
                 
  </select>
</div>
</div>
               


<div class="row" id="scheduled-dv" style="display: none;">
        

<div class="col-md-6">
   <span class="highlighter">
   <i class="fa fa-star fa-spin text-warning schedule_highlighter"></i>
</span>
  <div class="form-group"> 
   
      <label class="">Schedule Date</label>
      <input type="text" id="schedule_date" placeholder="Set Schedule Date" name="schedule_date" class="form-control text-center">
  </div>
</div>

<div class="col-md-6">
 <span class="highlighter">
   <i class="fa fa-star fa-spin text-warning schedule_highlighter"></i>
</span>
   <div class="form-group">
  
       <label class="">Schedule Time</label>
       <input type="text" name="schedule_time" class="timepicker form-control text-center" id="schedule_time" />
   </div>
</div>

        
</div>






                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group" id="twilio_number_dropdown">
                           <label class="">Sender ID</label>
                          <select class="form-control text-center" name="twilio_number" id="twilio_number">
                     
                          </select>
                        </div>
                      </div>
                         <div class="col-md-6">
                        <div class="form-group" id="message_type_dropdown">
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
                        <div class="form-group" id="template_message_dropdown">
    
                           <label class="">Templates</label>
                         <select class="form-control text-center" name="select_template" id="select_template" on>
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
                            <textarea class="form-control" rows="5" id="messagebox" name="message"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-default pull-right" id="reset_form_btn" onclick="reset_form_data()"><i class="material-icons">cached</i></button>
                    <button type="button" onclick="set_bulk_message()" class="btn btn-success pull-right" id="send_btn"><i class="material-icons">send</i></button>

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

function set_dropdown() {
  $(document).ready(function() {
 
  if ($(window).width() < 960) {

    // time
   $("#schedule_time").attr("type","time");
   $("#schedule_time").removeClass("timepicker");
   $("#schedule_date").attr("type","date");

   //date
}
else {

    // time
    $("#schedule_time").attr("type","text");
    $("#schedule_time").addClass("timepicker");
    $("#schedule_time").attr("placeholder","Select Schedule Time");
    $('.timepicker').wickedpicker();


    // date
    $( "#schedule_date" ).datepicker();
    $("#schedule_date").attr("type","text");
}

});



$('#msg_type_dropdown').dropdown({


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

    var value = document.getElementById('msg_type').value;
     if(value=='clients') {
    
    
    
    $("#first_box").hide();
    $("#clients_wrap").show();


    $(".contact_highlighter").show();
   setTimeout(function() {
  $(".contact_highlighter").hide();
}, 1200);
  
    
  }
  else if(value == 'group') {
    
    
    
    $("#first_box").show();
    $("#clients_wrap").hide();

      $(".group_highlighter").show();
  setTimeout(function() {
  $(".group_highlighter").hide();
}, 1200);
    
  }
  else{
     $("#first_box").hide();
    $("#clients_wrap").hide();
  }
  },

  // custom props
  extendProps: []

});


$('#sending_type_dropdown').dropdown({


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
      var value = document.getElementById('sending_type').value;
      if(value == 'scheduled') {
    document.getElementById('scheduled-dv').style.display='';


        $(".schedule_highlighter").show();
   setTimeout(function() {

   $(".schedule_highlighter").hide();
}, 1200);
  }
  else {
    document.getElementById('scheduled-dv').style.display='none';
  }
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





$('#first_box').dropdown({


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

$('.demo').dropdown({

multipleMode:'label',
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
}// fn end


set_dropdown();





   function set_bulk_message() {
  $("#send_btn").html("<i class='fa fa-spinner fa-spin'></i>");
  $.ajax({
    type: 'post',
    url: '../controller/get_bulk_sms.php',
    data: $("#sent_bulk_sms").serialize(),
    success: function(status) {
      if(status=="200") {
        $("#send_btn").html('<i class="material-icons">send</i>');
        // message("success","Message Sent Successfully");
        // $("#reset_form").click();
        swal({
  title: "Sent",
  text: "Message Sent Successfully.",
  icon: "success",
   buttons: false,
  timer: 2500,
});

      //    var total_sms_sent = $("#total_sms_sent").html();
      // total_sms_sent = Number(total_sms_sent) + 1;
      // $("#total_sms_sent").html(total_sms_sent);

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

      reset_form_data();
    }     
  });
}


function reset_form_data() {
 $("#reset_form_btn").html("<i class='fa fa-spinner fa-spin'></i>");
 $.ajax({
    type: 'get',
    url: '../controller/reload_bulk_sms_form.php',
    // data: $("#sent_bulk_sms").serialize(),
    success: function(status) {
      var sts = status;
      if (sts != '') {
         $("#root_container").html(sts);

set_dropdown();

$("#reset_form_btn").html('<i class="material-icons">cached</i>');

      }
    }
});
}

</script>
@endpush