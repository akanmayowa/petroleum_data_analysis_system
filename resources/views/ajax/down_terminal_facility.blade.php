<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Terminal Facilities
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_term')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Terminal Facilities Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_term', sessionStorage.getItem('url'), 'downloadTermTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Terminal Facilities Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_terminal/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Terminal Facilities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_terminal()" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="term_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Terminal</th>
                <th>Facility Type</th>
                <th>State</th>
                <th>Coordinates</th>
                <th>Ownership</th>
                <th>Products</th>
                <th>Storage Capacity <i class="units">MT</i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($plant_terminal)
                    @foreach($plant_terminal as $plant_terminals)
                        @php $unResolved = request()->user()->unResolved($plant_terminals->id, 'down_terminal'); @endphp
                        <tr> 
                            <th>{{$plant_terminals->year}} </th>
                            <th>{{$plant_terminals->terminal_name}} </th>
                            @if($plant_terminals->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$plant_terminals->facility_type?$plant_terminals->facility_type->facility_type_name:''}}</th>
                            @endif
                            @if($plant_terminals->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$plant_terminals->state?$plant_terminals->state->state_name:''}}</th>
                            @endif
                            <th>{{$plant_terminals->location}} </th>
                            @if($plant_terminals->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$plant_terminals->ownership?$plant_terminals->ownership->ownership_name:''}} </th>
                            @endif
                            @if($plant_terminals->pending_id > 0 && $unResolved->column_4 != '')
                                <th class="null">{{$unResolved->column_4}}</th>
                            @else
                            <th>{{$plant_terminals->product?$plant_terminals->product->product_name:''}} </th>
                            @endif
                            <th data-toggle="tooltip" title="Capacity In MT">{{number_format($plant_terminals->design_capacity, 2)}}</th>
                            <th style="text-align: right;">
                                @if($plant_terminals->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_terminal', {{$plant_terminals->id}})" class="btn-sm pull-right" title="Delete Plant Terminals"> <i class="fa fa-remove"></i>   </a>

                            {{--  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_terminal({{$plant_terminals->id}})" class="btn-sm pull-right" title="View Terminal Facilities"> <i class="fa fa-eye"></i>   </a> --}}

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_terminal({{$plant_terminals->id}})" class=" btn-sm pull-right" title="Edit Terminal Facilities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$plant_terminal->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/plant_terminal?p='+$pending);
        $('#plant_terminal').load('{{url('ajax')}}/plant_terminal?p='+$pending);
        sessionStorage.setItem('name','plant_terminal'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/plant_terminal?a='+$approve);
        $('#plant_terminal').load('{{url('ajax')}}/plant_terminal?a='+$approve);
        sessionStorage.setItem('name','plant_terminal'); 
    }
</script>