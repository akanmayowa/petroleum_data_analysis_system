
<!-- Add Oil Prospective License modal -->
<div id="addbala_opl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add (OPL) Oil Prospective License</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form  id="opl_Forms" action="{{url('/upstream')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="type" id="" value="add_bala_opl">

          <div class="form-group row">
            <label for="year_opl" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year YYYY" name="year" id="year_opl" required readonly>
            </div>

            <label for="concession_held_id_opl" class="col-sm-2 col-form-label"> Concession Held </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_held_id" id="concession_held_id_opl" required>
                    <option value=""> Select Concession Held </option>
                    @if($concessions)
                        @foreach($concessions as $concessions)
                            <option value="{{$concessions->id}}"> {{$concessions->concession_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
          

          <div class="form-group row" style="display: none;">
            <div class="col-sm-6">
                <input type="hidden" class="form-control" name="company_id" id="company_id_opl" required>
            </div>

            <div class="col-sm-6">
                <input type="hidden" class="form-control" name="contract_type" id="contract_type_opl" required>
            </div>
          </div>

          <div class="form-group row">
                <label for="equity_distribution_opl" class="col-sm-2 col-form-label"> Equity Distribution </label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" placeholder="Equity Distribution" name="equity_distribution" id="equity_distribution_opl"></textarea>
                </div>
          </div>

          <div class="form-group row">
            <label for="year_of_award_opl" class="col-sm-2 col-form-label"> Award Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="yyyy" id="year_of_award_opl" name="year_of_award">
            </div>

            <label for="license_expire_date_opl" class="col-sm-2 col-form-label"> License Expires </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="license_expire_date_opl" name="license_expire_date">
            </div>
        </div>

          <div class="form-group row">
                <label for="area_opl" class="col-sm-2 col-form-label"> Area (SQ.KM) </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Area In Square Kilometer (sq.km)" name="area" id="area_opl">
                </div>
          </div>

          <div class="form-group row">
                <label for="geological_terrain_id_opl" class="col-sm-2 col-form-label"> Geological Terrain </label>
                <div class="col-sm-10">
                    <select class="form-control" name="geological_terrain_id" id="geological_terrain_id_opl" required>
                        <option value=""> Select Geological Terrain </option>
                        @if($terrain_opl)
                            @foreach($terrain_opl as $terrain_opl)
                                <option value="{{$terrain_opl->id}}"> {{$terrain_opl->terrain_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="comment_opl" class="col-sm-2 col-form-label"> Comment</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" rows="2" placeholder="Comment Here" name="comment" id="comment_opl"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_opl_btn" id="add_opl_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add OPL </button>
          </div>
            </form>
        
        </div>
    </div>
    </div>  
</div>


<!-- Edit Oil Prospective License modal -->
<div id="editbala_opl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit (OPL) Oil Prospective License</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_balaopl">  </div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Oil Prospective License modal -->
<div id="uplbala_opl" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Oil Prospective License Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_bala_opl">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-opl-template') }}" id="" download="Sample Oil Prospective License Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Oil Prospective License Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Oil Prospective License modal -->
<div id="viewbala_opl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">View (OPL) Oil Prospective License</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewbalaopl">  </div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Oil Mining Lease modal -->
<div id="addbala_oml" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add (OML) Oil Mining Lease</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="omlForm" action="{{url('upstream')}}" method="POST">          
          {{ csrf_field() }}
          <input type="hidden" class="form-control" name="type" id="" value="add_bala_oml">

          <div class="form-group row">
            <label for="year_oml" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year YYYY" name="year" id="year_oml" required readonly>
            </div>
       
            <label for="concession_held_id_oml" class="col-sm-2 col-form-label"> Concession Held </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_held_id" id="concession_held_id_oml" required>
                    <option value=""> Select Concession Held </option>
                    @if($concession)
                        @foreach($concession as $concessions)
                            <option value="{{$concessions->id}}"> {{$concessions->concession_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" style="display: none;">
            <label for="company_id_oml" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="company_id" id="company_id_oml" required="">
            </div>

            <label for="contract_type_oml" class="col-sm-2 col-form-label">  Contract Type </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="contract_type" id="contract_type_oml" readonly="">
            </div>
          </div>

          <div class="form-group row">
                <label for="equity_distribution_oml" class="col-sm-2 col-form-label"> Equity Distribution </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Equity Distribution" name="equity_distribution" id="equity_distribution_oml" >
                </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Date Of Grant </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="date_of_grant" name="date_of_grant">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <label class="col-sm-2 col-form-label"> Expires On </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="license_expire_date_oml" name="license_expire_date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>

          <div class="form-group row">
                <label for="area_oml" class="col-sm-2 col-form-label"> Area (SQ.KM) </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Area In Square Kilometer (sq.km)" name="area" id="area_oml">
                </div>
          </div>

          <div class="form-group row">
                <label for="geological_terrain_id_oml" class="col-sm-2 col-form-label"> Geological Terrain </label>
                <div class="col-sm-10">
                    <select class="form-control" name="geological_terrain_id" id="geological_terrain_id_oml" required>
                        <option value=""> Select Geological Terrain </option>
                        @if($terrain_oml)
                            @foreach($terrain_oml as $terrain_oml)
                                <option value="{{$terrain_oml->id}}"> {{$terrain_oml->terrain_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="comment_oml" class="col-sm-2 col-form-label"> Comment</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" rows="2" placeholder="Comment Here" name="comment" id="comment_oml"></textarea>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_oml_btn" id="add_oml_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add OML </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Oil Mining Lease modal -->
<div id="editbala_oml" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Oil Mining Lease</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_balaoml"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Oil Mining Lease modal -->
<div id="uplbala_oml" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Oil Mining Lease Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_bala_oml">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-oml-template') }}" id="" download="Sample Oil Mining Lease Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Oil Mining Lease Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View Oil Mining Lease modal -->
<div id="viewbala_oml" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">View Oil Mining Lease</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewbalaoml"></div>
          </div>
    </div>
    </div>  
</div>








 <!-- Add list Of Marginal Fields modal -->
<div id="addbala_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add list Of Marginal Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="fieldForm" action="{{url('upstream')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="date_mf" id="date_mf" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_marginal_field">

          <div class="form-group row">
            <label for="field_id_mf" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_mf" required>
                    <option value=""> Select Field </option>
                    @if($marginal_fields)
                        @foreach($marginal_fields as $marginal_fields)
                            <option value="{{$marginal_fields->id}}"> {{$marginal_fields->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
          

          <div class="form-group row">
                <input type="hidden" class="form-control" placeholder="Companyr" name="company_id" id="company_id_mf" readonly="" required>

                <label for="blocks" class="col-sm-2 col-form-label"> OML Number  </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="OML Number" name="blocks" id="blocks" readonly="" required>
                </div>
          </div>
                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_mf_btn" id="add_mf_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Marginal Field </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit list Of Marginal Fields modal -->
<div id="editbala_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit list Of Marginal Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_balamfield"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload list Of Marginal Fields modal -->
<div id="uplbala_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload list Of Marginal Fields Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_marginal_field">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="downloadMarginalTemplate" download="Sample Marginal Fields Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Marginal Fields Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View list Of Marginal Fields modal -->
<div id="view_balamfield" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">View list Of Marginal Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="vieweditbalamfield"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Multi-Client Data Projects Status modal -->
<div id="addbala_data_ps" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title"> Add Multi-Client Data Projects Status </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>

          <div class="modal-body">
          <form id="pStatusForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_data_project_status">
          

          <div class="form-group row">
            <label for="year_ps" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_ps" required readonly>
            </div>
          </div>


          <div class="form-group row">
            <label for="company_id_dps" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_dps" required>
                    <option value=""> Select Company </option>
                    @if($company_dps)
                        @foreach($company_dps as $company_dps)
                            <option value="{{$company_dps->id}}"> {{$company_dps->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="survey_name" class="col-sm-2 col-form-label"> Survey Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Survey Name" name="survey_name" id="survey_name" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="agreement_date" class="col-sm-2 col-form-label"> Agreement Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Agreement Date" name="agreement_date" id="agreement_date" required>
            </div>

            <label for="year_of_survey" class="col-sm-2 col-form-label"> Year of Survey </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year Of Survey" name="year_of_survey" id="year_of_survey" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="area_of_survey_block_id" class="col-sm-2 col-form-label"> Area Of Survey </label>
            <div class="col-sm-10">
                <select class="form-control" name="area_of_survey_block_id" id="area_of_survey_block_id" required>
                    <option value=""> Select Block Area Of Survey </option>
                    @if($area_of_surveys)
                        @foreach($area_of_surveys as $area_of_surveys)
                            <option value="{{$area_of_surveys->id}}"> {{$area_of_surveys->area_of_survey_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="type_of_survey_project_id" class="col-sm-2 col-form-label"> Type Of Survey </label>
            <div class="col-sm-10">
                <select class="form-control" name="type_of_survey_project_id" id="type_of_survey_project_id" required>
                    <option value=""> Select Project Type Of Survey </option>
                    @if($type_of_surveys)
                        @foreach($type_of_surveys as $type_of_surveys)
                            <option value="{{$type_of_surveys->id}}"> {{$type_of_surveys->type_of_survey_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="quantum_of_survey" class="col-sm-2 col-form-label"> Quantum of Survey </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Quantum of Survey, Km/Km2" name="quantum_of_survey" id="quantum_of_survey" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" rows="2" placeholder="Remark" name="remark" id="remark" required></textarea>
            </div>
          </div>
                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ps_btn" id="add_ps_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Multi-client Project</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


 <!-- Edit Multi-Client Data Projects Status modal -->
<div id="editbala_data_ps" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg"> Edit Multi-Client Data Projects Status
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_baladataps"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Multi-Client Data Projects Status modal -->
<div id="uplbala_data_ps" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Multi-Client Data Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('/upstream')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="type" id="" value="upload_data_project_status">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-multi-client-template') }}" id="" download="Multi-Client Data Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Multi-Client Data Excel Template"> <i class="fa fa-download"></i> Download Template</a>

                    {{-- <a href="{{asset('/assets/excel/Templates/Concession/Sample Multi Client Data.xlsx')}}" download="Sample Multi Client Data Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Multi Client Data Excel Template"> <i class="fa fa-download"></i> Download Template</a> --}}
                </form>
        </div>
        </div>
    </div>
    </div>  
</div>


 <!-- View Multi-Client Data Projects Status modal -->
<div id="viewbala_data_ps" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg"> View Multi-Client Data Projects Status
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewbaladataps"></div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Multi-Client Data Projects Status modal -->
<div id="app_mclient" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Multi-Client Data Projects Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appmclient"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Acreage Situation modal -->
<div id="add_open_acr" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title"> Add Open Acreage Situation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>

          <div class="modal-body">
          <form id="openAcrForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_open_acreage">
          

          <div class="form-group row">
            <label for="year_acr" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_acr" required readonly>
            </div>
          </div>


          <div class="form-group row">
            <label for="basin_id" class="col-sm-2 col-form-label"> Basin / Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="basin_id" id="basin_id" required>
                    <option value=""> </option>
                    @if($basin)
                        @foreach($basin as $basin)
                            <option value="{{$basin->id}}"> {{$basin->basin_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="opl_blocks_allocated" class="col-sm-2 col-form-label"> OPL Blocks </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="OPL Blocks" name="opl_blocks_allocated" id="opl_blocks_allocated" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="oml_blocks_allocated" class="col-sm-2 col-form-label"> OML Blocks </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="OML Blocks" name="oml_blocks_allocated" id="oml_blocks_allocated" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="blocks_open" class="col-sm-2 col-form-label"> Open Blocks </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Open Blocks" name="blocks_open" id="blocks_open" required>
            </div>
          </div>


                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_open_btn" id="add_open_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Open Acreage</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


 <!-- Edit Acreage Situation modal -->
<div id="edit_open_acr" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg"> Edit Acreage Situation
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editopenacr"></div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Acreage Situation modal -->
<div id="upl_open_acr" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Open Acreage Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('/upstream')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="type" id="" value="upload_open_acreage">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-open-acreage-template') }}" id="" download="Open Acreage Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Open Acreage Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Acreage Situation modal -->
<div id="app_open_acr" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Acreage Situation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appopenacr"></div>
          </div>
    </div>
    </div>  
</div>










 <!-- Add Reserve Condensate modal -->
<div id="addres" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Condensate Reserves </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="reserveForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_reserve">
          

          <div class="form-group row">
            <label for="year_res" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_res" required="" readonly>
            </div>

            <label for="month_res" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_res" readonly>
            </div>
          </div> 

          {{-- <br><br>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Upload </label>
            <div class="col-sm-10">

              <label class="container"> <span style="margin-left: 20px"> By Contract </span>
                  <input type="radio" name="type_id" id="contc" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> By Terrain </span>
                  <input type="radio" name="type_id" id="terrc" value="2">  <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> By Field </span>
                  <input type="radio" name="type_id" id="fielc" value="3">  <span class="checkmark"></span>
                </label> 

            </div>
          </div> 
          <br><br>

          <div class="form-group row" id="contc_id" style="display: none;">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract </option>
                    @if($contract_con)
                        @foreach($contract_con as $contract_con)
                            <option value="{{$contract_con->id}}"> {{$contract_con->contract_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" id="terrc_id" style="display: none;">
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id">
                    <option value=""> Select Terrain </option>
                    @if($terrain_con)
                        @foreach($terrain_con as $terrain_con)
                            <option value="{{$terrain_con->id}}"> {{$terrain_con->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> --}}

          <div class="form-group row" id="fielc_id">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                    @if($company_con)
                        @foreach($company_con as $company_con)
                            <option value="{{$company_con->id}}"> {{$company_con->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" id="fielc_id">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract </option>
                    @if($contract_con)
                        @foreach($contract_con as $contract_con)
                            <option value="{{$contract_con->id}}"> {{$contract_con->contract_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         

          <div class="form-group row">
            <label for="condensate_reserves" class="col-sm-2 col-form-label"> 2P Condensate </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="condensate_reserves" id="condensate_reserves" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" title="In MMbbls" required>
            </div>
          </div>               

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_res_btn" id="add_res_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Condensate Reserves </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Reserve modal Condensate -->
<div id="editres" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Condensate Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_res">
          
            </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Reserve Condensate modal -->
<div id="uplres" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Condensate Reserves Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form class="" action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_reserve">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark btn-sm pull-left" />

                    <a href="{{ url('download-oil-condensate-template') }}" id="" download="Condensate Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Condensate Reserve Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Reserve Condensate modal -->
<div id="view_res" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Condensate Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewres">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Condensate modal -->
<div id="appcond" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Condensate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_cond"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Reserve OIL modal -->
<div id="addresoil" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Oil Reserves </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="resoilForm" action="{{url('/upstream')}}" method="POST">
          @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_reserve_oil">
          

          <div class="form-group row">
            <label for="year_res_oil" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_res_oil" required="" readonly>
            </div>

            <label for="month_res_oil" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_res_oil" readonly>
            </div>
          </div> 

          {{-- <br><br>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Upload </label>
            <div class="col-sm-10">

                <label class="container"> <span style="margin-left: 20px"> By Contract </span>
                  <input type="radio" name="type_id" id="cont" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> By Terrain </span>
                  <input type="radio" name="type_id" id="terr" value="2">  <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> By Field </span>
                  <input type="radio" name="type_id" id="fiel" value="3">  <span class="checkmark"></span>
                </label>            
               
            </div>
          </div> 
          <br><br>

          <div class="form-group row" id="cont_id" style="display: none;">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract </option>
                    @if($contract_oil)
                        @foreach($contract_oil as $contract_oil)
                            <option value="{{$contract_oil->id}}"> {{$contract_oil->contract_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" id="terr_id" style="display: none;">
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id">
                    <option value=""> Select Terrain </option>
                    @if($terrain_roil)
                        @foreach($terrain_roil as $terrain_roil)
                            <option value="{{$terrain_roil->id}}"> {{$terrain_roil->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> --}}

          <div class="form-group row" id="">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                    @if($company_oils)
                        @foreach($company_oils as $company_oils)
                            <option value="{{$company_oils->id}}"> {{$company_oils->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" id="">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract </option>
                    @if($contract_oil)
                        @foreach($contract_oil as $contract_oil)
                            <option value="{{$contract_oil->id}}"> {{$contract_oil->contract_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="oil_reserves" class="col-sm-2 col-form-label"> 2P Oil </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="oil_reserves" id="oil_reserves" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" title="In MMbbls" required>
            </div>
          </div>   
            

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_res_btn" id="add_res_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Oil Reserves </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Reserve modal OIL -->
<div id="editresoil" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit OIL Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_res_oil">
          
            </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Reserve OIL modal -->
<div id="uplresoil" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload OIL Reserves Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form class="" action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_reserve_oil">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark btn-sm pull-left" />

                    <a href="{{ url('download-oil-reserve-template') }}" id="" download="OIL Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download OIL Reserve Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Reserve OIL modal -->
<div id="view_res_oil" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Oil Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewresoil">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Oil modal -->
<div id="appoil" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Oil</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_oil"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Reserve Replacement Rate modal -->
<div id="add_rate" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Reserve Replacement Rate  </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="rateForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_replacement_rate">
          

          <div class="form-group row">
            <label for="year_rate" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_rate" required="" readonly>
            </div>

            <label for="month_rate" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_rate" readonly>
            </div>
          </div> 


          <div class="form-group row" id="contc_id">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract </option>
                    @if($contract_rate)
                        @foreach($contract_rate as $contract_rate)
                            <option value="{{$contract_rate->id}}"> {{$contract_rate->contract_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         

          <div class="form-group row">
            <label for="oil_condensate_reserve" class="col-sm-2 col-form-label"> 2P Oil & Condensates Reserves </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="oil_condensate_reserve" id="oil_condensate_reserve" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" title="In MMbbls" required>
            </div>
          </div> 
         

          <div class="form-group row">
            <label for="oil_condensate_production" class="col-sm-2 col-form-label"> Oil & Condensates Prodcution </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="oil_condensate_production" id="oil_condensate_production" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" title="In MMbbls" required>
            </div>
          </div>               

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_res_btn" id="add_res_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Replacement Rate </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Reserve Replacement Rate modal Condensate -->
<div id="edit_rate" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Reserve Replacement Rate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrate">
          
            </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Reserve Replacement Rate modal -->
<div id="upl_rate" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Reserves Replacement Rate Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form class="" action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_replacement_rate">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark btn-sm pull-left" />

                    <a id="downloadReplacementRateTemplate" download="Reserve Replacement Rate Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Reserve Replacement Rate Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Reserve Replacement Rate modal -->
<div id="view_rate" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Replacement Rate Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrate">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Replacement Rate modal -->
<div id="app_rate" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Replacement Rate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="apprate"></div>
          </div>
    </div>
    </div>  
</div>




 <!-- Add Reserve Depletion Rate modal -->
<div id="add_depl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Reserve Depletion Rate  </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="deplForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_depletion_rate">
          

          <div class="form-group row">
            <label for="year_depl" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_depl" required="" readonly>
            </div>

            <label for="month_depl" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_depl" readonly>
            </div>
          </div> 


          <div class="form-group row" id="contc_id">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                    @if($company_depl)
                        @foreach($company_depl as $company_depl)
                            <option value="{{$company_depl->id}}"> {{$company_depl->company_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row" id="contc_id">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract </option>
                    @if($contract_depl)
                        @foreach($contract_depl as $contract_depl)
                            <option value="{{$contract_depl->id}}"> {{$contract_depl->contract_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         

          <div class="form-group row">
            <label for="prev_oil_condensate" class="col-sm-2 col-form-label">Prev Oil + Condensate Reserve(MMbbls)</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="prev_oil_condensate" id="prev_oil_condensate" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" required>
            </div>
          </div> 

         

          <div class="form-group row">
            <label for="curr_oil_condensate" class="col-sm-2 col-form-label">Curr Oil + Condensate Reserve(MMbbls)</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="curr_oil_condensate" id="curr_oil_condensate" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" required>
            </div>
          </div> 
         

          <div class="form-group row">
            <label for="production" class="col-sm-2 col-form-label">Production </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="production" id="production" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" required>
            </div>
          </div> 
         

          <div class="form-group row">
            <label for="net_addition" class="col-sm-2 col-form-label"> Net Addition </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="net_addition" id="net_addition" onkeyup="checktotal(this)" value="0" data-toggle="tooltip"required>
            </div>
          </div>  
         

          <div class="form-group row">
            <label for="percent_net_addition" class="col-sm-2 col-form-label"> % Net Addition </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="percent_net_addition" id="percent_net_addition" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" required>
            </div>
          </div>               

         

          <div class="form-group row">
            <label for="depletion_rate" class="col-sm-2 col-form-label"> Depletion Rate </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="depletion_rate" id="depletion_rate" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" required>
            </div>
          </div>               

         

          <div class="form-group row">
            <label for="life_index" class="col-sm-2 col-form-label"> Life Index </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="life_index" id="life_index" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" required>
            </div>
          </div>               
             

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_res_btn" id="add_res_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Depletion Rate </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Reserve Depletion Rate modal Condensate -->
<div id="edit_depl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Reserve Depletion Rate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editdepl">
          
            </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Reserve Depletion Rate modal -->
<div id="upl_depl" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Reserves Depletion Rate Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form class="" action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_depletion_rate">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark btn-sm pull-left" />

                    <a id="downloadDepletionRateTemplate" download="Reserve Depletion Rate Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Reserve Depletion Rate Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Reserve Depletion Rate modal -->
<div id="view_depl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Depletion Rate Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewdepl">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Depletion Rate modal -->
<div id="app_depl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Depletion Rate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appdepl"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Reserve GAS modal -->
<div id="addresgas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add GAS Reserves</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="resgasForm" action="{{url('/upstream/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_res" id="date_res" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_reserve_gas">
          

          <div class="form-group row">
            <label for="year_gas" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_gas" required="" readonly="">
            </div>

            <label for="month_gas" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_gas" readonly="">
            </div>
          </div> 

          <div class="form-group row">
            <label for="company_id_gas" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_gas" required>
                    <option value=""> Select Company </option>
                    @if($company_gas)
                        @foreach($company_gas as $company_gas)
                            <option value="{{$company_gas->id}}"> {{$company_gas->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label"> Description below if the company was revoked </label>
            <div class="col-sm-10">
                <textarea rows="4" class="form-control" placeholder="Formally ... " name="description" id="description"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="associated_gas" class="col-sm-2 col-form-label"> AG (Bcf)</label>
            <div class="col-sm-4">
                <input type="number" step="0.001" class="form-control gas" name="associated_gas" id="associated_gas" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" title="In Bcf" required>
            </div>

            <label for="non_associated_gas" class="col-sm-2 col-form-label"> NAG (Bcf)</label>
            <div class="col-sm-4">
                <input type="number" step="0.001" class="form-control gas" name="non_associated_gas" id="non_associated_gas" onkeyup="checktotal(this)" value="0" data-toggle="tooltip" title="In Bcf" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="total_gas" class="col-sm-2 col-form-label"> Total Gas (Bcf)</label>
            <div class="col-sm-10">
                <input type="number" step="0.001" class="form-control" placeholder="Monthly Total" name="total_gas" id="total_gas" value="0" data-toggle="tooltip" title="In Bcf" required readonly="">
            </div>
          </div> 

            

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_res_btn" id="add_res_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Reserves </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Reserve modal -->
<div id="editresgas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Gas Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_res_gas">
          
            </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Reserve modal -->
<div id="uplresgas" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Reserves Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form class="" action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_reserve_gas">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark btn-sm pull-left" />

                    <a href="{{ url('download-gas-reserve-template') }}" id="" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Gas Reserve Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Reserve modal -->
<div id="view_res_gas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Gas Reserve</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewresgas">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Gas modal -->
<div id="appgas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas"></div>
          </div>
    </div>
    </div>  
</div>




<!-- Edit Gas Reserve Depletion Rate modal Condensate -->
<div id="edit_gas_depl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Gas Reserve Depletion Rate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editgasdepl">
          
            </div>
          </div>
    </div>
    </div>  
  </div>



<!-- Approve Gas Depletion Rate modal -->
<div id="app_gas_depl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Depletion Rate</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appgasdepl"></div>
          </div>
    </div>
    </div>  
</div>











 <!-- Add Seismic Data modal -->
<div id="addseis_data" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Seismic Data </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="geoDataForm" action="{{url('upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_seismic_data">
          

          

          <div class="form-group row">
            <label for="year_sd" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_sd" required="" readonly="">
            </div>

            <label for="month_sd" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_sd" required="" readonly="">
            </div>
          </div>

          <div class="form-group row">
            <label for="field_id_sd" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Location" name="field_id" id="field_id_sd">
            </div>
          </div>

          <div class="form-group row">
            <label for="terrain_id_sd" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id_sd" required>
                    <option value=""> Select Terrain / Basin </option>
                    @if($terrain_sd)
                        @foreach($terrain_sd as $terrain_sd)
                            <option value="{{$terrain_sd->id}}"> {{$terrain_sd->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Geo Type </label>
            <div class="col-sm-4">

                <label class="container"> <span style="margin-left: 20px"> Geophysical </span>
                  <input type="radio" name="geo_id" id="geophy" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Geotechnical </span>
                  <input type="radio" name="geo_id" id="geotec" value="2">  <span class="checkmark"></span>
                </label>          
               
            </div>


            <div class="col-sm-6">
              <div id="geo_phy">
                <div class="col-sm-12" style="padding: 0px">
                <label for="geophysical_id" class="col-form-label"> Geophysical Data </label>
                    <select class="form-control" name="geophysical_id" id="geophysical_id">
                        <option value=""> Select Geophysical Data </option>
                        @if($geophysical)
                            @foreach($geophysical as $geophysical)
                                <option value="{{$geophysical->id}}"> {{$geophysical->geophysical_name}} </option>                           
                            @endforeach
                        @endif
                    </select>
                </div>
              </div>

              <div id="geo_tec">
                <div class="col-sm-12" style="padding: 0px">
                <label for="geotechnical_id" class="col-form-label"> Geotechnical Data </label>
                    <select class="form-control" name="geotechnical_id" id="geotechnical_id">
                      <option value=""> Select Geotechnical Data </option>
                      @if($geotechnical)
                          @foreach($geotechnical as $geotechnical)
                              <option value="{{$geotechnical->id}}"> {{$geotechnical->geotechnical_name}} </option>                          
                          @endforeach
                      @endif
                  </select>
                </div>
              </div>
            </div>
          </div>




          <div class="form-group row">

            <label for="seismic_type" class="col-sm-2 col-form-label"> Activity </label>
            <div class="col-sm-10">
                <select class="form-control" name="seismic_type" id="seismic_type" required>
                    <option value=""> Select Activity </option>
                    @if($seismic_typed)
                        @foreach($seismic_typed as $seismic_typed)
                            <option value="{{$seismic_typed->id}}"> {{$seismic_typed->seismic_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group col-sm-12" id="cove" style="padding: 0px"> <!-- COVERAGE CONTAINER -->
            <div class="form-group row">
            <label for="approved_coverage" class="col-sm-2 col-form-label"> Approved Coverage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="Approved Coverage" data-toggle="tooltip" title="In Sq.Km" name="approved_coverage" id="approved_coverage" value="">
            </div>

            <label for="actual_coverage" class="col-sm-2 col-form-label"> Actual Coverage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="Actual Coverage" data-toggle="tooltip" title="In Sq.Km" name="actual_coverage" id="actual_coverage" value="">
            </div>
          </div>       
          </div>


         
          <div class="form-group row">
            <label for="Status_" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="Status_">
                    <option value=""> Select Status </option>
                    @if($statuses)
                        @foreach($statuses as $statuses)
                            <option value="{{$statuses->id}}"> {{$statuses->status}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="number" class="form-control" rows="2" placeholder="Remark" name="remark" id="remark"></textarea>
            </div>
          </div>
     
          
                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_sd_btn" id="add_sd_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Geo Data</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Seismic Data modal -->
<div id="editseis_data" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Seismic Data </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_seisdata">
          
            </div>
        </div>
    </div>
    </div>  
  </div>


<!-- Upload Seismic Data modal -->
<div id="uplseis_data" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Seismic Data Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_seismic_data">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-geo-data-template') }}" id="" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Seismic Data Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Seismic Data modal -->
<div id="view_seis_data" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Seismic Data </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="view_seisdata">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Seismic Data modal -->
<div id="appseis" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Seismic Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_seis"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Rig Disposition modal -->
<div id="addrig_disp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Rig Disposition </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="rigDispForm" action="{{url('/upstream/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_rig" id="date_rig" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_rig_disposition">
          


          <div class="form-group row">
            <label for="year_rig" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_rig" readonly="">
            </div>
          </div>


          <div class="form-group row">
            <label for="rig_type_id" class="col-sm-2 col-form-label"> Rig Type</label>
            <div class="col-sm-4">
                <select class="form-control" name="rig_type_id" id="rig_type_id">
                    <option value=""> Select Rig Type </option>
                    @if($rig_type)
                        @foreach($rig_type as $rig_type)
                            <option value="{{$rig_type->id}}"> {{$rig_type->rig_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
            <div class="col-sm-4">
                <select class="form-control" name="terrain_id" id="terrain_id" required>
                    <option value=""> Select Terrain </option>
                    @if($terrain_rig)
                        @foreach($terrain_rig as $terrain_rig)
                            <option value="{{$terrain_rig->id}}"> {{$terrain_rig->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="january_rd" class="col-sm-2 col-form-label"> January </label>
            <div class="col-sm-4">
                <input type="number" class="form-control rig_mt" placeholder="" name="january" id="january_rd" value="0" onkeyup="checktotal(this)">
            </div>

            <label for="febuary_rd" class="col-sm-2 col-form-label"> Febuary </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="febuary" id="febuary_rd" value="0" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="march_rd" class="col-sm-2 col-form-label"> March </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="march" id="march_rd" value="0" onkeyup="checktotal(this)">
            </div>

            <label for="april_rd" class="col-sm-2 col-form-label"> April </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="april" id="april_rd" value="0" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="may_rd" class="col-sm-2 col-form-label"> May </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="may" id="may_rd" value="0" onkeyup="checktotal(this)">
            </div>

            <label for="june_rd" class="col-sm-2 col-form-label"> June </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="june" id="june_rd" value="0" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="july_rd" class="col-sm-2 col-form-label"> July </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="july" id="july_rd" value="0" onkeyup="checktotal(this)">
            </div>

            <label for="august_rd" class="col-sm-2 col-form-label"> August </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="august" id="august_rd" value="0" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="september_rd" class="col-sm-2 col-form-label"> September </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="september" id="september_rd" value="0" onkeyup="checktotal(this)">
            </div>

            <label for="october_rd" class="col-sm-2 col-form-label"> October </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="october" id="october_rd" value="0" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="november_rd" class="col-sm-2 col-form-label"> November </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="november" id="november_rd" value="0" onkeyup="checktotal(this)">
            </div>

            <label for="december_rd" class="col-sm-2 col-form-label"> December </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="december" id="december_rd" value="0" onkeyup="checktotal(this)">
            </div>
          </div>     

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rig_btn" id="add_rig_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Rig Disposition</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Rig Disposition modal -->
<div id="editrig_disp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Rig Disposition</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_rigdisp">
          
            </div>
          </div>
    </div>
    </div>  
  </div>


  <!-- Upload Rig Disposition modal -->
<div id="uplrig_disp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Rig Disposition Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_rig_disposition">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-rig-disposition-template') }}" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Rig Disposition Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Rig Disposition modal -->
<div id="view_rig_disp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Rig Disposition </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrig_disp">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Rig Disposition modal -->
<div id="apprig" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Rig Disposition</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_rig"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Well Activities modal -->
<div id="add_well" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Well Activities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="WellForm" action="{{url('/upstream')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
          <input type="hidden" class="form-control" name="type" id="" value="add_well_activities">


          <div class="form-group row">
            <label for="year_w" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_w" required="" readonly="">
            </div>

            <label for="month_w" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_w" readonly="">
            </div>
          </div> 


            <div class="form-group row">
              <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
              <div class="col-sm-10">
                  <select class="form-control" name="terrain_id" id="terrain_id">
                      <option value=""> Select Terrain </option>
                      @if($well_terrain)
                          @foreach($well_terrain as $well_terrain)
                              <option value="{{$well_terrain->id}}"> {{$well_terrain->terrain_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="class_id" class="col-sm-2 col-form-label"> Class </label>
              <div class="col-sm-10">
                  <select class="form-control" name="class_id" id="class_id" required>
                      <option value=""> Select Well Class </option>
                      @if($well_class)
                          @foreach($well_class as $well_class)
                              <option value="{{$well_class->id}}"> {{$well_class->class_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
            </div>

         <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="type_id" id="type_id">
                    <option value=""> Select Well Type </option>
                    @if($well_type)
                        @foreach($well_type as $well_type)
                            <option value="{{$well_type->id}}"> {{$well_type->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         <div class="form-group row">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Contract </option>
                    @if($contract_dri)
                        @foreach($contract_dri as $contract_dri)
                            <option value="{{$contract_dri->id}}"> {{$contract_dri->contract_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="no_of_well" class="col-sm-2 col-form-label"> No of Well Drilled </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="No Of Well Drilled" name="no_of_well" id="no_of_well"required>
            </div>
          </div>  




                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_wt_btn" id="add_wt_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Well Activities </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Well Activities modal -->
<div id="edit_well" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Well Activities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editwell">
          
            </div>
          </div>
    </div>
    </div>  
</div>



<!-- Upload Well Activities modal -->
<div id="upl_well" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Well Activities Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_well_activities">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-drilling-template') }}" id="" download="Well Activities Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Well Activities Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Well Activities modal -->
<div id="view_well" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Well Activities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewwell">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Well Activities modal -->
<div id="appwell" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-60">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Well Activities</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_well"></div>
          </div>
    </div>
    </div>  
</div>




 <!-- Add Drilling Gas modal -->
<div id="add_dri_gas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Drilling Gas Well </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="dGasForm" action="{{url('/upstream')}}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="type" id="" value="add_drilling_gas">


          <div class="form-group row">
            <label for="year_dgas" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_dgas" readonly>
            </div>

            <label for="month_dgas" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_dgas" readonly>
            </div>
          </div> 


            <div class="form-group row">
              <label for="field_id" class="col-sm-2 col-form-label"> Field</label>
              <div class="col-sm-10">
                  <select class="form-control" name="field_id" id="field_id" required>
                      <option value=""> Select Field </option>
                      @if($field_dg)
                          @foreach($field_dg as $field_dg)
                              <option value="{{$field_dg->id}}"> {{$field_dg->field_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
            </div>
         

          <div class="form-group row">
            <label for="well" class="col-sm-2 col-form-label"> Well </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well Name" name="well" id="well">
            </div>
          </div> 


          <div class="form-group row">
              <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
              <div class="col-sm-10">
                  <select class="form-control" name="terrain_id" id="terrain_id">
                      <option value=""> Select Terrain </option>
                      @if($terrain_dg)
                          @foreach($terrain_dg as $terrain_dg)
                              <option value="{{$terrain_dg->id}}"> {{$terrain_dg->terrain_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
          </div>
         

          <div class="form-group row">
            <label for="reserves" class="col-sm-2 col-form-label"> Reserves (Bscf) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Reserves (Bscf)" name="reserves" id="reserves" required>
            </div>
          </div> 
         

          <div class="form-group row">
            <label for="off_take" class="col-sm-2 col-form-label"> Off-Take (MMscf/d) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Off-Take (MMscf/d)" name="off_take" id="off_take">
            </div>
          </div> 
         

         
                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_wt_btn" id="add_wt_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Drilling Gas </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Drilling Gas modal -->
<div id="edit_dri_gas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Drilling Gas Well </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editdrigas">
          
            </div>
          </div>
    </div>
    </div>  
</div>



<!-- Upload Drilling Gas modal -->
<div id="upl_dri_gas" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Drilling Gas Well Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_drilling_gas">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-gas-drilling-template') }}" download="Drilling Gas Well Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Drilling Gas Well Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Drilling Gas modal -->
<div id="view_dri_gas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Drilling Gas Well </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewdrigas">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Drilling Gas modal -->
<div id="app_dri_gas" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Drilling Gas Well</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appdrigas"></div>
          </div>
    </div>
    </div>  
</div>




 <!-- Add Gas Initial Completion modal -->
<div id="add_GIC" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Initial Completion Well </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="GICForm" action="{{url('/upstream')}}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="type" id="" value="add_gas_initial_completion">


          <div class="form-group row">
            <label for="year_GIC" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_GIC" readonly>
            </div>

            <label for="month_GIC" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_GIC" readonly>
            </div>
          </div> 


            <div class="form-group row">
              <label for="field_id" class="col-sm-2 col-form-label"> Field</label>
              <div class="col-sm-10">
                  <select class="form-control" name="field_id" id="field_id" required>
                      <option value=""> Select Field </option>
                      @if($field_gic)
                          @foreach($field_gic as $field_gic)
                              <option value="{{$field_gic->id}}"> {{$field_gic->field_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
            </div>
         

          <div class="form-group row">
            <label for="well" class="col-sm-2 col-form-label"> Well Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well Name" name="well" id="well">
            </div>
          </div> 


          <div class="form-group row">
              <label for="facility_id" class="col-sm-2 col-form-label"> Facility</label>
              <div class="col-sm-10">
                  <select class="form-control" name="facility_id" id="facility_id">
                      <option value=""> Select Processing Facility </option>
                      @if($facility_dg)
                          @foreach($facility_dg as $facility_dg)
                              <option value="{{$facility_dg->id}}"> {{$facility_dg->facility_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
          </div>
         

          <div class="form-group row">
            <label for="reserves" class="col-sm-2 col-form-label"> Reserves (Bscf) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Reserves (Bscf)" name="reserves" id="reserves" required>
            </div>
          </div> 
         

          <div class="form-group row">
            <label for="off_take" class="col-sm-2 col-form-label"> Off-Take (MMscf/d) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Off-Take (MMscf/d)" name="off_take" id="off_take">
            </div>
          </div> 
         
         
                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_wt_btn" id="add_wt_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Initial Completion </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Gas Initial Completion modal -->
<div id="edit_GIC" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Gas Initial Completion Well </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editGIC">
          
            </div>
          </div>
    </div>
    </div>  
</div>



<!-- Upload Gas Initial Completion modal -->
<div id="upl_GIC" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Initial Completion Well Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_initial_completion">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-gas-completion-template') }}" download="Gas Initial Completion Well Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Gas Initial Completion Well Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Gas Initial Completion modal -->
<div id="view_GIC" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Gas Initial Completion Well </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewGICs">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Gas Initial Completion modal -->
<div id="app_GIC" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Initial Completion Well</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appGIC"></div>
          </div>
    </div>
    </div>  
</div>










 <!-- Add Well Completion Activities modal -->
<div id="add_completion" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Well Completion Activities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="compForm" action="{{url('/upstream/')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_well_completion">
          

         
          <div class="form-group row">
            <label for="year_com" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_com" required readonly="">
            </div>
          
            <label for="month_com" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_com" required readonly="">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="field_id_com" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_com" required>
                    <option value=""> Select Field </option>
                    @if($field_com)
                        @foreach($field_com as $field_com)
                            <option value="{{$field_com->id}}"> {{$field_com->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Well Type </label>
            <div class="col-sm-4">

                <label class="container"> <span style="margin-left: 20px"> Injector</span>
                  <input type="radio" name="well_type" id="" value="3"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Oil Producer </span>
                  <input type="radio" name="well_type" id="" value="4">  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Gas Producer </span>
                  <input type="radio" name="well_type" id="" value="5">  <span class="checkmark"></span>
                </label>  
                <label class="container"> <span style="margin-left: 20px"> Well Disposer </span>
                  <input type="radio" name="type_id" id="" value="6">  <span class="checkmark"></span>
                </label>          
               
            </div>

            <label for="" class="col-sm-2 col-form-label"> Completion Type </label>
            <div class="col-sm-4">

                <label class="container"> <span style="margin-left: 20px"> Initial Completion</span>
                  <input type="radio" name="type_id" id="" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Smart-Completion </span>
                  <input type="radio" name="type_id" id="" value="2">  <span class="checkmark"></span>
                </label>         
               
            </div>
          </div> 


          <div class="form-group row">
            <label for="number_of_well_com" class="col-sm-2 col-form-label"> No of Wells </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Number of Wells" name="number_of_well" id="number_of_well_com" required>
            </div>
          </div>



                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_wct_btn" id="add_wct_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Well Completion </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Well Activities Completion modal -->
<div id="edit_completion" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Well Activities By Contract</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editcompletion">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Upload Well Activities Completion modal -->
<div id="upl_completion" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Well Completion Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_well_completion">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-well-completion-template') }}" id="" download="Well completion Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Well Completion Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Well Completion modal -->
<div id="appcomp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Well Completion</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_comp"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Well Workover Activities modal -->
<div id="add_workover" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Well Workover Activities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="workForm" action="{{url('/upstream/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_well_workover">
          

         
          <div class="form-group row">
            <label for="year_wk" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_wk" required readonly>
            </div>
          
            <label for="month_wk" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_wk" required readonly>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="field_id_wk" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_wk" required>
                    <option value=""> Select Field </option>
                    @if($field_work)
                        @foreach($field_work as $field_work)
                            <option value="{{$field_work->id}}"> {{$field_work->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Workover Type </label>
            <div class="col-sm-10">

                <label class="container"> <span style="margin-left: 20px"> Repairs</span>
                  <input type="radio" name="type_id" id="" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Zone Change/Zone Isolation </span>
                  <input type="radio" name="type_id" id="" value="2">  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Re-Completion </span>
                  <input type="radio" name="type_id" id="" value="3">  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Logging/PLT </span>
                  <input type="radio" name="type_id" id="" value="4">  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Cement Squeeze </span>
                  <input type="radio" name="type_id" id="" value="5">  <span class="checkmark"></span>
                </label>          
               
            </div>
          </div>  


          <div class="form-group row">
            <label for="well" class="col-sm-2 col-form-label">Well Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well Name" name="well" id="well" required>
            </div>
          </div>


          <div class="form-group row">
              <label for="facility_id" class="col-sm-2 col-form-label"> Facility</label>
              <div class="col-sm-10">
                  <select class="form-control" name="facility_id" id="facility_id">
                      <option value=""> Select Processing Facility </option>
                      @if($facility_wk)
                          @foreach($facility_wk as $facility_wk)
                              <option value="{{$facility_wk->id}}"> {{$facility_wk->facility_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
          </div>



                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Well Workover </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Well Activities Workover modal -->
<div id="edit_workover" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Well Workover Activities</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editworkover">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Upload Well Activities Workover modal -->
<div id="upl_workover" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Well Workover Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_well_workover">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-well-workover-template') }}" id="" download="Well Workover Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Well Workover Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Workover modal -->
<div id="appwork" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Workover</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_work"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Well Plugback Abandonment Activities modal -->
<div id="add_plugback" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Well Plugback Abandonment Activities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="plugForm" action="{{url('/upstream/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_well_plugback_abandonment">
          

         
          <div class="form-group row">
            <label for="year_pba" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_pba" required readonly="">
            </div>
          
            <label for="month_pba" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_pba" required readonly="">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="field_id_pba" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_pba" required>
                    <option value=""> Select Field </option>
                    @if($field_plug)
                        @foreach($field_plug as $field_plug)
                            <option value="{{$field_plug->id}}"> {{$field_plug->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-10">

                <label class="container"> <span style="margin-left: 20px"> Abandonment </span>
                  <input type="radio" name="type_id" id="" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Suspension </span>
                  <input type="radio" name="type_id" id="" value="2">  <span class="checkmark"></span>
                </label>  
                <label class="container"> <span style="margin-left: 20px"> Plugback </span>
                  <input type="radio" name="type_id" id="" value="3">  <span class="checkmark"></span>
                </label>         
               
            </div>
          </div>
         
 


          <div class="form-group row">
            <label for="number_of_well_pba" class="col-sm-2 col-form-label"> No of Wells </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Number of Wells" name="number_of_well" id="number_of_well_pba" required>
            </div>
          </div>



                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Well Plugback - Abandonment </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Well Activities Plugback Abandonment modal -->
<div id="edit_plugback" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Well Plugback Abandonment Activities</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editplugback">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Upload Well Activities Plugback Abandonment modal -->
<div id="upl_plugback" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Well Plugback Abandonment Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_well_plugback_abandonment">
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-plugback-template') }}" download="Well Plugback Abandonment Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Well Plugback Abandonment Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Plugback & Abandonment modal -->
<div id="appplug" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Plugback & Abandonment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_plug"></div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Provisional Crude Production modal -->
<div id="addcrude_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Provisional Crude Production </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="crudeProdForm" action="{{url('/upstream/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_crude_production">
          

          <div class="form-group row">
            <label for="field_id_cp" class="col-sm-1 col-form-label"> Fields </label>
            <div class="col-sm-5">
                <select class="form-control" name="field_id" id="field_id_cp" required>
                    <option value=""> Select Field </option>
                    @if($field_cp)
                        @foreach($field_cp as $field_cp)
                            <option value="{{$field_cp->id}}"> {{$field_cp->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="year_pcp" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="YYYY" name="year" id="year_pcp" value="" required="" readonly="">
                {{-- <input type="hidden" class="form-control" placeholder="Company" name="company_id" id="company_id_cp" readonly=""> --}}
                <input type="hidden" class="form-control" placeholder="Contract" name="contract_id" id="contract_id_cp" readonly="">
            </div>           
          </div>


          <div class="form-group row">
            <div class="col-sm-12">
                <label for="company_id_cp" class="col-sm-1 col-form-label pl-0" style=""> Company </label>
                <select class="form-control" name="company_id" id="company_id_cp" required>
                    <option value="">  </option>
                    @if($company_cp)
                        @foreach($company_cp as $company_cp)
                            <option value="{{$company_cp->id}}"> {{$company_cp->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="terrain_id_cp" class="col-sm-1 col-form-label"> Terrain </label>
            <div class="col-sm-5">
                <select class="form-control" name="terrain_id" id="terrain_id_cp" required>
                    <option value=""> Select Terrain </option>
                    @if($terrain_cp)
                        @foreach($terrain_cp as $terrain_cp)
                            <option value="{{$terrain_cp->id}}"> {{$terrain_cp->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="contract_id_cp" class="col-sm-1 col-form-label"> Contract </label>
            <div class="col-sm-5">
                <select class="form-control" name="contract_id" id="contract_id_cp" required>
                    <option value=""> Select Contract </option>
                    @if($contract_cp)
                        @foreach($contract_cp as $contract_cp)
                            <option value="{{$contract_cp->id}}"> {{$contract_cp->contract_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="january_pcp" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="january" id="january_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>

            <label for="febuary_pcp" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="febuary" id="febuary_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="march_pcp" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="march" id="march_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>

            <label for="april_pcp" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="april" id="april_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="may_pcp" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="may" id="may_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>

            <label for="june_pcp" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="june" id="june_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="july_pcp" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="july" id="july_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>

            <label for="august_pcp" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="august" id="august_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="september_pcp" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="september" id="september_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>

            <label for="october_pcp" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="october" id="october_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="november_pcp" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="november" id="november_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>

            <label for="december_pcp" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcp" name="december" id="december_pcp" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>





         

          <div class="form-group row" style="display: none;">
            <label for="company_total" class="col-sm-1 col-form-label"> Total </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="company_total" id="company_total" value="0.00" required readonly="">
            </div>

            <label for="average_production" class="col-sm-1 col-form-label"> Average </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="average_production" id="average_production" value="0.00" required readonly="">
            </div>

            <label for="percentage_production" class="col-sm-1 col-form-label"> Prod % </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="percentage_production" id="percentage_production" value="0.00" required readonly="">
            </div>
          </div>


          
                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_cp_btn" id="add_cp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Crude Production</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Provisional Crude Production modal -->
<div id="editcrude_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Provisional Crude Production </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_crudeprod">
         
            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Provisional Crude Production modal -->
<div id="uplcrude_prod" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Crude Production Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_crude_production">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-provisional-crude-template') }}" id="" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Provisional Crude Production Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Provisional Crude Production  modal -->
<div id="view_crude_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Provisional Crude Production </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewcrude_prod">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Provisional Crude modal -->


<!-- Approving Divisional Remarks for Publication modal -->
<div id="appprov" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-85">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Provisional Crude</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_prov"></div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Crude Production Deferment modal -->
<div id="add_prod_def" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Crude Production Deferment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="prodDefForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_production_deferment">
          

          <div class="form-group row">
            <label for="company_id_def" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_def">
                    <option value=""> Select Company </option>
                    @if($company_def)
                        @foreach($company_def as $company_def)
                            <option value="{{$company_def->id}}"> {{$company_def->company_name}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="contract_id_def" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id_def">
                    <option value=""> Select Contract </option>
                    @if($contract_def)
                        @foreach($contract_def as $contract_def)
                            <option value="{{$contract_def->id}}"> {{$contract_def->contract_name}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="year_def" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="" name="year" id="year_def" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="month_def" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-10">
                <input type="text" class="form-control month" placeholder="" name="month" id="month_def" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label for="value" class="col-sm-2 col-form-label"> Volume (Barrels) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="value" id="value" value="0" onkeyup="checktotal(this)" required>
            </div>
          </div>
          
                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_cp_btn" id="add_cp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Production Deferment</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Crude Production Deferment modal -->
<div id="edit_pro_def" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Crude Production Deferment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editproddef">
         
            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Crude Production Deferment modal -->
<div id="upl_prod_def" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Crude Production Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_production_deferment">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-crude-deferment-template') }}" id="" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Crude Production Deferment Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Crude Production deferment modal -->
<div id="view_prod_def" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4 class="modal-title">Viewing Crude Production deferment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewcruddef">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Crude deferment modal -->
<div id="app_prod_def" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Crude Production Deferment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appproddef"></div>
          </div>
    </div>
    </div>  
</div>




<!-- Add Oil Facility modal -->
<div id="add_oil_fac" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Oil Facility </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="oilfacForm" action="{{url('/upstream/')}}" method="POST">
        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" class="form-control" name="type" id="" value="add_oil_facility">


        <div class="form-group row">
            <label for="year_fac" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_fac" required readonly="">
            </div> 

            <label for="month_fac" class="col-sm-1 col-form-label"> Month </label>
            <div class="col-sm-5">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_fac" readonly="">
            </div>              
        </div>
          

          <div class="form-group row">
            <label for="company_id_fac" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-11">
                <select class="form-control" name="company_id" id="company_id_fac" required>
                    <option value=""> Select Company </option>
                    @if($company_oil)
                        @foreach($company_oil as $company_oil)
                            <option value="{{$company_oil->id}}"> {{$company_oil->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="facility_id_fac" class="col-sm-1 col-form-label"> Facility </label>
            <div class="col-sm-5">
                <select class="form-control" name="facility_id" id="facility_id_fac" required>
                    <option value=""> Select Oil Facility </option>
                    @if($facilities)
                        @foreach($facilities as $facilities)
                            <option value="{{$facilities->id}}"> {{$facilities->facility_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="facility_type_id_fac" class="col-sm-1 col-form-label"> Facility Type </label>
            <div class="col-sm-5">
                <select class="form-control" name="facility_type_id" id="facility_type_id_fac" required>
                    <option value=""> Select Facility Type </option>
                    @if($facility_types)
                        @foreach($facility_types as $facility_types)
                            <option value="{{$facility_types->id}}"> {{$facility_types->facility_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="location_id_fac" class="col-sm-1 col-form-label"> Location </label>
            <div class="col-sm-5">
                <select class="form-control" name="location_id" id="location_id_fac" required>
                    <option value=""> Select Location </option>
                    @if($locations)
                        @foreach($locations as $locations)
                            <option value="{{$locations->id}}"> {{$locations->location_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="terrain_id_fac" class="col-sm-1 col-form-label"> Terrain </label>
            <div class="col-sm-5">
                <select class="form-control" name="terrain_id" id="terrain_id_fac">
                    <option value=""> Select Terrain </option>
                    @if($terrain_oil)
                        @foreach($terrain_oil as $terrain_oil)
                            <option value="{{$terrain_oil->id}}"> {{$terrain_oil->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

        

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="design_capacity" class="col-sm-1 col-form-label"> Design Cap </label>
            <div class="col-sm-5">
                <input type="number" class="form-control" placeholder="Design Capacity" name="design_capacity" id="design_capacity" required="">
            </div>

            <label for="operating_capacity" class="col-sm-1 col-form-label"> Ops Capacity </label>
            <div class="col-sm-5">
                <input type="number" class="form-control" placeholder="Operation Capacity" name="operating_capacity" id="operating_capacity" required="">
            </div>
        </div>


        {{-- <div class="form-group row">
            <label for="start_date_oil" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Design Capacity" name="start_date" id="start_date_oil" required="">
            </div>

            <label for="end_date_oil" class="col-sm-1 col-form-label"> End Date </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="End Date" name="end_date" id="end_date_oil" required="">
            </div>
        </div> --}}


        <div class="form-group row">
            <label for="facility_design_life" class="col-sm-1 col-form-label"> Design Life </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Facility Design Life" name="facility_design_life" id="facility_design_life" required="">
            </div>

            <label for="date_of_commissioning" class="col-sm-1 col-form-label"> Comm Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Commissioning Year" name="date_of_commissioning" id="date_of_commissioning" required="">
            </div>
        </div> 


          <div class="form-group row">
            <label for="status_id_fac" class="col-sm-1 col-form-label"> Operational Status </label>
            <div class="col-sm-5">
                <select class="form-control" name="status_id" id="status_id_fac" required>
                    <option value=""> Select Status </option>
                    @if($status_oil)
                        @foreach($status_oil as $status_oil)
                            <option value="{{$status_oil->id}}"> {{$status_oil->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="license_status" class="col-sm-1 col-form-label"> License Status </label>
            <div class="col-sm-5">
                <select class="form-control" name="license_status" id="license_status" required>
                    <option value=""> Select License Status </option>
                    @if($lic_status)
                        @foreach($lic_status as $lic_status)
                            <option value="{{$lic_status->id}}"> {{$lic_status->license_status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>



        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fac_btn" id="add_fac_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Oil Facility </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Oil Facility modal -->
<div id="edit_oil_fac" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Oil Facility </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editoilfac">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Oil Facility modal -->
<div id="upl_oil_fac" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Oil Facility Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_oil_facility">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="downloadOilFacilityTemplate" download="Oil Facility Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Oil Facility Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Oil Facility modal -->
<div id="view_oil_fac" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Oil Facility </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewoilfac">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Oil Facilities modal -->
<div id="appoilfac" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Oil Facilities</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_oil_fac"></div>
          </div>
    </div>
    </div>  
</div>




<!-- Add Field Development Plan modal -->
<div id="add_fdp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Field Development Plan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="fdpForm" action="{{url('/upstream/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_field_development_plan">


        <div class="form-group row">
            <label for="year_fdp" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_fdp" readonly="">
            </div>               
        </div>
          


          <div class="form-group row">
            <label for="field_id" class="col-sm-3 col-form-label"> Field </label>
            <div class="col-sm-9">
                <select class="form-control" name="field_id" id="field_id" required>
                    <option value=""> Select Field</option>
                    @if($field_fdp)
                        @foreach($field_fdp as $field_fdp)
                            <option value="{{$field_fdp->id}}"> {{$field_fdp->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company </option>
                    @if($company_fdp)
                        @foreach($company_fdp as $company_fdp)
                            <option value="{{$company_fdp->id}}"> {{$company_fdp->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
       

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="production_rate" class="col-sm-3 col-form-label"> Anticipated Production Rate </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="production_rate" id="production_rate" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="expected_reserves" class="col-sm-3 col-form-label"> Expected Reserves </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="expected_reserves" id="expected_reserves" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="commencement_date" class="col-sm-3 col-form-label"> Expected Production Rate </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="commencement_date" id="commencement_date" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="no_of_well" class="col-sm-3 col-form-label"> No of Wells </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="no_of_well" id="no_of_well">
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-3 col-form-label"> Remark/Status </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="remark" id="remark" required="">
            </div>
        </div>


       
        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fac_btn" id="add_fac_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add FDP </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Field Development Plan modal -->
<div id="edit_fdp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Field Development Plan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editfdp">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Field Development Plan modal -->
<div id="upl_fdp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Field Development Plan Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_field_development_plan">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-fdp-template') }}" download="Field Development Plan Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Field Development Plan Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Field Development Plan modal -->
<div id="view_fdp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Field Development Plan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewfdp">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Oil Facilities modal -->
<div id="app_fdp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Oil Facilities</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appfdp"></div>
          </div>
    </div>
    </div>  
</div>



<!-- Add Approved Gas Development Plan modal -->
<div id="add_gas_fdp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Approved Gas Development Plan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="gasfdpForm" action="{{url('/upstream/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_approved_gas_development_plan">


        <div class="form-group row">
            <label for="year_gfdp" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_gfdp" readonly>
            </div>               
        </div>
          


          <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-4">
                <select class="form-control" name="field_id" id="field_id" required>
                    <option value=""> Select Field</option>
                    @if($field_gfdp)
                        @foreach($field_gfdp as $field_gfdp)
                            <option value="{{$field_gfdp->id}}"> {{$field_gfdp->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="type_id_gfdp" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="type_id" id="type_id_gfdp" required>
                    <option value=""> Select Type</option>
                    <option value="1"> Associated Gas (AG) </option>
                    <option value="2"> Non-Associated Gas (NAG) </option>
                </select>
            </div>
          </div>

          {{-- <div class="form-group row">
            <label for="concession_id" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_id" id="concession_id">
                    <option value=""> Select Concession </option>
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                </select>
            </div>
          </div> --}}
       

        <div class="" id="nag" style="display: none;"> 

          <div class="form-group row">
              <label for="gas_reserve" class="col-sm-2 col-form-label"> Gas Reserves(BSCF) </label>
              <div class="col-sm-10">
                  <input type="number" step="0.01" class="form-control" name="gas_reserve" id="gas_reserve">
              </div>
          </div>

          <div class="form-group row">
              <label for="condensate" class="col-sm-2 col-form-label"> Condensate(MMSTB) </label>
              <div class="col-sm-10">
                  <input type="number" step="0.01" class="form-control" name="condensate" id="condensate">
              </div>
          </div>

        </div>

        <div class="" id="ag" style="display: none;"> 

          <div class="form-group row">
              <label for="ag_reserve" class="col-sm-2 col-form-label"> AG Reserves(Bscf) </label>
              <div class="col-sm-10">
                  <input type="number" step="0.01" class="form-control" name="ag_reserve" id="ag_reserve">
              </div>
          </div>

        </div>

        <div class="form-group row">
            <label for="off_take_rate" class="col-sm-2 col-form-label"> Off-Take Rate(MMSCFD)</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="off_take_rate" id="off_take_rate">
            </div>
        </div>


       
        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fac_btn" id="add_fac_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Approved Gas FDP </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Approved Gas Development Plan modal -->
<div id="edit_gfdp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Approved Gas Development Plan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editgfdp">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Approved Gas Development Plan modal -->
<div id="upl_gfdp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Approved Gas Development Plan Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_approved_gas_development_plan">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-gas-approved-dev-plan-template') }}" download="Approved Gas Development Plan Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Approved Gas Development Plan Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Approved Gas Development Plan modal -->
<div id="view_gfdp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Approved Gas Development Plan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewgfdp">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Approved Gas Development Plan modal -->
<div id="app_gfdp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-65">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Approved Gas Development Plan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appgfdp"></div>
          </div>
    </div>
    </div>  
</div>




<!-- Add Field Summary modal -->
<div id="add_fsum" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Field Summary </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="fSumForm" action="{{url('/upstream/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_field_summary">


        <div class="form-group row">
            <label for="year_fsum" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_fsum" readonly>
            </div>  

            <label for="month_fsum" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_fsum" readonly>
            </div>             
        </div>
          


          <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company</option>
                    @if($company_fsum)
                        @foreach($company_fsum as $company_fsum)
                            <option value="{{$company_fsum->id}}"> {{$company_fsum->company_name}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="contract_id" class="col-sm-3 col-form-label"> Contract </label>
            <div class="col-sm-9">
                <select class="form-control" name="contract_id" id="contract_id" required>
                    <option value=""> Select Contract</option>
                    @if($contract_fsum)
                        @foreach($contract_fsum as $contract_fsum)
                            <option value="{{$contract_fsum->id}}"> {{$contract_fsum->contract_name}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
       

          <div class="form-group row">
              <label for="producing_field" class="col-sm-3 col-form-label"> Producing Fields </label>
              <div class="col-sm-9">
                  <input type="number" class="form-control" name="producing_field" id="producing_field">
              </div>
          </div>

          <div class="form-group row">
              <label for="well" class="col-sm-3 col-form-label"> Wells </label>
              <div class="col-sm-9">
                  <input type="number" class="form-control" name="well" id="well">
              </div>
          </div>


        <div class="form-group row">
            <label for="string" class="col-sm-3 col-form-label"> String</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="string" id="string">
            </div>
        </div>


       
        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fac_btn" id="add_fac_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Field Summary </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Field Summary modal -->
<div id="edit_fsum" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Field Summary </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editfsum">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Field Summary modal -->
<div id="upl_fsum" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Field Summary Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('upstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_field_summary">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-up-field-summary-template') }}" download="Field Summary Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Field Summary Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Field Summary modal -->
<div id="view_fsum" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Field Summary </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewfsum">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Field Summary modal -->
<div id="app_fsum" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Field Summary</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appfsum"></div>
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