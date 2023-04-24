<form id="" action="{{url('/bala/add_bala_oml')}}" method="POST">

          <div class="form-group row">
            <label for="year_m" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year YYYY" name="year" id="year_m" value="{{$OML->year}}" required readonly>
            </div>
       
            <label for="concession_held_id" class="col-sm-2 col-form-label"> Concession Held </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_held_id" id="concession_held_id" readonly disabled>
                    @if($one_conc) <option value="{{$one_conc->id}}"> {{$one_conc->concession_name}} @endif </option>
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" disabled>
                    @if($one_comp) <option value="{{$one_comp->id}}"> {{$one_comp->company_name}} @endif </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
                <label for="equity_distribution" class="col-sm-2 col-form-label"> Equity Distribution </label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" name="equity_distribution" id="equity_distribution" disabled>{{$OML->equity_distribution}}</textarea>
                </div>
          </div>

          <div class="form-group row">
                <label for="contract_type" class="col-sm-2 col-form-label">  Contract Type </label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_type" id="contract_type" disabled>
                        @if($one_cont) <option value="{{$one_cont->id}}"> {{$one_cont->contract_name}} @endif </option>
                    </select>
                </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Date Of Grant </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="date_of_grant" name="date_of_grant" value="{{$OML->date_of_grant}}" disabled>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <label class="col-sm-2 col-form-label"> Expires On </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="license_expire_date_oml" name="license_expire_date" value="{{$OML->license_expire_date}}" disabled>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>

          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"> Area </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" value="{{$OML->area}}" disabled>
                </div>
          </div>

          <div class="form-group row">
                <label for="geological_terrain_id" class="col-sm-2 col-form-label"> Geological Terrain </label>
                <div class="col-sm-10">
                    <select class="form-control" name="geological_terrain_id" id="geological_terrain_id" disabled>
                        @if($one_terr) <option value="{{$one_terr->id}}"> {{$one_terr->terrain_name}} @endif </option>
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="comment" class="col-sm-2 col-form-label"> Comment</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" rows="2" placeholder="Comment Here" name="comment" id="comment" disabled>{{$OML->comment}}</textarea>
                </div>
          </div>

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($OML->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($OML->updated_at)->diffForHumans()}}
            </div>
          </div>

</form>