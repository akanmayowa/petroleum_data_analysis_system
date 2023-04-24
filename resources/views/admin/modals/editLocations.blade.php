<form id="locForm" action="{{url('/admin/addlocation')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$LOC->id}}" required>
        <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="addlocation">


      <div class="form-group row">
            <label for="location_name" class="col-sm-2 col-form-label"><i class="">Location</i></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Gas Locations" name="location_name" id="location_name" value="{{$LOC->location_name}}" required>
            </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Location </button>
      </div>
</form>




  <script>
    $(function()
    {      
        $("#locForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('locForm', "{{url('/admin/addlocation')}}", 'editlocation');

            displayLocation();
        });
    });        
  </script>