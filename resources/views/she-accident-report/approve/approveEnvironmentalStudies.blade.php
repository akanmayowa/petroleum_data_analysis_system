<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Environmental Studies <i style="margin-left: 50px">Total : {{$env_studies->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appESTUDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="ESTUD_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Company</th>
                <th>Study Title</th>
                <th>Type</th>
            </tr>

            </thead>
            <tbody>
                @if($env_studies)
                    @foreach($env_studies as $env_study)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$env_study->id}}, '\App\\she_environmental_studies')" class="check_tabs" id="tab_{{$env_study->id}}" name="tab_{{$env_study->id}}" value="0">
                            </th> 
                            <th>{{$env_study->year}}</th>
                            <th>{{$env_study->month}}</th>
                            <th>{{$env_study->company?$env_study->company->company_name:''}}</th>
                            <th>{{$env_study->study_title}}</th>
                            <th>{{$env_study->type?$env_study->type->type_name:''}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appESTUDmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
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

       
        $('#ESTUD_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\she_environmental_studies',
                    name:'Environmental Studies',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#ESTUD_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Environmental Studies',
                model_name:'\App\\she_environmental_studies',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayEnvironmentalStudies();  });      $('#successModal').modal('show');           
        });

        $('#ESTUD_no_btn').click(function(e)
        {
            $('#appESTUDmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appESTUDmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="ESTUD_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="ESTUD_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>