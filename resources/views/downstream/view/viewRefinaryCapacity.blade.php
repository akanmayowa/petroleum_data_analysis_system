

<form id="" action="{{url('/downstream/add_refinary_capacity')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_CAPACITY->id}}" disabled>


           <div class="form-group row">
            <label for="year_rce" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_rce" value="{{$REF_CAPACITY->year}}" disabled="">
            </div>

            <label for="refinery_ide" class="col-sm-2 col-form-label"> Refinery </label>
            <div class="col-sm-4">
                <select class="form-control" name="refinery_id" id="refinery_ide" disabled>
                    @if($one_ref) <option value="{{$one_ref->id}}"> {{$one_ref->plant_location_name}} </option> @endif
                </select>
            </div>
          </div>  

          {{-- <div class="form-group row">   
            <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
            <div class="col-sm-10">
                <select class="form-control" name="product_id" id="product_id" disabled>
                    @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @else <option value=""> Select Product </option> @endif
                </select>
            </div>
         </div>  

          <div class="form-group row">   
            <label for="state_id" class="col-sm-2 col-form-label"> State </label>
            <div class="col-sm-4">
                <select class="form-control" name="state_id" id="state_id" disabled>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @endif
                </select>
            </div>

            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$REF_CAPACITY->location}}" disabled="">
            </div>
         </div>  --}}                   
              
                 
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-2 col-form-label"> January </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="January" name="january" id="january_rce" disabled value="{{$REF_CAPACITY->january}}">
            </div>

            <label for="febuary_ce" class="col-sm-2 col-form-label"> February </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="February" name="febuary" id="febuary_rce" disabled value="{{$REF_CAPACITY->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-2 col-form-label"> March </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="March" name="march" id="march_rce" disabled value="{{$REF_CAPACITY->march}}">
            </div>

            <label for="april_ce" class="col-sm-2 col-form-label"> April </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="April" name="april" id="april_rce" disabled value="{{$REF_CAPACITY->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-2 col-form-label"> May </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="May" name="may" id="may_rce" disabled value="{{$REF_CAPACITY->may}}">
            </div>

            <label for="june_ce" class="col-sm-2 col-form-label"> June </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="June" name="june" id="june_rce" disabled value="{{$REF_CAPACITY->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-2 col-form-label"> July </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="July" name="july" id="july_rce" disabled value="{{$REF_CAPACITY->july}}">
            </div>

            <label for="august_ce" class="col-sm-2 col-form-label"> August </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="August" name="august" id="august_rce" disabled value="{{$REF_CAPACITY->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-2 col-form-label"> September </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="September" name="september" id="september_rce" disabled value="{{$REF_CAPACITY->september}}">
            </div>

            <label for="october_ce" class="col-sm-2 col-form-label"> October </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="October" name="october" id="october_rce" disabled value="{{$REF_CAPACITY->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-2 col-form-label"> November </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="November" name="november" id="november_rce" disabled value="{{$REF_CAPACITY->november}}">
            </div>

            <label for="december_ce" class="col-sm-2 col-form-label"> December </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="December" name="december" id="december_rce" disabled value="{{$REF_CAPACITY->december}}">
            </div>
          </div>       

          <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" step="0.01" class="form-control dsge" name="krpc" id="" value="{{$krpc->design_capacity}}" disabled="">
                <input type="hidden" step="0.01" class="form-control dsge" name="wrpc" id="" value="{{$wrpc->design_capacity}}" disabled="">
                <input type="hidden" step="0.01" class="form-control dsge" name="old_phrc" id="" value="{{$old_phrc->design_capacity}}" disabled="">
                <input type="hidden" step="0.01" class="form-control dsge" name="new_phrc" id="" value="{{$new_phrc->design_capacity}}" disabled="">
                <input type="hidden" step="0.01" class="form-control dsge" name="ndpr" id="" value="{{$ndpr->design_capacity}}" disabled="">
            </div>
          </div>      

          <div class="form-group row">
            <label for="december_ce" class="col-sm-2 col-form-label"> Total </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" name="total" id="total_rce" disabled="" value="{{$REF_CAPACITY->total}}">
            </div>

            <label for="december_ce" class="col-sm-2 col-form-label"> Design Capacity </label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" name="" id="" value="{{$ref_d_cap->value}}" disabled="">
            </div>
         </div>
         <div class="form-group row">
            <label for="total_utilizatione" class="col-sm-2 col-form-label"> Total Util</label>
            <div class="col-sm-4">
                <input type="text" step="0.01" class="form-control" name="total_utilization" id="total_utilizatione" disabled="" 
                value="{{$ref_d_cap->value - $REF_CAPACITY->total}}">
            </div>

            <label for="capacity_utilization_rce" class="col-sm-2 col-form-label"> Capacity Util %</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="capacity_utilization" id="capacity_utilization_rce" disabled="" value="{{$REF_CAPACITY->capacity_utilization}}%">
            </div>
          </div>   

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($REF_CAPACITY->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($REF_CAPACITY->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



