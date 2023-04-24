<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Jetty Facilities
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_jet')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Jetty Facilities Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_jet', sessionStorage.getItem('url'), 'downloadJettyTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Jetty Facilities Here">  <i class="fa fa-upload"> Upload</i> </a>
       
        <a href="{{url('downstream/download_jetty/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Jetty Facilities Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_jetty()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="jet_table">
            <thead class="thead-dark">
            <tr>
                <th>Year </th>
                <th>Jetty</th>
                <th>State</th>
                <th>Location</th>
                <th>Ownership</th>
                <th>Products</th>
                <th>Handling Capacity <i class="units">MT</i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($plant_jetty)
                    @foreach($plant_jetty as $plant_jetties)
                        @php $unResolved = request()->user()->unResolved($plant_jetties->id, 'down_jetty'); @endphp
                        <tr> 
                            <th>{{$plant_jetties->year}} </th>
                            <th>{{$plant_jetties->jetty_name}} </th>
                            @if($plant_jetties->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$plant_jetties->state?$plant_jetties->state->state_name:''}}</th>
                            @endif
                            <th>{{$plant_jetties->location}} </th>
                            @if($plant_jetties->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$plant_jetties->ownership?$plant_jetties->ownership->ownership_name:''}} </th>
                            @endif
                            @if($plant_jetties->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$plant_jetties->product?$plant_jetties->product->product_name:''}} </th>
                            @endif
                            <th data-toggle="tooltip" title="Capacity In MT">{{number_format($plant_jetties->design_capacity, 2)}}</th>
                            <th style="text-align: right;">
                                @if($plant_jetties->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_jetty', {{$plant_jetties->id}})" class="btn-sm pull-right" title="Delete Jetty Facilities"> <i class="fa fa-remove"></i>   </a>

                               {{--  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_jetty({{$plant_jetties->id}})" class="btn-sm pull-right" title="View Jetty Facilities"> <i class="fa fa-list"></i>   </a> --}}

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_jetty({{$plant_jetties->id}})" class="btn-sm pull-right" title="Edit Jetty Facilities"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$plant_jetty->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/plant_jetty?p='+$pending);
        $('#plant_jetty').load('{{url('ajax')}}/plant_jetty?p='+$pending);
        sessionStorage.setItem('name','plant_jetty'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/plant_jetty?a='+$approve);
        $('#plant_jetty').load('{{url('ajax')}}/plant_jetty?a='+$approve);
        sessionStorage.setItem('name','plant_jetty'); 
    }
</script>