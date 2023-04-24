<form id="" action="{{url('she-accident-report/add_she_accident_report_down')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$SHE_DOWN->id}}" disabled="">


     

          <div class="form-group row">
            <label for="year_upe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - yyyy" name="year" id="year_downe" value="{{$SHE_DOWN->year}}" disabled="">
            </div>

            <label for="month_upe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_downe" value="{{$SHE_DOWN->month}}" disabled="">
            </div>
          </div> 

        

        <div class="form-group row">
            <label for="incidents_downe" class="col-sm-2 col-form-label"> Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Incidents" name="incidents" id="incidents_downe" value="{{$SHE_DOWN->incidents}}" disabled>
            </div>

            <label for="fatality_downe" class="col-sm-2 col-form-label"> Fatality </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality" name="fatality" id="fatality_downe" value="{{$SHE_DOWN->fatality}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_downe" class="col-sm-2 col-form-label"> Work Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work related" name="work_related" id="work_related_downe" value="{{$SHE_DOWN->work_related}}" disabled>
            </div>

            <label for="non_work_related_downe" class="col-sm-2 col-form-label"> Non Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work related" name="non_work_related" id="non_work_related_downe" value="{{$SHE_DOWN->non_work_related}}" disabled > 
            </div>
        </div>


        <div class="form-group row">
            <label for="fatal_incident_downe" class="col-sm-2 col-form-label"> Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality Incidents" name="fatal_incident" id="fatal_incident_downe" value="{{$SHE_DOWN->fatal_incident}}" disabled>
            </div>

            <label for="non_fatal_incident_downe" class="col-sm-2 col-form-label"> Non Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="non_fatal_incident" id="non_fatal_incident_downe" value="{{$SHE_DOWN->non_fatal_incident}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_fatal_incident_downe" class="col-sm-2 col-form-label"> Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work Related Fatal Incidents" name="work_related_fatal_incident" id="work_related_fatal_incident_downe" value="{{$SHE_DOWN->work_related_fatal_incident}}" disabled>
            </div>

            <label for="non_work_related_fatal_incident_downe" class="col-sm-2 col-form-label"> Non Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work Related Fatal Incidents" name="non_work_related_fatal_incident" id="non_work_related_fatal_incident_downe" value="{{$SHE_DOWN->non_work_related_fatal_incident}}" disabled>
            </div>
        </div>
 



        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($SHE_DOWN->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($SHE_DOWN->updated_at)->diffForHumans()}}
            </div>
          </div>


</form>



