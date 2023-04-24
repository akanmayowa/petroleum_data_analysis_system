<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Products Volumes Vessel (Import Permits) Data <i style="margin-left: 50px">Total : {{$permit_vessel->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPIPVmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PIPV_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Depot Name</th>
                <th>Field Office</th>
                <th>Product</th>
                <th>Volume in Liters <i class="units">Litres</i></th>
            </tr>

            </thead>
            <tbody>
                @if($permit_vessel)
                    @foreach($permit_vessel as $_prod_vol_permit_vessel)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_prod_vol_permit_vessel->id}}, '\App\\down_product_vol_import_permit_vessel')" class="check_tabs" id="tab_{{$_prod_vol_permit_vessel->id}}" name="tab_{{$_prod_vol_permit_vessel->id}}" value="0">
                            </th>
                            <th>{{$_prod_vol_permit_vessel->id}}</th>
                             <th>{{$_prod_vol_permit_vessel->year}}</th>
                            <th>{{$_prod_vol_permit_vessel->depot_name}}</th>
                             <th>@if($_prod_vol_permit_vessel->field_office) {{$_prod_vol_permit_vessel->field_office->field_office_name}} @endif</th>
                             <th>@if($_prod_vol_permit_vessel->product) {{$_prod_vol_permit_vessel->product->product_name}} @endif</th> 
                             <th data-toggle="tooltip" title="Volume In Litres">{{$_prod_vol_permit_vessel->value}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appPIPVmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
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

       
        $('#PIPV_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_product_vol_import_permit_vessel',
                    name:'Product Vol Vessel Permits',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PIPV_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Product Vol Vessel Permits',
                model_name:'\App\\down_product_vol_import_permit_vessel',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayProductVolPermitVessel();     $('#successModal').modal('show');           
        });

        $('#PIPV_no_btn').click(function(e)
        {
            $('#appPIPVmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPIPVmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PIPV_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PIPV_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>