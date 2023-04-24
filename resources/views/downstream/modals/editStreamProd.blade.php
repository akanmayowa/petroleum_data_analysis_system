<form id="streProdForm" action="{{url('/downstream')}}" method="POST">
<input type="hidden" name="token" id="token" value="{{csrf_token()}}">
      @php   
        $str_p_tot = \App\down_terminal_stream_prod::count();  ++$str_p_tot;
        $one_stre = \App\Stream::where('id', $STRE_->stream_id)->first();         
        $all_stre = \App\Stream::orderBy('stream_name', 'asc')->get();  
        $one_com = \App\company::where('id', $STRE_->company_id)->first();         
        $all_com = \App\company::orderBy('company_name', 'asc')->get();  
        $one_cot = \App\contract::where('id', $STRE_->contract_id)->first();         
        $all_cot = \App\contract::orderBy('contract_name', 'asc')->get();  
      @endphp

        <input type="hidden" class="form-control" id="id" name="id" value="{{$STRE_->id}}" required>
        <input type="hidden" name="tot_" id="tot_" value="{{$str_p_tot}}">
        <input type="hidden" class="form-control" name="type" id="" value="add_terminal_stream_prod">  


       <div class="form-group row">
        <label for="stream_id_tsp" class="col-sm-1 col-form-label"> Stream </label>
        <div class="col-sm-5">
            <select class="form-control" name="stream_id" id="stream_id_tsp" required readonly>
                @if($one_stre) <option value="{{$one_stre->id}}"> {{$one_stre->stream_name}} </option>
                @else <option value=""></option> @endif
                @if(count($all_stre)>0)
                    @foreach($all_stre as $all_stre)
                        <option value="{{$all_stre->id}}">{{$all_stre->stream_name}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <label for="sulphur_content" class="col-sm-1 col-form-label"> Sulphur </label>
        <div class="col-sm-5">
            <select class="form-control" name="sulphur_content" id="sulphur_content">
                @if($STRE_) <option value="{{$STRE_->sulphur_content}}"> {{$STRE_->sulphur_content}} </option> @endif
                    <option value="0"> 0 percent </option>
                    <option value="10"> 10 percent </option>
                    <option value="20"> 20 percent </option>
                    <option value="30"> 30 percent </option>
                    <option value="40"> 40 percent </option>
                    <option value="50"> 50 percent </option>
                    <option value="60"> 60 percent </option>
                    <option value="70"> 70 percent </option>
                    <option value="80"> 80 percent </option>
                    <option value="90"> 90 percent </option>
                    <option value="100"> 100 percent </option>
            </select>
        </div>
      </div>   
      

      <div class="form-group row">
        <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
        <div class="col-sm-5">
            <select class="form-control" name="company_id" id="company_id">
                @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @else <option value=""> Select Company</option> @endif
                @if(count($all_com)>0)
                    @foreach($all_com as $all_com)
                        <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <label for="contract_id" class="col-sm-1 col-form-label"> Contract </label>
        <div class="col-sm-5">
            <select class="form-control" name="contract_id" id="contract_id">
                @if($one_cot) <option value="{{$one_cot->id}}"> {{$one_cot->contract_name}} </option> @else <option value=""> Select Contract</option> @endif
                @if(count($all_cot)>0)
                    @foreach($all_cot as $all_cot)
                        <option value="{{$all_cot->id}}">{{$all_cot->contract_name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
      </div> 


      <div class="form-group row">
        <label for="year_tsp" class="col-sm-1 col-form-label"> Year </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_tspe" value="{{$STRE_->year}}" required="" readonly>
        </div>

        <label for="year_tsp" class="col-sm-1 col-form-label"> Type </label>
        <div class="col-sm-5">                
            <label class="radio-inline" style="margin-left: 0px">
              <input type="radio" name="production_type_id" value="1" @if($STRE_->production_type_id == 1) checked @endif required=""> Oil
            </label>
            <label class="radio-inline" style="margin-left: 10px">
              <input type="radio" name="production_type_id" value="2" @if($STRE_->production_type_id == 2) checked @endif> Condensate
            </label>
            <label class="radio-inline" style="margin-left: 10px">
              <input type="radio" name="production_type_id" value="3" @if($STRE_->production_type_id == 3) checked @endif> Plant
            </label>
        </div>
      </div>       

      <div class="form-group row" style="height: 8px"> <hr> </div>

      <div class="form-group row">
        <label for="january" class="col-sm-1 col-form-label"> January </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="January" name="january" id="january_edit" onkeyup="check_Value(this)" value="{{$STRE_->january}}">
        </div>

        <label for="febuary" class="col-sm-1 col-form-label"> February </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="February" name="febuary" id="febuary_edit" onkeyup="check_Value(this)" value="{{$STRE_->febuary}}">
        </div>
      </div>         

      <div class="form-group row">
        <label for="march" class="col-sm-1 col-form-label"> March </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="March" name="march" id="march_edit" onkeyup="check_Value(this)" value="{{$STRE_->march}}">
        </div>

        <label for="april" class="col-sm-1 col-form-label"> April </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="April" name="april" id="april_edit" onkeyup="check_Value(this)" value="{{$STRE_->april}}">
        </div>
      </div>          

      <div class="form-group row">
        <label for="may" class="col-sm-1 col-form-label"> May </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="May" name="may" id="may_edit" onkeyup="check_Value(this)" value="{{$STRE_->may}}">
        </div>

        <label for="june" class="col-sm-1 col-form-label"> June </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="June" name="june" id="june_edit" onkeyup="check_Value(this)" value="{{$STRE_->june}}">
        </div>
      </div>          

      <div class="form-group row">
        <label for="july" class="col-sm-1 col-form-label"> July </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control" placeholder="July" name="july" id="july_edit" onkeyup="check_Value(this)" value="{{$STRE_->july}}">
        </div>

        <label for="august" class="col-sm-1 col-form-label"> August </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="August" name="august" id="august_edit" onkeyup="check_Value(this)" value="{{$STRE_->august}}">
        </div>
      </div>          

      <div class="form-group row">
        <label for="september" class="col-sm-1 col-form-label"> September </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="September" name="september" id="september_edit" onkeyup="check_Value(this)" value="{{$STRE_->september}}">
        </div>

        <label for="october" class="col-sm-1 col-form-label"> October </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="October" name="october" id="october_edit" onkeyup="check_Value(this)" value="{{$STRE_->october}}">
        </div>
      </div>          

      <div class="form-group row">
        <label for="november" class="col-sm-1 col-form-label"> November </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="November" name="november" id="november_edit" onkeyup="check_Value(this)" value="{{$STRE_->november}}">
        </div>

        <label for="december" class="col-sm-1 col-form-label"> December </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control edit_cr_prod" placeholder="December" name="december" id="december_edit" onkeyup="check_Value(this)" value="{{$STRE_->december}}">
        </div>
      </div>    


    <div class="form-group row" style="height: 5px"> <hr> </div>



      <div class="form-group row">
        <label for="api" class="col-sm-1 col-form-label"> API </label>
        <div class="col-sm-5">
            <input type="number" step="0.01" class="form-control" placeholder="American Production Index" name="api" id="api" value="{{$STRE_->api}}" >
        </div>

        <div class="col-sm-5">
            <input type="hidden" class="form-control" placeholder="Stream Total" name="stream_total" id="stream_total_edit" value="{{$STRE_->stream_total}}" readonly="" required>
        </div>
      </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Stream Prod  </button>
      </div>
</form>



<script>
    $(function()
    {
        $("#streProdForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('streProdForm', "{{url('/downstream')}}", 'editterm_stre_prod');

            displayTerminal();
        });

        $('#year_tspe').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })


        //script to calculate total crude export summary for edit
        $('.edit_cr_prod').keyup(function()
        {
            var total_crude_exp = 0;
            $('.edit_cr_prod').each(function()            
            {
                total_crude_exp += parseFloat($(this).val());
            });
            $("#stream_total_edit").val(total_crude_exp);
            console.log(total_crude_exp);
        });  

    });

    //setting all values to default 0
    function check_Value(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }
</script>