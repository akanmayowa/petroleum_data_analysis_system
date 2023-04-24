<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Petitions Received
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_pet_received')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Petitions Received Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_pet_received', sessionStorage.getItem('url'),'downloadPetitionsReceivedTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Petitions Received Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_petitions_received/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Petitions Received Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_pettition_rec()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="pett_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Petitioner</th>
                    <th>Petitionee</th>
                    <th>Category</th>
                    <th>Action Taken</th>
                    <th>Status</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($pettitions_receieved)
                    @foreach($pettitions_receieved as $_pettitions_receieved)
                    @php $unResolved = request()->user()->unResolved($_pettitions_receieved->id, 'she_pettitions_received'); @endphp
                        <tr >
                            <th>{{$_pettitions_receieved->year}}</th>
                            <th>{{$_pettitions_receieved->month}}</th> 
                            <th>{{$_pettitions_receieved->petitioner}}</th>
                            <th>{{$_pettitions_receieved->petitionee}}</th>
                            @if($_pettitions_receieved->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$_pettitions_receieved->category?$_pettitions_receieved->category->category_name:''}}</th>
                            @endif
                            @if($_pettitions_receieved->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$_pettitions_receieved->action?$_pettitions_receieved->action->action_name:''}}</th>
                            @endif
                            @if($_pettitions_receieved->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$_pettitions_receieved->status?$_pettitions_receieved->status->status_name:''}}</th>
                            @endif 
                            <th style="text-align: right;">
                                @if($_pettitions_receieved->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th> 
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_pettitions_received', {{$_pettitions_receieved->id}})" class="btn-sm pull-right" title="Delete Pettition Received"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_pettitions_received({{$_pettitions_receieved->id}})" class="btn-sm pull-right" title="Edit Petitions Received"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$pettitions_receieved->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/pettitions_receieved?a='+$approve);
        $('#pettitions_receieved').load('{{url('ajax')}}/pettitions_receieved?a='+$approve);
        sessionStorage.setItem('name','pettitions_receieved'); 
    } 
</script>