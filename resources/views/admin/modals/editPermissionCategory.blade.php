<form id="permCatForm" action="{{url('/admin')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$PERM->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_permission_category">


            <div class="form-group row">
                <label for="category_name" class="col-sm-2 col-form-label"> Category </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Category Name" name="category_name" id="category_name" value="{{$PERM->category_name}}" required="">
                </div>
            </div>


            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label"> Description </label>
                <div class="col-sm-10">
                    <textarea rows="3" class="form-control" placeholder="Category Description" name="description" id="description" required="">{{$PERM->description}}</textarea>
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
        $("#permCatForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('permCatForm', "{{url('/admin/add_permission_category')}}", 'edit_perm_cate');

            displayPermissionCategory();
        });
    });        
  </script>

      