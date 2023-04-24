<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Environmental Compliance Monitoring <i style="margin-left: 50px">Total : {{$env_compliances->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appECMmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="ECM_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Non-Compliance</th>
            </tr>

            </thead>
            <tbody>
                @if($env_compliances)
                    @foreach($env_compliances as $env_compliance)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$env_compliance->id}}, '\App\\she_environmental_compliance_monitoring')" class="check_tabs" id="tab_{{$env_compliance->id}}" name="tab_{{$env_compliance->id}}" value="0">
                            </th> 
                            <th>{{$env_compliance->year}}</th>
                            <th>{{$env_compliance->month}}</th> 
                            <th>{{$env_compliance->company?$env_compliance->company->company_name:''}}</th>
                            <th>{{$env_compliance->compliance}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appECMmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#ECM_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_environmental_compliance_monitoring',
                    name:'Environmental Compliance',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ECM_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Environmental Compliance',
                model_name:'\App\\she_environmental_compliance_monitoring',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayEnvironmentalComplianceMonitoring();  });   $('#successModal').modal('show');           
        });

        $('#ECM_no_btn').click(function(e)
        {
            $('#appECMmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appECMmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ECM_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ECM_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>