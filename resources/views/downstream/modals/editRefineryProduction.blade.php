 <form id="refProdForm" action="{{url('/downstream')}}" method="POST">
          @php 
            $one_m_seg = \App\down_market_segment::where('id', $REF_PROD->market_segment_id)->first();   
            $all_m_seg = \App\down_market_segment::get();
            $one_pro = \App\down_import_product::where('id', $REF_PROD->product_id)->first();   
            $all_pro = \App\down_import_product::get();   
            $one_com = \App\company::where('id', $REF_PROD->company_id)->first();   
            $all_com = \App\company::get(); 
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_PROD->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_refinery_production">  


           <div class="form-group row">
                <label for="market_segment_id_" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_id_" required>
                        @if($one_m_seg) <option value="{{$one_m_seg->id}}"> {{$one_m_seg->market_segment_name}} </option> @endif
                        @if(count($all_m_seg)>0)
                            @foreach($all_m_seg as $all_m_seg)
                                <option value="{{$all_m_seg->id}}">{{$all_m_seg->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="product_id_rpro_" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id_rpro_" required>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @endif
                        @if(count($all_pro)>0)
                            @foreach($all_pro as $all_pro)
                                <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="company_id_rpro_" class="col-sm-1 col-form-label"> Company </label>
                <div class="col-sm-5">
                    <select class="form-control" name="company_id" id="company_id_rpro_" required>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> Select Company </option> @endif
                        @if(count($all_com)>0)
                            @foreach($all_com as $all_com)
                                <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_rpro_" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="YYYY Year Of Production" name="year" id="year_rpro_" value="{{$REF_PROD->year}}" required="" readonly>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rpro_" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="january" id="january_rpro_" value="{{$REF_PROD->january}}" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rpro_" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="febuary" id="febuary_rpro_" value="{{$REF_PROD->febuary}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro_" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="march" id="march_rpro_" value="{{$REF_PROD->march}}" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro_" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="april" id="april_rpro_" value="{{$REF_PROD->april}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro_" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="may" id="may_rpro_" value="{{$REF_PROD->may}}" onkeyup="checkValue(this)">
                </div>

                <label for="june_rpro_" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="june" id="june_rpro_" value="{{$REF_PROD->june}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro_" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="july" id="july_rpro_" value="{{$REF_PROD->july}}" onkeyup="checkValue(this)">
                </div>

                <label for="august_rpro_" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="august" id="august_rpro_" value="{{$REF_PROD->august}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro_" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="september" id="september_rpro_" value="{{$REF_PROD->september}}" onkeyup="checkValue(this)">
                </div>

                <label for="october_rpro_" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="october" id="october_rpro_" value="{{$REF_PROD->october}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro_" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="november" id="november_rpro_" value="{{$REF_PROD->november}}" onkeyup="checkValue(this)">
                </div>

                <label for="december_rpro_" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="december" id="december_rpro_" value="{{$REF_PROD->december}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rpro_" value="{{$REF_PROD->total}}" required="" readonly="">
                </div>

                <div class="col-sm-5">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total Litres" name="total_litres" id="total_litres_" value="{{$REF_PROD->total_litres}}" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Petroleum Products Importation </button>
          </div>
</form>

<script>
    $(function()
    {  
        $("#refProdForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('refProdForm', "{{url('/downstream')}}", 'edit_ref_volume');

            displayRefineryVolume();
        });   



        $('#year_rpro_').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        //compute TOTAL Refinery PRODUCT VOLs      
        $(document).on("input", "#product_id_rpro_", function()
        {
            $("#product_id_rpro_ option:selected").each(function() 
            {
               var conv = 0;    var tot_ltr = 0;
               //converting to Litres based on the product selected
               var p_id = $(this).text();     
                    if(p_id == 'PMS'){ conv = 1341; }
               else if(p_id == 'AGO'){ conv = 1164; }
               else if(p_id == 'DPK'){ conv = 1232; }
               else if(p_id == 'ATK'){ conv = 1232; }
               else if(p_id == 'BASE OIL'){ conv = 1067; }
               else if(p_id == 'BITUMEN'){ conv = 961.9992; }
               else if(p_id == 'LPFO'){ conv = 1050; }
               else if(p_id == 'LPG'){ conv = 1754.389; }

               alert(conv);

               //compute TOTAL Refinery PRODUCT VOLs
                $(document).on("input",".rpro_",function()
                { 
                    var total_rpro = 0;
                    $('.rpro_').each(function()            
                    {
                        total_rpro += parseFloat($(this).val());
                    });

                    $("#total_rpro_").val(total_rpro);
                    //console.log(total_rpro);

                tot_ltr = parseFloat(total_rpro * conv);
                $("#total_litres_").val(tot_ltr);
                //console.log(tot_ltr);

                });
            });
        });
 

    });

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

</script> 