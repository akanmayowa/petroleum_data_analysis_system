
 <form id="" action="{{url('/downstream')}}" method="POST">
          @php 
            $one_off = \App\down_field_office::where('id', $PRO_VOL_PERM_VESS->field_office_id)->first();   
            $all_off = \App\down_field_office::get(); 
            $one_pro = \App\down_import_product::where('id', $PRO_VOL_PERM_VESS->product_id)->first();   
            $one_all = \App\down_import_product::get();  
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$PRO_VOL_PERM_VESS->id}}" disabled>
       


            
            <div class="form-group row">
                <label for="depot_name" class="col-sm-2 col-form-label"> Depot Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Depot Name" name="depot_name" id="depot_name" value="{{$PRO_VOL_PERM_VESS->depot_name}}" disabled>
                </div>
            </div>

            <div class="form-group row">                
                <label for="field_office_id" class="col-sm-2 col-form-label"> Field Office </label>
                <div class="col-sm-10">
                    <select class="form-control" name="field_office_id" id="field_office_id" disabled>
                        @if($one_off) <option value="{{$one_off->id}}"> {{$one_off->field_office_name}} </option> @else <option value=""> Select Field Office </option> @endif
                    </select>
                </div>
            </div>


           <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Products </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id" disabled>
                        @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"> Date </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" placeholder="" name="year" id="year" value="{{$PRO_VOL_PERM_VESS->year}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="value" class="col-sm-2 col-form-label"> No of Liters </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="" name="value" id="value" onkeyup="checkValue(this)" value="{{$PRO_VOL_PERM_VESS->value}}" disabled>
                </div>
            </div>
            
         
          <div class="modal-footer">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($PRO_VOL_PERM_VESS->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($PRO_VOL_PERM_VESS->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>


