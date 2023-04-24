
<form id="" action="{{url('/upstream')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$WELL->id}}" required>


        <div class="form-group row">
            <label for="year_dgase" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_dgase" value="{{$WELL->year}}" disabled>
            </div>

            <label for="month_dgase" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_dgase" value="{{$WELL->year}}" disabled>
            </div>
        </div>
          


          <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id" required disabled>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> 
                    @else <option value=""> Select Field </option> @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="concession_id" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_id" id="concession_id" required disabled>
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->concession_name}} </option> 
                    @else <option value=""> Select Concession </option> @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id" required disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value=""> Select Company </option> @endif
                </select>
            </div>
          </div>
       

        <div class="form-group row" style="height: 8px"> <hr> </div>

        <div class="form-group row">
            <label for="well" class="col-sm-2 col-form-label"> Well </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well Name" name="well" id="well" value="{{$WELL->well}}" disabled>
            </div>
        </div> 


          <div class="form-group row">
              <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
              <div class="col-sm-10">
                  <select class="form-control" name="terrain_id" id="terrain_id" required disabled>
                      @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> 
                      @else <option value=""> N/A </option> @endif
                  </select>
              </div>
          </div>


        <div class="form-group row">
            <label for="reserves" class="col-sm-2 col-form-label"> Reserves(BSCF) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="reserves" id="reserves" required="" value="{{$WELL->reserves}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="off_take_rate" class="col-sm-2 col-form-label"> Off-Take Rate(MMSCFD)</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="off_take_rate" id="off_take_rate" required="" value="{{$WELL->off_take}}" disabled>
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

      



