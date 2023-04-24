<form id="" action="{{url('/bala')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$OPL_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_bala_opl">

          <div class="form-group row">
            <label for="concession_held_id" class="col-sm-2 col-form-label"> Concession Held </label>
            <div class="col-sm-10">
                <select class="form-control" name="concession_held_id" id="concession_held_id"readonly required>
                    @if($one_conc) <option value="{{$one_conc->id}}"> {{$one_conc->concession_name}} @endif </option>
                    {{-- @if($all_conc)
                        @foreach($all_conc as $all_conc)
                            <option value="{{$all_conc->id}}"> {{$all_conc->concession_name}} </option>                            
                        @endforeach
                    @endif --}}
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_comp) <option value="{{$one_comp->id}}"> {{$one_comp->company_name}} @endif </option>
                    @if($all_comp)
                        @foreach($all_comp as $all_comp)
                            <option value="{{$all_comp->id}}"> {{$all_comp->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
                <label for="equity_distribution" class="col-sm-2 col-form-label"> Equity Distribution </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="equity_distribution" id="equity_distribution" value="{{$OPL_->equity_distribution}}">
                </div>
          </div>

          <div class="form-group row">
                <label for="contract_type" class="col-sm-2 col-form-label">  Contract Type </label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_type" id="contract_type" required>
                        @if($one_cont) <option value="{{$one_cont->id}}"> {{$one_cont->contract_name}} @endif </option>
                        @if($all_cont)
                            @foreach($all_cont as $all_cont)
                                <option value="{{$all_cont->id}}"> {{$all_cont->contract_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Award Date </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="year_of_award" name="year_of_award" value="{{$OPL_->year_of_award}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <label class="col-sm-2 col-form-label"> License Expires </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="license_expire_date" name="license_expire_date" value="{{$OPL_->license_expire_date}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>

          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"> Area </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" value="{{$OPL_->area}}">
                </div>
          </div>

          <div class="form-group row">
                <label for="geological_terrain_id" class="col-sm-2 col-form-label"> Geological Terrain </label>
                <div class="col-sm-10">
                    <select class="form-control" name="geological_terrain_id" id="geological_terrain_id" required>
                        @if($one_terr) <option value="{{$one_terr->id}}"> {{$one_terr->terrain_name}} @endif </option>
                        @if($all_terr)
                            @foreach($all_terr as $all_terr)
                                <option value="{{$all_terr->id}}"> {{$all_terr->terrain_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>

          <div class="form-group row">
                <label for="comment" class="col-sm-2 col-form-label"> Comment</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" rows="2" placeholder="Comment Here" name="comment" id="comment">{{$OPL_->comment}}</textarea>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update OPL</button>
          </div>
  </form>