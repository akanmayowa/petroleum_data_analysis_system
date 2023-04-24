<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Lubricant blending plant Data <i style="margin-left: 50px">Total : {{$marketer->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appLBPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="LBP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Market Segment</th>
                <th>Company</th>
                <th>Location</th>
                <th>Storage Capacity <i class="units">Litres</i></th>
                <th>Uploaded On</th>
            </tr>

            </thead>
            <tbody>
                @if($marketer)
                    @foreach($marketer as $_l_marketer)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_l_marketer->id}}, '\App\\down_licensed_oil_makerters')" class="check_tabs" id="tab_{{$_l_marketer->id}}" name="tab_{{$_l_marketer->id}}" value="0">
                            </th> 
                             <th>{{$_l_marketer->id}}</th>
                             <th>{{$_l_marketer->year}}</th>
                             <th>@if($_l_marketer->market_category) {{$_l_marketer->market_category->market_segment_name}} @endif</th> 
                             <th>@if($_l_marketer->company) {{$_l_marketer->company->company_name}} @endif</th> 
                             <th>{{$_l_marketer->location_id}}</th>
                             <th data-toggle="tooltip" title="Volume In Litres">{{number_format($_l_marketer->storage_capacity)}}</th>
                            <th>{{\Carbon\Carbon::parse($_l_marketer->created_at)->diffForHumans()}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appLBPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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
            $('#'+type).load(aID)
        });

       
        $('#LBP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_licensed_oil_makerters',
                    name:'Lubricant blending plant',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#LBP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Lubricant blending plant',
                model_name:'\App\\down_licensed_oil_makerters',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayLicenseMarketer();     $('#successModal').modal('show');           
        });

        $('#LBP_no_btn').click(function(e)
        {
            $('#appLBPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appLBPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="LBP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="LBP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>