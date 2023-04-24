<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Pending Refinery Production Data <i style="margin-left: 50px">Total : {{$ref_production->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appRefProdmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5>  
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #ccc">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PPI_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Market</th>
                <th>Product</th>
                <th>Stream</th>
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
                @if($ref_production)
                    @foreach($ref_production as $_ref_production)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_ref_production->id}}, '\App\\down_refinary_production')" class="check_tabs" id="tab_{{$_ref_production->id}}" name="tab_{{$_ref_production->id}}" value="0">
                            </th>
                             <th style="font-size: 11px">{{$_ref_production->year}}</th>
                             <th style="font-size: 11px">{{$_ref_production->id}}</th>
                             <th style="font-size: 11px">{{$_ref_production->market_segment?$_ref_production->market_segment->market_segment_name:''}}</th> 
                             <th style="font-size: 11px">{{$_ref_production->product?$_ref_production->product->product_name:''}}</th>
                             <th style="font-size: 11px">{{$_ref_production->stream?$_ref_streamion->stream->stream_name:''}}</th> 
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->january}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->febuary}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->march}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->april}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->may}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->june}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->july}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->august}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->september}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->october}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->november}}</th>
                             <th data-toggle="tooltip" title="Volume In MT" style="font-size: 11px">{{$_ref_production->december}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <a data-toggle="tooltip" onclick="showmodal('appRefProdmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a> 
</div> <!-- end col -->   




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

       
        $('#PPI_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_refinary_production',
                    name:'Petroleum Products Importation by Market Segment',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PPI_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Petroleum Products Importation by Market Segment',
                model_name:'\App\\down_refinary_production',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayRefineryProd();     $('#successModal').modal('show');           
        });

        $('#PPI_no_btn').click(function(e)
        {
            $('#appPPImodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPPImodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PPI_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PPI_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>