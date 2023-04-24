<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All Users Login Logs
        <a data-toggle="tooltip" onclick="showmodal('adduser')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New User Here"> <i class="fa fa-plus"> New</i> </a>
    </h5>        

       <table class="table table-striped table-sm mb-0" id="login_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Login Dates</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($users_last_log)
                    @foreach($users_last_log as $users_last_logs)
                        <tr>
                            <td> {{$users_last_logs->id}} </td>
                            <td> @if($users_last_logs->user) {{$users_last_logs->user->name}} @endif </td>
                            <td> @if($users_last_logs->user) {{$users_last_logs->user->email}} @endif </td>
                            <td> @if($users_last_logs->user) {{$users_last_logs->user->role_obj->role_name}} @endif </td>
                            <td> {{\Carbon\Carbon::parse($users_last_logs->last_login)->diffForHumans()}} </td>
                            <th>                                
                                <a href="#" class="pull-right" title="Edit {{$users_last_logs->name}}' Details" data-toggle="modal" data-target="#deleteuser{{$users_last_logs->id}}"> 
                                    <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i> 
                                </a>

                                <a href="#" class="pull-right" title="Edit {{$users_last_logs->name}}' Details" onclick="load_users({{$users_last_logs->id}})"> 
                                    <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                </a>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$users_last_log->appends(Request::capture()->except('page'))->render() }} 

</div>

<script type="text/javascript">
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip();  
        $('.page-link').click(function(e)
        {
            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID); 
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>