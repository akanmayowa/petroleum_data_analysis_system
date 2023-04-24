
<form id="" action="{{url('/downstream/add_gad_actual_production')}}" method="POST">
          @php 
            $one_com = \App\company::where('id', $GAS_ACT->company_id)->first();   
            $one_pro = \App\down_import_product::where('id', $GAS_ACT->product_id)->first();   
            $one_sta = \App\down_outlet_states::where('id', $GAS_ACT->state_id)->first();  
          @endphp

            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_ACT->id}}" disabled>
            <input type="hidden" class="form-control" name="type" id="" value="add_gad_actual_production">  


           <div class="form-group row">
                <label for="year_acte" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_acte" value="{{$GAS_ACT->year}}" disabled>
                </div>

                <label for="month_acte" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Month" name="month" id="month_acte" value="{{$GAS_ACT->month}}" disabled>
                </div>
            </div>
                   


            <div class="form-group row">                
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id" disabled>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                        @else <option value="">  </option> @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="vessel_name" class="col-sm-2 col-form-label"> Vessel Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Vessel Name" name="vessel_name" id="vessel_name" value="{{$GAS_ACT->vessel_name}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no" value="{{$GAS_ACT->import_permit_no}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="state_id" class="col-sm-2 col-form-label"> State </label>
                <div class="col-sm-4">
                    <select class="form-control" name="state_id" id="state_id" disabled>
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> 
                        @else <option value="">  </option> @endif
                    </select>
                </div>

                <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone" value="{{$GAS_ACT->zone}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id" disabled>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> 
                        @else <option value="">  </option> @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label"> Import VOL (MT) </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Import Volume MT" name="volume" id="volume" value="{{$GAS_ACT->volume}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="date_discharged" class="col-sm-2 col-form-label"> Date of Discharged </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" placeholder="Date of Discharged Completed" name="date_discharged" id="date_discharged" value="{{$GAS_ACT->date_discharged}}" disabled>
                </div>
            </div>


         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_ACT->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_ACT->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


