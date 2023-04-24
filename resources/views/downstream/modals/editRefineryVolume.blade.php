 <form id="downRefVolForm" action="{{url('/downstream')}}" method="POST">
          @php 
            $one_ref = \App\down_plant_location::where('id', $REF_VOL->refinery_id)->first();   $all_ref = \App\down_plant_location::get();
            $one_pro = \App\down_import_product::where('id', $REF_VOL->product_id)->first();   $all_pro = \App\down_import_product::get();
            $one_str = \App\Stream::where('id', $REF_VOL->stream_id)->first();   $all_str = \App\Stream::get();     
          @endphp
          {{ csrf_field() }}
          
            <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_VOL->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_refinery_production_volume">  


           <div class="form-group row">
                <label for="refinery_id_" class="col-sm-1 col-form-label"> Refinery </label>
                <div class="col-sm-5">
                    <select class="form-control" name="refinery_id" id="refinery_id_" required>
                        @if($one_ref) <option value="{{$one_ref->id}}"> {{$one_ref->plant_location_name}} </option>
                        @else <option value=""></option>@endif
                        @if(count($all_ref)>0)
                            @foreach($all_ref as $all_ref)
                                <option value="{{$all_ref->id}}">{{$all_ref->plant_location_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="product_id_rpro_" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id_rpro_" required>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option>
                        @else <option value=""></option>@endif
                        @if(count($all_pro)>0)
                            @foreach($all_pro as $all_pro)
                                <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="stream_id" class="col-sm-1 col-form-label"> Stream </label>
                <div class="col-sm-5">
                    <select class="form-control" name="stream_id" id="stream_id">
                        @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> 
                        @else <option value=""></option>@endif
                        @if(count($all_str)>0)
                            @foreach($all_str as $all_str)
                                <option value="{{$all_str->id}}">{{$all_str->stream_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_rvol_" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="YYYY Year Of Production" name="year" id="year_rvol_" value="{{$REF_VOL->year}}" required="" readonly>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rvol_" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="january" id="january_rvol_" value="{{$REF_VOL->january}}" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rvol_" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="febuary" id="febuary_rvol_" value="{{$REF_VOL->febuary}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro_" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="march" id="march_rvol_" value="{{$REF_VOL->march}}" onkeyup="checkValue(this)">
                </div>

                <label for="april_rvol_" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="april" id="april_rvol_" value="{{$REF_VOL->april}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rvol_" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="may" id="may_rvol_" value="{{$REF_VOL->may}}" onkeyup="checkValue(this)">
                </div>

                <label for="june_rvol_" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="june" id="june_rvol_" value="{{$REF_VOL->june}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rvol_" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="july" id="july_rvol_" value="{{$REF_VOL->july}}" onkeyup="checkValue(this)">
                </div>

                <label for="august_rvol_" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="august" id="august_rvol_" value="{{$REF_VOL->august}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rvol_" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="september" id="september_rvol_" value="{{$REF_VOL->september}}" onkeyup="checkValue(this)">
                </div>

                <label for="october_rvol_" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="october" id="october_rvol_" value="{{$REF_VOL->october}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rvol_" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="november" id="november_rvol_" value="{{$REF_VOL->november}}" onkeyup="checkValue(this)">
                </div>

                <label for="december_rvol_" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="december" id="december_rvol_" value="{{$REF_VOL->december}}" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rvol_" value="{{$REF_VOL->total}}" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Refinery Volume </button>
          </div>
</form>

<script>
    $(function()
    {
        $("#downRefVolForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('downRefVolForm', "{{url('/downstream')}}", 'edit_ref_volume');

            displayRefineryVolume();
        });    



        $('#year_rvol_').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        //compute TOTAL Refinery Volume      
        $(document).on("input", ".rvol_", function()
        {           
            var total_rvol = 0;
            $('.rvol_').each(function()            
            {
                total_rvol += parseFloat($(this).val());
            });

            $("#total_rvol_").val(total_rvol);
            console.log(total_rvol);                         
       
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