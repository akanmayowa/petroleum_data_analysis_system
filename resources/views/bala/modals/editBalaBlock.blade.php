 <form id="" action="{{url('/bala')}}" method="POST">
          <?php   $one_terr = \App\terrain::where('id', $B_Bloc_->terrain_id)->first();       $all_terr = \App\terrain::get();  ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$B_Bloc_->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_bala_aop">



          <div class="form-group row">
            <label for="terrain_id" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id" required>
                    @if($one_terr) <option value="{{$one_terr->id}}"> {{$one_terr->terrain_name}} </option> @endif
                    @if($all_terr)
                        @foreach($all_terr as $all_terr)
                            <option value="{{$all_terr->id}}"> {{$all_terr->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"> Year</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="year" id="year_e" value="{{$B_Bloc_->year}}" required>
                </div>
          </div>



          <div class="form-group row">
                <label for="opl_blocks_allocated" class="col-sm-2 col-form-label"> OPL Blocks Allocated </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control blocks" name="opl_blocks_allocated" id="opl_blocks_allocated_e" onkeyup="checktotal(this)" value="{{$B_Bloc_->opl_blocks_allocated}}" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="oml_blocks_allocated" class="col-sm-2 col-form-label"> OML Blocks Allocated </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control blocks" name="oml_blocks_allocated" id="oml_blocks_allocated_e" onkeyup="checktotal(this)" value="{{$B_Bloc_->oml_blocks_allocated}}" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="blocks_open" class="col-sm-2 col-form-label"> Blocks Open </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control blocks" name="blocks_open" id="blocks_open_e" onkeyup="checktotal(this)" value="{{$B_Bloc_->blocks_open}}" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="total_block" class="col-sm-2 col-form-label"> Total Blocks </label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" name="total_block" id="total_blocks" value="{{$B_Bloc_->total_block}}" readonly="" required>
                </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Blocks Info </button>
          </div>
</form>


<script type="text/javascript">

    //UPDATE WELL TOTAL
        function checktotal(field) 
        {  
            if (field.value == '') 
            {
                var fid = field.id;
                document.getElementById(fid).value = 0;
                //$('.amount').val(0);
            }         
        }

        $(function()
        {
            $('.blocks').keyup(function()
            {
                var total = 0;
                $('.blocks').each(function()            
                {
                    total += parseFloat($(this).val());
                });
                $("#total_blocks").val(total);
                console.log(total);
            });
        });


        $(function()
        { 

          $('#year_e').datepicker(
          {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
          });       

          $('#month').datepicker(
          {
            format: "M, yyyy",
            viewMode: "months", 
            minViewMode: "months"
          });

        })

</script>