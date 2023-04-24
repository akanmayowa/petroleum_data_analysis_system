<form id="gasObliForm" action="{{url('/gas')}}" method="POST">
          @php $one_gas = \App\company::where('id', $GAS_PERF_->company_id)->first();     $all_gas = \App\company::orderBy('company_name', 'asc')->get();  @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PERF_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_supply_obligation">  


            <div class="form-group row">
                <label for="year_ob" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="year" id="year_ob" value="{{$GAS_PERF_->year}}" required="" readonly>
                </div>
            </div>

            
            <div class="form-group row">
            <label for="company_id_sup" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_sup" required>
                    @if($one_gas) <option value="{{$one_gas->id}}"> {{$one_gas->company_name}} </option>
                    @else <option> </option> @endif
                    @if($all_gas)
                        @foreach($all_gas as $all_gas)
                            <option value="{{$all_gas->id}}"> {{$all_gas->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


        <div class="form-group row">
            <label for="performance_obligation" class="col-sm-2 col-form-label"> Obligation </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Obligation" name="performance_obligation" id="performance_obligation" onkeyup="checkValue(this)" value="{{$GAS_PERF_->performance_obligation}}">
            </div>
        </div> 


           
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Gas Obligation </button>
          </div>
          </form>


<script>
    $(function()
    { 
        $("#gasObliForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasObliForm', "{{url('/gas')}}", 'editgas_obli');

            displayObligation();
            
        });


        $('#year_ob').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

        //script to calculate total gas_supply utilized
        $('.edit_g').keyup(function()
        {
            var tot_gas_sup = 0;
            $('.edit_g').each(function()            
            {
                tot_gas_sup += parseFloat($(this).val());
            });
            $("#total_sup").val(tot_gas_sup);
            console.log(tot_gas_sup);
        });

    });

    //setting all values to default 0
    function check_Value(field) 
    {  //alert();
        if(field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;  //alert(f_id);
        }
    }
</script>