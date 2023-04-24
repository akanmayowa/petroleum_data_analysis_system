

<form id="" action="{{url('/gas/')}}" method="POST">
{{ csrf_field() }}

    @php 
        $one_com = \App\company::where('id', $GAS_EXP->equity_holder_id)->first();   
        $one_str = \App\Stream::where('id', $GAS_EXP->stream_id)->first(); 
        $one_pro = \App\down_product::where('id', $GAS_EXP->product_id)->first();  
    @endphp
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_EXP->id}}" disabled>  


            <div class="form-group row">
            <label for="year_expe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_expe" value="{{$GAS_EXP->year}}" disabled>
            </div>

            <label for="month_exp" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_exp" value="{{$GAS_EXP->month}}" disabled>
            </div>
        </div>


        <div class="form-group row">
            <label for="equity_holder_id" class="col-sm-2 col-form-label"> Equity Holder </label>
            <div class="col-sm-10">
                <select class="form-control" name="equity_holder_id" id="equity_holder_id" disabled>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value="">  </option> @endifndforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="stream_id" class="col-sm-2 col-form-label"> Terminal </label>
            <div class="col-sm-10">
                <select class="form-control" name="stream_id" id="stream_id" disabled>
                    @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> 
                    @else <option value="">  </option> @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
            <div class="col-sm-10">
                <select class="form-control" name="product_id" id="product_id" disabled>
                    @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> 
                    @else <option value="">  </option> @endif
                </select>
            </div>
        </div>

        
        <div class="form-group row">
            <label for="no_of_vessel" class="col-sm-2 col-form-label"> No of Vessel </label>
            <div class="col-sm-10">
                <input type="number" class="form-control rpro" placeholder="No of Vessel" name="no_of_vessel" id="no_of_vessel" value="{{$GAS_EXP->no_of_vessel}}" disabled="">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="volume" class="col-sm-2 col-form-label"> Volume (MT) </label>
            <div class="col-sm-10">
                <input type="number" class="form-control rpro" placeholder="Volume (MT)" name="volume" id="volume" value="{{$GAS_EXP->volume}}" disabled="">
            </div>
        </div>

         
          <div class="form-group row">
            <div class="col-sm-6 text-muted text-left">
                Uploaded @ {{\Carbon\Carbon::parse($GAS_EXP->created_at)->diffForHumans()}}
            </div>
            <div class="col-sm-6 text-muted text-right">
                Updated @ {{\Carbon\Carbon::parse($GAS_EXP->updated_at)->diffForHumans()}}
            </div>
          </div>
</form>



