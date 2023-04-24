@extends('layouts.app')

@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> All Users  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link allUsers" data-toggle="tab" href="#use" role="tab" onclick="displayUsers()"> All Users </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="use" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="allUsers">   

                            </div> <!-- end row -->
                        </p>
                    </div> 
                </div>

            </div>
        </div>
    </div>

</div>

















<!-- ADD NEW USER MODAL -->

    <div id="adduser-old" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header header_bg">  <h4 class="modal-title"> <i class="fa fa-user"></i> Create New User </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
        </div>
        <div class="modal-body">       
        

        <!-- Begin page -->

            <div class="p-3">
                <form id="userForm" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.add_users')}}">
                <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                <!-- {{ csrf_field() }} -->
                <input type="hidden" name="date_u" id="date_u" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Email </label>
                        <div class="col-10">
                            <input class="form-control" type="email" required="" placeholder="Email" name="email" id="email" focused>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Fullname </label>
                        <div class="col-10">
                            <input class="form-control" type="text" required="" placeholder="Fullname" name="name" id="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Password </label>
                        <div class="col-10">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label"> Roles </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="role" id="role" required>
                                <option value=""> Select Role </option>
                                    @if(count($roles)>0)
                                        @foreach($roles as $roles)
                                            <option value="{{$roles->id}}">{{$roles->role_name}}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>  

                    {{-- <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label font-weight-normal" for="customCheck1">I accept 
                                    <a href="#" class="text-muted">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                   
                </form>
            </div>

             


    
  

        </div>
        </div>

        </div>
        </div>
        






<!-- Edit NEW USER modal -->
<div id="edituser" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit NEW USER </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div id="edit_user">

             </div>
        </div>
    </div>
    </div>  
</div>










<script type="text/javascript"> //FUNCTIONS TO LOAD EDIT MODALS

     function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }
   

</script>


<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'user_table')
    {   
        var _date = document.getElementById('date_u').value;
        $('#'+tableId).prepend('<tr>  <td> '+data.id+' </td> <td> '+data.name+' </td>  <td> '+data.email+' </td>  <td> '+data.role+' </td>  <td> '+_date+' </td>   <td> <a href="#" class="pull-right" title="Edit '+data.name+' Details" data-toggle="modal">   <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>  </a> <a href="#" class="pull-right" title="Edit '+data.name+' Details" onclick="load_users('+data.id+')">  <i class="fa fa-pencil text-inverse m-r-10"></i>   </a></td>   </tr>'); 
    }
}

//function to process form data
function processForm(formid, route, tableId, progress, modalid)
{

   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token','{{csrf_token()}}');
  
    $.ajax(
    {
        // Your server script to process the upload
        url: route,
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data, status, xhr)
        {
            if(data.status=='ok')
            {
                appendTable(data.message,tableId);
                $('#'+modalid).modal('hide');
                toastr.info(data.info, {timeOut:10000});
                return;
            }
           
            return toastr.error(data.info, {timeOut:10000});

        },
        // Custom XMLHttpRequest
        xhr: function() 
        {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) 
            {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) 
                {
                    if (e.lengthComputable) 
                    {
                        percent=Math.round((e.loaded/e.total)*100,2);
                        $('#'+progress).css('width',percent+'%');
                        $('#'+progress+'_text').text(percent+'%');
                    }
                }, false);
            }
            return myXhr;
        }
    });

}





    $(document).ready(function()
    {            
        //USER 
        $("#userForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('userForm', "{{url('/admin/add_users')}}", 'user_table', 'progressUser', 'adduser');
        });

    });
</script>







<script type="text/javascript"> //FUNCTIONS TO LOAD EDIT MODALS
   
    function load_users(id)
    {   
        $('#edit_user').load("{{url('admin')}}/modals/editUsers?id="+id);
        $('#edituser').modal('show');
    }

</script>







<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script type="text/javascript">
    function displayUsers()
    {
        $('#allUsers').load('{{url('ajax')}}/allUsers');
        sessionStorage.setItem('name', 'allUsers'); 
    }
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name')) 
        {
           case 'allUsers':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;


            default:
                  $('.allUsers').trigger('click');
                  break; 
        }
       
    }

    $(function()
    {     
        resolveLoad();                
    }); 


    

</script>


@endsection