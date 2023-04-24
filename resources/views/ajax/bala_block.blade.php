<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Open Acreage Situation
        @if($unresolvedCount) <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> Unresolved : {{$unresolvedCount}} </a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_open_acr')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Open Acreage Here"> <i class="fa fa-plus"> New</i> </a>
        <a data-toggle="tooltip" onclick="showmodal('upl_open_acr', sessionStorage.getItem('url'), 'downloadOpenAcreageTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Open Acreage Here">  <i class="fa fa-upload"> Upload</i> </a>
        <a href="{{url('upstream/downloadOpenAcreage/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Block Excel Here">  <i class="fa fa-download"></i> Download</a>
        <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-success btn-sm pull-right text-white mr-2"> Approve </button>
    </h5>
        <table class="table table-striped table-sm mb-0" id="open_acr_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Basin </th>
                <th>No of OPL Blocks Allocated</th>
                <th>No of OML Blocks Allocated</th>
                <th>No Of Blocks Open</th>
                <th>Total Blocks</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody> 
                @if($bala_block)
                    @foreach($bala_block as $_bala_block)
                        @php $unResolved = request()->user()->unResolved($_bala_block->id, 'Bala_block'); @endphp
                        <tr>                                          
                            <th>{{$_bala_block->year}}</th>
                            @if($_bala_block->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else               
                            <th>{{$_bala_block->basin?$_bala_block->basin->basin_name:''}}</th> 
                            @endif
                            <th>{{number_format($_bala_block->opl_blocks_allocated, 2)}}</th>
                            <th>{{number_format($_bala_block->oml_blocks_allocated, 2)}}</th>    
                            <th>{{number_format($_bala_block->blocks_open, 2)}}</th> 
                            <th>{{number_format($_bala_block->total_block, 2)}}</th>  
                            <th style="text-align: right;">
                                @if($_bala_block->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>   
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_open_acreage({{$_bala_block->id}})" class="btn-sm pull-right" title="Edit Open Acreage"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$bala_block->appends(Request::capture()->except('page'))->render() }}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Open Acreage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('approveOpenAcreage') }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-success float right m-2">
                                Approved
                            </button>
                         <table class="table table-striped mb-0" id="tables" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <td class="text-center"> <input type="checkbox" id="checkAll"> Select All</td>
                                <td>Year</td>
                                <td>Basin </td>
                                <td>No of OPL Blocks Allocated</td>
                                <td>No of OML Blocks Allocated</td>
                                <td>No Of Blocks Open</td>
                                <td>Total Blocks</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bala_block as $_bala_block)
                                    @if($_bala_block->stage_id == 0)
                                    @php $unResolved = request()->user()->unResolved($_bala_block->id, 'Bala_block'); @endphp
                                    <tr>
                                        <td class="text-center"><input name='id[]' type="checkbox" id="checkItem" value="<?php echo $_bala_block->id; ?>"></td>
                                        <td>{{$_bala_block->year}}</td>
                                        @if($_bala_block->pending_id > 0 && $unResolved->column_1 != '')
                                            <td class="null">{{$unResolved->column_1}}</td>
                                        @else
                                            <td>{{$_bala_block->basin?$_bala_block->basin->basin_name:''}}</td>
                                        @endif
                                        <td>{{number_format($_bala_block->opl_blocks_allocated, 2)}}</td>
                                        <td>{{number_format($_bala_block->oml_blocks_allocated, 2)}}</td>
                                        <td>{{number_format($_bala_block->blocks_open, 2)}}</td>
                                        <td>{{number_format($_bala_block->total_block, 2)}}</td>
                                    </tr>
                                    @endif
                                    @endforeach

                            </tbody>
                        </table>
                        </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
        </div>
    </div>

<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
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
    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/bala_block?p='+$pending);
        $('#bala_block').load('{{url('ajax')}}/bala_block?p='+$pending);
        sessionStorage.setItem('name','bala_block'); 
    }

    function sortByApproved($approve=0)
    {   
        sessionStorage.setItem('url','{{url('ajax')}}/bala_block?a='+$approve);
        $('#bala_block').load('{{url('ajax')}}/bala_block?a='+$approve);
        sessionStorage.setItem('name','bala_block'); 
    } 
</script>