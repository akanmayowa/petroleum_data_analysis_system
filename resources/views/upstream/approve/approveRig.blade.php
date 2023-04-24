<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Rig Disposition <i style="margin-left: 50px">Total : {{$rig->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf   
        <table class="table table-striped table-responsive mb-0" id="rig_table" style="width: 100%; display: block; padding: 0px">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="RD_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Rig Type</th>
                <th>Terrain</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Aug</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
            </tr>

            </thead>
            <tbody>
                @if($rig)
                    @foreach($rig as $_rig_disp)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$deferment->id}}, '\App\\up_crude_rig_disposition')" class="check_tabs" id="tab_{{$deferment->id}}" name="tab_{{$deferment->id}}" value="0">
                            </th>           
                            <th>{{$_rig_disp->id}}</th> 
                            <th>{{$_rig_disp->year}}</th> 
                            <th>@if($_rig_disp->rig_type) {{$_rig_disp->rig_type->rig_type_name}} @endif </th> 
                            <th>@if($_rig_disp->terrain) {{$_rig_disp->terrain->terrain_name}} @endif </th> 
                            <th>{{$_rig_disp->january}}</th> 
                            <th>{{$_rig_disp->febuary}}</th> 
                            <th>{{$_rig_disp->march}}</th> 
                            <th>{{$_rig_disp->april}}</th> 
                            <th>{{$_rig_disp->may}}</th> 
                            <th>{{$_rig_disp->june}}</th> 
                            <th>{{$_rig_disp->july}}</th> 
                            <th>{{$_rig_disp->august}}</th> 
                            <th>{{$_rig_disp->september}}</th> 
                            <th>{{$_rig_disp->october}}</th> 
                            <th>{{$_rig_disp->november}}</th> 
                            <th>{{$_rig_disp->december}}</th>     
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appRDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#RD_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_crude_rig_disposition',
                    name:'Rig Disposition',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#RD_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Rig Disposition',
                model_name:'\App\\up_crude_rig_disposition',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayRigDisposition();         $('#successModal').modal('show');        
        });

        $('#RD_no_btn').click(function(e)
        {
            $('#appRDmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appRDmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="RD_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="RD_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>