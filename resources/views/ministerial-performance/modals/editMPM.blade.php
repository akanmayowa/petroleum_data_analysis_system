<form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$MPM->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="addmpm">

            <?php 
                $all_themic = \App\themic_area::get();          $one_themic = \App\themic_area::where('id', $MPM->themic_area_id)->first();
                $all_kra = \App\key_result_area::get();         $one_kra = \App\key_result_area::where('id', $MPM->key_result_area_id)->first();
                $all_kpi = \App\mpm_kpi::get();                 $one_kpi = \App\mpm_kpi::where('id', $MPM->kpi)->first();
                $all_source = \App\source::get();               $one_source = \App\source::where('id', $MPM->source_id)->first();
                $all_metric = \App\metric::get();               $one_metric = \App\metric::where('id', $MPM->metric_id)->first();
                $all_fom = \App\mpm_frequency_of_measurement::get();               $one_fom = \App\mpm_frequency_of_measurement::where('id', $MPM->metric_id)->first();
            ?>

          <div class="form-group row">
                <label for="themic_area_id" class="col-sm-2 col-form-label"> Themic Area </label>
                <div class="col-sm-10">
                    <select class="form-control" name="themic_area_id" id="themic_area_id" required readonly>
                        @if($one_themic) <option value="{{$one_themic->id}}"> {{$one_themic->themic_area_name}} </option> @endif
                        <!-- @if($all_themic)
                            @foreach($all_themic as $themic_areas)
                                <option value="{{$themic_areas->id}}"> {{$themic_areas->themic_area_name}} </option>                                
                            @endforeach
                        @endif -->
                    </select>
                </div>
          </div>

         <div class="form-group row">
                <label for="key_result_area_id" class="col-sm-2 col-form-label"> Key Result Area </label>
                <div class="col-sm-10">
                    <select class="form-control" name="key_result_area_id" id="key_result_area_id" required readonly>
                        @if($one_kra) <option value="{{$one_kra->id}}"> {{$one_kra->result_area_name}} </option> @endif
                        <!-- @if($all_kra)
                            @foreach($all_kra as $all_kra)
                                <option value="{{$all_kra->id}}"> {{$all_kra->result_area_name}} </option>                                
                            @endforeach
                        @endif -->
                    </select>
                </div>
          </div>

         <div class="form-group row">
                <label for="kpi" class="col-sm-2 col-form-label"> KPI </label>
                <div class="col-sm-10">
                    <select class="form-control" name="kpi" id="kpi" required readonly>
                        @if($one_kpi) <option value="{{$one_kpi->id}}"> {{$one_kpi->kpi_name}} </option> @endif
                        <!-- @if($all_kpi)
                            @foreach($all_kpi as $all_kpi)
                                <option value="{{$all_kpi->id}}"> {{$all_kpi->kpi_name}} </option>                                
                            @endforeach
                        @endif -->
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="source_id" class="col-sm-2 col-form-label"> Source </label>
                <div class="col-sm-4">
                    <select class="form-control" name="source_id" id="source_id" required readonly>
                        @if($one_source) <option value="{{$one_source->id}}"> {{$one_source->source_name}} </option> @endif
                        <!-- @if($all_source)
                            @foreach($all_source as $sources)
                                <option value="{{$sources->id}}"> {{$sources->source_name}} </option>                                
                            @endforeach
                        @endif -->
                    </select>
                </div>

                <label for="metric_id" class="col-sm-1 col-form-label"> Metric </label>
                <div class="col-sm-5">
                    <select class="form-control" name="metric_id" id="metric_id" required readonly>
                        @if($one_metric) <option value="{{$one_metric->id}}"> {{$one_metric->metric_name}} </option> @endif
                        <!-- @if($all_metric)
                            @foreach($all_metric as $metrics)
                                <option value="{{$metrics->id}}"> {{$metrics->metric_name}} </option>                                
                            @endforeach
                        @endif -->
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="frequency_of_measurement_id" class="col-sm-2 col-form-label"> Measurement </label>
                <div class="col-sm-4">
                    <select class="form-control" name="frequency_of_measurement_id" id="frequency_of_measurement_id" required readonly>
                        @if($one_fom) <option value="{{$one_fom->id}}"> {{$one_fom->frequency_name}} </option> @endif>
                        <!-- @if($all_fom)
                            @foreach($all_fom as $all_fom)

                                <option value="{{$all_fom->id}}"> {{$all_fom->frequency_name}} </option>
                                
                            @endforeach
                        @endif -->
                    </select>
                </div>

                <label for="year_mpm" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Monthly Performance Management YEAR" name="year" id="yearMpm" value="{{$MPM->year}}" required readonly>
                </div>
          </div>

          <div class="form-group row">               
                <label for="baseline" class="col-sm-2 col-form-label"> Baseline </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Baseline" name="baseline" id="baseline_" value="{{$MPM->baseline}}" onkeyup="checkValue(this)" readonly>
                </div>
 
                <label for="year_target" class="col-sm-1 col-form-label"> Target </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Year Target" name="year_target" id="year_target_" value="{{$MPM->year_target}}" onkeyup="checkValue(this)" readonly>
                </div>
          </div>

          <div class="form-group row">               
                <label for="january" class="col-sm-2 col-form-label"> January </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="January" name="january" id="january_" value="{{$MPM->getMpm('january')}}" onkeyup="checkValue(this)">
                </div>
 
                <label for="febuary" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="February" name="february" id="febuary_" value="{{$MPM->getMpm('february')}}" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="march" class="col-sm-2 col-form-label"> March </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="March" name="march" id="march_" value="{{$MPM->getMpm('march')}}" onkeyup="checkValue(this)">
                </div>
 
                <label for="april" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="April" name="april" id="april_" value="{{$MPM->getMpm('april')}}" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="may" class="col-sm-2 col-form-label"> May </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="May" name="may" id="may_" value="{{$MPM->getMpm('may')}}" onkeyup="checkValue(this)">
                </div>
 
                <label for="june" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="June" name="june" id="june_" value="{{$MPM->getMpm('june')}}" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="july" class="col-sm-2 col-form-label"> July </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="July" name="july" id="july_" value="{{$MPM->getMpm('july')}}" onkeyup="checkValue(this)">
                </div>
 
                <label for="august" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="August" name="august" id="august_" value="{{$MPM->getMpm('august')}}" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="september" class="col-sm-2 col-form-label"> September </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="September" name="september" id="september_" value="{{$MPM->getMpm('september')}}" onkeyup="checkValue(this)">
                </div>
 
                <label for="october" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="October" name="october" id="october_" value="{{$MPM->getMpm('october')}}" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">               
                <label for="november" class="col-sm-2 col-form-label"> November </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="November" name="november" id="november_" value="{{$MPM->getMpm('november')}}" onkeyup="checkValue(this)">
                </div>
 
                <label for="december" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="December" name="december" id="december_" value="{{$MPM->getMpm('december')}}" onkeyup="checkValue(this)">
                </div>
          </div>

          <div class="form-group row">
                <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
                <div class="col-sm-10">
                    <textarea row="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$MPM->remark}}</textarea>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Ministerial KPI</button>
          </div>
</form>











<script type="text/javascript">
    $(function()
    {

                $('#yearMpm').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });


        //compute TOTAL Retail Outlet      
        $(document).on("input", ".out", function()
        {
            var total_out = 0;
            $('.out').each(function()            
            {
                total_out += parseFloat($(this).val());
            });

            $("#total_out").val(total_out);
            console.log(total_out);
        });

        // $('#themic_area_id').attr('disabled', true);
    });

    

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
        }
    }
</script>