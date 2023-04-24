<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All Permission
        @if(Auth::user()->role_obj->permission->contains('constant', 'assign_permission'))
            <a data-toggle="tooltip" onclick="showmodal('add_perm')" style="" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Permission Here">  <i class="fa fa-plus"> New</i> </a>
        @endif
    </h5>  
        <table class="table table-striped table-sm mb-0" id="perm_table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Permission Name</th>
                <th>Constant</th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($permission)
                    @foreach($permission as $permissions)
                        <tr> 

                            <th>{{$permissions->id}}</th> 
                            <th>@if($permissions->permission_category) {{$permissions->permission_category->category_name}} @endif</th> 
                            <th>{{$permissions->permission_name}}</th>  
                            <th>{{$permissions->constant}}</th> 
                            <th>
                                <a href="#" class="pull-right" title="Remove {{$permissions->permission_name}} Details" data-toggle="tooltip">   <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>  </a>
                                <a href="#" data-toggle="tooltip" class="pull-right" title="Edit {{$permissions->permission_name}} Details" onclick="load_permission({{$permissions->id}})">  <i class="fa fa-pencil text-inverse m-r-10"></i>   </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$permission->appends(Request::capture()->except('page'))->render() }} 
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