<form id="" action="{{url('she-accident-report/add_she_waste_volumes')}}" method="POST">

      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$WASTE_VOL->id}}" disabled>


     
        <div class="form-group row">
            <label for="e_year" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="e_year" value="{{$WASTE_VOL->year}}" disabled>
            </div>
          </div> 

        
          <div class="form-group row">
            <label for="e_month" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Month - MMM" name="month" id="e_month" value="{{$WASTE_VOL->month}}" disabled>
            </div>
          </div>
        


        <div class="form-group row">
            <label for="sum_of_wbmc" class="col-sm-3 col-form-label"> Sum Of WBMC </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of WBMC" name="sum_of_wbmc" id="sum_of_wbmc" value="{{$WASTE_VOL->sum_of_wbmc}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="sum_of_obmc" class="col-sm-3 col-form-label"> Sum Of OBMC</label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of OBMC" name="sum_of_obmc" id="sum_of_obmc" value="{{$WASTE_VOL->sum_of_obmc}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="sum_of_spent_wbm" class="col-sm-3 col-form-label"> Spent WBM </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of Spent WBM" name="sum_of_spent_wbm" id="sum_of_spent_wbm" value="{{$WASTE_VOL->sum_of_spent_wbm}}" disabled>
            </div>
        </div> 


        <div class="form-group row">
            <label for="sum_of_spent_obm" class="col-sm-3 col-form-label"> Spent OBM </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control" placeholder="Sum Of Spent OBM" name="sum_of_spent_obm" id="sum_of_spent_obm" value="{{$WASTE_VOL->sum_of_spent_obm}}" disabled>
            </div>
        </div> 
          


        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($WASTE_VOL->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($WASTE_VOL->updated_at)->diffForHumans()}}
            </div>
          </div>


</form>






