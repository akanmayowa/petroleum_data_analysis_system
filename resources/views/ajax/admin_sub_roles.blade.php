<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Manage All Sub Roles
        <a data-toggle="tooltip" onclick="showmodal('addsubrole')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-primary btn-sm pull-right" data-original-title="Add New Sub Role Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplsubrole')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Sub Role Excel Here">  <i class="fa fa-upload"> Upload</i> </a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="sub_role_table">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>#</th>
                <th>Role </th>
                <th>Sub Role Name</th>
                <th>Role Description</th>
                <th>Created On</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($allSubRoles)
                    @foreach($allSubRoles as $allSubRole)
                        <tr>  
                            <th>{{$allSubRole->id}}</th>
                            <th>@if($allSubRole->role) {{$allSubRole->role->role_name}}@else N/A @endif</th>
                            <th>{{$allSubRole->sub_role_name}}</th>  
                            <th>{{$allSubRole->description}}</th>   
                            <th>{{\Carbon\Carbon::parse($allSubRole->created_at)->diffForHumans()}}</th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#fff; background-color:#202020; font-size:10px" tooltip="true" onclick="load_sub_roles({{$allSubRole->id}})" class="btn btn-info btn-sm pull-right" title="Edit Sub Role"> <i class="fa fa-pencil"></i>  </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$allSubRoles->appends(Request::capture()->except('page'))->render() }} 
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


