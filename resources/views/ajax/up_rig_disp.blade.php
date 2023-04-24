<div class="table-responsive">       <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Rig Disposition 
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif </a>
        <a data-toggle="tooltip" onclick="showmodal('addrig_disp')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Rig Disposition Here"> <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplrig_disp', sessionStorage.getItem('url'), 'downloadRigDispositionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Rig Disposition Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_rig_disposition/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Rig Disposition Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_rig()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="rig_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Rig Type</th>
                <th>Terrain</th>
                <th>January</th>
                <th>February</th>
                <th>March</th>
                <th>April</th>
                <th>May</th>
                <th>June</th>
                <th>July</th>
                <th>August</th>
                <th>September</th>
                <th>October</th>
                <th>November</th>
                <th>December</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($rig_disp)
                    @foreach($rig_disp as $_rig_disp)
                        @php $unResolved = request()->user()->unResolved($_rig_disp->id, 'up_rig_disposition'); @endphp
                        <tr>           
                            <th>{{$_rig_disp->year}}</th>
                            @if($_rig_disp->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_rig_disp->rig_type?$_rig_disp->rig_type->rig_type_name:''}} </th> 
                            @endif
                            @if($_rig_disp->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else 
                            <th>{{$_rig_disp->terrain?$_rig_disp->terrain->terrain_name:''}} </th>
                            @endif 
                            <th>{{$_rig_disp->january}}</th> 
                            <th>{{$_rig_disp->febuary}}</th> 
                            <th>{{$_rig_disp->march}}</th> 
                            <th>{{$_rig_disp->april}}</th> 
                            <th>{{$_rig_disp->may}}</th> 
                            <th>{{$_rig_disp->june}}</th> 
                            <th>{{$_rig_disp->july}}</th> 
                            <th>{{$_rig_disp->august}}</th> 
                            <th>{{$_rig_disp->september}}</th> 
                            <th>{{$_rig_disp->october}}</th> 
                            <th>{{$_rig_disp->november}}</th> 
                            <th>{{$_rig_disp->december}}</th>  
                            <th style="text-align: right;">
                                @if($_rig_disp->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_rig_disposition', {{$_rig_disp->id}})" class="btn-sm pull-right" title="Delete Rig Disposition"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_rig_disposition({{$_rig_disp->id}})" class="btn-sm pull-right" title="View Rig Disposition"> <i class="fa fa-eye"></i>    </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_rig_disposition({{$_rig_disp->id}})" class="btn-sm pull-right" title="Edit Rig Disposition"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$rig_disp->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/rig_disp?p='+$pending);
        $('#rig_disp').load('{{url('ajax')}}/rig_disp?p='+$pending);
        sessionStorage.setItem('name','rig_disp'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/rig_disp?a='+$approve);
        $('#rig_disp').load('{{url('ajax')}}/rig_disp?a='+$approve);
        sessionStorage.setItem('name','rig_disp'); 
    }   
</script>