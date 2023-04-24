 <form id="editRefDetForm" action="{{url('/downstream')}}" method="POST">
      @php 
        $one_ref = \App\down_plant_location::where('id', $REF_PERF->refinery_id)-> first();     
        $all_ref = \App\down_plant_location::orderBy('plant_location_name', 'asc')->get();
      @endphp

      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_PERF->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_refinary_performance">  


       <div class="form-group row">
            <label for="year_rde" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_rde" value="{{$REF_PERF->year}}" required readonly>
            </div>
        </div>  


          <div class="form-group row"> 
            <label for="processing_unit" class="col-sm-2 col-form-label"> Processing Unit </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Processing Unit" name="processing_unit" id="processing_unit" value="{{$REF_PERF->processing_unit}}" required="">
            </div>
         </div> 
                
               

        <div class="form-group row">
            <label for="refinery_id_plt" class="col-sm-2 col-form-label"> Refinery </label>
            <div class="col-sm-10">
                <select class="form-control" name="refinery_id" id="refinery_id_plt" required>
                    @if($one_ref) <option value="{{$one_ref->id}}"> {{$one_ref->plant_location_name}} </option> @endif
                    @if(count($all_ref)>0)
                        @foreach($all_ref as $all_ref)
                            <option value="{{$all_ref->id}}">{{$all_ref->plant_location_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


          <div class="form-group row"> 
            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$REF_PERF->location}}">
            </div>
         </div>


          <div class="form-group row"> 
            <label for="value" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Capacity" name="value" id="value" value="{{$REF_PERF->value}}" required="">
            </div>
         </div> 

          

     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Refinery Details?')"> <i class="fa fa-check"></i> Update Refinery Details</button>
      </div>
</form>






<script>

    $(function()
    {
        $("#editRefDetForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('editRefDetForm', "{{url('/downstream')}}", 'edit_ref_performance');

            displayRefinaryPerformance();
        }); 


        $('#year_rde').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })
    });

</script>


<script type="text/javascript">
    $(function()
    {
        //script to calculate total crude export summary for edit
        $('.r_cape').keyup(function()
        {
            var total = 0;
            $('.r_cape').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_rce").val(total);
            console.log(total);
        });  

    });

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }


    //compute utilization percentage
    $(document).on("input",".r_cape",function()
    {
       var total_util = 0; var util_percent = 0;
        $('.dsge').each(function()            
        {
            total_util += parseFloat($(this).val());
        });
        $("#total_utilizatione").val(total_util);


        var util = 0; 
        var total_rc = parseFloat($('#total_rce').val());           
        var total_utilization = parseFloat($('#total_utilizatione').val());
        util = (( total_rc / total_utilization) * 100);

        //util_percent;
        $("#capacity_utilization_rce").val(util.toFixed(2)  + "%");
        console.log(util.toFixed(2)  + "%")
    });
</script>