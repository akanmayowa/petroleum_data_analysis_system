<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Oil Spill Contingency<i style="margin-left: 50px">Total : {{$contingency->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appOSCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="OSCP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Zones</th>
                <th>Facility Type</th>
                <th>Terrain</th>
                <th>No of Companies </th>
                <th>Actual No of Companies</th>
            </tr>
            </thead>
            <tbody>
                @if($contingency)
                    @foreach($contingency as $contingencies)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$contingencies->id}}, '\App\\SheOilSpillContingency')" class="check_tabs" id="tab_{{$contingencies->id}}" name="tab_{{$contingencies->id}}" value="0">
                            </th> 
                            <th>{{$contingencies->id}}</th>
                            <th>{{$contingencies->year}}</th>
                            <th>{{$contingencies->zone?$contingencies->zone->zone_name:''}}</th>
                            <th> {{$contingencies->type?$contingencies->type->type_name:''}} </th>
                            <th> {{$contingencies->terrain?$contingencies->terrain->terrain_name:''}} </th>
                            <th>{{$contingencies->no_of_company}}</th>
                            <th>{{$contingencies->actual_no_of_company}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appOSCPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#OSCP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\SheOilSpillContingency',
                    name:'Oil Spill Contingency',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#OSCP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Import Permit',
                model_name:'\App\\SheOilSpillContingency',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayOilSpillContingency();  });      $('#successModal').modal('show');           
        });

        $('#OSCP_no_btn').click(function(e)
        {
            $('#appOSCPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appOSCPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="OSCP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="OSCP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>