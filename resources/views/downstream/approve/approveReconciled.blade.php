<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Reconciled Crude Production <i style="margin-left: 50px">Total : {{$reconciled->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="RCP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Stream</th>
                <th>Company</th>
                <th>Year</th>
                <th>Jan <i class="units"></i></th>
                <th>Feb <i class="units"></i></th>
                <th>Mar <i class="units"></i></th>
                <th>Apr <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>Jun <i class="units"></i></th>
                <th>Jul <i class="units"></i></th>
                <th>Aug <i class="units"></i></th>
                <th>Sep <i class="units"></i></th>
                <th>Oct <i class="units"></i></th>
                <th>Nov <i class="units"></i></th>
                <th>Dec <i class="units"></i></th>
            </tr>

            </thead>
            <tbody>
                @forelse($reconciled as $_t_stream_prod)
                    <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_t_stream_prod->id}}, '\App\\down_terminal_stream_prod')" class="check_tabs" id="tab_{{$_t_stream_prod->id}}" name="tab_{{$_t_stream_prod->id}}" value="0">
                            </th> 
                        <th>{{$_t_stream_prod->id}}</th>
                        <th>@if($_t_stream_prod->stream) {{$_t_stream_prod->stream->stream_name}} @endif </th>
                        <th>@if($_t_stream_prod->company) {{$_t_stream_prod->company->company_name}} @else N/A @endif </th>
                        <th>{{$_t_stream_prod->year}}</th> 
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->january)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->febuary)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->march)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->april)}}</th> 
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->may)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->june)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->july)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->august)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->september)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->october)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->november)}}</th>
                        <th data-toggle="tooltip" title="Volume In MMbbls">{{number_format($_t_stream_prod->december)}}</th>  
                    </tr>
                @empty
                    No Pending Reconciled Crude Production For Approval !
                @endforelse
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appRCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
</div>



<script type="text/javascript">
    $(function()
    {
        $('[data-toggle="tooltip"]').tooltip();
        $('.page-link').click(function(e)
        {
            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID)
        });

       
        $('#RCP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_terminal_stream_prod',
                    name:'Reconciled Crude Production',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RCP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Reconciled Crude Production',
                model_name:'\App\\down_terminal_stream_prod',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayTerminal();     $('#successModal').modal('show');           
        });

        $('#RCP_no_btn').click(function(e)
        {
            $('#appRCPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRCPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-warning pulse-warning" style="display: block;">!</div>
                </div>

                <div class="modal-body">
                    <center> <h2 class="swal2-title" style="margin-top:-40px">Confirm Record(s) Approval?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="RCP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RCP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>