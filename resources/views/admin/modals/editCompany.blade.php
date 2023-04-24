<form id="compForm" action="{{url('/admin/add_company')}}" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$COMP_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_company">
            {{ csrf_field() }}

          <div class="form-group row">
                <label for="company_code" class="col-sm-2 col-form-label"> Company code </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Company Code" name="company_code" id="company_code" value="{{$COMP_->company_code}}" required readonly>
                </div>
          </div>

          <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label"> Company Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" value="{{$COMP_->company_name}}" required>
                </div>

                <label for="contact_name" class="col-sm-2 col-form-label"> Contact Person </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Contact Person" name="contact_name" id="contact_name" value="{{$COMP_->contact_name}}">
                </div>
          </div>


          <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> Email </label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" placeholder="Company Email Address" name="email" id="email" value="{{$COMP_->email}}">
                </div>

                <label for="phone" class="col-sm-2 col-form-label"> Phone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Phone Number" name="phone" id="phone" value="{{$COMP_->phone}}">
                </div>
          </div>


          <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label"> Address </label>
                <div class="col-sm-4">
                    <textarea rows="2" class="form-control" placeholder="Company Address" name="address" id="address">{{$COMP_->address}}</textarea>
                </div>
                
                <label for="rc_number" class="col-sm-2 col-form-label"> RC Number </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company RC Number" name="rc_number" id="rc_number" value="{{$COMP_->rc_number}}">
                </div>
          </div>


          <div class="form-group row">
                <label for="license_expire_date_com" class="col-sm-2 col-form-label"> License Expire Date </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company License Expiring Date" name="license_expire_date" id="license_expire_date_com" value="{{$COMP_->license_expire_date}}">
                </div>
                
                <label for="operation_type" class="col-sm-2 col-form-label"> Operation Type </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Operation Type" name="operation_type" id="operation_type" value="{{$COMP_->operation_type}}">
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Company</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#compForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('compForm', "{{url('/admin/add_company')}}", 'editcomp');

            displayCompany();
        });
    });        
  </script>