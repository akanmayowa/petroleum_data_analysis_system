<div id="addproj" class="modal fade" role="dialog" style="height:90%; margin:2%;">
      <div class="modal-dialog modal-lg" style="">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add DWP Progress</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          		<form id="submitDWPProgress">
          			<input type="hidden" name="type" value="addDWPProgress">
          		          <div class="form-group row">
                <label for="division_id" class="col-sm-2 col-form-label"> Division </label>
                <div class="col-sm-10">
                    <select class="form-control" name="division_id" id="division_id" required>
                        <option value="">Select Division</option>
                            @if($division)
                                @foreach($division as $division) 
                                    <option value="{{$division->id}}"> {{$division->division_name}} </option>                                    
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>
 			          <div class="form-group row">
                <label for="alignment_id" class="col-sm-2 col-form-label"> Alignment </label>
                <div class="col-sm-10">
                    <select class="form-control" name="alignment_id" id="alignment_id" required>
                        <option value="">Select DWP Alignment</option>
                           
                    </select>
                </div>
          </div>
           <div class="form-group row">
                <label for="achievement_status_id" class="col-sm-2 col-form-label"> Select Month </label>
                <div class="col-sm-10">
                     <input type="text" class="form-control" id="progress_month" name="progress_month" readonly="true">
                </div>
          </div>
          <div class="form-group row">
                <label for="achievement_status_id" class="col-sm-2 col-form-label"> Achievement Status </label>
                <div class="col-sm-10">
                    <select class="form-control" name="achievement_status_id" id="achievement_status_id" required>
                        <option value=""> Select Achievement Status </option>
                                @if(count($achieve_status)>0)
                                @foreach($achieve_status as $achieve_status)
                                    <option value="{{$achieve_status->id}}"> {{$achieve_status->achievement_status_name}} </option>
                                @endforeach
                            @endif
                    </select>
                </div>
          </div>


          </div>
</form>

    

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_dwp_progress" id="add_dwp_progress" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Progress</button>
          </div>
         </div>
     </div>
     </div>


