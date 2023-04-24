<form id="facTypeForm" action="{{url('/admin/addfacilitytype')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$FAC_TYPE->id}}" required>
        <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            {{-- <input type="hidden" class="form-control" name="type" id="" value="addfacilitytype"> --}}


      <div class="form-group row">
            <label for="facility_type_name" class="col-sm-2 col-form-label"><i class="">Facility</i></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Facility Name" name="facility_type_name" id="facility_type_name" value="{{$FAC_TYPE->facility_type_name}}" required>
            </div>
      </div>


      @if(Auth::user()->role_obj->role_name != 'Admin')
          <!-- SETTING TYPE BASED ON WHO IS LOGIN -->
          @if(Auth::user()->role_obj->permission->contains('constant', 'access_rm') ||   
                Auth::user()->role_obj->permission->contains('constant', 'access_mfio') ||  
                Auth::user()->role_obj->permission->contains('constant', 'access_up_operations') ||   
                Auth::user()->role_obj->permission->contains('constant', 'access_exploration') ||   
                Auth::user()->role_obj->permission->contains('constant', 'access_bala') )
                  <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="1" required>
           @elseif(Auth::user()->role_obj->permission->contains('constant', 'access_coto') ||   
                Auth::user()->role_obj->permission->contains('constant', 'access_pdj') ||  
                Auth::user()->role_obj->permission->contains('constant', 'access_rom') )
                  <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="2" required>
           @elseif(Auth::user()->role_obj->permission->contains('constant', 'access_dom') ||   
                Auth::user()->role_obj->permission->contains('constant', 'access_exploration_production') ||  
                Auth::user()->role_obj->permission->contains('constant', 'access_gas_operation') )
                  <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="3" required>
           @elseif(Auth::user()->role_obj->permission->contains('constant', 'access_hse') )
                  <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="4" required>                     
          @endif

      @elseif(Auth::user()->role_obj->role_name == 'Admin') 
                  <input type="text" class="form-control" placeholder="Type" name="type_id" id="type_id" value="5" required> 
      @endif

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Facility Type </button>
      </div>
</form>




  <script>
    $(function()
    {      
        $("#facTypeForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('facTypeForm', "{{url('/admin/addfacilitytype')}}", 'editfacilitytype');

            displayFacility_Type();
        });
    });        
  </script>