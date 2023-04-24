<form id="" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$SHE_IW->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_accident_report_iw">


      

      <div class="form-group row">
        <label for="incident_date_iwe" class="col-sm-3 col-form-label"> Incident Year </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Month - Year" name="incident_date" id="incident_date_iwe" value="{{$SHE_IW->incident_date}}" required="" readonly>
        </div>
      </div> 

    


    <div class="form-group row">
        <label for="incidents_iwe" class="col-sm-3 col-form-label"> Incidents </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Incidents" name="incidents" id="incidents_iwe" value="{{$SHE_IW->incidents}}">
        </div>
    </div> 


    <div class="form-group row">
        <label for="work_related_iwe" class="col-sm-3 col-form-label"> Work Related </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Work related" name="work_related" id="work_related_iwe" value="{{$SHE_IW->work_related}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="non_work_related_iwe" class="col-sm-3 col-form-label"> Non Related </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Non Work related" name="non_work_related" id="non_work_related_iwe" value="{{$SHE_IW->non_work_related}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="fatal_incident_iwe" class="col-sm-3 col-form-label"> Fatality Incidents </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Fatality Incidents" name="fatal_incident" id="fatal_incident_iwe" value="{{$SHE_IW->fatal_incident}}">
        </div>
    </div> 




    <div class="form-group row">
        <label for="non_fatal_incident_iwe" class="col-sm-3 col-form-label"> Non Fatality Incidents </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="non_fatal_incident" id="non_fatal_incident_iwe" value="{{$SHE_IW->non_fatal_incident}}">
        </div>
    </div> 


    <div class="form-group row">
        <label for="work_related_fatal_incident_iwe" class="col-sm-3 col-form-label"> Work Fatal Related </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Work Related Fatal Incidents" name="work_related_fatal_incident" id="work_related_fatal_incident_iwe" value="{{$SHE_IW->work_related_fatal_incident}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="non_work_related_fatal_incident_iwe" class="col-sm-3 col-form-label"> Non Work Fatal Related </label>
        <div class="col-sm-9">
            <input type="number" class="form-control " placeholder="Non Work Related Fatal Incidents" name="non_work_related_fatal_incident" id="non_work_related_fatal_incident_iwe" value="{{$SHE_IW->non_work_related_fatal_incident}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="fatality_iwe" class="col-sm-3 col-form-label"> Fatality </label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="Fatality" name="fatality" id="fatality_iwe" value="{{$SHE_IW->fatality}}">
        </div>
    </div> 



    <div class="modal-footer" id="add_footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Industry Incidence </button>
    </div>
        
</form>






<script>
    $(function()
    {

        $('#incident_date_iwe').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

    });

</script>