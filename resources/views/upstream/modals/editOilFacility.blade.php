<form id="upOilFacForm" action="{{url('/upstream')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_FAC->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_oil_facility">


        @php 
            $one_com = \App\company::where('id', $GAS_FAC->company_id)->first();                $all_com = \App\company::get();
            $one_fac = \App\facility::where('id', $GAS_FAC->facility_id)->first();                 $all_fac = \App\facility::get();
            $one_fac_typ = \App\facility_type::where('id', $GAS_FAC->facility_type_id)->first();     $all_fac_typ = \App\facility_type::where('type_id', '1')->get();
            $one_loc = \App\location::where('id', $GAS_FAC->location_id)->first();              $all_loc = \App\location::get();
            $one_ter = \App\terrain::where('id', $GAS_FAC->terrain_id)->first();                $all_ter = \App\terrain::get();
            $one_sta = \App\gas_status::where('id', $GAS_FAC->status_id)->first();              $all_sta = \App\gas_status::where('id', '>=', '2')->where('id', '<=', '4')->get(); 
            $one_lic = \App\up_license_status::where('id', $GAS_FAC->license_status)->first();     $all_lic = \App\up_license_status::where('id', '<>', '2')->get(); 
        @endphp


        <div class="form-group row">
            <label for="year_face" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_face" value="{{$GAS_FAC->year}}" readonly="">
            </div>  

            <label for="month_face" class="col-sm-1 col-form-label"> Month </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_face" value="{{$GAS_FAC->month}}" readonly="">
            </div>            
        </div>

      <div class="form-group row">
        <label for="company_id_face" class="col-sm-1 col-form-label"> Company </label>
        <div class="col-sm-11">
            <select class="form-control" name="company_id" id="company_id_face" required>
                @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                @if($all_com)
                    @foreach($all_com as $all_com)
                        <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="facility_id_face" class="col-sm-1 col-form-label"> Facility </label>
        <div class="col-sm-5">
            <select class="form-control" name="facility_id" id="facility_id_face" required>
                @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_name}} </option> @endif
                @if($all_fac)
                    @foreach($all_fac as $all_fac)
                        <option value="{{$all_fac->id}}"> {{$all_fac->facility_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>

        <label for="facility_type_id_face" class="col-sm-1 col-form-label"> Facility Type </label>
        <div class="col-sm-5">
            <select class="form-control" name="facility_type_id" id="facility_type_id_face" required>
                @if($one_fac_typ) <option value="{{$one_fac_typ->id}}"> {{$one_fac_typ->facility_type_name}}</option> @endif
                @if($all_fac_typ)
                    @foreach($all_fac_typ as $all_fac_typ)
                        <option value="{{$all_fac_typ->id}}"> {{$all_fac_typ->facility_type_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="location_id_face" class="col-sm-1 col-form-label"> Location </label>
        <div class="col-sm-5">
            <select class="form-control" name="location_id" id="location_id_face" required>
                @if($one_loc) <option value="{{$one_loc->id}}"> {{$one_loc->location_name}}</option> @endif
                @if($all_loc)
                    @foreach($all_loc as $all_loc)
                        <option value="{{$all_loc->id}}"> {{$all_loc->location_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>

        <label for="terrain_id_face" class="col-sm-1 col-form-label"> Terrain </label>
        <div class="col-sm-5">
            <select class="form-control" name="terrain_id" id="terrain_id_face" required>
                @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}}</option> @endif
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
        <label for="design_capacity" class="col-sm-1 col-form-label"> Design Cap </label>
        <div class="col-sm-5">
            <input type="number" class="form-control" placeholder="Design Capacity" name="design_capacity" id="design_capacity" value="{{$GAS_FAC->design_capacity}}" required="">
        </div>

        <label for="operating_capacity" class="col-sm-1 col-form-label"> Ops Capacity </label>
        <div class="col-sm-5">
            <input type="number" class="form-control" placeholder="Operation Capacity" name="operating_capacity" id="operating_capacity" value="{{$GAS_FAC->operating_capacity}}" required="">
        </div>
    </div>


    <div class="form-group row">
        <label for="facility_design_life" class="col-sm-1 col-form-label"> Design Life </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" placeholder="Facility Design Life" name="facility_design_life" id="facility_design_life" value="{{$GAS_FAC->facility_design_life}}" required="">
        </div>

        <label for="year_fac" class="col-sm-1 col-form-label"> Comm Year </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" placeholder="Commissioning Year" name="date_of_commissioning" id="year_fac" value="{{$GAS_FAC->date_of_commissioning}}" required="">
        </div>
    </div> 


      <div class="form-group row">
        <label for="status_id_fac" class="col-sm-1 col-form-label"> Status </label>
        <div class="col-sm-5">
            <select class="form-control" name="status_id" id="status_id_fac" required>
                @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}}</option> @endif
                @if($all_sta)
                    @foreach($all_sta as $all_sta)
                        <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                    @endforeach
                @endif
            </select>
        </div>

        <label for="license_status" class="col-sm-1 col-form-label"> License  </label>
        <div class="col-sm-5">
            <select class="form-control" name="license_status" id="license_status" required>
                @if($one_lic) <option value="{{$one_lic->id}}"> {{$one_lic->license_status_name}} </option> @else <option value=""> Select License Status </option>  @endif
                @if($all_lic)
                    @foreach($all_lic as $all_lic)
                        <option value="{{$all_lic->id}}"> {{$all_lic->license_status_name}} </option>                            
                    @endforeach
                @endif
            </select>
            </select>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Oil Facility </button>
      </div>
</form>

<script>

    $(function()
    {      
        $("#upOilFacForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upOilFacForm', "{{url('/upstream')}}", 'edit_oil_fac');

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




        $('#start_date_oile').datepicker
        ({
          autoclose: true ,format: "yyyy-mm-dd"      
        })

        $('#end_date_oile').datepicker
        ({
          autoclose: true ,format: "yyyy-mm-dd"      
        })

    });

</script>

      