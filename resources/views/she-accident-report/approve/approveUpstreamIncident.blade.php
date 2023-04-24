<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Accident Report – Upstream <i style="margin-left: 50px">Total : {{$up_incidents->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appUPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="UP_check_all" style="margin-top: 5px;"> </label>
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
                @if($up_incidents)
                    @foreach($up_incidents as $up_incident)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$up_incident->id}}, '\App\\she_accident_report_upstream')" class="check_tabs" id="tab_{{$up_incident->id}}" name="tab_{{$up_incident->id}}" value="0">
                            </th> 
                            <th>{{$up_incident->year}}</th>
                            <th>{{$up_incident->month}}</th>
                            <th>{{$up_incident->incidents}}</th> 
                            <th>{{$up_incident->work_related}}</th>
                            <th>{{$up_incident->non_work_related}}</th>
                            <th>{{$up_incident->fatal_incident}}</th>
                            <th>{{$up_incident->non_fatal_incident}}</th>
                            <th>{{$up_incident->work_related_fatal_incident}}</th> 
                            <th>{{$up_incident->non_work_related_fatal_incident}}</th>
                            <th>{{$up_incident->fatality}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appUPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#UP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_accident_report_upstream',
                    name:'Incident Upstream',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#UP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Incident Upstream',
                model_name:'\App\\she_accident_report_upstream',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayUpstream();  });      $('#successModal').modal('show');           
        });

        $('#UP_no_btn').click(function(e)
        {
            $('#appUPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appUPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="UP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="UP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>