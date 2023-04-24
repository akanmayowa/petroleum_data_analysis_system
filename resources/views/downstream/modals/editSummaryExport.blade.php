<form id="crudeExpForm" action="{{url('/downstream')}}" method="POST">
          @php 
             $C_E_tot = \App\down_monthly_summary_crude_export::count();  ++$C_E_tot; 
             $one_stre = \App\Stream::where('id', $CRUD_EXP_->stream_id)->first();         
             $all_stre = \App\Stream::orderBy('stream_name', 'asc')->get();  
          @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$CRUD_EXP_->id}}" required>
            <input type="hidden" name="tot_" id="tot_" value="{{$C_E_tot}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_monthly_summary_crude_export">  


           <div class="form-group row">
            <label for="stream_id_tsp" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_tsp" readonly required>
                    @if($one_stre) <option value="{{$one_stre->id}}"> {{$one_stre->stream_name}} </option> 
                    @else <option value=""> </option> @endif

                    @forelse($all_stre as $all_stre)
                        <option value="{{$all_stre->id}}">{{$all_stre->stream_name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <label for="year_expe" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_expe" value="{{$CRUD_EXP_->year}}" required="" readonly>
            </div>
          </div>  


          <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label"> Type </label>
            <div class="col-sm-5" style="margin-top: 5px">                
                <label class="radio-inline" style="margin-left: 0px">
                  <input type="radio" name="production_type_id" value="1" @if($CRUD_EXP_->production_type_id == 1) checked @endif required=""> Oil
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="2" @if($CRUD_EXP_->production_type_id == 2) checked @endif> Field Condensate
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="3" @if($CRUD_EXP_->production_type_id == 3) checked @endif> Plant Condensate
                </label>
            </div>
          </div>         

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="January" name="january" id="january_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->january}}">
            </div>

            <label for="febuary" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="February" name="febuary" id="febuary_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="March" name="march" id="march_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->march}}">
            </div>

            <label for="april" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="April" name="april" id="april_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="May" name="may" id="may_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->may}}">
            </div>

            <label for="june" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="June" name="june" id="june_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="July" name="july"" id="july_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->july}}">
            </div>

            <label for="august" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="August" name="august" id="august_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="September" name="september" id="september_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->september}}">
            </div>

            <label for="october" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="October" name="october" id="october_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="November" name="november" id="november_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->november}}">
            </div>

            <label for="december" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control edit_crex" placeholder="December" name="december" id="december_sum" onkeyup="check_Value(this)" value="{{$CRUD_EXP_->december}}">
            </div>
          </div>    


        <div class="form-group row" style="height: 5px"> <hr> </div>



          <div class="form-group row">
            <label for="api" class="col-sm-1 col-form-label"> API </label>
            <div class="col-sm-5">
                <input type="number" class="form-control" placeholder="American Production Index" name="api" id="api" value="{{$CRUD_EXP_->api}}">
            </div>

            <div class="col-sm-5">
                <input type="hidden" class="form-control" placeholder="Stream Total" name="stream_total" id="stream_total_sum"" value="{{$CRUD_EXP_->stream_total}}" readonly="">
            </div>
          </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Crude Export </button>
          </div>
</form>






<script>
    $(function()
    {
        $("#crudeExpForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('crudeExpForm', "{{url('/downstream')}}", 'editcrude_export');

            displayExport();
        });

        $('#year_expe').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })


        //script to calculate total crude export summary for edit
        $('.edit_crex').keyup(function()
        {
            var total_crude_exp = 0;
            $('.edit_crex').each(function()            
            {
                total_crude_exp += parseFloat($(this).val());
            });
            $("#stream_total_sum").val(total_crude_exp);
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