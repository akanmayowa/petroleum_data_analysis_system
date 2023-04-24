
<!-- Add Accident Report – Upstream modal -->
<div id="addupstream" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Accident Report – Upstream </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="upstreamForm" action="{{url('/she-accident-report/')}}" method="POST">
          @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_she_accident_report_up">



          <div class="form-group row">
            <label for="year_up" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_up" required="" readonly>
            </div>

            <label for="month_up" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_up" required="" readonly>
            </div>
          </div> 

        


        <div class="form-group row">
            <label for="incidents_up" class="col-sm-2 col-form-label"> Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Incidents" name="incidents" id="incidents_up" required="">
            </div>

            <label for="fatality_up" class="col-sm-2 col-form-label"> Fatality </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality" name="fatality" id="fatality_up">
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_up" class="col-sm-2 col-form-label"> Work Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work related" name="work_related" id="work_related_up">
            </div>

            <label for="non_work_related_up" class="col-sm-2 col-form-label"> Non Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work related" name="non_work_related" id="non_work_related_up">
            </div>
        </div>


        <div class="form-group row">
            <label for="fatal_incident_up" class="col-sm-2 col-form-label"> Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality Incidents" name="fatal_incident" id="fatal_incident_up">
            </div>

            <label for="non_fatal_incident_up" class="col-sm-2 col-form-label"> Non Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="non_fatal_incident" id="non_fatal_incident_up">
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_fatal_incident_up" class="col-sm-2 col-form-label"> Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work Related Fatal Incidents" name="work_related_fatal_incident" id="work_related_fatal_incident_up">
            </div>

            <label for="non_work_related_fatal_incident_up" class="col-sm-2 col-form-label"> Non Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work Related Fatal Incidents" name="non_work_related_fatal_incident" id="non_work_related_fatal_incident_up">
            </div>
        </div> 



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light"> <i class="fa fa-plus"></i> Add Upstream Incident</button>
        </div>
    </form>
</div>
</div>
</div>  
</div>


<!-- Edit Accident Report – Upstream modal -->
<div id="editupstream" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Accident Report – Upstream </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_upstream">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Accident Report – Upstream modal -->
<div id="uplupstream" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Accident Report – Upstream Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_accident_report_up">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-upstream-incidence-template') }}" download="Accident Report – Upstream Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Incidences Upstream Report Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Accident Report – Upstream modal -->
<div id="view_upstream" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Accident Report – Upstream </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewupstream">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Accident Report – Upstream  modal -->
<div id="appup" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Accident Report – Upstream </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_up"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Accident Report – Downstream modal -->
<div id="adddownstream" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Accident Report – Downstream </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="downstreamForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_she_accident_report_down">

          <div class="form-group row">
            <label for="year_down" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_down" required="" readonly>
            </div>

            <label for="month_down" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_down" required="" readonly>
            </div>
          </div> 

        

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="incidents_down" class="col-sm-2 col-form-label"> Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Incidents" name="incidents" id="incidents_down">
            </div>

            <label for="fatality_down" class="col-sm-2 col-form-label"> Fatality </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality" name="fatality" id="fatality_down">
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_down" class="col-sm-2 col-form-label"> Work Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work related" name="work_related" id="work_related_down">
            </div>

            <label for="non_work_related_down" class="col-sm-2 col-form-label"> Non Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work related" name="non_work_related" id="non_work_related_down">
            </div>
        </div>


        <div class="form-group row">
            <label for="fatal_incident_down" class="col-sm-2 col-form-label"> Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Fatality Incidents" name="fatal_incident" id="fatal_incident_down">
            </div>

            <label for="non_fatal_incident_down" class="col-sm-2 col-form-label"> Non Fatality Incidents </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Fatality Incidents" name="non_fatal_incident" id="non_fatal_incident_down">
            </div>
        </div> 


        <div class="form-group row">
            <label for="work_related_fatal_incident_down" class="col-sm-2 col-form-label"> Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Work Related Fatal Incidents" name="work_related_fatal_incident" id="work_related_fatal_incident_down">
            </div>

            <label for="non_work_related_fatal_incident_down" class="col-sm-2 col-form-label"> Non Work Fatal Related </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Non Work Related Fatal Incidents" name="non_work_related_fatal_incident" id="non_work_related_fatal_incident_down">
            </div>
        </div> 



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light"> <i class="fa fa-plus"></i> Add Downstream Incident </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>


