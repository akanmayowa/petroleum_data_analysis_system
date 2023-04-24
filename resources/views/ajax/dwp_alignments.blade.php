<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All DWP Alignment
        <a data-toggle="tooltip" onclick="showmodal('addalign')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Alignment Here">  <i class="fa fa-plus"> New</i> </a>
               
        <a data-toggle="tooltip" onclick="showmodal('uplalign')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Alignment Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_alignment/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DWP Alignment Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="alignment_table">
            <thead class="thead-dark">
            <tr>
                <th>Alignment Name</th>
                <th>Created Date</th>
                <th style="width:1%"> </th>
            </tr>

            </thead>
            <tbody>
                @if($alignments)
                    @foreach($alignments as $_alignments)
                        <tr>
                            <th>{{$_alignments->alignment_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_alignments->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_alignment({{$_alignments->id}})" class="btn-sm pull-right" title="Edit Alignment"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$alignments->appends(Request::capture()->except('page'))->render() }} 
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