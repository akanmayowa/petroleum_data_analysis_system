<div class="table-responsive">  <form method="POST">@csrf   
    <h5 style="margin-left: 5px; color: #aaa"> Petrochemical Plant 
        @if($unresolvedCount)
        <a onclick="sortByUnresolved('p')" style="margin: 0px 50px; cursor: pointer;"> <span class="unresolevd"> Unresolved : {{$unresolvedCount}} </span></a> @endif
        <a data-toggle="tooltip" onclick="showmodal('add_pet_plant')" style="color:#fff" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add Petrochemical Plant  Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_pet_plant', sessionStorage.getItem('url'), 'downloadPetPlantTemplate')" style="color:#fff; margin-right: 10px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Petrochemical Plant Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('downstream/download_petrochemical_plant/xlsx')}}" data-toggle="tooltip" style="margin-right: 10px" id="searchBtn" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download Petrochemical Plant  Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
        
        @if(count($pending) > 0 && Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || (\Auth::user()->delegate_role == 'Downstream' && \Auth::user()->end_date >= date('Y-m-d') ))
            <a onclick="approve_pet_plant()" data-toggle="tooltip" class="btn btn-light waves-effect waves-light btn-sm pull-right" title="Approve Pending Data" style="margin-right: 10px">  <i class="fa fa-check"> Approve</i> </a>
        @endif
    </h5>   </form>
        <table class="table table-striped table-sm mb-0" id="p_plant_table">
            <thead class="thead-dark">
            <tr>
                <th>Plant </th>
                <th>State</th>
                <th>Location</th>
                <th>Ownership</th>
                <th>Plant Type</th>
                <th>Capacity <i class="units">MTPA</i></th>
                <th>Feedstock</th>
                <th>Products</th>
                <th style="text-align: right;" onclick="sortByApproved('a')"> Approved </th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($p_plant)
                    @foreach($p_plant as $_p_plant)
                        @php $unResolved = request()->user()->unResolved($_p_plant->id, 'down_petrochemical_plant'); @endphp
                        <tr> 
                            @if($_p_plant->pending_id > 0 && $unResolved->column_1 != '')
                                <th class="null">{{$unResolved->column_1}}</th>
                            @else
                            <th>{{$_p_plant->locations?$_p_plant->locations->plant_location_name:''}} </th>
                            @endif
                            @if($_p_plant->pending_id > 0 && $unResolved->column_2 != '')
                                <th class="null">{{$unResolved->column_2}}</th>
                            @else
                            <th>{{$_p_plant->state?$_p_plant->state->state_name:''}}</th>
                            @endif
                            <th>{{$_p_plant->location}} </th>
                            @if($_p_plant->pending_id > 0 && $unResolved->column_3 != '')
                                <th class="null">{{$unResolved->column_3}}</th>
                            @else
                            <th>{{$_p_plant->ownerships?$_p_plant->ownerships->ownership_name:''}} </th>
                            @endif
                            @if($_p_plant->pending_id > 0 && $unResolved->column_4 != '')
                                <th class="null">{{$unResolved->column_4}}</th>
                            @else
                            <th>{{$_p_plant->plant_types?$_p_plant->plant_types->plant_type_name:''}} </th>
                            @endif
                            <th data-toggle="tooltip" title="Capacity In MTPA">{{number_format($_p_plant->plant_capacity, 2)}}</th>
                            @if($_p_plant->pending_id > 0 && $unResolved->column_5 != '')
                                <th class="null">{{$unResolved->column_5}}</th>
                            @else
                            <th>{{$_p_plant->feedstocks?$_p_plant->feedstocks->feedstock_name:''}} </th>
                            @endif
                            @if($_p_plant->pending_id > 0 && $unResolved->column_6 != '')
                                <th class="null">{{$unResolved->column_6}}</th>
                            @else
                            <th>{{$_p_plant->product?$_p_plant->product->product_name:''}} </th>
                            @endif
                            <th style="text-align: right;">
                                @if($_p_plant->stage_id == 0) 
                                      <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> 
                                @else <img src="{{URL::asset('assets/images/green.png')}}" alt="" height="12" class="">
                                @endif 
                            </th> 
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#E32636; font-size:10px" tooltip="true" onclick="deleteRecord('\App\\down_petrochemical_plant', {{$_p_plant->id}})" class="btn-sm pull-right" title="Delete Petrochemical Plant"> <i class="fa fa-remove"></i>   </a>

                                {{-- <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="view_petrol_plant({{$_p_plant->id}})" class="btn-sm pull-right" title="View Petrochemical Plant "> <i class="fa fa-eye"></i>   </a> --}}

                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_petrol_plant({{$_p_plant->id}})" class="btn-sm pull-right" title="Edit Petrochemical Plant "> <i class="fa fa-pencil"></i>    </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$p_plant->appends(Request::capture()->except('page'))->render() }} 
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

    function sortByUnresolved($pending=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/pet_plant?p='+$pending);
        $('#pet_plant').load('{{url('ajax')}}/pet_plant?p='+$pending);
        sessionStorage.setItem('name','pet_plant'); 
    } 
    function sortByApproved($approve=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/pet_plant?a='+$approve);
        $('#pet_plant').load('{{url('ajax')}}/pet_plant?a='+$approve);
        sessionStorage.setItem('name','pet_plant'); 
    } 
</script>