<div class="table-responsive">      <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Gas Supply Textile Industry
        <a data-toggle="tooltip" onclick="showmodal('add_textile_ind')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Gas Supply Textile Industry Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_textile_ind', sessionStorage.getItem('url'),'downloadGasSupplyTextileIndustryTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Gas Supply Textile Industry Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('gas/download_gas_supply_textile_industry/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Supply Textile Industry Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_supply') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_supply_textile_industry()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>    </form>
    <table class="table table-striped table-sm mb-0" id="textile_ind_table">
        <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Sector</th>
                <th>Value <i class="units"></i></th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>
        </thead>
        <tbody>
            @if($gas_supply_textile_industry)
                @foreach($gas_supply_textile_industry as $_gas_supply_textile_industry)
                    <tr>
                        <th>{{$_gas_supply_textile_industry->year}}</th>
                        <th>{{$_gas_supply_textile_industry->sector}}</th>  
                        <th data-toggle="tooltip" title="Volume In ($/Mcf)">{{number_format($_gas_supply_textile_industry->value, 2)}}</th>  
                        <th style="text-align: right;">
                            @if($_gas_supply_textile_industry->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\_gas_supply_textile_industry', {{$_gas_supply_textile_industry->id}})" class="btn-sm pull-right" title="Delete Gas Textile Industry"> <i class="fa fa-remove"></i>   </a>

                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_gas_supply_textile_industry({{$_gas_supply_textile_industry->id}})" class="btn-sm pull-right" title="Edit Gas Supply Textile Industry"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$gas_supply_textile_industry->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/_gas_supply_textile_industry?a='+$approve);
        $('#_gas_supply_textile_industry').load('{{url('ajax')}}/_gas_supply_textile_industry?a='+$approve);
        sessionStorage.setItem('name','_gas_supply_textile_industry'); 
    } 
</script>