 <form id="gasProdForm" action="{{url('/gas')}}" method="POST">
    {{ csrf_field() }}

      @php 
        $one_com = \App\company::where('id', $GAS_PROD->company_id)->first();   
        $all_com = \App\company::orderBy('company_name', 'asc')->get(); 
        $one_cat = \App\gas_category::where('id', $GAS_PROD->category_id)->first();   
        $all_lpg = \App\gas_category::where('type', 'LPG')->orderBy('category_name', 'asc')->get(); 
        $all_cng = \App\gas_category::where('type', 'CNG')->orderBy('category_name', 'asc')->get();
        $all_lng = \App\gas_category::where('type', 'LNG')->orderBy('category_name', 'asc')->get();
        $all_pro = \App\gas_category::where('type', 'PROPANE')->orderBy('category_name', 'asc')->get();
        $one_sta = \App\down_outlet_states::where('id', $GAS_PROD->state_id)->first();   
        $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
      @endphp


        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PROD->id}}" required>  
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_products">  


        <div class="form-group row">
            <label for="year_oute" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_oute" value="{{$GAS_PROD->year}}" required="" readonly>
            </div>

            <label for="month_oute" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_oute" value="{{$GAS_PROD->month}}" required="" readonly>
            </div>
        </div>


        {{-- <div class="form-group row">                
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if(count($all_com)>0)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div> --}}

        <div class="form-group row">
            <label for="product_types" class="col-sm-2 col-form-label"> Product </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="product_type" id="product_types" value="{{$GAS_PROD->product_type}}" readonly>
            </div>

            {{-- <label for="categories_ids" class="col-sm-2 col-form-label"> Category </label> --}}
            <div class="col-sm-4">
                <input type="hidden" class="form-control" placeholder="" name="categories_id" id="categories_ids" value="{{$GAS_PROD->category_id}}" readonly>
            </div>
        </div>

        <div class="form-group row" id="lpg_divs">
            <label for="category_id_lpgs" class="col-sm-2 col-form-label"> Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id_lpgs" id="category_id_lpgs">
                    @if($one_cat && $GAS_PROD->product_type == 'LPG')<option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option>
                    @else <option>  </option> @endif
                    @if($all_lpg)
                        @foreach($all_lpg as $all_lpg)
                            <option value="{{$all_lpg->id}}">{{$all_lpg->category_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row" id="cng_divs">
            <label for="category_id_cngs" class="col-sm-2 col-form-label"> CNG Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id_cngs" id="category_id_cngs">
                    @if($one_cat && $GAS_PROD->product_type == 'CNG')<option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option>
                    @else <option>  </option> @endif
                    @if($all_cng)
                        @foreach($all_cng as $all_cng)
                            <option value="{{$all_cng->id}}">{{$all_cng->category_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row" id="lng_divs">
            <label for="category_id_lngs" class="col-sm-2 col-form-label"> LNG Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id_lngs" id="category_id_lngs">
                    @if($one_cat && $GAS_PROD->product_type == 'LNG')<option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option>
                    @else <option>  </option> @endif
                    @if($all_lng)
                        @foreach($all_lng as $all_lng)
                            <option value="{{$all_lng->id}}">{{$all_lng->category_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row" id="prop_divs">
            <label for="category_id_pros" class="col-sm-2 col-form-label"> Propane Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id_pros" id="category_id_pros">
                    @if($one_cat && $GAS_PROD->product_type == 'PROPANE')<option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option>
                    @else <option>  </option> @endif
                    @if($all_pro)
                        @foreach($all_pro as $all_pro)
                            <option value="{{$all_pro->id}}">{{$all_pro->category_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        {{-- <div class="form-group row">
            <label for="state_id" class="col-sm-2 col-form-label"> States </label>
            <div class="col-sm-10">
                <select class="form-control" name="state_id" id="state_id" required>
                    @if($one_sta)<option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option>
                    @else <option>  </option> @endif
                    @if(count($all_sta)>0)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div> --}}

        {{-- <div class="form-group row"> 
            <label for="lga" class="col-sm-2 col-form-label"> LGA </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Local Govt Area" name="lga" id="lga" value="{{$GAS_PROD->lga}}">
            </div>
        </div> --}}

        <div class="form-group row"> 
            <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone" value="{{$GAS_PROD->zone}}">
            </div>
        </div>

        {{-- <div class="form-group row"> 
            <label for="no_of_plant" class="col-sm-2 col-form-label"> No of Plant </label>
            <div class="col-sm-10">
                <input type="munber" class="form-control" placeholder="No of Plant" name="no_of_plant" id="no_of_plant" value="{{$GAS_PROD->no_of_plant}}" required>
            </div>
        </div> --}}

        <div class="form-group row"> 
            <label for="capacity" class="col-sm-2 col-form-label"> Capacity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Capacity" name="capacity" id="capacity" value="{{$GAS_PROD->capacity}}">
            </div>
        </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Product </button>
      </div>
</form>

<script>
    $(function()
    {  
        $("#gasProdForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasProdForm', "{{url('/gas')}}", 'edit_ret_outlet');

            //CHECKING FOR THE SELECTED PRODUCT CATEGORY TO RELOAD
            var prod = $('#product_types').val(); 
            var cate = $('#categories_ids').val();

            if(prod == 'LPG'){ displayGasProductLPG(); }
            else if(prod == 'CNG'){ displayGasProductCNG(); }
            else if(prod == 'LNG'){ displayProductLNG(); }
            else if(prod == 'PROPANE'){ displayGasProductPROPANE(); }

            
        });


        $('#year_oute').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        $('#month_oute').datepicker(
        {
          autoclose: true, format: "MM",
          viewMode: "months", 
          minViewMode: "months"
      }) 

    });

    $(function()
    {
        var prod = $('#product_types').val(); 
        var cate = $('#categories_ids').val();

             if(prod == 'LPG'){ $('#lpg_divs').show();        $('#cng_divs').hide();    $('#lng_divs').hide();    $('#prop_divs').hide(); }
        else if(prod == 'CNG'){ $('#cng_divs').show();        $('#lpg_divs').hide();    $('#lng_divs').hide();    $('#prop_divs').hide(); }
        else if(prod == 'LNG'){ $('#lng_divs').show();        $('#cng_divs').hide();    $('#lpg_divs').hide();    $('#prop_divs').hide(); }
        else if(prod == 'PROPANE'){ $('#prop_divs').show();   $('#cng_divs').hide();    $('#lng_divs').hide();    $('#lpg_divs').hide(); }
                  

        //WHEN A CATEGORY IS SELECTED
        $("#category_id_lpgs").on('change', function(e)
        { 
            $('#categories_ids').val('');
            var cate = $('#category_id_lpgs').val();    $('#categories_ids').val(cate);
        }); 
        $("#category_id_cngs").on('change', function(e)
        { 
            $('#categories_ids').val('');
            var cate = $('#category_id_cngs').val();    $('#categories_ids').val(cate);
        }); 
        $("#category_id_lngs").on('change', function(e)
        { 
            $('#categories_ids').val('');
            var cate = $('#category_id_lngs').val();    $('#categories_ids').val(cate);
        }); 
        $("#category_id_pros").on('change', function(e)
        { 
            $('#categories_ids').val('');
            var cate = $('#category_id_pros').val();    $('#categories_ids').val(cate);
        }); 
    }); 

</script> 