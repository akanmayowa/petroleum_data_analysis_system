 <form id="outCapFormed" action="{{url('/downstream')}}" method="POST">
          @php 
            $one_sta = \App\down_outlet_states::where('id', $OUT_CAP->state_id)->first();   
            $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();  
            $one_seg = \App\down_market_segment::where('id', $OUT_CAP->market_segment_id)->first();   
            $all_seg = \App\down_market_segment::where('id', '>', 1)->where('id', '<', 6)->orderBy('market_segment_name', 'asc')->get(); 
            $one_pro = \App\down_import_product::where('id', $OUT_CAP->product_id)->first();   
            $all_pro = \App\down_import_product::where('product_name', 'PMS')->orwhere('product_name', 'AGO')->orwhere('product_name', 'DPK')
                                                ->orderBy('product_name', 'asc')->get(); 
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$OUT_CAP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_retail_outlet_capacity">  


           <div class="form-group row">
                <label for="state_id_cape" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_cape" required>
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option>
                        @else <option value=""></option> @endif
                        @if(count($all_sta)>0)
                            @foreach($all_sta as $all_sta)
                                <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="market_segment_id_cape" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_id_cape" required>
                        @if($one_seg) <option value="{{$one_seg->id}}"> {{$one_seg->market_segment_name}} </option>
                        @else <option value=""></option> @endif
                        @if(count($all_seg)>0)
                            @foreach($all_seg as $all_seg)
                                <option value="{{$all_seg->id}}">{{$all_seg->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="product_id" class="col-sm-1 col-form-label"> Product </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id" required>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option>
                        @else <option value=""></option> @endif
                        @if(count($all_pro)>0)
                            @foreach($all_pro as $all_pro)
                                <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_cape" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_cape" value="{{$OUT_CAP->year}}" required="" readonly>
                </div>
            </div>   
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
                <label for="january_out" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="january" id="january_oute" value="{{$OUT_CAP->january}}" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="febuary" id="febuary_oute" value="{{$OUT_CAP->febuary}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="march" id="march_oute" value="{{$OUT_CAP->march}}" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="april" id="april_oute" value="{{$OUT_CAP->april}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="may" id="may_oute" value="{{$OUT_CAP->may}}" onkeyup="checkValue(this)">
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="june" id="june_oute" value="{{$OUT_CAP->june}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="july" id="july_oute" value="{{$OUT_CAP->july}}" onkeyup="checkValue(this)">
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="august" id="august_oute" value="{{$OUT_CAP->august}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="september" id="september_oute" value="{{$OUT_CAP->september}}" onkeyup="checkValue(this)">
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="october" id="october_oute" value="{{$OUT_CAP->october}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="november" id="november_oute" value="{{$OUT_CAP->november}}" onkeyup="checkValue(this)">
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="december" id="december_oute" value="{{$OUT_CAP->december}}" onkeyup="checkValue(this)">
                </div>
            </div>            
            

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Total" name="total" id="total_oute" value="{{$OUT_CAP->total}}" required="" readonly="">
                </div>
            </div>
            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="update_cap_btn" id="update_cap_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Outlet Capacity </button>
          </div>
</form>

<script>

    $(function()
    {        
        $("#outCapFormed").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('outCapFormed', "{{url('/downstream')}}", 'edit_out_capacity');

            displayOutletCapacity();
        });
    })


    $('#year_cape').datepicker(
    {
        autoclose: true,startView: 'decade',format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
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
        $(document).on("input", ".t_pms", function()
        {
            var total_pms = 0;
            $('.t_pms').each(function()            
            {
                total_pms += parseInt($(this).val());
            });

            $("#total_pms").val(total_pms);                      
       
        });
        //compute TOTAL for AGO Retail Outlet      
        $(document).on("input", ".t_ago", function()
        {
            var total_ago = 0;
            $('.t_ago').each(function()            
            {
                total_ago += parseInt($(this).val());
            });

            $("#total_ago").val(total_ago);                      
       
        });
        //compute TOTAL for DPK Retail Outlet      
        $(document).on("input", ".t_dpk", function()
        {
            var total_dpk = 0;
            $('.t_dpk').each(function()            
            {
                total_dpk += parseInt($(this).val());
            });

            $("#total_dpk").val(total_dpk);                      
       
        });

</script> 