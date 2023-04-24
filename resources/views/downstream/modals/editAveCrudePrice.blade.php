<form id="crudePriceForm" action="{{url('/economics')}}" method="POST">
          {{ csrf_field() }}

          @php $one_str = \App\Stream::where('id', $AVE_PRI_->stream_id)->first();         $all_str = \App\Stream::get(); @endphp
            <input type="hidden" class="form-control" id="id" name="id" value="{{$AVE_PRI_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_ave_price_crude">  


           <div class="form-group row">
            <label for="year_ave_e" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year (yyyy)" name="year" id="year_ave_e" value="{{$AVE_PRI_->year}}" required readonly>
            </div>

            <label for="stream_id_ave" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_ave" required>
                    @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> 
                    @else <option value=""></option>@endif
                    @if($all_str)
                        @foreach($all_str as $all_str)
                            <option value="{{$all_str->id}}"> {{$all_str->stream_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
                <label for="january_rvol" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="january" id="january_av" bonkeyup="checkValue(this)" value="{{$AVE_PRI_->january}}">
                </div>

                <label for="febuary_rvol" class="col-sm-1 col-form-label"> Febuary </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="febuary" id="febuary_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->febuary}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rvol" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="march" id="march_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->march}}">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="april" id="april_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->april}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rvol" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="may" id="may_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->may}}">
                </div>

                <label for="june_rvol" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="june" id="june_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->june}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rvol" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="july" id="july_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->july}}">
                </div>

                <label for="august_rvol" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="august" id="august_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->august}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rvol" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="september" id="september_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->september}}">
                </div>

                <label for="october_rvol" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="october" id="october_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->october}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rvol" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="november" id="november_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->november}}">
                </div>

                <label for="december_rvol" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="december" id="december_av" onkeyup="checkValue(this)" value="{{$AVE_PRI_->december}}">
                </div>
            </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Ave Price </button>
          </div>
</form>




<script>

    $(function()
    {
        $("#crudePriceForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('crudePriceForm', "{{url('/downstream')}}", 'editave_price');

            displayAveragePrice();
        });
    });

    //UPDATE WELL TOTAL
    function checktotal(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }         
    }

    $(function()
    {
        $('.w_cont').keyup(function()
        {
            var total = 0;
            $('.w_cont').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_wct_e").val(total);
            console.log(total);
        });
    });


    $(function()
    {        

      $('#year_ave_e').datepicker(
    {
      format: "yyyy",
      viewMode: "years", 
      minViewMode: "years"
    });

    })

</script>