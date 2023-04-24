 <form id="" action="{{url('/bala')}}" method="POST">
          <input type="hidden" class="form-control" id="id" name="id" value="{{$TOS_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_type_of_survey">
          {{ csrf_field() }}
          <input type="hidden" name="date" id="date_tos" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

        <div class="form-group row">
          <label for="type_of_survey_name" class="col-sm-2 col-form-label"> Type Of Survey </label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="type_of_survey_name" id="type_of_survey_name" value="{{$TOS_->type_of_survey_name}}" required>
          </div>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Type Of Survey</button>
        </div>
</form>