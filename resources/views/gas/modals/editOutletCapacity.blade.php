 <form id="" action="{{url('/gas')}}" method="POST">
          @php 
            $one_sta = \App\down_outlet_states::where('id', $OUT_CAP->state_id)->first();   $all_sta = \App\down_outlet_states::get(); 
            $one_typ = \App\gas_product_type::where('id', $OUT_CAP->product_type_id)->first();   $all_typ = \App\gas_product_type::get(); 
            $one_com = \App\company::where('id', $OUT_CAP->company_id)->first();   $all_com = \App\company::orderBy('company_name', 'asc')->get();  
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$OUT_CAP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_retail_outlet_capacity">  


           <div class="form-group row">
                <label for="year_cap" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="year" id="year_cape" value="{{$OUT_CAP->year}}" required="" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="state_id_cape" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_cape" required>
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @endif
                        @if(count($all_sta)>0)
                            @foreach($all_sta as $all_sta)
                                <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>                

                <label for="product_type_id" class="col-sm-1 col-form-label"> Type </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_type_id" id="product_type_id" required>
                        @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->product_type_name}} </option> @else <option value=""> Select Product Type </option> @endif
                        @if($all_typ)
                            @foreach($all_typ as $all_typ)
                                <option value="{{$all_typ->id}}">{{$all_typ->product_type_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>      

            <div class="form-group row">    
                <label for="company_id_cap" class="col-sm-1 col-form-label"> Company </label>
                <div class="col-sm-5">
                    <select class="form-control" name="company_id" id="company_id_cap" required>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> Select Company </option> @endif 
                        @if(count($all_com)>0)
                            @foreach($all_com as $all_com)
                                <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="capacity" class="col-sm-1 col-form-label"> Capacity </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" placeholder="Capacity in Litres" name="capacity" id="capacity" value="{{$OUT_CAP->capacity}}">
                </div>
            </div> 
  
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
                <label for="january_out" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="january" id="january_cape" value="{{$OUT_CAP->january}}" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="febuary" id="febuary_cape" value="{{$OUT_CAP->febuary}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="march" id="march_cape" value="{{$OUT_CAP->march}}" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="april" id="april_cape" value="{{$OUT_CAP->april}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="may" id="may_cape" value="{{$OUT_CAP->may}}" onkeyup="checkValue(this)">
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="june" id="june_cape" value="{{$OUT_CAP->june}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="july" id="july_cape" value="{{$OUT_CAP->july}}" onkeyup="checkValue(this)">
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="august" id="august_cape" value="{{$OUT_CAP->august}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="september" id="september_cape" value="{{$OUT_CAP->september}}" onkeyup="checkValue(this)">
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="october" id="october_cape" value="{{$OUT_CAP->october}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="november" id="november_cape" value="{{$OUT_CAP->november}}" onkeyup="checkValue(this)">
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="december" id="december_cape" value="{{$OUT_CAP->december}}" onkeyup="checkValue(this)">
                </div>
            </div>            
            

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Total" name="total" id="total_cape" value="{{$OUT_CAP->total}}" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Outlet Capacity </button>
          </div>
</form>

<script>

    $('#year_cape').datepicker(
    {
        autoclose: true,startView: 'decade',format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    })

    $('#month_cape').datepicker(
    {
        autoclose: true, format: "MM",
        viewMode: "months", 
        minViewMode: "months"
    })

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }

    //compute TOTAL for PMS Retail Outlet      
        $(document).on("input", ".cape", function()
        {
            var total_pms = 0;
            $('.cape').each(function()            
            {
                total_pms += parseInt($(this).val());
            });

            $("#total_cape").val(total_pms);                      
       
        });

</script> 