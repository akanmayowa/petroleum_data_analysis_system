<form id="upWellActForm" action="{{url('/upstream')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$WELL->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_well_activities">




           <div class="form-group row">
            <label for="year_we" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_we" value="{{$WELL->year}}" readonly="">
            </div>

            <label for="month_we" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_we" value="{{$WELL->month}}" readonly="">
            </div>
          </div> 


            <div class="form-group row">
                <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain</label>
                <div class="col-sm-10">
                    <select class="form-control" name="terrain_id" id="terrain_id">
                        @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option>
                        @else <option value=""></option> @endif
                        @if($all_ter)
                            @foreach($all_ter as $all_ter)
                                <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="class_id" class="col-sm-2 col-form-label"> Class </label>
                <div class="col-sm-10">
                    <select class="form-control" name="class_id" id="class_id" required>
                        @if($one_cla) <option value="{{$one_cla->id}}"> {{$one_cla->class_name}} </option> 
                        @else <option value=""></option> @endif
                        @if($all_cla)
                            @foreach($all_cla as $all_cla)
                                <option value="{{$all_cla->id}}"> {{$all_cla->class_name}} </option>                            
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


         <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="type_id" id="type_id">
                    @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->type_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_typ)
                        @foreach($all_typ as $all_typ)
                            <option value="{{$all_typ->id}}"> {{$all_typ->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

            <div class="form-group row">
                <label for="contract_id" class="col-sm-2 col-form-label"> Contract </label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_id" id="contract_id" required>
                        @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> 
                        @else <option value=""></option> @endif
                        @if($all_con)
                            @foreach($all_con as $all_con)
                                <option value="{{$all_con->id}}"> {{$all_con->contract_name}} </option>                            
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
         

          <div class="form-group row">
            <label for="no_of_well" class="col-sm-2 col-form-label"> No of Wells Drilled </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="No of Wells Drilled" name="no_of_well" id="no_of_well" value="{{$WELL->no_of_well}}" required>
            </div>
          </div>   

          

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Well Activities </button>
          </div>
</form>


<script>
  $(function()
  {      
        $("#upWellActForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upWellActForm', "{{url('/upstream')}}", 'edit_well');

            displayWellActivities();
        });
  });

    //UPDATE WELL TOTAL
        function checktotal(field) 
        {  
            if (field.value == '') 
            {
                var fid = field.id;
                document.getElementById(fid).value = 0;
                //$('.amount').val(0);
            }         
        }

        $(function()
        {
            $('.well_edit').keyup(function()
            {
                var total_gas_util = 0;
                $('.well_edit').each(function()            
                {
                    total_gas_util += parseFloat($(this).val());
                });
                $("#total_wt_edit").val(total_gas_util);
                console.log(total_gas_util);
            });
        });


        $(function()
        {        

          $('#year_we').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });       

          $('#month_we').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>
