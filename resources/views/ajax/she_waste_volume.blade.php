<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Drilled Waste Volume
        <a data-toggle="tooltip" onclick="showmodal('add_waste_vol')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Drilling Waste Volume Here"> <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_waste_vol', sessionStorage.getItem('url'),'downloadWasteVolumeTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Drilling Waste Volume Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_waste_volumes/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Drilling Waste Volume Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_drilled_waste') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_waste()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="waste_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th data-toggle="tooltip" title="Water Based Mud Cushion">Sum Of WBMC <i class="units">Mt</i></th>
                    <th data-toggle="tooltip" title="Oil Based Mud Cushion">Sum Of OBMC <i class="units">Mt</i></th>
                    <th data-toggle="tooltip" title="Spent Water Based Mud">Sum Of Spent WBM <i class="units">Mt</i> </th>
                    <th data-toggle="tooltip" title="Spent Oil Based Mud">Sum Of Spent OBM <i class="units">Mt</i> </th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($waste_vols)
                    @foreach($waste_vols as $_waste_vols)
                    <tr>
                        <th>{{$_waste_vols->year}}</th>
                        <th>{{$_waste_vols->month}}</th>
                        <th data-toggle="tooltip" title="Capacity In Mt">{{number_format($_waste_vols->sum_of_wbmc, 1)}}</th>
                        <th data-toggle="tooltip" title="Capacity In Mt">{{number_format($_waste_vols->sum_of_obmc, 1)}}</th>
                        <th data-toggle="tooltip" title="Capacity In Mt">{{number_format($_waste_vols->sum_of_spent_wbm, 1)}}</th>
                        <th data-toggle="tooltip" title="Capacity In Mt">{{number_format($_waste_vols->sum_of_spent_obm, 1)}}</th>  
                        <th style="text-align: right;">
                            @if($_waste_vols->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th> 
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_drilling_waste_volumes', {{$_waste_vols->id}})" class="btn-sm pull-right" title="Delete Waste Volume"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_waste_volume({{$_waste_vols->id}})" class="btn-sm pull-right" title="View Drilling Waste Volume"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_waste_volume({{$_waste_vols->id}})" class="btn-sm pull-right" title="Edit Drilling Waste Volume"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="industry_paginate">
        {{$waste_vols->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/waste_vol?a='+$approve);
        $('#waste_vol').load('{{url('ajax')}}/waste_vol?a='+$approve);
        sessionStorage.setItem('name','waste_vol'); 
    } 
</script>