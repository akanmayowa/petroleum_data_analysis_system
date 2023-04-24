<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Drilling Gas <i style="margin-left: 50px">Total : {{$drilling_gas->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appDGmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="DG_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Field</th>
                <th>Company</th>
                <th>Concession</th>
                <th>Well</th>
                <th>Type</th>
                <th>Terrain</th>
                <th>Facility</th>
                <th>Reserves (Bscf)</th>
                <th>Off-Take (MMSCFD)</th>
            </tr>

            </thead>
            <tbody>
                @if($drilling_gas)
                    @foreach($drilling_gas as $_drilling_gas)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$_drilling_gas->id}}, '\App\\up_drilling_gas')" class="check_tabs" id="tab_{{$_drilling_gas->id}}" name="tab_{{$_drilling_gas->id}}" value="0">
                            </th>           
                            <th>{{$_drilling_gas->id}}</th> 
                            <th>{{$_drilling_gas->year}}</th> 
                            <th>{{$_drilling_gas->month}}</th> 
                            <th>@if($_drilling_gas->field) {{$_drilling_gas->field->field_name}} @endif </th> 
                            <th>@if($_drilling_gas->company) {{$_drilling_gas->company->company_name}} @endif </th> 
                            <th>@if($_drilling_gas->concession) {{$_drilling_gas->concession->concession_name}} @endif </th> 
                            <th>{{$_drilling_gas->well}}</th> 
                            <th>
                                @if($_drilling_gas->type_id == 1)Appraisal/ Development
                                @elseif($_drilling_gas->type_id == 2)Initial Completion @else @endif
                            </th> 
                            <th>@if($_drilling_gas->terrain) {{$_drilling_gas->terrain->terrain_name}} @endif </th>
                            <th>@if($_drilling_gas->facility) {{$_drilling_gas->facility->facility_name}} @endif </th>
                            <th>{{$_drilling_gas->reserve}}</th> 
                            <th>{{$_drilling_gas->off_take}}</th>  
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appDGmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#DG_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_drilling_gas',
                    name:'Drilling Gas',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#DG_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Drilling Gas',
                model_name:'\App\\up_drilling_gas',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayDrillingGas();         $('#successModal').modal('show');        
        });

        $('#DG_no_btn').click(function(e)
        {
            $('#appDGmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appDGmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="DG_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="DG_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>