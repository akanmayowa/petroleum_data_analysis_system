
<form id="" action="{{url('she-accident-report/add_she_offshore_safety_permit')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$PERMIT->id}}" required>


     
        <div class="form-group row">
            <label for="year_sp" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_sp" value="{{$PERMIT->year}}" disabled>
            </div>
          </div> 

        

        <div class="form-group row">
            <label for="personnel_registered" class="col-sm-3 col-form-label"> Personnel Registered </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Personnel Registered" name="personnel_registered" id="personnel_registered" value="{{$PERMIT->personnel_registered}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="personnel_captured" class="col-sm-3 col-form-label"> Personnel Captured </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Personnel Captured" name="personnel_captured" id="personnel_captured" value="{{$PERMIT->personnel_captured}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="permits_issued" class="col-sm-3 col-form-label"> Permit Issued </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Permit Issued" name="permits_issued" id="permits_issued" value="{{$PERMIT->permits_issued}}" disabled>
            </div>
        </div> 
          


        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($PERMIT->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($PERMIT->updated_at)->diffForHumans()}}
            </div>
        </div>


</form>






