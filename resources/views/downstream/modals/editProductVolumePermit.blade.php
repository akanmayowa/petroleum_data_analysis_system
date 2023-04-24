 <form id="prodVolPermitForm" action="{{url('/downstream')}}" method="POST">
          @php 
            $one_mak = \App\down_market_segment::where('id', $PRO_VOL_PERM->market_segment_id)->first();   
            $all_mak = \App\down_market_segment::get(); 
            $one_pro = \App\down_import_product::where('id', $PRO_VOL_PERM->product_id)->first();   
            $one_all = \App\down_import_product::get();  
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$PRO_VOL_PERM->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit">  

       


            <div class="form-group row">                
                <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-11">
                    <select class="form-control" name="market_segment_id" id="market_segment_id" required>
                        @if($one_mak) <option value="{{$one_mak->id}}"> {{$one_mak->market_segment_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if(count($all_mak)>0)
                            @foreach($all_mak as $all_mak)
                                <option value="{{$all_mak->id}}">{{$all_mak->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


           <div class="form-group row">
                <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id" required>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option>
                        @else <option value="">  </option> @endif
                        @if(count($one_all)>0)
                            @foreach($one_all as $one_all)
                                <option value="{{$one_all->id}}">{{$one_all->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_pvpe" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Year Of Import" name="year" id="year_pvpe" value="{{$PRO_VOL_PERM->year}}" required="" readonly>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_pvpe" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="january" id="january_pvpe" min="0" value="{{$PRO_VOL_PERM->january}}" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_pvpe" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="febuary" id="febuary_pvpe" min="0" value="{{$PRO_VOL_PERM->febuary}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_pvpe" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="march" id="march_pvpe" min="0" value="{{$PRO_VOL_PERM->march}}" onkeyup="checkValue(this)">
                </div>

                <label for="april_pvpe" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="april" id="april_pvpe" min="0" value="{{$PRO_VOL_PERM->april}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_pvpe" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="may" id="may_pvpe" min="0" value="{{$PRO_VOL_PERM->may}}" onkeyup="checkValue(this)">
                </div>

                <label for="june_pvpe" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="june" id="june_pvpe" min="0" value="{{$PRO_VOL_PERM->june}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_pvpe" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="july" id="july_pvpe" min="0" value="{{$PRO_VOL_PERM->july}}" onkeyup="checkValue(this)">
                </div>

                <label for="august_pvpe" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="august" id="august_pvpe" min="0" value="{{$PRO_VOL_PERM->august}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_pvpe" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="september" id="september_pvpe" min="0" value="{{$PRO_VOL_PERM->september}}" onkeyup="checkValue(this)">
                </div>

                <label for="october_pvpe" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="october" id="october_pvpe" min="0" value="{{$PRO_VOL_PERM->october}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_pvpe" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="november" id="november_pvpe" min="0" value="{{$PRO_VOL_PERM->november}}" onkeyup="checkValue(this)">
                </div>

                <label for="december_pvpe" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="december" id="december_pvpe" min="0" value="{{$PRO_VOL_PERM->december}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_pvpe" value="{{$PRO_VOL_PERM->total}}" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="update_pvpe_btn" id="update_pvpe_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Product Vol Permit </button>
          </div>
</form>

<script>
    $(function()
    {
        $("#prodVolPermitForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('prodVolPermitForm', "{{url('/downstream')}}", 'edit_prod_vol_permit');

            displayProductVolPermit();
        }); 


         //compute TOTAL PRODUCT VOLs
        $(document).on("input",".pvpe",function()
        {
           var total_pvp = 0;
            $('.pvpe').each(function()            
            {
                total_pvp += parseFloat($(this).val());
            });
            $("#total_pvpe").val(total_pvp.toFixed(2));
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

