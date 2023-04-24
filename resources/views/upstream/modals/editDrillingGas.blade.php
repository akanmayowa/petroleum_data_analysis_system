<form id="upDrillGasForm" action="{{url('/upstream')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$WELL->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_drilling_gas">



        <div class="form-group row">
            <label for="year_dgase" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_dgase" value="{{$WELL->year}}" readonly>
            </div>

            <label for="month_dgase" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_dgase" value="{{$WELL->month}}" readonly>
            </div>
        </div>
          


          <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-10">
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

        <div class="form-group row">
            <label for="well" class="col-sm-2 col-form-label"> Well </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well Name" name="well" id="well" value="{{$WELL->well}}">
            </div>
        </div> 


          <div class="form-group row">
              <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
              <div class="col-sm-10">
                  <select class="form-control" name="terrain_id" id="terrain_id">
                      @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> 
                      @else <option value=""> Select Terrain </option> @endif
                      <option value=""> Select Terrain </option>
                      @if($all_ter)
                          @foreach($all_ter as $all_ter)
                              <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                          @endforeach
                      @endif
                  </select>
              </div>
          </div>


        <div class="form-group row">
            <label for="reserves" class="col-sm-2 col-form-label"> Reserves(BSCF) </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="reserves" id="reserves" required="" value="{{$WELL->reserves}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="off_take" class="col-sm-2 col-form-label"> Off-Take Rate(MMSCFD)</label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="off_take" id="off_take" value="{{$WELL->off_take}}">
            </div>
        </div>

        

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Drill Gas Wells </button>
          </div>
</form>



<script>
$(function()
{
    $("#upDrillGasForm").on('submit', function(e)
    {   
        e.preventDefault();            
        editForm('upDrillGasForm', "{{url('/upstream')}}", 'edit_dri_gas');

        displayDrillingGas();
    });


    $('#year_dgase').datepicker(
    {
      format: "yyyy", autoclose: true,
      viewMode: "years", 
      minViewMode: "years"
    });

    $('#month_dgase').datepicker(
    {
      format: "MM", autoclose: true,
      viewMode: "months", 
      minViewMode: "months"
    });


    //Hide and show div for Appriasal/Development and Initial Completion
    $('#type_dgase').change(function()
    {
      var id = $(this).val();
      if(id == 1){ $('#app_dev').show();    $('#ini_com').hide(); } 
      else{ $('#ini_com').show();    $('#app_dev').hide(); }
      
    });
});
</script>