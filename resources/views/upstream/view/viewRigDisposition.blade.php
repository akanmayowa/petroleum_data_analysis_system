
<form id="" action="{{url('/upstream/add_rig_disposition')}}" method="POST">
          <?php  
            $one_rig = \App\RigType::where('id', $RIG_DISP->rig_type_id)->first();               $one_ter = \App\terrain::where('id', $RIG_DISP->terrain_id)->first();    
          ?>
          {{ csrf_field() }}


           <div class="form-group row">
            <label for="year_rig_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_rig_e" value="{{$RIG_DISP->year}}" disabled="">
            </div>
          </div>


           <div class="form-group row">
            <label for="rig_type_id" class="col-sm-2 col-form-label"> Rig Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="rig_type_id" id="rig_type_id" disabled>
                    @if($one_rig) <option value="{{$one_rig->id}}"> {{$one_rig->rig_type_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>

            <label for="rig_type_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-4">
                <select class="form-control" name="rig_type_id" id="rig_type_id" disabled>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option value=""> N/A </option> @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="january_rd" class="col-sm-2 col-form-label"> January </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="january" id="january_rde" value="{{$RIG_DISP->january}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="febuary_rd" class="col-sm-2 col-form-label"> February </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="febuary" id="febuary_rde" value="{{$RIG_DISP->febuary}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="march_rd" class="col-sm-2 col-form-label"> March </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="march" id="march_rde" value="{{$RIG_DISP->march}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="april_rd" class="col-sm-2 col-form-label"> April </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="april" id="april_rde" value="{{$RIG_DISP->april}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="may_rd" class="col-sm-2 col-form-label"> May </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="may" id="may_rde" value="{{$RIG_DISP->may}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="june_rd" class="col-sm-2 col-form-label"> June </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="june" id="june_rde" value="{{$RIG_DISP->june}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="july_rd" class="col-sm-2 col-form-label"> July </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="july" id="july_rde" value="{{$RIG_DISP->july}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="august_rd" class="col-sm-2 col-form-label"> August </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="august" id="august_rde" value="{{$RIG_DISP->august}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="september_rd" class="col-sm-2 col-form-label"> September </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="september" id="september_rde" value="{{$RIG_DISP->september}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="october_rd" class="col-sm-2 col-form-label"> October </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="october" id="october_rde" value="{{$RIG_DISP->october}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="november_rd" class="col-sm-2 col-form-label"> November </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="november" id="november_rde" value="{{$RIG_DISP->november}}" onkeyup="checktotal(this)" disabled>
            </div>

            <label for="december_rd" class="col-sm-2 col-form-label"> December </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="december" id="december_rde" value="{{$RIG_DISP->december}}" onkeyup="checktotal(this)" disabled>
            </div>
          </div>
         

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($RIG_DISP->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($RIG_DISP->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>




