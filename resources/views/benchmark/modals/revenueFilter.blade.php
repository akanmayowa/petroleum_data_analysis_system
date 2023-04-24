    <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <select required="" class="select2RevenueType form-control" name="revenueType[]" multiple tag='true'> 
                      <option value="eco_revenue_actual">Actual</option>
                      <option value="eco_revenue_projected">Projected</option>

                    </select>
                  </div>
                </div>

                <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <select class="select2 form-control" name="criterias[]" multiple tag='true'> 
                      @foreach($criterias as $key=>$criteria)
                      <option value="{{$key}}">{{$criteria}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <input type="hidden" value="revenueBenchmark" name="type">

