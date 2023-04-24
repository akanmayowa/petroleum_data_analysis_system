<div class="col-lg-12">                

    <div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Status Category 
        <a data-toggle="tooltip" onclick="showmodal('addstatus')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Status Category Here">  <i class="fa fa-plus"> New</i> </a>
                
        <a data-toggle="tooltip" onclick="showmodal('uplstatus')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Upload Status Category Here">  <i class="fa fa-upload"> Upload</i> </a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="status_table">
            <thead class="thead-dark">
            <tr>
                <th>Status</th>
                <th>Score</th>
                <th>Created Date</th>
                <th style="width:1%"></th>
            </tr>

            </thead>
            <tbody>
                @if($statuses)
                    @foreach($statuses as $_statuses)
                        <tr>
                            <th>{{$_statuses->status}}</th>
                            <th>{{$_statuses->score}}</th>
                            <th>{{\Carbon\Carbon::parse($_statuses->created_at)->diffForHumans()}}</th>
                            <th>
                                <a data-toggle="tooltip" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_dwp_statue_category({{$_statuses->id}})" class="btn-sm pull-right" title="Edit General Status"> 
                                 <i class="fa fa-pencil"></i>  
                                </a>                                
                            </th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>
        {{$statuses->appends(Request::capture()->except('page'))->render() }} 
    </div>
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
    });

    //SORT SCRIPT
    sortAscDesc();
</script>