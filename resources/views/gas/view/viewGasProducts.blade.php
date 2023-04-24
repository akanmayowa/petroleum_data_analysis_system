

<form id="" action="{{url('/gas/add_retail_outlet')}}" method="POST">
    {{ csrf_field() }}

          
      @php 
        $one_com = \App\company::where('id', $GAS_PROD->company_id)->first(); 
        $one_cat = \App\gas_category::where('id', $GAS_PROD->category_id)->first();   
        $one_sta = \App\down_outlet_states::where('id', $GAS_PROD->state_id)->first();   
      @endphp


        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PROD->id}}" disabled>  
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_PROD">  


        <div class="form-group row">
            <label for="year_oute" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_oute" value="{{$GAS_PROD->year}}" disabled>
            </div>

            <label for="month_oute" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_oute" value="{{$GAS_PROD->month}}" disabled>
            </div>
        </div>

        <div class="form-group row">                
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value="">  </option> @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id" id="category_id" disabled>
                    @if($one_cat)<option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option>
                    @else <option>  </option> @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="state_id" class="col-sm-2 col-form-label"> States </label>
            <div class="col-sm-10">
                <select class="form-control" name="state_id" id="state_id" disabled>
                    @if($one_sta)<option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option>
                    @else <option>  </option> @endif
                </select>
            </div>
        </div>

        <div class="form-group row"> 
            <label for="lga" class="col-sm-2 col-form-label"> LGA </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Local Govt Area" name="lga" id="lga" value="{{$GAS_PROD->lga}}" disabled>
            </div>
        </div>

        <div class="form-group row"> 
            <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone" value="{{$GAS_PROD->zone}}" disabled>
            </div>
        </div>

        {{-- <div class="form-group row"> 
            <label for="no_of_plant" class="col-sm-2 col-form-label"> No of Plant </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="No of Plant" name="no_of_plant" id="no_of_plant" value="{{$GAS_PROD->no_of_plant}}" disabled>
            </div>
        </div> --}}

        <div class="form-group row"> 
            <label for="capacity" class="col-sm-2 col-form-label"> Capacity (MT)</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Capacity in" name="capacity" id="capacity" value="{{$GAS_PROD->capacity}}" disabled>
            </div>
        </div>

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_PROD->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_PROD->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



