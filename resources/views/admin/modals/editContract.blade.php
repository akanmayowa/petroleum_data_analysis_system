<form id="contractForm" action="{{url('/admin/add_contract')}}" method="POST">
      <input type="hidden" class="form-control" id="id" name="id" value="{{$CONT_->id}}" required>
      {{ csrf_field() }}
            <input type="hidden" name="date" id="date_cnt" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_contract">

          <div class="form-group row">
            <label for="contract_name" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="contract_name" id="contract_name" value="{{$CONT_->contract_name}}" required>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Contract</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#contractForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('contractForm', "{{url('/downstream')}}", 'editcont');

            displayContract();
        });
    });        
  </script>