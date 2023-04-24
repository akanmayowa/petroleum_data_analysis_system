<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> All Restricting Factor
        <a data-toggle="tooltip" onclick="showmodal('add_rest_factor')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Restricting Factor Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upl_rest_factor')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Restricting Factor Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_restricting_factor/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Restricting Factor Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="fact_table">
            <thead class="thead-dark">
            <tr>
                <th>Restricting Factor Name</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($restrict_factor)
                    @foreach($restrict_factor as $_restrict_factor)
                        <tr>
                            <th>{{$_restrict_factor->restricting_factor_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_restrict_factor->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_restricting_factor({{$_restrict_factor->id}})" class="btn-sm pull-right" title="Edit Restricting Factor"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$restrict_factor->appends(Request::capture()->except('page'))->render() }} 
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