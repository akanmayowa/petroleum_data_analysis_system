<form id="gasExpVolVessForm" action="{{url('/gas/')}}" method="POST">
    @csrf

    @php 
        $one_com = \App\company::where('id', $GAS_EXP->equity_holder_id)->first();           
        $all_com = \App\company::orderBy('company_name', 'asc')->where('id', '14')->orwhere('id', '89')->orwhere('id', '91')->get(); 
        $one_str = \App\Stream::where('id', $GAS_EXP->stream_id)->first();           
        $all_str = \App\Stream::where('id', '34')->orwhere('id', '7')->orwhere('id', '39')->orwhere('id', '44')->orwhere('id', '62')->orderBy('stream_name', 'asc')->get();
        $one_pro = \App\down_product::where('id', $GAS_EXP->product_id)->first();           
        $all_pro = \App\down_product::orderBy('product_name', 'asc')->where('id', '>=', '16')->where('id', '<=', '22')->get(); 
    @endphp

        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_EXP->id}}" required>
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_export_volume_vessel">  




        <div class="form-group row">
            <label for="year_expe" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_expe" value="{{$GAS_EXP->year}}" required="" readonly>
            </div>

            <label for="month_expe" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_expe" value="{{$GAS_EXP->month}}" required="" readonly>
            </div>
        </div>


        <div class="form-group row">
            <label for="equity_holder_id" class="col-sm-2 col-form-label"> Equity Holder </label>
            <div class="col-sm-10">         
                <input type="text" class="form-control" placeholder="Equity Holder" name="equity_holder_id" id="equity_holder_id" value="{{$GAS_EXP->equity_holder_id}}" required>
                {{-- <select class="form-control" name="equity_holder_id" id="equity_holder_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select> --}}
            </div>
        </div>


        <div class="form-group row">
            <label for="stream_id" class="col-sm-2 col-form-label"> Terminal </label>
            <div class="col-sm-10">
                <select class="form-control" name="stream_id" id="stream_id" required>
                    @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if(count($all_str)>0)
                        @foreach($all_str as $all_str)
                            <option value="{{$all_str->id}}">{{$all_str->stream_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
            <div class="col-sm-10">
                <select class="form-control" name="product_id" id="product_id" required>
                    @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if(count($all_pro)>0)
                        @foreach($all_pro as $all_pro)
                            <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        
        <div class="form-group row">
            <label for="no_of_vessel" class="col-sm-2 col-form-label"> No of Vessel </label>
            <div class="col-sm-10">
                <input type="number" class="form-control rpro" placeholder="No of Vessel" name="no_of_vessel" id="no_of_vessel" value="{{$GAS_EXP->no_of_vessel}}">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="volume" class="col-sm-2 col-form-label"> Volume (MT) </label>
            <div class="col-sm-10">
                <input type="number" class="form-control rpro" placeholder="Volume (MT)" name="volume" id="volume" value="{{$GAS_EXP->volume}}" required="">
            </div>
        </div>


    

       
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Export </button>
      </div>
    </form>


<script>
    $(function()
    { 
        $("#gasExpVolVessForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasExpVolVessForm', "{{url('/gas/')}}", 'edit_gas_exp');

            displayGasExport();
        });


        $('#year_expe').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        $('#month_expe').datepicker(
        {
          format: "MM", autoclose: true,
          viewMode: "months", 
          minViewMode: "months"
        });
    });

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
        }
    }
</script>


