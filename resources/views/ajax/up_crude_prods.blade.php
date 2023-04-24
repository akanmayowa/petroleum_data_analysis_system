<div class="table-responsive">    <form method="POST">@csrf 
    <h5 style="margin-left: 5px; color: #aaa"> Provisional Crude Production   <i style="margin: 2px 30px"> All Volumes in Barrels </i>
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;">
        @if($unresolvedCount) <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span> @endif</a>
        <a data-toggle="tooltip" onclick="showmodal('addcrude_prod')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Provisional Crude Production Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplcrude_prod', sessionStorage.getItem('url'), 'downloadCrudeProductionTemplate')" style="color:#fff; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Excel Sheet For Provisional Crude Production Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('upstream/download_crude_production/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Crude Production Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_prov_crude_prod') || (\Auth::user()->delegate_role == 'Upstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_provisional()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 5px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="crude_prod_table">
            <thead class="thead-dark">
            <tr>
                <th>Year</th>
                <th>Company</th>
                <th>Fields</th>
                <th>Contract</th>
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
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($crude_prods) 
                    @foreach($crude_prods as $crude_prod)
                        @php $unResolved = request()->user()->unResolved($crude_prod->id, 'up_provisional_crude_production'); @endphp
                        <tr>         
                            <th>{{$crude_prod->year}}</th>
                            @if($crude_prod->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else  
                                <th>{{$crude_prod->company?$crude_prod->company->company_name:''}}</th>
                            @endif
                            @if($crude_prod->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else  
                                <th>{{$crude_prod->field?$crude_prod->field->field_name:''}}</th>
                            @endif 
                                
                            <th>{{$crude_prod->contract?$crude_prod->contract->contract_name:''}}</th>
                            {{-- <th>
                                @php
                                    $field_comp = \App\field::where('id', $crude_prod->field_id)->first();
                                   
                                @endphp {{$field_comp->company?$field_comp->company->company_name:''}}
                            </th> --}}
                            <th>{{$crude_prod->terrain?$crude_prod->terrain->terrain_name:''}}</th>
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->january, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->febuary, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->march, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->april, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->may, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->june, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->july, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->august, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->september, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->october, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->november, 2)}}</th> 
                            <th data-toggle="tooltip" title="Volumes In Barrels">{{number_format($crude_prod->december, 2)}}</th> 
                            <th style="text-align: right;">
                                @if($crude_prod->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th>   
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\up_provisional_crude_production', {{$crude_prod->id}})" class="btn-sm pull-right" title="Delete Well Provisional Production"> <i class="fa fa-remove"></i>   </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_crude_production({{$crude_prod->id}})" class="btn-sm pull-right" title="View Provisional Crude Production"> <i class="fa fa-eye"></i>    </a>

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_crude_production({{$crude_prod->id}})" class="btn-sm pull-right" title="Edit Provisional Crude Production"> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$crude_prods->appends(Request::capture()->except('page'))->render() }} 
</div> <!-- end col -->



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
        sessionStorage.setItem('url','{{url('ajax')}}/crude_prods?p='+$pending);
        $('#crude_prods').load('{{url('ajax')}}/crude_prods?p='+$pending);
        sessionStorage.setItem('name','crude_prods'); 
    } 

    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/crude_prods?a='+$approve);
        $('#crude_prods').load('{{url('ajax')}}/crude_prods?a='+$approve);
        sessionStorage.setItem('name','crude_prods'); 
    }   
</script>