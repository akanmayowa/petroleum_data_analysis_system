<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Crude Export by Destination   <span class="unit-header"> Volume in MMbbls </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addexport_company')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Crude Export By Destination Company Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplexport_company', sessionStorage.getItem('url'), 'downloadCrudeCompanyTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Crude Export By Destination Company Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_crude_export_company/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Crude Export By Destination Company Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_company()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="export_comp_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Destination</th>
                <th>Country</th>
                <th>Company</th>
                <th>Jan </th>
                <th>Feb <i class="units"></i></th>
                <th>Mar <i class="units"></i></th>
                <th>Apr <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>Jun <i class="units"></i></th>
                <th>Jul <i class="units"></i></th>
                <th>Aug <i class="units"></i></th>
                <th>Sep <i class="units"></i></th>
                <th>Oct <i class="units"></i></th>
                <th>Nov <i class="units"></i></th>
                <th>Dec <i class="units"></i></th>   
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>                                         
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($dest_company)
                    @foreach($dest_company as $export_dest_comps)
                        @php $unResolved = request()->user()->unResolved($export_dest_comps->id, 'down_crude_export_by_company'); @endphp
                        <tr>  
                            <th>{{$export_dest_comps->year}}</th>
                            @if($export_dest_comps->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$export_dest_comps->region?$export_dest_comps->region->name:''}}</th>
                            @endif
                            @if($export_dest_comps->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$export_dest_comps->country?$export_dest_comps->country->country_name:''}}</th>
                            @endif
                            @if($export_dest_comps->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$export_dest_comps->company?$export_dest_comps->company->company_name:''}}</th>
                            @endif
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->january, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->febuary, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->march, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->april, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->may, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->june, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->july, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->august, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->september, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->october, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->november, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($export_dest_comps->december, 2)}}</th>   
                            <th style="text-align: right;">
                                @if($export_dest_comps->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_crude_export_by_company', {{$export_dest_comps->id}})" class="btn-sm pull-right" title="Delete Export By Company Destination"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_export_by_company({{$export_dest_comps->id}})" class="btn-sm pull-right" title="View Crude Export By Destination Company"> <i class="fa fa-eye"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_export_by_company({{$export_dest_comps->id}})" class="btn-sm pull-right" title="Edit Crude Export By Destination Company"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$dest_company->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/dest_company?p='+$pending);
        $('#dest_company').load('{{url('ajax')}}/dest_company?p='+$pending);
        sessionStorage.setItem('name','dest_company'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/dest_company?a='+$approve);
        $('#dest_company').load('{{url('ajax')}}/dest_company?a='+$approve);
        sessionStorage.setItem('name','dest_company'); 
    } 
</script>