<!-- Edit Accident Report – Downstream modal -->
<div id="editdownstream" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Accident Report – Downstream </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_downstream">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Accident Report – Downstream modal -->
<div id="upldownstream" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Accident Report – Downstream Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_accident_report_down">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-downstream-incidence-template') }}" download="Accident Report – Downstream Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Incidences Downstream Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Accident Report – Downstream modal -->
<div id="view_downstream" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Accident Report – Downstream </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewdownstream">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Accident Report – Downstream  modal -->
<div id="appdown" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Accident Report – Downstream </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_down"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Spill Incidence Report modal -->
<div id="addspill" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Spill Incidence Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="spillForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_she_spill_incidence_report">

          <div class="form-group row">
            <label for="year_sp" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_sp" required="" readonly>
            </div>

            <label for="month_sp" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month - MMM" name="month" id="month_sp" required="" readonly>
            </div>
          </div>     


        <div class="form-group row">
            <label for="natural_accident" class="col-sm-2 col-form-label"> Incidents </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Natural Incidents" name="natural_accident" id="natural_accident" value="0" onkeyup="checkValue(this)">
            </div>

            <label for="corrosion" class="col-sm-2 col-form-label"> Corrosion </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Work related" name="corrosion" id="corrosion" value="0" onkeyup="checkValue(this)">
            </div>
        </div>


        <div class="form-group row">
            <label for="equipment_failure" class="col-sm-2 col-form-label"> Equip Failure </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Equipment Failure" name="equipment_failure" id="equipment_failure" value="0" onkeyup="checkValue(this)">
            </div>

            <label for="sabotage" class="col-sm-2 col-form-label"> Sabotage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Sabotage" name="sabotage" id="sabotage" value="0" onkeyup="checkValue(this)">
            </div>
        </div> 




        <div class="form-group row">
            <label for="human_error" class="col-sm-2 col-form-label"> Human Error </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Non Fatality Incidents" name="human_error" id="human_error" value="0" onkeyup="checkValue(this)">
            </div>

            <label for="ytbd" class="col-sm-2 col-form-label"> YTBD </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="YTBD" name="ytbd" id="ytbd" value="0" onkeyup="checkValue(this)">
            </div>
        </div>


        <div class="form-group row">
            <label for="mystery" class="col-sm-2 col-form-label"> Mystery</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Mystery" name="mystery" id="mystery" value="0" onkeyup="checkValue(this)">
            </div>

            <label for="erosion_wave_sand" class="col-sm-2 col-form-label"> Erotion/Wave/Sand</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Erotion/Wave/Sand" name="erosion_wave_sand" id="erosion_wave_sand" value="0" onkeyup="checkValue(this)">
            </div>
        </div>


        <div class="form-group row">
            <label for="operational_maintenance" class="col-sm-2 col-form-label"> operation / Maintenance</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="operation / Maintenance" name="operational_maintenance" id="operational_maintenance" value="0" onkeyup="checkValue(this)">
            </div>

            <label for="sunken_barge" class="col-sm-2 col-form-label"> Sunken / Barge</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control spi" placeholder="Sunken / Barge" name="sunken_barge" id="sunken_barge" value="0" onkeyup="checkValue(this)">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-4">
                <input type="hidden" class="form-control" placeholder="Total Number Of Spill" name="total_no_of_spills" id="total_no_of_spills_" readonly="" required="">
            </div>
        </div> 


        <div class="form-group row">
            <label for="volume_spilled" class="col-sm-2 col-form-label"> Vol Of Spill </label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="Total Volume Of Spill" name="volume_spilled" id="volume_spilled"  required="">
            </div>
        </div> 



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_spill_btn" id="add_spill_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Spill </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>


