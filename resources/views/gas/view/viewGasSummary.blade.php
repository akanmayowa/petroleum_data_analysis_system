
<form id="" action="{{url('/gas/add_gas_production_summary')}}" method="POST">
          
          <?php $gas_p_tot = \App\gas_domestic_gas_supply::count();  ++$gas_p_tot; ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_SUM->id}}" disabled>
            <input type="hidden" name="tot_" id="tot_" value="{{$gas_p_tot}}">


            <div class="form-group row">
            <label for="year_sum" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_sum" value="{{$GAS_SUM->year}}" disabled>
            </div> 

            <label for="month_sum" class="col-sm-1 col-form-label"> month </label>
            <div class="col-sm-5">
                <select class="form-control" name="month" id="month_sum" disabled="true">
                    @if($GAS_SUM) <option value="{{$GAS_SUM->month}}"> {{$GAS_SUM->month}} </option> @endif
                </select>
            </div>              
        </div>

            
        <div class="form-group row">
            <label for="field_id" class="col-sm-1 col-form-label"> Field </label>
            <div class="col-sm-5">
                <select class="form-control" name="field_id" id="field_id" disabled>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else  <option value=""> Select Field </option> @endif
                </select>
            </div>
            
            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else  <option value=""> N/A </option> @endif
                </select>
            </div> 
        </div>

        

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="spdc" class="col-sm-1 col-form-label"> AG </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control " placeholder="Associated Gas" name="ag" id="ag" disabled value="{{$GAS_SUM->ag}}">
            </div>

            <label for="cnl" class="col-sm-1 col-form-label"> NAG </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control " placeholder="Non Associated Gas" name="nag" id="nag" disabled value="{{$GAS_SUM->nag}}">
            </div>
        </div>  



        <div class="form-group row">
            <label for="cnl" class="col-sm-1 col-form-label"> Total </label>
            <div class="col-sm-11">
                <input type="text" step="0.01" class="form-control" placeholder="Total" name="total" id="edit_total_ap" value="{{$GAS_SUM->total}}" disabled="">
            </div>
        </div> 

           
         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_SUM->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_SUM->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


