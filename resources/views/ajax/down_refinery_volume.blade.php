<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Domestic Production - Products Refined.   <span class="unit-header"> Volume in Litres </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_downstream')) --}}
            <a data-toggle="tooltip" onclick="showmodal('add_ref_volume')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Refinery Production Volume Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
   
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_downstream')) --}}
            <a data-toggle="tooltip" onclick="showmodal('upl_ref_volume', sessionStorage.getItem('url'),'downloadRefineryVolumeTempRefineryVolume')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Refinery Production Volume Here">  <i class="fa fa-upload"> Upload</i> </a>
        {{-- @endif --}}

        <a href="{{url('downstream/download_refinery_production_volume/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Refinery Production Volume Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ref_volume()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form> 
        <table class="table table-striped table-sm mb-0" id="ref_vol_table">
            <thead class="table-dark">
            <tr>
                <th>Year</th>
                <th>Refinery</th>
                <th>Product</th>
                <th>Stream</th>
                <th>Jan <i class="units"></i></th>
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
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($ref_volume)
                    @foreach($ref_volume as $_ref_volume)
                        @php $unResolved = request()->user()->unResolved($_ref_volume->id, 'down_refinery_production_volumes'); @endphp
                        <tr> 
                             <th>{{$_ref_volume->year}}</th>
                            @if($_ref_volume->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                             <th>{{$_ref_volume->refinery?$_ref_volume->refinery->plant_location_name:''}}</th>
                            @endif
                            @if($_ref_volume->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                             <th>{{$_ref_volume->product?$_ref_volume->product->product_name:''}}</th> 
                            @endif
                            @if($_ref_volume->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else  
                             <th>{{$_ref_volume->stream?$_ref_volume->stream->stream_name:''}}</th> 
                            @endif
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->january, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->febuary, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->march, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->april, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->may, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->june, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->july, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->august, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->september, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->october, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->november, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{ number_format($_ref_volume->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_ref_volume->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_refinery_production_volumes', {{$_ref_volume->id}})" class="btn-sm pull-right" title="Delete Refinery Volume"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_volume({{$_ref_volume->id}})" class="btn-sm pull-right" title="View Refinery Production Volume"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_volume({{$_ref_volume->id}})" class="btn-sm pull-right" title="Edit Refinery Production Volume"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$ref_volume->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/ref_volume?p='+$pending);
        $('#ref_volume').load('{{url('ajax')}}/ref_volume?p='+$pending);
        sessionStorage.setItem('name','ref_volume'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_volume?a='+$approve);
        $('#ref_volume').load('{{url('ajax')}}/ref_volume?a='+$approve);
        sessionStorage.setItem('name','ref_volume'); 
    } 
</script>