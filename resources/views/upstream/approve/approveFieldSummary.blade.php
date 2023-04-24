<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Field Summary <i style="margin-left: 50px">Total : {{$field_sum->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appFSmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="FS_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Contract</th>
                <th>Producing Fields</th>
                <th>Wells</th>
                <th>String</th>
            </tr>

            </thead>
            <tbody>
                @if($field_sum)
                    @foreach($field_sum as $_field_sum)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$_field_sum->id}}, '\App\\up_field_summary')" class="check_tabs" id="tab_{{$_field_sum->id}}" name="tab_{{$_field_sum->id}}" value="0">
                            </th>           
                            <th>{{$_field_sum->id}}</th> 
                            <th>{{$_field_sum->year}}</th> 
                            <th>{{$_field_sum->month}}</th>  
                            <th>@if($_field_sum->company) {{$_field_sum->company->company_name}} @endif </th> 
                            <th>@if($_field_sum->contract) {{$_field_sum->contract->contract_name}} @endif </th> 
                            <th>{{$_field_sum->producing_field}}</th> 
                            <th>{{$_field_sum->well}}</th> 
                            <th>{{$_field_sum->string}}</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appFSmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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
            $('#'+type).load(aID); 
        });

       
        $('#FS_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_field_summary',
                    name:'Field Summary',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#FS_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Field Summary',
                model_name:'\App\\up_field_summary',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayFieldSummary();         $('#successModal').modal('show');        
        });

        $('#FS_no_btn').click(function(e)
        {
            $('#appFSmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appFSmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="FS_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="FS_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>