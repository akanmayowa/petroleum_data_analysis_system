<form id="" action="{{url('/ministerial-performance')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$FREQUENCY->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_frequency_of_measurement">

          <div class="form-group row">
                <label for="frequency_name" class="col-sm-2 col-form-label"> Frequency Measurement </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Frequency of Measurement Name" name="frequency_name" id="frequency_name" value="{{$FREQUENCY->frequency_name}}" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Frequency of Measurement</button>
          </div>
</form>