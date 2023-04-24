 <form id="retOutForms" action="{{url('/downstream')}}" method="POST">
          
    @csrf
        <input type="hidden" class="form-control" id="id" name="id" value="{{$RET_OUT->id}}" required>
        <input type="hidden" class="form-control" name="type" id="" value="add_retail_outlet">  



       <div class="form-group row">
            <label for="state_id_oute" class="col-sm-1 col-form-label"> States </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id_oute" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> 
                    @else <option value=""></option> @endif
                    @if(count($all_sta)>0)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
        <div class="col-sm-5">
            <select class="form-control" name="market_segment_id" id="market_segment_id" required>
                @if($one_mak) <option value="{{$one_mak->id}}"> {{$one_mak->market_segment_name}} </option> 
                    @else <option value=""></option> @endif
                @if(count($all_mak)>0)
                    @foreach($all_mak as $all_mak)
                        <option value="{{$all_mak->id}}">{{$all_mak->market_segment_name}}</option>
                    @endforeach
                @endif
            </select>
        </div> 
      </div>       


        <div class="form-group row">
            <label for="year_oute" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_oute" value="{{$RET_OUT->year}}" required="" readonly>
            </div>
        </div>   


      <div class="form-group row" style="height: 8px"> <hr> </div>

      <div class="form-group row">
            <label for="january_out" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="january" id="january_oute" value="{{$RET_OUT->january}}" onkeyup="checkValue(this)">
            </div>

            <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="febuary" id="febuary_oute" value="{{$RET_OUT->febuary}}" onkeyup="checkValue(this)">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="march" id="march_oute" value="{{$RET_OUT->march}}" onkeyup="checkValue(this)">
            </div>

            <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="april" id="april_oute" value="{{$RET_OUT->april}}" onkeyup="checkValue(this)">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="may" id="may_oute" value="{{$RET_OUT->may}}" onkeyup="checkValue(this)">
            </div>

            <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="june" id="june_oute" value="{{$RET_OUT->june}}" onkeyup="checkValue(this)">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="july" id="july_oute" value="{{$RET_OUT->july}}" onkeyup="checkValue(this)">
            </div>

            <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="august" id="august_oute" value="{{$RET_OUT->august}}" onkeyup="checkValue(this)">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="september" id="september_oute" value="{{$RET_OUT->september}}" onkeyup="checkValue(this)">
            </div>

            <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="october" id="october_oute" value="{{$RET_OUT->october}}" onkeyup="checkValue(this)">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="november" id="november_oute" value="{{$RET_OUT->november}}" onkeyup="checkValue(this)">
            </div>

            <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" class="form-control oute" placeholder="" name="december" id="december_oute" value="{{$RET_OUT->december}}" onkeyup="checkValue(this)">
            </div>
        </div>            
        

        
        <div class="form-group row">
            <div class="col-sm-11">
                <input type="hidden" step="0.01" class="form-control" placeholder="Total" name="total" id="total_oute" value="{{$RET_OUT->total}}" required="" readonly="">
            </div>
        </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Retail Outlet </button>
      </div>
</form>

<script>
    $(function()
    {
        $("#retOutForms").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('retOutForms', "{{url('/downstream')}}", 'edit_ret_outlet');

            displayReTailOutlet();
        });  
    }); 

    $(function()
    { 
        $('#year_oute').datepicker(
        {
            autoclose: true, startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })


        //compute TOTAL Retail Out     
        $(document).on("input", ".oute", function()
        {           
            var total_oute = 0;
            $('.oute').each(function()            
            {
                total_oute += parseFloat($(this).val());
            });

            $("#total_oute").val(total_oute);                       
       
        });

        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
 

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