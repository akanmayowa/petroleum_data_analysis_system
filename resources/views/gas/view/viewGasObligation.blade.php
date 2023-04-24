
<form id="" action="{{url('/gas/add_gas_supply_obligation')}}" method="POST">
          <?php $one_gas = \App\company::where('id', $GAS_PERF->company_id)->first();           $all_gas = \App\company::get();  ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PERF->id}}" disabled>


            <div class="form-group row">
                <label for="year_ob" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_ob" value="{{$GAS_PERF->year}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
            <label for="company_id_sup" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_sup" disabled>
                    @if($one_gas) <option value="{{$one_gas->id}}"> {{$one_gas->company_name}} </option> @endif
                </select>
            </div>
          </div>


        <div class="form-group row">
            <label for="performance_obligation" class="col-sm-2 col-form-label"> Obligation </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Obligation" name="performance_obligation" id="performance_obligation" disabled value="{{$GAS_PERF->performance_obligation}}">
            </div>
        </div> 


           
         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_PERF->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_PERF->updated_at)->diffForHumans()}}
            </div>
          </div>

    </form>

