

<form id="" action="{{url('/downstream/add_prod_ave_price_range')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$AVE_PRICE->id}}" disabled="">
              

      <div class="form-group row">
            <label for="year_apr" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_ave" value="{{$AVE_PRICE->year}}" disabled="">
            </div>

            <label for="production_type" class="col-sm-1 col-form-label"> Market </label>
            <div class="col-sm-5">
                <select class="form-control" name="production_type" id="production_type" required="true" disabled="">
                    @if($one_seg) <option value="{{$one_seg->id}}"> {{$one_seg->market_segment_name}} </option> 
                    @else <option value="">  </option> @endif
                </select>
            </div>
          </div>         

          <div class="form-group row"> 
            <label for="pms_from_e" class="col-sm-1 col-form-label"> PMS </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="pms" id="pms_e" value="{{$AVE_PRICE->pms.' - '.$AVE_PRICE->pms_to}}" disabled="">
           </div>

            <label for="ago_from" class="col-sm-1 col-form-label"> AGO </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="ago" id="ago_e" value="{{$AVE_PRICE->ago.' - '.$AVE_PRICE->ago_to}}" disabled="">
            </div>

            <label for="dpk_from" class="col-sm-1 col-form-label"> DPK </label>
            <div class="col-sm-3">
                <input type="text" class="form-control"  name="dpk" id="dpk_e" value="{{$AVE_PRICE->dpk.' - '.$AVE_PRICE->dpk_to}}" disabled="">
            </div>
          </div>      

     
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($AVE_PRICE->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($AVE_PRICE->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


