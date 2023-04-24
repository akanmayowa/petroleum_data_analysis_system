<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Manage All Roles
        <a data-toggle="tooltip" onclick="showmodal('addrole')" style="color: #fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New User Here">  <i class="fa fa-plus"> New</i> </a>
        
      {{--   <a data-toggle="tooltip" onclick="showmodal('addrole')" style="color:#fff; margin-left: 5px" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Role Here"> <i class="fa fa-plus"></i> New </a> --}}
               
        @if(Auth::user()->role_obj->permission->contains('constant', 'add_roles') ||
          Auth::user()->role_obj->permission->contains('constant', 'manage_roles') )
            <a data-toggle="tooltip" onclick="showmodal('uplrole')" style="margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Role Excel Here">  <i class="fa fa-upload"> Upload</i> </a>
            {{-- <a data-toggle="tooltip" onclick="showmodal('uplrole')" style="color:#fff;" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Role Excel Here">  <i class="fa fa-upload"> </i> Upload</a> --}}
        @endif
    </h5>
        <table class="table table-striped table-sm mb-0" id="role_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Role Description</th>
                <th>Created On</th>
                <th style=""> </th>
            </tr>
            </thead>
            <tbody>
                @if($allRoles)
                    @foreach($allRoles as $allRole)
                        <tr>  
                            <th>{{$allRole->id}}</th>
                            <th>{{$allRole->role_name}}</th>  
                            <th>{{$allRole->description}}</th>   
                            <th>{{\Carbon\Carbon::parse($allRole->created_at)->diffForHumans()}}</th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_roles({{$allRole->id}})" class="btn-sm pull-right" title="Edit Role"> <i class="fa fa-pencil"></i>  </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$allRoles->appends(Request::capture()->except('page'))->render() }} 
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
    });

    //SORT SCRIPT
    sortAscDesc();
</script>


