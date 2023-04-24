<form id="priRangeForm" action="{{url('/downstream')}}" method="POST">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$APR_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_prod_ave_price_range">  
              

          <div class="form-group row">
            <label for="year_aveE" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - yyyy" name="year" id="year_aveE" value="{{$APR_->year}}"  readonly>
            </div>

            <label for="month_aveE" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_aveE" value="{{$APR_->mmonth}}"  readonly>
            </div>
          </div>  


          <div class="form-group row">
            <label for="production_type" class="col-sm-2 col-form-label"> Market Segment </label>
            <div class="col-sm-10">
                <select class="form-control" name="production_type" id="production_type" required="true">
                    @if($one_seg) <option value="{{$one_seg->id}}"> {{$one_seg->market_segment_name}} </option> 
                    @else <option value="">  </option> @endif
                        @if(count($all_seg)>0)
                            @foreach($all_seg as $all_seg)
                                <option value="{{$all_seg->id}}">{{$all_seg->market_segment_name}}</option>
                            @endforeach
                        @endif
                </select>
            </div>
          </div>         

          <div class="form-group row">
            <label for="pms_from_e" class="col-sm-2 col-form-label"> PMS </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="pms" id="pms_e" value="{{$APR_->pms}}">
           </div>

            <label for="pms_to_e" class="col-sm-2 col-form-label"> PMS To </label>
           <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="pms_to" id="pms_to_e" value="{{$APR_->pms_to}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="ago_from" class="col-sm-2 col-form-label"> AGO </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="ago" id="ago_e" value="{{$APR_->ago}}">
            </div>

            <label for="ago_to_e" class="col-sm-2 col-form-label"> AGO To </label>
           <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="ago_to" id="ago_to_e" value="{{$APR_->ago_to}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="dpk_from" class="col-sm-2 col-form-label"> DPK </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control"  name="dpk" id="dpk_e" value="{{$APR_->dpk}}">
            </div>

            <label for="dpk_to_e" class="col-sm-2 col-form-label"> DPK To </label>
           <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" name="dpk_to" id="dpk_to_e" value="{{$APR_->dpk_to}}">
            </div>
          </div>      

     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Ave Price Range </button>
      </div>
</form>




<script>

    $(function()
    {
        $("#priRangeForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('priRangeForm', "{{url('/downstream')}}", 'editave_price_range');

            displayProductRetailPrice();
        });


        $('#year_aveE').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });
        $('#month_aveE').datepicker(
        {
            autoclose: true, 
            format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        });



        // var pms = "{{$APR_->pms}}";
        // var pms_data = pms.split(" ");  
        // $('#pms_from_e').val(pms_data[0]);
        // $('#pms_to_e').val(pms_data[2]);

        // var ago = "{{$APR_->ago}}";
        // var ago_data = ago.split(" ");  
        // $('#ago_from_e').val(ago_data[0]);
        // $('#ago_to_e').val(ago_data[2]);

        // var dpk = "{{$APR_->dpk}}";
        // var dpk_data = dpk.split(" ");  
        // $('#dpk_from_e').val(dpk_data[0]);
        // $('#dpk_to_e').val(dpk_data[2]);

        

    });

</script>