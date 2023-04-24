<form id="pCompForm" action="{{url('/admin/add_parent_company')}}" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$COMP_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_parent_company">
            {{ csrf_field() }}

          <div class="form-group row">
                <label for="company_code" class="col-sm-2 col-form-label"> Company code </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Parent Company Code" name="company_code" id="company_code" value="{{$COMP_->company_code}}" required readonly>
                </div>
          </div>

          <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label"> Company Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Parent Company Name" name="company_name" id="company_name" value="{{$COMP_->company_name}}" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label"> Address </label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" placeholder="Address" name="address" id="address" value="{{$COMP_->address}}"></textarea>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Parent Company</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#pCompForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('pCompForm', "{{url('/admin/add_parent_company')}}", 'editparentcomp');

            displayParentCompany();
        });
    });        
  </script>