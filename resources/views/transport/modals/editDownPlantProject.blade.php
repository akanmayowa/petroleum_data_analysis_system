<form id="esDownProjForm" action="{{url('/transport')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$PET_PLANT->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_down_project">

        @php 
            $one_tus = \App\es_project_status::where('id', $PET_PLANT->status)->first();                
            $all_tus = \App\es_project_status::orderBy('status_name', 'asc')->get();
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" value="{{$PET_PLANT->year}}" required readonly>
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
                    @if($one_tus) <option value="{{$one_tus->id}}"> {{$one_tus->status_name}} </option> @else <option value=""> Select Status </option> @endif
                    @if($all_tus)
                        @foreach($all_tus as $all_tus)
                            <option value="{{$all_tus->id}}"> {{$all_tus->status_name}} </option>                            
                        @endforeach
                    @endif
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

         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Plant Project </button>
        </div>
    </form>


    <script>
        $(function()
        {
            $("#esDownProjForm").on('submit', function(e)
            {   
                e.preventDefault();            
                editForm('esDownProjForm', "{{url('/transport')}}", 'edit_down_plant');

                displayDownstreamProject();
            });


            $('#start_year_').datepicker(
            {
              autoclose: true, startView: 'decade',format: "yyyy",
              viewMode: "years", 
              minViewMode: "years"
            })

            $('#estimated_completion_').datepicker(
            {
              autoclose: true, startView: 'decade',format: "yyyy",
              viewMode: "years", 
              minViewMode: "years"
            })
        });

        
    </script>