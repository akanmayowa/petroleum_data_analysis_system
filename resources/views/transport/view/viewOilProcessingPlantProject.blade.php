
<form id="" action="{{url('/transport/add_processing_plant_project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PLANT->id}}" disabled>

        @php    
            $one_com = \App\company::where('id', $GAS_PLANT->company_id)->first();         
            $one_sta = \App\es_project_status::where('id', $GAS_PLANT->status_id)->where('id', '>=', '3')->where('id', '<=', '8')->first();
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$GAS_PLANT->year}}" disabled>
            </div>
        </div> 

        <div class="form-group row">
            <label for="project" class="col-sm-2 col-form-label"> Project </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Project" name="project" id="project" value="{{$GAS_PLANT->project}}" disabled="">
            </div>
        </div> 


          <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}}</option> @else <option> N/A </option> @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="others" class="col-sm-2 col-form-label other_upe"> Others </label>
            <div class="col-sm-10 other_upe">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others" value="$GAS_PLANT->others" disabled>
            </div>
          </div>


          

        <div class="form-group row">
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Terrain" name="terrain_id" id="terrain_id" value="{{$GAS_PLANT->terrain_id}}" disabled="">
            </div>

            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$GAS_PLANT->location}}" disabled="">
            </div>
        </div> 


        <div class="form-group row">
            <label for="expected_oil" class="col-sm-2 col-form-label"> Expected Prod Oil(Mbopd) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Oil In (MMScf)" name="expected_oil" id="expected_oil" value="{{$GAS_PLANT->expected_oil}}" disabled="">
            </div>

            <label for="expected_gas" class="col-sm-2 col-form-label"> Expected Prod Gas(MMScf) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Gas In (Mbopd)" name="expected_gas" id="expected_gas" value="{{$GAS_PLANT->expected_gas}}" disabled="">
            </div>
        </div>


        <div class="form-group row">
            <label for="expected_water" class="col-sm-2 col-form-label"> Expected Prod Water (Bbls) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Expected Production Water (Bbls)" name="expected_water" id="expected_water" value="{{$GAS_PLANT->expected_water}}" disabled="">
            </div>

            <label for="expected_efi" class="col-sm-2 col-form-label"> Expected Prod EFI </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Enhanced Facility Integrity" name="expected_efi" id="expected_efi" value="{{$GAS_PLANT->expected_efi}}" disabled="">
            </div>
        </div>

        <div class="form-group row">
            <label for="facility_type" class="col-sm-2 col-form-label"> Facility Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="facility_type" id="facility_type" disabled="" required>
                    @if($GAS_PLANT) <option value="{{$GAS_PLANT->facility_type}}"> {{$GAS_PLANT->facility_type}}</option> 
                    @else <option> Select </option> @endif
                </select>
            </div>

            <label for="development_type" class="col-sm-2 col-form-label"> Development Type </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Development Type" name="development_type" id="development_type" value="{{$GAS_PLANT->development_type}}" required="" disabled>
            </div>
        </div>




        <div class="form-group row">
            <label for="start_date_up" class="col-sm-2 col-form-label"> Start Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Project Start Date" name="start_date" id="start_date_up" value="{{$GAS_PLANT->start_date}}" disabled="">
            </div>

            <label for="completion_date" class="col-sm-2 col-form-label"> Completion Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Expected Completion Year" name="completion_date" id="completion_dated" value="{{$GAS_PLANT->completion_date}}" disabled="">
            </div>
        </div>

        <div class="form-group row">
            <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Status" name="status_id" id="statuses" value="{{$GAS_PLANT->status_id}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" class="form-control" placeholder="Project Remark" name="remark" id="remark" disabled>{{$GAS_PLANT->remark}}</textarea>
            </div>
        </div> 

         


        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_PLANT->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_PLANT->updated_at)->diffForHumans()}}
            </div>
          </div>
    </form>


