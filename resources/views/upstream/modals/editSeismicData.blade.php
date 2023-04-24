<form id="upSeisDataForm" action="{{url('/upstream')}}" method="POST">
  {{ csrf_field() }}

    @php 
          $one_ter = \App\terrain::where('id', $SEIS_DA_->terrain_id)->first();         
          $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
          $one_phy = \App\up_geophysical::where('id', $SEIS_DA_->geophysical_id)->first();             
          $all_phy = \App\up_geophysical::orderBy('geophysical_name', 'asc')->get();
          $one_tec = \App\up_geotechnical::where('id', $SEIS_DA_->geotechnical_id)->first();             
          $all_tec = \App\up_geotechnical::orderBy('geotechnical_name', 'asc')->get();
          $one_sta = \App\status_category::where('id', $SEIS_DA_->status)->first();       
          $all_sta = \App\status_category::orderBy('status', 'asc')->get();
    @endphp

            <input type="hidden" class="form-control" id="id" name="id" value="{{$SEIS_DA_->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_seismic_data">


           <div class="form-group row">
            <label for="year_sei_" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_sei_" value="{{$SEIS_DA_->year}}" required="" readonly="">
            </div>

            <label for="month_sei_" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_sei_" value="{{$SEIS_DA_->month}}" required="" readonly="">
            </div>
          </div>

          <div class="form-group row">
            <label for="field_id_sd" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Location" name="field_id" id="field_id_sd" value="{{$SEIS_DA_->field_id}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="terrain_id_cp" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id_cp" required>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> 
                    @else <option> </option> @endif
                    @if($all_ter)
                        @foreach($all_ter as $all_ter)
                            <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>



          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Geo Type </label>
            <div class="col-sm-4">

                <label class="container"> <span style="margin-left: 20px"> Geophysical </span>
                  <input type="radio" name="geo_id" id="geophye" value="1"> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Geotechnical </span>
                  <input type="radio" name="geo_id" id="geotece" value="2">  <span class="checkmark"></span>
                </label>          
               
            </div>


            <div class="col-sm-6">
              <div id="geo_phye">
                <div class="col-sm-12" style="padding: 0px">
                <label for="geophysical_id" class="col-form-label"> Geophysical Data </label>
                    <select class="form-control" name="geophysical_id" id="geophysical_id">
                      @if($one_phy) <option value="{{$one_phy->id}}"> {{$one_phy->geophysical_name}} </option> 
                      @else <option> </option> @endif
                      @if($all_phy)
                          @foreach($all_phy as $all_phy)
                              <option value="{{$all_phy->id}}"> {{$all_phy->geophysical_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
                </div>
              </div>

              <div id="geo_tece">
                <div class="col-sm-12" style="padding: 0px">
                <label for="geophysical_id" class="col-form-label"> Geotechnical Data </label>
                    <select class="form-control" name="geotechnical_id" id="geotechnical_id">
                      @if($one_tec) <option value="{{$one_tec->id}}"> {{$one_tec->geotechnical_name}} </option> 
                      @else <option> </option> @endif
                      @if($all_tec)
                          @foreach($all_tec as $all_tec)
                              <option value="{{$all_tec->id}}"> {{$all_tec->geotechnical_name}} </option>                            
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
                    @if($SEIS_DA_) 
                        <option value="{{$SEIS_DA_->seismic_type}}"> 
                            @if($SEIS_DA_->seismic_type == 1) Data Acquisition 
                            @elseif($SEIS_DA_->seismic_type == 2) Data Processing
                            @elseif($SEIS_DA_->seismic_type == 3) Data Reprocessing @endif
                        </option>
                    @endif
                    <option value="1"> Data Acquisition </option>
                    <option value="2"> Data Processing </option>
                    <option value="3"> Data Reprocessing </option>
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="approved_coverage" class="col-sm-2 col-form-label"> Approved Coverage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="approved_coverage" id="approved_coverage" value="{{$SEIS_DA_->approved_coverage}}" data-toggle="tooltip" title="In Sq.Km">
            </div>

            <label for="actual_coverage" class="col-sm-2 col-form-label"> Actual Coverage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="actual_coverage" id="actual_coverage" value="{{$SEIS_DA_->actual_coverage}}" data-toggle="tooltip" title="In Sq.Km">
            </div>
          </div>       
          

          <div class="form-group row">
            <label for="Status_" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="Status_">
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status}} </option> @else <option value=""> Select Status </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="number" class="form-control" rows="2" name="remark" id="remark">{{$SEIS_DA_->remark}}</textarea>
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="update_sd_btn" id="update_sd_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Seismic Data </button>
          </div>
</form>


<script>
  $(function()
  {     
        $("#upSeisDataForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upSeisDataForm', "{{url('/upstream')}}", 'editseis_data');

            displaySeismicData();
        });


      $('#year_sei_').datepicker(
      {
        format: "yyyy",
        viewMode: "Years", 
        minViewMode: "Years",
        autoclose: true
      });

      $('#month_sei_').datepicker(
      {
        autoclose: true,
        format: "MM",
        viewMode: "months", 
        minViewMode: "months"
      });     

  });

  $(function()
  {
    //Hide and show div for Geo type
    $('#geo_phye').hide();      $('#geo_tece').hide(); 

    $('#geophye').click(function()
    {
       $('#geo_phye').show();      $('#geo_tece').hide();                
    });
    $('#geotece').click(function()
    {
       $('#geo_tece').show();      $('#geo_phye').hide();              
    });
  });
</script>