<form id="esMeterForm" action="{{url('/transport')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$METER->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_metering">

        @php 
            $one_fac = \App\facility::where('id', $METER->facility_id)->first();                 
            $all_fac = \App\facility::orderBy('facility_name', 'asc')->get();
            $one_com = \App\company::where('id', $METER->company_id)->first();                   
            $all_com = \App\company::orderBy('company_name', 'asc')->get();
            $one_ser = \App\es_service::where('id', $METER->service_id)->first();                
            $all_ser = \App\es_service::orderBy('service_name', 'asc')->get();
            $one_pha = \App\es_project_status::where('id', $METER->phase_id)->first();                  
            $all_pha = \App\es_project_status::orderBy('status_name', 'asc')->get();
        @endphp


          

        <div class="form-group row">
            <label for="year" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" value="{{$METER->year}}" required readonly>
            </div>
        </div>  

        <div class="form-group row">
            <label for="facility_id" class="col-sm-1 col-form-label"> Facility </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="facility_id" id="facility_id" value="{{$METER->facility_id}}" required>
            </div>

            <label for="company_id_mee" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id_mee" required>
                    @if($one_com)<option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> Select Company </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                    <option value="0"> Others </option>
                </select>
            </div>
        </div>
          

        <div class="form-group row other_mee">
            <label for="others_" class="col-sm-1 col-form-label"> Other Company </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Other Company" name="others" id="others_">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="objective" class="col-sm-1 col-form-label"> Objective </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Objective" name="objective" id="objective" value="{{$METER->objective}}" required="">
            </div>
        </div>
          

        <div class="form-group row">
            <label for="service_id" class="col-sm-1 col-form-label"> Service </label>
            <div class="col-sm-5">
                <select class="form-control" name="service_id" id="service_id" required>
                    @if($one_ser)<option value="{{$one_ser->id}}"> {{$one_ser->service_name}} </option> @else <option value=""> Select Service </option> @endif
                    @if($all_ser)
                        @foreach($all_ser as $all_ser)
                            <option value="{{$all_ser->id}}"> {{$all_ser->service_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="phase_id" class="col-sm-1 col-form-label"> Phase </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="phase_id" id="phase_id" value="{{$METER->phase_id}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="start_date" class="col-sm-1 col-form-label"> Start Date </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Start Date" name="start_date" id="start_date" value="{{$METER->start_date}}">
            </div>

            <label for="commissioning_date" class="col-sm-1 col-form-label"> Comm Date </label>
            <div class="col-sm-5">
                <input type="date" class="form-control" placeholder="Expected Commission Date" name="commissioning_date" id="commissioning_date" value="{{$METER->commissioning_date}}">
            </div>
        </div>

          <div class="form-group row">
            <label for="remark" class="col-sm-1 col-form-label"> Remark </label>
            <div class="col-sm-11">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$METER->remark}}</textarea>
            </div>
          </div>


         


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Metering</button>
        </div>
    </form>


    <script>
        $(function()
        { 
            $("#esMeterForm").on('submit', function(e)
            {   
                e.preventDefault();            
                editForm('esMeterForm', "{{url('/transport')}}", 'editmeter');

                displayMetering();
            });


            $('.other_mee').hide();
            $("#company_id_mee").on('change',function(e)
            { 
                var comp = $('#company_id_mee').val();
                if(comp == 0){ $('.other_mee').show(); }else if(comp != 0){ $('.other_mee').hide(); }
            });

        });
    </script>