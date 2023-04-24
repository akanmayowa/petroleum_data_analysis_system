<form id="" action="{{url('/bala')}}" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$AOS_->id}}" required>
            {{ csrf_field() }}
            <input type="hidden" name="date" id="date_aos" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_area_of_survey">

          <div class="form-group row">
            <label for="area_of_survey_name" class="col-sm-2 col-form-label"> Area Of Survey </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="area_of_survey_name" id="area_of_survey_name" value="{{$AOS_->area_of_survey_name}}" required>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Area Of Survey</button>
          </div>
</form>