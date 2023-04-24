<div class="table-responsive">   <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Petroleum Products Importation by Market Segment  <span class="unit-header"> Volume in Litres </span>
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_ref_production')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Petroleum Products Importation by Market Segment Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_ref_production', sessionStorage.getItem('url'), 'downloadRefProductionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Petroleum Products Importation by Market Segment Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_refinery_production/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Petroleum Products Importation by Market Segment Excel Here">  <i class="fa fa-download"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_ref_prod()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a> 
        @endif
       
    </h5>   </form>  
        <table class="table table-striped table-sm mb-0" id="ref_prod_table">
            <thead class="thead-dark">
            <tr>
                <th>Market</th>
                <th>Product</th>
                <th>Year</th>
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
                <th style=""></th>
            </tr>

            </thead>
            <tbody>
                @if($ref_production)
                    @foreach($ref_production as $_ref_production)
                        @php $unResolved = request()->user()->unResolved($_ref_production->id, 'down_refinary_production'); @endphp
                        <tr>
                            @if($_ref_production->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                             <th style="">
                                {{$_ref_production->market_segment?$_ref_production->market_segment->market_segment_name:''}}
                            </th>
                            @endif
                            @if($_ref_production->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                             <th style="">
                                {{$_ref_production->product?$_ref_production->product->product_name:''}}
                            </th> 
                            @endif
                             <th style="">{{$_ref_production->year}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->january, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->febuary, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->march, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->april, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->may, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->june, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->july, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->august, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->september, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->october, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->november, 2)}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres" style="">{{number_format($_ref_production->december, 2)}}</th>
                            <th style="text-align: right;">
                                @if($_ref_production->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_refinary_production', {{$_ref_production->id}})" class="btn-sm pull-right" title="Delete Refinery Production"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_refinery_production({{$_ref_production->id}})" class="btn-sm pull-right" title="View Petroleum Products Importation by Market Segment"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_refinery_production({{$_ref_production->id}})" class="btn-sm pull-right" title="Edit Petroleum Products Importation by Market Segment"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$ref_production->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/ref_production?p='+$pending);
        $('#ref_production').load('{{url('ajax')}}/ref_production?p='+$pending);
        sessionStorage.setItem('name','ref_production'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ref_production?a='+$approve);
        $('#ref_production').load('{{url('ajax')}}/ref_production?a='+$approve);
        sessionStorage.setItem('name','ref_production'); 
    }
</script>