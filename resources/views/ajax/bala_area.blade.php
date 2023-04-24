<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Area Of Survey Blocks 
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'add_upstream')) --}}
            <a data-toggle="tooltip" onclick="showmodal('addaos')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Area Of Survey Blocks Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
   
        <a data-toggle="tooltip" onclick="showmodal('uplarea_of_survey', sessionStorage.getItem('url'), 'downloadAreaTemplate')" style="color:#fff;; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Area Of Survey Blocks Here">  <i class="fa fa-upload"> Upload</i> </a>
   

        <a href="{{url('bala/downloadarea_of_survey/xlsx')}}" data-toggle="tooltip" style="color: #fff; margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download OPL Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-hover table-sm mb-0" id="aos_table">
            <thead class="thead-dark">
            <tr>
                <th>Area Of Survey Name</th>
                <th>Created On</th>
                <th style="">  </th>
            </tr>

            </thead>
            <tbody>
                @if($bala_aoss)
                    @foreach($bala_aoss as $_bala_aoss)
                        <tr>  
                            <th>{{$_bala_aoss->area_of_survey_name}}</th>    
                            <th>{{\Carbon\Carbon::parse($_bala_aoss->created_at)->diffForHumans()}}</th>    
                            <th>
                              <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_area_of_survey({{$_bala_aoss->id}})" class="btn-sm pull-right" title="Edit Area Of Survey Blocks"> <i class="fa fa-pencil"></i>  </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$bala_aoss->appends(Request::capture()->except('page'))->render() }} 
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