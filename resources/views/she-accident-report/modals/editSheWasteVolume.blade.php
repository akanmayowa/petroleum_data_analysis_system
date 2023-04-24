<form id="" action="{{url('she-accident-report')}}" method="POST">

      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$WASTE_VOL->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_she_waste_volumes">


     
        <div class="form-group row">
            <label for="e_year" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="e_year" value="{{$WASTE_VOL->year}}" required readonly>
            </div>
          </div> 

        
          <div class="form-group row">
            <label for="e_month" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Month - MMM" name="month" id="e_month" value="{{$WASTE_VOL->month}}" required readonly>
            </div>
          </div>
        


        <div class="form-group row">
            <label for="sum_of_wbmc" class="col-sm-3 col-form-label"> Sum Of WBMC </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of WBMC" name="sum_of_wbmc" id="sum_of_wbmc" value="{{$WASTE_VOL->sum_of_wbmc}}">
            </div>
        </div>


        <div class="form-group row">
            <label for="sum_of_obmc" class="col-sm-3 col-form-label"> Sum Of OBMC</label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of OBMC" name="sum_of_obmc" id="sum_of_obmc" value="{{$WASTE_VOL->sum_of_obmc}}">
            </div>
        </div> 


        <div class="form-group row">
            <label for="sum_of_spent_wbm" class="col-sm-3 col-form-label"> Spent WBM </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of Spent WBM" name="sum_of_spent_wbm" id="sum_of_spent_wbm" value="{{$WASTE_VOL->sum_of_spent_wbm}}">
            </div>
        </div> 


        <div class="form-group row">
            <label for="sum_of_spent_obm" class="col-sm-3 col-form-label"> Spent OBM </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of Spent OBM" name="sum_of_spent_obm" id="sum_of_spent_obm" value="{{$WASTE_VOL->sum_of_spent_obm}}">
            </div>
        </div> 
          


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Wasteer Volume </button>
        </div>


</form>




<script type="text/javascript">
    $(function()
    {
        $('#e_year').datepicker
        ({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#e_month').datepicker
        ({
          format: "MM",
          viewMode: "months", 
          minViewMode: "months"
        });
              
    });
</script>