<form id="upGasDevelopmentPlanForm" action="{{url('/upstream')}}" method="POST">          
  @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{$FDP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_approved_gas_development_plan">



        <div class="form-group row">
            <label for="year_gfdps" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_gfdps" value="{{$FDP->year}}" readonly>
            </div>               
        </div>
          


          <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-4">
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

            <label for="type_id_gfdpe" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="type_id" id="type_id_gfdpe" required>
                    @if($FDP) <option value="{{$FDP->type_id}}">
                      @if($FDP->type_id == 1) Associated Gas (AG)
                      @elseif($FDP->type_id == 2) Non Associated Gas (NAG) </option>  
                      @endif
                    @endif
                    <option value=""> Select Type</option>
                    <option value="1"> Associated Gas (AG) </option>
                    <option value="2"> Non-Associated Gas (NAG) </option>
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="concession_id" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_id" id="concession_id">
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->concession_name}} </option> 
                    @else <option value=""> Select Concession </option> @endif
                    @if($all_con)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}"> {{$all_con->concession_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id">
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


        <div class="" id="nag"> 

          <div class="form-group row">
              <label for="gas_reserve" class="col-sm-2 col-form-label"> Gas Reserves(BSCF) </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="gas_reserve" id="gas_reserve" value="{{$FDP->gas_reserve}}">
              </div>
          </div>

          <div class="form-group row">
              <label for="condensate" class="col-sm-2 col-form-label"> Condensate(MMSTB) </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="condensate" id="condensate" value="{{$FDP->condensate}}">
              </div>
          </div>

        </div>

        <div class="" id="ag"> 

          <div class="form-group row">
              <label for="ag_reserve" class="col-sm-2 col-form-label"> AG Reserves(Bscf) </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="ag_reserve" id="ag_reserve" value="{{$FDP->ag_reserve}}">
              </div>
          </div>

        </div>

        <div class="form-group row">
            <label for="off_take_rate" class="col-sm-2 col-form-label"> Off-Take Rate(MMSCFD)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="off_take_rate" id="off_take_rate" value="{{$FDP->off_take_rate}}">
            </div>
        </div>
            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas FDP </button>
          </div>
</form>



<script>

  $(function()
  {         
    $("#upGasDevelopmentPlanForm").on('submit', function(e)
    {   
        e.preventDefault();            
        editForm('upGasDevelopmentPlanForm', "{{url('/upstream')}}", 'edit_gfdp');

        displayApprovedGasDevelopmentPlan();
    });



    $('#year_gfdps').datepicker(
    {
      format: "yyyy", autoclose: true,
      viewMode: "years", 
      minViewMode: "years"
    })



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


