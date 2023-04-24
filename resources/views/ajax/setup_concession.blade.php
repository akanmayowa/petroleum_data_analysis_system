<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Concession Held - Block
        <a data-toggle="tooltip" onclick="showmodal('add_conc')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Concession Held Here"> <i class="fa fa-plus"> New</i> </a>

        <a data-toggle="tooltip" onclick="showmodal('upl_concession', sessionStorage.getItem('url'), 'downloadConcessionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Concession Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('admin/download_concession/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Concession Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>

        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_concession') || (\Auth::user()->delegate_role == 'Master Data' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_concession()" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>
    <table class="table table-striped table-sm mb-0" id="conc_table">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Concession</th>
            <th>Company</th>
            <th>Area in Sq-Km</th>
            <th>Contract Type</th>
            <th>Award Year</th>
            <th>Terrain</th>
            <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style=""> </th>
        </tr>

        </thead>
        <tbody>
            @if($concessions)
                @foreach($concessions as $concession)
                    <tr>
                        <th>{{$concession->id}}</th>
                        <th>{{$concession->concession_name}}</th>
                        <th data-toggle="tooltip" data-original-title="
                        @if($concession->equity_one) Equity Distribution &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                            {{$concession->equity_one->company_name}} - {{$concession->percentage_1}}%,
                        @elseif($concession->equity_two) Equity Distribution
                            {{$concession->equity_two->company_name}} - {{$concession->percentage_2}}%,
                        @elseif($concession->equity_three) Equity Distribution
                            {{$concession->equity_three->company_name}} - {{$concession->percentage_3}}%,
                        @elseif($concession->equity_four) Equity Distribution
                            {{$concession->equity_four->company_name}} - {{$concession->percentage_4}}%,
                        @elseif($concession->equity_five) Equity Distribution
                            {{$concession->equity_five->company_name}} - {{$concession->percentage_5}}%,
                        @elseif($concession->equity_six) Equity Distribution
                            {{$concession->equity_six->company_name}} - {{$concession->percentage_6}}%,
                        @elseif($concession->equity_seven) Equity Distribution
                            {{$concession->equity_seven->company_name}} - {{$concession->percentage_7}}%,
                        @elseif($concession->equity_eight) Equity Distribution
                            {{$concession->equity_eight->company_name}} - {{$concession->percentage_8}}%
                        @else
                             Equity Distribution &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {{$concession->company->company_name}} - 100%
                        @endif
                        ">@if($concession->company){{$concession->company->company_name}}@endif</th>
                        <th>{{$concession->area}}</th>
                        <th>@if($concession->contract){{$concession->contract->contract_name}}@endif</th>
                        <th>{{$concession->award_date}}</th>
                        <th>@if($concession->terrain){{$concession->terrain->terrain_name}}@endif</th>
                        <th style="text-align: right;">
                            @if($concession->stage_id == 0)
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class="">
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif
                        </th>
                        <th>
                            <a href="{{route('admin.viewconcessionfields', $concession->id)}}" class="pull-right" title="View All Fields In {{$concession->concession_name}} Block" style="font-size:12px" target="_blank">
                                <i class="fa fa-briefcase text-inverse m-r-10" data-toggle="tooltip" data-original-title="Click To View All Fields In {{$concession->concession_name}} Blocks" style="color: #202020"></i>
                            </a>
                            <a href="{{route('admin.viewconcessionhistory', $concession->id)}}" class="pull-right" title="View {{$concession->concession_name}} Details" style="font-size:12px" target="_blank">
                                <i class="fa fa-eye text-inverse m-r-10" data-toggle="tooltip" data-original-title="Click To View {{$concession->concession_name}} History" style="color: #202020"></i>
                            </a>

                            <a data-toggle="modal" style="cursor: pointer; font-size:12px" tooltip="true" onclick="load_concession({{$concession->id}})" class="pull-right" title="Click To Edit {{$concession->concession_name}} Details"> <i class="fa fa-pencil text-inverse m-r-10" style="color: #202020"></i>    </a>
                        </th>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$concessions->appends(Request::capture()->except('page'))->render() }}
</div>



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
    });

    //SORT SCRIPT
    sortAscDesc();
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Concession?a='+$approve);
        $('#Concession').load('{{url('ajax')}}/Concession?a='+$approve);
        sessionStorage.setItem('name','Concession');
    }
</script>