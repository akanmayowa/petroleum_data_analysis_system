@extends('layouts.app')

    @section('search')
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">          
                <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
            </div>
        </div>
    @endsection

    {{-- change --}}

@section('content')







<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Auditor Users Log</h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link users" data-toggle="tab" href="#user" role="tab" onclick="displayUsers()"> Users </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link users_last_log" data-toggle="tab" href="#last_log" role="tab" onclick="displayUsersLastLogin()"> Users Login Trails  </a>
                    </li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content"> 
                    <div class="tab-pane active p-3" id="user" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="" id="users">                                

                            </div>
                        </p>
                    </div>                

                    <div class="tab-pane p-3" id="last_log" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="users_last_log">                                

                            </div>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>










<!-- View Users Login Logs modal -->
<div id="login_logs" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background: #202020; color: #fff">
            <h4 class="modal-title">View User Login Log </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="loginlogs"></div>
          </div>
    </div>
    </div>  
</div>







@endsection

@section('script')

<script type="text/javascript">
    
    $(function()
    {
        $('#start_dates').datepicker();
    });


    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }


    function view_login_logs(id)
    {   
        $('#loginlogs').load("{{url('admin')}}/modals/viewLoginLogs?id="+id);
        $('#login_logs').modal('show');
    }

</script>





<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script type="text/javascript">
    function displayUsers($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/users?q='+$search+'&excel=excel');
        $('#users').load('{{url('ajax')}}/users?q='+$search);
        sessionStorage.setItem('name','users');  
    }

    function displayUsersLastLogin($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/users_last_log?q='+$search+'&excel=excel');
        $('#users_last_log').load('{{url('ajax')}}/users_last_log?q='+$search);
        sessionStorage.setItem('name','users_last_log');  
    }
   
    //Hide alert message box
    $('#succ_alert_msg').hide();     
    $('#err_alert_msg').hide();

   
    
    
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'users':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;
           
           case 'users_last_log':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            default:
                  $('.users').trigger('click');
                  break;
        }
       
    }
    //

    $(function()
    {     
        resolveLoad();                
    });
</script>



<!-- SERACH FUNCTIONALITY -->
<script type="text/javascript">
    $(function()
    {
         $('#dynamicsearch').on('keyup', function()
         {           
              name = sessionStorage.getItem('name');

              q = $('#dynamicsearch').val().replace(' ','%20');
              
              if(name =='users')
               {
                 displayUsers(q);
               }  
              
              else if(name =='users_last_log')
               {
                 displayUsersLastLogin(q);
               }  

           })
    });
</script>


    @if(Session::has('info'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection