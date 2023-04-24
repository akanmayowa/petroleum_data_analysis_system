<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending GAS Actual Production <i style="margin-left: 50px">Total : {{$gas_actual->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appGasActProdmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="GasActProd_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Vessel Name</th>
                <th>Import Permit No</th>
                <th>State <i class="units"></i></th>
                <th>Zone <i class="units"></i></th>
                <th>Product <i class="units"></i></th>
                <th>Volume <i class="units"> MT</i></th>
                <th>Date of Discharged <i class="units"></i></th> 
            </tr>
            </thead>
            <tbody>
                @if($gas_actual)
                    @foreach($gas_actual as $g_actual)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$g_actual->id}}, '\App\\gas_actual_production')" class="check_tabs" id="tab_{{$g_actual->id}}" name="tab_{{$g_actual->id}}" value="0">
                            </th> 
                            <th>{{$g_actual->year}}</th>
                             <th>{{$g_actual->month}}</th>
                             <th>{{$g_actual->company?$g_actual->company->company_name:''}}</th>
                             <th>{{$g_actual->vessel_name}}</th>
                             <th>{{$g_actual->import_permit_no}}</th>
                             <th>{{$g_actual->state?$g_actual->state->state_name:''}}</th>
                             <th>{{$g_actual->zone}}</th>
                             <th>{{$g_actual->product?$g_actual->product->product_name:''}}</th> 
                             <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{$g_actual->volume}}</th>
                             <th>{{$g_actual->date_discharged}}</th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appGasActProdmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
</div>



<script>
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip();
        $('.page-link').click(function(e)
        {
            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID);
        });

       
        $('#GasActProd_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_actual_production',
                    name:'Gas Actual Production',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#GasActProd_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Actaul Production',
                model_name:'\App\\gas_actual_production',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayGasActualProd();  });      $('#successModal').modal('show');           
        });

        $('#GasActProd_no_btn').click(function(e)
        {
            $('#appGasActProdmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appGasActProdmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="GasActProd_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="GasActProd_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>