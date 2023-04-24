
<form id="" action="{{url('/transport/add_down_project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$PET_PLANT->id}}" disabled>

        @php            
            $one_tus = \App\es_project_status::where('id', $PET_PLANT->status)->first();             
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$PET_PLANT->year}}" disabled>
            </div>
        </div> 

        <div class="form-group row">
            <label for="company" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company / Operator" name="company" id="company" value="{{$PET_PLANT->location}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Plant Location" name="location" id="location" value="{{$PET_PLANT->location}}" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="plant_name" class="col-sm-2 col-form-label"> Plant Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Plant Name" name="plant_name" id="plant_name" value="{{$PET_PLANT->plant_name}}" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="plant_type" class="col-sm-2 col-form-label"> Plant Type </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Plant Type" name="plant_type" id="plant_type" value="{{$PET_PLANT->plant_type}}"required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="project_desc_by_unit" class="col-sm-2 col-form-label"> Proj Description </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Project Description" name="project_desc_by_unit" id="project_desc_by_unit">{{$PET_PLANT->project_desc_by_unit}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="capacity_by_unit" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity By Unit" name="capacity_by_unit" id="capacity_by_unit" value="{{$PET_PLANT->capacity_by_unit}}" required="">
            </div>

            <label for="output_yield" class="col-sm-2 col-form-label"> Output </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Output Yield" name="output_yield" id="output_yield" value="{{$PET_PLANT->output_yield}}" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="feed" class="col-sm-2 col-form-label"> Feed </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Feed" name="feed" id="feed" value="{{$PET_PLANT->feed}}">
            </div>

            <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <select class="form-control" name="status" id="statuses" required>
                    @if($one_tus) <option value="{{$one_tus->id}}"> {{$one_tus->status_name}} </option> 
                    @else <option value="">  </option> @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="start_year_" class="col-sm-2 col-form-label"> Start Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Project Start Year" name="start_year" id="start_year_" value="{{$PET_PLANT->start_year}}" readonly>
            </div>

            <label for="estimated_completion_" class="col-sm-2 col-form-label"> Completion </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Estimated Completion Year" name="estimated_completion" id="estimated_completion_" value="{{$PET_PLANT->estimated_completion}}" readonly>
            </div>
        </div>


        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$PET_PLANT->remark}}</textarea>
            </div>
        </div>

         


        <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($PET_PLANT->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($PET_PLANT->updated_at)->diffForHumans()}}
            </div>
          </div>
    </form>

