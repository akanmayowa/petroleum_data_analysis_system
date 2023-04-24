<form id="gasSuppForm" action="{{url('/gas')}}" method="POST">
{{ csrf_field() }}
      @php 
        $one_gas = \App\company::where('id', $GAS_PERF->company_id)->first();           
        $all_gas = \App\company::orderBy('company_name', 'asc')->get();  
      @endphp

        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS_PERF->id}}" required>
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_supply_performance">  


        <div class="form-group row">
            <label for="year_gs" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year" name="year" id="year_gs" value="{{$GAS_PERF->year}}" required="" readonly>
            </div>

            <label for="month_gs" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month" name="month" id="month_gs" value="{{$GAS_PERF->month}}" required="" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label for="company_id_sup" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_sup" required>
                    @if($one_gas) <option value="{{$one_gas->id}}"> {{$one_gas->company_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if($all_gas)
                        @foreach($all_gas as $all_gas)
                            <option value="{{$all_gas->id}}"> {{$all_gas->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          {{-- <div class="form-group row">
            <label for="year_gs" class="col-sm-2 col-form-label"> Year </label>

            <div class="col-sm-5">                
                <label class="container"> <span style="margin-left: 20px"> Individual Record </span>
                  <input type="radio" name="ind_tot" id="ind" value="1"> <span class="checkmark"></span>
                </label>
            </div>

            <div class="col-sm-5">      
                <label class="container"> <span style="margin-left: 20px"> Total Record </span>
                  <input type="radio" name="ind_tot" id="tot" value="2">  <span class="checkmark"></span>
                </label>
            </div>
          </div> --}}


            {{-- <div id="ind_divs">
                <div class="form-group row">
                    <label for="power" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" placeholder="Supplied to Commercials" name="power" id="power" onkeyup="checkValue(this)" value="{{$GAS_PERF->power}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="commercial" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" placeholder="Supplied to Commercials" name="commercial" id="commercial" onkeyup="checkValue(this)" value="{{$GAS_PERF->commercial}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="industry" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" placeholder="Supplied to Commercials" name="industry" id="industry" onkeyup="checkValue(this)" value="{{$GAS_PERF->industry}}">
                    </div>
                </div>
            </div> --}}


            <div id="tot_divs">
                <div class="form-group row">
                    <label for="total" class="col-sm-2 col-form-label"> Total Supplied </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" placeholder="" name="total" id="total" onkeyup="checkValue(this)" value="{{$GAS_PERF->total}}">
                    </div>
                </div>
            </div>


        
       
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-check" onclick="return confirm('Are you sure you want to UPDATE Details?')"></i> Update Gas Actual Supply </button>
      </div>
    </form>


<script>
    $(function()
    {  
        $("#gasSuppForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasSuppForm', "{{url('/gas')}}", 'editgas_supply');

            displayActualSupply();
        });


        //Hode show Individual or total div
        $('#inde').click(function()
        {
           $('#ind_divs').show();      $('#tot_divs').hide();           
        });
        $('#tota').click(function()
        {
           $('#tot_divs').show();      $('#ind_divs').hide();             
        });


        $('#year_gse').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_gse').datepicker(
        {
          autoclose: true, format: "MM",
          viewMode: "months", 
          minViewMode: "months"
        });

        //script to calculate average Gas Supply
        $('.supe').keyup(function()
        {
            var ave = 0; var perc = 0; var obli = 0;
            $('.supe').each(function()
            {
                ave += parseFloat($(this).val());
            });
            $("#average_supply_e").val(ave.toFixed(2));
            obli = $("#comp_obligation_e").val();

            perc = ((ave * 100)/ obli);
            $("#performance_percent_e").val(perc.toFixed(1));
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



<script>
    //AJAX SCRIPT TO GET DETAILS FOR 
    $(function()
      {
        $('#company_id_supe').change(function(e)
        { 
          var company_id = $(this).val();     var year = $('#year_g').val(); 
          formData={ company_id:company_id, year:year }
          $.get('{{url('getCompanyObligation')}}', formData, function(data)
          {  //success data
            $.each(data, function(index, obliObj)
            {
              $('#comp_obligation_e').val(obliObj.performance_obligation);   
              console.log(obliObj);
            });
          });       
        });


        $('#upd_gas_perf').mouseover(function(e)
        { 
          var company_id = $('#company_id_supe').val();     var year = $('#year_g').val(); 
          formData={ company_id:company_id, year:year }
          $.get('{{url('getCompanyObligation')}}', formData, function(data)
          {  //success data
            $.each(data, function(index, obliObj)
            {
              $('#comp_obligation_e').val(obliObj.performance_obligation);   
              console.log(obliObj);
            });
          });       
        });


        $('#upd_gas_perf').mouseout(function(e)
        { 
          var ave = 0; var perc = 0; var obli = 0;
            $('.supe').each(function()
            {
                ave += parseFloat($(this).val());
            });
            $("#average_supply_e").val(ave.toFixed(2));
            obli = $("#comp_obligation_e").val();

            perc = ((ave * 100)/ obli);
            $("#performance_percent_e").val(perc.toFixed(1));      
        });
      });
</script>