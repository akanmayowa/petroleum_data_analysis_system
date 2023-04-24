<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Company / Operator   
        <a data-toggle="tooltip" onclick="showmodal('appCOMPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
    <table class="table table-striped mb-0" id="company_table">
        <thead>
        <tr style="background-color: #ccc">
            <th>
                <label style="text-align: left"> <input type="checkbox" class="" id="COMP_check_all" style="margin-top: 5px;"> </label>
            </th>
            <th>Company</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Phone</th>
            <th>RC - Number</th>
            <th>License Expires</th>
        </tr>

        </thead>
        <tbody>
            @if($company)
                @foreach($company as $companies)
                    <tr> 
                        <th style="width: 6%">
                            <input type="checkbox" onclick="setValue({{$companies->id}}, '\App\\company')" class="check_tabs" id="tab_{{$companies->id}}" name="tab_{{$companies->id}}" value="0">
                        </th>  
                        <th>{{$companies->company_name}}</th>    
                        <th>{{$companies->contact_name}}</th>  
                        <th>{{$companies->email}}</th>  
                        <th>{{$companies->phone}}</th>  
                        <th>{{$companies->rc_number}}</th>  
                        <th>{{$companies->license_expire_date}}</th>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>   
    <a data-toggle="tooltip" onclick="showmodal('appCOMPmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#COMP_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\company',
                    name:'Company',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#COMP_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Company',
                model_name:'\App\\company',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayCompany();  });      $('#successModal').modal('show');           
        });

        $('#COMP_no_btn').click(function(e)
        {
            $('#appCOMPmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appCOMPmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="COMP_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="COMP_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>