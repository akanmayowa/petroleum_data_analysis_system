<div class="table-responsive">
    <h5 style="margin-left: 5px; color: #aaa"> Pending Gas Products <i style="margin-left: 50px">Total : {{$gas_prod->count()}}</i>  
        <a data-toggle="tooltip" onclick="showmodal('appPRODmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>
    </h5> 
        <table class="table table-striped mb-0 " id="">
            <thead>
            <tr style="background-color: #9BDDFF">
                <th>
                    <label style="text-align: left"> <input type="checkbox" class="" id="PROD_check_all" style="margin-top: 5px;"> </label>
                </th>
                <th>Year</th>
                <th>Month</th>
                <th>Category</th>
                {{-- <th>State</th> --}}
                {{-- <th>Local Govt Area <i class="units"></i></th> --}}
                <th>Zones <i class="units"></i></th>
                {{-- <th>No of Plant <i class="units"></i></th> --}}
                <th>Capacity <i class="units">MT</i></th>
            </tr>

            </thead>
            <tbody>
                @if($gas_prod)
                    @foreach($gas_prod as $_gas_prod)
                        <tr> 
                            <th style="width: 6%">
                                <input type="checkbox" onclick="setValue({{$_gas_prod->id}}, '\App\\gas_product_monitoring')" class="check_tabs" id="tab_{{$_gas_prod->id}}" name="tab_{{$_gas_prod->id}}" value="0">
                            </th>
                            <th>{{$_gas_prod->year}}</th>
                            <th>{{$_gas_prod->month}}</th>
                             {{-- <th>{{$_gas_prod->company?$_gas_prod->company->company_name:''}}</th>  --}}
                             <th>{{$_gas_prod->category?$_gas_prod->category->category_name:''}}</th> 
                             {{-- <th>{{$_gas_prod->state?$_gas_prod->state->state_name:''}}</th> --}}
                             {{-- <th>{{$_gas_prod->lga}}</th> --}}
                             <th>{{$_gas_prod->zone}}</th>
                             {{-- <th>{{$_gas_prod->no_of_plant}}</th> --}}
                             <th data-toggle="tooltip" title="">{{$_gas_prod->capacity}}</th> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <a data-toggle="tooltip" onclick="showmodal('appPRODmodal')" class="btn btn-primary waves-effect waves-light approve-btn pull-right" title="Approve All Pending Data" style="color: #fff">  <i class="fa fa-check"> </i> Approve Data </a>    
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

       
        $('#PROD_check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 

            var ck = $('input:checkbox').prop('checked');
            if(ck == true)
            { 
                formData = 
                {
                    model_name:'\App\\gas_product_monitoring',
                    name:'Gas Products',
                    stage_id:1,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-all-stage_id')}}', formData, function(data, status, xhr)
                {   });   
            }
            else if(ck == false){ stage_id = 0;    }            
        }); 

       
        $('#PROD_yes_btn').click(function(e) 
        {    
            e.preventDefault();
            formData = 
            {
                name:'Gas Products',
                model_name:'\App\\gas_product_monitoring',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-custodian-for-approval')}}', formData, function(data, status, xhr)
            {  $('.modal').modal('hide');    
            displayGasProductLPG(); displayGasProductCNG(); displayProductLNG(); displayGasProductPROPANE();  });      
            $('#successModal').modal('show');           
        });

        $('#PROD_no_btn').click(function(e)
        {
            $('#appPRODmodal').modal('hide');
        });      
    });

    //SORT SCRIPT
    sortAscDesc();
</script>





<!-- Approve Provisional Crude modal -->
<form id="" action="{{route('notify-custodian-for-approval')}}" method="POST">
    @csrf 
    <div id="appPRODmodal" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
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
                        <button type="button" name="" id="PROD_no_btn" class="btn btn-outline-warning waves-effect waves-lightbtn-lg"> Cancel </button>
                        <button type="submit" name="yes_btn" id="PROD_yes_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>