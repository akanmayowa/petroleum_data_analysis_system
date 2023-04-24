       
<form id="upWorkForm" action="{{url('/upstream')}}" method="POST">
          

          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$WEL_WORK->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_well_workover">


         

          <div class="form-group row">
            <label for="year_wke" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_wke" value="{{$WEL_WORK->year}}" required readonly>
            </div>
          
            <label for="month_wke" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_wke" value="{{$WEL_WORK->month}}" required readonly>
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
            <label for="company_id_wk" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id_wk" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value=""></option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="concession_id_wk" class="col-sm-2 col-form-label"> Concession </label>
            <div class="col-sm-4">
                <select class="form-control" name="concession_id" id="concession_id_wk" required>
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->concession_name}} </option>
                    @else <option value=""></option> @endif
                    @if($all_con)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}"> {{$all_con->concession_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
          


          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"> Workover Type </label>
            <div class="col-sm-10">

                <label class="container"> <span style="margin-left: 20px"> Repairs</span>
                  <input type="radio" name="type_id" id="" value="1" @if($WEL_WORK->type_id == 1) checked @endif> 
                  <span class="checkmark"></span>
                </label>
                <label class="container"> <span style="margin-left: 20px"> Zone Change/Zone Isolation </span>
                  <input type="radio" name="type_id" id="" value="2" @if($WEL_WORK->type_id == 2) checked @endif>  
                  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Re-Completion </span>
                  <input type="radio" name="type_id" id="" value="3" @if($WEL_WORK->type_id == 3) checked @endif>  
                  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Logging/PLT </span>
                  <input type="radio" name="type_id" id="" value="4" @if($WEL_WORK->type_id == 4) checked @endif> 
                  <span class="checkmark"></span>
                </label> 
                <label class="container"> <span style="margin-left: 20px"> Cement Squeeze </span>
                  <input type="radio" name="type_id" id="" value="5" @if($WEL_WORK->type_id == 5) checked @endif> 
                  <span class="checkmark"></span>
                </label>           
               
            </div>
          </div>  


          <div class="form-group row">
            <label for="well" class="col-sm-2 col-form-label"> Well </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Well" name="well" id="well" value="{{$WEL_WORK->well}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="facility_id" class="col-sm-2 col-form-label"> Facility </label>
            <div class="col-sm-10">
                <select class="form-control" name="facility_id" id="facility_id" required>
                    @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_name}} </option> @endif
                    @if($all_fac)
                        @foreach($all_fac as $all_fac)
                            <option value="{{$all_fac->id}}"> {{$all_fac->facility_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Well Workover </button>
          </div>

</form>




<script>
  $(function()
  {      
        $("#upWorkForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upWorkForm', "{{url('/upstream')}}", 'edit_workover');

            displayWorkover();
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
          
          $('#year_wke').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });

          $('#month_wke').datepicker(
          {
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>