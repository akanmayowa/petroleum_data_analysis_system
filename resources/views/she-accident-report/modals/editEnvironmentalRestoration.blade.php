<form id="hseEnvRestForm" action="{{url('she-accident-report')}}" method="POST">   
      {{ csrf_field() }}

      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_environmental_restoration">



          <div class="form-group row">
            <label for="year_envi" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_envi" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_envi" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Month - YYYY" name="month" id="month_envi" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 
        


        <div class="form-group row">
            <label for="service" class="col-sm-3 col-form-label"> Services </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Services" name="service" id="service" value="{{$MANAGE->service}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="status_id" class="col-sm-3 col-form-label"> Approval Status </label>
            <div class="col-sm-9">
                <select class="form-control" name="status_id" id="status_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}} </option>
                    @else <option value="">  </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="new" class="col-sm-3 col-form-label"> New </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="New" name="new" id="new" value="{{$MANAGE->service}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="renew" class="col-sm-3 col-form-label"> Renew </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Renew" name="renew" id="renew" value="{{$MANAGE->renew}}" required>
            </div>
        </div> 

        


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Environmental Restoration </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseEnvRestForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseEnvRestForm', "{{url('/she-accident-report')}}", 'edit_env_res');

            displayEnvironmentalRestoration();
        });


        $('#year_envi').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_envi').datepicker
        ({
          format: "MM",
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
       
        });
      
    });
</script>