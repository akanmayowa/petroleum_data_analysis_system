<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Reserves Addition Depletion Rate on Contract Basis 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_depl')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Reserves Depletion Rate Here">  <i class="fa fa-plus"> New</i> </a>

        <a data-toggle="tooltip" onclick="showmodal('upl_depl', sessionStorage.getItem('url'), 'downloadDepletionRateTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Reserves Depletion Rate Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_depletion_rate/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Reserves Depletion Rate Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_depletion_rate()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif

        @if(Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="showmodal('ratio')" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Compute Reserves Replacement Rate / Ratio" style="margin-right: 5px">  <i class="mdi mdi-chart-areaspline"> Compute Ratio</i> </a>
        @endif
    </h5>  </form>
        <table class="table table-striped table-sm mb-0" id="depletion_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Contract</th>
                <th>Prev Oil + Condensate(MMbbls)</th>
                <th>Curr Oil + Condensate(MMbbls)</th>
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
                @if($reserve_depletion_rate)
                    @foreach($reserve_depletion_rate as $reserve_depletion_rates)
                        @php $unResolved = request()->user()->unResolved($reserve_depletion_rates->id, 'up_reserve_addition_depletion_rate'); @endphp
                        <tr>              
                            <th class="tb-row-height">{{$reserve_depletion_rates->year}}</th>
                            <th class="tb-row-height">{{$reserve_depletion_rates->month}}</th>
                            @if($reserve_depletion_rates->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else   
                            <th class="tb-row-height">
                                {{$reserve_depletion_rates->company?$reserve_depletion_rates->company->company_name:''}}
                            </th>
                            @endif
                            @if($reserve_depletion_rates->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else   
                            <th class="tb-row-height">
                                {{$reserve_depletion_rates->contract?$reserve_depletion_rates->contract->contract_name:''}}
                            </th>
                            @endif 
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->prev_oil_condensate, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->curr_oil_condensate, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->production, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->net_addition, 2)}}</th>
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->percent_net_addition, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->depletion_rate, 2)}}</th> 
                            <th class="tb-row-height">{{number_format($reserve_depletion_rates->life_index, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($reserve_depletion_rates->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>  
                            <th class="tb-row-height">
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_reserve_addition_depletion_rate', {{$reserve_depletion_rates->id}})" class="btn-sm pull-right" title="Delete Reserve Depletion Rate"> <i class="fa fa-remove"></i>   </a>

                                <a style="cursor: pointer; color:#202020; font-size:10px" onclick="load_depletion_rate({{$reserve_depletion_rates->id}})" class="btn-sm pull-right" data-toggle="tooltip"  title="Edit Reserves Depletion Rate"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$reserve_depletion_rate->appends(Request::capture()->except('page'))->render() }} 
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
          <form id="ratioForm" action="{{ url('upstream/reserve-replacement-rate') }}" method="POST">
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



<script type="text/javascript">
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
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_depletion_rate?p='+$pending);
        $('#reserve_depletion_rate').load('{{url('ajax')}}/reserve_depletion_rate?p='+$pending);
        sessionStorage.setItem('name','reserve_depletion_rate'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/reserve_depletion_rate?a='+$approve);
        $('#reserve_depletion_rate').load('{{url('ajax')}}/reserve_depletion_rate?a='+$approve);
        sessionStorage.setItem('name','reserve_depletion_rate'); 
    }   
</script>