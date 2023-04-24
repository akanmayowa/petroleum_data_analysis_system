<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Technology Adoptation <i style="margin-left: 50px">Total : {{$technologies->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appTECHmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="TECH_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Technology</th>
                <th>Application</th>
                <th>Approved Date</th>
                <th>Company</th>
                <th>Location</th>
                <th>Status</th>
            </tr>

            </thead>
            <tbody>
                @if($technologies)
                    @foreach($technologies as $technology)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$technology->id}}, '\App\\es_technology')" class="check_tabs" id="tab_{{$technology->id}}" name="tab_{{$technology->id}}" value="0">
                            </th>
                            <th>{{$technology->year}}</th>
                            <th>{{$technology->technology}}</th>
                            <th>{{$technology->application}}</th>
                            <th>{{$technology->adoptation_date}}</th>
                            <th>{{$technology->compnay_id}}</th>
                            <th>{{$technology->location_id}}</th> 
                            <th>{{$technology->statuses?$technology->statuses->status_name:''}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appTECHmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  
        <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#TECH_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\es_technology',
                    name:'Technology Adoptation',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#TECH_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Technology Adoptation',
                model_name:'\App\\es_technology',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayTechnology();  });      $('#successModal').modal('show');           
        });

        $('#TECH_no_btn').click(function(e)
        {
            $('#appTECHmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appTECHmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="TECH_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="TECH_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>