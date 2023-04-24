<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Geophysical / Geotechnical Data  
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('addseis_data')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Seismic Data Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplseis_data', sessionStorage.getItem('url'), 'downloadSeismicTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Seismic Data Acquisition  Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_seismic_data/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Seismic Data Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_seismic_data') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_seismic()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="seismic_data_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Location</th>
                <th>Terrain</th>
                <th>Geophysical</th>
                <th>Geotechnical</th>
                <th>Activity</th>
                <th>Approved Converage sq.km</th>
                <th>Actual Converage sq.km</th>
                <th>Custodian</th>
                <th>Status</th>
                <th>Remark</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($seismic_data)
                    @foreach($seismic_data as $_seismic_data)
                        @php $unResolved = request()->user()->unResolved($_seismic_data->id, 'up_seismic_data'); @endphp
                        <tr>          
                            <th>{{$_seismic_data->year}}</th>   
                            <th>{{$_seismic_data->month}}</th> 
                            <th>{{$_seismic_data->field_id}}</th>
                            @if($_seismic_data->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else    
                            <th>{{$_seismic_data->terrain?$_seismic_data->terrain->terrain_name:''}}</th>
                            @endif
                            @if($_seismic_data->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$_seismic_data->geophysical?$_seismic_data->geophysical->geophysical_name:''}}</th>
                            @endif
                            @if($_seismic_data->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$_seismic_data->geotechnical?$_seismic_data->geotechnical->geotechnical_name:''}}</th>
                            @endif
                            @if($_seismic_data->pending_id > 0 && $unResolved->column_4 != '')
                                <th class="null">{{$unResolved->column_4}}</th>
                            @else 
                            <th>{{$_seismic_data->seismic_types?$_seismic_data->seismic_types->seismic_type_name:''}}</th>
                            @endif
                            <th data-toggle="tooltip" title="Volume In Sq-Km">{{number_format($_seismic_data->approved_coverage, 2)}}</th>
                            <th data-toggle="tooltip" title="Volume In Sq-Km">{{number_format($_seismic_data->actual_coverage, 2)}}</th>
                            <th>{{$_seismic_data->created_by}}</th>
                            @if($_seismic_data->pending_id > 0 && $unResolved->column_5 != '')
                                <th class="null">{{$unResolved->column_5}}</th>
                            @else 
                            <th>{{$_seismic_data->status_category?$_seismic_data->status_category->status:''}}</th>
                            @endif
                            <th>{{$_seismic_data->remark}}</th>   
                            <th style="text-align: right;">
                                @if($_seismic_data->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_seismic_data', {{$_seismic_data->id}})" class="btn-sm pull-right" title="Delete Seismic Data"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_seismic_data({{$_seismic_data->id}})" class="btn-sm pull-right" title="View Seismic Data"> <i class="fa fa-eye"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_seismic_data({{$_seismic_data->id}})" class="btn-sm pull-right" title="Edit Seismic Data"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$seismic_data->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/seismic_data?p='+$pending);
        $('#seismic_data').load('{{url('ajax')}}/seismic_data?p='+$pending);
        sessionStorage.setItem('name','seismic_data'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/seismic_data?a='+$approve);
        $('#seismic_data').load('{{url('ajax')}}/seismic_data?a='+$approve);
        sessionStorage.setItem('name','seismic_data'); 
    }
</script>