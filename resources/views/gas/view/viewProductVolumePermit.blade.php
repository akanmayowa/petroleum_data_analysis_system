
 <form id="" action="{{url('/downstream/add_product_volume_permit')}}" method="POST">
          @php 
            $one_com = \App\company::where('id', $GAS_IMP->company_id)->first();  
            $one_pro = \App\down_import_product::where('id', $GAS_IMP->product_id)->first();  
            $one_con = \App\Country::where('id', $GAS_IMP->country_id)->first();
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_IMP->id}}" disabled>
            <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit">  
                   


            <div class="form-group row">
                <label for="year_pvpe" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_pvpe" value="{{$GAS_IMP->year}}" disabled>
                </div>

                <label for="month_pvpe" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Month" name="month" id="month_pvpe" value="{{$GAS_IMP->month}}" disabled>
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
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control pvp" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no" value="{{$GAS_IMP->import_permit_no}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="issued_date" class="col-sm-2 col-form-label"> Issued Date </label>
                <div class="col-sm-4">
                    <input type="date" class="form-control pvp" placeholder="Permit Issued Date" name="issued_date" id="issued_date" value="{{$GAS_IMP->issued_date}}" disabled>
                </div>

                <label for="validity_period" class="col-sm-2 col-form-label"> Validity </label>
                <div class="col-sm-4">
                    <select class="form-control" name="validity_period" id="validity_period" disabled>
                        @if($GAS_IMP) <option value="{{$GAS_IMP->validity_period}}"> {{$GAS_IMP->validity_period}} </option> 
                        @else <option value="">  </option> @endif
                    </select>
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
                    <input type="text" class="form-control pvp" placeholder="Import Volume MT" name="volume" id="volume" value="{{$GAS_IMP->volume}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="country_id" class="col-sm-2 col-form-label"> Country </label>
                <div class="col-sm-10">
                    <select class="form-control" name="country_id" id="country_id" disabled>
                        @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->country_name}} </option> 
                        @else <option value="">  </option> @endif
                    </select>
                </div>
            </div>


         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_IMP->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_IMP->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


