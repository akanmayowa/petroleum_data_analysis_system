<form id="terrForm" action="{{url('/admin/add_terrain')}}" method="POST">
     {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{$terrain->id}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_terrain">

          <div class="form-group row">
                <label for="terrain_name" class="col-sm-2 col-form-label"> Terrain</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Terrain Name" name="terrain_name" id="terrain_name" value="{{$terrain->terrain_name}}" 
                    required>
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-primary" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Terrain</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#edit_terr").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('edit_terr', "{{url('/admin/add_terrain')}}", 'edituser');

            displayTerrain();
        });
    });        
  </script>