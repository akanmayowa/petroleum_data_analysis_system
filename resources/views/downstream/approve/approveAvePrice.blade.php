<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Average Price of Nigeria Crude Streams <i style="margin-left: 50px">Total : {{$ave_prices->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appACPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="ACP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Stream </th>
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
                @if($ave_prices)
                    @foreach($ave_prices as $ave_price)
                        <tr>    
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$ave_price->id}}, '\App\\up_ave_price_crude_stream')" class="check_tabs" id="tab_{{$ave_price->id}}" name="tab_{{$ave_price->id}}" value="0">
                            </th>
                            <th>{{$ave_price->year}}</th> 
                            <th>@if($ave_price->stream) {{$ave_price->stream->stream_name}} @endif </th> 
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->january}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->febuary}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->march}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->april}}</th> 
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->may}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->june}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->july}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->august}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->september}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->october}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->november}}</th>
                            <th data-toggle="tooltip" title="Price In USD">{{$ave_price->december}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appACPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#ACP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\up_ave_price_crude_stream',
                    name:'Average Crude Price',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ACP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Average Crude Price',
                model_name:'\App\\up_ave_price_crude_stream',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayAveragePrice();  });      $('#successModal').modal('show');           
        });

        $('#ACP_no_btn').click(function(e)
        {
            $('#appACPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appACPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ACP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ACP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>