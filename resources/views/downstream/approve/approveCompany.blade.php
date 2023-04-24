<table class="table table-striped mb-0" id="">
    <div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Crude Export by Company <i style="margin-left: 50px">Total : {{$company->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appEBDCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 table-responsive" id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="EBDC_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>#</th>
                <th>Year</th>
                <th>Destination</th>
                <th>Company</th>
                <th>Jan </th>
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
                @if($company)
                    @foreach($company as $export_dest_comps)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$export_dest_comps->id}}, '\App\\down_crude_export_by_company')" class="check_tabs" id="tab_{{$export_dest_comps->id}}" name="tab_{{$export_dest_comps->id}}" value="0">
                            </th>
                            <th>{{$export_dest_comps->id}}</th>
                            <th>{{$export_dest_comps->year}}</th>
                            <th>@if($export_dest_comps->continent) {{$export_dest_comps->continent->continent_name}} @endif</th>
                            <th>@if($export_dest_comps->company) {{$export_dest_comps->company->company_name}} @endif</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->january}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->febuary}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->march}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->april}}</th> 
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->may}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->june}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->july}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->august}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->september}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->october}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->november}}</th>
                            <th data-toggle="tooltip" title="Volume In MMbbls">{{$export_dest_comps->december}}</th>   
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appEBDCmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#EBDC_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\down_crude_export_by_company',
                    name:'Crude Export by Company',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#EBDC_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Crude Export by Company',
                model_name:'\App\\down_crude_export_by_company',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');  }); 

             displayDestCompany();     $('#successModal').modal('show');           
        });

        $('#EBDC_no_btn').click(function(e)
        {
            $('#appEBDCmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appEBDCmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="EBDC_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="EBDC_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>