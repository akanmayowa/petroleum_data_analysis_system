<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Well Activities <i style="margin-left: 50px">Total : {{$well->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appWADmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf   
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="WAW_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Terrain</th>
                <th>Class</th>
                <th>Type</th>
                <th>Contract</th>
                <th>Wells</th>
            </tr>

            </thead>
            <tbody>
                @if($well)
                    @foreach($well as $well_activity)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$well_activity->id}}, '\App\\up_well_activities')" class="check_tabs" id="tab_{{$well_activity->id}}" name="tab_{{$well_activity->id}}" value="0">
                            </th>  
                            <th>{{$well_activity->id}}</th>
                            <th>{{$well_activity->year}}</th> 
                            <th>{{$well_activity->month}}</th> 
                            <th>@if($well_activity->terrain){{$well_activity->terrain->terrain_name}}@endif</th> 
                            <th>@if($well_activity->class){{$well_activity->class->class_name}}@endif</th> 
                            <th>@if($well_activity->type){{$well_activity->type->type_name}} @else N/A @endif</th> 
                            <th>@if($well_activity->contract){{$well_activity->contract->contract_name}} @endif</th>
                            <th>{{$well_activity->no_of_well}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appWADmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#WAW_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_well_activities',
                    name:'Well Activities Drilling',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#WAW_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Well Activities Drilling',
                model_name:'\App\\up_well_activities',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayWellActivities();         $('#successModal').modal('show');        
        });

        $('#WAW_no_btn').click(function(e)
        {
            $('#appWAWmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appWAWmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="WAW_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="WAW_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>