<form id="deptForm" action="{{url('/admin')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$department->id}}" required>
          <input type="hidden" name="date_dept" id="date_dept" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="adddepartment">


        <div class="form-group row">
              <label for="department_name" class="col-sm-2 col-form-label"><i class="">Department</i></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Department" name="department_name" id="department_name" value="{{$department->department_name}}" required>
              </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Department </button>
        </div>
</form>




  <script>
    $(function()
    {      
        $("#deptForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('deptForm', "{{url('/admin/adddepartment')}}", 'editdept');

            displayDepartment();
        });
    });        
  </script>