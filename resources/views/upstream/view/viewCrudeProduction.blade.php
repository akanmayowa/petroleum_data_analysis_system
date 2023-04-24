
<form id="" action="{{url('/upstream/add_crude_production')}}" method="POST">
          <?php 
                $one_fie = \App\field::where('id', $CRU_PROD->field_id)->first();           $one_ter = \App\terrain::where('id', $CRU_PROD->terrain_id)->first();   
          ?>
          {{ csrf_field() }}            <input type="hidden" class="form-control" id="id" name="id" value="{{$CRU_PROD->id}}" disabled>


           <div class="form-group row">
            <label for="field_id_cpe" class="col-sm-1 col-form-label"> Fields </label>
            <div class="col-sm-11">
                <select class="form-control" name="field_id" id="field_id_cpe" disabled>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else <option value=""> N/A</option> @endif
                </select>
            </div>
          </div>


           <div class="form-group row">
            <label for="terrain_id_cpe" class="col-sm-1 col-form-label"> Terrain </label>
            <div class="col-sm-5">
                <select class="form-control" name="terrain_id" id="terrain_id_cpe" disabled>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option value=""> N/A</option> @endif
                </select>
            </div>

            <label for="year_pcpe" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Crude Production Year" name="year" id="year_pcpe" value="{{$CRU_PROD->year}}" disabled="">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
                <input type="hidden" class="form-control" placeholder="Company" name="company_id" id="company_id_cpe" value="{{$CRU_PROD->company_id}}" readonly="">
                <input type="hidden" class="form-control" placeholder="Contract" name="contract_id" id="contract_id_cpe" value="{{$CRU_PROD->contract_id}}" readonly="">
            </div>
          </div>

          <div class="form-group row">
          </div>


          <div class="form-group row">
            <label for="january_pcpe" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="january" id="january_pcpe" value="{{$CRU_PROD->january}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="febuary_pcpe" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="febuary" id="febuary_pcpe" value="{{$CRU_PROD->febuary}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="march_pcpe" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="march" id="march_pcpe" value="{{$CRU_PROD->march}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="april_pcpe" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="april" id="april_pcpe" value="{{$CRU_PROD->april}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="may_pcpe" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="may" id="may_pcpe" value="{{$CRU_PROD->may}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="june_pcpe" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="june" id="june_pcpe" value="{{$CRU_PROD->june}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="july_pcpe" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="july" id="july_pcpe" value="{{$CRU_PROD->july}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="august_pcpe" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="august" id="august_pcpe" value="{{$CRU_PROD->august}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="september_pcpe" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="september" id="september_pcpe" value="{{$CRU_PROD->september}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="october_pcpe" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="october" id="october_pcpe" value="{{$CRU_PROD->october}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="november_pcpe" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="november" id="november_pcpe" value="{{$CRU_PROD->november}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="december_pcpe" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="december" id="december_pcpe" value="{{$CRU_PROD->december}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>





         

          <div class="form-group row" style="display: none;">
            <label for="company_total" class="col-sm-1 col-form-label"> Total (Bbls)</label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="company_total" id="company_totale" value="{{$CRU_PROD->company_total}}" readonly="">
            </div>

            <label for="average_production" class="col-sm-1 col-form-label"> Average (BOPD) </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="average_production" id="average_productione" value="{{$CRU_PROD->average_production}}" readonly="">
            </div>

            <label for="percentage_production" class="col-sm-1 col-form-label"> % Prod </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="percentage_production" id="percentage_productione" value="{{$CRU_PROD->percentage_production}}" readonly="">
            </div>
          </div>

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($CRU_PROD->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($CRU_PROD->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>





