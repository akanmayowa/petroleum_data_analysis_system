<form id="esUpOilForm" action="{{url('/transport')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PLANT->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_processing_plant_project">

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
                <label for="project" class="col-sm-2 col-form-label"> Project </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Project" name="project" id="project" value="{{$GAS_PLANT->project}}" required="">
                </div>
            </div> 


          <div class="form-group row">
            <label for="company_ide" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_upe" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}}</option> 
                    @else <option> Select Company </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0">Others</option>
                </select>
            </div>
          </div>

          <div class="form-group row"> 
            <label for="others" class="col-sm-2 col-form-label other_upe"> Others </label>
            <div class="col-sm-10 other_upe">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others">
            </div>
          </div>

          

        <div class="form-group row">
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Terrain" name="terrain_id" id="terrain_id" value="{{$GAS_PLANT->terrain_id}}">
            </div>

            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$GAS_PLANT->location}}" >
            </div>
        </div> 


        <div class="form-group row">
            <label for="expected_oil" class="col-sm-2 col-form-label"> Expected Prod Oil (Mbopd) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Oil In (MMScf)" name="expected_oil" id="expected_oil" value="{{$GAS_PLANT->expected_oil}}">
            </div>

            <label for="expected_gas" class="col-sm-2 col-form-label"> Expected Prod Gas (MMScf) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Gas In (Mbopd)" name="expected_gas" id="expected_gas" value="{{$GAS_PLANT->expected_gas}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="expected_water" class="col-sm-2 col-form-label"> Expected Prod Water (Bbls) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Expected Production Water (Bbls)" name="expected_water" id="expected_water" value="{{$GAS_PLANT->expected_water}}">
            </div>

            <label for="expected_efi" class="col-sm-2 col-form-label"> Expected Prod EFI </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Enhanced Facility Integrity" name="expected_efi" id="expected_efi" value="{{$GAS_PLANT->expected_efi}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="facility_type" class="col-sm-2 col-form-label"> Facility Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="facility_type" id="facility_type">
                    @if($GAS_PLANT) <option value="{{$GAS_PLANT->facility_type}}"> {{$GAS_PLANT->facility_type}}</option> 
                    @else <option> Select </option> @endif
                    <option value="Flow station"> Flow station </option>  
                    <option value="Early Production Facility (EPF)"> Early Production Facility (EPF) </option>  
                    <option value="Fixed Offshore Platform"> Fixed Offshore Platform </option>    
                    <option value="Floating Production Storage & Offloading"> Floating Production Storage & Offloading </option> 
                    <option value="Floating Storage & Offloading"> Floating Storage & Offloading </option> 
                </select>
            </div>

            <label for="development_type" class="col-sm-2 col-form-label"> Development Type </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Development Type" name="development_type" id="development_type" value="{{$GAS_PLANT->development_type}}" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="start_date_up" class="col-sm-2 col-form-label"> Start Date </label>
            <div class="col-sm-4">
                <input type="date" class="form-control" placeholder="Project Start Date" name="start_date" id="start_date_up" value="{{$GAS_PLANT->start_date}}">
            </div>

            <label for="completion_dated" class="col-sm-2 col-form-label"> Completion Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Expected Completion Year" name="completion_date" id="completion_dated" value="{{$GAS_PLANT->completion_date}}" readonly="">
            </div>
        </div>

        <div class="form-group row">
            <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Status" name="status_id" id="statuses" value="{{$GAS_PLANT->status_id}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Project Remark" name="remark" id="remark">{{$GAS_PLANT->remark}}</textarea>
            </div>
        </div> 
         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Oil Development Project </button>
        </div>
    </form>



<script>
    $(function()
    {
        $("#esUpOilForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('esUpOilForm', "{{url('/transport')}}", 'edit_oil_plant');

            displayUpstreamProject();
        });


        $('#completion_dated').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      })


        //Appending Company, For Upstream Oil Projects
        $('#concession_ide').change(function(e)
        { 
            var id = $(this).val(); 
             $('#company_id_oil_e').val(''); 
              $.get('{{url('getConcessionDetails')}}?id=' +id, function(data)
              {   //alert(id);               
                $.each(data, function(index, companyObj)
                {
                    $('#company_id_oil_e').val( companyObj.company_id);        
                    console.log(companyObj);
                });
              }); 
        });

        $('#start_date_upe').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
        })




        $('.other_upe').hide();
        $("#company_id_upe").on('change',function(e)
        { 
            var comp = $('#company_id_upe').val();
            if(comp == 0){ $('.other_upe').show(); }else if(comp != 0){ $('.other_upe').hide(); }
        });
    });
</script>