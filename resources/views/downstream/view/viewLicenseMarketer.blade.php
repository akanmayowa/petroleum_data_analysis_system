

 <form id="" action="{{url('/downstream/add_license_marketer_storage')}}" method="POST">
          <?php  
            $one_cat = \App\down_market_segment::where('id', $L_MARKETERS->market_category_id)->first();        $all_cat = \App\down_market_segment::get();
            $one_com = \App\company::where('id', $L_MARKETERS->company_id)->first();                      $all_com = \App\company::get(); 
            $one_loc = \App\down_storage_location::where('id', $L_MARKETERS->product_id)->first();      $all_loc = \App\down_storage_location::get();   
          ?>
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$L_MARKETERS->id}}" disabled>


           

            <div class="form-group row">
                <label for="year_oils" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - yyyy" name="year" id="year_oils" value="{{$L_MARKETERS->year}}" disabled="">
                </div>
            </div>

           <div class="form-group row">
                <label for="market_category_id" class="col-sm-2 col-form-label"> Market Segment </label>
                <div class="col-sm-10">
                    <select class="form-control" name="market_category_id" id="market_category_id" disabled>
                        @if($one_cat) <option value="{{$one_cat->id}}"> {{$one_cat->market_segment_name}} </option> @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="company_id_mak" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id_mak" disabled>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="location_id" class="col-sm-2 col-form-label"> Location</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Location" name="location_id" id="location_id" value="{{$L_MARKETERS->location_id}}" disabled="">
                </div>
            </div>

            <div class="form-group row">
                <label for="value" class="col-sm-2 col-form-label"> Storage Capacity </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="storage_capacity" id="storage_capacity" value="{{$L_MARKETERS->storage_capacity}}" onkeyup="checkValue(this)" disabled="">
                </div>
            </div>

            

         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($L_MARKETERS->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($L_MARKETERS->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


