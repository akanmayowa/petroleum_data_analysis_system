<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All Users
        <a data-toggle="tooltip" onclick="showmodal('adduser')" style="color: #fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New User Here">  <i class="fa fa-plus"> New</i> </a>
                
        @if(Auth::user()->role_obj->permission->contains('constant', 'add_users') )
            <a data-toggle="tooltip" onclick="showmodal('uplusers')" style="margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload User Excel Here">  <i class="fa fa-upload"> Upload</i> </a>
                
            {{-- <a data-toggle="tooltip" onclick="showmodal('uplusers')" style="margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload User Excel Here">  <i class="fa fa-upload"></i> Upload </a> --}}
        @endif
    </h5>
        <table class="table table-striped table-sm mb-0" id="user_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($all_user)
                    @foreach($all_user as $user)

                        <tr>
                            <th> {{$user->id}} </th>
                            <th> {{$user->name}} </th>
                            <th> {{$user->email}} </th>
                            <th> @if($user->role_obj) {{$user->role_obj->role_name}} @endif </th>
                            <th>
                                @if($user->active == 1) 
                                    <span class="" style="width:100%"> <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="10" class=""> &nbsp; Active </span>
                                @else 
                                   <span class="" style="width:100%"> <img src="{{URL::asset('assets/images/red.png')}}" alt="" height="10" class=""> &nbsp; Deactived </span>
                                @endif 
                            </th>
                            <th>
                                @if($user->active == 1) 
                                    <a onclick="showmodal('deact_user')" id="{{$user->id}}" href="#" class="pull-right deact" data-toggle="tooltip" title="Deactivate {{$user->name}} Account" style="font-size:12px"> <i class="fa fa-remove text-inverse m-r-10" style="color: red"></i> 
                                    </a>
                                @else 
                                    <a onclick="showmodal('react_user')" id="{{$user->id}}" href="#" class="pull-right react" data-toggle="tooltip" title="Reactivate {{$user->name}} Account" style="font-size:12px"> <i class="fa fa-check text-inverse m-r-10" style="color: green"></i> 
                                    </a>
                                @endif 

                                <a href="#" class="pull-right" title="Edit {{$user->name}}' Details" onclick="load_users({{$user->id}})"> 
                                    <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                </a>
                            </th>
                        </tr>

                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $all_user->appends(Request::capture()->except('page'))->render() !!}
</div> <!-- end col -->



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



        $('.deact').click(function(e)
        {              
            $('#did').val($(this).attr('id'));            
        });  

        $('.react').click(function(e)
        {              
            $('#rid').val($(this).attr('id'));            
        }); 
    });

    //SORT SCRIPT
    sortAscDesc();
</script>