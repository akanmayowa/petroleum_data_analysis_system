<form id="esPipeForm" action="{{url('/transport')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$PIPELINE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_pipeline_project">

        @php 
            $one_own = \App\company::where('id', $PIPELINE->owner_id)->first();            
            $all_own = \App\company::orderBy('company_name', 'asc')->get();
            $one_sta = \App\es_project_status::where('id', $PIPELINE->status_id)->first();         
            $all_sta = \App\es_project_status::orderBy('status_name', 'asc')->get();
        @endphp



        <div class="form-group row">
            <label for="year" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" value="{{$PIPELINE->year}}" required readonly>
            </div>
        </div>  

        <div class="form-group row">
            <label for="pipeline_name" class="col-sm-1 col-form-label"> Pipeline </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Pipeline Name" name="pipeline_name" id="pipeline_name" value="{{$PIPELINE->pipeline_name}}" required="">
            </div>

            <label for="owner_id_" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="owner_id" id="owner_id_" required>
                    @if($one_own)<option value="{{$one_own->id}}"> {{$one_own->company_name}} </option> @else <option value=""> Select Company </option> @endif
                    @if($all_own)
                        @foreach($all_own as $all_own)
                            <option value="{{$all_own->id}}"> {{$all_own->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
        </div> 
          

        <div class="form-group row o_details">
            <label for="owner_details" class="col-sm-1 col-form-label"> Other Company </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Owner Details" name="owner_details" id="owner_details" value="{{$PIPELINE->owner_details}}">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="origin" class="col-sm-1 col-form-label"> Origin </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Origin" name="origin" id="origin" value="{{$PIPELINE->origin}}" required="">
            </div>

            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Destination" name="destination" id="destination" value="{{$PIPELINE->destination}}" required="">
            </div>
        </div>
          

        <div class="form-group row">
            <label for="nominal_size" class="col-sm-1 col-form-label"> Nominal Size </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Nominal Size" name="nominal_size" id="nominal_size" value="{{$PIPELINE->nominal_size}}" required="">
            </div>

            <label for="length" class="col-sm-1 col-form-label"> Length </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Length" name="length" id="length" value="{{$PIPELINE->length}}" required="">
            </div>
        </div>

          <div class="form-group row">            
            <label for="process_fluid" class="col-sm-1 col-form-label"> Process Fluid </label>
            <div class="col-sm-5">
                <select class="form-control" name="process_fluid" id="process_fluid" required>
                    @if($PIPELINE) <option value="{{$PIPELINE->process_fluid}}"> {{$PIPELINE->process_fluid}} </option> @else <option value=""> Select Process Fluid </option> @endif
                    <option value="Oil"> Oil </option>
                    <option value="Gas"> Gas </option>
                    <option value="Water"> Water </option>
                    <option value="Condensate"> Condensate </option>
                    <option value="Bulk"> Bulk (Oil, Gas, Water & Condensate) </option>
                </select>
            </div>

            <label for="status_id" class="col-sm-1 col-form-label"> Status </label>
            <div class="col-sm-5">
                <select class="form-control" name="status_id" id="status_id">
                    @if($one_sta)<option value="{{$one_sta->id}}"> {{$one_sta->status_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

        <div class="form-group row">
            <label for="start_date_ppe" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Start Date" name="start_date" id="start_date_ppe" value="{{$PIPELINE->start_date}}">
            </div>

            <label for="commissioning_date_ppe" class="col-sm-1 col-form-label"> Commissioning  </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Expected Commission Date" name="commissioning_date" id="commissioning_date_ppe" value="{{$PIPELINE->commissioning_date}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-1 col-form-label"> Remark </label>
            <div class="col-sm-11">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$PIPELINE->remark}}</textarea>
            </div>
        </div>


         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Pipeline Project </button>
        </div>
    </form>




<script>    
    $(function()
    {
        $("#esPipeForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('esPipeForm', "{{url('/transport')}}", 'editpipes');

            displayPipeline();
        });


        //show others
        $('.o_details').hide();
        $("#owner_id_").on('change',function(e)
        { 
            var comp = $('#owner_id_').val();
            if(comp == 0){ $('.o_details').show(); }else if(comp != 0){ $('.o_details').hide(); }
        });      

    });



    // $('#start_date_ppe').datepicker(
    // {
    //   autoclose: true, format: "yyyy-mm-dd"
    // })

    // $('#commissioning_date_ppe').datepicker(
    // {
    //   autoclose: true, format: "yyyy-mm-dd"
    // })
</script>
