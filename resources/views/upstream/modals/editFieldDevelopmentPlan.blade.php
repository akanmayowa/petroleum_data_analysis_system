<form id="upFDPForm" action="{{url('/upstream')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$FDP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_field_development_plan">



           <div class="form-group row">
            <label for="year_fdps" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_fdps" value="{{$FDP->year}}" readonly="">
            </div>               
        </div>
          


          <div class="form-group row">
            <label for="field_id" class="col-sm-3 col-form-label"> Field </label>
            <div class="col-sm-9">
                <select class="form-control" name="field_id" id="field_id" required>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> 
                    @else <option value=""> Select Field </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value=""> Select Company </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
       

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="production_rate" class="col-sm-3 col-form-label"> Anticipated Production Rate </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="production_rate" id="production_rate" required="" value="{{$FDP->production_rate}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="expected_reserves" class="col-sm-3 col-form-label"> Expected Reserves </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="expected_reserves" id="expected_reserves" required="" value="{{$FDP->expected_reserves}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="commencement_date" class="col-sm-3 col-form-label"> Expected Production Rate </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="commencement_date" id="commencement_date" required="" value="{{$FDP->commencement_date}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="no_of_well" class="col-sm-3 col-form-label"> No of Wells </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="no_of_well" id="no_of_well" value="{{$FDP->no_of_well}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-3 col-form-label"> Remark/Status </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="remark" id="remark" required="" value="{{$FDP->remark}}">
            </div>
        </div>
            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update FDP </button>
          </div>
</form>



<script>
$(function()
{
    $("#upFDPForm").on('submit', function(e)
    {   
        e.preventDefault();            
        editForm('upFDPForm', "{{url('/upstream')}}", 'edit_fdp');

        displayFieldDevelopmentPlan();
    });


    $('#year_fdps').datepicker(
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
// });
</script>