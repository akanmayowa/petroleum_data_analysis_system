 <form id="petPlantForm" action="{{url('/downstream')}}" method="POST">
          @php 
              $one_loc = \App\down_plant_location::where('id', $p_plants->plant_location)->first();                
              $all_loc = \App\down_plant_location::get(); 
              $one_own = \App\down_ownership::where('id', $p_plants->ownership)-> first();          
              $all_own = \App\down_ownership::get(); 
              $one_typ = \App\down_plant_type::where('id', $p_plants->plant_type)->first();                    
              $all_typ = \App\down_plant_type::get();               
              $one_fee = \App\down_feedstock::where('id', $p_plants->feedstock)-> first();         
              $all_fee = \App\down_feedstock::get(); 
              $one_pro = \App\down_product::where('id', $p_plants->products)-> first();            
              $all_pro = \App\down_product::get(); 
              $one_sta = \App\down_outlet_states::where('id', $p_plants->state_id)->first();           
              $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get(); 
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$p_plants->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_petrochemical_plant">  


           <div class="form-group row">
            <label for="plant_location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <select class="form-control" name="plant_location" id="plant_location" required>
                    @if($one_loc) <option value="{{$one_loc->id}}"> {{$one_loc->plant_location_name}} </option> @endif
                      @if(count($all_loc)>0)
                          @foreach($all_loc as $all_loc)
                              <option value="{{$all_loc->id}}">{{$all_loc->plant_location_name}}</option>
                          @endforeach
                      @endif
                </select>
            </div>
         </div> 


         <div class="form-group row">
            <label for="ownership" class="col-sm-2 col-form-label"> Ownership </label>
            <div class="col-sm-10">
                <select class="form-control" name="ownership" id="ownership" required>
                    @if($one_own) <option value="{{$one_own->id}}"> {{$one_own->ownership_name}} </option> @endif
                    @if(count($all_own)>0)
                        @foreach($all_own as $all_own)
                            <option value="{{$all_own->id}}">{{$all_own->ownership_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div>  

          <div class="form-group row">   
            <label for="state_id" class="col-sm-2 col-form-label"> State </label>
            <div class="col-sm-4">
                <select class="form-control" name="state_id" id="state_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @else <option value=""> Select State </option> @endif
                    @if(count($all_sta)>0)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$p_plants->location}}" required="">
            </div>
         </div>   


         <div class="form-group row">
            <label for="plant_type" class="col-sm-2 col-form-label"> Plant Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="plant_type" id="plant_type" required>
                    @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->plant_type_name}} </option> @endif
                    @if(count($all_typ)>0)
                        @foreach($all_typ as $all_typ)
                            <option value="{{$all_typ->id}}">{{$all_typ->plant_type_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 



          <div class="form-group row">
            <label for="plant_capacity" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Plant Capacity MTPA" name="plant_capacity" id="plant_capacity" value="{{$p_plants->plant_capacity}}" required="">
            </div>
          </div> 


         <div class="form-group row">
            <label for="feedstock" class="col-sm-2 col-form-label"> Feedstock </label>
            <div class="col-sm-10">
                <select class="form-control" name="feedstock" id="feedstock" required>
                    @if($one_fee) <option value="{{$one_fee->id}}"> {{$one_fee->feedstock_name}} </option> @endif
                    @if(count($all_fee)>0)
                        @foreach($all_fee as $all_fee)
                            <option value="{{$all_fee->id}}">{{$all_fee->feedstock_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div>  


         <div class="form-group row">
            <label for="products" class="col-sm-2 col-form-label"> Products </label>
            <div class="col-sm-10">
                <select class="form-control" name="products" id="products" required>
                    @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @endif
                    @if(count($all_pro)>0)
                        @foreach($all_pro as $all_pro)
                            <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Plant Details </button>
          </div>
</form>


<script>

    $(function()
    {
        $("#petPlantForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('petPlantForm', "{{url('/downstream')}}", 'edit_pet_plant');

            displayPlant();
        });


        $('#year_dest').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })
    });

</script>