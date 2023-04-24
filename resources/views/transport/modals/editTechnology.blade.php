<form id="esTechForm" action="{{url('/transport')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$TECH->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_technology">

        @php 
            $one_loc = \App\field::where('id', $TECH->location_id)->first();                 
            $all_loc = \App\field::orderBy('field_name', 'asc')->get();    
            $one_com = \App\company::where('id', $TECH->company_id)->first();    
            $all_com = \App\company::orderBy('company_name', 'asc')->get();
            $one_sta = \App\es_project_status::where('id', $TECH->status)->first(); 
            $all_sta = \App\es_project_status::orderBy('status_name', 'asc')->get();   
        @endphp


          

        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" value="{{$TECH->year}}" required readonly>
            </div>
        </div>  

        <div class="form-group row">
            <label for="technology" class="col-sm-2 col-form-label"> Technology </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Technology" name="technology" id="technology" value="{{$TECH->technology}}" required="">
            </div>
        </div> 


        <div class="form-group row">
            <label for="application" class="col-sm-2 col-form-label"> Application </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Application" name="application" id="application" value="{{$TECH->application}}" required="">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="company_id_" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company" name="company_id" id="company_id_" value="{{$TECH->company_id}}">
            </div>
        </div>
          

        <div class="form-group row">
            <label for="location_id_" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Location" name="location_id" id="location_id_" value="{{$TECH->location_id}}">
            </div>
        </div>
                

        <div class="form-group row">
            <label for="adoptation_date_ted" class="col-sm-2 col-form-label"> Approved Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Approved Date" name="adoptation_date" id="adoptation_date_ted" value="{{$TECH->adoptation_date}}" required="" readonly="">
            </div>

            <label for="status_" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Status" name="status_id" id="status_" value="{{$TECH->status}}" required="">
                {{-- <select class="form-control" name="status_id" id="status_" required>
                    @if($one_sta)<option value="{{$one_sta->id}}"> {{$one_sta->field_name}} </option> 
                    @else <option value=""> Select Status </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                        @endforeach
                    @endif
                </select> --}}
            </div>
        </div> 

      <div class="form-group row">
        <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
        <div class="col-sm-10">
            <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$TECH->remark}}</textarea>
        </div>
      </div>


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Technology</button>
        </div>
    </form>


    <script>
        $(function()
        {
            $("#esTechForm").on('submit', function(e)
            {   
                e.preventDefault();            
                editForm('esTechForm', "{{url('/transport')}}", 'edittech');

                displayTechnology();
            });


            $('#adoptation_date_ted').datepicker(
            {
              autoclose: true, format: "yyyy-mm-dd"
            })


            $('.other_techs').hide();
            $("#company_id_techs").on('change',function(e)
            { 
                var comp = $('#company_id_techs').val();
                if(comp == 0){ $('.other_techs').show(); }else if(comp != 0){ $('.other_techs').hide(); }
            });


            $('.other_field_edit').hide();
            $("#location_id_etech").on('change',function(e)
            { 
                var loc = $('#location_id_etech').val();
                if(loc == 0){ $('.other_field_edit').show(); }else if(loc != 0){ $('.other_field_edit').hide(); }
            });

        });
    </script>