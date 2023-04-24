<form id="" action="{{url('/gas/add_gas_supply_performance')}}" method="POST">
    @php 
        $one_gas = \App\company::where('id', $GAS_PERF->company_id)->first();   
    @endphp
          {{ csrf_field() }}


            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PERF->id}}"  disabled>

            <div class="form-group row">
            <label for="year_gs" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year_gs" value="{{$GAS_PERF->year}}" disabled>
            </div>

            <label for="month_gs" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_gs" value="{{$GAS_PERF->month}}" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="company_id_sup" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_sup" disabled>
                    @if($one_gas) <option value="{{$one_gas->id}}"> {{$one_gas->company_name}} </option> 
                    @else <option value="">  </option>  @endif
                </select>
            </div>
          </div>


            <div class="form-group row">
                <label for="power" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" placeholder="Supplied to Commercials" name="power" id="power" value="0" value="{{$GAS_PERF->power}}" disabled>
                </div>
            </div>


            <div class="form-group row">
                <label for="commercial" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" placeholder="Supplied to Commercials" name="commercial" id="commercial" value="0" value="{{$GAS_PERF->commercial}}" disabled>
                </div>
            </div>


            <div class="form-group row">
                <label for="industry" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" placeholder="Supplied to Commercials" name="industry" id="industry" value="0" value="{{$GAS_PERF->industry}}" disabled>
                </div>
            </div>


            <div class="form-group row">
                <label for="total" class="col-sm-2 col-form-label"> Total Gas Supplied </label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" placeholder="Total" name="total" id="total" value="0" value="{{$GAS_PERF->total}}" disabled>
                </div>
            </div>
        

           
         
           <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_PERF->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_PERF->updated_at)->diffForHumans()}}
            </div>
          </div>
    </form>



