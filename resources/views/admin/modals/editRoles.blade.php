<form id="roleForm" action="{{url('admin/add_roles')}}" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$ROLE_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_roles">
            {{ csrf_field() }}

          <div class="form-group row">
                <label for="role_name" class="col-sm-3 col-form-label"> Role Name </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Role Name" name="role_name" id="role_name" value="{{$ROLE_->role_name}}" required>
                </div>
          </div>


          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label"> Description </label>
            <div class="col-sm-9">
                <textarea rows="2" class="form-control" placeholder="Role Description" name="description" id="description" required>{{$ROLE_->description}}</textarea>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Role</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#roleForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('roleForm', "{{url('/admin/add_roles')}}", 'editrole');

            displayRoles();
        });
    });        
  </script>