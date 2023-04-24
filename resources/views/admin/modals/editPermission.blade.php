<form id="permForm" action="{{url('/admin/add_permission')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$PERM->id}}" required> 
            <input type="hidden" class="form-control" name="type" id="" value="add_permission">           

        @php 
            $one_per = \App\PermissionCategory::where('id', $PERM->permission_category_id)->first();  
            $all_per = \App\PermissionCategory::orderBy('category_name', 'asc')->get(); 
        @endphp

            <div class="form-group row">
                <label for="permission_category_id" class="col-sm-2 col-form-label"> Category </label>
                <div class="col-sm-10">
                    <select class="form-control" name="permission_category_id" id="permission_category_id" required>
                        @if($one_per) <option value="{{$one_per->id}}"> {{$one_per->category_name}} </option> @endif
                            @if(count($all_per)>0)
                                @foreach($all_per as $all_per)
                                    <option value="{{$all_per->id}}">{{$all_per->category_name}}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div> 


          <div class="form-group row">
            <label for="permission_name" class="col-sm-2 col-form-label"> Permission </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Permission Name" name="permission_name" id="permission_name" value="{{$PERM->permission_name}}" required="">
            </div>
          </div>


          <div class="form-group row">
                <label for="constant" class="col-sm-2 col-form-label"> Constant </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Constant" name="constant" id="constant" value="{{$PERM->constant}}" required="">
                </div>
          </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Permission Category </button>
      </div>
</form>




  <script>
    $(function()
    {      
        $("#permForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('permForm', "{{url('/admin/admin/add_permission')}}", 'edit_perm');

            displayPermission();
        });
    });        
  </script>