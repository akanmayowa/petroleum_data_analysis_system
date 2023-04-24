<form id="hseMedTriCenForm" action="{{url('she-accident-report')}}" method="POST">   
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_medical_training_center">



          <div class="form-group row">
            <label for="year_medi" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_medi" value="{{$MANAGE->year}}" required readonly>
            </div>
          </div> 


            
            <div class="form-group row">
                <label for="companies" class="col-sm-3 col-form-label"> Companies </label>
                <div class="col-sm-9">
                    <textarea rows="2" class="form-control" name="companies" id="companies" required>{{$MANAGE->companies}}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="facility_address" class="col-sm-3 col-form-label"> Facilities Address </label>
                <div class="col-sm-9">
                    <textarea rows="3" class="form-control" name="facility_address" id="facility_address" required>{{$MANAGE->facility_address}}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="approved_courses" class="col-sm-3 col-form-label"> Approved Cources </label>
                <div class="col-sm-9">
                    <textarea rows="4" class="form-control" name="approved_courses" id="approved_courses" required>{{$MANAGE->approved_courses}}</textarea>
                </div>
            </div>

        


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Medical Center </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseMedTriCenForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseMedTriCenForm', "{{url('/she-accident-report')}}", 'edit_med_cen');

            displayMedicalTrainingCenter();
        });


        $('#year_medi').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });
      
    });
</script>