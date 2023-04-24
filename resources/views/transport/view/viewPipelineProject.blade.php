<form id="" action="{{url('/transport/add_pipeline_project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$PIPELINE->id}}" disabled>

        @php 
            $one_own = \App\company::where('id', $PIPELINE->owner_id)->first();               
            $one_sta = \App\es_project_status::where('id', $PIPELINE->status_id)->first();      
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$PIPELINE->year}}" disabled>
            </div>
        </div> 

        <div class="form-group row">
            <label for="pipeline_name" class="col-sm-1 col-form-label"> Pipeline </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Pipeline Name" name="pipeline_name" id="pipeline_name" value="{{$PIPELINE->pipeline_name}}" disabled="">
            </div>

            <label for="owner_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="owner_id" id="owner_id" disabled>
                    @if($one_own)<option value="{{$one_own->id}}"> {{$one_own->company_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
        </div> 

        <div class="form-group row">
            <label for="owner_details" class="col-sm-1 col-form-label"> Others </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Owner Details" name="owner_details" id="owner_details" value="{{$PIPELINE->owner_details}}" disabled>
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="origin" class="col-sm-1 col-form-label"> Origin </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Origin" name="origin" id="origin" value="{{$PIPELINE->origin}}" disabled="">
            </div>

            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Destination" name="destination" id="destination" value="{{$PIPELINE->destination}}" disabled="">
            </div>
        </div>
          

        <div class="form-group row">
            <label for="nominal_size" class="col-sm-1 col-form-label"> Nominal Size </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Nominal Size" name="nominal_size" id="nominal_size" value="{{$PIPELINE->nominal_size}}" disabled="">
            </div>

            <label for="length" class="col-sm-1 col-form-label"> Length </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Length" name="length" id="length" value="{{$PIPELINE->length}}" disabled="">
            </div>
        </div>

          <div class="form-group row">            
            <label for="process_fluid" class="col-sm-1 col-form-label"> Process Fluid </label>
            <div class="col-sm-5">
                <select class="form-control" name="process_fluid" id="process_fluid" disabled>
                    @if($PIPELINE) <option value="{{$PIPELINE->process_fluid}}"> {{$PIPELINE->process_fluid}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="status_id" class="col-sm-1 col-form-label"> Status </label>
            <div class="col-sm-5">
                <select class="form-control" name="status_id" id="status_id" disabled>
                    @if($one_sta)<option value="{{$one_sta->id}}"> {{$one_sta->status_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
          </div>

        <div class="form-group row">
            <label for="start_date_pp" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Start Date" name="start_date" id="start_date_pp" value="{{$PIPELINE->start_date}}" disabled readonly>
            </div>

            <label for="commissioning_date_pp" class="col-sm-1 col-form-label"> Date of Commissioning  </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Expected Commission Date" name="commissioning_date" id="commissioning_date_pp" value="{{$PIPELINE->commissioning_date}}" disabled="" readonly>
            </div>
        </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-1 col-form-label"> Remark </label>
            <div class="col-sm-11">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark" disabled="" readonly>{{$PIPELINE->remark}}</textarea>
            </div>
          </div>




        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($PIPELINE->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($PIPELINE->updated_at)->diffForHumans()}}
            </div>
        </div>
    </form>