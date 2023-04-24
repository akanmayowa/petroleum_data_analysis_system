<form id="upComplForm" action="{{url('/upstream')}}" method="POST">
          

          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$WEL_COMP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_well_completion">



         

          <div class="form-group row">
            <label for="year_come" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_come" value="{{$WEL_COMP->year}}" required readonly="">
            </div>
          
            <label for="month_come" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_come" value="{{$WEL_COMP->month}}" required readonly="">
            </div>
          </div>

         

          <div class="form-group row">
            <label for="field_id_come" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_come" required>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Well Type </label>
            <div class="col-sm-4">

                <label class="container"> <span style="margin-left: 20px"> Injector</span>
                  <input type="radio" name="well_type" id="" value="3" @if($WEL_COMP->well_type == 3) checked @endif> 
                  <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Oil Producer </span>
                  <input type="radio" name="well_type" id="" value="4" @if($WEL_COMP->well_type == 4) checked @endif> 
                   <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Gas Producer </span>
                  <input type="radio" name="well_type" id="" value="5" @if($WEL_COMP->well_type == 5) checked @endif> 
                   <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Well Disposer </span>
                  <input type="radio" name="well_type" id="" value="6" @if($WEL_COMP->well_type == 5) checked @endif> 
                   <span class="checkmark"></span>
                </label>          
               
            </div>

            <label for="" class="col-sm-2 col-form-label"> Completion Type </label>
            <div class="col-sm-4">

                <label class="container"> <span style="margin-left: 20px"> Initial Completion</span>
                  <input type="radio" name="type_id" id="" value="1" @if($WEL_COMP->type_id == 1) checked @endif> 
                  <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Smart-Completion </span>
                  <input type="radio" name="type_id" id="" value="2" @if($WEL_COMP->type_id == 2) checked @endif> 
                   <span class="checkmark"></span>
                </label>           
               
            </div>
          </div>    


          <div class="form-group row">
            <label for="number_of_well_com" class="col-sm-2 col-form-label"> No of Wells </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Number of Wells" name="number_of_well" id="number_of_well_com" value="{{$WEL_COMP->number_of_well}}" required>
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Well Completion </button>
          </div>

</form>




<script>
  $(function()
  {      
        $("#upComplForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upComplForm', "{{url('/upstream')}}", 'edit_completion');

            displayCompletion();
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
            $('.w_cont').keyup(function()
            {
                var total = 0;
                $('.w_cont').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_wct_e").val(total);
                console.log(total);
            });
        });


        $(function()
        {        
          
          $('#year_come').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_come').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>