<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Facility Types  
        <a data-toggle="tooltip" onclick="showmodal('add_facility_type')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Facility Type Here">  <i class="fa fa-plus"> New</i> </a>
            
        <a data-toggle="tooltip" onclick="showmodal('upl_facility_type', sessionStorage.getItem('url'), 'downloadFacTypeTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Facility Type Here">  <i class="fa fa-upload"> Upload</i> </a>
           
        <a href="{{url('admin/download_facilitytype/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Facility Types Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5> 
    <table class="table table-striped table-sm mb-0" id="facility_type_table">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Facility Type Name</th>
            <th>Created Date</th>
            <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style="width:1%"> </th>
        </tr>

        </thead>
        <tbody>
            @if($facility_types)
                @foreach($facility_types as $_facility_types)
                    <tr>
                        <th>{{$_facility_types->id}}</th>
                        <th>@if($_facility_types->type_facility) {{$_facility_types->type_facility->type_name}} @endif</th>
                        <th>{{$_facility_types->facility_type_name}}</th>
                        <th>{{\Carbon\Carbon::parse($_facility_types->created_at)->diffForHumans()}}</th>
                        <th style="text-align: right;">
                            @if($_facility_types->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>  
                        <th>
                             <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_facility_type({{$_facility_types->id}})" class="btn-sm pull-right" title="Edit Facility Type"> 
                             <i class="fa fa-pencil"></i>  
                            </a>
                        </th> 
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    {{$facility_types->appends(Request::capture()->except('page'))->render() }} 
</div>



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

    sortAscDesc();

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Facility_Type?a='+$approve);
        $('#Facility_Type').load('{{url('ajax')}}/Facility_Type?a='+$approve);
        sessionStorage.setItem('name','Facility_Type'); 
    }
</script>