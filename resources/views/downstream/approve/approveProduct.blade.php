<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Product Listing Data <i style="margin-left: 50px">Total : {{$product->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPLmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> Approve Data </i> </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PL_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Product Name</th>
                <th>Uploaded On</th>
            </tr>

            </thead>
            <tbody>
                @if($product)
                    @foreach($product as $_imp_products)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_imp_products->id}}, '\App\\down_import_product')" class="check_tabs" id="tab_{{$_imp_products->id}}" name="tab_{{$_imp_products->id}}" value="0">
                            </th> 
                            <th>{{$_imp_products->id}}</th>
                            <th>{{$_imp_products->product_name}} </th>
                            <th>{{\Carbon\Carbon::parse($_imp_products->created_at)->diffForHumans()}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appPLmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> Approve Data </i> </a> 
</div> <!-- end col -->   




<script type="text/javascript">
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip(); 
        $('.page-link').click(function(e)
        {
            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID)
        });

       
        $('#PL_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_import_product',
                    name:'Product Listing',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PL_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Product Listing',
                model_name:'\App\\down_import_product',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayProduct();     $('#successModal').modal('show');           
        });

        $('#PL_no_btn').click(function(e)
        {
            $('#appPLmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPLmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-warning pulse-warning" style="display: block;">!</div>
                </div>

                <div class="modal-body">
                    <center> <h2 class="swal2-title" style="margin-top:-40px">Confirm Record(s) Approval?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="PL_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PL_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>