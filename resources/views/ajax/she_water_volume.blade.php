<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Produced Water Volume 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_water_vol')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Produced Water Volume Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_water_vol', sessionStorage.getItem('url'),'downloadWaterVolumesTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Produced Water Volume Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_water_volumes/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Produced Water Volume Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_produced_water') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_water()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="water_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Company</th>
                    <th>Facility</th>
                    <th>Terrain</th>
                    <th>Concession</th>
                    <th>Volume <i class="units">Bbl</i></th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($water_vols)
                    @foreach($water_vols as $_water_vols)
                    @php $unResolved = request()->user()->unResolved($_water_vols->id, 'she_water_volumes_generated'); @endphp
                    <tr>
                        <th>{{$_water_vols->year}}</th>
                        <th>{{$_water_vols->month}}</th>
                        @if($_water_vols->pending_id > 0 && $unResolved->column_1 != '')
                            <th class="null">{{$unResolved->column_1}}</th>
                        @else
                        <th>{{$_water_vols->company?$_water_vols->company->company_name:''}}</th>
                        @endif
                        <th>{{$_water_vols->facility_id}}</th>
                        <th>{{$_water_vols->terrain}}</th>
                        <th data-toggle="tooltip" title="Depth in ft">{{$_water_vols->concession_id}}</th>
                        <th data-toggle="tooltip" title="Volume In Bbl">{{number_format($_water_vols->volume, 1)}}</th>  
                        <th style="text-align: right;">
                            @if($_water_vols->stage_id == 0)
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th> 
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_water_volumes_generated', {{$_water_vols->id}})" class="btn-sm pull-right" title="Delete Water volume"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_water_volume({{$_water_vols->id}})" class="btn-sm pull-right" title="View Produced Water Volume"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_water_volume({{$_water_vols->id}})" class="btn-sm pull-right" title="Edit Produced Water Volume"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="industry_paginate">
        {{$water_vols->appends(Request::capture()->except('page'))->render() }} 
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

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/water_vol?p='+$pending);
        $('#water_vol').load('{{url('ajax')}}/water_vol?p='+$pending);
        sessionStorage.setItem('name','water_vol'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/water_vol?a='+$approve);
        $('#water_vol').load('{{url('ajax')}}/water_vol?a='+$approve);
        sessionStorage.setItem('name','water_vol'); 
    } 
</script>