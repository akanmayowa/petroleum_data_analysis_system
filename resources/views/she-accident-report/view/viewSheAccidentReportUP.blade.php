<form id="" action="{{url('she-accident-report/add_she_accident_report_up')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$SHE_UP->id}}" disabled>


      

          <div class="form-group row">
            <label for="year_upe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - yyyy" name="year" id="year_upe" value="{{$SHE_UP->year}}" disabled="">
            </div>

            <label for="month_upe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_upe" value="{{$SHE_UP->month}}" disabled="">
            </div>
          </div> 

        


        <div class="form-group row">
            <label for="incidents_upe" class="col-sm-2 col-form-label"> Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Incidents" name="incidents" id="incidents_upe" value="{{$SHE_UP->incidents}}" disabled>
            </div>

            <label for="fatality_upe" class="col-sm-2 col-form-label"> Fatality </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality" name="fatality" id="fatality_upe" value="{{$SHE_UP->fatality}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_upe" class="col-sm-2 col-form-label"> Work Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work related" name="work_related" id="work_related_upe" value="{{$SHE_UP->work_related}}" disabled>
            </div>

            <label for="non_work_related_upe" class="col-sm-2 col-form-label"> Non Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work related" name="non_work_related" id="non_work_related_upe" value="{{$SHE_UP->non_work_related}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="fatal_incident_upe" class="col-sm-2 col-form-label"> Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control " placeholder="Fatality Incidents" name="fatal_incident" id="fatal_incident_upe" value="{{$SHE_UP->fatal_incident}}" disabled>
            </div>

            <label for="non_fatal_incident_upe" class="col-sm-2 col-form-label"> Non Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="non_fatal_incident" id="non_fatal_incident_upe" value="{{$SHE_UP->non_fatal_incident}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_fatal_incident_upe" class="col-sm-2 col-form-label"> Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work Related Fatal Incidents" name="work_related_fatal_incident" id="work_related_fatal_incident_upe" value="{{$SHE_UP->work_related_fatal_incident}}" disabled>
            </div>

            <label for="non_work_related_fatal_incident_upe" class="col-sm-2 col-form-label"> Non Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work Related Fatal Incidents" name="non_work_related_fatal_incident" id="non_work_related_fatal_incident_upe" value="{{$SHE_UP->non_work_related_fatal_incident}}" disabled>
            </div>
        </div>





        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($SHE_UP->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($SHE_UP->updated_at)->diffForHumans()}}
            </div>
          </div>


</form>





