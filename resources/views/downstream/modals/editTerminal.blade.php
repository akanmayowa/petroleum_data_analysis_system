 <form id="terminalForm" action="{{url('/downstream')}}" method="POST">
          @php  
            $one_sta = \App\down_outlet_states::where('id', $TERM->state_id)->first();         
            $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
            $one_own = \App\company::where('id', $TERM->ownership_id)->first();         
            $all_own= \App\company::orderBy('company_name', 'asc')->get(); 
            $one_pro = \App\down_import_product::where('id', $TERM->product_id)->first();             
            $all_pro = \App\down_import_product::orderBy('product_name', 'asc')->get();  
            $one_fac = \App\facility_type::where('id', $TERM->facility_type_id)->first();      
            $all_fac = \App\facility_type::orderBy('facility_type_name', 'asc')->get();    
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$TERM->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_terminal">  


           

            <div class="form-group row">   
            <label for="year_trm" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_trm" value="{{$TERM->year}}" required="" readonly>
            </div>

            <label for="terminal_name" class="col-sm-1 col-form-label"> Terminal Name </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Terminal Name" name="terminal_name" id="terminal_name" value="{{$TERM->terminal_name}}" required="">
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

            <label for="location" class="col-sm-1 col-form-label"> Coordinates </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location / Coordinates" name="location" id="location" value="{{$TERM->location}}" required="">
            </div>
         </div> 



         <div class="form-group row">
            <label for="facility_type_id" class="col-sm-1 col-form-label"> Facility Type</label>
            <div class="col-sm-5">
                <select class="form-control" name="facility_type_id" id="facility_type_id">
                    @if($one_fac) <option value="{{$one_fac->id}}"> {{$one_fac->facility_type_name}} </option> @else <option value=""> Select Facility Type </option> @endif
                    @if(count($all_fac)>0)
                        @foreach($all_fac as $all_fac)
                            <option value="{{$all_fac->id}}">{{$all_fac->facility_type_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="ownership_id" class="col-sm-1 col-form-label"> Owner </label>
            <div class="col-sm-5">
                <select class="form-control" name="ownership_id" id="ownership_id" required>
                    @if($one_own) <option value="{{$one_own->id}}"> {{$one_own->company_name}} </option> @else <option value=""> Select Ownership </option> @endif
                    @if(count($all_own)>0)
                        @foreach($all_own as $all_own)
                            <option value="{{$all_own->id}}">{{$all_own->company_name}}</option>
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
            <label for="design_capacity" class="col-sm-1 col-form-label"> Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Design Capacity MTPA" name="design_capacity" id="design_capacity" value="{{$TERM->design_capacity}}" required="">
            </div>
          </div> 


            

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-check" onclick="return confirm('Are you sure you want to UPDATE Details?')"></i> Update Terminal Details </button>
          </div>
</form>

<script>
    $(function()
    {
        $("#terminalForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('terminalForm', "{{url('/downstream')}}", 'edit_term');

            displayPlantTerminal();
        });
    });

    $('#year_trm').datepicker(
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