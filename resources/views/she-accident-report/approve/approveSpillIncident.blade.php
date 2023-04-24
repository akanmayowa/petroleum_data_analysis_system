<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Spill - Incident Report <i style="margin-left: 50px">Total : {{$spill_incidents->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appSPILLmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="SPILL_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Natural Accident</th>
                <th>Corrosion</th>
                <th>Equipment Failure</th>
                <th>Sabotage</th>
                <th>Human Error</th>
                <th>YTBD</th>
                <th>Mystery</th>  
                <th>Total Spill</th>
                <th>Volume Spill <i class="units">MMbbls</i></th>
            </tr>

            </thead>
            <tbody>
                @if($spill_incidents)
                    @foreach($spill_incidents as $spill)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$spill->id}}, '\App\\she_spill_incidence_report')" class="check_tabs" id="tab_{{$spill->id}}" name="tab_{{$spill->id}}" value="0">
                            </th> 
                            <th>{{$spill->year}}</th>
                            <th>{{$spill->month}}</th>
                            <th>{{$spill->natural_accident}}</th> 
                            <th>{{$spill->corrosion}}</th>
                            <th>{{$spill->equipment_failure}}</th>
                            <th>{{$spill->sabotage}}</th>
                            <th>{{$spill->human_error}}</th>
                            <th>{{$spill->ytbd}}</th> 
                            <th>{{$spill->mystery}}</th>
                            <th>{{$spill->total_no_of_spills}}</th>
                            <th data-toggle="tooltip" title="Capacity In MMbbls">{{$spill->volume_spilled}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appSPILLmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#SPILL_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_spill_incidence_report',
                    name:'Spill Incident',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#SPILL_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Spill Incident',
                model_name:'\App\\she_spill_incidence_report',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displaySpill();  });      $('#successModal').modal('show');           
        });

        $('#SPILL_no_btn').click(function(e)
        {
            $('#appSPILLmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appSPILLmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="SPILL_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="SPILL_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>