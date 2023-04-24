 <form id="vessForm" action="{{url('/downstream')}}" method="POST">
          @php 
            $one_off = \App\down_field_office::where('id', $PRO_VOL_PERM_VESS->field_office_id)->first();   
            $all_off = \App\down_field_office::get(); 
            $one_pro = \App\down_import_product::where('id', $PRO_VOL_PERM_VESS->product_id)->first();   
            $one_all = \App\down_import_product::get();  
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$PRO_VOL_PERM_VESS->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit_vessel">  

       


            
            <div class="form-group row">
                <label for="depot_name" class="col-sm-2 col-form-label"> Depot Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Depot Name" name="depot_name" id="depot_name" value="{{$PRO_VOL_PERM_VESS->depot_name}}">
                </div>
            </div>


            <div class="form-group row">                
                <label for="field_office_id" class="col-sm-2 col-form-label"> Field Office </label>
                <div class="col-sm-10">
                    <select class="form-control" name="field_office_id" id="field_office_id" required>
                        @if($one_off) <option value="{{$one_off->id}}"> {{$one_off->field_office_name}} </option> @else <option value=""> Select Field Office </option> @endif
                        @if(count($all_off)>0)
                            @foreach($all_off as $all_off)
                                <option value="{{$all_off->id}}">{{$all_off->field_office_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


           <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Products </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id" required>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @endif
                        @if(count($one_all)>0)
                            @foreach($one_all as $one_all)
                                <option value="{{$one_all->id}}">{{$one_all->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control year" placeholder="" name="year" id="year" value="{{$PRO_VOL_PERM_VESS->year}}" required readonly>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="value" class="col-sm-2 col-form-label"> No of Liters </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="" name="value" id="value" onkeyup="checkValue(this)" value="{{$PRO_VOL_PERM_VESS->value}}">
                </div>
            </div>

            
            
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="update_vesse_btn" id="update_vesse_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Vessel Product </button>
          </div>
</form>

<script>
    $(function()
    {
        $("#vessForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('vessForm', "{{url('/downstream')}}", 'edit_imp_vessel');

            displayProductVolPermitVessel();
        });

         //compute TOTAL PRODUCT VOLs
        $(document).on("input",".vesse",function()
        {
           var total_vess = 0;
            $('.vesse').each(function()            
            {
                total_vess += parseFloat($(this).val());
            });
            $("#total_vesse").val(total_vess.toFixed(2));
        });




        $('.year').datepicker(
        {
            autoclose: true,
            startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })
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
</script>

