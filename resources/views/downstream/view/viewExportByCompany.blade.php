
 <form id="" action="{{url('/downstream/add_crude_export_company')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$EXPORT_DEST->id}}" disabled="">

                 

          <div class="form-group row">
            <label for="year_dest" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_" value="{{$EXPORT_DEST->year}}" disabled="">
            </div>     

            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> Select Comapny </option> @endif
                </select>
            </div>
          </div> 


           <div class="form-group row">
            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <select class="form-control" name="destination" id="destination" disabled>
                    @if($one_cont) <option value="{{$one_cont->id}}"> {{$one_cont->name}} </option> @else <option value=""> Select Destination (Continent) </option> @endif
                </select>
            </div>

            <label for="country_id" class="col-sm-1 col-form-label"> Country </label>
            <div class="col-sm-5">
                <select class="form-control" name="country_id" id="country_id" disabled>
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->country_name}} </option> @else <option value=""> Select Country </option> @endif
                </select>
            </div> 
          </div>          
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="January" name="january" id="january_de" disabled value="{{$EXPORT_DEST->january}}">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="February" name="febuary" id="febuary_de" disabled value="{{$EXPORT_DEST->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="March" name="march" id="march_de" disabled value="{{$EXPORT_DEST->march}}">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="April" name="april" id="april_de" disabled value="{{$EXPORT_DEST->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="May" name="may" id="may_de" disabled value="{{$EXPORT_DEST->may}}">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="June" name="june" id="june_de" disabled value="{{$EXPORT_DEST->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="July" name="july" id="july_de" disabled value="{{$EXPORT_DEST->july}}">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="August" name="august" id="august_de" disabled value="{{$EXPORT_DEST->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="September" name="september" id="september_de" disabled value="{{$EXPORT_DEST->september}}">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="October" name="october" id="october_de" disabled value="{{$EXPORT_DEST->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="November" name="november" id="november_de" disabled value="{{$EXPORT_DEST->november}}">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="December" name="december" id="december_de" disabled value="{{$EXPORT_DEST->december}}">
            </div>
          </div>           


         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($EXPORT_DEST->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($EXPORT_DEST->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>

