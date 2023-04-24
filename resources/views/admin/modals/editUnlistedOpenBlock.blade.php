<form id="opBlocForm" action="{{url('/admin/add_unlisted_open_block')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$concession->id}}" required>
            <input type="hidden" name="date_c" id="date_c" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_unlisted_open_block">


          <div class="form-group row">
                <label for="concession_name" class="col-sm-2 col-form-label"><i class="">Concession</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Concession Held" name="concession_name" id="concession_name" value="{{$concession->concession_name}}" required>
                </div>
          </div>


          <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"><i class=""> Company </i></label>
                <div class="col-sm-10"> 
                    <select class="form-control" name="company_id" id="company_id" required disabled>
                        @if($one_comp) <option value="{{$one_comp->id}}"> {{$one_comp->company_name}} </option> @else <option value=""> Select Company </option> @endif
                        {{-- @if($comp_ddl)
                            @foreach($comp_ddl as $comp_ddl)
                                <option value="{{$comp_ddl->id}}"> {{$comp_ddl->company_name}} </option>                                
                            @endforeach
                        @endif --}}
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"><i class="">Area - Sq-Km</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Area in Sq-Km" name="area" id="area" value="{{$concession->area}}" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="terrain_id" class="col-sm-2 col-form-label"><i class=""> Terrain </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="terrain_id" id="terrain_id" required>
                        @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option value=""> Select Geological Terrain </option> @endif
                        @if($all_ter)
                            @foreach($all_ter as $all_ter)
                                <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="remark" class="col-sm-2 col-form-label"><i class=""> Remark </i></label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$concession->remark}}</textarea>
                </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Open Block </button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#userForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('userForm', "{{url('/downstream')}}", 'edituser');

            displayUsers();
        });
    });        
  </script>


<script>
  $(function()
  {   
        $("#opBlocForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('opBlocForm', "{{url('/admin/add_unlisted_open_block')}}", 'edit_unopen');

            displayUnlistedOpen();
        });


        $('#award_dated').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      });
  });
</script>