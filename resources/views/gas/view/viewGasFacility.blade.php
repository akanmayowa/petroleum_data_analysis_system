
<form id="" action="{{url('/gas/add_gas_facility')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_FACILITY->id}}" disabled>

        @php 
            $one_com = \App\company::where('id', $GAS_FACILITY->company_id)->first();  
            $one_fac = \App\facility::where('id', $GAS_FACILITY->facility_id)->first();            
            $one_fac_typ = \App\facility_type::where('id', $GAS_FACILITY->facility_type_id)->first();   
            // $one_loc = \App\location::where('id', $GAS_FACILITY->location_id)->first();     
            $one_ter = \App\terrain::where('id', $GAS_FACILITY->terrain_id)->first();           
            $one_sta = \App\gas_status::where('id', $GAS_FACILITY->status_id)->first();          
        @endphp


        <div class="form-group row">
            <label for="year_face" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_face" value="{{$GAS_FACILITY->year}}" disabled>
            </div>  

            <label for="month_face" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_face" value="{{$GAS_FACILITY->month}}" disabled>
            </div>            
        </div>

      <div class="form-group row">
        <label for="company_id_face" class="col-sm-2 col-form-label"> Company </label>
        <div class="col-sm-10">
            <select class="form-control" name="company_id" id="company_id_face" disabled>
                @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="facility_id_face" class="col-sm-2 col-form-label"> Facility </label>
        <div class="col-sm-10">
            <select class="form-control" name="facility_id" id="facility_id_face" disabled>
                @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_name}} </option> @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="facility_type_id_face" class="col-sm-2 col-form-label"> Facility Type </label>
        <div class="col-sm-10">
            <select class="form-control" name="facility_type_id" id="facility_type_id_face" disabled>
                @if($one_fac_typ) <option value="{{$one_fac_typ->id}}"> {{$one_fac_typ->facility_type_name}}</option> @endif
            </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Gas Location" name="location_id" id="location_id" value="{{$GAS_FACILITY->location_id}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="terrain_id_face" class="col-sm-2 col-form-label"> Terrain </label>
        <div class="col-sm-10">
            <select class="form-control" name="terrain_id" id="terrain_id_face" disabled>
                @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}}</option> @endif
            </select>
        </div>
      </div>

    

    <div class="form-group row" style="height: 8px"> <hr> </div>


    <div class="form-group row">
        <label for="design_capacity" class="col-sm-2 col-form-label"> Design Cap </label>
        <div class="col-sm-4">
            <input type="number" class="form-control" placeholder="Design Capacity" name="design_capacity" id="design_capacity" value="{{$GAS_FACILITY->design_capacity}}" disabled="">
        </div>

        <label for="operating_capacity" class="col-sm-2 col-form-label"> Ops Capacity </label>
        <div class="col-sm-4">
            <input type="number" class="form-control" placeholder="Operation Capacity" name="operating_capacity" id="operating_capacity" value="{{$GAS_FACILITY->operating_capacity}}" disabled="">
        </div>
    </div>


    <div class="form-group row">
        <label for="facility_design_life" class="col-sm-2 col-form-label"> Design Life </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Facility Design Life" name="facility_design_life" id="facility_design_life" value="{{$GAS_FACILITY->facility_design_life}}" disabled="">
        </div>

        <label for="year_fac" class="col-sm-2 col-form-label"> Comm Year </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Commissioning Year" name="date_of_commissioning" id="year_fac" value="{{$GAS_FACILITY->date_of_commissioning}}" disabled="">
        </div>
    </div> 


      <div class="form-group row">
        <label for="status_id_fac" class="col-sm-2 col-form-label"> Status </label>
        <div class="col-sm-4">
            <select class="form-control" name="status_id" id="status_id_fac" disabled>
                @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}}</option> @endif
            </select>
        </div>

        <label for="license_status" class="col-sm-2 col-form-label"> License  </label>
        <div class="col-sm-4">
              <input type="text" class="form-control" name="license_status" id="license_status" value="{{$GAS_FACILITY->license_status}}" disabled>
            {{-- <select class="form-control" name="license_status" id="license_status" disabled>
                @if($GAS_FACILITY->license_status) <option value="{{$GAS_FACILITY->license_status}}"> {{$GAS_FACILITY->license_status}} </option> @endif
            </select> --}}
        </div>
      </div>


      <div class="modal-footer">
        <div class="col-sm-6 text-muted text-left">
            Uploaded @ {{\Carbon\Carbon::parse($GAS_FACILITY->created_at)->diffForHumans()}}
        </div>
        <div class="col-sm-6 text-muted text-right">
            Updated @ {{\Carbon\Carbon::parse($GAS_FACILITY->updated_at)->diffForHumans()}}
        </div>
      </div>
</form>



