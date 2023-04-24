
<form id="" action="{{url('/economics/add_revenue_actual')}}" method="POST">
          {{ csrf_field() }}

            <input type="hidden" class="form-control" id="id" name="id" value="{{$REV_SUM->id}}" disabled>


           <div class="form-group row">
            <label for="year_r" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - (yyyy)" name="year" id="year_r" value="{{$REV_SUM->year}}" disabled>
            </div>

            <label for="month_r" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_r" value="{{$REV_SUM->month}}" disabled>
            </div>
          </div>                    

           
         <div class="form-group row">
            <label for="oil_actuale" class="col-sm-2 col-form-label"> Oil Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="oil_actual" id="oil_actuale" value="{{$REV_SUM->oil_actual}}" disabled>
            </div>

            <label for="gas_actuale" class="col-sm-2 col-form-label"> Gas Sales Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="gas_actual" id="gas_actuale" value="{{$REV_SUM->gas_actual}}" disabled>
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_flare_actuale" class="col-sm-2 col-form-label"> Flared Payment </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="gas_flare_actual" id="gas_flare_actuale" value="{{$REV_SUM->gas_flare_actual}}" disabled>
            </div>

            <label for="concession_actuale" class="col-sm-2 col-form-label"> Concession Rentals </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="concession_actual" id="concession_actuale" value="{{$REV_SUM->concession_actual}}" disabled>
            </div>
          </div>  


          <div class="form-group row">
            <label for="misc_actuale" class="col-sm-2 col-form-label"> MOR</label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="misc_actual" id="misc_actuale" value="{{$REV_SUM->misc_actual}}" disabled>
            </div>

            <label for="signature_bonus" class="col-sm-2 col-form-label"> Signature Bonus </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="signature_bonus" id="signature_bonus_" value="{{$REV_SUM->signature_bonus}}" disabled="">
            </div>
          </div> 



          <div class="form-group row">
            <label for="total_actuale" class="col-sm-2 col-form-label"> Total </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="total_actual" id="total_actuale" value="{{$REV_SUM->total_actual}}" readonly="" disabled>
            </div>
          </div> 

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($REV_SUM->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($REV_SUM->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>




