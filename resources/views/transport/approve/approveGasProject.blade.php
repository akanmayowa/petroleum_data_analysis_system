<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Major Petrochemical Plant Projects <i style="margin-left: 50px">Total : {{$gas_projects->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appGPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="GPROJ_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>year</th>
                <th>Project Title</th>
                <th>LNG <i class="units"></i></th>
                <th>NG <i class="units"></i></th>
                <th>CNG <i class="units"></i></th>
                <th>LPG <i class="units"></i></th>
                <th>NGR <i class="units"></i></th>
                <th>Condensate <i class="units"></i></th>
                <th>Fertilizer <i class="units"></i></th>
                <th>Petrochemical <i class="units"></i></th>
                <th>Company</th>
                <th>Location</th>                            
                <th>Start Date</th>                            
                <th>Commissioning</th>                            
                <th>Status</th>
            </tr>

            </thead>
            <tbody>
                @if($gas_projects)
                    @foreach($gas_projects as $gas_project)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$gas_project->id}}, '\App\\gas_processing_plant_project')" class="check_tabs" id="tab_{{$gas_project->id}}" name="tab_{{$gas_project->id}}" value="0">
                            </th>
                            <th>{{$gas_project->year}}</th> 
                            <th>{{$gas_project->project_title}}</th> 
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->lng}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->ng}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->cng}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->lpg}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->ngr}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->condensate}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->fertilizer}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$gas_project->petrochemical}}</th>
                            @if($gas_project->company_id == 0)
                            <th>{{$gas_project->others}}</th> 
                            @else                             
                            <th>@if($gas_project->company) {{substr($gas_project->company->company_name, 0,30)}}... @endif</th> 
                            @endif                            
                            <th>{{$gas_project->location_id}}</th> 
                            <th>{{$gas_project->start_date}}</th>
                            <th>{{$gas_project->end_date}}</th>
                            <th>{{$gas_project->status?$gas_project->status->status_name:''}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appGPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#GPROJ_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_processing_plant_project',
                    name:'Gas Project',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#GPROJ_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Waste MGT Facilities',
                model_name:'\App\\gas_processing_plant_project',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayGasProject();  });      $('#successModal').modal('show');           
        });

        $('#GPROJ_no_btn').click(function(e)
        {
            $('#appGPROJmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appGPROJmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="GPROJ_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="GPROJ_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>