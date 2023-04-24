<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Oil Reserves  <i style="margin-left: 50px">Total : {{$oil->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appORmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <form action="{{route('set-stage_id')}}" method="POST">@csrf  
        <table class="table table-striped mb-0" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th style="width: 5%">
                    <label style="text-align: left"> <input type="checkbox" class="" id="OR_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Contract</th>
                <th>Terrain</th>
                <th>Company</th>
                <th>Oil Reserves MMbbls</th>
            </tr>

            </thead>
            <tbody>
                @if($oil)
                    @foreach($oil as $oils)
                        <tr>        
                            <th>
                                <input type="checkbox" onclick="setValue({{$oils->id}}, '\App\\up_reserves_oil')" class="check_tabs" id="tab_{{$oils->id}}" name="tab_{{$oils->id}}" value="0">
                            </th>   
                            <th class="tb-row-height">{{$oils->id}}</th> 
                            <th class="tb-row-height">{{$oils->year}}</th> 
                            <th class="tb-row-height">@if($oils->contract) {{$oils->contract->contract_name}} @endif</th> 
                            <th class="tb-row-height">@if($oils->terrain) {{$oils->terrain->terrain_name}} @endif</th> 
                            <th class="tb-row-height">@if($oils->company) {{$oils->company->company_name}} @endif</th> 
                            <th class="tb-row-height">{{number_format($oils->oil_reserves, 2)}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </form>   
    <a data-toggle="tooltip" onclick="showmodal('appORmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#OR_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_reserves_oil',
                    name:'Oil Reserves',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#OR_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Oil Reserves',
                model_name:'\App\\up_reserves_oil',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  });

             displayReserveOil();         $('#successModal').modal('show');        
        });

        $('#OR_no_btn').click(function(e)
        {
            $('#appORmodal').modal('hide');
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>



<!-- Approve modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appORmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="OR_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="OR_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>