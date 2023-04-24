<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Major Upstream (oil) projects <i style="margin-left: 50px">Total : {{$processing_plants->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appUPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="UPROJ_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Project</th>
                <th>Company</th>     
                <th>Terrain</th>
                <th>Location</th>
                <th>Prod Oil</th>
                <th>Prod Gas</th>
                <th>Prod Water</th>
                <th>Enhanced</th>
                <th>Facility Type</th>
                <th>Dev Type</th>
                <th>Completion Year</th>
                <th>Status</th>
            </tr>

            </thead>
            <tbody>
                @if($processing_plants)
                    @foreach($processing_plants as $oil_plant)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$oil_plant->id}}, '\App\\up_processing_plant_project')" class="check_tabs" id="tab_{{$oil_plant->id}}" name="tab_{{$oil_plant->id}}" value="0">
                            </th>
                            <th>{{$oil_plant->year}}</th> 
                            <th>{{$oil_plant->project}}</th> 
                            @if($oil_plant->company_id == 0)
                            <th>{{$oil_plant->others}}</th> 
                            @else                             
                            <th>@if($oil_plant->company) {{substr($oil_plant->company->company_name, 0,30)}}... @endif</th> 
                            @endif 
                            <th>{{$oil_plant->terrain_id}}</th> 
                            <th>{{$oil_plant->location}}</th> 
                            <th>{{$oil_plant->expected_oil}}</th> 
                            <th>{{$oil_plant->expected_gas}}</th> 
                            <th>{{$oil_plant->expected_water}}</th> 
                            <th>{{$oil_plant->expected_efi}}</th> 
                            <th>{{$oil_plant->facility_type}}</th> 
                            <th>{{$oil_plant->development_type}}</th>
                            <th>{{$oil_plant->completion_date}}</th>
                            <th>{{$oil_plant->status_id}}</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appUPROJmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#UPROJ_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_processing_plant_project',
                    name:'Upstream Project',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#UPROJ_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Upstream Project',
                model_name:'\App\\up_processing_plant_project',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayUpstreamProject();  });      $('#successModal').modal('show');           
        });

        $('#UPROJ_no_btn').click(function(e)
        {
            $('#appUPROJmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appUPROJmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="UPROJ_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="UPROJ_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>