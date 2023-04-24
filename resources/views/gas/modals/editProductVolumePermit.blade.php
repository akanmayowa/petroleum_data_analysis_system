 <form id="gasVolPermForm" action="{{url('/gas')}}" method="POST">
          @php 
            $one_com = \App\company::where('id', $GAS_IMP->company_id)->first();   
            $all_com = \App\company::orderBy('company_name', 'asc')->get(); 
            $one_pro = \App\down_import_product::where('id', $GAS_IMP->product_id)->first();   
            $all_pro = \App\down_import_product::orderBy('product_name', 'asc')->get(); 
            $one_con = \App\Country::where('id', $GAS_IMP->country_id)->first();   
            $all_con = \App\Country::orderBy('country_name', 'asc')->get();  
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_IMP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit">  
                   


            <div class="form-group row">
                <label for="year_pvpe" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_pvpe" value="{{$GAS_IMP->year}}" required="" readonly>
                </div>

                <label for="month_pvpe" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Month" name="month" id="month_pvpe" value="{{$GAS_IMP->month}}" required="" readonly>
                </div>
            </div>
                   


            <div class="form-group row">                
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id" required>
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
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control pvp" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no" value="{{$GAS_IMP->import_permit_no}}">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="issued_date" class="col-sm-2 col-form-label"> Issued Date </label>
                <div class="col-sm-4">
                    <input type="date" class="form-control pvp" placeholder="Permit Issued Date" name="issued_date" id="issued_date" value="{{$GAS_IMP->issued_date}}" required>
                </div>

                <label for="validity_period" class="col-sm-2 col-form-label"> Validity </label>
                <div class="col-sm-4">
                    <select class="form-control" name="validity_period" id="validity_period" required>
                        @if($GAS_IMP) <option value="{{$GAS_IMP->validity_period}}"> {{$GAS_IMP->validity_period}} </option> 
                        @else <option value="">  </option> @endif
                        <option value="30 Days"> One Month - 30 Days </option>
                        <option value="90 Days"> Three Month - 90 Days </option>
                        <option value="180 Days"> Six Month - 180 Days</option>
                    </select>
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
                    <input type="number" class="form-control pvp" placeholder="Import Volume MT" name="volume" id="volume" value="{{$GAS_IMP->volume}}" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="country_id" class="col-sm-2 col-form-label"> Country </label>
                <div class="col-sm-10">
                    <select class="form-control" name="country_id" id="country_id">
                        @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->country_name}} </option> 
                        @else <option value="">  </option> @endif
                        @if(count($all_con)>0)
                            @foreach($all_con as $all_con)
                                <option value="{{$all_con->id}}">{{$all_con->country_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
       




         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="update_pvpe_btn" id="update_pvpe_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Import Permit </button>
          </div>
</form>

<script>
    $(function()
    {   
        $("#gasVolPermForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasVolPermForm', "{{url('/gas')}}", 'edit_prod_vol_permit');

            displayProductVolPermit();
        });




        $('#year_pvpe').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      })
        $('#month_pvpe').datepicker(
        {
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });
    });
</script>

