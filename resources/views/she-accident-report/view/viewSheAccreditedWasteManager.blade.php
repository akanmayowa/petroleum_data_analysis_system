<form id="" action="{{url('she-accident-report/add_she_accredited_waste_manager')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>



          

          <div class="form-group row">
            <label for="year_mane" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_mane" value="{{$MANAGE->year}}"  disabled>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="type_of_facility_id" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="type_of_facility_id" id="type_of_facility_id" disabled>
                    @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_type_name}} </option> @else <option value=""> Select Facility Type </option> @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="facility_description" class="col-sm-3 col-form-label"> Facility Description </label>
            <div class="col-sm-9">
                <textarea rows="2" class="form-control" placeholder="Facility Description" name="facility_description" id="facility_description" disabled>{{$MANAGE->facility_description}}</textarea>
            </div>
        </div>


        <div class="form-group row">
            <label for="state_id" class="col-sm-3 col-form-label"> Location Area </label>
            <div class="col-sm-9">
                <select class="form-control" name="state_id" id="state_id" disabled>
                    @if($one_loc) <option value="{{$one_loc->id}}"> {{$one_loc->state_name}} </option> @endif
                </select>
            </div>
        </div>


        


        <div class="form-group row">
            <label for="operational_status_id" class="col-sm-3 col-form-label"> Operational Status </label>
            <div class="col-sm-9">
                <select class="form-control" name="operational_status_id" id="operational_status_id" disabled>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}} </option> @endif
                </select>
            </div>
        </div>




        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($MANAGE->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($MANAGE->updated_at)->diffForHumans()}}
            </div>
          </div>

</form>
