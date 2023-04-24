<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Accident Report – Spill 
        <a data-toggle="tooltip" onclick="showmodal('addspill')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Spill Incidence Report Here">  <i class="fa fa-plus"> New</i> </a>
                   
        <a data-toggle="tooltip" onclick="showmodal('uplspill', sessionStorage.getItem('url'),'downloadSpillTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" 
            data-original-title="Upload Spill Incidence Report Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('she-accident-report/download_she_spill_incidence_report/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Spill Incidence Report Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') || (\Auth::user()->delegate_role == 'Health Safety and Environment' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_spill()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="spill_table">
            <thead class="thead-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Natural Accident</th>
                    <th>Corrosion</th>
                    <th>Equipment Failure</th>
                    <th>Sabotage</th>
                    <th>Human Error</th>
                    <th>YTBD</th>
                    <th>Mystery</th>  
                    <th>Total Spill</th>
                    <th>Volume Spill <i class="units">MMbbls</i></th>
                    <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                    <th style="">  </th>
                </tr>

            </thead>
            <tbody>
                @if($she_spill)
                    @foreach($she_spill as $_she_spill)
                        <tr >
                            <th>{{$_she_spill->year}}</th>
                            <th>{{$_she_spill->month}}</th>
                            <th>{{$_she_spill->natural_accident}}</th> 
                            <th>{{$_she_spill->corrosion}}</th>
                            <th>{{$_she_spill->equipment_failure}}</th>
                            <th>{{$_she_spill->sabotage}}</th>
                            <th>{{$_she_spill->human_error}}</th>
                            <th>{{$_she_spill->ytbd}}</th> 
                            <th>{{$_she_spill->mystery}}</th>
                            <th>{{$_she_spill->total_no_of_spills}}</th> 
                            <th data-toggle="tooltip" title="Capacity In MMbbls">{{$_she_spill->volume_spilled}}</th>
                            <th style="text-align: right;">
                                @if($_she_spill->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>    
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\she_spill_incidence_report', {{$_she_spill->id}})" class="btn-sm pull-right" title="Delete Spill Incidences"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_spill({{$_she_spill->id}})" class="btn-sm pull-right" title="View Spill Incidence Report"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_spill({{$_she_spill->id}})" class="btn-sm pull-right" title="Edit Spill Incidence Report"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$she_spill->appends(Request::capture()->except('page'))->render() }} 
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
        sessionStorage.setItem('url','{{url('ajax')}}/spill?a='+$approve);
        $('#spill').load('{{url('ajax')}}/spill?a='+$approve);
        sessionStorage.setItem('name','spill'); 
    } 
</script>