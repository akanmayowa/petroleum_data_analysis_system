          <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <select required class="select2 form-control" name="import_permit" > 
                     <option value="down_product_vol_import_permit">Import Permit Volume</option>
                     <option value="down_refinary_production">Actual Import Volume</option> 
                     <option value="down_refinery_production_volumes">Domestic Production</option> 
                    </select>
                  </div>
                </div>

                <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <b>Select Market Segment</b><br>
                    <select required class="select2 form-control" name="markets[]" id="markets"   >
                      <option>-Select Market -</option> 
                      @foreach($markets as $market)
                        <option value="{{$market->id}}">{{$market->market_segment_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


              <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <b>Select Product</b><br>
                    <select required class="select2 form-control" name="products[]" id="products" multiple >
                      <option>-Select Product -</option> 
                       @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <input type="hidden" value="productionProductBenchmark" name="type">

 