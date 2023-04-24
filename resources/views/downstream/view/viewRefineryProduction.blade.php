
<form id="" action="{{url('/downstream/add_refinery_production')}}" method="POST">
          @php 
            $one_m_seg = \App\down_market_segment::where('id', $REFINERY_PROD->market_segment_id)->first(); 
            $one_pro = \App\down_import_product::where('id', $REFINERY_PROD->product_id)->first();    
            $one_com = \App\company::where('id', $REFINERY_PROD->company_id)->first(); 
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$REFINERY_PROD->id}}" required>

           <div class="form-group row">
            <label class="col-sm-12 col-form-label" style="color: #396">  Volumes In Metrin Tonnes </label>
            </div>

           <div class="form-group row">
                <label for="market_segment_id_" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_id_" disabled>
                        @if($one_m_seg) <option value="{{$one_m_seg->id}}"> {{$one_m_seg->market_segment_name}} </option> @endif
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
                <label for="company_id_rpro_" class="col-sm-1 col-form-label"> Company </label>
                <div class="col-sm-5">
                    <select class="form-control" name="company_id" id="company_id_rpro_" disabled>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> N/A </option> @endif
                    </select>
                </div>

                <label for="year_rpro_" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="YYYY Year Of Production" name="year" id="year_rpro_" value="{{$REFINERY_PROD->year}}" disabled="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rpro_" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="january" id="january_rpro_" value="{{$REFINERY_PROD->january}}" disabled>
                </div>

                <label for="febuary_rpro_" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="February" id="febuary_rpro_" value="{{$REFINERY_PROD->febuary}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro_" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="march" id="march_rpro_" value="{{$REFINERY_PROD->march}}" disabled>
                </div>

                <label for="april_rpro_" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="april" id="april_rpro_" value="{{$REFINERY_PROD->april}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro_" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="may" id="may_rpro_" value="{{$REFINERY_PROD->may}}" disabled>
                </div>

                <label for="june_rpro_" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="june" id="june_rpro_" value="{{$REFINERY_PROD->june}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro_" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="july" id="july_rpro_" value="{{$REFINERY_PROD->july}}" disabled>
                </div>

                <label for="august_rpro_" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="august" id="august_rpro_" value="{{$REFINERY_PROD->august}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro_" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="september" id="september_rpro_" value="{{$REFINERY_PROD->september}}" disabled>
                </div>

                <label for="october_rpro_" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="october" id="october_rpro_" value="{{$REFINERY_PROD->october}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro_" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="november" id="november_rpro_" value="{{$REFINERY_PROD->november}}" disabled>
                </div>

                <label for="december_rpro_" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro_" placeholder="" name="december" id="december_rpro_" value="{{$REFINERY_PROD->december}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="december_rpro_" class="col-sm-1 col-form-label"> Total Tonnes </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rpro_" value="{{$REFINERY_PROD->total}}" required="" disabled="">
                </div>

                <label for="december_rpro_" class="col-sm-1 col-form-label"> Total Ltrs </label>
                <div class="col-sm-5">
                    <input type="text" step="0.01" class="form-control" placeholder="Yearly Total Litres" name="total_litres" id="total_litres_" value="{{$REFINERY_PROD->total_litres}}" required="" disabled="">
                </div>
            </div>


         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($REFINERY_PROD->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($REFINERY_PROD->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


