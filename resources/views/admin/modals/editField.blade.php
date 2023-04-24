<form id="fielForm" action="{{url('/admin/add_field')}}" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$FIELD_->id}}" required>
            <input type="hidden" class="form-control" id="field_code" name="field_code" value="{{$FIELD_->field_code}}" required>
            {{-- <input type="hidden" class="form-control" name="type" id="" value="add_field"> --}}
            {{ csrf_field() }}

          <div class="form-group row">
                <label for="field_name" class="col-sm-2 col-form-label"> Field Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="field_name" id="field_name" value="{{$FIELD_->field_name}}" required>
                </div>
          </div>


          <div class="form-group row">
                <label for="concession_id" class="col-sm-2 col-form-label"><i class=""> Concession </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="concession_id" id="concession_id">
                        @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->concession_name}} </option> @else <option value=""> Select Concession </option>  @endif
                        @if($all_con)
                            @foreach($all_con as $all_con)
                                <option value="{{$all_con->id}}"> {{$all_con->concession_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"><i class=""> Company </i></label>
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
                <label for="contract_id" class="col-sm-2 col-form-label"><i class=""> Contract </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_id" id="contract_id" required>
                        @if($one_ctr) <option value="{{$one_ctr->id}}"> {{$one_ctr->contract_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if($all_ctr)
                            @foreach($all_ctr as $all_ctr)
                                <option value="{{$all_ctr->id}}"> {{$all_ctr->contract_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="terrain_id" class="col-sm-2 col-form-label"><i class=""> Terrain </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="terrain_id" id="terrain_id" required>
                        @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if($all_ter)
                            @foreach($all_ter as $all_ter)
                                <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Field</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#fielForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('fielForm', "{{url('/admin/add_field')}}", 'editfield');

            displayField();
        });
    });        
  </script>