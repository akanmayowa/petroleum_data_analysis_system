<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Lubricant blending plant
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_license_marketer')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add lubricant blending plant Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_license_marketer', sessionStorage.getItem('url'), 'downloadBaseOilTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload lubricant blending plant Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('downstream/download_license_marketer_storage/xlsx')}}" data-toggle="tooltip" id="searchBtn" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download lubricant blending plant Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_marketer()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="lic_mak_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Market Segment</th>
                <th>Company</th>
                <th>Location</th>
                <th>Storage Capacity <i class="units">Litres</i></th>
                <th>Uploaded On</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($l_marketer)
                    @foreach($l_marketer as $_l_marketer)
                        @php $unResolved = request()->user()->unResolved($_l_marketer->id, 'down_licensed_oil_makerters'); @endphp
                        <tr> 
                             <th>{{$_l_marketer->year}}</th>
                            @if($_l_marketer->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_l_marketer->market_category?$_l_marketer->market_category->market_segment_name:''}}</th>
                            @endif
                            @if($_l_marketer->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$_l_marketer->company?$_l_marketer->company->company_name:''}}</th>
                            @endif 
                            <th>{{$_l_marketer->location_id}}</th>
                            <th data-toggle="tooltip" title="Volume In Litres">{{(number_format($_l_marketer->storage_capacity, 1))}}</th>
                            <th>{{\Carbon\Carbon::parse($_l_marketer->created_at)->diffForHumans()}}</th>
                            <th style="text-align: right;">
                                @if($_l_marketer->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_licensed_oil_makerters', {{$_l_marketer->id}})" class="btn-sm pull-right" title="Delete Lube Blending Plant"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_license_marketer({{$_l_marketer->id}})" class="btn-sm pull-right" title="View lubricant blending plant"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_license_marketer({{$_l_marketer->id}})" class="btn-sm pull-right" title="Edit lubricant blending plant"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$l_marketer->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/l_marketer?p='+$pending);
        $('#l_marketer').load('{{url('ajax')}}/l_marketer?p='+$pending);
        sessionStorage.setItem('name','l_marketer'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/l_marketer?a='+$approve);
        $('#l_marketer').load('{{url('ajax')}}/l_marketer?a='+$approve);
        sessionStorage.setItem('name','l_marketer'); 
    } 
</script>