
<form id="" action="{{url('/gas/add_retail_outlet_capacity')}}" method="POST">
          <?php 
            $one_sta = \App\down_outlet_states::where('id', $OUT_CAPACITY->state_id)->first();  
            $one_typ = \App\gas_product_type::where('id', $OUT_CAPACITY->product_type_id)->first();   
            $one_com = \App\company::where('id', $OUT_CAPACITY->company_id)->first();  
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$OUT_CAPACITY->id}}" disabled>


           <div class="form-group row">
                <label for="year_cap" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" placeholder="YYYY Year" name="year" id="year_cape" value="{{$OUT_CAPACITY->year}}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="state_id_cape" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_cape" disabled>
                        @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @else <option value=""> N/A </option> @endif
                    </select>
                </div>                

                <label for="product_type_id" class="col-sm-1 col-form-label"> Type </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_type_id" id="product_type_id" disabled>
                        @if($one_typ) <option value="{{$one_typ->id}}"> {{$one_typ->product_type_name}} </option> @else <option value=""> N/A </option> @endif
                    </select>
                </div>
            </div>     

            <div class="form-group row">    
                <label for="company_id_cap" class="col-sm-1 col-form-label"> Company </label>
                <div class="col-sm-5">
                    <select class="form-control" name="company_id" id="company_id_cap" disabled>
                        @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> N/A </option> @endif 
                    </select>
                </div>

                <label for="capacity" class="col-sm-1 col-form-label"> Capacity </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" placeholder="Capacity in Litres" name="capacity" id="capacity" value="{{$OUT_CAPACITY->capacity}}" disabled>
                </div>
            </div>     
  
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
                <label for="january_out" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="january" id="january_cape" value="{{$OUT_CAPACITY->january}}" disabled>
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="February" id="febuary_cape" value="{{$OUT_CAPACITY->febuary}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="march" id="march_cape" value="{{$OUT_CAPACITY->march}}" disabled>
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="april" id="april_cape" value="{{$OUT_CAPACITY->april}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="may" id="may_cape" value="{{$OUT_CAPACITY->may}}" disabled>
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="june" id="june_cape" value="{{$OUT_CAPACITY->june}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="july" id="july_cape" value="{{$OUT_CAPACITY->july}}" disabled>
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="august" id="august_cape" value="{{$OUT_CAPACITY->august}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="september" id="september_cape" value="{{$OUT_CAPACITY->september}}" disabled>
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="october" id="october_cape" value="{{$OUT_CAPACITY->october}}" disabled>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="november" id="november_cape" value="{{$OUT_CAPACITY->november}}" disabled>
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control cape" placeholder="" name="december" id="december_cape" value="{{$OUT_CAPACITY->december}}" disabled>
                </div>
            </div>            
            

            
            <div class="form-group row">
                <label for="december_rpro" class="col-sm-1 col-form-label"> Total </label>
                <div class="col-sm-11">
                    <input type="text" step="0.01" class="form-control" placeholder="Total" name="total" id="total_cape" value="{{$OUT_CAPACITY->total}}" required="" disabled="">
                </div>
            </div>


         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($OUT_CAPACITY->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($OUT_CAPACITY->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



