

<form id="" action="{{url('/economics/add_revenue_projected')}}" method="POST">
          {{ csrf_field() }}

            <input type="hidden" class="form-control" id="id" name="id" value="{{$REV_SUM->id}}" disabled>


           <div class="form-group row">
            <label for="year_reve" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year (yyyy)" name="year" id="year_reve" value="{{$REV_SUM->year}}" disabled>
            </div>
          </div>                    

           
         <div class="form-group row">
            <label for="oil_projectede" class="col-sm-2 col-form-label"> Oil Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="oil_projected" id="oil_projectede" value="{{$REV_SUM->oil_projected}}" disabled>
            </div>

            <label for="gas_projectede" class="col-sm-2 col-form-label"> Gas Sales Royalty </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="gas_projected" id="gas_projectede" value="{{$REV_SUM->gas_projected}}" disabled>
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_flare_projectede" class="col-sm-2 col-form-label"> Flared Payment </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="gas_flare_projected" id="gas_flare_projectede" value="{{$REV_SUM->gas_flare_projected}}" disabled>
            </div>

            <label for="concession_projectede" class="col-sm-2 col-form-label"> Concession Rentals </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="concession_projected" id="concession_projectede" value="{{$REV_SUM->concession_projected}}" disabled>
            </div>
          </div>  


          <div class="form-group row">
            <label for="misc_projectede" class="col-sm-2 col-form-label"> MOR </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control proj" name="misc_projected" id="misc_projectede" value="{{$REV_SUM->misc_projected}}" disabled>
            </div>

            <label for="signature_bonus" class="col-sm-2 col-form-label"> Signature Bonus </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control act" name="signature_bonus" id="signature_bonus_" value="{{$REV_SUM->signature_bonus}}" disabled="">
            </div>
          </div>



          <div class="form-group row">
            <label for="total_projectede" class="col-sm-2 col-form-label"> Total </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" name="total_projected" id="total_projectede" value="{{$REV_SUM->total_projected}}" readonly="" disabled>
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



