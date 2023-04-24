<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Status of Licensed Refinery Projects <i style="margin-left: 50px">Total : {{$ref_projects->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="RPROJ_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Project Name</th>
                <th>Plant Location</th>
                <th>Capacity <i class="units">(BPSD)</i> </th>   
                <th>Refinery Type </th>  
                <th>License Granted</th>                          
                <th>Commissioning Date</th>                           
                <th>License Validity</th>                           
                <th>Status</th>  
            </tr>

            </thead>
            <tbody>
                @if($ref_projects)
                    @foreach($ref_projects as $ref_project)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$ref_project->id}}, '\App\\es_licensed_refinery_project')" class="check_tabs" id="tab_{{$ref_project->id}}" name="tab_{{$ref_project->id}}" value="0">
                            </th>
                            <th>{{$ref_project->year}}</th> 
                            <th>{{substr($ref_project->project_name, 0, 20)}} ...</th> 
                            <th>
                                {{$ref_project->field_id}} 
                            </th> 
                            <th data-toggle="tooltip" title="In BPSD">{{$ref_project->capacity}}</th> 
                            <th>{{$ref_project->refinery_type}}</th> 
                            <th>{{$ref_project->license_granted}}</th> 
                            <th>{{$ref_project->estimated_completion}}</th>
                            <th>{{$ref_project->status?$ref_project->status->status_name:''}}</th>
                            <th>{{$ref_project->status_remark}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appRPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('RPROJ_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\es_licensed_refinery_project',
                    name:'Refinery Project',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RPROJ_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Refinery Project',
                model_name:'\App\\es_licensed_refinery_project',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayLicenseRefineryProject();  });      $('#successModal').modal('show');           
        });

        $('#RPROJ_no_btn').click(function(e)
        {
            $('#appRPROJmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRPROJmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RPROJ_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RPROJ_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>