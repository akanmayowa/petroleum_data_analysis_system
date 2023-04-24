
<form id="" action="{{url('/upstream/add_seismic_data')}}" method="POST">
    @php 
          $one_ter = \App\terrain::where('id', $SEIS_DATA->terrain_id)->first();         
          $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
          $one_phy = \App\up_geophysical::where('id', $SEIS_DATA->geophysical_id)->first();             
          $all_phy = \App\up_geophysical::orderBy('geophysical_name', 'asc')->get();
          $one_tec = \App\up_geotechnical::where('id', $SEIS_DATA->geotechnical_id)->first();             
          $all_tec = \App\up_geotechnical::orderBy('geotechnical_name', 'asc')->get();
          $one_sta = \App\status_category::where('id', $SEIS_DATA->status)->first();       
          $all_sta = \App\status_category::orderBy('status', 'asc')->get();
    @endphp


           <div class="form-group row">
            <label for="year_sd" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_sde" value="{{$SEIS_DATA->year}}" disabled="">
            </div>

            <label for="month_sd" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_sde" value="{{$SEIS_DATA->month}}" disabled="">
            </div>
          </div>

          <div class="form-group row">
            <label for="field_id_sd" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Location" name="field_id" id="field_id_sd" value="{{$SEIS_DATA->field_id}}" disabled="">
            </div>
          </div>

          <div class="form-group row">
            <label for="terrain_id_cp" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id_cp" disabled>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option>N/A</option> @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="geophysical_id" class="col-sm-2 col-form-label"> Geophysical Data </label>
            <div class="col-sm-4">
                <select class="form-control" name="geophysical_id" id="geophysical_id" disabled>
                    @if($one_phy) <option value="{{$one_phy->id}}"> {{$one_phy->geophysical_name}} </option> 
                    @else <option> </option> @endif
                </select>
            </div>

            <label for="geotechnical_id" class="col-sm-2 col-form-label"> Geotechnical Data </label>
            <div class="col-sm-4">
                <select class="form-control" name="geotechnical_id" id="geotechnical_id" disabled>
                    @if($one_tec) <option value="{{$one_tec->id}}"> {{$one_tec->geotechnical_name}} </option> 
                    @else <option> </option> @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="seismic_type" class="col-sm-2 col-form-label"> Activity </label>
            <div class="col-sm-10">
                <select class="form-control" name="seismic_type" id="seismic_type" disabled>
                    @if($SEIS_DATA) 
                        <option value="{{$SEIS_DATA->seismic_type}}"> 
                            @if($SEIS_DATA->seismic_type == 1) Data Acquisition 
                            @elseif($SEIS_DATA->seismic_type == 2) Data Processing
                            @elseif($SEIS_DATA->seismic_type == 3) Data Reprocessing
                            @else N/A @endif
                        </option>
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="approved_coverage" class="col-sm-2 col-form-label"> Approved Coverage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="approved_coverage" id="approved_coverage" value="{{$SEIS_DATA->approved_coverage}}" data-toggle="tooltip" title="In Sq.Km" disabled>
            </div>

            <label for="actual_coverage" class="col-sm-2 col-form-label"> Actual Coverage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="actual_coverage" id="actual_coverage" value="{{$SEIS_DATA->actual_coverage}}" data-toggle="tooltip" title="In Sq.Km" disabled>
            </div>
          </div>       
          

          <div class="form-group row">
            <label for="Status_" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="Status_" disabled>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="number" class="form-control" rows="2" name="remark" id="remark" disabled>{{$SEIS_DATA->remark}}</textarea>
            </div>
          </div>

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($SEIS_DATA->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($SEIS_DATA->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>

