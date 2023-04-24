<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Major Petrochemical Plant Projects <i style="margin-left: 50px">Total : {{$down_projects->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appDPPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="DPP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Company</th>
                <th>Location</th>
                <th>Plant Name</th>
                <th>Plant Type</th>
                <th>Capacity by Unit <i class="units"></i></th>
                <th>Output By Unit</th>
                <th>Status</th>
                <th>Start Year</th>
                <th>Estimated Completion</th>
            </tr>

            </thead>
            <tbody>
                @if($down_projects)
                    @foreach($down_projects as $down_project)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$down_project->id}}, '\App\\down_petrochemical_plant_project')" class="check_tabs" id="tab_{{$down_project->id}}" name="tab_{{$down_project->id}}" value="0">
                            </th>
                            <th>{{$down_project->year}}</th>
                            <th>{{$down_project->company}}</th>
                            <th>{{$down_project->location}} </th>
                            <th>{{$down_project->plant_name}}</th>
                            <th>{{$down_project->plant_type}} </th>
                            <th data-toggle="tooltip" title="Capacity In ">{{$down_project->capacity_by_unit}}</th>
                            <th>{{$down_project->output_yield}} </th>
                            <th>{{$down_project->statuses?$down_project->statuses->status_name:''}}</th>
                            <th>{{$down_project->start_year}} </th>
                            <th>{{$down_project->estimated_completion}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appDPPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#DPP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_petrochemical_plant_project',
                    name:'Pet Plant Projects',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#DPP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Pet Plant Projects',
                model_name:'\App\\down_petrochemical_plant_project',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayDownstreamProject();  });      $('#successModal').modal('show');           
        });

        $('#DPP_no_btn').click(function(e)
        {
            $('#appDPPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appDPPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="DPP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="DPP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>