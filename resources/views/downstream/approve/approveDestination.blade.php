<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Crude Export by Destination <i style="margin-left: 50px">Total : {{$destination->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appEBDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="EBD_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Stream</th>
                <th>Destination</th>
                <th>Country</th>
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
                @if($destination)
                    @foreach($destination as $_export_dest)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_export_dest->id}}, '\App\\down_crude_export_by_destination')" class="check_tabs" id="tab_{{$_export_dest->id}}" name="tab_{{$_export_dest->id}}" value="0">
                            </th>
                            <th>{{$_export_dest->id}}</th>
                            <th>{{$_export_dest->year}}</th>
                            <th>{{$_export_dest->stream?$_export_dest->stream->stream_name:''}}</th>
                            <th>{{$_export_dest->region?$_export_dest->region->name:''}}</th>
                            <th>{{$_export_dest->country?$_export_dest->country->country_name:''}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->january}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->febuary}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->march}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->april}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->may}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->june}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->july}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->august}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->september}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->october}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->november}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$_export_dest->december}}</th>    
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appEBDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#EBD_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_crude_export_by_destination',
                    name:'Expot by Destination',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#EBD_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Expot by Destination',
                model_name:'\App\\down_crude_export_by_destination',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayDestination();     $('#successModal').modal('show');           
        });

        $('#EBD_no_btn').click(function(e)
        {
            $('#appEBDmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appEBDmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="EBD_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="EBD_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>