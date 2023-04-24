<form id="hseAccLabForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_accredited_laboratories">



          <div class="form-group row">
            <label for="year_acce" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_acce" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_acce" class="col-sm-3 col-form-label"> Month </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Month - YYYY" name="month" id="month_acce" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 

        


        <div class="form-group row">
            <label for="laboratory_name" class="col-sm-3 col-form-label"> Laboratory Name </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Laboratory Name" name="laboratory_name" id="laboratory_name" value="{{$MANAGE->laboratory_name}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="laboratory_services" class="col-sm-3 col-form-label"> Laboratory Service </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Laboratory Service" name="laboratory_services" id="laboratory_services" value="{{$MANAGE->laboratory_services}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="csr" class="col-sm-3 col-form-label"> Zones </label>
            <div class="col-sm-9">
                <select class="form-control" name="zones" id="zones" required>
                    @if($one_zon) <option value="{{$one_zon->id}}"> {{$one_zon->field_office_name}} </option>
                    @else <option value="">  </option> @endif
                    @if(count($all_zon)>0)
                        @foreach($all_zon as $all_zon)
                            <option value="{{$all_zon->id}}">{{$all_zon->field_office_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        {{-- <div class="form-group row">
            <label for="no_of_accredited_lab" class="col-sm-3 col-form-label"> No of Accredited Lab </label>
            <div class="col-sm-9">
                <input type="number" class="form-control" placeholder="No of Accredited Lab" name="no_of_accredited_lab" id="no_of_accredited_lab" value="{{$MANAGE->no_of_accredited_lab}}" required>
            </div>
        </div> --}}


        <div class="form-group row">
            <label for="request_type" class="col-sm-3 col-form-label"> Request </label>
            <div class="col-sm-9">
                <select class="form-control" name="request_type" id="request_type" required>
                    @if($MANAGE) <option value="{{$MANAGE->request_type}}"> {{$MANAGE->request_type}} </option>
                    @else <option value="">  </option> @endif
                    <option value="NEW"> NEW</option>
                    <option value="RENEWAL"> RENEWAL</option>
                </select>
            </div>
        </div> 


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Accredited Laboratories </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseAccLabForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseAccLabForm', "{{url('/she-accident-report')}}", 'edit_acc_lab');

            displayAccreditedLaboratories();
        });


        $('#year_acce').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_acce').datepicker
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