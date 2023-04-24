<form id="upFieldSumForm" action="{{url('/upstream')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$FDP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_field_summary">



        <div class="form-group row">
            <label for="year_fsums" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_fsums" value="{{$FDP->year}}" readonly>
            </div>  

            <label for="month_fsums" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Month - YYYY" name="month" id="month_fsums" value="{{$FDP->month}}" readonly>
            </div>             
        </div>
          


          <div class="form-group row">
            <label for="company_id" class="col-sm-3 col-form-label"> Field </label>
            <div class="col-sm-9">
                <select class="form-control" name="company_id" id="company_id" required>
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

          <div class="form-group row">
            <label for="contract_id" class="col-sm-3 col-form-label"> Contract Type </label>
            <div class="col-sm-9">
                <select class="form-control" name="contract_id" id="contract_id" required>
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> 
                    @else <option value=""> Select Contract Type </option> @endif
                    @if($all_con)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}"> {{$all_con->contract_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
       

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
              <label for="producing_field" class="col-sm-3 col-form-label"> Producing Fields </label>
              <div class="col-sm-9">
                  <input type="number" class="form-control" name="producing_field" id="producing_field" value="{{$FDP->producing_field}}">
              </div>
          </div>

          <div class="form-group row">
              <label for="well" class="col-sm-3 col-form-label"> Wells </label>
              <div class="col-sm-9">
                  <input type="number" class="form-control" name="well" id="well" value="{{$FDP->well}}">
              </div>
          </div>


        <div class="form-group row">
            <label for="string" class="col-sm-3 col-form-label"> String</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="string" id="string" value="{{$FDP->string}}">
            </div>
        </div>
            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Field Summary </button>
          </div>
</form>



<script>
$(function()
{ 
    $("#upFieldSumForm").on('submit', function(e)
    {   
        e.preventDefault();            
        editForm('upFieldSumForm', "{{url('/upstream')}}", 'edit_fsum');

        displayFieldSummary();
    });


    $('#year_fsums').datepicker(
    {
      format: "yyyy",
      viewMode: "years", 
      minViewMode: "years"
    });

      $('#month_fsums').datepicker(
      {
        autoclose: true, format: "MM",
        viewMode: "months", 
        minViewMode: "months"
    })


//       $('.rig_mte').keyup(function()
//       {
//           var total_rig_mt = 0;
//           $('.rig_mte').each(function()            
//           {
//               total_rig_mt += parseFloat($(this).val());
//           });
//           $("#total_rig_mt").val(total_rig_mt.toFixed(2));
//       });
// });
</script>