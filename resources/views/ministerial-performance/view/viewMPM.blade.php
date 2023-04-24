
<form id="" action="{{url('/ministerial-performance/addmpm')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$MPM->id}}" disabled>

            <?php 
                $one_themic = \App\themic_area::where('id', $MPM->themic_area_id)->first();             $one_kra = \App\key_result_area::where('id', $MPM->key_result_area_id)->first();
                $one_kpi = \App\mpm_kpi::where('id', $MPM->kpi)->first();                               $one_source = \App\source::where('id', $MPM->source_id)->first();
                $one_metric = \App\metric::where('id', $MPM->metric_id)->first();                       $one_fom = \App\mpm_frequency_of_measurement::where('id', $MPM->metric_id)->first();
            ?>

          <div class="form-group row">
                <label for="themic_area_id" class="col-sm-2 col-form-label"> Themic Area </label>
                <div class="col-sm-10">
                    <select class="form-control" name="themic_area_id" id="themic_area_id" disabled>
                        @if($one_themic) <option value="{{$one_themic->id}}"> {{$one_themic->themic_area_name}} </option> @endif
                    </select>
                </div>
          </div>

         <div class="form-group row">
                <label for="key_result_area_id" class="col-sm-2 col-form-label"> Key Result Area </label>
                <div class="col-sm-10">
                    <select class="form-control" name="key_result_area_id" id="key_result_area_id" disabled>
                        @if($one_kra) <option value="{{$one_kra->id}}"> {{$one_kra->result_area_name}} </option> @endif
                    </select>
                </div>
          </div>

         <div class="form-group row">
                <label for="kpi" class="col-sm-2 col-form-label"> KPI </label>
                <div class="col-sm-10">
                    <select class="form-control" name="kpi" id="kpi" disabled>
                        @if($one_kpi) <option value="{{$one_kpi->id}}"> {{$one_kpi->kpi_name}} </option> @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="source_id" class="col-sm-2 col-form-label"> Source </label>
                <div class="col-sm-4">
                    <select class="form-control" name="source_id" id="source_id" disabled>
                        @if($one_source) <option value="{{$one_source->id}}"> {{$one_source->source_name}} </option> @endif
                    </select>
                </div>

                <label for="metric_id" class="col-sm-1 col-form-label"> Metric </label>
                <div class="col-sm-5">
                    <select class="form-control" name="metric_id" id="metric_id" disabled>
                        @if($one_metric) <option value="{{$one_metric->id}}"> {{$one_metric->metric_name}} </option> @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="frequency_of_measurement_id" class="col-sm-2 col-form-label"> Measurement </label>
                <div class="col-sm-4">
                    <select class="form-control" name="frequency_of_measurement_id" id="frequency_of_measurement_id" disabled>
                        @if($one_fom) <option value="{{$one_fom->id}}"> {{$one_fom->frequency_name}} </option> @endif>
                    </select>
                </div>

                <label for="year_mpm" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Monthly Performance Management YEAR" name="year" id="yearMpm" readonly value="{{$MPM->year}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="baseline" class="col-sm-2 col-form-label"> Baseline </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Baseline" name="baseline" id="baseline_" value="{{$MPM->baseline}}" disabled>
                </div>
 
                <label for="year_target" class="col-sm-1 col-form-label"> Target </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Year Target" name="year_target" id="year_target_" value="{{$MPM->year_target}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="january" class="col-sm-2 col-form-label"> January </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="January" name="january" id="january_" value="{{$MPM->getMpm('january')}}" disabled>
                </div>
 
                <label for="febuary" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="February" name="february" id="febuary_" value="{{$MPM->getMpm('february')}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="march" class="col-sm-2 col-form-label"> March </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="March" name="march" id="march_" value="{{$MPM->getMpm('march')}}" disabled>
                </div>
 
                <label for="april" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="April" name="april" id="april_" value="{{$MPM->getMpm('april')}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="may" class="col-sm-2 col-form-label"> May </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="May" name="may" id="may_" value="{{$MPM->getMpm('may')}}" disabled>
                </div>
 
                <label for="june" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="June" name="june" id="june_" value="{{$MPM->getMpm('june')}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="july" class="col-sm-2 col-form-label"> July </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="July" name="july" id="july_" value="{{$MPM->getMpm('july')}}" disabled>
                </div>
 
                <label for="august" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="August" name="august" id="august_" value="{{$MPM->getMpm('august')}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="september" class="col-sm-2 col-form-label"> September </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="September" name="september" id="september_" value="{{$MPM->getMpm('september')}}" disabled>
                </div>
 
                <label for="october" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="October" name="october" id="october_" value="{{$MPM->getMpm('october')}}" disabled>
                </div>
          </div>

          <div class="form-group row">               
                <label for="november" class="col-sm-2 col-form-label"> November </label>
                <div class="col-sm-4">
                    <input type="text" step="0.01" class="form-control mon" placeholder="November" name="november" id="november_" value="{{$MPM->getMpm('november')}}" disabled>
                </div>
 
                <label for="december" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control mon" placeholder="December" name="december" id="december_" value="{{$MPM->getMpm('december')}}" disabled>
                </div>
          </div>

          <div class="form-group row">
                <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
                <div class="col-sm-10">
                    <textarea row="3" class="form-control" placeholder="Remark" name="remark" id="remark" disabled>{{$MPM->remark}}</textarea>
                </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($MPM->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($MPM->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



