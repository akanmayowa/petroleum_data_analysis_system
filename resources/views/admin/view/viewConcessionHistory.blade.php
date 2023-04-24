@extends('layouts.app')

    @section('search')
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">          
                <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
            </div>
        </div>
    @endsection

@section('content')



@php $history_concession = \App\concession_history::where('history_id', $id)->orderBy('id', 'desc')->first(); @endphp



<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                @if($history_concession) 
                <div class="table-responsive">  
                    <h5 style="margin-left: 5px; color: #aaa"> Concession History For {{$history_concession->concession_name}}   
                        <a href="{{url('admin/download_concession_history/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download {{$history_concession->concession_name}} History In Excel Here">  <i class="fa fa-download"></i> Excel</a>
                    </h5> 
                    <table class="table table-hover mb-0" id="">
                        <thead>
                        <tr style="background-color: #B2BEB5">
                            <th>#</th>
                            <th>Concession</th>
                            <th>Company</th>
                            <th>Area in Sq-Km</th>
                            <th>Contract Type</th>
                            <th>Award Year</th>
                            <th>Terrain</th>
                            <th>Created On</th>
                            <th>Created By</th>
                            <th>Updated On</th>
                            <th>Updated On</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                        </thead>
                        <tbody>
                            @if($histories)
                                @foreach($histories as $history)
                                    <tr>  
                                        <th>{{$history->id}}</th> 
                                        <th>{{$history->concession_name}}</th>  
                                        <th data-toggle="tooltip" data-original-title="
                                        @if($history->equity_one) Equity Distribution &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                            {{$history->equity_one->company_name}} - {{$history->percentage_1}}%, 
                                            {{$history->equity_two->company_name}} - {{$history->percentage_2}}%, 
                                            {{$history->equity_three->company_name}} - {{$history->percentage_3}}%, 
                                            {{$history->equity_four->company_name}} - {{$history->percentage_4}}%, 
                                            {{$history->equity_five->company_name}} - {{$history->percentage_5}}%
                                            {{$history->equity_six->company_name}} - {{$history->percentage_6}}%
                                            {{$history->equity_seven->company_name}} - {{$history->percentage_7}}%
                                            {{$history->equity_eight->company_name}} - {{$history->percentage_8}}%
                                        @else
                                             Equity Distribution &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {{$history->company->company_name}} - 100%
                                        @endif
                                        ">@if($history->company){{$history->company->company_name}}@endif</th>                           
                                        <th>{{$history->area}}</th>   
                                        <th>@if($history->contract){{$history->contract->contract_name}}@endif</th>    
                                        <th>{{$history->award_date}}</th>     
                                        <th>@if($history->terrain){{$history->terrain->terrain_name}}@endif</th>      
                                        <th>{{\Carbon\Carbon::parse($history->created_at)->diffForHumans()}}</th>   
                                        <th>{{$history->created_by}}</th>  
                                        <th>{{\Carbon\Carbon::parse($history->created_at)->diffForHumans()}}</th>   
                                        <th>{{$history->updated_by}}</th> 
                                        <th>                        
                                                @if($history->status == 0)
                                                    <span class="badge badge-warning" style="width:100%"> Pending </span>
                                                @elseif($history->status == 1)
                                                    <span class="badge badge-success" style="width:100%"> Approved </span>
                                                @elseif($history->status == 2)
                                                    <span class="badge badge-danger" style="width:100%"> Rejected </span> 
                                                @endif                         
                                        </th>   
                                        <th>
                                            <a data-toggle="modal" style="cursor: pointer; font-size:12px" tooltip="true" onclick="approve_history({{$history->id}})" class="pull-right" title="Approve Concession Changes"> <i class="fa fa-check text-inverse m-r-10" style="color: #004225"></i>    </a>
                                        </th>  
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$histories->appends(Request::capture()->except('page'))->render() }} 
                </div>
                @else
                    No History For This Concession
                @endif

            </div>
        </div>
    </div>
</div>





@endsection


@section('script')

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
    });

    //SORT SCRIPT
    sortAscDesc();
</script>


    @if(Session::has('info'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection
