<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Condensate Reserves   
        <a data-toggle="tooltip" onclick="showmodal('appCRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf   
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="CR_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Contract</th>
                <th>Terrain</th>
                <th>Company</th>
                <th>Condensate Reserves MMbbls</th>
            </tr>

            </thead>
            <tbody>
                @if($condensate)
                    @foreach($condensate as $condensates)
                        <tr>        
                            <th>
                                <input type="checkbox" onclick="setValue({{$condensates->id}}, '\App\\up_reserves_report')" class="check_tabs" id="tab_{{$condensates->id}}" name="tab_{{$condensates->id}}" value="0">
                            </th>   
                            <th class="tb-row-height">{{$condensates->id}}</th> 
                            <th class="tb-row-height">{{$condensates->year}}</th> 
                            <th class="tb-row-height">@if($condensates->contract) {{$condensates->contract->contract_name}} @endif</th> 
                            <th class="tb-row-height">@if($condensates->terrain) {{$condensates->terrain->terrain_name}} @endif</th> 
                            <th class="tb-row-height">@if($condensates->company) {{$condensates->company->company_name}} @endif</th> 
                            <th class="tb-row-height">{{number_format($condensates->condensate_reserves, 2)}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>   
    <a data-toggle="tooltip" onclick="showmodal('appCRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#CR_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_reserves_report',
                    name:'Condensate Reserves',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#CR_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Condensate Reserves',
                model_name:'\App\\up_reserves_report',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayReserveCondensate();         $('#successModal').modal('show');        
        });

        $('#CR_no_btn').click(function(e)
        {
            $('#appCRmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appCRmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="CR_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="CR_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>