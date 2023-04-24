<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Accident Report – Downstream <i style="margin-left: 50px">Total : {{$down_incidents->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appDOWNmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="DOWN_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Incidents</th>
                <th>Work Related</th>
                <th>Non Work Related</th>
                <th>Fatal Incident</th>
                <th>Non Fatal Incident</th>
                <th>Work Related Fatal Incident</th>
                <th>Non Work Related Fatal Incident</th>
                <th>Fatality</th>
            </tr>

            </thead>
            <tbody>
                @if($down_incidents)
                    @foreach($down_incidents as $down_incident)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$down_incident->id}}, '\App\\she_accident_report_downstream')" class="check_tabs" id="tab_{{$down_incident->id}}" name="tab_{{$down_incident->id}}" value="0">
                            </th> 
                            <th>{{$down_incident->year}}</th>
                            <th>{{$down_incident->month}}</th>
                            <th>{{$down_incident->incidents}}</th> 
                            <th>{{$down_incident->work_related}}</th>
                            <th>{{$down_incident->non_work_related}}</th>
                            <th>{{$down_incident->fatal_incident}}</th>
                            <th>{{$down_incident->non_fatal_incident}}</th>
                            <th>{{$down_incident->work_related_fatal_incident}}</th> 
                            <th>{{$down_incident->non_work_related_fatal_incident}}</th>
                            <th>{{$down_incident->fatality}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appDOWNmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#DOWN_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_accident_report_downstream',
                    name:'Incident Downstream',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#DOWN_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Incident Downstream',
                model_name:'\App\\she_accident_report_downstream',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayDownstream();  });      $('#successModal').modal('show');           
        });

        $('#DOWN_no_btn').click(function(e)
        {
            $('#appDOWNmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appDOWNmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="DOWN_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="DOWN_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>