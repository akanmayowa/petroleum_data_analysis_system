<!-- Retail Outlets Count
Retail Outlets Capacity
Lubricant blending plant
Product Retail Price -->


          <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                <select required class="select2 form-control" name="product_retail" id="product_retail" > 
                     <option value="">- Select Criteria-</option>
                     <option value="down_retail_outlet_summary"> Retail Outlets Count</option>
                     <option value="down_outlet_storage_capacity">Retail Outlets Capacity</option>  
                    </select>
                  </div>
                </div>

                <div class="form-group row" > 
                  <div class="col-sm-12" style="width:100%">
                    <b>Select Market Segment</b><br>
                    <select required class="select2 form-control" name="markets[]" id="markets" >
                      <option value="">-Select Market -</option> 
                      @foreach($markets as $market)
                        <option value="{{$market->id}}">{{$market->market_segment_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              <div class="form-group row states"> 
                  <div class="col-sm-12" style="width:100%">
                    <b>Select State</b><br>
                    <select  class="select2 form-control" name="states[]" id="states" multiple >
                      <option value="">-Select State -</option> 
                       @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <input type="hidden" value="petroleumProductReporting" name="type">

