<form id="hseEnvStuForm" action="{{url('she-accident-report')}}" method="POST">   
      @csrf
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_environmental_studies">



          <div class="form-group row">
            <label for="year_stud" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_stud" value="{{$MANAGE->year}}" required readonly>
            </div>
          </div> 


          <div class="form-group row">
            <label for="month_stud" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_stud" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 


          <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company</label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option>
                    @else <option value="">  </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 


          <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label"> Study Type </label>
            <div class="col-sm-4">
                <select class="form-control" name="type_id" id="type_id" required>
                    @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->type_name}} </option>
                    @else <option value="">  </option> @endif
                    @if($all_typ)
                        @foreach($all_typ as $all_typ)
                            <option value="{{$all_typ->id}}"> {{$all_typ->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <select class="form-control" name="status_id" id="status_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->type_name}} </option>
                    @else <option value="">  </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 

          <div class="form-group row">
            <label for="study_title" class="col-sm-2 col-form-label"> Study Title </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Study Title" name="study_title" id="study_title" value="{{$MANAGE->study_title}}" required>
            </div>
          </div> 
        



        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Environmental Studies </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseEnvStuForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseEnvStuForm', "{{url('/she-accident-report')}}", 'edit_env_stu');

            displayEnvironmentalStudies();
        });



        $('#year_stud').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_stud').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });
      
    });
</script>