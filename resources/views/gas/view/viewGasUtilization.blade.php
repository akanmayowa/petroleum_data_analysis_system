
<form id="" action="{{url('/gas/add_gas_utilization_summary')}}" method="POST">
          
          <?php $gas_p_tot = \App\gas_domestic_gas_supply::count();  ++$gas_p_tot; ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_SUM->id}}" disabled>
            <input type="hidden" name="tot_" id="tot_" value="{{$gas_p_tot}}">


        <div class="form-group row">
            <label for="year_util_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_util_e" value="{{$GAS_SUM->year}}" disabled>
            </div> 

            <label for="month_uti_e" class="col-sm-2 col-form-label"> month </label>
            <div class="col-sm-4">
                <select class="form-control" name="month" id="month_uti_e" disabled>
                    @if($GAS_SUM) <option value="{{$GAS_SUM->month}}"> {{$GAS_SUM->month}} </option> @endif
                </select>
            </div> 
        </div>


        <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-4">
                <select class="form-control" name="field_id" id="field_id" disabled>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else  <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else  <option value=""> N/A </option> @endif
                </select>
            </div> 
        </div>

        

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="fuel_gas" class="col-sm-2 col-form-label"> Fuel Gas </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="fuel_gas" id="fuel_gas" disabled value="{{$GAS_SUM->fuel_gas}}">
            </div>

            <label for="gas_lift" class="col-sm-2 col-form-label"> Gas Lift </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="gas_lift" id="gas_lift" disabled value="{{$GAS_SUM->gas_lift}}">
            </div>
        </div>          

        <div class="form-group row">
            <label for="re_injection" class="col-sm-2 col-form-label"> Re-Injection </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="re_injection" id="re_injection" disabled value="{{$GAS_SUM->re_injection}}">
            </div>

            <label for="ngl_lpg" class="col-sm-2 col-form-label"> NLG LPG </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="ngl_lpg" id="ngl_lpg" disabled value="{{$GAS_SUM->ngl_lpg}}">
            </div>
        </div>          

        <div class="form-group row">          
            <label for="gas_to_nipp" class="col-sm-2 col-form-label"> Gas-NIPP </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="gas_to_nipp" id="gas_to_nipp" disabled value="{{$GAS_SUM->gas_to_nipp}}">
            </div>

            <label for="local_others" class="col-sm-2 col-form-label"> Local (Others) </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="local_others" id="local_others" disabled value="{{$GAS_SUM->local_others}}">
            </div>

        </div>          

        <div class="form-group row">
            <label for="nlng_export" class="col-sm-2 col-form-label"> NLNG Export </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control edit_util" name="nlng_export" id="nlng_export" disabled value="{{$GAS_SUM->nlng_export}}">
            </div>

            <label for="shrinkage_e" class="col-sm-2 col-form-label"> Shrinkage </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control gas" placeholder="Total Gas Shrinkage" name="shrinkage" id="shrinkage_e" value="{{$GAS_SUM->shrinkage}}" disabled>
            </div>
        </div> 



        <div class="form-group row">
            <label for="ag_gas_flared_e" class="col-sm-2 col-form-label"> AG Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" class="form-control gas" placeholder="AG Gas Flared" name="ag_gas_flared" id="ag_gas_flared_e" value="{{$GAS_SUM->ag_gas_flared}} disabled" disabled="">
            </div> 

            <label for="nag_gas_flared_e" class="col-sm-2 col-form-label"> NAG Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" class="form-control gas" placeholder="NAG Gas Flared" name="nag_gas_flared" id="nag_gas_flared_e" value="{{$GAS_SUM->nag_gas_flared}}" disabled=""> 
            </div>                    
        </div>



        <div class="form-group row">
            <label for="total_gas_flared_e" class="col-sm-2 col-form-label"> Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control gas" placeholder="Total Gas Flared" name="total_gas_flared" id="total_gas_flared_e" value="{{$GAS_SUM->total_gas_flared}} disabled" disabled="">
            </div> 

            <label for="total_gas_utilized_e" class="col-sm-2 col-form-label"> Total Gas </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control gas" placeholder="Total Gas Utilized" name="total_gas_utilized" id="total_gas_utilized_e" value="{{$GAS_SUM->total_gas_utilized}}" disabled=""> 
            </div>                    
        </div> 



        <div class="form-group row">
            <label for="total_gas_utilized_e" class="col-sm-2 col-form-label"> % Utilized </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Percentage Utilized" name="percent_utilized" id="percent_utilized_e" value="{{$GAS_SUM->percent_utilized}}" disabled="">
            </div>

            <label for="total_gas_utilized_e" class="col-sm-2 col-form-label"> % Flared </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" placeholder="Percentage Flared" name="percent_flared" id="percent_flared_e" value="{{$GAS_SUM->percent_flared}}" disabled="">
            </div>
        </div>        


        <div class="form-group row">
            <label for="total_gas_utilized_e" class="col-sm-2 col-form-label"> Total AG NAG </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" placeholder="Total (AG + NAG)" name="total_ag_nag" id="total_ag_nag_e" value="{{$GAS_SUM->total_ag_nag}}" disabled="">
            </div>

            <label for="total_gas_utilized_e" class="col-sm-2 col-form-label"> Statistical Diff </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" placeholder="statistical Difference" name="statistical_diff" id="statistical_diff_e" value="{{$GAS_SUM->statistical_diff}}" disabled="">
            </div>
        </div>
           
         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_SUM->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_SUM->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>

