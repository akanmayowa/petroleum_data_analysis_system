<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All Key Recovery Plan
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_dwp')) --}}
            <a data-toggle="tooltip" onclick="showmodal('add_recovery_plan')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Key Recovery Plan Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
    
        <a data-toggle="tooltip" onclick="showmodal('upl_recovery_plan')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Key Recovery Plan Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_key_recovery_plan/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Key Recovery Plan  Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="plan_table">
            <thead class="thead-dark">
            <tr>
                <th>Key Recovery Plan</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($recovery_plan)
                    @foreach($recovery_plan as $_recovery_plan)
                        <tr>
                            <th>{{$_recovery_plan->key_recovery_plan_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_recovery_plan->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_key_recovery_plan({{$_recovery_plan->id}})" class="btn-sm pull-right" title="Edit Key Recovery Plan"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$recovery_plan->appends(Request::capture()->except('page'))->render() }} 
    </div>
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
</script>