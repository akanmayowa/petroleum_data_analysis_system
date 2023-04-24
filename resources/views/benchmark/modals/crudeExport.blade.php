
    

                <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <select required class="select2 form-control" name="crude_export" id="crude_export"> 
                     <option value="down_crude_export_by_destination">Export By Destination</option>
                     <option value="down_crude_export_by_company">Export By Company</option>
                     <option value="down_monthly_summary_crude_export">Export By Stream</option>

                    </select>
                  </div>
                </div>

                <div class="form-group row"> 
                  <div class="col-sm-12" style="width:100%">
                    <select required class="select2 form-control" name="criterials[]" id="select2Criterials" multiple > 
                    </select>
                  </div>
                </div>
                <input type="hidden" value="crudeExportBenchmark" name="type">

 