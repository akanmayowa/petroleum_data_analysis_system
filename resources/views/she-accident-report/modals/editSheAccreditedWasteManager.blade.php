<form id="hseWasteMgrForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_accredited_waste_manager">



          

          <div class="form-group row">
            <label for="year_mane" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_mane" value="{{$MANAGE->year}}"  required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="company_id_awme" class="col-sm-3 col-form-label"> Company </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id_awme" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else<option value="">  </option>@endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>



        <div class="form-group row">
            <label for="type_of_facility_id" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="type_of_facility_id" id="type_of_facility_id" required>
                    @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_type_name}} </option>
                    @else<option value="">  </option>@endif
                    @if($all_fac)
                        @foreach($all_fac as $all_fac)
                            <option value="{{$all_fac->id}}"> {{$all_fac->facility_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="facility_description" class="col-sm-3 col-form-label"> Facility Description </label>
            <div class="col-sm-9">
                <textarea rows="2" class="form-control" placeholder="Facility Description" name="facility_description" id="facility_description" required>{{$MANAGE->facility_description}}</textarea>
            </div>
        </div>


        <div class="form-group row">
            <label for="state_id" class="col-sm-3 col-form-label"> Location Area </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="state_id" id="state_id" value="{{$MANAGE->state_id}}" required>
            </div>
        </div>



        <div class="form-group row">
            <label for="operational_status_id" class="col-sm-3 col-form-label"> Operational Status </label>
            <div class="col-sm-9">                
                <select class="form-control" name="operational_status_id" id="operational_status_id" required>
                    @if($MANAGE) <option value="{{$MANAGE->operational_status_id}}"> {{$MANAGE->operational_status_id}} </option> 
                    @else <option value="">  </option> @endif
                    <option value="Operational"> Operational </option>
                    <option value="Non Operational"> Non Operational </option>
                    <option value="Under Suspension"> Under Suspension </option>
                </select>
            </div>
        </div>




        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Waste Managers </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseWasteMgrForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseWasteMgrForm', "{{url('/she-accident-report')}}", 'edit_acc_manager');

            displayWasteManagers();
        });



        $('#year_mane').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });


        $('#month_spe').datepicker
        ({
          format: "M",
          viewMode: "months", 
          minViewMode: "months"
        });




        //compute TOTAL       
        $(document).on("input", ".spill", function()
        {
            var total = 0;
            $('.spill').each(function()            
            {
                total += parseFloat($(this).val());
            });

            $("#total_no_of_spills").val(total);
            console.log(total);                         
       
        });



        $('.others_').hide();
        $("#company_id_awme").on('change',function(e)
        { 
            var comp = $('#company_id_awme').val();
            if(comp == 0){ $('.others_').show(); }else if(comp != 0){ $('.others_').hide(); }
        });
      
    });
</script>