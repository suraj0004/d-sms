<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->



    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png"  href="{{ asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

 <!--     Fonts and icons     -->
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-dashboard.css?v=3.1.1') }}"  rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css')}}" rel="stylesheet" />

 <!--  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/> -->

 <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" /> -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.dropdown.min.css')}}">
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/wickedpicker.css')}}">


<style type="text/css">
  input[type=text]{
    cursor: pointer !important;
  }
   select[name=clients_table_length],select[name=message_table_length],select[name=inbox_message_table_length]{
    padding: 3px !important;
    color: grey !important;
    border-radius: 5px !important;
    box-shadow: 1px 1px !important;
  }
  .ui-datepicker {
   background: #333;
   border: 1px solid #555;
   color: #EEE;
}
.ui-widget-header {
    /* color: red; */
    background: red;
    border: 1px solid white;
}
.ui-state-default{
 color: black !important; 
}
.ui-state-active {
    background: red !important;
    color: white !important;
    border: 1px solid white !important;
}
.ui-state-highlight{
      border: 1px solid #cccccc !important;
    background: #f6f6f6 !important;
    font-weight: bold !important;
   color: black !important; 
}
.wickedpicker__title{
      background: red !important;
    color: white !important;
    font-weight: bold !important;
    border: 1px solid white !important;
}
.highlighter{
  position: absolute;
  left: 0px;
}
</style>

</head>
<body>

        <div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="{{ asset('assets/img/sidebar-3.jpg') }}" style="font-weight: bold;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          D-SMS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item 
           @if($page == 'dashboard') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
              <li class="nav-item
              @if($page == 'contacts') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('contacts') }}">
              <i class="material-icons">contacts</i>
              <p>Contacts</p>
            </a>
          </li>
       <li class="nav-item dropdown
       @if( @isset($base_page) && $base_page=='mail') 
          active
          @endif ">
                <a class="nav-link" href="" id="MessageDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">messages</i>
                  <span>Compose Mail</span>
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="MessageDropdownMenu">
                  
                  <a class="dropdown-item
                  @if($page == 'single mail') 
                  bg-danger text-white
                  @endif"
           href="{{ route('singlemail') }}"><i class="material-icons 
           @if($page == 'single mail') 
                   text-white
                  @endif ">content_paste</i>
                  <p> Single Mail</p></a>

                  <a class="dropdown-item 
                  @if($page == 'bulk mail') 
                  bg-danger text-white
                  @endif "
                   href="{{ route('bulkmail') }}"><i class="material-icons 
                   @if($page == 'bulk mail') 
                   text-white
                  @endif ">library_books</i>
                  <p> Bulk Mail</p></a>



                </div>
              </li>

           <li class="nav-item 
           @if($page == 'inbox') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('inbox') }}">
              <i class="material-icons">inbox</i>
              <p>Inbox</p>
            </a>
          </li>


              <li class="nav-item 
              @if($page == 'outbox') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('outbox') }}">
              <i class="material-icons">send</i>
              <p>Outbox</p>
            </a>
          </li>

          <li class="nav-item
          @if($page == 'draft') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('draft') }}">
              <i class="material-icons">folder</i>
              <p>Draft</p>
            </a>
          </li>
        
    
           <li class="nav-item 
           @if($page == 'groups') 
          active
          @endif
           ">
            <a class="nav-link" href="{{ route('groups') }}">
              <i class="material-icons">group</i>
              <p>Group's</p>
            </a>
          </li>

         <li class="nav-item 
         @if($page == 'templates') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('templates') }}">
              <i class="material-icons">book</i>
              <p>Template's</p>
            </a>
          </li>

        <!-- <li class="nav-item   echo (page=='keywords')?'active':'' ">
            <a class="nav-link" href="./keywords.php">
              <i class="material-icons">spark</i>
              <p>Autoresponder Keywords</p>
            </a>
          </li> -->

    
      <li class="nav-item
      @if($page == 'pending mails') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('pendingmails') }}">
              <i class="material-icons">queue</i>
              <p>Pending Mail's</p>
            </a>
          </li>
          
           <li class="nav-item 
           @if($page == 'failed mails') 
          active
          @endif ">
            <a class="nav-link" href="{{ route('failedmails') }}">
              <i class="material-icons">error</i>
              <p>Failed Mail's</p>
            </a>
          </li>

      

    </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"> {{$page_title}} </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{ route('myProfile') }}">My Profile</a>
                  <!-- <a class="dropdown-item" href="#">Settings</a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
       
        
            @yield('content')
       
    


    


  <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.disc-in.com">
                  Disc-IN
                </a>
              </li>
              <li>
                <a href="https://disc-in.com/">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.disc-in.com">
                  More Services
                </a>
              </li>
              <li>
                <a href="https://www.disc-in.com/">
                  D-SMS
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.disc-in.com" target="_blank">Disc-IN</a> for a better web, Powered by <a href="https://www.d-sms.disc-in.com" target="_blank">D-SMS</a> 
          </div>
        </div>
      </footer>
  </div>
  </div>

  <!--   Core JS Files   -->
  <script   type="text/javascript" src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script   type="text/javascript" src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script   type="text/javascript" src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/sweetalert2.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <!-- <script   type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script> -->
  <script   type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script   type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/arrive.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script   type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script> -->
  <!-- Chartist JS -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script   type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script   type="text/javascript" src="{{ asset('assets/js/material-dashboard.js?v=2.1.1') }}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script   type="text/javascript" src="{{ asset('assets/demo/demo.js') }}"></script>

  <!-- <script   type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script> -->
  <script   type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script   type="text/javascript" src="{{ asset('assets/js/jquery.dropdown.min.js') }}"></script>
   <script   type="text/javascript" src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
   <script type="text/javascript" src="{{ asset('assets/js/wickedpicker.js') }}"></script>
   
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();



    });

         // old logout code
          function logout() {
           $.ajax({
            type: 'GET',
            url: '../controller/logout.php',
            success: function (status) {
              if(status==200){
                
                window.location.assign("http://d-sms.disc-in.com/");
              }  
            }
          });
      }
      
  </script>

@stack('scripts')
</body>
</html>
