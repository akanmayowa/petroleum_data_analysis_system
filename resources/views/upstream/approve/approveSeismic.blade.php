<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Seismic Data <i style="margin-left: 50px">Total : {{$seismic->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appSDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>
    <form action="{{route('set-stage_id')}}" method="POST">@csrf   
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="SD_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Location</th>
                <th>Terrain</th>
                <th>Geophysical</th>
                <th>Geotechnical</th>
                <th>Activity</th>
                <th>Approved Converage sq.km</th>
                <th>Actual Converage sq.km</th>
                <th>Status</th>
            </tr>

            </thead>
            <tbody>
                @if($seismic)
                    @foreach($seismic as $_seismic)
                        <tr>           
                            <th>
                                <input type="checkbox" onclick="setValue({{$_seismic->id}}, '\App\\up_seismic_data')" class="check_tabs" id="tab_{{$_seismic->id}}" name="tab_{{$_seismic->id}}" value="0">
                            </th>     
                            <th>{{$_seismic->id}}</th>       
                            <th>{{$_seismic->year}}</th>   
                            <th>{{$_seismic->month}}</th> 
                            <th>{{$_seismic->field_id}}</th>   
                            <th>@if($_seismic->terrain){{$_seismic->terrain->terrain_name}}@endif</th>
                            <th>@if($_seismic->geophysical){{$_seismic->geophysical->geophysical_name}}@endif</th>
                            <th>@if($_seismic->geotechnical){{$_seismic->geotechnical->geotechnical_name}}@endif</th>
                            <th>@if($_seismic->seismic_types){{$_seismic->seismic_types->seismic_type_name}}@endif</th>
                            <th data-toggle="tooltip" title="Volume In Sq-Km">{{$_seismic->approved_coverage}}</th>
                            <th data-toggle="tooltip" title="Volume In Sq-Km">{{$_seismic->actual_coverage}}</th>
                            <th>@if($_seismic->status_category){{$_seismic->status_category->status}}@endif</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>
    <a data-toggle="tooltip" onclick="showmodal('appSDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#SD_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_seismic_data',
                    name:'Seismic Data',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#SD_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Seismic Data',
                model_name:'\App\\up_seismic_data',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displaySeismicData();         $('#successModal').modal('show');        
        });

        $('#SD_no_btn').click(function(e)
        {
            $('#appSDmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appSDmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="SD_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="SD_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>