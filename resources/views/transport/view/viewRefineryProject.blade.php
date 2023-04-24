<form id="" action="{{url('/transport/add_refinery_project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_PROJ->id}}" disabled>

        @php                  
            $one_val = \App\es_project_status::where('id', $REF_PROJ->license_validity)->first();       
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$REF_PROJ->year}}" disabled>
            </div>
        </div> 

        <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label"> Project Name </label>
            <div class="col-sm-10">
                <textarea row="2" class="form-control" name="project_name" id="project_name" disabled>{{$REF_PROJ->project_name}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-10">
                <textarea row="2" class="form-control" name="field_id" id="field_id" disabled>{{$REF_PROJ->field_id}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="location" id="location" value="{{$REF_PROJ->location}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="capacity" class="col-sm-2 col-form-label"> Capacity (BPSD) </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity (BPSD)" name="capacity" id="capacity" value="{{$REF_PROJ->capacity}}" disabled>
            </div>

            <label for="refinery_type" class="col-sm-2 col-form-label"> Refinery Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="refinery_type" id="refinery_type" disabled>
                    @if($REF_PROJ) <option value="{{$REF_PROJ->refinery_type}}"> {{$REF_PROJ->refinery_type}} </option> 
                    @else <option value=""> N/A </option> @endif
                </select>
            </div>
        </div>
          

        <div class="form-group row">
            <label for="license_granted" class="col-sm-2 col-form-label"> License Granted </label>
            <div class="col-sm-4">
                <select class="form-control" name="license_granted" id="license_granted" disabled>                    
                    @if($REF_PROJ) <option value="{{$REF_PROJ->license_granted}}"> {{$REF_PROJ->license_granted}} </option> 
                    @else <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="estimated_completion_" class="col-sm-2 col-form-label">Expected Completion </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Expected Completion Year" name="estimated_completion" id="estimated_completion_" value="{{$REF_PROJ->estimated_completion}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="license_validity" class="col-sm-2 col-form-label"> License Validity </label>
            <div class="col-sm-4">
                <select class="form-control" name="license_validity" id="license_validity" disabled>
                    @if($one_val) <option value="{{$one_val->id}}"> {{$one_val->status_name}}</option> 
                    @else <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="license_expiration_date_" class="col-sm-2 col-form-label">License Expire on </label>
            <div class="col-sm-4">
                <input type="date" class="form-control" placeholder="License Expiry Date" name="license_expiration_date" id="license_expiration_date_" value="{{$REF_PROJ->license_expiration_date}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="status_remark" class="col-sm-2 col-form-label">Status Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="status_remark" id="status_remark" disabled>{{$REF_PROJ->status_remark}}</textarea>
            </div>
        </div>


         
        

        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($REF_PROJ->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($REF_PROJ->updated_at)->diffForHumans()}}
            </div>
        </div>
    </form>