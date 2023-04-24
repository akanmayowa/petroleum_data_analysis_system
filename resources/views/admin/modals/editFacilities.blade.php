<form id="facForm" action="{{url('/admin/addfacility')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$FAC->id}}" required>
        <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addfacility">

        <div class="form-group row">
              <label for="facility_code" class="col-sm-2 col-form-label"> Facility code </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Facility Code" name="facility_code" id="facility_code" value="{{$FAC->facility_code}}" required readonly>
              </div>
        </div>


        <div class="form-group row">
              <label for="facility_name" class="col-sm-2 col-form-label"><i class="">Facility</i></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Facility Name" name="facility_name" id="facility_name" value="{{$FAC->facility_name}}" required>
              </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Facility </button>
      </div>
</form>




  <script>
    $(function()
    {      
        $("#facForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('facForm', "{{url('/admin/addfacility')}}", 'editfacility');

            displayFacility();
        });
    });        
  </script>