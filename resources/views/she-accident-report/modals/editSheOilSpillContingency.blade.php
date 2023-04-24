<form id="hseSpillContForm" action="{{url('/she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_os_contingency">



          

          <div class="form-group row">
            <label for="year_cont" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_cont" value="{{$MANAGE->year}}"  required readonly>
            </div>
          </div> 
        

        <div class="form-group row">
            <label for="state_id" class="col-sm-3 col-form-label"> Zones </label>
            <div class="col-sm-9">
                <select class="form-control" name="state_id" id="state_id" required>
                    @if($one_zon) <option value="{{$one_zon->id}}"> {{$one_zon->zone_name}} </option> 
                    @else <option value=""> </option> @endif
                    @if($all_zon)
                        @foreach($all_zon as $all_zon)
                            <option value="{{$all_zon->id}}"> {{$all_zon->zone_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="types" class="col-sm-3 col-form-label"> Facility Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="types" id="types" required>
                    @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->type_name}} </option> 
                    @else <option value=""> </option> @endif
                    @if($all_typ)
                        @foreach($all_typ as $all_typ)
                            <option value="{{$all_typ->id}}"> {{$all_typ->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="terrian_id" class="col-sm-3 col-form-label"> Terrain </label>
            <div class="col-sm-9">
                <select class="form-control" name="terrain_id" id="terrain_id" required>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> 
                    @else <option value=""> </option> @endif
                    @if($all_ter)
                        @foreach($all_ter as $all_ter)
                            <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>



        <div class="form-group row">
            <label for="no_of_company" class="col-sm-3 col-form-label"> No of Company </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="No of Company" name="no_of_company" id="no_of_company" value="{{$MANAGE->no_of_company}}" required/>
            </div>
        </div>


        <div class="form-group row">
            <label for="actual_no_of_company" class="col-sm-3 col-form-label"> Actual No of Company </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="Actual No of Company" name="actual_no_of_company" id="actual_no_of_company" value="{{$MANAGE->actual_no_of_company}}" required/>
            </div>
        </div>


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Oil Spill Contingency </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseSpillContForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseSpillContForm', "{{url('/she-accident-report')}}", 'edit_contingency');

            displayOilSpillContingency();
        });


        $('#year_cont').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
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
      
    });
</script>