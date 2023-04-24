<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Domestic Gas Obligation <i style="margin-left: 50px">Total : {{$obligations->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appOBLImodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="OBLI_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Company</th>
                <th>Obligation <i class="units">MMSCF/D</i></th>
            </tr>

            </thead>
            <tbody>
                @if($obligations)
                    @foreach($obligations as $obligation)
                        <tr>
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$obligation->id}}, '\App\\gas_domestic_gas_obligation')" class="check_tabs" id="tab_{{$obligation->id}}" name="tab_{{$obligation->id}}" value="0">
                            </th> 
                             <th>{{$obligation->year}}</th>
                             <th>@if($obligation->company) {{$obligation->company->company_name}} @endif</th> 
                             <th data-toggle="tooltip" title="Volume In MMSCF/D">{{$obligation->obligation}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appOBLImodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#OBLI_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_domestic_gas_obligation',
                    name:'Dom Gas Obligation',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#OBLI_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Dom Gas Obligation',
                model_name:'\App\\gas_domestic_gas_obligation',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    displayObligation();  });      $('#successModal').modal('show');  
            setTimeout(function(){  $('#bd').css("padding-right", 0);  },1000);
        });

        $('#OBLI_no_btn').click(function(e)
        {
            $('#appOBLImodal').modal('hide');            
            setTimeout(function(){  $('#bd').css("padding-right", 0);  },1000);

        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appOBLImodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="OBLI_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="OBLI_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>