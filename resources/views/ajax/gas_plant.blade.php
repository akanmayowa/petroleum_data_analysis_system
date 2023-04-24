<div class="table-responsive">       <form method="POST">@csrf  
    <h5 style="margin-left: 5px; color: #aaa"> Major Gas Projects 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addgas_plant')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Major Gas Plant Projects Here"> <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('uplgas_plant', sessionStorage.getItem('url'),'downloadGasProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Major Gas Plant Projects Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('transport/download_gas_project/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Major Gas Plant Projects Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_gas_project') || (\Auth::user()->delegate_role == 'Gas' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_gas_plant()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="gas_plant_table">
            <thead class="thead-dark">
                <tr>                                                      
                    <th>Year</th>
                    <th>Project Title</th>
                    {{-- <th>LNG <i class="units"></i></th>
                    <th>NG <i class="units"></i></th>
                    <th>CNG <i class="units"></i></th>
                    <th>LPG <i class="units"></i></th>
                    <th>NGR <i class="units"></i></th>
                    <th>Condensate <i class="units"></i></th>
                    <th>Fertilizer <i class="units"></i></th>
                    <th>Petrochemical <i class="units"></i></th> --}}
                    <th>Company</th>
                    <th>Location</th>                            
                    <th>Start Date</th>                            
                    <th>Commissioning</th>                            
                    <th>Status</th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>
            </thead>
            <tbody>
                @if($gas_plant)
                    @foreach($gas_plant as $_gas_plant)
                        <tr>
                            @php $unResolved = request()->user()->unResolved($_gas_plant->id, 'gas_processing_plant_project'); @endphp
                            <th>{{$_gas_plant->year}}</th> 
                            <th>{{$_gas_plant->project_title}}</th> 
                            {{-- <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->lng}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->ng}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->cng}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->lpg}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->ngr}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->condensate}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->fertilizer}}</th>
                            <th data-toggle="tooltip" title="Volume In per day">{{$_gas_plant->petrochemical}}</th> --}}
                            @if($_gas_plant->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                                @if($_gas_plant->company_id == 0)
                                <th>{{$_gas_plant->others}}</th> 
                                @else                             
                                <th>@if($_gas_plant->company) {{$_gas_plant->company->company_name}} @endif</th> 
                                @endif
                            @endif
                            <th>{{$_gas_plant->location_id}}</th> 
                            <th>{{$_gas_plant->start_date}}</th>
                            <th>{{$_gas_plant->end_date}}</th>
                            @if($_gas_plant->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$_gas_plant->status?$_gas_plant->status->status_name:''}}</th>
                            @endif
                            <th style="text-align: right;">
                                @if($_gas_plant->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\gas_processing_plant_project', {{$_gas_plant->id}})" class="btn-sm pull-right" title="Delete Gas Plant"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_gas_plant({{$_gas_plant->id}})" class="btn-sm pull-right" title="View Major Gas Plant Projects"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" data-target=""  onclick="load_gas_plant({{$_gas_plant->id}})" class="btn-sm pull-right" title="Edit Major Gas Plant Projects"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$gas_plant->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/gas_plant?p='+$pending);
        $('#gas_plant').load('{{url('ajax')}}/gas_plant?p='+$pending);
        sessionStorage.setItem('name','gas_plant'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/gas_plant?a='+$approve);
        $('#gas_plant').load('{{url('ajax')}}/gas_plant?a='+$approve);
        sessionStorage.setItem('name','gas_plant'); 
    } 
</script>