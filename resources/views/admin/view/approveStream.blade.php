<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Streams  
        <a data-toggle="tooltip" onclick="showmodal('appSTREmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <table class="table table-hover mb-0" id="stream_table">
        <thead>
        <tr style="background-color: #9BDDFF">
            <th>
                <label style="text-align: left"> <input type="checkbox" class="" id="STRE_check_all" style="margin-top: 5px;"> </label>
            </th>
            <th>Stream Name</th>
            <th>Company Name</th>
            <th>Production Type</th>
            <th>Created Date</th>
        </tr>

        </thead>
        <tbody>
            @if($stream)
                @foreach($stream as $_streams)
                    <tr>
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$_streams->id}}, '\App\\Stream')" class="check_tabs" id="tab_{{$_streams->id}}" name="tab_{{$_streams->id}}" value="0">
                        </th>
                        <th>{{$_streams->stream_name}}</th>
                        <th>@if($_streams->company){{$_streams->company->company_name}}@endif</th>
                        <th>@if($_streams->production_types){{$_streams->production_types->production_type_name}}@endif</th>
                        <th>{{\Carbon\Carbon::parse($_streams->created_at)->diffForHumans()}}</th>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    <a data-toggle="tooltip" onclick="showmodal('appSTREmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
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

       
        $('#STRE_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\Stream',
                    name:'Stream',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#STRE_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Stream',
                model_name:'\App\\Stream',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayStream();  });      $('#successModal').modal('show');           
        });

        $('#STRE_no_btn').click(function(e)
        {
            $('#appSTREmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appSTREmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="STRE_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="STRE_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>