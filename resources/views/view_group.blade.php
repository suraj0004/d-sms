@extends('layouts.base-layout')

@section('content')

  <!-- End Navbar -->
  <div class="content">
      <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


      	   
        <div class="container-fluid">



<a href="./add_group_numbers.php" class="btn btn-sm btn-default"><i class="material-icons">arrow_left</i>Back</a>
       <div class="row">
            <div class="col-md-12">
             
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title "><i class="material-icons">people</i> &nbsp; {{ $page_title }}</h4>
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
                         User Mail
                        </b></th>
                       
                      

                         <th><b>
                          Date
                        </b></th>

                    
                      </thead>
                      <tbody>
           
                        <tr>
                          <td>
                           1
                          </td>
                   
                
                
                
               <td>someOne@disc-in.com</td>
                 
                  <td>14 Feb,2020 | 4:07 AM</td>
                  
                    
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


@endsection

@push('scripts')

<script type="text/javascript">

  function data_table() {
    var table = $('#message_table').DataTable();  
    // table
    // .order( [ 4, 'desc' ] )
    // .draw();
  }

data_table();



</script>

@endpush