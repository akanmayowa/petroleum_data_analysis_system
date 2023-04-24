<div class="col-lg-12">   
    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Divisions  
        <a data-toggle="tooltip" onclick="showmodal('adddiv')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Division Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('upldiv')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Division Here">  <i class="fa fa-upload"> Upload</i> </a>
        
        <a href="{{url('project/download_division/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download DPR Division Excel Here">  <i class="fa fa-download"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="division_table">
            <thead class="thead-dark">
            <tr>
                <th>Division Name</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($divisions)
                    @foreach($divisions as $_divisions)
                        <tr>
                            <th>{{$_divisions->division_name}}</th>
                            <th>{{\Carbon\Carbon::parse($_divisions->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_division({{$_divisions->id}})" class="btn-sm pull-right" title="Edit Division"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{$divisions->appends(Request::capture()->except('page'))->render() }} 
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