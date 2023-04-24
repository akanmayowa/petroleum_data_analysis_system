
<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Multi-Client Data Projects Status
        @if($unresolvedCount) <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> Unresolved : {{$unresolvedCount}} </a> @endif
        <a data-toggle="tooltip" onclick="showmodal('addbala_data_ps')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Multi-Client Data Here">  <i class="fa fa-plus"> New</i> </a>
        <a data-toggle="tooltip" onclick="showmodal('uplbala_data_ps', sessionStorage.getItem('url'), 'downloadMultiClientProjectTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Multi-Client Data Here">  <i class="fa fa-upload"> Upload</i> </a>
        <a href="{{url('upstream/downloadBalaProjectStatus/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Multi-Client Data Excel Here"> <i class="fa fa-file-excel-o"></i> Download</a>
        @if(Auth::user()->role_obj->permission->contains('constant', 'approve_concession') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <button onclick="approve_multiclient()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </button>
        @endif
    </h5> 

        <table class="table table-striped table-sm mb-0" id="lic_mak_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Company</th>
                <th>Survey Name</th>
                <th>Aggreement Date</th>
                <th>Area Of Survey</th>
                <th>Type Of Survey</th>
                <th>Quantum Of Survey</th>
                <th>Year Of Survey</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($bala_data_ps)
                    @foreach($bala_data_ps as $_bala_data_ps)
                    @php $unResolved = request()->user()->unResolved($_bala_data_ps->id, 'bala_multiclient_project_status'); @endphp
                        <tr>                                
                            <th>{{$_bala_data_ps->year}}</th>
                            @if($_bala_data_ps->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                            <th>{{$_bala_data_ps->company?$_bala_data_ps->company->company_name:''}}</th>
                            @endif 
                            <th>{{$_bala_data_ps->survey_name}}</th>  
                            <th>{{$_bala_data_ps->agreement_date}}</th>
                            @if($_bala_data_ps->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else   
                            <th>{{$_bala_data_ps->area_of_survey?$_bala_data_ps->area_of_survey->area_of_survey_name:''}}</th>
                            @endif
                            @if($_bala_data_ps->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else   
                            <th>{{$_bala_data_ps->type_of_survey?$_bala_data_ps->type_of_survey->type_of_survey_name:''}}</th>
                            @endif   
                            <th>{{$_bala_data_ps->quantum_of_survey}}</th>   
                            <th>{{$_bala_data_ps->year_of_survey}}</th>  
                            <th style="text-align: right;">
                                @if($_bala_data_ps->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class="">
                                @endif

                            @if($_bala_data_ps->stage_id == 1)
                                    <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>      
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\bala_multiclient_project_status', {{$_bala_data_ps->id}})" class="btn-sm pull-right" title="Delete Multi-Client Data"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_bala_project_status({{$_bala_data_ps->id}})" class="btn-sm pull-right" title="View Multi-Client Data Projects Status"> <i class="fa fa-eye"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_project_status({{$_bala_data_ps->id}})" class="btn-sm pull-right" title="Edit Multi-Client Data Projects Status"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$bala_data_ps->appends(Request::capture()->except('page'))->render() }} 
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
    });

    //SORT SCRIPT
    sortAscDesc();

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/_bala_data_ps?p='+$pending);
        $('#_bala_data_ps').load('{{url('ajax')}}/_bala_data_ps?p='+$pending);
        sessionStorage.setItem('name','_bala_data_ps'); 
    }

    function sortByApproved($approve=0)
    {   
        sessionStorage.setItem('url','{{url('ajax')}}/_bala_data_ps?a='+$approve);
        $('#_bala_data_ps').load('{{url('ajax')}}/_bala_data_ps?a='+$approve);
        sessionStorage.setItem('name','_bala_data_ps'); 
    } 
</script>