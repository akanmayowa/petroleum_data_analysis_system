<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Well Completion Activities 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_completion')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Well Completion Activities Here"> <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_completion', sessionStorage.getItem('url'), 'downloadWellCompletionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Well Completion Activities Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_well_completion/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Well Completion Activities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
         <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-success mb-1 btn-sm pull-right text-white mr-2"> Approve </button> 
     @endif
     
       </h5>  
     </form>
    

        <table class="table table-striped table-sm mb-0" id="completion_well_table">
            <thead class="thead-dark">
            <tr>
                <th>Years</th>
                <th>Month</th>
                <th>Field</th>
                <th>Well Type</th>
                <th>Completion Type</th>
                <th>Number of Wells</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($completion)
                    @foreach($completion as $completions)
                        @php $unResolved = request()->user()->unResolved($completions->id, 'up_well_completion'); @endphp
                        <tr>
                            <th>{{$completions->year}}</th>  
                            <th>{{$completions->month}}</th>
                            @if($completions->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$completions->field?$completions->field->field_name:''}}</th>
                            @endif
                            @if($completions->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$completions->welltype?$completions->welltype->type_name:''}}</th>
                            @endif
                            @if($completions->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$completions->type?$completions->type->type_name:''}}</th>
                            @endif  
                            {{-- <th>
                                @if($completions->type_id == 1) Initial Completion 
                                @elseif($completions->type_id == 2) Smart-Completion 
                                @else N/A @endif 
                            </th> --}}
                            <th>{{$completions->number_of_well}}</th>  
                            <th style="text-align: right;">
                                @if($completions->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_well_completion', {{$completions->id}})" class="btn-sm pull-right" title="Delete Well Completion"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_well_completion({{$completions->id}})" class="btn-sm pull-right" title="Edit Well Completion Activities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$completion->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->

<div class="container-fluid">
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Well Completion Activities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="table-responsive">
        <form method="post" action="{{ route('approveWellCompletionActivities') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-sm btn-success float right m-2">
                    Approved
                </button>
        <table class="table table-striped table-sm mb-0" id="completion_well_table">
            <thead class="thead-dark">
            <tr>
           <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th>
               <th>Years</th>
                <th>Month</th>
                <th>Field</th>
                <th>Well Type</th>
                <th>Completion Type</th>
                <th>Number of Wells</th>
            </tr>
		 </thead>
            <tbody>
                    @foreach($completion as $completions)
                <th class="text-center"><input name='id[]' type="checkbox" id="checkItem" value="<?php echo $completions->id; ?>"></th>
                            <th>{{$completions->year}}</th>  
                            <th>{{$completions->month}}</th>
                            <th>{{$completions->field?$completions->field->field_name:''}}</th>
                            <th>{{$completions->welltype?$completions->welltype->type_name:''}}</th>
                            <th>{{$completions->type?$completions->type->type_name:''}}</th>
                            <th>{{$completions->number_of_well}}</th>  
                        </tr>
                    @endforeach
            </tbody>
        </table>
        {{$completion->appends(Request::capture()->except('page'))->render() }}                   
       </form>
  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

<script type="text/javascript">
    $(function()
    {
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
        sessionStorage.setItem('url','{{url('ajax')}}/completion?p='+$pending);
        $('#completion').load('{{url('ajax')}}/completion?p='+$pending);
        sessionStorage.setItem('name','completion'); 
    } 

    function sortByApproved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/completion?a='+$pending);
        $('#completion').load('{{url('ajax')}}/completion?a='+$pending);
        sessionStorage.setItem('name','completion'); 
    }    
</script>