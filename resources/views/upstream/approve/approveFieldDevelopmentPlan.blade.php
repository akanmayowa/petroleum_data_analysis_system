<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Field Development Plan <i style="margin-left: 50px">Total : {{$oil_fad->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appFDPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <form action="{{route('set-stage_id')}}" method="POST">@csrf 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="FDP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Company</th>
                <th>Field</th>
                <th>Production Rate</th>
                <th>Expected Reserves</th>
                <th>Commencement Date</th>
                <th>Remarks/Status</th>
            </tr>

            </thead>
            <tbody>
                @if($oil_fad)
                    @foreach($oil_fad as $fdp)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$fdp->id}}, '\App\\up_field_development_plan')" class="check_tabs" id="tab_{{$fdp->id}}" name="tab_{{$fdp->id}}" value="0">
                            </th>           
                            <th>{{$fdp->id}}</th> 
                            <th>{{$fdp->year}}</th> 
                            <th>@if($fdp->company) {{$fdp->company->company_name}} @endif </th> 
                            <th>@if($fdp->field) {{$fdp->field->field_name}} @endif </th> 
                            <th>{{$fdp->production_rate}}</th> 
                            <th>{{$fdp->expected_reserves}}</th> 
                            <th>{{$fdp->commencement_date}}</th> 
                            <th>{{$fdp->remark}}</th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appFDPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#FDP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_field_development_plan',
                    name:'Field Development Plan',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#FDP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Field Development Plan',
                model_name:'\App\\up_field_development_plan',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayFieldDevelopmentPlan();         $('#successModal').modal('show');        
        });

        $('#FDP_no_btn').click(function(e)
        {
            $('#appFDPmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appFDPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="FDP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="FDP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>