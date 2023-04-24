
<form id="upResOilForm" action="{{url('/upstream')}}" method="POST">

          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$RESERVE_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_reserve_oil">


          <div class="form-group row">
            <label for="year_res_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year_res_oil_e" value="{{$RESERVE_->year}}" required="" readonly>
            </div>

            <label for="month_res_e" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_res_oil_e" value="{{$RESERVE_->month}}" readonly>
            </div>
          </div> 


          {{-- <br><br>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Upload </label>
            <div class="col-sm-10">

              <label class="container"> <span style="margin-left: 20px"> By Contract </span>
                  <input type="radio" name="type_id" id="conts" value="1" @if($RESERVE_->type_id == 1) checked="checked"@endif> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> By Terrain </span>
                  <input type="radio" name="type_id" id="terrs" value="2" @if($RESERVE_->type_id == 2) checked="checked"@endif>  <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> By Field </span>
                  <input type="radio" name="type_id" id="fiels" value="3" @if($RESERVE_->type_id == 3) checked="checked"@endif>  <span class="checkmark"></span>
                </label> 

            </div>
          </div> 
          <br><br>


          <div class="form-group row" id="conts_id" @if($RESERVE_->type_id == 1) @else style="display: none;" @endif>
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_con)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}"> {{$all_con->contract_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" id="terrs_id" @if($RESERVE_->type_id == 2) @else style="display: none;" @endif>
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id">
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_ter)
                        @foreach($all_ter as $all_ter)
                            <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> --}}

          <div class="form-group row" id="">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id">
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->company_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row" id="">
            <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <select class="form-control" name="contract_id" id="contract_id">
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_con)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}"> {{$all_con->contract_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="oil_reserves_e" class="col-sm-2 col-form-label"> Oil </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control rese" name="oil_reserves" id="oil_reserves_e" onkeyup="checktotal(this)" value="{{$RESERVE_->oil_reserves}}" required>
            </div>
          </div>             

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Oil Reserves </button>
          </div>
</form>


<script>

  $(function()
  {         
        $("#upResOilForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upResOilForm', "{{url('/upstream')}}", 'editresoil');

            displayReserveOil();
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

          $('#year_res_oil_e').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_res_oil_e').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });


            //Hide and show div for 
            $('#conts').click(function()
            {
               $('#conts_id').show();      $('#terrs_id').hide();    $('#fiels_id').hide();              
            });
            $('#terrs').click(function()
            {
               $('#terrs_id').show();      $('#conts_id').hide();    $('#fiels_id').hide();              
            });
            $('#fiels').click(function()
            {
               $('#fiels_id').show();      $('#terrs_id').hide();    $('#conts_id').hide();              
            });

        })

</script>
