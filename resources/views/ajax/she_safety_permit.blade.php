<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Offshore Safety Permit (OSP) Summary 
        <a data-toggle="tooltip" onclick="showmodal('add_safe_perm')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Offshore Safety Permit (OSP) Summary Here"> <i class="fa fa-plus"> New</i> </a>
                    
        <a data-toggle="tooltip" onclick="showmodal('upl_safe_perm', sessionStorage.getItem('url'),'downloadSafetyPermitTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Offshore Safety Permit (OSP) Summary Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_offshore_safety_permit/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" 
        class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Offshore Safety Permit (OSP) Summary  Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_safety_permit') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_osp()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="safety_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Personnel Registered</th>
                    <th>Personnel Captured</th>
                    <th>Permit Issued</th>
                    <th>Uploaded On</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style=""> </th>
                </tr>

            </thead>
            <tbody>
                @if($safety_permit)
                    @foreach($safety_permit as $_safety_permit)
                    <tr>
                        <th>{{$_safety_permit->year}}</th>
                        <th>{{number_format($_safety_permit->personnel_registered, 2)}}</th>
                        <th>{{number_format($_safety_permit->personnel_captured, 2)}}</th>
                        <th>{{number_format($_safety_permit->permits_issued, 2)}}</th>
                        <th>{{\Carbon\Carbon::parse($_safety_permit->created_at)->diffForHumans()}}</th>   
                        <th style="text-align: right;">
                            @if($_safety_permit->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>  
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_offshore_safety_permit', {{$_safety_permit->id}})" class="btn-sm pull-right" title="Delete Safety Permit"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_safety_permit({{$_safety_permit->id}})" class="btn-sm pull-right" title="View Offshore Safety Permit (OSP) Summary"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_safety_permit({{$_safety_permit->id}})" class="btn-sm pull-right" title="Edit Offshore Safety Permit (OSP) Summary"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="industry_paginate">
        {{$safety_permit->appends(Request::capture()->except('page'))->render() }} 
    </div>
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
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/safety_permit?a='+$approve);
        $('#safety_permit').load('{{url('ajax')}}/safety_permit?a='+$approve);
        sessionStorage.setItem('name','safety_permit'); 
    } 
</script>