
<form id="" action="{{url('/upstream/add_reserve')}}" method="POST">

          {{ csrf_field() }}


           <div class="form-group row">
            <label for="year_res_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year_res_e" value="{{$RESERVE->year}}" disabled="">
            </div>

            <label for="month_res_e" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_res_e" value="{{$RESERVE->month}}">
            </div>
          </div> 

          <div class="form-group row">
            <label for="field_id_res" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_res" disabled>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="condensate_reserves_e" class="col-sm-2 col-form-label"> Condensate </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control rese" name="condensate_reserves" id="condensate_reserves_e" onkeyup="checktotal(this)" value="{{$RESERVE->condensate_reserves}}" disabled>
            </div>
          </div>             

                            
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($RESERVE->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($RESERVE->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



