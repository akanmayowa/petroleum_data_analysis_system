<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Approved Gas Development Plan <i style="margin-left: 50px">Total : {{$gas_dp->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appFDPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf   
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="FDP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Field</th>
                <th>Concession</th>
                <th>Company</th>
                <th>Gas Reserves(BSCF)</th>
                <th>Condensate(MMSTB)</th>
                <th>AG Reserves(Bscf)</th>
                <th>Off-Take Rate(MMSCFD)</th>
            </tr>

            </thead>
            <tbody>
                @if($gas_dp)
                    @foreach($gas_dp as $_gas_dp)
                        <tr>          
                            <th>
                                <input type="checkbox" onclick="setValue({{$_gas_dp->id}}, '\App\\up_field_development_plan')" class="check_tabs" id="tab_{{$_gas_dp->id}}" name="tab_{{$_gas_dp->id}}" value="0">
                            </th>           
                            <th>{{$_gas_dp->id}}</th> 
                            <th>{{$_gas_dp->year}}</th> 
                            <th>@if($_gas_dp->field) {{$_gas_dp->field->field_name}} @endif </th> 
                            <th>@if($_gas_dp->concession) {{$_gas_dp->concession->concession_name}} @endif </th> 
                            <th>@if($_gas_dp->company) {{$_gas_dp->company->company_name}} @endif </th> 
                            <th>{{$_gas_dp->gas_reserve}}</th> 
                            <th>{{$_gas_dp->condensate}}</th> 
                            <th>{{$_gas_dp->ag_reserve}}</th> 
                            <th>{{$_gas_dp->off_take_rate}}</th>   
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appFDPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#FDP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_field_development_plan',
                    name:'up_crude_production_deferment',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#FDP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'up_crude_production_deferment',
                model_name:'\App\\up_field_development_plan',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayFieldDevelopmentPlan();
             $('#successModal').modal('show');
        });

        $('#FDP_no_btn').click(function(e)
        {
            $('#appFDPmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appFDPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="FDP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="FDP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>