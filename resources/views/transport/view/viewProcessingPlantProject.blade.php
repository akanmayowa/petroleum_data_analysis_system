
<form id="" action="{{url('/transport/add_gas_project')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PLANT->id}}" disabled>

        @php 
            $one_com = \App\company::where('id', $GAS_PLANT->company_id)->first();              
            $one_sta = \App\es_project_status::where('id', $GAS_PLANT->status_id)->first();      
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$GAS_PLANT->year}}" disabled>
            </div>
        </div> 

        <div class="form-group row">
            <label for="project_title" class="col-sm-2 col-form-label"> Title </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Project Title" name="project_title" id="project_title" value="{{$GAS_PLANT->project_title}}" disabled="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="project_objective" class="col-sm-2 col-form-label"> Objective </label>
            <div class="col-sm-10">
                <textarea type="text" rows="3" class="form-control" placeholder="Project Objective" name="project_objective" id="project_objective" disabled="">{{$GAS_PLANT->project_objective}}</textarea>
            </div>
        </div> 

        <div class="form-group row">
            <label for="lng" class="col-sm-2 col-form-label"> LNG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity LNG" name="lng" id="lng" value="{{$GAS_PLANT->lng}}" required="">
            </div>

            <label for="ng" class="col-sm-2 col-form-label"> NG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity NG" name="ng" id="ng" value="{{$GAS_PLANT->ng}}" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="cng" class="col-sm-2 col-form-label"> CNG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity CNG" name="cng" id="cng" value="{{$GAS_PLANT->cng}}" required="">
            </div>
            
            <label for="lpg" class="col-sm-2 col-form-label"> LPG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity LPG" name="lpg" id="lpg" value="{{$GAS_PLANT->lpg}}" required="">
            </div>
        </div>


        <div class="form-group row">
            <label for="ngr" class="col-sm-2 col-form-label"> NGR </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity NGR" name="ngr" id="ngr" value="{{$GAS_PLANT->ngr}}" required="">
            </div>
            
            <label for="condensate" class="col-sm-2 col-form-label"> Condensate </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Condensate" name="condensate" id="condensate" value="{{$GAS_PLANT->condensate}}" required="">
            </div>
        </div>


        <div class="form-group row">
            <label for="fertilizer" class="col-sm-2 col-form-label"> Fertilizer </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Fertilizer" name="fertilizer" id="fertilizer" value="{{$GAS_PLANT->fertilizer}}" required="">
            </div>
            
            <label for="petrochemical" class="col-sm-2 col-form-label"> Petrochemical </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Petrochemical" name="petrochemical" id="petrochemical" value="{{$GAS_PLANT->petrochemical}}" required="">
            </div>
        </div>
          

          <div class="form-group row">
            <label for="company_id_pppe" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_pppe" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="others" class="col-sm-2 col-form-label"> Others </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others" value="{{$GAS_PLANT->others}}" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Field / Location" name="location_id" id="location_id" value="{{$GAS_PLANT->location_id}}" required="" disabled>
            </div>
          </div>

        <div class="form-group row">
            <label for="start_date" class="col-sm-2 col-form-label"> Start Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="N/A" name="start_date" id="start_date" value="{{$GAS_PLANT->start_date}}" disabled="">
            </div>

            <label for="end_date" class="col-sm-2 col-form-label"> Commission Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="N/A" name="end_date" id="end_date" value="{{$GAS_PLANT->end_date}}" disabled="">
            </div>
        </div>

          <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" disabled>                    
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}}</option> @else <option value=""> N/A </option> @endif
                </select>
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



