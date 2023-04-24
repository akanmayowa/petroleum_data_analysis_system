<div class="table-responsive">    <form method="POST">@csrf
    <h5 style="margin-left: 5px; color: #aaa"> EFFLUENT WASTE DISCHARGE
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_effluent')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add EFFLUENT WASTE DISCHARGE Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_effluent', sessionStorage.getItem('url'),'downloadEffluentWasteDischargedTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload EFFLUENT WASTE DISCHARGE Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_effluent_waste_discharged/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download EFFLUENT WASTE DISCHARGE Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_eflluent_waste_discharged()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="effluent_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Company</th>
                    <th>Well Name</th>
                    <th>Spent WBM</th>
                    <th>Spent OBM</th>
                    <th>WBM Cuttings Generated</th>
                    <th>OBM Cuttings Generated</th>
                    <th>Waste Managers</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>
            </thead>
            <tbody>
                @if($effluent_waste_discharged)
                    @foreach($effluent_waste_discharged as $_effluent_waste_discharged)
                    @php $unResolved = request()->user()->unResolved($_effluent_waste_discharged->id, 'she_effluent_waste_discharged'); @endphp
                        <tr >
                            <th>{{$_effluent_waste_discharged->year}}</th>
                            <th>{{$_effluent_waste_discharged->month}}</th>
                            @if($_effluent_waste_discharged->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                                <th>{{substr($_effluent_waste_discharged->company?$_effluent_waste_discharged->company->company_name:'', 0, 30)}}
                            @endif
                            <th>{{$_effluent_waste_discharged->well_name}}</th>
                            <th>{{number_format($_effluent_waste_discharged->spent_wbm, 1)}}</th> 
                            <th>{{number_format(intval($_effluent_waste_discharged->spent_obm), 1)}}</th>
                            <th>{{number_format($_effluent_waste_discharged->wbm_generated, 1)}}</th> 
                            <th>{{number_format($_effluent_waste_discharged->obm_generated, 1)}}</th> 
                            <th>{{$_effluent_waste_discharged->waste_manager}}</th> 
                            <th style="text-align: right;">
                                @if($_effluent_waste_discharged->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_effluent_waste_discharged', {{$_effluent_waste_discharged->id}})" class="btn-sm pull-right" title="Delete Effuent Waste DISCHARGE"> <i class="fa fa-remove"></i>   </a> 

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_eflluent_waste_discharged({{$_effluent_waste_discharged->id}})" class="btn-sm pull-right" title="Edit EFFLUENT WASTE DISCHARGE"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$effluent_waste_discharged->appends(Request::capture()->except('page'))->render() }} 
    </div> <!-- end col -->



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

 
        $("#searchBtn").on('mouseover', function(e)
        { 
            var search_text = $('#dynamicsearch').val(); 
            formData = 
            {
                search_text:search_text,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('download-search-data')}}', formData, function(data, status, xhr) { });       
        }); 
    });

    //SORT SCRIPT
    sortAscDesc();

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/effluent_waste_discharged?p='+$pending);
        $('#effluent_waste_discharged').load('{{url('ajax')}}/effluent_waste_discharged?p='+$pending);
        sessionStorage.setItem('name','effluent_waste_discharged'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/effluent_waste_discharged?a='+$approve);
        $('#effluent_waste_discharged').load('{{url('ajax')}}/effluent_waste_discharged?a='+$approve);
        sessionStorage.setItem('name','effluent_waste_discharged'); 
    } 
</script>