 <form id="" action="{{url('/downstream/add_retail_outlet_capacity')}}" method="POST">
          <?php 
            $one_sta = \App\down_outlet_states::where('id', $OUT_CAPACITY->state_id)->first();  
            $one_seg = \App\down_market_segment::where('id', $OUT_CAPACITY->market_segment_id)->first();   
            $one_pro = \App\down_import_product::where('id', $OUT_CAPACITY->product_id)->first();   
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$OUT_CAPACITY->id}}" disabled>


           <div class="form-group row">
                <label for="state_id_cape" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_cape" disabled>
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @else <option value=""> N/A </option> @endif
                    </select>
                </div>

                <label for="market_segment_id_cape" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_id_cape" disabled>
                        @if($one_seg) <option value="{{$one_seg->id}}"> {{$one_seg->market_segment_name}} </option> @else <option value=""> N/A </option> @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="product_id" class="col-sm-1 col-form-label"> Product </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id" disabled>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @else <option value=""> N/A </option> @endif
                    </select>
                </div>

                <label for="year_cape" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_cape" value="{{$OUT_CAPACITY->year}}" disabled="">
                </div>
            </div>   
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
                <label for="january_out" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="january" id="january_oute" value="{{$OUT_CAPACITY->january}}" disabled>
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="febuary" id="febuary_oute" value="{{$OUT_CAPACITY->febuary}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="march" id="march_oute" value="{{$OUT_CAPACITY->march}}" disabled>
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="april" id="april_oute" value="{{$OUT_CAPACITY->april}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="may" id="may_oute" value="{{$OUT_CAPACITY->may}}" disabled>
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="june" id="june_oute" value="{{$OUT_CAPACITY->june}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="july" id="july_oute" value="{{$OUT_CAPACITY->july}}" disabled>
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="august" id="august_oute" value="{{$OUT_CAPACITY->august}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="september" id="september_oute" value="{{$OUT_CAPACITY->september}}" disabled>
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="october" id="october_oute" value="{{$OUT_CAPACITY->october}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="november" id="november_oute" value="{{$OUT_CAPACITY->november}}" disabled>
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control oute" placeholder="" name="december" id="december_oute" value="{{$OUT_CAPACITY->december}}" disabled>
                </div>
            </div>            
            

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> Total </label>
                <div class="col-sm-11">
                    <input type="text" step="0.01" class="form-control" placeholder="Total" name="total" id="total_oute" value="{{$OUT_CAPACITY->total}}" required="" readonly="">
                </div>
            </div>
            

         
          <div class="form-group row"">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($OUT_CAPACITY->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($OUT_CAPACITY->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>
