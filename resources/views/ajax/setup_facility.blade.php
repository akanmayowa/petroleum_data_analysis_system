<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Facilities 
        <a data-toggle="tooltip" onclick="showmodal('add_facility')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Facility Here">  <i class="fa fa-plus"> New</i> </a>
            
        <a data-toggle="tooltip" onclick="showmodal('upl_facility', sessionStorage.getItem('url'), 'downloadFacilityTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Facilities Here">  <i class="fa fa-upload"> Upload</i> </a>
           
        <a href="{{url('admin/download_facility/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Facilities Excel Here">  <i class="fa fa-download"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Master Data' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_facility()" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5> 
    <table class="table table-striped table-sm mb-0" id="facility_table">
        <thead class="thead-dark">
        <tr>
            <th>Facility Code</th>
            <th>Facility Name</th>
            <th>Created Date</th>
            <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style="width:1%"></th>
        </tr>

        </thead>
        <tbody>
            @if($facilities)
                @foreach($facilities as $_facilities)
                    <tr>
                        <th>{{strtoupper($_facilities->facility_code)}}</th> 
                        <th>{{$_facilities->facility_name}}</th>  
                        <th>{{\Carbon\Carbon::parse($_facilities->created_at)->diffForHumans()}}</th>
                        <th style="text-align: right;">
                            @if($_facilities->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif
                        </th> 
                        <th>
                             <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_facility({{$_facilities->id}})" class="btn-sm pull-right" title="Edit Facility"> 
                             <i class="fa fa-pencil"></i>  
                            </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    {{$facilities->appends(Request::capture()->except('page'))->render() }} 



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
        sessionStorage.setItem('url','{{url('ajax')}}/Facilities?a='+$approve);
        $('#Facilities').load('{{url('ajax')}}/Facilities?a='+$approve);
        sessionStorage.setItem('name','Facilities'); 
    }
</script>