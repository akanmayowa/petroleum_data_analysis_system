 <form id="depotForm" action="{{url('/downstream')}}" method="POST">
          @php  
            $one_sta = \App\down_outlet_states::where('id', $DEPOT->state_id)->first();          
            $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
            $one_own = \App\down_ownership::where('id', $DEPOT->ownership_id)->first();          
            $all_own= \App\down_ownership::orderBy('ownership_name', 'asc')->get(); 
            $one_pro = \App\down_import_product::where('id', $DEPOT->product_id)->first();              
            $all_pro = \App\down_import_product::orderBy('product_name', 'asc')->get();   
          @endphp
          {{ csrf_field() }}

          
            <input type="hidden" class="form-control" id="id" name="id" value="{{$DEPOT->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_depot">  


           

            <div class="form-group row">   
            <label for="year_jet" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_jet" value="{{$DEPOT->year}}" required="" readonly>
            </div>

            <label for="depot_name" class="col-sm-1 col-form-label"> Depot Name </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Depot Name" name="depot_name" id="depot_name" value="{{$DEPOT->depot_name}}" required="">
            </div>
         </div> 

          <div class="form-group row">   
            <label for="state_id" class="col-sm-1 col-form-label"> State </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @else <option value=""> Select State </option> @endif
                    @if(count($all_sta)>0)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-1 col-form-label"> Location </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$DEPOT->location}}" required="">
            </div>
         </div> 



         <div class="form-group row">
            <label for="ownership_id" class="col-sm-1 col-form-label"> Owner </label>
            <div class="col-sm-11">
                <select class="form-control" name="ownership_id" id="ownership_id" required>
                    @if($one_own) <option value="{{$one_own->id}}"> {{$one_own->ownership_name}} </option> @else <option value=""> Select Ownership </option> @endif
                    @if(count($all_own)>0)
                        @foreach($all_own as $all_own)
                            <option value="{{$all_own->id}}">{{$all_own->ownership_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


         <div class="form-group row">
            <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
            <div class="col-sm-11">
                <select class="form-control" name="product_id" id="product_id" required>
                    @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @else <option value=""> Select Product </option> @endif
                    @if(count($all_pro)>0)
                        @foreach($all_pro as $all_pro)
                            <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


          <div class="form-group row">
            <label for="design_capacity" class="col-sm-1 col-form-label"> Storage Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Storage Capacity MTPA" name="design_capacity" id="design_capacity" value="{{$DEPOT->design_capacity}}" required="">
            </div>
          </div>

          <div class="form-group row">
            <label for="truckout" class="col-sm-1 col-form-label"> Truckout Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Design Capacity MTPA" name="truckout" id="truckout"value="{{$DEPOT->truckout}}" required="">
            </div>
          </div> 


            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-primary" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Depot Details </button>
          </div>
</form>

<script>

    $(function()
    {
        $("#depotForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('depotForm', "{{url('/downstream')}}", 'edit_dep');

            displayPlantDepot();
        });
    });

    $('#year_jet').datepicker(
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