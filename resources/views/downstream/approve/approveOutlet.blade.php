<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Retail Outlet Count <i style="margin-left: 50px">Total : {{$outlet->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appROCCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="ROCC_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>State</th>
                <th>Market</th>
                <th>Jan <i class="units"></i></th>
                <th>Feb <i class="units"></i></th>
                <th>Mar <i class="units"></i></th>
                <th>Apr <i class="units"></i></th>
                <th>May <i class="units"></i></th>
                <th>Jun <i class="units"></i></th>
                <th>Jul <i class="units"></i></th>
                <th>Aug <i class="units"></i></th>
                <th>Sep <i class="units"></i></th>
                <th>Oct <i class="units"></i></th>
                <th>Nov <i class="units"></i></th>
                <th>Dec <i class="units"></i></th>
            </tr>

            </thead>
            <tbody>
                @if($outlet)
                    @foreach($outlet as $_ret_outlet)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_ret_outlet->id}}, '\App\\down_retail_outlet_summary')" class="check_tabs" id="tab_{{$_ret_outlet->id}}" name="tab_{{$_ret_outlet->id}}" value="0">
                            </th>
                             <th>{{$_ret_outlet->id}}</th>
                             <th>{{$_ret_outlet->year}}</th>
                             <th>@if($_ret_outlet->state) {{$_ret_outlet->state->state_name}} @endif</th> 
                             <th>@if($_ret_outlet->market_segment) {{$_ret_outlet->market_segment->market_segment_name}} @endif</th>
                             <th>{{$_ret_outlet->january}}</th>
                             <th>{{$_ret_outlet->febuary}}</th>
                             <th>{{$_ret_outlet->march}}</th>
                             <th>{{$_ret_outlet->april}}</th>
                             <th>{{$_ret_outlet->may}}</th>
                             <th>{{$_ret_outlet->june}}</th>
                             <th>{{$_ret_outlet->july}}</th>
                             <th>{{$_ret_outlet->august}}</th>
                             <th>{{$_ret_outlet->september}}</th>
                             <th>{{$_ret_outlet->october}}</th>
                             <th>{{$_ret_outlet->november}}</th>
                             <th>{{$_ret_outlet->december}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appROCCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#ROCC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_retail_outlet_summary',
                    name:'Retail Outlet Count',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ROCC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Retail Outlet Count',
                model_name:'\App\\down_retail_outlet_summary',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayReTailOutlet();     $('#successModal').modal('show');           
        });

        $('#ROCC_no_btn').click(function(e)
        {
            $('#appROCCmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appROCCmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ROCC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ROCC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>