 <form id="prodForm" action="{{url('/downstream')}}" method="POST">
          
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$IMP_PROD->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_import_product">  


           <div class="form-group row">
                <label for="product_name" class="col-sm-2 col-form-label"> Product Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Product Name" name="product_name" id="product_name" value="{{$IMP_PROD->product_name}}" required="">
                </div>
            </div>

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Product </button>
          </div>
</form>


<script>
  $(function()
  {
      $("#prodForm").on('submit', function(e)
      {   
          e.preventDefault();            
          editForm('prodForm', "{{url('/downstream')}}", 'edit_imp_prod');

          displayProduct();
      }); 
  });
</script>
