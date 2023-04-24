<form id="" action="{{url('/transport/add_technology')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$TECH->id}}" disabled>

        @php 
            $one_loc = \App\field::where('id', $TECH->location_id)->first();     
            $one_com = \App\company::where('id', $TECH->company_id)->first();            
            $one_sta = \App\es_project_status::where('id', $TECH->status)->first();   
        @endphp


        

        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year" value="{{$TECH->year}}" disabled>
            </div>
        </div>    

        <div class="form-group row">
            <label for="technology" class="col-sm-2 col-form-label"> Technology </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Technology" name="technology" id="technology" value="{{$TECH->technology}}" disabled="">
            </div>
        </div> 


        <div class="form-group row">
            <label for="application" class="col-sm-2 col-form-label"> Application </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Application" name="application" id="application" value="{{$TECH->application}}" disabled="">
            </div>
        </div> 
          

        <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company" name="company_id" id="company_id" value="{{$TECH->company_id}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Location" name="location_id" id="location_id" value="{{$TECH->location_id}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="adoptation_date_ted" class="col-sm-2 col-form-label"> Approved Date </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Approved Date" name="adoptation_date" id="adoptation_date_ted" value="{{$TECH->adoptation_date}}" disabled="" readonly="">
            </div>

            <label for="status_" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Status" name="status_id" id="status" value="{{$TECH->status}}" disabled>
            </div>
        </div> 

          <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark" disabled="">{{$TECH->remark}}</textarea>
            </div>
          </div>



        <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($TECH->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($TECH->updated_at)->diffForHumans()}}
            </div>
        </div>


    </form>
