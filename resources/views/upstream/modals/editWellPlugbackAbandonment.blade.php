       
<form id="upPlugForm" action="{{url('/upstream')}}" method="POST">
          

          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$WEL_PLUG->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_well_plugback_abandonment">



         

          <div class="form-group row">
            <label for="year_pg" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_pg" value="{{$WEL_PLUG->year}}" required readonly="">
            </div>
          
            <label for="month_pg" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_pg" value="{{$WEL_PLUG->month}}" required readonly="">
            </div>
          </div>

         

          <div class="form-group row">
            <label for="field_id_wk" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id_wk" required>
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
            <label for="" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-10">

                <label class="container"> <span style="margin-left: 20px"> Abandonment </span>
                  <input type="radio" name="type_id" id="" value="1" @if($WEL_PLUG->type_id == 1) checked @endif> <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Suspension </span>
                  <input type="radio" name="type_id" id="" value="2" @if($WEL_PLUG->type_id == 2) checked @endif>  <span class="checkmark"></span>
                </label>  
                <label class="container"> <span style="margin-left: 20px"> Plugback </span>
                  <input type="radio" name="type_id" id="" value="3" @if($WEL_PLUG->type_id == 3) checked @endif>  <span class="checkmark"></span>
                </label>         
               
            </div>
          </div> 


          <div class="form-group row">
            <label for="number_of_well" class="col-sm-2 col-form-label"> No of Wells </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Number of Wells" name="number_of_well" id="number_of_well" value="{{$WEL_PLUG->number_of_well}}" required>
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Well Pludback / Abandonment </button>
          </div>

</form>




<script>
  $(function()
  {      
        $("#upPlugForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upPlugForm', "{{url('/upstream')}}", 'edit_plugback');

            displayPlugbackAbandonment();
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
          
          $('#year_pg').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_pg').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>