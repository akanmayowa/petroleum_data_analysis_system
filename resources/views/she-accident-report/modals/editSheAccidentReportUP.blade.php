<form id="hseUpIncidentForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$SHE_UP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_accident_report_up">


      

          <div class="form-group row">
            <label for="year_upe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - yyyy" name="year" id="year_upe" value="{{$SHE_UP->year}}" required="" readonly>
            </div>

            <label for="month_upe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_upe" value="{{$SHE_UP->month}}" required="" readonly>
            </div>
          </div> 

        


        <div class="form-group row">
            <label for="incidents_upe" class="col-sm-2 col-form-label"> Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Incidents" name="incidents" id="incidents_upe" value="{{$SHE_UP->incidents}}">
            </div>

            <label for="fatality_upe" class="col-sm-2 col-form-label"> Fatality </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality" name="fatality" id="fatality_upe" value="{{$SHE_UP->fatality}}">
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_upe" class="col-sm-2 col-form-label"> Work Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work related" name="work_related" id="work_related_upe" value="{{$SHE_UP->work_related}}">
            </div>

            <label for="non_work_related_upe" class="col-sm-2 col-form-label"> Non Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work related" name="non_work_related" id="non_work_related_upe" value="{{$SHE_UP->non_work_related}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="fatal_incident_upe" class="col-sm-2 col-form-label"> Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control " placeholder="Fatality Incidents" name="fatal_incident" id="fatal_incident_upe" value="{{$SHE_UP->fatal_incident}}">
            </div>

            <label for="non_fatal_incident_upe" class="col-sm-2 col-form-label"> Non Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="non_fatal_incident" id="non_fatal_incident_upe" value="{{$SHE_UP->non_fatal_incident}}">
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_fatal_incident_upe" class="col-sm-2 col-form-label"> Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work Related Fatal Incidents" name="work_related_fatal_incident" id="work_related_fatal_incident_upe" value="{{$SHE_UP->work_related_fatal_incident}}">
            </div>

            <label for="non_work_related_fatal_incident_upe" class="col-sm-2 col-form-label"> Non Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work Related Fatal Incidents" name="non_work_related_fatal_incident" id="non_work_related_fatal_incident_upe" value="{{$SHE_UP->non_work_related_fatal_incident}}">
            </div>
        </div>





        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Upstream Incident </button>
        </div>


</form>





<script>
    $(function()
    {
        $("#hseUpIncidentForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseUpIncidentForm', "{{url('/she-accident-report')}}", 'editupstream');

            displayUpstream();
        });




        $('#year_upe').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_upe').datepicker
        ({
          format: "MM",
          viewMode: "months", 
          minViewMode: "months"
        });
        
    });
</script>