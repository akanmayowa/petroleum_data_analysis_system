<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Pipeline Projects <i style="margin-left: 50px">Total : {{$pipe_projects->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPIPEmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PIPE_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Pipeline</th>
                <th>Company</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>nominal Size <i class="units">(In)</i> </th>   
                <th>Length <i class="units">(Km)</i> </th>  
                <th>Process Fliud</th>                           
                <th>Start Date</th>                            
                <th>Commissioning Date</th>                            
                <th>Status</th>
            </tr>

            </thead>
            <tbody>
                @if($pipe_projects)
                    @foreach($pipe_projects as $pipe_project)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$pipe_project->id}}, '\App\\es_pipeline')" class="check_tabs" id="tab_{{$pipe_project->id}}" name="tab_{{$pipe_project->id}}" value="0">
                            </th> 
                            <th>{{$pipe_project->year}}</th>
                            <th>{{$pipe_project->pipeline_name}}</th>
                            @if($pipe_project->company_id == 0)
                            <th>{{$pipe_project->owner_details}}</th> 
                            @else                             
                            <th>@if($pipe_project->owner) {{$pipe_project->owner->company_name}} @endif</th>
                            @endif                              
                            <th>{{$pipe_project->origin}}</th>
                            <th>{{$pipe_project->destination}}</th> 
                            <th data-toggle="tooltip" title="In Inches">{{$pipe_project->nominal_size}}</th> 
                            <th data-toggle="tooltip" title="In Km">{{$pipe_project->length}}</th> 
                            <th>{{$pipe_project->process_fluid}}</th> 
                            <th>{{$pipe_project->start_date}}</th>
                            <th>{{$pipe_project->commissioning_date}}</th>
                            <th>{{$pipe_project->status?$pipe_project->status->status_name:''}}<th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appPIPEmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#PIPE_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\es_pipeline',
                    name:'Waste MGT Facilities',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PIPE_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Waste MGT Facilities',
                model_name:'\App\\es_pipeline',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayPipeline();  });      $('#successModal').modal('show');           
        });

        $('#PIPE_no_btn').click(function(e)
        {
            $('#appPIPEmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPIPEmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PIPE_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PIPE_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>