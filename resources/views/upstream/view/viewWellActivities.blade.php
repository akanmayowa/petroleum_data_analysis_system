
<form id="" action="{{url('/upstream/add_WELL_activities')}}" method="POST">
          

           <div class="form-group row">
            <label for="year_we" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_we" value="{{$WELL->year}}" disabled>
            </div>

            <label for="month_we" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_we" value="{{$WELL->month}}" disabled>
            </div>
          </div> 


          <div class="form-group row">
                <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
                <div class="col-sm-10">
                    <select class="form-control" name="terrain_id" id="terrain_id" disabled>
                        @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option>
                        @else <option value=""></option> @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="class_id" class="col-sm-2 col-form-label"> Class </label>
                <div class="col-sm-10">
                    <select class="form-control" name="class_id" id="class_id" disabled>
                        @if($one_cla) <option value="{{$one_cla->id}}"> {{$one_cla->class_name}} </option> 
                        @else <option value=""></option> @endif
                    </select>
                </div>
            </div>


         <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="type_id" id="type_id" disabled>
                    @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->type_name}} </option> 
                    @else <option value="">  </option> @endif
                </select>
            </div>
          </div>

            <div class="form-group row">
                <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_id" id="contract_id" disabled>
                        @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> 
                        @else <option value=""></option> @endif
                    </select>
                </div>
            </div>   

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($WELL->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($WELL->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>




