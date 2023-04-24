 <form id="gasTextIndForm" action="{{url('/gas')}}" method="POST">
    @csrf
        <input type="hidden" class="form-control" id="id" name="id" value="{{$GAS->id}}" required>
        <input type="hidden" class="form-control" name="type" id="" value="add_gas_supply_textile_industry">  


        <div class="form-group row">
            <label for="year_texts" class="col-sm-3 col-form-label"> Year </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="year" id="year_texts" value="{{$GAS->year}}" required="" readonly>
            </div>
        </div>


        <div class="form-group row">
            <label for="sector" class="col-sm-3 col-form-label"> Sector </label>
            <div class="col-sm-9">
                <input type="text" class="form-control sup" placeholder="Sector" name="sector" id="sector" value="{{$GAS->sector}}">
            </div>
        </div>

        
        <div class="form-group row">
            <label for="value" class="col-sm-3 col-form-label"> Value </label>
            <div class="col-sm-9">
                <input type="number" step="0.01" class="form-control sup" placeholder="" name="value" id="value" onkeyup="checkValue(this)" value="{{$GAS->value}}">
            </div>
        </div>  
    

       
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-check" onclick="return confirm('Are you sure you want to UPDATE Details?')"></i> Update Gas Textile Industry </button>
      </div>
</form>


<script>
    $(function()
    {  
        $("#gasTextIndForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('gasTextIndForm', "{{url('/gas')}}", 'edit_textile_ind');

            displayGasSupplyTextileIndustry();
        });


        $('#year_texts').datepicker(
        {
          autoclose: true, startView: 'decade',
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
        })

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

