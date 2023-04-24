<form id="oepnAcreForm" action="{{url('/upstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_open_acreage">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
          

          <div class="form-group row">
            <label for="year_acre" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year_acre" value="{{$MANAGE->year}}" required readonly>
            </div>
          </div>


          <div class="form-group row">
            <label for="basin_id" class="col-sm-2 col-form-label"> Basin / Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="basin_id" id="basin_id" required>
                    @if($one_bas) <option value="{{$one_bas->id}}"> {{$one_bas->basin_name}} </option> 
                    @else<option></option>@endif
                    @if($all_bas)
                        @foreach($all_bas as $all_bas)
                            <option value="{{$all_bas->id}}"> {{$all_bas->basin_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="opl_blocks_allocated" class="col-sm-2 col-form-label"> OPL Blocks </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="OPL Blocks" name="opl_blocks_allocated" id="opl_blocks_allocated" value="{{$MANAGE->opl_blocks_allocated}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="oml_blocks_allocated" class="col-sm-2 col-form-label"> OML Blocks </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="OML Blocks" name="oml_blocks_allocated" id="oml_blocks_allocated" value="{{$MANAGE->oml_blocks_allocated}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="blocks_open" class="col-sm-2 col-form-label"> Open Blocks </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Open Blocks" name="blocks_open" id="blocks_open" value="{{$MANAGE->blocks_open}}" required>
            </div>
          </div>


                    
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_open_btn" id="add_open_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Open Acreage</button>
          </div>
          </form>






<script>    

    $(function()
    {    
        $("#oepnAcreForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('oepnAcreForm', "{{url('/upstream')}}", 'edit_open_acr');

            displayOpenAcreage();
        });


      $('#year_acre').datepicker(
      {
        format: "yyyy", 
        autoclose: true,
        viewMode: "years", 
        minViewMode: "years"
      });  

    });

</script>