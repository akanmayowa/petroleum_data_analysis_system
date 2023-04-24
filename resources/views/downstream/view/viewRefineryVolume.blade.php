
<form id="" action="{{url('/downstream/add_refinery_production_volume')}}" method="POST">
          @php 
            $one_ref = \App\down_plant_location::where('id', $REF_VOLUME->refinery_id)->first();   $all_ref = \App\down_plant_location::get();
            $one_pro = \App\down_import_product::where('id', $REF_VOLUME->product_id)->first();   $all_pro = \App\down_import_product::get();  
            $one_str = \App\Stream::where('id', $REF_VOLUME->stream_id)->first();   $all_str = \App\Stream::get();   
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_VOLUME->id}}" disabled>


           <div class="form-group row">
                <label for="refinery_id_" class="col-sm-1 col-form-label"> Refinery </label>
                <div class="col-sm-5">
                    <select class="form-control" name="refinery_id" id="refinery_id_" disabled>
                        @if($one_ref) <option value="{{$one_ref->id}}"> {{$one_ref->plant_location_name}} </option> @endif
                    </select>
                </div>

                <label for="product_id_rpro_" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id_rpro_" disabled>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="stream_id_" class="col-sm-1 col-form-label"> Stream </label>
                <div class="col-sm-5">
                    <select class="form-control" name="stream_id" id="stream_id_" disabled>
                        @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> 
                        @else <option value=""></option>@endif
                    </select>
                </div>

                <label for="year_rvol_" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="YYYY Year Of Production" name="year" id="year_rvol_" value="{{$REF_VOLUME->year}}" disabled="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rvol_" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="january" id="january_rvol_" value="{{$REF_VOLUME->january}}" disabled>
                </div>

                <label for="febuary_rvol_" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="February" id="febuary_rvol_" value="{{$REF_VOLUME->febuary}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro_" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="march" id="march_rvol_" value="{{$REF_VOLUME->march}}" disabled>
                </div>

                <label for="april_rvol_" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="april" id="april_rvol_" value="{{$REF_VOLUME->april}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rvol_" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="may" id="may_rvol_" value="{{$REF_VOLUME->may}}" disabled>
                </div>

                <label for="june_rvol_" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="june" id="june_rvol_" value="{{$REF_VOLUME->june}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rvol_" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="july" id="july_rvol_" value="{{$REF_VOLUME->july}}" disabled>
                </div>

                <label for="august_rvol_" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="august" id="august_rvol_" value="{{$REF_VOLUME->august}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rvol_" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="september" id="september_rvol_" value="{{$REF_VOLUME->september}}" disabled>
                </div>

                <label for="october_rvol_" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="october" id="october_rvol_" value="{{$REF_VOLUME->october}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rvol_" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="november" id="november_rvol_" value="{{$REF_VOLUME->november}}" disabled>
                </div>

                <label for="december_rvol_" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol_" placeholder="" name="december" id="december_rvol_" value="{{$REF_VOLUME->december}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="december_rvol_" class="col-sm-1 col-form-label"> Total </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rvol_" value="{{$REF_VOLUME->total}}" required="" disabled="">
                </div>

                <label for="december_rvol_" class="col-sm-1 col-form-label"> Litres </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rvol_" value="{{$REF_VOLUME->total_litres}}" required="" disabled="">
                </div>
            </div>


         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($REF_VOLUME->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($REF_VOLUME->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>




