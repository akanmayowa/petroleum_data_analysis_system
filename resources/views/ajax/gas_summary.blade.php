<div class="table-responsive">   <form method="POST">@csrf   
    <h5 style="margin-left: 5px; color: #aaa"> Summary of Gas Production 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addgas_summary')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Summary of Gas Production Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplgas_summary', sessionStorage.getItem('url'),'downloadGasProductionSummTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Summary of Gas Production Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_production_summary/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Summary of Gas Production Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_prod') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_sum()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
    <table class="table table-striped table-sm mb-0" id="gas_summary_table">
        <thead class="thead-dark">
            <tr>                        
                <th>Year</th>                                
                <th>Month</th>                      
                <th>Field</th>                 
                <th>Company</th>
                <th>AG <i class="units">Mscf</i></th>
                <th>NAG <i class="units">Mscf</i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

        </thead>
        <tbody>
            @forelse($gas_summary as $_gas_summary)
                <tr>
                    @php $unResolved = request()->user()->unResolved($_gas_summary->id, 'gas_summary_of_gas_production'); @endphp
                    <th>{{$_gas_summary->year}}</th>
                    <th>{{$_gas_summary->month}}</th> 
                    @if($_gas_summary->pending_id > 0 && $unResolved->column_1 != '')
                        <th class="null">{{$unResolved->column_1}}</th>
                    @else
                    <th>{{$_gas_summary->field?$_gas_summary->field->field_name:''}}</th>
                    @endif
                    @if($_gas_summary->pending_id > 0 && $unResolved->column_2 != '')
                        <th class="null">{{$unResolved->column_2}}</th>
                    @else 
                    <th>{{$_gas_summary->company?$_gas_summary->company->company_name:''}}</th> 
                    @endif 
                    <th data-toggle="tooltip" title="Volume In Mscf">{{number_format($_gas_summary->ag, 2)}}</th>
                    <th data-toggle="tooltip" title="Volume In Mscf">{{number_format($_gas_summary->nag, 2)}}</th>
                    <th style="text-align: right;">
                        @if($_gas_summary->stage_id == 0) 
                              <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                        @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                        @endif 
                    </th>
                    <th>
                        <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_summary_of_gas_production', {{$_gas_summary->id}})" class="btn-sm pull-right" title="Delete Gas Production Summary"> <i class="fa fa-remove"></i>   </a>

                        <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_summary({{$_gas_summary->id}})" class="btn-sm pull-right" title="View Summary of Gas Production"> <i class="fa fa-eye"></i>   </a>

                        <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" data-target=""  onclick="load_gas_summary({{$_gas_summary->id}})" class="btn-sm pull-right" title="Edit Summary of Gas Production"> <i class="fa fa-pencil"></i>    </a>
                    </th>  
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    {{$gas_summary->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/summary?p='+$pending);
        $('#summary').load('{{url('ajax')}}/summary?p='+$pending);
        sessionStorage.setItem('name','summary'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/summary?a='+$approve);
        $('#summary').load('{{url('ajax')}}/summary?a='+$approve);
        sessionStorage.setItem('name','summary'); 
    } 
</script>