

 <form id="" action="{{url('/downstream/add_retail_outlet')}}" method="POST">
          <?php 
            $one_sta = \App\down_outlet_states::where('id', $RET_OUTLET->state_id)->first();   $all_sta = \App\down_outlet_states::get();   
            $one_mak = \App\down_market_segment::where('id', $RET_OUTLET->market_segment_id)->first();   $all_mak = \App\down_market_segment::get();   
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$RET_OUTLET->id}}" disabled>



           <div class="form-group row">
                <label for="state_id_oute" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_oute" disabled>
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @endif
                    </select>
                </div>

            <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
            <div class="col-sm-5">
                <select class="form-control" name="market_segment_id" id="market_segment_id" disabled>
                    @if($one_mak) <option value="{{$one_mak->id}}"> {{$one_mak->market_segment_name}} </option> @else <option value=""> Select Market Segment </option> @endif
                </select>
            </div> 
          </div>       


            <div class="form-group row">
                <label for="year_oute" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_oute" value="{{$RET_OUTLET->year}}" disabled="">
                </div>
            </div>   
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
                <label for="january_out" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="january" id="january_oute" value="{{$RET_OUTLET->january}}" disabled>
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="February" id="febuary_oute" value="{{$RET_OUTLET->febuary}}" disabled">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="march" id="march_oute" value="{{$RET_OUTLET->march}}" disabled">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="april" id="april_oute" value="{{$RET_OUTLET->april}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="may" id="may_oute" value="{{$RET_OUTLET->may}}" disabled>
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="june" id="june_oute" value="{{$RET_OUTLET->june}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="july" id="july_oute" value="{{$RET_OUTLET->july}}" disabled>
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="august" id="august_oute" value="{{$RET_OUTLET->august}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="september" id="september_oute" value="{{$RET_OUTLET->september}}" disabled>
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="october" id="october_oute" value="{{$RET_OUTLET->october}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="november" id="november_oute" value="{{$RET_OUTLET->november}}" disabled>
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="december" id="december_oute" value="{{$RET_OUTLET->december}}" disabled>
                </div>
            </div>            
            

            
            <div class="form-group row">
                <label for="year_oute" class="col-sm-1 col-form-label"> Total </label>
                <div class="col-sm-11">
                    <input type="text" step="0.01" class="form-control" placeholder="Total" name="total" id="total_oute" value="{{$RET_OUTLET->total}}" required="" disabled="">
                </div>
            </div>

         
          <div class="form-group row"">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($RET_OUTLET->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($RET_OUTLET->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>

