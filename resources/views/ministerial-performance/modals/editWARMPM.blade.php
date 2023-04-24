<form id="" action="{{url('/ministerial-performance')}}" method="POST">
      <?php $WAR_tot = DB::table('war')->count();  ++$WAR_tot; ?>
      <?php 
            $one_dept = \App\department::where('id', $WAR_->department_id)->first();       $all_dept = \App\department::get(); 
            $one_stat = \App\status_category::where('id', $WAR_->status_id)->first();       $all_stat = \App\status_category::get(); 
      ?>
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$WAR_->id}}" required>
        <input type="hidden" name="tot_war" id="tot_war" value="{{$WAR_tot}}">
            <input type="hidden" class="form-control" name="type" id="" value="addwar">


      <div class="form-group row">
            <label for="deliverables" class="col-sm-2 col-form-label"> Deliverables </label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" rows="3" placeholder="Report Deliverables" name="deliverables" id="deliverables" required>{{$WAR_->deliverables}}</textarea>
            </div>
      </div>

      <div class="form-group row">
            <label for="department_id" class="col-sm-2 col-form-label"> Department </label>
            <div class="col-sm-10">
                <select class="form-control" name="department_id" id="department_id" required>
                    @if($one_dept) <option value="{{$one_dept->id}}"> {{$one_dept->department_name}} @endif </option>
                    @if($all_dept)
                        @foreach($all_dept as $all_dept)
                            <option value="{{$all_dept->id}}"> {{$all_dept->department_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
      </div>

      <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    @if($one_stat) <option value="{{$one_stat->id}}"> {{$one_stat->status}} @endif  </option>
                    @if($all_stat)
                        @foreach($all_stat as $all_stat)
                            <option value="{{$all_stat->id}}"> {{$all_stat->status}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
      </div>

      <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Report Date </label>
            <div class="col-sm-5 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="from_date" name="from_date" value="{{$WAR_->from_date}}" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            <div class="col-sm-5 input-group date" data-provide="datepicker">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="to_date" name="to_date" value="{{$WAR_->to_date}}" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Weekly Activity</button>
      </div>
</form>