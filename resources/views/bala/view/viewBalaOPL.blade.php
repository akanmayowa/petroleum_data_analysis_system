
<form id="" action="{{url('/bala/add_bala_opl')}}" method="POST">

          <div class="form-group row">
            <label for="concession_held_id" class="col-sm-2 col-form-label"> Concession Held </label>
            <div class="col-sm-10">
                <select class="form-control" name="concession_held_id" id="concession_held_id"readonly disabled>
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
                    <input type="text" class="form-control" name="equity_distribution" id="equity_distribution" value="{{$OPL->equity_distribution}}" disabled>
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
            <label class="col-sm-2 col-form-label"> Award Date </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="year_of_award" name="year_of_award" value="{{$OPL->year_of_award}}" disabled>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <label class="col-sm-2 col-form-label"> License Expires </label>
            <div class="col-sm-4 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="license_expire_date" name="license_expire_date" value="{{$OPL->license_expire_date}}" disabled>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>

          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"> Area </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" value="{{$OPL->area}}" disabled>
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
                    <textarea type="text" class="form-control" rows="2" placeholder="Comment Here" name="comment" id="comment" disabled>{{$OPL->comment}}</textarea>
                </div>
          </div>
           

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($OPL->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($OPL->updated_at)->diffForHumans()}}
            </div>
          </div>
  </form>

{{-- <div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

               
                <!-- DISPLAYING OPL HISTORY -->
                <hr>
                <div class="row" style="background: #C0C0C0"> Historical Updated For @if($OPL->concession) {{$OPL->concession->concession_name}} @endif </div>
                <hr>

                @if($opl_history)
                    @foreach($opl_history as $opl_histories)
                    
                    <!-- <div style="background: #ccc; height: 25px">  </div> -->

                        <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <table class="table table-striped">                                
                                    <tbody>
                                        <tr>
                                            <td class="text-left" width="15%"><strong>Company</strong></td>
                                            <td class="text-left" width="35%">@if($opl_histories->rig_type) {{$opl_histories->rig_type->rig_type_name}} @endif</td>
                                            <td class="text-left" width="15%"><strong>Concession</strong></td>
                                            <td class="text-left" width="35%">@if($opl_histories->rig_type) {{$opl_histories->rig_type->rig_type_name}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Equity Distribution</strong></td>
                                            <td class="text-left">{{$opl_histories->equity_distribution}}</td>
                                            <td class="text-left"><strong>Contract Type </strong></td>
                                            <td class="text-left">@if($opl_histories->contract){{$opl_histories->contract->contract_name}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Terrain</strong></td>
                                            <td class="text-left">@if($opl_histories->terrain){{$opl_histories->terrain->terrain_name}}@endif</td>
                                            <td class="text-left"><strong>Area</strong></td>
                                            <td class="text-left">{{$opl_histories->area}}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-left"><strong>Award Year</strong></td>
                                            <td class="text-left">{{$opl_histories->year_of_award}}</td>
                                            <td class="text-left"><strong>License Expires</strong></td>
                                            <td class="text-left">{{$opl_histories->license_expire_date}}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-left"><strong>Comment</strong></td>
                                            <td class="text-left" colspan="3">{{$opl_histories->comment}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td class="text-muted text-left" colspan="2">
                                                Uploaded @ {{\Carbon\Carbon::parse($opl_histories->created_at)->diffForHumans()}}
                                            </td>
                                            <td class="text-muted text-right" colspan="2">
                                                Updated @ {{\Carbon\Carbon::parse($opl_histories->updated_at)->diffForHumans()}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div style="background: #ccc; height: 25px">  </div>

                @endforeach
            @endif

            </div>
        </div>
    </div> <!-- end col -->
</div>  --}}



