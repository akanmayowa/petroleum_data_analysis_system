<form id="hseWaterVolForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      @php 
          $one_com = \App\company::where('id', $WATER_VOL->company_id)->first();                      
          $all_com = \App\company::orderBy('company_name', 'asc')->get(); 
          $one_fac = \App\facility::where('id', $WATER_VOL->facility_id)->first();                     
          $all_fac = \App\facility::orderBy('facility_name', 'asc')->get();
      @endphp
      <input type="hidden" class="form-control" id="id" name="id" value="{{$WATER_VOL->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_water_volumes">


     
        <div class="form-group row">
            <label for="year_pwve" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_pwve" value="{{$WATER_VOL->year}}" required readonly>
            </div>

            <label for="month_pwve" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_pwve" value="{{$WATER_VOL->month}}" required readonly>
            </div>
          </div> 

        

        <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option> </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


        <div class="form-group row">
            <label for="facility_id" class="col-sm-2 col-form-label"> Facility </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Facility" name="facility_id" id="facility_id" value="{{$WATER_VOL->facility_id}}" required>
            </div>
        </div>



        <div class="form-group row">
            <label for="terrain" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Terrain" name="terrain" id="terrain" value="{{$WATER_VOL->terrain}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="concession_id" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Concession" name="concession_id" id="concession_id" value="{{$WATER_VOL->concession_id}}">
            </div>
        </div>

        {{-- <div class="form-group row">
            <label for="water_depth" class="col-sm-2 col-form-label"> Depth </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Water Depth" name="water_depth" id="water_depth" value="{{$WATER_VOL->water_depth}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="distance_from_shore" class="col-sm-2 col-form-label"> Distance</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Distance From Shore" name="distance_from_shore" id="distance_from_shore" value="{{$WATER_VOL->distance_from_shore}}" required>
            </div>
        </div>  --}}


        <div class="form-group row">
            <label for="volume" class="col-sm-2 col-form-label"> Volume </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Volume" name="volume" id="volume" value="{{$WATER_VOL->volume}}" required>
            </div>
        </div> 
          


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Water Volume </button>
        </div>


</form>




<script>
    $(function()
    {
        $("#hseWaterVolForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseWaterVolForm', "{{url('/she-accident-report')}}", 'edit_water_vol');

            displayWaterVol();
        });


        $('#year_pwve').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_pwve').datepicker
        ({
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });
              
    });
</script>