<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Type Of Survey Project 
        {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'upload_upstream')) --}}
            <a data-toggle="tooltip" onclick="showmodal('addtos')" style="color:#fff;" class="btn btn-dark waves-effect waves-light btn-sm pull-right" data-original-title="Add New Type Of Survey Project Here">  <i class="fa fa-plus"> New</i> </a>
        {{-- @endif --}}
                
        <a data-toggle="tooltip" onclick="showmodal('upltype_of_survey', sessionStorage.getItem('url'), 'downloadTypeTemplate')" style="color:#fff;; margin-right: 5px" class="btn btn-primary waves-effect waves-light btn-sm pull-right" data-original-title="Upload Type Of Survey Project Here">  <i class="fa fa-upload"> Upload</i> </a>

        <a href="{{url('bala/downloadtype_of_survey/xlsx')}}" data-toggle="tooltip" style="margin-right: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right" title="Download OPL Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-hover mb-0" id="tos_table">
            <thead class="thead-dark">
            <tr>
                <th>Type Of Survey Name</th>
                <th>Created On</th>
                <th style=""> </th>
            </tr>

            </thead>
            <tbody>
                @if($bala_toss)
                    @foreach($bala_toss as $_bala_toss)
                        <tr>  
                            <th>{{$_bala_toss->type_of_survey_name}}</th>    
                            <th>{{\Carbon\Carbon::parse($_bala_toss->created_at)->diffForHumans()}}</th>    
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_type_of_survey({{$_bala_toss->id}})" class="btn-sm pull-right" title="Edit Type Of Survey Project"> <i class="fa fa-pencil"></i>  </a>
                            </th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$bala_toss->appends(Request::capture()->except('page'))->render() }} 
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