<!-- Edit Spill Incidence Report modal -->
<div id="editspill" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Spill Incidence Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_spill">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Spill Incidence Report modal -->
<div id="uplspill" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Spill Incidence Report Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_spill_incidence_report">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-spill-report-template') }}" download="Spill Incidence Report Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Spill Incidence Report Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Spill Incidence Report modal -->
<div id="view_spills" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Spill Incidence Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewspill">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Spill Incidence modal -->
<div id="appspill" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Spill Incidence </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_spill"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Produced Water Volumes Generated modal -->
<div id="add_water_vol" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Water Volumes Generated </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="watVolForm" action="{{url('/she-accident-report/')}}" method="POST">
          @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_she_water_volumes">

          <div class="form-group row">
            <label for="year_pwv" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_pwv" required readonly>
            </div>

            <label for="month_pwv" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_pwv" required readonly>
            </div>
          </div> 

        

        <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company </option>
                    @if($companies)
                        @foreach($companies as $companies)
                            <option value="{{$companies->id}}"> {{$companies->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


        <div class="form-group row">
            <label for="facility_id" class="col-sm-2 col-form-label"> Facility </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Facility" name="facility_id" id="facility_id" required>
            </div>
         </div>


        <div class="form-group row">
            <label for="terrain" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Terrain" name="terrain" id="terrain" required>
            </div>
         </div>


        <div class="form-group row">
            <label for="concession_id" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Concession" name="concession_id" id="concession_id">
            </div>
         </div>


        {{-- <div class="form-group row">
            <label for="water_depth" class="col-sm-2 col-form-label"> Depth </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Water Depth" name="water_depth" id="water_depth" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="distance_from_shore" class="col-sm-2 col-form-label"> Distance</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Distance From Shore" name="distance_from_shore" id="distance_from_shore" required>
            </div>
        </div>  --}}


        <div class="form-group row">
            <label for="volume" class="col-sm-2 col-form-label"> Volume </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Volume" name="volume" id="volume" required>
            </div>
        </div> 




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_water_btn" id="add_water_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Water Volume </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>


<!-- Edit Produced Water Volumes Generated modal -->
<div id="edit_water_vol" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Produced Water Volumes </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editwatervol">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Produced Water Volumes Generated modal -->
<div id="upl_water_vol" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Water Volumes Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_water_volumes">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-produced-water-volume-template') }}" download="Water Volumes Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Water Volumes Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Produced Water Volumes Generated modal -->
<div id="view_water_vol" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Produced Water Volumes Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewwater_vol">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Produced Water Volumes Generated  modal -->
<div id="appwatervol" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Produced Water Volumes Generated  </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_water_vol"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Drilling Waste Volumes modal -->
<div id="add_waste_vol" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Drilling Waste Volumes Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="wasVolForm" action="{{url('/she-accident-report/')}}" method="POST">
         @csrf
        <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_she_waste_volumes">

          <div class="form-group row">
            <label for="_year" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="_year" required readonly="">
            </div>
          </div> 

        
          <div class="form-group row">
            <label for="_month" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control month" placeholder="Month - MMM" name="month" id="_month" required readonly="">
            </div>
          </div>
        


        <div class="form-group row">
            <label for="sum_of_wbmc" class="col-sm-3 col-form-label"> Sum Of WBMC </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of WBMC" name="sum_of_wbmc" id="sum_of_wbmc">
            </div>
        </div>


        <div class="form-group row">
            <label for="sum_of_obmc" class="col-sm-3 col-form-label"> Sum Of OBMC</label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of OBMC" name="sum_of_obmc" id="sum_of_obmc">
            </div>
        </div> 


        <div class="form-group row">
            <label for="sum_of_spent_wbm" class="col-sm-3 col-form-label"> Spent WBM </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of Spent WBM" name="sum_of_spent_wbm" id="sum_of_spent_wbm">
            </div>
        </div> 


        <div class="form-group row">
            <label for="sum_of_spent_obm" class="col-sm-3 col-form-label"> Spent OBM </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of Spent OBM" name="sum_of_spent_obm" id="sum_of_spent_obm">
            </div>
        </div> 




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_waste_btn" id="add_waste_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Waste Volume </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Drilling Waste Volumes modal -->
<div id="edit_waste_vol" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Drilling Waste Volumes Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editwastevol">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Drilling Waste Volumes modal -->
<div id="upl_waste_vol" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Drilling Waste Volumes Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_waste_volumes">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-drill-waste-water-template') }}" download="Drilling Waste Volumes Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Drilling Waste Volumes Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Drilling Waste Volumes modal -->
<div id="view_waste_vol" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Drilling Waste Volumes Report </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewwaste_vol">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Drilling Waste Volumes modal -->
<div id="appwastevol" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Drilling Waste Volumes </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_waste_vol"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Accredited Waste Managers modal -->
<div id="add_acc_manager" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Accredited Waste Managers </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="accmanForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_she_accredited_waste_manager">

          <div class="form-group row">
            <label for="year_man" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_man" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="company_id_awm" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id_awm" required>
                    <option value=""> Select Company </option>
                    @if($man_company)
                        @foreach($man_company as $man_company)
                            <option value="{{$man_company->id}}"> {{$man_company->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
        </div>

          <div class="form-group row">
            <label for="others" class="col-sm-3 col-form-label others"> Others </label>
            <div class="col-sm-9 others">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others">
            </div>
          </div>


        <div class="form-group row">
            <label for="type_of_facility_id" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="type_of_facility_id" id="type_of_facility_id" required>
                    <option value=""> Select Facility Type </option>
                    @if($fac_types)
                        @foreach($fac_types as $fac_types)
                            <option value="{{$fac_types->id}}"> {{$fac_types->facility_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="facility_description" class="col-sm-3 col-form-label"> Facility Description </label>
            <div class="col-sm-9">
                <textarea rows="2" class="form-control" placeholder="Facility Description" name="facility_description" id="facility_description" required></textarea>
            </div>
        </div>

     

        <div class="form-group row">
            <label for="state_id" class="col-sm-3 col-form-label"> Location Area </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="state_id" id="state_id" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="operational_status_id" class="col-sm-3 col-form-label"> Operational Status </label>
            <div class="col-sm-9">
                <select class="form-control" name="operational_status_id" id="operational_status_id" required>
                    <option value=""> Select Operational Status </option>
                    <option value="Operational"> Operational </option>
                    <option value="Non Operational"> Non Operational </option>
                    <option value="Under Suspension"> Under Suspension </option>
                </select>
            </div>
        </div>




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Accredited Managers </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Accredited Waste Managers modal -->
<div id="edit_acc_manager" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Accredited Waste Managers </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editaccmanager">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Accredited Waste Managers modal -->
<div id="upl_acc_manager" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Accredited Waste Managers Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_accredited_waste_manager">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-accredited-waste-managers-template') }}" download="Accredited Waste Managers Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Accredited Waste Managers Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Accredited Waste Managers modal -->
<div id="view_acc_" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Accredited Waste Managers </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewacc_">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Accredited Waste Managers modal -->
<div id="appaccmgt" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Accredited Waste Managers </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_acc_mgt"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Waste Management Facilities modal -->
<div id="add_mgt_fac" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Waste Management Facilities </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="mgtFacForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_she_waste_management_facilities">

          <div class="form-group row">
            <label for="year_mgtF" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_mgtF" required readonly="">
            </div>
          </div> 

          <div class="form-group row">
            <label for="month_mgtF" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_mgtF" required readonly="">
            </div>
          </div> 
        

        <div class="form-group row">
            <label for="type_of_facility_id" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="type_of_facility_id" id="type_of_facility_id" required>
                    <option value=""> Select Facility Type </option>
                    @if($type_facility_wm)
                        @foreach($type_facility_wm as $type_facility_wm)
                            <option value="{{$type_facility_wm->id}}"> {{$type_facility_wm->facility_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="operational_permit" class="col-sm-3 col-form-label"> No Of Approved Facilities </label>
            <div class="col-sm-9">
                <input typet="number" class="form-control" placeholder="No Of Approved Facilities" name="operational_permit" id="operational_permit" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="status_i" class="col-sm-3 col-form-label"> Status </label>
            <div class="col-sm-9">
                <input typet="text" class="form-control" placeholder="Status" name="status" id="status_i" required>
            </div>
        </div>



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Waste Mgt Facility </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Waste Management Facilities modal -->
<div id="edit_mgt_fac" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Waste Management Facilities </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editmgtfac">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Waste Management Facilities modal -->
<div id="upl_mgt_fac" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Waste Management Facilities Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_waste_management_facilities">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-waste-management-facilities-template') }}" download="Waste Management Facilities Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Waste Management Facilities Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Waste Management Facilities modal -->
<div id="view_mgt_fac" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Waste Management Facilities </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewngtfac">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Waste Management Facilities modal -->
<div id="app_mgt_fac" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Waste Management Facilities </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appmgtfac"></div>
          </div>
    </div>
    </div>  
</div>



<!-- Add Effluent Waste Discharged modal -->
<div id="add_effluent" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Effluent Waste Discharged </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="efflForm" action="{{url('/she-accident-report/')}}" method="POST">
          {{-- <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> --}}  {{ csrf_field() }}
            <input type="hidden" class="form-control" name="type" id="" value="add_she_effluent_waste_discharged">

          <div class="form-group row">
            <label for="year_eff" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_eff" required readonly>
            </div>

            <label for="month_eff" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_eff" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company</label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company</option>
                    @if(count($effl_company)>0)
                        @foreach($effl_company as $effl_company)
                            <option value="{{$effl_company->id}}">{{$effl_company->company_name}}</option>
                        @endforeach
                    @endif
                    <option value="0"> Others</option>
                </select>
            </div>
        </div>

          <div class="form-group row">
            <label for="well_name" class="col-sm-2 col-form-label"> Well Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well Name" name="well_name" id="well_name" required>
            </div>
          </div>


        <div class="form-group row">
            <label for="spent_wbm" class="col-sm-2 col-form-label"> Spent WBM </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Spent WBM" name="spent_wbm" id="spent_wbm" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="spent_obm" class="col-sm-2 col-form-label"> Spent OBM </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Spent OBM" name="spent_obm" id="spent_obm" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="wbm_generated" class="col-sm-2 col-form-label"> WBM Cutting Generated </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="WBM Cutting Generated" name="wbm_generated" id="wbm_generated" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="obm_generated" class="col-sm-2 col-form-label"> OBM Cutting Generated </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="OBM Cutting Generated" name="obm_generated" id="obm_generated" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="waste_manager" class="col-sm-2 col-form-label"> Waste Manager </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Waste Manager" name="waste_manager" id="waste_manager" required>
            </div>
        </div>  



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Effluent Waste Discharged </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Effluent Waste Discharged modal -->
<div id="edit_effl" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Effluent Waste Discharged </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editeffl">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Effluent Waste Discharged modal -->
<div id="upl_effluent" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Effluent Waste Discharged Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_effluent_waste_discharged">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-effluent-waste-discharged-template') }}" download="Effluent Waste Discharged Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Effluent Waste Discharged Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Effluent Waste Discharged modal -->
<div id="app_effl" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Effluent Waste Discharged </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appeffl"></div>
          </div>
    </div>
    </div>  
</div>







<!-- Add Oil Spill Contingency modal -->
<div id="add_spill_conti" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Oil Spill Contingency </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="contingencyForm" action="{{url('/she-accident-report/')}}" method="POST">
           @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_os_contingency">

          <div class="form-group row">
            <label for="year_con" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_con" required readonly="">
            </div>
          </div> 


        <div class="form-group row">
            <label for="state_id" class="col-sm-3 col-form-label"> Zones </label>
            <div class="col-sm-9">
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value=""> Select Zone </option>
                    @if($osc_zone)
                        @foreach($osc_zone as $osc_zone)
                            <option value="{{$osc_zone->id}}"> {{$osc_zone->zone_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        


        <div class="form-group row">
            <label for="types" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="types" id="types" required>
                    <option value=""> Select Facility Type </option>
                    @if($spill_fac_types)
                        @foreach($spill_fac_types as $spill_fac_types)
                            <option value="{{$spill_fac_types->id}}"> {{$spill_fac_types->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="terrain_id" class="col-sm-3 col-form-label"> Terrain </label>
            <div class="col-sm-9">
                <select class="form-control" name="terrain_id" id="terrain_id" required>
                    <option value=""> Select Terrain </option>
                    @if($terrains)
                        @foreach($terrains as $terrains)
                            <option value="{{$terrains->id}}"> {{$terrains->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="no_of_company" class="col-sm-3 col-form-label"> No of Company </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="No of Company" name="no_of_company" id="no_of_company" required/>
            </div>
        </div>


        <div class="form-group row">
            <label for="actual_no_of_company" class="col-sm-3 col-form-label"> Actual No of Company </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Actual No of Company" name="actual_no_of_company" id="actual_no_of_company" required/>
            </div>
        </div>


        

        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Oil Spill Contingency </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Oil Spill Contingency modal -->
<div id="edit_contingency" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Oil Spill Contingency </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editcontingency">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Oil Spill Contingency modal -->
<div id="upl_contingency" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Oil Spill Contingency Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" name="type" id="" value="upload_she_oil_spill_contingency">
                <input type="file" name="file">
                <p style="color:red"> {{$errors->first('file')}} </p>
                <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                <a href="{{ url('download-oil-spill-contingency-template') }}" download="Oil Spill Contingency Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Oil Spill Contingency Excel Template"> <i class="fa fa-download"></i> Download Template</a>
            </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Oil Spill Contingency modal -->
<div id="view_contingency" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Oil Spill Contingency </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewacc_contingency">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Oil Spill Contingency modal -->
<div id="appspillcont" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Oil Spill Contingency </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_spill_cont"></div>
          </div>
    </div>
    </div>  
</div>







<!-- Add Petitions Received modal -->
<div id="add_pet_received" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Petitions Received </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="petReceivedForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_pettitions_received">

          <div class="form-group row">
            <label for="year_pet" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_pet" required readonly>
            </div>

            <label for="month_pet" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_pet" required readonly>
            </div>
          </div> 
        

        <div class="form-group row">
            <label for="petitioner" class="col-sm-2 col-form-label"> Petitioner </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Petitioner" name="petitioner" id="petitioner" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="petitionee" class="col-sm-2 col-form-label"> Petitionee </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Petitionee" name="petitionee" id="petitionee" required>
            </div>
        </div> 



        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value=""> Select Category </option>
                    @if($pet_cates)
                        @foreach($pet_cates as $pet_cates)
                            <option value="{{$pet_cates->id}}"> {{$pet_cates->category_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="action_taken_id" class="col-sm-2 col-form-label"> Action Taken </label>
            <div class="col-sm-10">
                <select class="form-control" name="action_taken_id" id="action_taken_id" required>
                    <option value=""> Select Action Taken </option>
                    @if($pet_actions)
                        @foreach($pet_actions as $pet_actions)
                            <option value="{{$pet_actions->id}}"> {{$pet_actions->action_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    <option value=""> Select Status </option>
                    @if($pet_status)
                        @foreach($pet_status as $pet_status)
                            <option value="{{$pet_status->id}}"> {{$pet_status->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Petitions Received </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Petitions Received modal -->
<div id="edit_pet_received" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Petitions Received </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editpet_received">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Petitions Received modal -->
<div id="upl_pet_received" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Petitions Received Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_pettitions_received">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-pettitions-received-template') }}" download="Petitions Received Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Petitions Received Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- Approve Petitions Received modal -->
<div id="app_pett_reci" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Petitions Received </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="apppettreci"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Request For Approvals - Chemical modal -->
<div id="add_app_chemical" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Approvals - Chemical </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="appChemicalForm" action="{{url('/she-accident-report/')}}" method="POST">
          {{-- <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> --}}  {{ csrf_field() }}
            <input type="hidden" class="form-control" name="type" id="" value="add_chemical_certification">

          <div class="form-group row">
            <label for="year_app" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_app" required readonly>
            </div>

            <label for="month_app" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_app" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="company_id_chem" class="col-sm-2 col-form-label"> Company</label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_chem" required>
                    <option value=""> Select Company</option>
                    @if(count($chem_company)>0)
                        @foreach($chem_company as $chem_company)
                            <option value="{{$chem_company->id}}">{{$chem_company->company_name}}</option>
                        @endforeach
                    @endif
                    <option value="0"> Others</option>
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
            <label for="chemical_name" class="col-sm-2 col-form-label"> Chemical Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Chemical Name" name="chemical_name" id="chemical_name" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="certification_category_id" class="col-sm-2 col-form-label"> Certification Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="certification_category_id" id="certification_category_id" required>
                    <option value=""> Select Certification Category</option>
                    @if(count($lab_cates)>0)
                        @foreach($lab_cates as $lab_cates)
                            <option value="{{$lab_cates->id}}">{{$lab_cates->category_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="chemical_type" class="col-sm-2 col-form-label"> Chemical Type </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Chemical Type" name="chemical_type" id="chemical_type">
            </div>
        </div> 


        <div class="form-group row">
            <label for="certification_date" class="col-sm-2 col-form-label"> Certification Date </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" placeholder="Certification Date" name="certification_date" id="certification_date">
            </div>
        </div> 


        {{-- <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    <option value=""> Select Status</option>
                    @if(count($lab_status)>0)
                        @foreach($lab_status as $lab_status)
                            <option value="{{$lab_status->id}}">{{$lab_status->status_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div> --}} 

        <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Approval Status" name="status_id" id="status_id" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark"></textarea>
            </div>
        </div> 



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Chemical Certification </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Approvals - Chemical modal -->
<div id="edit_app_chemical" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Approvals - Chemical </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editapp_chemical">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Approvals - Chemical modal -->
<div id="upl_app_chemical" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Request For Approvals - Chemical Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_chemical_certification">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-chemical-certification-template') }}" download="Request For Approvals - Chemical Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Approvals - Chemical Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Chemical Certification modal -->
<div id="app_chem_cert" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Chemical Certification </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appchemcert"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Request For Accredited Laboratories modal -->
<div id="add_acc_laboratories" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Accredited Laboratories </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="accLabForm" action="{{url('/she-accident-report/')}}" method="POST">
          @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_accredited_laboratories">

          <div class="form-group row">
            <label for="year_acc" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_acc" required readonly="">
            </div>

            <label for="month_acc" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_acc" required readonly="">
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="laboratory_name" class="col-sm-3 col-form-label"> Laboratory Name </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Laboratory Name" name="laboratory_name" id="laboratory_name" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="laboratory_services" class="col-sm-3 col-form-label"> Laboratory Services </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Laboratory Services" name="laboratory_services" id="laboratory_services" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="zones" class="col-sm-3 col-form-label"> Zonal Office </label>
            <div class="col-sm-9">
                <select class="form-control" name="zones" id="zones" required>
                    <option value=""> Select Zonal Field Office </option>
                    @if(count($field_offices)>0)
                        @foreach($field_offices as $field_offices)
                            <option value="{{$field_offices->id}}">{{$field_offices->field_office_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="request_type" class="col-sm-3 col-form-label"> Request </label>
            <div class="col-sm-9">
                <select class="form-control" name="request_type" id="request_type" required>
                    <option value=""> Select Request Type</option>
                    <option value="NEW"> NEW</option>
                    <option value="RENEWAL"> RENEWAL</option>
                </select>
            </div>
        </div> 


        {{-- <div class="form-group row">
            <label for="no_of_accredited_lab" class="col-sm-3 col-form-label"> No of Accredited Lab </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="No of Accredited Lab" name="no_of_accredited_lab" id="no_of_accredited_lab" required>
            </div>
        </div> --}}



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Accredited Laboratories </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Accredited Laboratories modal -->
<div id="edit_acc_lab" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Accredited Laboratories </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editacc_lab">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Accredited Laboratories modal -->
<div id="upl_acc_laboratories" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Request For Accredited Laboratories Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_accredited_laboratories">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-accredited-laboratory-template') }}" download="Request For Accredited Laboratories Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Accredited Laboratories Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Accredited Laboratories modal -->
<div id="app_acc_lab" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Accredited Laboratories </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appacclab"></div>
          </div>
    </div>
    </div>  
</div>




<!-- Add Request For Drilling Chemical modal -->
<div id="add_dri_chemical" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Drilling Chemical </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="driChemForm" action="{{url('/she-accident-report/')}}" method="POST">
          @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_drilling_chemical">

          <div class="form-group row">
            <label for="year_dri" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_dri" required readonly>
            </div>

            <label for="month_dri" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_dri" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="fluid_type" class="col-sm-3 col-form-label"> Drilling Fluid Type </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Drilling Fluid Type" name="fluid_type" id="fluid_type" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="number" class="col-sm-3 col-form-label"> Number </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Number" name="number" id="number" required>
            </div>
        </div> 



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Drilling Chemical </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Drilling Chemical modal -->
<div id="edit_dri_chem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Drilling Chemical </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editdri_chem">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Drilling Chemical modal -->
<div id="upl_dri_chemical" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Request For Drilling Chemical Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_drilling_chemical">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="downloadDrillingChemicalTemplate" download="Request For Drilling Chemical Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Drilling Chemical Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>





<!-- Add Request For Environmental Restoration modal -->
<div id="add_env_restoration" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Environmental Restoration </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="envResForm" action="{{url('/she-accident-report/')}}" method="POST">
          @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_environmental_restoration">

          <div class="form-group row">
            <label for="year_env" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_env" required readonly>
            </div>

            <label for="month_env" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control month" placeholder="Month - YYYY" name="month" id="month_env" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="service" class="col-sm-3 col-form-label"> Services </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Services" name="service" id="service" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="status_id" class="col-sm-3 col-form-label"> Approval Status </label>
            <div class="col-sm-9">
                <select class="form-control" name="status_id" id="status_id" required>
                    <option value=""> Select Approval Status </option>
                    @if($status)
                        @foreach($status as $status)
                            <option value="{{$status->id}}"> {{$status->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="new" class="col-sm-3 col-form-label"> New </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="New" name="new" id="new" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="renew" class="col-sm-3 col-form-label"> Renew </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Renew" name="renew" id="renew" required>
            </div>
        </div> 



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Environmental Restoration </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Environmental Restoration modal -->
<div id="edit_env_res" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Environmental Restoration </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editenv_res">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Environmental Restoration modal -->
<div id="upl_env_restoration" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Request For Environmental Restoration Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_environmental_restoration">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-environmental-restoration-template') }}" download="Request For Environmental Restoration Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Environmental Restoration Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Environmental Restoration modal -->
<div id="app_env_rest" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Environmental Restoration </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appenvrest"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Request For Environmental Studies modal -->
<div id="add_env_studies" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Environmental Studies </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="envStuForm" action="{{url('/she-accident-report/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_environmental_studies">

          <div class="form-group row">
            <label for="year_stu" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_stu" required readonly>
            </div>
          </div> 

          <div class="form-group row">
            <label for="month_stu" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-10">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_stu" required readonly>
            </div>
          </div> 

          <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company</label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company</option>
                    @if($env_company)
                        @foreach($env_company as $env_company)
                            <option value="{{$env_company->id}}"> {{$env_company->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label"> Study Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="type_id" id="type_id" required>
                    <option value=""> Select Study Type </option>
                    @if($study_types)
                        @foreach($study_types as $study_types)
                            <option value="{{$study_types->id}}"> {{$study_types->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 

          <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    <option value=""> Select Status</option>
                    @if($study_status)
                        @foreach($study_status as $study_status)
                            <option value="{{$study_status->id}}"> {{$study_status->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 

          <div class="form-group row">
            <label for="study_title" class="col-sm-2 col-form-label"> Study Title </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Study Title" name="study_title" id="study_title" required>
            </div>
          </div> 


         

        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Environmental Studies </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Environmental Studies modal -->
<div id="edit_env_stu" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Environmental Studies </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editenv_stu">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Environmental Studies modal -->
<div id="upl_env_studies" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Request For Environmental Studies Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_environmental_studies">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-environmental-studies-template') }}" download="Request For Environmental Studies Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Environmental Studies Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Environmental Studies modal -->
<div id="app_env_stud" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Environmental Studies </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appenvstud"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Request For Environmental Compliance Monitoring modal -->
<div id="add_env_compliance" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Environmental Compliance Monitoring </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="envCompForm" action="{{url('/she-accident-report/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_environmental_compliance">

          <div class="form-group row">
            <label for="year_comp" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_comp" required readonly>
            </div>

            <label for="month_comp" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_comp" required readonly>
            </div>            
          </div> 


            
            <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id" required>
                        <option value=""> Select Company </option>
                        @if($comp_company)
                            @foreach($comp_company as $comp_company)
                                <option value="{{$comp_company->id}}"> {{$comp_company->company_name}} </option>                            
                            @endforeach
                        @endif
                    </select>
                </div>
            </div> 


            
            <div class="form-group row">
                <label for="compliance" class="col-sm-2 col-form-label"> Non-Compliance </label>
                <div class="col-sm-10">
                    <select class="form-control" name="compliance" id="compliance" required>
                        <option value=""> Select Non-Compliance </option>
                        <option value="Yes"> Yes </option>
                        <option value="No"> No </option>
                    </select>
                </div>
            </div>    
        



        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Environmental Compliance </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Environmental Compliance Monitoring modal -->
<div id="edit_env_comp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Environmental Compliance Monitoring </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editenv_comp">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Environmental Compliance Monitoring modal -->
<div id="upl_env_compliance" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Environmental Compliance Monitoring Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_environmental_compliance">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-compliance-monitoring-template') }}" download="Request For Environmental Compliance Monitoring Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Environmental Compliance Monitoring Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Environmental Compliance Monitoring modal -->
<div id="app_env_comp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Environmental Compliance Monitoring </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appenvcomp"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Request For Medical Training Center modal -->
<div id="add_med_center" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Request For Medical Training Center </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="medCenForm" action="{{url('/she-accident-report/')}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="type" id="" value="add_medical_training_center">

          <div class="form-group row">
            <label for="year_med" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_med" required readonly>
            </div>
          </div> 


            
            <div class="form-group row">
                <label for="companies" class="col-sm-3 col-form-label"> Companies </label>
                <div class="col-sm-9">
                    <textarea rows="2" class="form-control" name="companies" id="companies" required></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="facility_address" class="col-sm-3 col-form-label"> Facilities Address </label>
                <div class="col-sm-9">
                    <textarea rows="3" class="form-control" name="facility_address" id="facility_address" required></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="approved_courses" class="col-sm-3 col-form-label"> Approved Cources </label>
                <div class="col-sm-9">
                    <textarea rows="4" class="form-control" name="approved_courses" id="approved_courses" required></textarea>
                </div>
            </div>

            


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Medical Training Center </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Request For Medical Training Center modal -->
<div id="edit_med_cen" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Request For Medical Training Center </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editmed_cen">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Request For Medical Training Center modal -->
<div id="upl_med_center" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Request For Medical Training Center Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_medical_training_center">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-safety-training-center-template') }}" download="Request For Medical Training Center Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Request For Medical Training Center Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Medical Training Center modal -->
<div id="app_med_center" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Medical Training Center </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appmedcenter"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Offshore Safety Permit modal -->
<div id="add_safe_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Offshore Safety Permit </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="safeForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" name="date_safe" id="date_safe" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_she_offshore_safety_permit">

          <div class="form-group row">
            <label for="year_safe" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_safe" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="personnel_registered" class="col-sm-3 col-form-label"> Personnel Registered </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Personnel Registered" name="personnel_registered" id="personnel_registered" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="personnel_captured" class="col-sm-3 col-form-label"> Personnel Captured </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Personnel Captured" name="personnel_captured" id="personnel_captured" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="permits_issued" class="col-sm-3 col-form-label"> Permit Issued </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Permit Issued" name="permits_issued" id="permits_issued" required>
            </div>
        </div> 




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Safety Permit </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Offshore Safety Permit modal -->
<div id="edit_safe_perm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Offshore Safety Permit </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editsafe_perm">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Offshore Safety Permit modal -->
<div id="upl_safe_perm" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Safety Permit Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_she_offshore_safety_permit">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-safty-permit-template') }}" download="Safety Permit Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Safety Permit Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Offshore Safety Permit modal -->
<div id="view_safe_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Offshore Safety Permit </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewsafe_perm">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Offshore Safety Permit modal -->
<div id="apposp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Offshore Safety Permit </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_osp"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Radiation Safety Permit modal -->
<div id="add_rad_safe_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Radiation Safety Permit </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="radSafeForm" action="{{url('/she-accident-report/')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        <input type="hidden" name="date_safe" id="date_rad" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_radiation_safety_permit">

          <div class="form-group row">
            <label for="year_rad" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_rad" required readonly>
            </div>
          </div> 

          <div class="form-group row">
            <label for="month_rad" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_rad" required readonly>
            </div>
        </div> 
        


            
        <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company </option>
                    @if($rad_company)
                        @foreach($rad_company as $rad_company)
                            <option value="{{$rad_company->id}}"> {{$rad_company->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="well_type" class="col-sm-3 col-form-label"> Well Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="well_type" id="well_type" required>
                    <option value=""> Select Well Type </option>
                    <option value="Exploratory"> Exploratory </option>
                    <option value="Appraisal"> Appraisal </option>
                    <option value="Development"> Development </option>
                    <option value="Production"> Production </option>
                    <option value="Gas Injector"> Gas Injector </option>
                    <option value="Water Injector"> Water Injector </option>
                    <option value="Others"> Others </option>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="well_name" class="col-sm-3 col-form-label"> Well Name </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Well Name" name="well_name" id="well_name" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="concession" class="col-sm-3 col-form-label"> Concession </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Concession" name="concession" id="concession" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="count" class="col-sm-3 col-form-label"> Permit Count </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Permit Count" name="count" id="count" required>
            </div>
        </div> 




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_safe_btn" id="add_safe_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Radiation Permit </button>
        </div>
    </form>

</div>
</div>
</div>  
</div>


<!-- Edit Radiation Safety Permit modal -->
<div id="edit_rad_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Radiation Safety Permit </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="editrad_perm">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Radiation Safety Permit modal -->
<div id="upl_rad_perm" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Radiation Safety Permit Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('she-accident-report')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_radiation_safety_permit">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-radiation-safty-permit-template') }}" download="Radiation Safety Permit Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Radiation Safety Permit Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Radiation Safety Permit modal -->
<div id="view_rad_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Radiation Safety Permit </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewrad_perm">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Radiation Safety Permit modal -->
<div id="apprad" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Radiation Safety Permit </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>
          <div class="modal-body">
            <div id="app_rad"></div>
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
