<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending GAS Import Permit Volume (LPG)  <i style="margin-left: 50px">Total : {{$volume_permits->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPERMmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PERM_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Import Permit No</th>
                <th>Date Issued <i class="units"></i></th>
                <th>Validity Period <i class="units"></i></th>
                <th>Product <i class="units"></i></th>
                <th>Volume <i class="units"> MT</i></th>
                <th>Country <i class="units"></i></th> 
            </tr>

            </thead>
            <tbody>
                @if($volume_permits)
                    @foreach($volume_permits as $volume_permit)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$volume_permit->id}}, '\App\\gas_product_vol_import_permit')" class="check_tabs" id="tab_{{$volume_permit->id}}" name="tab_{{$volume_permit->id}}" value="0">
                            </th> 
                            <th>{{$volume_permit->year}}</th>
                             <th>{{$volume_permit->month}}</th>
                             <th>@if($volume_permit->company) {{$volume_permit->company->company_name}} @endif</th>
                             <th>{{$volume_permit->import_permit_no}}</th>
                             <th>{{$volume_permit->issued_date}}</th>
                             <th>{{$volume_permit->validity_period}}</th>
                             <th>@if($volume_permit->product) {{$volume_permit->product->product_name}} @endif</th> 
                             <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{$volume_permit->volume}}</th>
                             <th>@if($volume_permit->country) {{$volume_permit->country->country_name}} @endif</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appPERMmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#PERM_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_product_vol_import_permit',
                    name:'Gas Import Permit',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PERM_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Import Permit',
                model_name:'\App\\gas_product_vol_import_permit',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayProductVolPermit();  });      $('#successModal').modal('show');           
        });

        $('#PERM_no_btn').click(function(e)
        {
            $('#appPERMmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPERMmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PERM_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PERM_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>