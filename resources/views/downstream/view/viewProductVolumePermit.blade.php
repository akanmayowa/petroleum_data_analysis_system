
 <form id="" action="{{url('/downstream/add_product_volume_permit')}}" method="POST">
          <?php 
            $one_mak = \App\down_market_segment::where('id', $PRO_VOL_PERM->market_segment_id)->first();   $all_mak = \App\down_market_segment::get(); 
            $one_pro = \App\down_import_product::where('id', $PRO_VOL_PERM->product_id)->first();   $one_all = \App\down_import_product::get();  
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$PRO_VOL_PERM->id}}" disabled>
       


            <div class="form-group row">                
                <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-11">
                    <select class="form-control" name="market_segment_id" id="market_segment_id" disabled>
                        @if($one_mak) <option value="{{$one_mak->id}}"> {{$one_mak->market_segment_name}} </option> @else <option value=""> Select Market Segment </option> @endif
                    </select>
                </div>
            </div>


           <div class="form-group row">
                <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id" disabled>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @endif
                    </select>
                </div>

                <label for="year_pvpe" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Year Of Import" name="year" id="year_pvpe" value="{{$PRO_VOL_PERM->year}}" disabled="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_pvpe" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="january" id="january_pvpe" min="0" value="{{$PRO_VOL_PERM->january}}" disabled>
                </div>

                <label for="febuary_pvpe" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="February" id="febuary_pvpe" min="0" value="{{$PRO_VOL_PERM->febuary}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_pvpe" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="march" id="march_pvpe" min="0" value="{{$PRO_VOL_PERM->march}}" disabled>
                </div>

                <label for="april_pvpe" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="april" id="april_pvpe" min="0" value="{{$PRO_VOL_PERM->april}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_pvpe" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="may" id="may_pvpe" min="0" value="{{$PRO_VOL_PERM->may}}" disabled>
                </div>

                <label for="june_pvpe" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="june" id="june_pvpe" min="0" value="{{$PRO_VOL_PERM->june}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_pvpe" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="july" id="july_pvpe" min="0" value="{{$PRO_VOL_PERM->july}}" disabled>
                </div>

                <label for="august_pvpe" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="august" id="august_pvpe" min="0" value="{{$PRO_VOL_PERM->august}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_pvpe" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="september" id="september_pvpe" min="0" value="{{$PRO_VOL_PERM->september}}" disabled>
                </div>

                <label for="october_pvpe" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="october" id="october_pvpe" min="0" value="{{$PRO_VOL_PERM->october}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_pvpe" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="november" id="november_pvpe" min="0" value="{{$PRO_VOL_PERM->november}}" disabled>
                </div>

                <label for="december_pvpe" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvpe" name="december" id="december_pvpe" min="0" value="{{$PRO_VOL_PERM->december}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="december_pvpe" class="col-sm-1 col-form-label"> Total </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_pvpe" value="{{$PRO_VOL_PERM->total}}" required="" disabled="">
                </div>

                <label for="december_pvpe" class="col-sm-1 col-form-label"> Litres </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_pvpe" value="{{$PRO_VOL_PERM->total_litres}}" required="" disabled="">
                </div>
            </div>


         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($PRO_VOL_PERM->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($PRO_VOL_PERM->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


