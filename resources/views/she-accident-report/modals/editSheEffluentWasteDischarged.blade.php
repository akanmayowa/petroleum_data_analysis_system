<form id="hseEWDForm" action="{{url('she-accident-report')}}" method="POST">   
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_effluent_waste_discharged">        


         <div class="form-group row">
            <label for="year_effl" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_effl" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_effl" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_effl" value="{{$MANAGE->month}}" required readonly>
            </div>            
          </div> 


            
            <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option>
                    @else <option value="">  </option> @endif
                        @if($all_com)
                            @foreach($all_com as $all_com)
                                <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                            @endforeach
                        @endif
                    </select>
                </div>
            </div> 

          <div class="form-group row">
            <label for="well_name" class="col-sm-2 col-form-label other"> Well Name </label>
            <div class="col-sm-10 other">
                <input type="text" class="form-control" placeholder="Well Name" name="well_name" id="well_name" value="{{$MANAGE->well_name}}" required>
            </div>
          </div>


        <div class="form-group row">
            <label for="spent_wbm" class="col-sm-2 col-form-label"> Spent WBM </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Spent WBM" name="spent_wbm" id="spent_wbm" value="{{$MANAGE->spent_wbm}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="spent_obm" class="col-sm-2 col-form-label"> Spent OBM </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Spent OBM" name="spent_obm" id="spent_obm" value="{{$MANAGE->spent_obm}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="wbm_generated" class="col-sm-2 col-form-label"> WBM Cutting Generated </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="WBM Cutting Generated" name="wbm_generated" id="wbm_generated" value="{{$MANAGE->wbm_generated}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="obm_generated" class="col-sm-2 col-form-label"> OBM Cutting Generated </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="OBM Cutting Generated" name="obm_generated" id="obm_generated" value="{{$MANAGE->obm_generated}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="waste_manager" class="col-sm-2 col-form-label"> Waste Manager </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Waste Manager" name="waste_manager" id="waste_manager" value="{{$MANAGE->waste_manager}}" required>
            </div>
        </div>  
        


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Effluent Waste Discharged </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseEWDForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseEWDForm', "{{url('/she-accident-report')}}", 'edit_effl');

            displayEffluentWasteDischarged();
        });  


        $('#year_effl').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_effl').datepicker
        ({
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });
      
    });
</script>