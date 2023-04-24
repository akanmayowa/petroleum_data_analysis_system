<form id="" action="{{url('/transport/add_metering')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$METER->id}}" disabled>

        @php 
            $one_fac = \App\facility::where('id', $METER->facility_id)->first();              $one_com = \App\company::where('id', $METER->company_id)->first();   
            $one_ser = \App\es_service::where('id', $METER->service_id)->first();             $one_pha = \App\es_project_status::where('id', $METER->phase_id)->first();
        @endphp


          

        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$METER->year}}" disabled>
            </div>
        </div> 

        <div class="form-group row">
            <label for="facility_id" class="col-sm-1 col-form-label"> Facility </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="facility_id" id="facility_id" value="{{$METER->facility_id}}" disabled>
            </div>

            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com)<option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="others_" class="col-sm-1 col-form-label"> Other Company </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Other Company" name="others" id="others_" disabled>
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="objective" class="col-sm-1 col-form-label"> Objective </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Objective" name="objective" id="objective" value="{{$METER->objective}}" disabled="">
            </div>

        </div>
          

        <div class="form-group row">
            <label for="service_id" class="col-sm-1 col-form-label"> Service </label>
            <div class="col-sm-5">
                <select class="form-control" name="service_id" id="service_id" disabled>
                    @if($one_ser)<option value="{{$one_ser->id}}"> {{$one_ser->service_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="phase_id" class="col-sm-1 col-form-label"> Phase </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="phase_id" id="phase_id" value="{{$METER->phase_id}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="start_date_me" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Start Date" name="start_date" id="start_date_me" value="{{$METER->start_date}}" disabled="" readonly>
            </div>

            <label for="commissioning_date_me" class="col-sm-1 col-form-label"> Comm Date  </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Expected Commission Date" name="commissioning_date" id="commissioning_date_me" value="{{$METER->commissioning_date}}" disabled="" readonly>
            </div>
        </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-1 col-form-label"> Remark </label>
            <div class="col-sm-11">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark" disabled="">{{$METER->remark}}</textarea>
            </div>
          </div>
        



        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($METER->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($METER->updated_at)->diffForHumans()}}
            </div>
        </div>
    </form>