<form id="upRigDispForm" action="{{url('/upstream')}}" method="POST">
          @php  
            $one_rig = \App\RigType::where('id', $RIG_DIS_->rig_type_id)->first();         $all_rig = \App\RigType::orderBy('rig_type_name', 'asc')->get(); 
            $one_ter = \App\terrain::where('id', $RIG_DIS_->terrain_id)->first();         $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get(); 
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$RIG_DIS_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_rig_disposition">



           <div class="form-group row">
            <label for="year_rig_e" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_rig_e" value="{{$RIG_DIS_->year}}" readonly="">
            </div>
          </div>


           <div class="form-group row">
            <label for="rig_type_id" class="col-sm-2 col-form-label"> Rig Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="rig_type_id" id="rig_type_id">
                    @if($one_rig) <option value="{{$one_rig->id}}"> {{$one_rig->rig_type_name}} </option> @else <option value=""> Select Rig Type </option> @endif
                    @if($all_rig)
                        @foreach($all_rig as $all_rig)
                            <option value="{{$all_rig->id}}"> {{$all_rig->rig_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-4">
                <select class="form-control" name="terrain_id" id="terrain_id" required>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option value=""> Select Terrain </option> @endif
                    @if($all_ter)
                        @foreach($all_ter as $all_ter)
                            <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
         

          <div class="form-group row">
            <label for="january_rd" class="col-sm-2 col-form-label"> January </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="january" id="january_rde" value="{{$RIG_DIS_->january}}" onkeyup="checktotal(this)">
            </div>

            <label for="febuary_rd" class="col-sm-2 col-form-label"> February </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="febuary" id="febuary_rde" value="{{$RIG_DIS_->febuary}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="march_rd" class="col-sm-2 col-form-label"> March </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="march" id="march_rde" value="{{$RIG_DIS_->march}}" onkeyup="checktotal(this)">
            </div>

            <label for="april_rd" class="col-sm-2 col-form-label"> April </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="april" id="april_rde" value="{{$RIG_DIS_->april}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="may_rd" class="col-sm-2 col-form-label"> May </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="may" id="may_rde" value="{{$RIG_DIS_->may}}" onkeyup="checktotal(this)">
            </div>

            <label for="june_rd" class="col-sm-2 col-form-label"> June </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="june" id="june_rde" value="{{$RIG_DIS_->june}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="july_rd" class="col-sm-2 col-form-label"> July </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="july" id="july_rde" value="{{$RIG_DIS_->july}}" onkeyup="checktotal(this)">
            </div>

            <label for="august_rd" class="col-sm-2 col-form-label"> August </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="august" id="august_rde" value="{{$RIG_DIS_->august}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="september_rd" class="col-sm-2 col-form-label"> September </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="september" id="september_rde" value="{{$RIG_DIS_->september}}" onkeyup="checktotal(this)">
            </div>

            <label for="october_rd" class="col-sm-2 col-form-label"> October </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="october" id="october_rde" value="{{$RIG_DIS_->october}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

          <div class="form-group row">
            <label for="november_rd" class="col-sm-2 col-form-label"> November </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="november" id="november_rde" value="{{$RIG_DIS_->november}}" onkeyup="checktotal(this)">
            </div>

            <label for="december_rd" class="col-sm-2 col-form-label"> December </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="" name="december" id="december_rde" value="{{$RIG_DIS_->december}}" onkeyup="checktotal(this)">
            </div>
          </div>
         

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Rig Disposition </button>
          </div>
</form>



<script>
$(function()
{     
    $("#upRigDispForm").on('submit', function(e)
    {   
        e.preventDefault();            
        editForm('upRigDispForm', "{{url('/upstream')}}", 'editrig_disp');

        displayRigDisposition();
    });


    $('#year_rig_e').datepicker(
    {
      format: "yyyy",
      viewMode: "years", 
      minViewMode: "years"
    });



//       $('.rig_mte').keyup(function()
//       {
//           var total_rig_mt = 0;
//           $('.rig_mte').each(function()            
//           {
//               total_rig_mt += parseFloat($(this).val());
//           });
//           $("#total_rig_mt").val(total_rig_mt.toFixed(2));
//       });
});
</script>