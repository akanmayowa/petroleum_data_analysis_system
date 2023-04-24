<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#opl_table').DataTable({
            order: [[1, 'desc']],
            paging:true,
            lengthChange:true,
            "lengthMenu": [[13, 25, 50, -1], [13, 25, 50,"All"]],
            columnDefs: [
                {
                    'searchable'    : false,
                    'targets'       : [0,2,3,4,5,6,7,8]
                },
            ]
        });
    } );
</script>

<script>
    $(document).ready(function() {
        $('#opl_tables').DataTable({
            order: [[1, 'desc']],
            paging:true,
            lengthChange:true,
            columnDefs: [
                {
                    'searchable'    : false,
                    'targets'       : [0,1,3,4,5,6,7,8]
                },
            ]
        });
    } );
</script>


<div class="col-12">
    <h5 style="margin-left: 5px; color: #aaa"> Oil Prospective License
        @if($unresolvedCount)
            <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        @if(Auth::user()->role_obj->permission->contains('constant', 'manage_concession'))
            <a data-toggle="tooltip" onclick="showmodal('addbala_opl')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Oil Prospecting Licenses Here">  <i class="fa fa-plus"> New</i> </a>
        @endif
        <a data-toggle="modal" data-target=".bd-example-modal-lg" style="color:#fff;; margin-right: 5px" class="btn btn-success waves-effect waves-light btn-sm pull-right" data-original-title="Upload Oil Prospecting Licenses Here">  <i class="fa fa-upload"> Approve</i> </a>
        <a data-toggle="tooltip" onclick="showmodal('uplbala_opl', sessionStorage.getItem('url'), 'downloadOPLTemplate')" style="color:#fff;; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Oil Prospecting Licenses Here">  <i class="fa fa-upload"> Upload</i> </a>
        <a href="{{url('bala/downloadOPL/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download OPL Excel Here">  <i class="fa fa-download"></i> Download</a>
    </h5>
</div>
<div class="table-responsive">
 <table class="table table-striped table-sm mb-0" id="opl_table">
            <thead class="thead-dark">
            <tr>
                <th>Company</th>
                <th>Created At</th>
                <th>Concession</th>
                <th>Contract Type</th>
                <th>Award Date</th>
                <th>License Expires On</th>
                <th>Area <i class="units">Sq-Km</i></th>
                <th>Geological Terrain</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($bala_opls)
                    @foreach($bala_opls as $_bala_opls)
                    @php $unResolved = request()->user()->unResolved($_bala_opls->id, 'Bala_opl'); @endphp
                        <tr>
                            @if($_bala_opls->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$_bala_opls->company?$_bala_opls->company->company_name:''}}</th>
                            @endif
                            <th>{{$_bala_opls->year ?? ' '}}</th>
                            @if($_bala_opls->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else     
                            <th>{{$_bala_opls->concession?$_bala_opls->concession->concession_name:''}}</th>
                            @endif
                            @if($_bala_opls->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else 
                            <th>{{$_bala_opls->contract?$_bala_opls->contract->contract_name:''}}</th>
                            @endif 
                            <th>{{$_bala_opls->year_of_award}}</th> 
                            <th>{{$_bala_opls->license_expire_date}}</th> 
                            <th data-toggle="tooltip" title="Volume In Sq-Km">{{number_format($_bala_opls->area, 2)}}</th>                            
                            @if($_bala_opls->pending_id > 0 && $unResolved->column_4 != '')
                                <th class="null">{{$unResolved->column_4}}</th>
                            @else  
                            <th>{{$_bala_opls->terrain?$_bala_opls->terrain->terrain_name:''}}</th>
                            @endif        
                            <th style="text-align: right;">
                                @if($_bala_opls->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else
                                    <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\Bala_opl', {{$_bala_opls->id}})" class="btn-sm pull-right" title="Delete Oil Prospecting Licenses"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_opl({{$_bala_opls->id}})" class="btn-sm pull-right" title="View Oil Prospecting Licenses"> <i class="fa fa-eye"></i>   </a>
                                
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_opl({{$_bala_opls->id}})" class="btn-sm pull-right" title="Edit Oil Prospecting Licenses"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-1" style="width:100% !important;">
        <div class="responsive">
            <form method="post" action="{{ route('approveOpl')}}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-sm btn-success float right m-2">
                    Approved
                </button>

            <table class="table table-striped table-sm mb-0" id="opl_tables">
                <thead class="thead-dark">
                <tr>
                    <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th>
                    <th>Company</th>
                    <th>Created At</th>
                    <th>Concession</th>
                    <th>Contract Type</th>
                    <th>Award Date</th>
                    <th>License Expires On</th>
                    <th>Area <i class="units">Sq-Km</i></th>
                    <th>Geological Terrain</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pending as $_bala_opls)
                    @if($_bala_opls->stage_id == 0)
                        @php $unResolved = request()->user()->unResolved($_bala_opls->id, 'Bala_opl'); @endphp
                            <tr>
                                <td class="text-center"><input name='id[]' type="checkbox" id="checkItem" value="<?php echo $_bala_opls->id; ?>">
                                @if($_bala_opls->pending_id > 0 && $unResolved->column_1 != '')
                                    <th class="null">{{$unResolved->column_1}}</th>
                                @else
                                <th>{{$_bala_opls->company?$_bala_opls->company->company_name:''}}</th>
                                @endif
                                <th>{{$_bala_opls->year}}</th>
                                @if($_bala_opls->pending_id > 0 && $unResolved->column_2 != '')
                                    <th class="null">{{$unResolved->column_2}}</th>
                                @else
                                <th>{{$_bala_opls->concession?$_bala_opls->concession->concession_name:''}}</th>
                                @endif
                                @if($_bala_opls->pending_id > 0 && $unResolved->column_3 != '')
                                    <th class="null">{{$unResolved->column_3}}</th>
                                @else
                                <th>{{$_bala_opls->contract?$_bala_opls->contract->contract_name:''}}</th>
                                @endif
                                <th>{{$_bala_opls->year_of_award}}</th>
                                <th>{{$_bala_opls->license_expire_date}}</th>
                                <th data-toggle="tooltip" title="Volume In Sq-Km">{{number_format($_bala_opls->area, 2)}}</th>
                                @if($_bala_opls->pending_id > 0 && $unResolved->column_4 != '')
                                    <th class="null">{{$unResolved->column_4}}</th>
                                @else
                                <th>{{$_bala_opls->terrain?$_bala_opls->terrain->terrain_name:''}}</th>
                                @endif
                            </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            </form>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<script language="javascript">
			$("#checkAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
		</script>
<script>
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

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/bala_opls?p='+$pending);
        $('#bala_opls').load('{{url('ajax')}}/bala_opls?p='+$pending);
        sessionStorage.setItem('name','bala_opls'); 
    }
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/bala_opls?a='+$approve);
        $('#bala_opls').load('{{url('ajax')}}/bala_opls?a='+$approve);
        sessionStorage.setItem('name','bala_opls'); 
    }  

    function approve_multiclient(){
        
    }
</script>
