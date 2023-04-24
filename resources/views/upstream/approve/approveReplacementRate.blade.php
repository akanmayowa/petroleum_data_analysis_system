<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Reserves Replacement Rate  
        <a data-toggle="tooltip" onclick="showmodal('appRRRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="RRR_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Contract</th>>
                <th>Oil Condensate Reserves</th>
                <th>Oil Condensate Production</th>
            </tr>

            </thead>
            <tbody>
                @if($rate)
                    @foreach($rate as $rated)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$rated->id}}, '\App\\up_reserve_replacement_rate')" class="check_tabs" id="tab_{{$rated->id}}" name="tab_{{$rated->id}}" value="0">
                            </th>   
                            <th class="tb-row-height">{{$rated->id}}</th> 
                            <th class="tb-row-height">{{$rated->year}}</th> 
                            <th class="tb-row-height">{{$rated->month}}</th> 
                            <th class="tb-row-height">@if($rated->contract) {{$rated->contract->contract_name}} @endif</th> 
                            <th class="tb-row-height">{{number_format($rated->oil_condensate_reserve, 2)}}</th>
                            <th class="tb-row-height">{{number_format($rated->oil_condensate_production, 2)}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form> 
    <a data-toggle="tooltip" onclick="showmodal('appRRRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#RRR_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_reserve_replacement_rate',
                    name:'Reserve Replacement Rate',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RRR_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Reserve Replacement Rate',
                model_name:'\App\\up_reserve_replacement_rate',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayReserveDepletionRate();         $('#successModal').modal('show');        
        });

        $('#RRR_no_btn').click(function(e)
        {
            $('#appRRRmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRRRmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RRR_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RRR_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>