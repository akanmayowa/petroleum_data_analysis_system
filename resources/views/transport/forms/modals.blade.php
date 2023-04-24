
<!-- Add Upstream Plant modal -->
<div id="add_oil_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Oil Production Development Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="oilplantForm" action="{{url('/transport/')}}" method="POST">
        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" class="form-control" name="type" id="" value="add_processing_plant_project">



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div>  

        <div class="form-group row">
            <label for="project" class="col-sm-2 col-form-label"> Project </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Project" name="project" id="project" required="">
            </div>
        </div> 

          <div class="form-group row">
            <label for="company_id_up" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_up" required>
                    <option value=""> Select Company </option>
                    @if($company_up)
                        @foreach($company_up as $company_up)
                            <option value="{{$company_up->id}}"> {{$company_up->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0">Others</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="others" class="col-sm-2 col-form-label other_up"> Others </label>
            <div class="col-sm-10 other_up">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others">
            </div>
          </div>

        <div class="form-group row">
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Terrain" name="terrain_id" id="terrain_id">
            </div>

            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location">
            </div>
        </div>


        <div class="form-group row">
            <label for="expected_oil" class="col-sm-2 col-form-label"> Expected Prod Oil (Mbopd) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Oil In (MMScf)" name="expected_oil" id="expected_oil">
            </div>

            <label for="expected_gas" class="col-sm-2 col-form-label"> Expected Prod Gas (MMScf) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Gas In (Mbopd)" name="expected_gas" id="expected_gas">
            </div>
        </div>


        <div class="form-group row">
            <label for="expected_water" class="col-sm-2 col-form-label"> Expected Prod Water (Bbls) </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Expected Production Water (Bbls)" name="expected_water" id="expected_water">
            </div>

            <label for="expected_efi" class="col-sm-2 col-form-label"> Expected Prod EFI </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Enhanced Facility Integrity" name="expected_efi" id="expected_efi">
            </div>
        </div>

        <div class="form-group row">
            <label for="facility_type" class="col-sm-2 col-form-label"> Facility Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="facility_type" id="facility_type">
                    <option> Select </option>
                    <option value="Flow station"> Flow station </option>  
                    <option value="Early Production Facility (EPF)"> Early Production Facility (EPF) </option>  
                    <option value="Fixed Offshore Platform"> Fixed Offshore Platform </option>    
                    <option value="Floating Production Storage & Offloading"> Floating Production Storage & Offloading </option> 
                    <option value="Floating Storage & Offloading"> Floating Storage & Offloading </option> 
                </select>
            </div>

            <label for="development_type" class="col-sm-2 col-form-label"> Development Type </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Development Type" name="development_type" id="development_type" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="start_date_up" class="col-sm-2 col-form-label"> Start Date </label>
            <div class="col-sm-4">
                <input type="date" class="form-control" placeholder="Project Start Date" name="start_date" id="start_date_up" readonly="">
            </div>

            <label for="completion_date" class="col-sm-2 col-form-label"> Completion Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Expected Completion Year" name="completion_date" id="completion_date" readonly="">
            </div>
        </div>

        <div class="form-group row">
            <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Status" name="status_id" id="statuses">
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" class="form-control" placeholder="Project Remark" name="remark" id="remark"></textarea>
            </div>
        </div> 

         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ppp_btn" id="add_ppp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Oil Development Project </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Upstream Projects modal -->
<div id="edit_oil_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Upstream(oil) projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editoilplant">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Upstream Project modal -->
<div id="upl_oil_plant" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Upstream(oil) projects Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_processing_plant_project">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-upstream-project-template') }}" download="Upstream Project Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Upstream Project Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Oil Upstream Projects modal -->
<div id="view_oil_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Upstream(oil) projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewoilplant">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Oil Upstream Projects modal -->
<div id="appup" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-90">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Oil Upstream Projects </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_up"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add License Refinery Project modal -->
<div id="add_ref_proj" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add License Refinery Project </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="refProjForm" action="{{url('/transport/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_refinery_project">



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div> 

        <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label"> Project Name </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" name="project_name" id="project_name"  required=""></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-10">
                <textarea row="2" class="form-control" name="field_id" id="field_id"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="location" id="location">
            </div>
        </div>


        <div class="form-group row">
            <label for="capacity" class="col-sm-2 col-form-label"> Capacity (BPSD) </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity (BPSD)" name="capacity" id="capacity" required="">
            </div>

            <label for="refinery_type" class="col-sm-2 col-form-label"> Refinery Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="refinery_type" id="refinery_type" required>
                    <option value=""> Select Refinery Type </option>
                    <option value="Conversion"> Conversion </option>
                    <option value="Modular"> Modular </option>
                    <option value="Topping plant"> Topping plant </option>
                    <option value="Hydro-Skimming Plant"> Hydro-Skimming Plant </option>
                    <option value="Conversion plant"> Conversion plant </option>
                </select>
            </div>
        </div>
          

        <div class="form-group row">
            <label for="license_granted" class="col-sm-2 col-form-label"> License Granted </label>
            <div class="col-sm-4">
                <select class="form-control" name="license_granted" id="license_granted">
                    <option value=""> Select License Granted </option>
                    <option value="ATC"> ATC </option>
                    <option value="ATR"> ATR </option>
                    <option value="LTE"> LTE </option>
                </select>
            </div>

            <label for="estimated_completion_" class="col-sm-2 col-form-label">Expected Completion </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Expected Completion Year" name="estimated_completion" id="estimated_completion_" readonly="">
            </div>
        </div>

        <div class="form-group row">
            <label for="license_validity" class="col-sm-2 col-form-label"> License Validity </label>
            <div class="col-sm-4">
                <select class="form-control" name="license_validity" id="license_validity">
                    <option value=""> Select License Validity </option>
                    @if($validity)
                        @foreach($validity as $validity)
                            <option value="{{$validity->id}}"> {{$validity->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="license_expiration_date" class="col-sm-2 col-form-label">License Expire on </label>
            <div class="col-sm-4">
                <input type="date" class="form-control" placeholder="License Expiry Date" name="license_expiration_date" id="license_expiration_date" >
            </div>
        </div>


        <div class="form-group row">
            <label for="status_remark" class="col-sm-2 col-form-label">Status Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="status_remark" id="status_remark"></textarea>
            </div>
        </div>

         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ppp_btn" id="add_ppp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Licensed Refinery Project </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit License Refinery Project modal -->
<div id="edit_ref_proj" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit License Refinery Project </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editrefproj">

       </div>
       </div>
    </div>
</div>  
</div>


<!-- Upload License Refinery Project modal -->
<div id="upl_ref_proj" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload License Refinery Project Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_refinery_project">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-refinery-project-template') }}" download="License Refinery Project Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample License Refinery Project Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Oil License Refinery Project modal -->
<div id="view_ref_proj" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View License Refinery Project </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewrefproj">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Oil License Refinery Project modal -->
<div id="apprefproj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-75">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Oil License Refinery Project </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ref_proj"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Downstream Petrochemical Plant modal -->
<div id="add_down_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Petrochemical Plant Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="downppForm" action="{{url('/transport/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_down_project">


        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div> 
          
        <div class="form-group row">
            <label for="company" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company - Operator" name="company" id="company">
            </div>
        </div>


        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Plant Location" name="location" id="location" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="plant_name" class="col-sm-2 col-form-label"> Plant Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Plant Name" name="plant_name" id="plant_name" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="plant_type" class="col-sm-2 col-form-label"> Plant Type </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Plant Type" name="plant_type" id="plant_type" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="project_desc_by_unit" class="col-sm-2 col-form-label"> Project Description </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Project Description" name="project_desc_by_unit" id="project_desc_by_unit" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="capacity_by_unit" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity By Unit" name="capacity_by_unit" id="capacity_by_unit" required="">
            </div>

            <label for="output_yield" class="col-sm-2 col-form-label"> Output </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Output Yield" name="output_yield" id="output_yield" required="">
            </div>
        </div> 

        <div class="form-group row">
            <label for="feed" class="col-sm-2 col-form-label"> feed </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="feed" name="feed" id="feed" required="">
            </div>

            <label for="statuses" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <select class="form-control" name="status" id="statuses" required>
                    <option value=""> Select Status </option>
                    @if($status_down)
                        @foreach($status_down as $status_down)
                            <option value="{{$status_down->id}}"> {{$status_down->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="start_year" class="col-sm-2 col-form-label"> Start Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Project Start Year" name="start_year" id="start_year" readonly>
            </div>

            <label for="estimated_completion" class="col-sm-2 col-form-label"> Completion Year</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Estimated Completion Year" name="estimated_completion" id="estimated_completion" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark / Comment </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Remark / Comment" name="remark" id="remark" required="">
            </div>
        </div>

         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Plant Project </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Petrochemical Plant Projects modal -->
<div id="edit_down_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Petrochemical Plant Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editdownplant">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Petrochemical Plant Projects modal -->
<div id="upl_down_plant" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Petrochemical Plant Projects Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_down_project">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-pet-plant-project-template') }}" download="Petrochemical Plant Projects Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Petrochemical Plant Projects Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Petrochemical Plant Projects modal -->
<div id="view_down_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Petrochemical Plant Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewdownplant">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Petrochemical Plant Projects  modal -->
<div id="apppetproj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-90">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Petrochemical Plant Projects  </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_pet_proj"></div>
          </div>
    </div>
    </div>  
</div>











<!-- Add Gas Projects modal -->
<div id="addgas_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Gas Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="gasplantForm" action="{{url('/transport/')}}" method="POST">
         @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_project">



        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div> 


        <div class="form-group row">
            <label for="project_title" class="col-sm-2 col-form-label"> Title </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Project Title" name="project_title" id="project_title" required="">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="project_objective" class="col-sm-2 col-form-label"> Objective </label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" class="form-control" placeholder="Project Objective" name="project_objective" id="project_objective" required=""></textarea>
            </div>
        </div> 



        <div class="form-group row">
            <label for="lng" class="col-sm-2 col-form-label"> LNG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity LNG" name="lng" id="lng">
            </div>

            <label for="ng" class="col-sm-2 col-form-label"> NG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity NG" name="ng" id="ng">
            </div>
        </div>

        <div class="form-group row">
            <label for="cng" class="col-sm-2 col-form-label"> CNG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity CNG" name="cng" id="cng">
            </div>
            
            <label for="lpg" class="col-sm-2 col-form-label"> LPG </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity LPG" name="lpg" id="lpg">
            </div>
        </div>


        <div class="form-group row">
            <label for="ngr" class="col-sm-2 col-form-label"> NGR </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity NGR" name="ngr" id="ngr">
            </div>
            
            <label for="condensate" class="col-sm-2 col-form-label"> Condensate </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Condensate" name="condensate" id="condensate">
            </div>
        </div>


        <div class="form-group row">
            <label for="fertilizer" class="col-sm-2 col-form-label"> Fertilizer </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Fertilizer" name="fertilizer" id="fertilizer">
            </div>
            
            <label for="petrochemical" class="col-sm-2 col-form-label"> Petrochemical </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Capacity Petrochemical" name="petrochemical" id="petrochemical">
            </div>
        </div>




          <div class="form-group row">
            <label for="company_id_ppp" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_ppp" required>
                    <option value=""> Select Company </option>
                    @if($companies_ppp)
                        @foreach($companies_ppp as $companies_ppp)
                            <option value="{{$companies_ppp->id}}"> {{$companies_ppp->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="others" class="col-sm-2 col-form-label other"> Others </label>
            <div class="col-sm-10 other">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others">
            </div>
          </div>

          <div class="form-group row">
            <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Field / Location" name="location_id" id="location_id" required="">
            </div>
          </div>

        <div class="form-group row">
            <label for="start_date_gas" class="col-sm-2 col-form-label"> Start Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Start Date" name="start_date" id="start_date_gas" required="" readonly>
            </div>

            <label for="end_date_gas" class="col-sm-2 col-form-label"> Date of Commissioning  </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Expected Commission Date" name="end_date" id="end_date_gas" required="" readonly>
            </div>
        </div>

          <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    <option value=""> Select Project Status </option>
                    @if($plant_status)
                        @foreach($plant_status as $plant_status)
                            <option value="{{$plant_status->id}}"> {{$plant_status->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ppp_btn" id="add_ppp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Project </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Gas  Projects modal -->
<div id="editgas_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Gas Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_gas_plant">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Gas Processing Plant Project modal -->
<div id="uplgas_plant" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Project Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_project">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-gas-project-template') }}" download="Gas Project Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Project Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Gas Projects modal -->
<div id="viewgas_plant" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Gas Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewgasplant">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Gas Projects modal -->
<div id="appgasproj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-90">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Projects </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_proj"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add pipeline Projects modal -->
<div id="addpipe" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Pipeline Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="pipeForm" action="{{url('/transport/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_pipeline_project">




        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div> 

        <div class="form-group row">
            <label for="pipeline_name" class="col-sm-1 col-form-label"> Pipeline </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Pipeline Name" name="pipeline_name" id="pipeline_name" required="">
            </div>

            <label for="owner_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="owner_id" id="owner_id" required>
                    <option value=""> Select Company </option>
                    @if($owner_ddl)
                        @foreach($owner_ddl as $owner_ddl)
                            <option value="{{$owner_ddl->id}}"> {{$owner_ddl->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
        </div>
          

        <div class="form-group row o_detail">
            <label for="owner_details" class="col-sm-1 col-form-label"> Other Company </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Other Company" name="owner_details" id="owner_details">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="origin" class="col-sm-1 col-form-label"> Origin </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Origin" name="origin" id="origin" required="">
            </div>

            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Destination" name="destination" id="destination" required="">
            </div>
        </div>
          

        <div class="form-group row">
            <label for="nominal_size" class="col-sm-1 col-form-label"> Nominal Size </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Nominal Size (Inches)" name="nominal_size" id="nominal_size" required="">
            </div>

            <label for="length" class="col-sm-1 col-form-label"> Length </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Length (Km)" name="length" id="length" required="">
            </div>
        </div>

          <div class="form-group row">            
            <label for="process_fluid" class="col-sm-1 col-form-label"> Process Fluid </label>
            <div class="col-sm-5">
                <select class="form-control" name="process_fluid" id="process_fluid" required>
                    <option value=""> Select Process Fluid </option>
                    <option value="Oil"> Oil </option>
                    <option value="Gas"> Gas </option>
                    <option value="Water"> Water </option>
                    <option value="Condensate"> Condensate </option>
                    <option value="Bulk"> Bulk (Oil, Gas, Water & Condensate) </option>
                </select>
            </div>

            <label for="status_id" class="col-sm-1 col-form-label"> Status </label>
            <div class="col-sm-5">
                <select class="form-control" name="status_id" id="status_id">
                    <option value=""> Select Status </option>
                    @if($pl_status)
                        @foreach($pl_status as $pl_status)
                            <option value="{{$pl_status->id}}"> {{$pl_status->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

        <div class="form-group row">
            <label for="start_date" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Start Date" name="start_date" id="start_date">
            </div>

            <label for="commissioning_date" class="col-sm-1 col-form-label"> Comm Date </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Expected Commission Date" name="commissioning_date" id="commissioning_date">
            </div>
        </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-1 col-form-label"> Remark </label>
            <div class="col-sm-11">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark"></textarea>
            </div>
          </div>

         

        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ppp_btn" id="add_ppp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Pipeline Project </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Pipeline Projects modal -->
<div id="editpipes" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Pipeline Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="modal-body">
       <div id="edit_pipes">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload pipeline Project modal -->
<div id="uplpipe" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Pipeline Project Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_pipeline_project">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-pipeline-project-template') }}" download="pipeline Project Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample pipeline Project Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View pipeline Projects modal -->
<div id="viewpipe" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Pipeline Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="view_pipe">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Pipeline Projects modal -->
<div id="apppipe" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-80">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Pipeline Projects </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>

          <div class="modal-body">
            <div id="app_pipe"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Metering Projects modal -->
<div id="addmeter" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Metering Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="meterForm" action="{{url('/transport/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" class="form-control" name="type" id="" value="add_metering">




        <div class="form-group row">
            <label for="year" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div> 

        <div class="form-group row">
            <label for="facility_id" class="col-sm-1 col-form-label"> Facility </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="facility_id" id="facility_id" required>
            </div>

            <label for="company_id_me" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id_me" required>
                    <option value=""> Select Company </option>
                    @if($company_ddl)
                        @foreach($company_ddl as $company_ddl)
                            <option value="{{$company_ddl->id}}"> {{$company_ddl->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
        </div> 
          

        <div class="form-group row other_me">
            <label for="others" class="col-sm-1 col-form-label"> Other Company </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Owner Details" name="others" id="others">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="objective" class="col-sm-1 col-form-label"> Objective </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Objective" name="objective" id="objective" required="">
            </div>

        </div>
          

        <div class="form-group row">
            <label for="service_id" class="col-sm-1 col-form-label"> Service </label>
            <div class="col-sm-5">
                <select class="form-control" name="service_id" id="service_id" required>
                    <option value=""> Select Service </option>
                    @if($service_ddl)
                        @foreach($service_ddl as $service_ddl)
                            <option value="{{$service_ddl->id}}"> {{$service_ddl->service_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="phase_id" class="col-sm-1 col-form-label"> Phase </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="phase_id" id="phase_id" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="start_date" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Start Date" name="start_date" id="start_date">
            </div>

            <label for="commissioning_date_me" class="col-sm-1 col-form-label"> Comm Date  </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Expected Commission Date" name="commissioning_date" id="commissioning_date_me">
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-1 col-form-label"> Remark </label>
            <div class="col-sm-11">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark"></textarea>
            </div>
        </div>

         

        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ppp_btn" id="add_ppp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Metering Project </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Metering Projects modal -->
<div id="editmeter" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Metering Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="modal-body">
       <div id="edit_meter">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Metering Project modal -->
<div id="uplmeter" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Metering Project Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_metering">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-metering-project-template') }}" download="Metering Project Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Metering Project Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Metering Projects modal -->
<div id="viewmeter" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Metering Projects </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="view_meter">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Metering Projects modal -->
<div id="appmeter" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-80">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Metering Projects </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>

          <div class="modal-body">
            <div id="app_meter"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Technology Adoptation modal -->
<div id="addtech" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Technology Adoptation </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="techForm" action="{{url('/transport/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" class="form-control" name="type" id="" value="add_technology">




        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
            </div>
        </div> 

        <div class="form-group row">
            <label for="technology" class="col-sm-2 col-form-label"> Technology </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Technology" name="technology" id="technology" required="">
            </div>
        </div> 


        <div class="form-group row">
            <label for="application" class="col-sm-2 col-form-label"> Application </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Application" name="application" id="application" required="">
            </div>
        </div> 
                
          

        <div class="form-group row">
            <label for="company_id_th" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company" name="company_id" id="company_id_th">
            </div>
        </div>
          

        <div class="form-group row">
            <label for="location_id_th" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Location" name="location_id" id="location_id_th">
            </div>
        </div>


        <div class="form-group row">
            <label for="adoptation_date_te" class="col-sm-2 col-form-label"> Approved Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Approved Date" name="adoptation_date" id="adoptation_date_te" required="" readonly="">
            </div>

            <label for="status_" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Status" name="status_id" id="status_" required="">
                {{-- <select class="form-control" name="status_id" id="status_" required>
                    <option value=""> Select Status </option>
                    @if($status_tech)
                        @foreach($status_tech as $status_tech)
                            <option value="{{$status_tech->id}}"> {{$status_tech->status_name}} </option>                            
                        @endforeach
                    @endif
                </select> --}}
            </div>
        </div> 

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark"></textarea>
            </div>
          </div>

         

        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ppp_btn" id="add_ppp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Technology</button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Technology Adoptation modal -->
<div id="edittech" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Technology Adoptation </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="modal-body">
       <div id="edit_tech">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Technology Adoptation modal -->
<div id="upltech" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Technology Adoptation Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('transport')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_technology">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-technology-project-template') }}" download="Technology Adoptation Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Technology Adoptation Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Technology Adoptation modal -->
<div id="viewtech" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Technology Adoptation </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="view_tech">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Technology Adoptation modal -->
<div id="apptech" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-80">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Technology Adoptation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>

          <div class="modal-body">
            <div id="app_tech"></div>
          </div>
    </div>
    </div>  
</div>







<!-- Success  modal -->
<div id="successModal" class="modal fade" role="dialog" style="margin-top: 10%">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">                    
                <div class="swal2-icon swal2-success animate" style="display: block;">
                    <span class="line tip animate-success-tip"></span> 
                    <span class="line long animate-success-long"></span>
                    <div class="placeholder"></div> <div class="fix"></div>
                </div>
            </div>

            <div class="modal-body">
                <center> <h2 class="swal2-title" style="margin-top:-40px">Record Approved for this Batch</h2> </center>
                <br>

                <div class="" style="text-align: center!important">
                    <button type="submit" name="succ_ok_btn" id="succ_ok_btn" class="btn btn-success btn-lg" data-dismiss="modal">
                        <i class="fa fa-check"></i> Ok </button>
                </div>
            </div>
        </div>
    </div>
</div>