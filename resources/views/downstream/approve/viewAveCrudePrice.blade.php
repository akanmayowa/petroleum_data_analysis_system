 
<form id="" action="{{url('/economics/add_ave_price_crude')}}" method="POST">
          {{ csrf_field() }}

          <?php $one_str = \App\Stream::where('id', $AVE_PRICE->stream_id)->first();         $all_str = \App\Stream::get(); ?>
            <input type="hidden" class="form-control" id="id" name="id" value="{{$AVE_PRICE->id}}" disabled>


           <div class="form-group row">
            <label for="year_ave_e" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year (yyyy)" name="year" id="year_ave_e" value="{{$AVE_PRICE->year}}" disabled>
            </div>

            <label for="stream_id_ave" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_ave" disabled>
                    @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
                <label for="january_rvol" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="january" id="january_av" disabled value="{{$AVE_PRICE->january}}">
                </div>

                <label for="febuary_rvol" class="col-sm-1 col-form-label"> Febuary </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="febuary" id="febuary_av" disabled value="{{$AVE_PRICE->febuary}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rvol" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="march" id="march_av" disabled value="{{$AVE_PRICE->march}}">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="april" id="april_av" disabled value="{{$AVE_PRICE->april}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rvol" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="may" id="may_av" disabled value="{{$AVE_PRICE->may}}">
                </div>

                <label for="june_rvol" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="june" id="june_av" disabled value="{{$AVE_PRICE->june}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rvol" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="july" id="july_av" disabled value="{{$AVE_PRICE->july}}">
                </div>

                <label for="august_rvol" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="august" id="august_av" disabled value="{{$AVE_PRICE->august}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rvol" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="september" id="september_av" disabled value="{{$AVE_PRICE->september}}">
                </div>

                <label for="october_rvol" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="october" id="october_av" disabled value="{{$AVE_PRICE->october}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rvol" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="november" id="november_av" disabled value="{{$AVE_PRICE->november}}">
                </div>

                <label for="december_rvol" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control" placeholder="" name="december" id="december_av" disabled value="{{$AVE_PRICE->december}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="stream_total" class="col-sm-1 col-form-label"> Total </label>
                <div class="col-sm-11">
                    <input type="number" step="0.01" class="form-control" placeholder="Total" name="stream_total" id="stream_total" disabled value="{{$AVE_PRICE->stream_total}}">
                </div>
            </div>


         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($AVE_PRICE->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($AVE_PRICE->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


