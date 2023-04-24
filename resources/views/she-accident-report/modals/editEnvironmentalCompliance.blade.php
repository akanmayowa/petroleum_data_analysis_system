<form id="hseEnvCompForm" action="{{url('she-accident-report')}}" method="POST">   
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_environmental_compliance">        


         <div class="form-group row">
            <label for="year_compl" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_compl" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_compl" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_compl" value="{{$MANAGE->month}}" required readonly>
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
                <label for="compliance" class="col-sm-2 col-form-label"> Non-Compliance </label>
                <div class="col-sm-10">
                    <select class="form-control" name="compliance" id="compliance" required>
                        @if($MANAGE) <option value="{{$MANAGE->id}}"> {{$MANAGE->compliance}} </option>
                        @else <option value="">  </option> @endif
                        <option value="Yes"> Yes </option>
                        <option value="No"> No </option>
                    </select>
                </div>
            </div>  

        


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Environmental Compliance </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseEnvCompForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseEnvCompForm', "{{url('/she-accident-report')}}", 'edit_env_comp');

            displayEnvironmentalComplianceMonitoring();
        });


        $('#year_compl').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_compl').datepicker
        ({
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });
      
    });
</script>