
<form id="" action="{{url('she-accident-report/add_she_water_volumes')}}" method="POST">
    @php 
          $one_com = \App\company::where('id', $WATER_VOL->company_id)->first();      
          $one_fac = \App\facility::where('id', $WATER_VOL->facility_id)->first();                   
    @endphp
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$WATER_VOL->id}}" required>


     
        <div class="form-group row">
            <label for="year_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_e" value="{{$WATER_VOL->year}}" disabled>
            </div>

            <label for="month" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month" value="{{$WATER_VOL->month}}" disabled>
            </div>
          </div> 

        

        <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else N/A @endif
            </div>
          </div>


        <div class="form-group row">
            <label for="facility_id" class="col-sm-2 col-form-label"> Facility </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Facility" name="facility_id" id="facility_id" value="{{$WATER_VOL->facility_id}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="terrain" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Terrain" name="terrain" id="terrain" value="{{$WATER_VOL->terrain}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="concessio_id" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Concession" name="concessio_id" id="concessio_id" value="{{$WATER_VOL->concessio_id}}" disabled>
            </div>
        </div>


        {{-- <div class="form-group row">
            <label for="water_depth" class="col-sm-2 col-form-label"> Depth </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Water Depth" name="water_depth" id="water_depth" value="{{$WATER_VOL->water_depth}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="distance_from_shore" class="col-sm-2 col-form-label"> Distance</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Distance From Shore" name="distance_from_shore" id="distance_from_shore" value="{{$WATER_VOL->distance_from_shore}}" disabled>
            </div>
        </div>  --}}


        <div class="form-group row">
            <label for="volume" class="col-sm-2 col-form-label"> Volume </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Volume" name="volume" id="volume" value="{{$WATER_VOL->volume}}" disabled>
            </div>
        </div> 
          


        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($WATER_VOL->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($WATER_VOL->updated_at)->diffForHumans()}}
            </div>
          </div>


</form>





