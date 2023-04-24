<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Produced Water Volume <i style="margin-left: 50px">Total : {{$water_vols->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appWVGmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="WVG_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Facility</th>
                <th>Terrain</th>
                <th>Concession</th>
                <th>Volume <i class="units">Bbl</i></th>
            </tr>

            </thead>
            <tbody>
                @if($water_vols)
                    @foreach($water_vols as $water_vol)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$water_vol->id}}, '\App\\she_water_volumes_generated')" class="check_tabs" id="tab_{{$water_vol->id}}" name="tab_{{$water_vol->id}}" value="0">
                            </th> 
                            <th>{{$water_vol->year}}</th>
                            <th>{{$water_vol->month}}</th>
                            <th> {{$water_vol->company?$water_vol->company->company_name:''}}</th>
                            <th>{{$water_vol->facility_id}}</th>
                            <th>{{$water_vol->terrain}}</th>
                            <th>{{$water_vol->concession_id}}</th>
                            <th data-toggle="tooltip" title="Volume In Bbl">{{$water_vol->volume}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appWVGmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#WVG_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_water_volumes_generated',
                    name:'Pr Water Volume',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#WVG_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Pr Water Volume',
                model_name:'\App\\she_water_volumes_generated',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayWaterVol();  });      $('#successModal').modal('show');           
        });

        $('#WVG_no_btn').click(function(e)
        {
            $('#appWVGmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appWVGmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="WVG_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="WVG_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>