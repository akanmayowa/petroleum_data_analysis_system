 <form id="gasActImpForm" action="{{url('/gas')}}" method="POST">
    {{ csrf_field() }}

          @php 
            $one_com = \App\company::where('id', $GAS_ACT->company_id)->first();   
            $all_com = \App\company::orderBy('company_name', 'asc')->get(); 
            $one_pro = \App\down_import_product::where('id', $GAS_ACT->product_id)->first();   
            $all_pro = \App\down_import_product::orderBy('product_name', 'asc')->get(); 
            $one_sta = \App\down_outlet_states::where('id', $GAS_ACT->state_id)->first();   
            $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();  
          @endphp

            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_ACT->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_refinery_production">  


           <div class="form-group row">
                <label for="year_acte" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_acte" value="{{$GAS_ACT->year}}" required="" readonly>
                </div>

                <label for="month_acte" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Month" name="month" id="month_acte" value="{{$GAS_ACT->month}}" readonly>
                </div>
            </div>
                   


            <div class="form-group row">                
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id">
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if(count($all_com)>0)
                            @foreach($all_com as $all_com)
                                <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="vessel_name" class="col-sm-2 col-form-label"> Vessel Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Vessel Name" name="vessel_name" id="vessel_name" value="{{$GAS_ACT->vessel_name}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no" value="{{$GAS_ACT->import_permit_no}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="state_id" class="col-sm-2 col-form-label"> State </label>
                <div class="col-sm-4">
                    <select class="form-control" name="state_id" id="state_id">
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if(count($all_sta)>0)
                            @foreach($all_sta as $all_sta)
                                <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone" value="{{$GAS_ACT->zone}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id">
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if(count($all_pro)>0)
                            @foreach($all_pro as $all_pro)
                                <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label"> Import VOL (MT) </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Import Volume MT" name="volume" id="volume" value="{{$GAS_ACT->volume}}" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="date_discharged" class="col-sm-2 col-form-label"> Date of Discharged </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" placeholder="Date of Discharged Completed" name="date_discharged" id="date_discharged" value="{{$GAS_ACT->date_discharged}}">
                </div>
            </div>


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Actual Import </button>
          </div>
</form>

<script>
    $(function()
    { 
        $("#gasActImpForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasActImpForm', "{{url('/gas')}}", 'edit_ref_production');

            displayRefineryProd();
        });


        $('#year_acte').datepicker(
        {
            autoclose: true,
            startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });

        $('#month_acte').datepicker(
        {
          autoclose: true,
          format: "MM", 
          viewMode: "months", 
          minViewMode: "months"
        });
 

    });

</script> 