<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Radiation Safety Permit Issued by Well Type 
        {{-- <i style="margin-left: 50px">Total : {{$radiation_safety_permit->count()}}</i>  --}} 
        <a data-toggle="tooltip" onclick="showmodal('add_rad_safe_perm')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Radiation Safety Permit Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_rad_perm', sessionStorage.getItem('url'), 'downloadRadiationSafetyPermitTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Radiation Safety Permit Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_radiation_safety_permit/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Radiation Safety Permit Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_radiation_permit()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="radiation_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month </th>
                    <th>Company </th>
                    <th>Well Type</th>
                    <th>Well Name </th>
                    <th>Concession </th>
                    <th>Radiation Permit Count</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>
            </thead>
            <tbody>
                @forelse($radiation_safety_permit as $rad_safety_permit)
                    <tr>
                        <th>{{$rad_safety_permit->year}}</th>
                        <th>{{$rad_safety_permit->month}}</th>
                        <th>{{$rad_safety_permit->company?$rad_safety_permit->company->company_name:''}}</th>
                        <th>{{$rad_safety_permit->well_type}}</th>
                        <th>{{$rad_safety_permit->well_name}}</th>
                        <th>{{$rad_safety_permit->concession}}</th>
                        <th>{{number_format($rad_safety_permit->count, 0)}}</th> 
                        <th style="text-align: right;">
                            @if($rad_safety_permit->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th> 
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_radiation_safety_permit', {{$rad_safety_permit->id}})" class="btn-sm pull-right" title="Delete Radiation Safety Permit"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_radiation_permit({{$rad_safety_permit->id}})" class="btn-sm pull-right" title="Edit Radiation Safety Permit"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{$radiation_safety_permit->appends(Request::capture()->except('page'))->render() }} 
    </div> <!-- end col -->



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
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/radiation_safety_permit?a='+$approve);
        $('#radiation_safety_permit').load('{{url('ajax')}}/radiation_safety_permit?a='+$approve);
        sessionStorage.setItem('name','radiation_safety_permit'); 
    } 
</script>