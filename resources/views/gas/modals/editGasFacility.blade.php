<form id="gasFaciForm" action="{{url('/gas')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_FAC->id}}" required>
    <input type="hidden" class="form-control" name="type" id="" value="add_gas_facility">  

    @php 
        $one_com = \App\company::where('id', $GAS_FAC->company_id)->first();                $all_com = \App\company::get();
        $one_fac = \App\facility::where('id', $GAS_FAC->facility_id)->first();                 $all_fac = \App\facility::get();
        $one_fac_typ = \App\facility_type::where('id', $GAS_FAC->facility_type_id)->first();     $all_fac_typ = \App\facility_type::where('type_id', '3')->get();
        // $one_loc = \App\location::where('id', $GAS_FAC->location_id)->first();              $all_loc = \App\location::get();
        $one_ter = \App\terrain::where('id', $GAS_FAC->terrain_id)->first();                $all_ter = \App\terrain::get();
        $one_sta = \App\gas_status::where('id', $GAS_FAC->status_id)->first();              $all_sta = \App\gas_status::get();
    @endphp


    <div class="form-group row">
        <label for="year_face" class="col-sm-2 col-form-label"> Year </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="year" id="year_face" value="{{$GAS_FAC->year}}" required="" readonly>
        </div>  

        <label for="month_face" class="col-sm-2 col-form-label"> Month </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="month" id="month_face" value="{{$GAS_FAC->month}}" required="" readonly>
        </div>            
    </div>

      <div class="form-group row">
        <label for="company_id_face" class="col-sm-2 col-form-label"> Company </label>
        <div class="col-sm-10">
            <select class="form-control" name="company_id" id="company_id_face" required>
                @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                @else<option value=""></option>@endif
                @if($all_com)
                    @foreach($all_com as $all_com)
                        <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="facility_id_face" class="col-sm-2 col-form-label"> Facility </label>
        <div class="col-sm-10">
            <select class="form-control" name="facility_id" id="facility_id_face" required>
                @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_name}} </option> 
                @else<option value=""></option>@endif
                @if($all_fac)
                    @foreach($all_fac as $all_fac)
                        <option value="{{$all_fac->id}}"> {{$all_fac->facility_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="facility_type_id_face" class="col-sm-2 col-form-label"> Facility Type </label>
        <div class="col-sm-10">
            <select class="form-control" name="facility_type_id" id="facility_type_id_face" required>
                @if($one_fac_typ) <option value="{{$one_fac_typ->id}}"> {{$one_fac_typ->facility_type_name}}</option> 
                @else<option value=""></option>@endif
                @if($all_fac_typ)
                    @foreach($all_fac_typ as $all_fac_typ)
                        <option value="{{$all_fac_typ->id}}"> {{$all_fac_typ->facility_type_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Gas Location" name="location_id" id="location_id" value="{{$GAS_FAC->location_id}}" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="terrain_id_face" class="col-sm-2 col-form-label"> Terrain </label>
        <div class="col-sm-10">
            <select class="form-control" name="terrain_id" id="terrain_id_face" required>
                @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}}</option> 
                @else<option value=""></option>@endif
                @if($all_ter)
                    @foreach($all_ter as $all_ter)
                        <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>

    

    <div class="form-group row" style="height: 8px"> <hr> </div>


    <div class="form-group row">
        <label for="design_capacity" class="col-sm-2 col-form-label"> Design Cap </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Design Capacity" name="design_capacity" id="design_capacity" value="{{$GAS_FAC->design_capacity}}">
        </div>

        <label for="operating_capacity" class="col-sm-2 col-form-label"> Ops Capacity </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Operation Capacity" name="operating_capacity" id="operating_capacity" value="{{$GAS_FAC->operating_capacity}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="facility_design_life" class="col-sm-2 col-form-label"> Design Life </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Facility Design Life" name="facility_design_life" id="facility_design_life" value="{{$GAS_FAC->facility_design_life}}">
        </div>

        <label for="year_fac" class="col-sm-2 col-form-label"> Comm Year </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Commissioning Year" name="date_of_commissioning" id="year_fac" value="{{$GAS_FAC->date_of_commissioning}}">
        </div>
    </div> 


      <div class="form-group row">
        <label for="status_id_fac" class="col-sm-2 col-form-label"> Status </label>
        <div class="col-sm-4">
            <select class="form-control" name="status_id" id="status_id_fac" required>
                @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}}</option> 
                @else<option value=""></option> @endif
                @if($all_sta)
                    @foreach($all_sta as $all_sta)
                        <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>

        <label for="license_status" class="col-sm-2 col-form-label"> License  </label>
        <div class="col-sm-4">            
              <input type="text" class="form-control" name="license_status" id="license_status" value="{{$GAS_FAC->license_status}}">
            {{-- <select class="form-control" name="license_status" id="license_status">
                @if($GAS_FAC->license_status) <option value="{{$GAS_FAC->license_status}}"> {{$GAS_FAC->license_status}} </option> 
                @else<option value=""></option> @endif
                <option value="Yes"> Yes </option>
                <option value="No"> No </option>
            </select> --}}
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Facility </button>
      </div>
</form>


<script type="text/javascript">

    $(function()
    {
        $("#gasFaciForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasFaciForm', "{{url('/gas')}}", 'editgas_facility');

            displayFacility();
        });



        $('#year_face').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        $('#month_face').datepicker(
        {
          autoclose: true, format: "MM",
          viewMode: "months", 
          minViewMode: "months"
        })


    });

</script>

      