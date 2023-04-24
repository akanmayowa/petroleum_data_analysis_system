<div class="table-responsive">      <form method="POST">@csrf   
    <h5 style="margin-left: 5px; color: #aaa"> Domestic Gas Obligation   <span class="unit-header"> Volume in MMSCF/D </span>
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
            @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif</a>

        <a data-toggle="tooltip" onclick="showmodal('addgas_obli')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Domestic Gas Obligation  Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplgas_obli', sessionStorage.getItem('url'),'downloadGasObligationTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Domestic Gas Obligation Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_supply_obligation/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Domestic Gas Obligation Excel Here">  <i class="fa fa-download"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_dom_gas_obligation') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_obli()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
    <div  data-pattern="priority-columns">
    <table class="table table-striped table-sm mb-0" id="obligation_table" >
        <thead class="thead-dark">
            <tr>
                <th data-priority="2"  >Year</th>
                <th data-priority="3"  >Company</th>
                <th data-priority="4"  >Obligation <i class="units">MMSCF/D</i></th>
                <th data-priority="5"  >Uploaded On</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th data-priority="6"  style="">  </th>
            </tr>
        </thead>
        <tbody>
            @if($gas_obligation)
                @foreach($gas_obligation as $gas_obligations)
                    <tr>
                        @php $unResolved = request()->user()->unResolved($gas_obligations->id, 'gas_domestic_gas_obligation'); @endphp
                        <th>{{$gas_obligations->year}}</th>
                        @if($gas_obligations->pending_id > 0 && $unResolved->column_1 != '')
                            <th class="null">{{$unResolved->column_1}}</th>
                        @else
                        <th>{{$gas_obligations->company?$gas_obligations->company->company_name:''}}</th> 
                        @endif
                        <th data-toggle="tooltip" title="Volume In MMSCF/D">{{number_format($gas_obligations->performance_obligation, 2)}}</th>
                        <th>{{\Carbon\Carbon::parse($gas_obligations->created_at)->diffForHumans()}}</th>
                        <th style="text-align: right;">
                            @if($gas_obligations->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>  
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_domestic_gas_obligation', {{$gas_obligations->id}})" class="btn-sm pull-right" title="Delete Gas Obligation"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_obligation({{$gas_obligations->id}})" class="btn-sm pull-right" title="View Domestic Gas Obligation"> <i class="fa fa-eye"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_obligation({{$gas_obligations->id}})" class="btn-sm pull-right" title="Edit Domestic Gas Obligation"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
    {{$gas_obligation->appends(Request::capture()->except('page'))->render() }} 
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

    function sortByUnresolved($pending=0)
    { 
        sessionStorage.setItem('url','{{url('ajax')}}/obligation?p='+$pending);
        $('#obligation').load('{{url('ajax')}}/obligation?p='+$pending);
        sessionStorage.setItem('name','obligation');
    }  
    function sortByApproved($approve=0)
    { 
        sessionStorage.setItem('url','{{url('ajax')}}/obligation?a='+$approve);
        $('#obligation').load('{{url('ajax')}}/obligation?a='+$approve);
        sessionStorage.setItem('name','obligation');
    }
</script>