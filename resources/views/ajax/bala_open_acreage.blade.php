<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> All Open Acreage Blocks 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_unopen')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Open Acreage Blocks Here">  <i class="fa fa-plus"> New</i> </a>

        <a type="button" data-toggle="modal" data-target="#myModal" style="color:#fff;; margin-right: 5px" class="btn btn-success waves-effect waves-light btn-sm pull-right" data-original-title="Upload OML Licenses Here">  <i class="fa fa-upload"> Approve</i> </a>
        <a data-toggle="tooltip" onclick="showmodal('upl_unopen', sessionStorage.getItem('url'), 'downloadOpenAcreageTemplate')" style="color:#fff;; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Open Acreage Blocks Here">  <i class="fa fa-upload"> Upload</i> </a>
        <a href="{{url('upstream/downloadOpenAcreage/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Open Acreage Blocks Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
    <table class="table table-hover table-sm mb-0" id="unopen_table">
        <thead class="thead-dark">
        <tr>
            <th>Concession Held</th>
            <th>Company</th>
            <th>Area in Sq-Km</th>
            <th>Geological Terrain</th>
            <th>Remark</th>
            <th>Created On</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
            <th style=""> </th>
        </tr>

        </thead>
        <tbody>
            @if($open_acreage)
                @foreach($open_acreage as $open_acreages)
                    @php $unResolved = request()->user()->unResolved($open_acreages->id, 'concession_unlisted_open'); @endphp
                    <tr> 
                        <th>{{$open_acreages->concession_name}}</th>
                        @if($open_acreages->pending_id > 0 && $unResolved->column_1 != '')
                            <th class="null">{{$unResolved->column_1}}</th>
                        @else  
                        <th>{{$open_acreages->company?$open_acreages->company->company_name:''}}</th>
                        @endif   
                        <th>{{number_format($open_acreages->area, 2)}}</th>
                        @if($open_acreages->pending_id > 0 && $unResolved->column_2 != '')
                            <th class="null">{{$unResolved->column_2}}</th>
                        @else   
                        <th>{{$open_acreages->terrain?$open_acreages->terrain->terrain_name:''}}</th>
                        @endif    
                        <th>{{$open_acreages->remark}}</th>     
                        <th>{{\Carbon\Carbon::parse($open_acreages->created_at)->diffForHumans()}}</th>  
                        <th style="text-align: right;">
                            @if($open_acreages->stage_id == 0) 
                                  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                            @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                            @endif 
                        </th>    
                        <th>
                            <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\concession_unlisted_open', {{$open_acreages->id}})" class="btn-sm pull-right" title="Delete Open Accreage"> <i class="fa fa-remove"></i>   </a>
                                
                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_unlisted_open_block({{$open_acreages->id}})" class="btn-sm pull-right" title="Edit Open Acreage Blocks"> <i class="fa fa-pencil"></i>    </a>
                        </th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$open_acreage->appends(Request::capture()->except('page'))->render() }}



    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>This is a large modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>






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

    //SORT SCRIPT
    sortAscDesc();

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/open_acreage?p='+$pending);
        $('#open_acreage').load('{{url('ajax')}}/open_acreage?p='+$pending);
        sessionStorage.setItem('name','open_acreage'); 
    } 
    function sortByUnresolved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/open_acreage?a='+$approve);
        $('#open_acreage').load('{{url('ajax')}}/open_acreage?a='+$approve);
        sessionStorage.setItem('name','open_acreage'); 
    } 
</script>