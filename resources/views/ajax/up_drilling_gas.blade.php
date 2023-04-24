<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> New Drill Gas Appraisal/ Development Wells
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('add_dri_gas')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Drilling Gas Wells Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('upl_dri_gas', sessionStorage.getItem('url'), 'downloadDrillingGasTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Drilling Gas Wells Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_drilling_gas/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Drilling Gas Wells Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_drilling_gas()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form> 
        <table class="table table-striped table-sm mb-0" id="dgas_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Field</th>
                <th>Company</th>
                <th>Concession</th>
                <th>Well</th>
                <th>Terrain</th>
                {{-- <th>Facility</th> --}}
                <th>Reserves (Bscf)</th>
                <th>Off-Take (MMSCFD)</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($drilling_gas)
                    @foreach($drilling_gas as $_drilling_gas)
                        @php $unResolved = request()->user()->unResolved($_drilling_gas->id, 'up_drilling_gas'); @endphp
                        <tr>            
                            <th>{{$_drilling_gas->year}}</th> 
                            <th>{{$_drilling_gas->month}}</th>
                            @if($_drilling_gas->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_drilling_gas->field?$_drilling_gas->field->field_name:''}} </th> 
                            @endif
                            <th>{{$_drilling_gas->company?$_drilling_gas->company->company_name:''}} </th>
                            <th>{{$_drilling_gas->concession?$_drilling_gas->concession->concession_name:''}} </th>                          
                            <th>{{$_drilling_gas->well}}</th> 
                            @if($_drilling_gas->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                            <th>{{$_drilling_gas->terrain?$_drilling_gas->terrain->terrain_name:''}} </th>
                            @endif
                            {{-- @if($_drilling_gas->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$_drilling_gas->facility?$_drilling_gas->facility->facility_name:''}} </th>
                            @endif --}}
                            <th>{{$_drilling_gas->reserves}}</th> 
                            <th>{{$_drilling_gas->off_take}}</th>   
                            <th style="text-align: right;">
                                @if($_drilling_gas->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>  
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_drilling_gas', {{$_drilling_gas->id}})" class="btn-sm pull-right" title="Delete Drilling Gas"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_drilling_gas({{$_drilling_gas->id}})" class="btn-sm pull-right" title="View Drilling Gas Wells"> <i class="fa fa-eye"></i>    </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_drilling_gas({{$_drilling_gas->id}})" class="btn-sm pull-right" title="Edit Drilling Gas Wells"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$drilling_gas->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



<script>
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

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/drilling_gas?p='+$pending);
        $('#drilling_gas').load('{{url('ajax')}}/drilling_gas?p='+$pending);
        sessionStorage.setItem('name','drilling_gas'); 
    }

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/drilling_gas?a='+$approve);
        $('#drilling_gas').load('{{url('ajax')}}/drilling_gas?a='+$approve);
        sessionStorage.setItem('name','drilling_gas'); 
    }    
</script>