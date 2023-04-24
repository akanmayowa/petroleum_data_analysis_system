 <form id="RefCapacityForm" action="{{url('/downstream')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$REF_CAP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_refinary_capacity">  


           <div class="form-group row">
            <label for="year_rce" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_rce" value="{{$REF_CAP->year}}" required="" readonly>
            </div>

            <label for="refinery_ide" class="col-sm-1 col-form-label"> Refinery </label>
            <div class="col-sm-5">
                <select class="form-control" name="refinery_id" id="refinery_ide" required>
                    @if($one_ref) <option value="{{$one_ref->id}}"> {{$one_ref->plant_location_name}} </option> @endif
                    @if(count($all_ref)>0)
                        @foreach($all_ref as $all_ref)
                            <option value="{{$all_ref->id}}">{{$all_ref->plant_location_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>  

         {{--  <div class="form-group row">   
            <label for="product_id" class="col-sm-1 col-form-label"> Product </label>
            <div class="col-sm-11">
                <select class="form-control" name="product_id" id="product_id" required>
                    @if($one_pro) <option value="{{$one_pro->id}}"> {{$one_pro->product_name}} </option> @else <option value=""> Select Product </option> @endif
                    @if(count($all_pro)>0)
                        @foreach($all_pro as $all_pro)
                            <option value="{{$all_pro->id}}">{{$all_pro->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div>  

          <div class="form-group row">   
            <label for="state_id" class="col-sm-1 col-form-label"> State </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->state_name}} </option> @endif
                    @if(count($all_sta)>0)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}">{{$all_sta->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-1 col-form-label"> Location </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{$REF_CAP->location}}" required="">
            </div>
         </div>  --}}                   
              
                 
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="January" name="january" id="january_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->january}}">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="February" name="febuary" id="febuary_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="March" name="march" id="march_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->march}}">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="April" name="april" id="april_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="May" name="may" id="may_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->may}}">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="June" name="june" id="june_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="July" name="july" id="july_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->july}}">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="August" name="august" id="august_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="September" name="september" id="september_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->september}}">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="October" name="october" id="october_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="November" name="november" id="november_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->november}}">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="December" name="december" id="december_rce" onkeyup="checkValue(this)" value="{{$REF_CAP->december}}">
            </div>
          </div>       

          <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" step="0.01" class="form-control dsge" name="krpc" id="" onkeyup="checkValue(this)" value="{{$krpc->design_capacity}}" readonly="">
                <input type="hidden" step="0.01" class="form-control dsge" name="wrpc" id="" onkeyup="checkValue(this)" value="{{$wrpc->design_capacity}}" readonly="">
                <input type="hidden" step="0.01" class="form-control dsge" name="old_phrc" id="" onkeyup="checkValue(this)" value="{{$old_phrc->design_capacity}}" readonly="">
                <input type="hidden" step="0.01" class="form-control dsge" name="new_phrc" id="" onkeyup="checkValue(this)" value="{{$new_phrc->design_capacity}}" readonly="">
                <input type="hidden" step="0.01" class="form-control dsge" name="ndpr" id="" onkeyup="checkValue(this)" value="{{$ndpr->design_capacity}}" readonly="">

                <input type="hidden" step="0.01" class="form-control" name="total" id="total_rce" readonly="" value="{{$REF_CAP->total}}">
                <input type="hidden" step="0.01" class="form-control" name="total_utilization" id="total_utilizatione" readonly="" 
                value="{{$krpc->design_capacity + $wrpc->design_capacity + $old_phrc->design_capacity + $new_phrc->design_capacity + $ndpr->design_capacity}}">
                <input type="hidden" class="form-control" name="capacity_utilization" id="capacity_utilization_rce" readonly="" value="{{$REF_CAP->capacity_utilization}}">
            </div>
          </div>    

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Refinery Performance Details?')"> <i class="fa fa-check"></i> Update Refinary Performance</button>
          </div>
</form>


<script>

    $(function()
    {
        $("#RefCapacityForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('RefCapacityForm', "{{url('/downstream')}}", 'edit_ref_capacity');

            displayRefinaryCapacity();
        }); 


        $('#year_rce').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        $('#month_rce').datepicker(
        {
            autoclose: true, format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        })
    });

</script>


<script>
    $(function()
    {
        //script to calculate total crude export summary for edit
        $('.r_cape').keyup(function()
        {
            var total = 0;
            $('.r_cape').each(function()            
            {
                total += parseFloat($(this).val());
            });
            $("#total_rce").val(total);
            console.log(total);
        });  

    });

    //setting all values to default 0
    function checkValue(field) 
    {  
        if (field.value == '') 
        {
            var fid = field.id;
            document.getElementById(fid).value = 0;
            //$('.amount').val(0);
        }
    }


        //compute utilization percentage
        $(document).on("input",".r_cape",function()
        {
           var total_util = 0; var util_percent = 0;
            $('.dsge').each(function()            
            {
                total_util += parseFloat($(this).val());
            });
            $("#total_utilizatione").val(total_util);


            var util = 0; 
            var total_rc = parseFloat($('#total_rce').val());           
            var total_utilization = parseFloat($('#total_utilizatione').val());
            util = (( total_rc / total_utilization) * 100);

            //util_percent;
            $("#capacity_utilization_rce").val(util.toFixed(2)  + "%");
            console.log(util.toFixed(2)  + "%")
        });
</script>