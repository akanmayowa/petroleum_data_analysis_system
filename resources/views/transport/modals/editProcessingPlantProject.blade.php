<form id="esGasPlantForm" action="{{url('/transport')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PLANT->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_project">

        @php 
            $one_com = \App\company::where('id', $GAS_PLANT->company_id)->first();                
            $all_com = \App\company::orderBy('company_name', 'asc')->get();            
            $one_sta = \App\es_project_status::where('id', $GAS_PLANT->status_id)->first();         
            $all_sta = \App\es_project_status::orderBy('status_name', 'asc')->get();
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" value="{{$GAS_PLANT->year}}" required readonly>
            </div>
        </div>  

        <div class="form-group row">
            <label for="project_title" class="col-sm-2 col-form-label"> Title </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Project Title" name="project_title" id="project_title" value="{{$GAS_PLANT->project_title}}" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="project_objective" class="col-sm-2 col-form-label"> Objective </label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" class="form-control" placeholder="Project Objective" name="project_objective" id="project_objective" required="">{{$GAS_PLANT->project_objective}}</textarea>
            </div>
        </div>     




        <div class="form-group row">
            <label for="lng" class="col-sm-2 col-form-label"> LNG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity LNG" name="lng" id="lng" value="{{$GAS_PLANT->lng}}">
            </div>

            <label for="ng" class="col-sm-2 col-form-label"> NG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity NG" name="ng" id="ng" value="{{$GAS_PLANT->ng}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="cng" class="col-sm-2 col-form-label"> CNG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity CNG" name="cng" id="cng" value="{{$GAS_PLANT->cng}}">
            </div>
            
            <label for="lpg" class="col-sm-2 col-form-label"> LPG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity LPG" name="lpg" id="lpg" value="{{$GAS_PLANT->lpg}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="ngr" class="col-sm-2 col-form-label"> NGR </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity NGR" name="ngr" id="ngr" value="{{$GAS_PLANT->ngr}}">
            </div>
            
            <label for="condensate" class="col-sm-2 col-form-label"> Condensate </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Condensate" name="condensate" id="condensate" value="{{$GAS_PLANT->condensate}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="fertilizer" class="col-sm-2 col-form-label"> Fertilizer </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Fertilizer" name="fertilizer" id="fertilizer" value="{{$GAS_PLANT->fertilizer}}">
            </div>
            
            <label for="petrochemical" class="col-sm-2 col-form-label"> Petrochemical </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Petrochemical" name="petrochemical" id="petrochemical" value="{{$GAS_PLANT->petrochemical}}">
            </div>
        </div>

          

          <div class="form-group row">
            <label for="company_id_pppe" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_pppe" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> </option> @endif                   
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
          </div>

          <div class="form-group row other_">
            <label for="others" class="col-sm-2 col-form-label"> Others </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others" value="{{$GAS_PLANT->others}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Field / Location" name="location_id" id="location_id" value="{{$GAS_PLANT->location_id}}" required="">
            </div>
          </div>

        <div class="form-group row">
            <label for="start_date" class="col-sm-2 col-form-label"> Start Date </label>
            <div class="col-sm-4">
                <input type="date" class="form-control" placeholder="Start Date" name="start_date" id="start_date" value="{{$GAS_PLANT->start_date}}" required="">
            </div>

            <label for="end_date" class="col-sm-2 col-form-label"> Commission Date </label>
            <div class="col-sm-4">
                <input type="date" class="form-control" placeholder="Expected Commission Date" name="end_date" id="end_date" value="{{$GAS_PLANT->end_date}}" required="">
            </div>
        </div>

          <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>                    
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}}</option> 
                    @else <option value=""> Select Project Status </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Plant </button>
        </div>
    </form>



    <script>
        $(function()
        {
            $("#esGasPlantForm").on('submit', function(e)
            {   
                e.preventDefault();            
                editForm('esGasPlantForm', "{{url('/transport')}}", 'editgas_plant');

                displayGasProject();
            }); 


            //show others
            $('.other_').hide();
            $("#company_id_pppe").on('change',function(e)
            { 
                var comp = $('#company_id_pppe').val();
                if(comp == 0){ $('.other_').show(); }else if(comp != 0){ $('.other_').hide(); }
            });

            $('#start_dates').datepicker();


            

        });
    </script>