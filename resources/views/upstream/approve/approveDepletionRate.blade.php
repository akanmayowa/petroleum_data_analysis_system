<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Reserves Addition Depletion Rate  
        <a data-toggle="tooltip" onclick="showmodal('appADRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="ADR_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Contract</th>
                <th>Oil + Condensate</th>
                <th>Production</th>
                <th>Net Addition</th>
                <th>% Net Addition</th>
                <th>Depletion Rate</th>
                <th>Life Index</th>
            </tr>
            </thead>
            <tbody>
                @if($rate)
                    @foreach($rate as $rated)
                        <tr>            
                            <th>
                                <input type="checkbox" onclick="setValue({{$rated->id}}, '\App\\up_reserve_addition_depletion_rate')" class="check_tabs" id="tab_{{$rated->id}}" name="tab_{{$rated->id}}" value="0">
                            </th>  
                            <th class="tb-row-height">{{$rated->id}}</th> 
                            <th class="tb-row-height">{{$rated->year}}</th> 
                            <th class="tb-row-height">{{$rated->month}}</th> 
                            <th class="tb-row-height">@if($rated->company) {{$rated->company->company_name}} @endif</th> 
                            <th class="tb-row-height">@if($rated->contract) {{$rated->contract->contract_name}} @endif</th> 
                            <th class="tb-row-height">{{number_format($rated->production, 2)}}</th>
                            <th class="tb-row-height">{{number_format($rated->oil_condensate, 2)}}</th>
                            <th class="tb-row-height">{{number_format($rated->net_addition, 2)}}</th>
                            <th class="tb-row-height">{{number_format($rated->percent_net_addition, 2)}}</th>
                            <th class="tb-row-height">{{number_format($rated->depletion_rate, 2)}}</th>
                            <th class="tb-row-height">{{number_format($rated->life_index, 2)}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>  
    <a data-toggle="tooltip" onclick="showmodal('appADRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#ADR_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_reserve_addition_depletion_rate',
                    name:'Addition Depletion Rate',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ADR_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Addition Depletion Rate',
                model_name:'\App\\up_reserve_addition_depletion_rate',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayReserveDepletionRate();         $('#successModal').modal('show');        
        });

        $('#ADR_no_btn').click(function(e)
        {
            $('#appADRmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appADRmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ADR_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ADR_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>