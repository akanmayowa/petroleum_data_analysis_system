<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Crude Production Deferment <i style="margin-left: 50px">Total : {{$deferments->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPCPDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="pcpd_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th style="width: 5%">#</th> 
                <th style="width: 10%">Year</th>
                <th style="width: 10%">Month</th>
                <th style="width: 30%">Company</th>
                <th style="width: 20%">Contract</th>
                <th style="width: 20%">Value</th>
            </tr>

            </thead>
            <tbody>
                @if($deferments)
                    @foreach($deferments as $deferment)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$deferment->id}}, '\App\\up_crude_production_deferment')" class="check_tabs" id="tab_{{$deferment->id}}" name="tab_{{$deferment->id}}" value="0">
                            </th>
                            <th>{{$deferment->id}}</th>  
                            <th>{{$deferment->year}}</th>
                            <th>{{$deferment->month}}</th>
                            <th>@if($deferment->company) {{$deferment->company->company_name}} @endif</th> 
                            <th>@if($deferment->contract) {{$deferment->contract->contract_name}} @endif</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($deferment->value, 2)}}</th>     
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form> </br>
    <a data-toggle="tooltip" onclick="showmodal('appPCPDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
</div>



<script type="text/javascript">
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

       
        $('#pcpd_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_crude_production_deferment',
                    name:'Crude Production Deferment',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#pcpd_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Crude Production Deferment',
                model_name:'\App\\up_crude_production_deferment',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayCrudeProdDeferment();         $('#successModal').modal('show');        
        });

        $('#pcpd_no_btn').click(function(e)
        {
            $('#appPCPDmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPCPDmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="pcpd_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="pcpd_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>