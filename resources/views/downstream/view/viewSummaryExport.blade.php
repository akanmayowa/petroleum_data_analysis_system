
<form id="" action="{{url('/downstream/add_monthly_summary_crude_export')}}" method="POST">
          <?php $C_E_tot = \App\down_monthly_summary_crude_export::count();  ++$C_E_tot; ?>
          <?php  $one_stre = \App\Stream::where('id', $CRUD_EXPORT->stream_id)->first();         $all_stre = \App\Stream::get();  ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$CRUD_EXPORT->id}}" disabled>
            <input type="hidden" name="tot_" id="tot_" value="{{$C_E_tot}}">


           <div class="form-group row">
            <label for="stream_id_tsp" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_tsp" readonly disabled>
                    @if($one_stre) <option value="{{$one_stre->id}}"> {{$one_stre->stream_name}} </option> @endif
                </select>
            </div>

            <label for="year_expe" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_expe" value="{{$CRUD_EXPORT->year}}" disabled="">
            </div>
          </div>  


          <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label"> Type </label>
            <div class="col-sm-5" style="margin-top: 5px">                
                <label class="radio-inline" style="margin-left: 0px">
                  <input type="radio" name="production_type_id" value="1" @if($CRUD_EXPORT->production_type_id == 1) checked @endif disabled=""> Oil
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="2" @if($CRUD_EXPORT->production_type_id == 2) checked @endif disabled> Condensate
                </label>
            </div>
          </div>        

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="January" name="january" id="january_sum" disabled value="{{$CRUD_EXPORT->january}}">
            </div>

            <label for="febuary" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="February" name="febuary" id="febuary_sum" disabled value="{{$CRUD_EXPORT->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="March" name="march" id="march_sum" disabled value="{{$CRUD_EXPORT->march}}">
            </div>

            <label for="april" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="April" name="april" id="april_sum" disabled value="{{$CRUD_EXPORT->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="May" name="may" id="may_sum" disabled value="{{$CRUD_EXPORT->may}}">
            </div>

            <label for="june" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="June" name="june" id="june_sum" disabled value="{{$CRUD_EXPORT->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="July" name="july"" id="july_sum" disabled value="{{$CRUD_EXPORT->july}}">
            </div>

            <label for="august" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="August" name="august" id="august_sum" disabled value="{{$CRUD_EXPORT->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="September" name="september" id="september_sum" disabled value="{{$CRUD_EXPORT->september}}">
            </div>

            <label for="october" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="October" name="october" id="october_sum" disabled value="{{$CRUD_EXPORT->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="November" name="november" id="november_sum" disabled value="{{$CRUD_EXPORT->november}}">
            </div>

            <label for="december" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="December" name="december" id="december_sum" disabled value="{{$CRUD_EXPORT->december}}">
            </div>
          </div>    


        <div class="form-group row" style="height: 5px"> <hr> </div>



          <div class="form-group row">
            <label for="api" class="col-sm-1 col-form-label"> API </label>
            <div class="col-sm-5">
                <input type="number" class="form-control" placeholder="American Production Index" name="api" id="api" value="{{$CRUD_EXPORT->api}}" disabled>
            </div>

            <label for="api" class="col-sm-1 col-form-label"> Total </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Stream Total" name="stream_total" id="stream_total_sum"" value="{{$CRUD_EXPORT->stream_total}}" disabled="">
            </div>
          </div>

         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($CRUD_EXPORT->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($CRUD_EXPORT->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



