<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> list Of Marginal Fields 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif 
        <a data-toggle="tooltip" onclick="showmodal('addbala_m_field')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Marginal Marginal Here">  <i class="fa fa-plus"> New</i> </a>
         
        <a data-toggle="tooltip" onclick="showmodal('uplbala_m_field', sessionStorage.getItem('url'), 'downloadMarginalFieldTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload list Of Marginal Fields Here">  <i class="fa fa-upload"> Upload </i></a>
  
        <a href="{{url('admin/download_marginal_field/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download OPL Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_concession') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_m_field()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   
        <table class="table table-striped table-sm mb-0" id="m_field_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Company</th>
                <th>Fields</th>
                <th>OML Number</th>
                <th>Created On</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($bala_marg_fields)
                    @foreach($bala_marg_fields as $bala_marg_field)
                        @php $unResolved = request()->user()->unResolved($bala_marg_field->id, 'Bala_marginal_field'); @endphp
                        {{-- @php $unResolved = request()->user()->unResolved($bala_marg_field->id, 'Bala_marginal_field'); @endphp --}}
                        <tr>                                                             
                            <th>{{$bala_marg_field->year}}</th>
                            @if($bala_marg_field->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else 
                            <th>{{$bala_marg_field->company?$bala_marg_field->company->company_name:''}}</th>
                            @endif
                            @if($bala_marg_field->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                            <th>{{$bala_marg_field->field?$bala_marg_field->field->field_name:''}}</th>
                            @endif  
                            <th>{{$bala_marg_field->blocks}}</th>  
                            <th>{{\Carbon\Carbon::parse($bala_marg_field->created_at)->diffForHumans()}}</th>   
                            <th style="text-align: right;">
                                @if($bala_marg_field->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_m_field({{$bala_marg_field->id}})" class="btn-sm pull-right" title="Edit list Of Marginal Fields"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$bala_marg_fields->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



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
        sessionStorage.setItem('url','{{url('ajax')}}/bala_field?p='+$pending);
        $('#bala_field').load('{{url('ajax')}}/bala_field?p='+$pending);
        sessionStorage.setItem('name','bala_field'); 
    }

    function sortByApproved($approve=0)
    {   
        sessionStorage.setItem('url','{{url('ajax')}}/bala_field?a='+$approve);
        $('#bala_field').load('{{url('ajax')}}/bala_field?a='+$approve);
        sessionStorage.setItem('name','bala_field'); 
    }
</script>