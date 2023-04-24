<form id="hsePettRecForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      @php 
          $one_cat= \App\she_pet_category::where('id', $MANAGE->category_id)->first();                      
          $all_cat = \App\she_pet_category::where('type', 'Pet')->orderBy('category_name', 'asc')->get(); 
          $one_act = \App\she_pet_action::where('id', $MANAGE->action_taken_id)->first();                     
          $all_act = \App\she_pet_action::orderBy('action_name', 'asc')->get();
          $one_sta = \App\she_pet_status::where('id', $MANAGE->status_id)->first();                     
          $all_sta = \App\she_pet_status::where('type', 'Pet')->orderBy('status_name', 'asc')->get();
      @endphp


      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_pettitions_received">



          <div class="form-group row">
            <label for="year_pett" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_pett" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_pett" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month - YYYY" name="month" id="month_pett" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 
        

        <div class="form-group row">
            <label for="petitioner" class="col-sm-2 col-form-label"> Petitioner </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Petitioner" name="petitioner" id="petitioner" value="{{$MANAGE->petitioner}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="petitionee" class="col-sm-2 col-form-label"> Petitionee </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Petitionee" name="petitionee" id="petitionee" value="{{$MANAGE->petitionee}}" required>
            </div>
        </div> 



        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id" id="category_id" required>
                    @if($one_cat) <option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option> @else <option> </option> @endif
                    @if($all_cat)
                        @foreach($all_cat as $all_cat)
                            <option value="{{$all_cat->id}}"> {{$all_cat->category_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="action_taken_id" class="col-sm-2 col-form-label"> Action Taken </label>
            <div class="col-sm-10">
                <select class="form-control" name="action_taken_id" id="action_taken_id" required>
                    @if($one_act) <option value="{{$one_act->id}}"> {{$one_act->action_name}} </option> @else <option> </option> @endif
                    @if($all_act)
                        @foreach($all_act as $all_act)
                            <option value="{{$all_act->id}}"> {{$all_act->action_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}} </option> @else <option> </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Pettitions Received </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hsePettRecForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hsePettRecForm', "{{url('/she-accident-report')}}", 'edit_pet_received');

            displayPettitionReceived();
        });


        $('#year_pett').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_pett').datepicker
        ({
          format: "MM",
          viewMode: "months", 
          minViewMode: "months"
        });





        //compute TOTAL       
        $(document).on("input", ".spill", function()
        {
            var total = 0;
            $('.spill').each(function()            
            {
                total += parseFloat($(this).val());
            });

            $("#total_no_of_spills").val(total);                        
       
        });
      
    });
</script>