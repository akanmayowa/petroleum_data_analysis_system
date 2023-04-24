<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending GAS Export Volume <i style="margin-left: 50px">Total : {{$gas_export->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appEXPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="EXP_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Equity Holder</th>
                <th>Terminal</th>
                <th>Product</th>
                <th>No of Vessel<i class="units"></i></th>
                <th>Volume<i class="units">MT</i></th>
            </tr>

            </thead>
            <tbody>
                @if($gas_export)
                    @foreach($gas_export as $gas_exported)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$gas_exported->id}}, '\App\\gas_export_volume_vessel')" class="check_tabs" id="tab_{{$gas_exported->id}}" name="tab_{{$gas_exported->id}}" value="0">
                            </th>
                            <th>{{$gas_exported->year}}</th>
                            <th>{{$gas_exported->month}}</th>
                            <th>{{$gas_exported->equity_holder_id}}</th>
                            {{-- <th>{{$gas_exported->equity?$gas_exported->equity->company_name:''}}</th>  --}}
                            <th>{{$gas_exported->stream?$gas_exported->stream->stream_name:''}}</th>
                            <th>{{$gas_exported->product?$gas_exported->product->product_name:''}}</th>
                            <th data-toggle="tooltip" title="">{{$gas_exported->no_of_vessel}}</th>
                            <th data-toggle="tooltip" title="Unit in MT">{{$gas_exported->volume}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appEXPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#EXP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_export_volume_vessel',
                    name:'Gas Export',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#EXP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Export',
                model_name:'\App\\gas_export_volume_vessel',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayGasExport();  });      $('#successModal').modal('show');           
        });

        $('#EXP_no_btn').click(function(e)
        {
            $('#appEXPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appEXPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="EXP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="EXP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>