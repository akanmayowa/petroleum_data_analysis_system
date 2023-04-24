<div class="table-responsive">   <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Oil Spill Contingency Plan Activation
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_spill_conti')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Oil Spill Contingency Here">  <i class="fa fa-plus"> New</i> </a>
                    
        <a data-toggle="tooltip" onclick="showmodal('upl_contingency', sessionStorage.getItem('url'),'downloadOilSpillContingencyTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Oil Spill Contingency Here"> <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_oil_spill_contingency/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Oil Spill Contingency Excel Here">  <i class="fa fa-download"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_contigency()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="os_conti_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Zones</th>
                    <th>Facility Type</th>
                    <th>Terrain</th>
                    <th>No of Companies </th>
                    <th>Actual No of Companies</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style=""> </th>
                </tr>

            </thead>
            <tbody>
                @if($oil_spill_contingency)
                    @foreach($oil_spill_contingency as $oil_spill_contingencies)
                    @php $unResolved = request()->user()->unResolved($oil_spill_contingencies->id, 'SheOilSpillContingency'); @endphp
                        <tr >
                            <th>{{$oil_spill_contingencies->year}}</th>
                            @if($oil_spill_contingencies->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$oil_spill_contingencies->zone?$oil_spill_contingencies->zone->zone_name:''}}</th>
                            @endif
                            @if($oil_spill_contingencies->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$oil_spill_contingencies->type?$oil_spill_contingencies->type->type_name:''}}</th>
                            @endif
                            @if($oil_spill_contingencies->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$oil_spill_contingencies->terrain?$oil_spill_contingencies->terrain->terrain_name:''}}</th>
                            @endif
                            <th>{{$oil_spill_contingencies->no_of_company}}</th>
                            <th>{{$oil_spill_contingencies->actual_no_of_company}}</th> 
                            <th style="text-align: right;">
                                @if($oil_spill_contingencies->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>  
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\SheOilSpillContingency', {{$oil_spill_contingencies->id}})" class="btn-sm pull-right" title="Delete Oil Spill Contingency"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_contingency({{$oil_spill_contingencies->id}})" class="btn-sm pull-right" title="Edit Oil Spill Contingency"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$oil_spill_contingency->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/oil_spill_contingency?p='+$pending);
        $('#oil_spill_contingency').load('{{url('ajax')}}/oil_spill_contingency?p='+$pending);
        sessionStorage.setItem('name','oil_spill_contingency'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/oil_spill_contingency?a='+$approve);
        $('#oil_spill_contingency').load('{{url('ajax')}}/oil_spill_contingency?a='+$approve);
        sessionStorage.setItem('name','oil_spill_contingency'); 
    } 
</script>


