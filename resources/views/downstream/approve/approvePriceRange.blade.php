
<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Products Average Consumer Price Range <i style="margin-left: 50px">Total : {{$price_range->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appAPPRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="APPR_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Month</th>
                <th>Market Segment</th>
                <th>PMS <i class="units">&#8358;</i></th>
                <th>AGO <i class="units">&#8358;</i></th>
                <th>DPK <i class="units">&#8358;</i></th>
                <th>Uploaded On</th> 
            </tr>

            </thead>
            <tbody>
                @if($price_range)
                    @foreach($price_range as $_ave_price_range)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_ave_price_range->id}}, '\App\\down_ave_consumer_price_range')" class="check_tabs" id="tab_{{$_ave_price_range->id}}" name="tab_{{$_ave_price_range->id}}" value="0">
                            </th>
                            <th>{{$_ave_price_range->id}}</th>
                            <th>{{$_ave_price_range->year}}</th>
                            <th>{{$_ave_price_range->month}}</th>
                            <th>{{$_ave_price_range->production_types?$_ave_price_range->production_types->market_segment_name:''}}</th>
                            <th data-toggle="tooltip" title="Price In Naira"> &#8358;{{$_ave_price_range->pms}}  -  {{$_ave_price_range->pms_to}}</th>
                            <th data-toggle="tooltip" title="Price In Naira"> &#8358;{{$_ave_price_range->ago}}  -  {{$_ave_price_range->ago_to}}</th>
                            <th data-toggle="tooltip" title="Price In Naira"> &#8358;{{$_ave_price_range->dpk}}  -  {{$_ave_price_range->dpk_to}}</th>
                            <th>{{\Carbon\Carbon::parse($_ave_price_range->created_at)->diffForHumans()}}</th>   
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appAPPRmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#APPR_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_ave_consumer_price_range',
                    name:'Prodect Average Price',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#APPR_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Prodect Average Price',
                model_name:'\App\\down_ave_consumer_price_range',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayAveragePrice();     $('#successModal').modal('show');           
        });

        $('#APPR_no_btn').click(function(e)
        {
            $('#appAPPRmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appAPPRmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="APPR_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="APPR_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>