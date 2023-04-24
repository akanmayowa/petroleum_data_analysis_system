

<form id="" action="{{url('/downstream/add_terminal_stream_prod')}}" method="POST">
          <?php $str_p_tot = \App\down_terminal_stream_prod::count();  ++$str_p_tot; ?>
          <?php   $one_stre = \App\Stream::where('id', $STREAM->stream_id)->first();       
            $one_com = \App\company::where('id', $STREAM->company_id)->first();      
            $one_cot = \App\contract::where('id', $STREAM->contract_id)->first();       
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$STREAM->id}}" required>
            <input type="hidden" name="tot_" id="tot_" value="{{$str_p_tot}}">


           <div class="form-group row">
            <label for="stream_id_tsp" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_tsp" disabled="" required>
                    @if($one_stre) <option value="{{$one_stre->id}}"> {{$one_stre->stream_name}} </option> @endif
                </select>
            </div>

            <label for="sulphur_content" class="col-sm-1 col-form-label"> Sulphur </label>
            <div class="col-sm-5">
                <select class="form-control" name="sulphur_content" id="sulphur_content" disabled="">
                    @if($STREAM) <option value="{{$STREAM->sulphur_content}}"> {{$STREAM->sulphur_content}} </option> @endif
                </select>
            </div>
          </div>  
          

          <div class="form-group row">
            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="contract_id" class="col-sm-1 col-form-label"> Contract </label>
            <div class="col-sm-5">
                <select class="form-control" name="contract_id" id="contract_id" disabled>
                    @if($one_cot) <option value="{{$one_cot->id}}"> {{$one_cot->contract_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
          </div> 


          <div class="form-group row">
            <label for="year_tsp" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_tspe" value="{{$STREAM->year}}" disabled="">
            </div>

            <label for="year_tsp" class="col-sm-1 col-form-label"> Type </label>
            <div class="col-sm-5" style="margin-top: 5px">                
                <label class="radio-inline" style="margin-left: 0px">
                  <input type="radio" name="production_type_id" value="1" @if($STREAM->production_type_id == 1) checked @endif disabled=""> Oil
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="2" @if($STREAM->production_type_id == 2) checked @endif disabled> Condensate
                </label>
            </div>
          </div>       
 
          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="January" name="january" id="january_edit" value="{{$STREAM->january}}" disabled="">
            </div>

            <label for="febuary" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="February" name="febuary" id="febuary_edit" disabled="" value="{{$STREAM->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="March" name="march" id="march_edit" disabled="" value="{{$STREAM->march}}">
            </div>

            <label for="april" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="April" name="april" id="april_edit" disabled="" value="{{$STREAM->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="May" name="may" id="may_edit" disabled="" value="{{$STREAM->may}}">
            </div>

            <label for="june" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="June" name="june" id="june_edit" disabled="" value="{{$STREAM->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="July" name="july"" id="july_edit" disabled="" value="{{$STREAM->july}}">
            </div>

            <label for="august" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="August" name="august" id="august_edit" disabled="" value="{{$STREAM->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="September" name="september" id="september_edit" disabled="" value="{{$STREAM->september}}">
            </div>

            <label for="october" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="October" name="october" id="october_edit" disabled="" value="{{$STREAM->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="November" name="november" id="november_edit" disabled="" value="{{$STREAM->november}}">
            </div>

            <label for="december" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="December" name="december" id="december_edit" disabled="" value="{{$STREAM->december}}">
            </div>
          </div>    


        <div class="form-group row" style="height: 5px"> <hr> </div>



          <div class="form-group row">
            <label for="api" class="col-sm-1 col-form-label"> API </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="American Production Index" name="api" id="api" value="{{$STREAM->api}}" disabled="">
            </div>

            <label for="api" class="col-sm-1 col-form-label"> Total </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Stream Total" name="stream_total" id="stream_total_edit" value="{{$STREAM->stream_total}}" disabled="">
            </div>
          </div>

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($STREAM->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($STREAM->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>




