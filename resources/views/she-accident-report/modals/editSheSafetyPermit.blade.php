<form id="hseSafePermForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$PERMIT->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_offshore_safety_permit">


     
        <div class="form-group row">
            <label for="year_sp" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_sp" value="{{$PERMIT->year}}" required readonly>
            </div>
          </div> 

        

        <div class="form-group row">
            <label for="personnel_registered" class="col-sm-3 col-form-label"> Personnel Registered </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Personnel Registered" name="personnel_registered" id="personnel_registered" value="{{$PERMIT->personnel_registered}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="personnel_captured" class="col-sm-3 col-form-label"> Personnel Captured </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Personnel Captured" name="personnel_captured" id="personnel_captured" value="{{$PERMIT->personnel_captured}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="permits_issued" class="col-sm-3 col-form-label"> Permit Issued </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Permit Issued" name="permits_issued" id="permits_issued" value="{{$PERMIT->permits_issued}}" required>
            </div>
        </div> 
          


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Safety Permit </button>
        </div>


</form>




<script>
    $(function()
    {
        $("#hseSafePermForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseSafePermForm', "{{url('/she-accident-report')}}", 'edit_safe_perm');

            displaySafetyPermit();
        });


        $('#year_sp').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });
              
    });
</script>