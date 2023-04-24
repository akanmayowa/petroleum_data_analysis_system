 <form id="upCrudeProdForm" action="{{url('/upstream')}}" method="POST">
          @php 
                $one_com = \App\company::where('id', $CRU_PROD_->company_id)->first();             
                $all_com = \App\company::orderBy('company_name', 'asc')->get();
                $one_fie = \App\field::where('id', $CRU_PROD_->field_id)->first();             
                $all_fie = \App\field::orderBy('field_name', 'asc')->get();
                $one_ter = \App\terrain::where('id', $CRU_PROD_->terrain_id)->first();             
                $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
                $one_con = \App\contract::where('id', $CRU_PROD_->contract_id)->first();             
                $all_con = \App\contract::orderBy('contract_name', 'asc')->get();
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$CRU_PROD_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_crude_production">



           <div class="form-group row">
            <label for="field_id_cpe" class="col-sm-1 col-form-label"> Fields </label>
            <div class="col-sm-5">
                <select class="form-control" name="field_id" id="field_id_cpe" required>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @else <option value="">  </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="year_pcpe" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Crude Production Year" name="year" id="year_pcpe" value="{{$CRU_PROD_->year}}" required="" readonly="">
            </div>
          </div>

           <div class="form-group row">
            <label for="company_id_cpe" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-11">
                <select class="form-control" name="company_id" id="company_id_cpe" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value="">  </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


           <div class="form-group row">
            <label for="terrain_id_cpe" class="col-sm-1 col-form-label"> Terrain </label>
            <div class="col-sm-5">
                <select class="form-control" name="terrain_id" id="terrain_id_cpe" required>
                    @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option value=""> Select Terrain</option> @endif
                    @if($all_ter)
                        @foreach($all_ter as $all_ter)
                            <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>            

            <label for="contract_id_cpe" class="col-sm-1 col-form-label"> Contract </label>
            <div class="col-sm-5">
                <select class="form-control" name="contract_id" id="contract_id_cpe" required>
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->contract_name}} </option> @else <option value=""> Select Contract</option> @endif
                    @if($all_con )
                        @foreach($all_con  as $all_con )
                            <option value="{{$all_con ->id}}"> {{$all_con ->contract_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
                {{-- <input type="hidden" class="form-control" placeholder="Company" name="company_id" id="company_id_cpe" value="{{$CRU_PROD_->company_id}}" readonly=""> --}}
                {{-- <input type="hidden" class="form-control" placeholder="Contract" name="contract_id" id="contract_id_cpe" value="{{$CRU_PROD_->contract_id}}" readonly=""> --}}
            </div>
          </div>



          <div class="form-group row">
            <label for="january_pcpe" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="january" id="january_pcpe" value="{{$CRU_PROD_->january}}" onkeyup="checktotal(this)" required>
            </div>

            <label for="febuary_pcpe" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="febuary" id="febuary_pcpe" value="{{$CRU_PROD_->febuary}}" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="march_pcpe" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="march" id="march_pcpe" value="{{$CRU_PROD_->march}}" onkeyup="checktotal(this)" required>
            </div>

            <label for="april_pcpe" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="april" id="april_pcpe" value="{{$CRU_PROD_->april}}" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="may_pcpe" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="may" id="may_pcpe" value="{{$CRU_PROD_->may}}" onkeyup="checktotal(this)" required>
            </div>

            <label for="june_pcpe" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="june" id="june_pcpe" value="{{$CRU_PROD_->june}}" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="july_pcpe" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="july" id="july_pcpe" value="{{$CRU_PROD_->july}}" onkeyup="checktotal(this)" required>
            </div>

            <label for="august_pcpe" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="august" id="august_pcpe" value="{{$CRU_PROD_->august}}" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="september_pcpe" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="september" id="september_pcpe" value="{{$CRU_PROD_->september}}" onkeyup="checktotal(this)" required>
            </div>

            <label for="october_pcpe" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="october" id="october_pcpe" value="{{$CRU_PROD_->october}}" onkeyup="checktotal(this)" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="november_pcpe" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="november" id="november_pcpe" value="{{$CRU_PROD_->november}}" onkeyup="checktotal(this)" required>
            </div>

            <label for="december_pcpe" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control pcpe" name="december" id="december_pcpe" value="{{$CRU_PROD_->december}}" onkeyup="checktotal(this)" required>
            </div>
          </div>





         

          <div class="form-group row" style="display: none;">
            <label for="company_total" class="col-sm-1 col-form-label"> Total (Bbls)</label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="company_total" id="company_totale" value="{{$CRU_PROD_->company_total}}" readonly="">
            </div>

            <label for="average_production" class="col-sm-1 col-form-label"> Average (BOPD) </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="average_production" id="average_productione" value="{{$CRU_PROD_->average_production}}" readonly="">
            </div>

            <label for="percentage_production" class="col-sm-1 col-form-label"> % Prod </label>
            <div class="col-sm-3">
                <input type="number" step="0.01" class="form-control" name="percentage_production" id="percentage_productione" value="{{$CRU_PROD_->percentage_production}}" readonly="">
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Crude Production </button>
          </div>
</form>









<script>
      
    $(function()
    {         
        $("#upCrudeProdForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('upCrudeProdForm', "{{url('/upstream')}}", 'editcrude_prod');

            displayCrudeProd();
        });
    });
    //UPDATE WELL TOTAL
        function checktotal(field) 
        {  
            if (field.value == '') 
            {
                var fid = field.id;
                document.getElementById(fid).value = 0;
                //$('.amount').val(0);
            }         
        }

        $(function()
        {

            $('#year_pcpe').datepicker(
            {
              format: "yyyy",
              viewMode: "years", 
              minViewMode: "years"
            });

            $('.pcpe').keyup(function()
            {  
                var total_pcpe = 0;
                $('.pcpe').each(function()            
                {
                    total_pcpe += parseFloat($(this).val());
                });

                $("#company_totale").val(total_pcpe.toFixed(2));

                //function to check if a year is leap year.
                var yrs = $('#year_pcp').val();   var yr = '0000'; var ave_prod = 0;
                if ((yrs % 4 == 0) && (yrs % 100 != 0)) { yr = 366; } else { yr = 366; }
                ave_prod = (total_pcpe / yr);

                $("#average_productione").val(Math.round(ave_prod));
            });
        });

</script>


<!-- AJAX DEPENDENCIES -->
<script type="text/javascript">
    $(function()
    {
        //Appending Company, contract and terrain Facility For Crude Production
        $('#field_id_cpe').change(function(e)
        { 
            var id = $(this).val();  
             $('#company_id_cpe').val('');    $('#contract_id_cpe').val('');    $('#terrain_id_cpe').val(''); 
              $.get('{{url('getFields')}}?id=' +id, function(data)
              {   //alert(id);               
                $.each(data, function(index, fieldObj)
                {
                    $('#company_id_cpe').val(fieldObj.company_id);   
                    $('#contract_id_cpe').val(fieldObj.contract_id);   
                    $('#terrain_id_cpe').val(fieldObj.terrain_id);  
                });
              }); 
        });
    });
</script>