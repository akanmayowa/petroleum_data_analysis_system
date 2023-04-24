<div class="table-responsive">        <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Revenue Projected Summary    {{$rate}}
        <a data-toggle="tooltip" onclick="showmodal('add_revenue_pro')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Revenue Projected Summary Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('upl_revenue_pro', sessionStorage.getItem('url'),'downloadRevenueProjectedTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Revenue Projected Summary Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('economics/download_revenue_projected/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Revenue Projected Summary Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_projected') || (\Auth::user()->delegate_role == 'Revenue' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_proj()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif      
    </h5>    </form>
        <table class="table table-striped table-sm mb-0" id="projected_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Oil Royalty</th>
                    <th>Gas Sales Royalty</th>
                    <th>Gas Flare Payment</th>
                    <th>Concession Rentals</th>
                    <th>MOR</th>
                    <th>Signature Bonus</th>
                    <th>Total</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($revenue_projected)
                    @foreach($revenue_projected as $revenue_projecteds)
                        <tr>
                            <th>{{$revenue_projecteds->year}}</th>
                            <th>{{number_format($revenue_projecteds->oil_projected, 2)}}</th> 
                            <th>{{number_format($revenue_projecteds->gas_projected, 2)}}</th>
                            <th>{{number_format($revenue_projecteds->gas_flare_projected, 2)}}</th>
                            <th>{{number_format($revenue_projecteds->concession_projected, 2)}}</th>
                            <th>{{number_format($revenue_projecteds->misc_projected, 2)}}</th>
                            <th>{{number_format($revenue_projecteds->signature_bonus, 2)}}</th>
                            <th>{{number_format($revenue_projecteds->total_projected, 2)}}</th>
                            <th style="text-align: right;">
                                @if($revenue_projecteds->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\eco_revenue_projected', {{$revenue_projecteds->id}})" class="btn-sm pull-right" title="Delete Revenue Projected Record"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_revenue_projected({{$revenue_projecteds->id}})" class="btn-sm pull-right" title="View Revenue Projected Summary"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_revenue_projected({{$revenue_projecteds->id}})" class="btn-sm pull-right" title="Edit Revenue Projected Summary"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$revenue_projected->appends(Request::capture()->except('page'))->render() }} 
    </div> <!-- end col -->



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

    function sortByApproved($approve=0)
    {   
        sessionStorage.setItem('url','{{url('ajax')}}/revenue_projected?a='+$approve);
        $('#revenue_projected').load('{{url('ajax')}}/revenue_projected?a='+$approve);
        sessionStorage.setItem('name','revenue_projected'); 
    }
</script>