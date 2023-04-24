<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Gas Reserves Addition Depletion Rate on Contract Basis - EDIT
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>

        <a href="{{url('upstream/download_gas_depletion_rate/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Gas Reserves Depletion Rate Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_depletion_rate()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif

        @if(Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="showmodal('ratio')" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Compute Gas Reserves Replacement Rate / Ratio" style="margin-right: 5px">  <i class="mdi mdi-chart-areaspline"> Compute Ratio</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="depletion_gas_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Contract</th>
                <th>Prev Gas Reserve(Bcsf)</th>
                <th>Curr Gas Reserve(Bcsf)</th>
                <th>Production</th>
                <th>Net Addition</th>
                <th>% Net Addition</th>
                <th>Depletion Rate</th>
                <th>Life Index</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th>  </th>
            </tr>

            </thead>
            <tbody>
                @if($gas_reserve_depletion_rate)
                    @foreach($gas_reserve_depletion_rate as $_gas_reserve_depletion_rate)
                        @php $unResolved = request()->user()->unResolved($_gas_reserve_depletion_rate->id, 'up_reserve_addition_depletion_rate'); @endphp
                        <tr>              
                            <th class="tb-row-height">{{$_gas_reserve_depletion_rate->year}}</th>
                            <th class="tb-row-height">{{$_gas_reserve_depletion_rate->month}}</th>
                            @if($_gas_reserve_depletion_rate->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else   
                            <th class="tb-row-height">
                                {{$_gas_reserve_depletion_rate->company?$_gas_reserve_depletion_rate->company->company_name:''}}
                            </th>
                            @endif
                            @if($_gas_reserve_depletion_rate->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else   
                            <th class="tb-row-height">
                                {{$_gas_reserve_depletion_rate->contract?$_gas_reserve_depletion_rate->contract->contract_name:''}}
                            </th>
                            @endif 
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->prev_gas_reserve, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->curr_gas_reserve, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->production, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->net_addition, 2)}}</th>
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->percent_net_addition, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->depletion_rate, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($_gas_reserve_depletion_rate->life_index, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($_gas_reserve_depletion_rate->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th class="tb-row-height">
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_reserve_addition_depletion_rate', {{$_gas_reserve_depletion_rate->id}})" class="btn-sm pull-right" title="Delete Gas Depletion Rate"> <i class="fa fa-remove"></i>   </a>

                                <a style="cursor: pointer; color:#202020; font-size:10px" onclick="load_gas_depletion_rate({{$_gas_reserve_depletion_rate->id}})" class="btn-sm pull-right" data-toggle="tooltip"  title="Edit Reserves Depletion Rate"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_reserve_depletion_rate->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



 <!-- Add Reserve Depletion Rate modal -->
<div id="ratio" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Compute Reserve Ratio </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="ratioForm" action="{{ url('upstream/reserve-replacement-rate-gas') }}" method="POST">
            @csrf
          

          <div class="form-group row">
            <label for="year" class="col-sm-12 col-form-label"> Year </label>
            <div class="col-sm-12">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required="" readonly>
            </div>
          </div> 

                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_res_btn" id="add_res_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Compute </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<script>
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip();  

        $('.year').datepicker(
        {
          format: "yyyy", 
          autoclose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_reserve_depletion_rate?p='+$pending);
        $('#gas_reserve_depletion_rate').load('{{url('ajax')}}/gas_reserve_depletion_rate?p='+$pending);
        sessionStorage.setItem('name','gas_reserve_depletion_rate'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_reserve_depletion_rate?a='+$approve);
        $('#gas_reserve_depletion_rate').load('{{url('ajax')}}/gas_reserve_depletion_rate?a='+$approve);
        sessionStorage.setItem('name','gas_reserve_depletion_rate'); 
    }   
</script>