<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Multi-client Project Status <i style="margin-left: 50px">Total : {{$multiClient->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appMCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="MCP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Company</th>
                <th>Survey Name</th>
                <th>Aggreement Date</th>
                <th>Area Of Survey</th>
                <th>Type Of Survey</th>
                <th>Quantum Of Survey</th>
                <th>Year Of Survey</th>
            </tr>
            </thead>
            <tbody>
                @forelse($multiClient as $m_client)
                    <tr>     
                        <th>
                            <input type="checkbox" onclick="setValue({{$m_client->id}}, '\App\\bala_multiclient_project_status')" class="check_tabs" id="tab_{{$m_client->id}}" name="tab_{{$m_client->id}}" value="0">
                        </th>
                        <th>{{$m_client->year}}</th> 
                        <th>{{$m_client->company?$m_client->company->company_name:''}}</th>
                        <th>{{$m_client->survey_name}}</th>  
                        <th>{{$m_client->agreement_date}}</th>  
                        <th>{{$m_client->area_of_survey?$m_client->area_of_survey->area_of_survey_name:''}}</th>   
                        <th>{{$m_client->type_of_survey?$m_client->type_of_survey->type_of_survey_name:''}}</th>
                        <th>{{$m_client->quantum_of_survey}}</th>   
                        <th>{{$m_client->year_of_survey}}</th>   
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </form>  </br>
    <a data-toggle="tooltip" onclick="showmodal('appMCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#MCP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\bala_multiclient_project_status',
                    name:'Multi-Client Project Status',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#MCP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Multi-Client Project Status',
                model_name:'\App\\bala_multiclient_project_status',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayStatus();         $('#successModal').modal('show');        
        });

        $('#MCP_no_btn').click(function(e)
        {
            $('#appMCPmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appMCPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="MCP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="MCP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>