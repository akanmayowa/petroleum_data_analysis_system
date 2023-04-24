<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending CERTIFICATION OF OIL FIELD CHEMICALS <i style="margin-left: 50px">Total : {{$chem_certifications->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appCCERTmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="CCERT_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Chemical Name</th>
                <th>Certification Category</th>
                <th>Chemical Type</th>
                <th>Certification Date</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>

            </thead>
            <tbody>
                @if($chem_certifications)
                    @foreach($chem_certifications as $chem_cert)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$chem_cert->id}}, '\App\\she_chemical_certification')" class="check_tabs" id="tab_{{$chem_cert->id}}" name="tab_{{$chem_cert->id}}" value="0">
                            </th> 
                            <th>{{$chem_cert->year}}</th>
                            <th>{{$chem_cert->month}}</th>
                            <th>{{substr($chem_cert->company?$chem_cert->company->company_name:'', 0, 30)}}</th>
                            <th>{{$chem_cert->chemical_name}}</th> 
                            <th>{{$chem_cert->category?$chem_cert->category->category_name:''}}</th>
                            <th>{{$chem_cert->chemical_type}}</th>
                            <th>{{$chem_cert->certification_date}}</th>
                            <th>{{$chem_cert->status_id}}</th>
                            <th>{{$chem_cert->remark}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appCCERTmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
</div>



<script>
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

       
        $('#CCERT_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_chemical_certification',
                    name:'Chemical Certification',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#CCERT_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Chemical Certification',
                model_name:'\App\\she_chemical_certification',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayChemicalCertification();  });      $('#successModal').modal('show');           
        });

        $('#CCERT_no_btn').click(function(e)
        {
            $('#appCCERTmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appCCERTmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="CCERT_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="CCERT_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>