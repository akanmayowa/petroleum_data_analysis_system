<form id="" action="{{url('/bala')}}" method="POST">
          <?php 
                $one_com = \App\company::where('id', $PRO_STA_->company_id)->first();                           $all_com = \App\company::get();
                $one_aos = \App\area_of_survey::where('id', $PRO_STA_->area_of_survey_block_id)->first();       $all_aos = \App\area_of_survey::get();
                $one_tos = \App\type_of_survey::where('id', $PRO_STA_->type_of_survey_project_id)->first();     $all_tos = \App\type_of_survey::get();
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$PRO_STA_->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_data_project_status">


            <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="agreement_dates" class="col-sm-2 col-form-label"> Agreement Date </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Agreement Date" name="agreement_date" id="agreement_dates" value="{{$PRO_STA_->agreement_date}}"  required>
            </div>
          </div>

          <div class="form-group row">
            <label for="area_of_survey_block_id" class="col-sm-2 col-form-label"> Area Of Survey </label>
            <div class="col-sm-10">
                <select class="form-control" name="area_of_survey_block_id" id="area_of_survey_block_id" required>
                    @if($one_aos) <option value="{{$one_aos->id}}"> {{$one_aos->area_of_survey_name}} </option> @endif
                    @if($all_aos)
                        @foreach($all_aos as $all_aos)
                            <option value="{{$all_aos->id}}"> {{$all_aos->area_of_survey_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="type_of_survey_project_id" class="col-sm-2 col-form-label"> Type Of Survey </label>
            <div class="col-sm-10">
                <select class="form-control" name="type_of_survey_project_id" id="type_of_survey_project_id" required>
                    @if($one_tos) <option value="{{$one_tos->id}}"> {{$one_tos->type_of_survey_name}} </option> @endif
                    @if($all_tos)
                        @foreach($all_tos as $all_tos)
                            <option value="{{$all_tos->id}}"> {{$all_tos->type_of_survey_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="quantum_of_survey" class="col-sm-2 col-form-label"> Quantum of Survey </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="quantum_of_survey" id="quantum_of_survey" value="{{$PRO_STA_->quantum_of_survey}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="year_of_surveys" class="col-sm-2 col-form-label"> Year of Survey </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year Of Survey" name="year_of_survey" id="year_of_surveys" value="{{$PRO_STA_->year_of_survey}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" rows="2" placeholder="Remark" name="remark" id="remark" required>{{$PRO_STA_->remark}}</textarea>
            </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Projects Status </button>
          </div>
</form>




<script type="text/javascript">    

    $(function()
    {          

      $('#agreement_dates').datepicker(
      {
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
      });     

      $('#year_of_surveys').datepicker(
      {
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
      });

    })

</script>