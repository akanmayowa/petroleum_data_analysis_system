 <form id="lubePlantForm" action="{{url('/downstream')}}" method="POST">
          @php  
            $one_cat = \App\down_market_segment::where('id', $LIC_MAK->market_category_id)->first();        
            $all_cat = \App\down_market_segment::where('id', '>', 1)->where('id', '<', 6)->orderBy('market_segment_name', 'asc')->get();
            $one_com = \App\company::where('id', $LIC_MAK->company_id)->first();                      
            $all_com = \App\company::orderBy('company_name', 'asc')->get(); 
            $one_loc = \App\down_storage_location::where('id', $LIC_MAK->product_id)->first();      
            $all_loc = \App\down_storage_location::orderBy('location_name', 'asc')->get();   
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$LIC_MAK->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_license_marketer_storage">  


           

            <div class="form-group row">
                <label for="year_oils" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year - yyyy" name="year" id="year_oils" value="{{$LIC_MAK->year}}" required="" readonly>
                </div>
            </div>

           <div class="form-group row">
                <label for="market_category_id" class="col-sm-2 col-form-label"> Market Segment </label>
                <div class="col-sm-10">
                    <select class="form-control" name="market_category_id" id="market_category_id" required>
                        @if($one_cat) <option value="{{$one_cat->id}}"> {{$one_cat->market_segment_name}} </option> @endif
                        @if(count($all_cat)>0)
                            @foreach($all_cat as $all_cat)
                                <option value="{{$all_cat->id}}">{{$all_cat->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="company_id_mak" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id_mak" required>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                        @if(count($all_com)>0)
                            @foreach($all_com as $all_com)
                                <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="location_id_mak" class="col-sm-2 col-form-label"> Location</label>
                <div class="col-sm-10">                    
                    <input type="text" class="form-control" name="location_id" id="location_id_mak" value="{{$LIC_MAK->location_id}}" required="">
                </div>
            </div>

            <div class="form-group row">
                <label for="value" class="col-sm-2 col-form-label"> Storage Capacity </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="storage_capacity" id="storage_capacity" value="{{$LIC_MAK->storage_capacity}}" onkeyup="checkValue(this)" required="">
                </div>
            </div>


            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="update_mak_btn" id="update_mak_btn" class="btn btn-dark"> <i class="fa fa-check"></i> Update License Marketer </button>
          </div>
</form>

<script>

    $(function()
    {        
        $("#lubePlantForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('lubePlantForm', "{{url('/downstream')}}", 'edit_license_marketer');

            displayLicenseMarketer();
        });        
    });


    $('#year_oils').datepicker(
    {
        autoclose: true,startView: 'decade',format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    })

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