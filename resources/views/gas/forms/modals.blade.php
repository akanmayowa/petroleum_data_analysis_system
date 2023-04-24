
<!-- Add Domestic Gas Obligation Performance modal -->
<div id="addgas_obli" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Domestic Gas Obligation </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="obliForm" action="{{url('/gas/')}}" method="POST">
        <input type="hidden" name="date_gs" id="date_gs" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_supply_obligation">


          <div class="form-group row">
            <label for="year_obli" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year Of Export" name="year" id="year_obli" required="" readonly>
            </div>
          </div>


         <div class="form-group row">
            <label for="company_id_obli" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_obli" required>
                    <option value=""> Select Company </option>
                    @if($company_ob)
                        @foreach($company_ob as $company_ob)
                            <option value="{{$company_ob->id}}"> {{$company_ob->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


        <div class="form-group row">
            <label for="performance_obligation" class="col-sm-2 col-form-label"> Obligation </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control" placeholder="Obligation" name="performance_obligation" id="performance_obligation" onkeyup="checkValue(this)" value="0">
            </div>
        </div>  
        


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_gs_btn" id="add_gs_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Obligation </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Domestic Gas Obligation  modal -->
<div id="editgas_obli" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Domestic Gas Obligation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="editgasobli"> </div>
        </div>
    </div>
 </div>  
</div>


<!-- Upload Domestic Gas Obligation modal -->
<div id="uplgas_obli" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Domestic Gas Obligation Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_supply_obligation">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-obligation-template') }}" id="" download="Domestic Gas Obligation Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Domestic Gas Obligation Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Domestic Gas Obligation modal -->
<div id="view_gas_obli" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Domestic Gas Obligation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="viewgasobli"> </div>
        </div>
    </div>
 </div>  
</div>



<!-- Approve Domestic Gas Obligation modal -->
<div id="appgasobli" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Domestic Gas Obligation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_obli"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add Actual Gas Supply Performance modal -->
<div id="addgas_supply" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Actual Gas Supply </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="gassupplyForm" action="{{url('/gas/')}}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="type" id="" value="add_gas_supply_performance">


          <div class="form-group row">
            <label for="year_gs" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year" name="year" id="year_gs" required="" readonly>
            </div>

            <label for="month_gs" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_gs" required="" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label for="company_id_sup" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_sup" required>
                    <option value=""> Select Company </option>
                    @if($company_sup)
                        @foreach($company_sup as $company_sup)
                            <option value="{{$company_sup->id}}"> {{$company_sup->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          {{-- <div class="form-group row">
            <label for="year_gs" class="col-sm-2 col-form-label"> Year </label>

            <div class="col-sm-5">                
                <label class="container"> <span style="margin-left: 20px"> Individual Record </span>
                  <input type="radio" name="ind_tot" id="ind" value="1"> <span class="checkmark"></span>
                </label>
            </div>

            <div class="col-sm-5">      
                <label class="container"> <span style="margin-left: 20px"> Total Record </span>
                  <input type="radio" name="ind_tot" id="tot" value="2">  <span class="checkmark"></span>
                </label>
            </div>
          </div> --}}


            {{-- <div id="ind_div" style="display: none;">
                <div class="form-group row">
                    <label for="power" class="col-sm-2 col-form-label"> Supplied to Power </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control sup" placeholder="Supplied to Power" name="power" id="power" value="0" onkeyup="checkValue(this)">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="commercial" class="col-sm-2 col-form-label"> Supplied to Commercials </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control sup" placeholder="Supplied to Commercials" name="commercial" id="commercial" value="0" onkeyup="checkValue(this)">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="industry" class="col-sm-2 col-form-label"> Supplied to GBI </label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control sup" placeholder="Supplied to Gas Based Industry" name="industry" id="industry" value="0" onkeyup="checkValue(this)">
                    </div>
                </div>
            </div> --}}


            <div class="form-group row" id="tot_div">
                <label for="total" class="col-sm-2 col-form-label"> Total Supplied </label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control sup" placeholder="Total Gas Supplied" name="total" id="total" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

                      
        


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_gs_btn" id="add_gs_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Actual Gas Supply </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Actual Gas Supply Performance modal -->
<div id="editgas_supply" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Actual Gas Supply </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="editgassupply"> </div>
        </div>
    </div>
 </div>  
</div>


<!-- Upload Actual Gas Supply  Performance modal -->
<div id="uplgas_supply" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Actual Gas Supply Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_supply_performance">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{url('download-gas-supply-template')}}" id="" download="Actual Gas Supply Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Actual Gas Supply Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Actual Gas Supply Performance modal -->
<div id="view_gas_supply" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Actual Gas Supply </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="viewgassupply"> </div>
        </div>
    </div>
 </div>  
</div>



<!-- Approve Actual Gas Supply Performance modal -->
<div id="appgassupp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Actual Gas Supply Performance</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_supp"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Gas Supply Textile Industry Performance modal -->
<div id="add_textile_ind" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Gas Supply Textile Industry </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="textIndForms" action="{{url('/gas/')}}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="type" id="" value="add_gas_supply_textile_industry">


            <div class="form-group row">
                <label for="year_text" class="col-sm-3 col-form-label"> Year </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control year" placeholder="Year Of Export" name="year" id="year_text" required="" readonly="">
                </div>
            </div>


            <div class="form-group row">
                <label for="sector" class="col-sm-3 col-form-label"> Sector </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control sup" placeholder="Sector" name="sector" id="sector">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label"> Value </label>
                <div class="col-sm-9">
                    <input type="number" step="0.01" class="form-control sup" placeholder="" name="value" id="value" value="0" onkeyup="checkValue(this)">
                </div>
            </div>
        


        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_gs_btn" id="add_gs_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Supply Textile Industry </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Gas Supply Textile Industry modal -->
<div id="edit_textile_ind" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Gas Supply Textile Industry</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="edittextile_ind"> </div>
        </div>
    </div>
 </div>  
</div>


<!-- Upload Gas Supply Textile Industry modal -->
<div id="upl_textile_ind" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Supply Textile Industry Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_supply_textile_industry">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a id="downloadGasSupplyTextileIndustryTemplate" download="Gas Supply Textile Industry Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Supply Textile Industry Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Actual Gas Supply Performance modal -->
{{-- <div id="view_gas_supply" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Actual Gas Supply </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="viewgassupply"> </div>
        </div>
    </div>
 </div>  
</div> --}}



<!-- Approve Gas Supply Textile Industry modal -->
<div id="app_textile_ind" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Supply Textile Industry</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="apptextile_ind"></div>
          </div>
    </div>
    </div>  
</div>







<!-- Add Summary of Gas Production modal -->
<div id="addgas_summary" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Summary of Gas Production </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="gassummaryForm" action="{{url('/gas/')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_production_summary">
          

          <div class="form-group row">
            <label for="year_sum" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year Of Export" name="year" id="year_sum" required="" readonly>
            </div>  

            <label for="month_sum" class="col-sm-2 col-form-label"> month </label>
            <div class="col-sm-4">
                <select class="form-control" name="month" id="month_sum" required="true">
                    <option value=""> Select Month </option>
                    <option value="January"> January </option>
                    <option value="February">February </option>
                    <option value="March"> March </option>
                    <option value="April"> April </option>
                    <option value="May"> May </option>
                    <option value="June"> June </option>
                    <option value="July"> July </option>
                    <option value="August"> August </option>
                    <option value="September"> September </option>
                    <option value="October"> October </option>
                    <option value="November">November </option>
                    <option value="December"> December </option>
                </select>
            </div>               
        </div>


         <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-4">
                <select class="form-control" name="field_id" id="field_id">
                    <option value=""> Select Field </option>
                    @if($field_sup)
                        @foreach($field_sup as $field_sup)
                            <option value="{{$field_sup->id}}"> {{$field_sup->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                    @if($company_prod)
                        @foreach($company_prod as $company_prod)
                            <option value="{{$company_prod->id}}"> {{$company_prod->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

        

        <div class="form-group row">
            <label for="spdc" class="col-sm-2 col-form-label"> AG </label>
            <div class="col-sm-10">
                <input type="number" step="0.0000001" class="form-control tot_a" placeholder="Associated Gas" name="ag" id="ag" onkeyup="checkValue(this)" value="0">
            </div>
        </div>

        <div class="form-group row">
            <label for="cnl" class="col-sm-2 col-form-label"> NAG </label>
            <div class="col-sm-10">
                <input type="number" step="0.0000001" class="form-control tot_a" placeholder="Non Associated Gas" name="nag" id="nag" onkeyup="checkValue(this)" value="0">
            </div>
        </div>  



        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" step="0.0000001" class="form-control" placeholder="Total" name="total" id="total_ap" readonly="">
            </div>
        </div> 



        

        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Production </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Summary of Gas Production modal -->
<div id="editgas_summary" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Summary of Gas Production </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_gas_summary">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Summary of Gas Production modal -->
<div id="uplgas_summary" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Production Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_production_summary">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-production-template') }}" id="" download="Gas Production  Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Production Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Summary of Gas Production modal -->
<div id="view_gas_sum" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Summary of Gas Production </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewgas_sum">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Summary of Gas Production modal -->
<div id="appgassum" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Summary of Gas Production</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_sum"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Summary of Gas  Utilization modal -->
<div id="addgas_util" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Summary of Gas Utilization </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    <div class="modal-body">
      <form id="gasutilForm" action="{{url('/gas/')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_utilization_summary">
          

          <div class="form-group row">
            <label for="year_util" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year Of Export" name="year" id="year_util" required="" readonly>
            </div> 

            <label for="month_uti" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <select class="form-control" name="month" id="month_uti" required="true">
                    <option value=""> Select Month </option>
                    <option value="January"> January </option>
                    <option value="February">February </option>
                    <option value="March"> March </option>
                    <option value="April"> April </option>
                    <option value="May"> May </option>
                    <option value="June"> June </option>
                    <option value="July"> July </option>
                    <option value="August"> August </option>
                    <option value="September"> September </option>
                    <option value="October"> October </option>
                    <option value="November">November </option>
                    <option value="December"> December </option>
                </select>
            </div>
        </div>


         <div class="form-group row">            
            <label for="field_id" class="col-sm-2 col-form-label"> Field </label>
            <div class="col-sm-4">
                <select class="form-control" name="field_id" id="field_id" required>
                    <option value=""> Select Field </option>
                    @if($field_util)
                        @foreach($field_util as $field_util)
                            <option value="{{$field_util->id}}"> {{$field_util->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-4">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                    @if($company_util)
                        @foreach($company_util as $company_util)
                            <option value="{{$company_util->id}}"> {{$company_util->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


        <div class="form-group row">
            <label for="fuel_gas" class="col-sm-2 col-form-label"> Fuel Gas </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="fuel_gas" id="fuel_gas" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="gas_lift" class="col-sm-2 col-form-label"> Gas Lift </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="gas_lift" id="gas_lift" onkeyup="checkValue(this)" value="0">
            </div>
        </div>          

        <div class="form-group row">
            <label for="re_injection" class="col-sm-2 col-form-label"> Re-Injection </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="re_injection" id="re_injection" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="ngl_lpg" class="col-sm-2 col-form-label"> NLG LPG </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="ngl_lpg" id="ngl_lpg" onkeyup="checkValue(this)" value="0">
            </div>
        </div>          

        <div class="form-group row">          
            <label for="gas_to_nipp" class="col-sm-2 col-form-label"> Gas-NIPP </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="gas_to_nipp" id="gas_to_nipp" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="local_others" class="col-sm-2 col-form-label"> Local (Others) </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="local_others" id="local_others" onkeyup="checkValue(this)" value="0">
            </div>

        </div>          

        <div class="form-group row">
            <label for="nlng_export" class="col-sm-2 col-form-label"> NLNG Export </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas_util" name="nlng_export" id="nlng_export" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="shrinkage" class="col-sm-2 col-form-label"> Shrinkage </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas" placeholder="Total Gas Shrinkage" name="shrinkage" id="shrinkage">
            </div>
        </div> 

        <div class="form-group row">
            <label for="ag_gas_flared" class="col-sm-2 col-form-label"> AG Flared </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas" placeholder="AG Gas Flared" name="ag_gas_flared" id="ag_gas_flared">
            </div> 

            <label for="nag_gas_flared" class="col-sm-2 col-form-label"> NAG Flared </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas" placeholder="NAG Gas Flared" name="nag_gas_flared" id="nag_gas_flared"> 
            </div>                    
        </div>



        <div class="form-group row">
            <label for="total_gas_flared" class="col-sm-2 col-form-label"> Gas Flared </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas" placeholder="Total Gas Flared" name="total_gas_flared" id="total_gas_flared" required="">
            </div> 

            <label for="total_gas_utilized" class="col-sm-2 col-form-label"> Total Gas Util </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control gas" placeholder="Total Gas Utilized" name="total_gas_utilized" id="total_gas_utilized">
            </div>                     
        </div> 



        <div class="form-group row">
            <label for="total_gas_utilized" class="col-sm-2 col-form-label"> Percent Utilized </label>
            <div class="col-sm-4">
                <input type="number" class="form-control" placeholder="Percentage Utilized" name="percent_utilized" id="percent_utilized">
            </div>

            <label for="total_gas_utilized" class="col-sm-2 col-form-label"> Percent Flared </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control" placeholder="Percentage Flared" name="percent_flared" id="percent_flared">
            </div>
        </div>        


        <div class="form-group row">
            <label for="total_gas_utilized" class="col-sm-2 col-form-label"> Total AG + NAG </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control" placeholder="Total (AG + NAG)" name="total_ag_nag" id="total_ag_nag" value="0">
            </div>

            <label for="total_gas_utilized" class="col-sm-2 col-form-label"> Statistical Diff </label>
            <div class="col-sm-4">
                <input type="number" step="0.0000001" class="form-control" placeholder="Statistical Difference" name="statistical_diff" id="statistical_diff" value="0">
            </div>
        </div>




        <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Utilization </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit Summary of Gas Utilization modal -->
<div id="editgas_util" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Summary of Gas Utilization </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_gas_util">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload Summary of Gas Utilization modal -->
<div id="uplgas_util" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Utilization Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_utilization_summary">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-utilization-template') }}" id="" download="Gas Utilization Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Utilization Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Summary of Gas Utilization modal -->
<div id="view_gas_util" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Summary of Gas Utilization </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewgas_util">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve Summary of Gas Utilization modal -->
<div id="appgasutil" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-90">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Summary of Gas Utilization</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_util"></div>
          </div>
    </div>
    </div>  
</div>





<!-- Add GAS Facility modal -->
<div id="addgas_facility" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title"> Add Gas Facility </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
      <form id="gasfacilityForm" action="{{url('/gas/')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_facility">


        <div class="form-group row">
            <label for="year_fac" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_fac" required="" readonly>
            </div> 

            <label for="month_fac" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_fac" required="" readonly>
            </div>              
        </div>
          

          <div class="form-group row">
            <label for="company_id_fac" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_fac" required>
                    <option value=""> Select Gas Company </option>
                    @if($companies)
                        @foreach($companies as $companies)
                            <option value="{{$companies->id}}"> {{$companies->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="facility_type_id_fac" class="col-sm-2 col-form-label"> Facility Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="facility_type_id" id="facility_type_id_fac" required>
                    <option value=""> Select Gas Facility Type </option>
                    @if($facility_types)
                        @foreach($facility_types as $facility_types)
                            <option value="{{$facility_types->id}}"> {{$facility_types->facility_type_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="facility_id_fac" class="col-sm-2 col-form-label"> Facility </label>
            <div class="col-sm-10">
                <select class="form-control" name="facility_id" id="facility_id_fac" required>
                    <option value=""> Select Gas Facility </option>
                    @if($facilities)
                        @foreach($facilities as $facilities)
                            <option value="{{$facilities->id}}"> {{$facilities->facility_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Gas Location" name="location_id" id="location_id" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="terrain_id_fac" class="col-sm-2 col-form-label"> Terrain </label>
            <div class="col-sm-10">
                <select class="form-control" name="terrain_id" id="terrain_id_fac">
                    <option value=""> Select Gas Terrain </option>
                    @if($terrains)
                        @foreach($terrains as $terrains)
                            <option value="{{$terrains->id}}"> {{$terrains->terrain_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

        

        <div class="form-group row" style="height: 8px"> <hr> </div>


        <div class="form-group row">
            <label for="design_capacity" class="col-sm-2 col-form-label"> Design Cap </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Design Capacity" name="design_capacity" id="design_capacity">
            </div>

            <label for="operating_capacity" class="col-sm-2 col-form-label"> Ops Capacity </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Operation Capacity" name="operating_capacity" id="operating_capacity">
            </div>
        </div>


        <div class="form-group row">
            <label for="facility_design_life" class="col-sm-2 col-form-label"> Design Life </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Facility Design Life" name="facility_design_life" id="facility_design_life">
            </div>

            <label for="date_of_commissioning" class="col-sm-2 col-form-label"> Comm Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Commissioning Year" name="date_of_commissioning" id="date_of_commissioning">
            </div>
        </div> 


          <div class="form-group row">
            <label for="status_id_fac" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-4">
                <select class="form-control" name="status_id" id="status_id_fac" required>
                    <option value=""> Select Status </option>
                    @if($statuses)
                        @foreach($statuses as $statuses)
                            <option value="{{$statuses->id}}"> {{$statuses->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="license_status" class="col-sm-2 col-form-label"> License  </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="license_status" id="license_status">
                {{-- <select class="form-control" name="license_status" id="license_status">
                    <option value=""> Select License Status </option>
                    <option value="Yes"> Yes </option>
                    <option value="No"> No </option>
                </select> --}}
            </div>
          </div>



        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fac_btn" id="add_fac_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Facility </button>
        </div>
    </form>
</div>
</div>
</div>  
</div>



<!-- Edit GAS Facility modal -->
<div id="editgas_facility" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Gas Facility </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="edit_gas_facility">

       </div>
   </div>
</div>
</div>  
</div>


<!-- Upload GAS Facility modal -->
<div id="uplgas_facility" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload GAS Facility Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_facility">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-facilities-template') }}" id="" download="GAS Facility Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample GAS Facility Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View GAS Facility modal -->
<div id="view_gasfacility" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header head_bg">
        <h4> View Gas Facility </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="modal-body">
       <div id="viewgasfacility">

       </div>
   </div>
</div>
</div>  
</div>



<!-- Approve GAS Facility modal -->
<div id="appgasfac" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending GAS Facility</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_fac"></div>
          </div>
    </div>
    </div>  
</div>








 <!-- Add Gas Product modal -->
<div id="add_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Product </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="retOutForm" action="{{url('/gas/')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_products">

            <div class="form-group row">
                <label for="year_out" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_out" required="" readonly>
                </div>

                <label for="month_out" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control month" placeholder="Month" name="month" id="month_out" required="" readonly>
                </div>
            </div>

            <div class="form-group row" style="display: none;">
                <label for="product_type" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-4">
                    <input type="hidden" class="form-control" placeholder="" name="product_type" id="product_type" readonly>
                </div>

                <label for="categories_id" class="col-sm-2 col-form-label"> Category </label>
                <div class="col-sm-4">
                    <input type="hidden" class="form-control" placeholder="" name="categories_id" id="categories_id" readonly>
                </div>
            </div>

            {{-- <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id">
                        <option value=""> Select Company </option>
                        @if($company_gas_prod)
                            @foreach($company_gas_prod as $company_gas_prod)
                                <option value="{{$company_gas_prod->id}}">{{$company_gas_prod->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div> --}}

            <div class="form-group row" id="lpg_div">
                <label for="category_id_lpg" class="col-sm-2 col-form-label"> LPG Category </label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id_lpg" id="category_id_lpg">
                        <option value=""> Select Product Category For LPG </option>
                        @if($category_lpg)
                            @foreach($category_lpg as $category_lpg)
                                <option value="{{$category_lpg->id}}">{{$category_lpg->category_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row" id="cng_div">
                <label for="category_id_cng" class="col-sm-2 col-form-label"> CNG Category </label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id_cng" id="category_id_cng">
                        <option value=""> Select Product Category For CNG</option>
                        @if($category_cng)
                            @foreach($category_cng as $category_cng)
                                <option value="{{$category_cng->id}}">{{$category_cng->category_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row" id="lng_div">
                <label for="category_id_lng" class="col-sm-2 col-form-label"> LNG Category </label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id_lng" id="category_id_lng">
                        <option value=""> Select Product Category For LNG </option>
                        @if($category_lng)
                            @foreach($category_lng as $category_lng)
                                <option value="{{$category_lng->id}}">{{$category_lng->category_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row" id="prop_div">
                <label for="category_id_pro" class="col-sm-2 col-form-label"> Propane Category </label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id_pro" id="category_id_pro">
                        <option value=""> Select Product Category For Propane </option>
                        @if($category_pro)
                            @foreach($category_pro as $category_pro)
                                <option value="{{$category_pro->id}}">{{$category_pro->category_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            {{-- <div class="form-group row">
                <label for="state_id" class="col-sm-2 col-form-label"> States </label>
                <div class="col-sm-10">
                    <select class="form-control" name="state_id" id="state_id" required>
                        <option value=""> Select States </option>
                        @if(count($state_lpg)>0)
                            @foreach($state_lpg as $state_lpg)
                                <option value="{{$state_lpg->id}}">{{$state_lpg->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row"> 
                <label for="lga" class="col-sm-2 col-form-label"> LGA </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Local Govt Area" name="lga" id="lga">
                </div>
            </div> --}}

            <div class="form-group row"> 
                <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone">
                </div>
            </div>

            {{-- <div class="form-group row"> 
                <label for="no_of_plant" class="col-sm-2 col-form-label"> No of Plant </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="No of Plant" name="no_of_plant" id="no_of_plant" required>
                </div>
            </div> --}}

            <div class="form-group row"> 
                <label for="capacity" class="col-sm-2 col-form-label"> Capacity </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Capacity" name="capacity" id="capacity">
                </div>
            </div>

            


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Product</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Gas Product modal -->
<div id="edit_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Gas Product </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editretoutlet">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Gas Product modal -->
<div id="upl_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Product Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_products">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-products-template') }}" id="" download="Gas Product Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Product Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Gas Product modal -->
<div id="view_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Gas Product </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewretoutlet">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Gas Product modal -->
<div id="appretout" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ret_out"></div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Products Volumes (Import Permits) modal -->
<div id="add_prod_vol_permit" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Products (Import Permits) Volumes </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="prodVolPerForm" action="{{url('/gas')}}" method="POST">
           @csrf
           <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit">
                   


            <div class="form-group row">
                <label for="year_pvp" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_pvp" required="" readonly>
                </div>

                <label for="month_pvp" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control month" placeholder="Month" name="month" id="month_pvp" required="" readonly>
                </div>
            </div>
                   


            <div class="form-group row">                
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id">
                        <option value=""> Select Company </option>
                        @if(count($company_imp)>0)
                            @foreach($company_imp as $company_imp)
                                <option value="{{$company_imp->id}}">{{$company_imp->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control pvp" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="issued_date" class="col-sm-2 col-form-label"> Issued Date </label>
                <div class="col-sm-4">
                    <input type="date" class="form-control pvp" placeholder="Permit Issued Date" name="issued_date" id="issued_date" required>
                </div>

                <label for="validity_period" class="col-sm-2 col-form-label"> Validity Period </label>
                <div class="col-sm-4">
                    <select class="form-control" name="validity_period" id="validity_period" required>
                        <option value=""> Select Validity Period </option>
                        <option value="30 Days"> One Month - 30 Days </option>
                        <option value="90 Days"> Three Month - 90 Days </option>
                        <option value="180 Days"> Six Month - 180 Days</option>
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id">
                        <option value=""> Select Product </option>
                        @if(count($product_imp)>0)
                            @foreach($product_imp as $product_imp)
                                <option value="{{$product_imp->id}}">{{$product_imp->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label"> Import VOL (MT) </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control pvp" placeholder="Import Volume MT" name="volume" id="volume" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="country_id" class="col-sm-2 col-form-label"> Country </label>
                <div class="col-sm-10">
                    <select class="form-control" name="country_id" id="country_id" required>
                        <option value=""> Select Country </option>
                        @if(count($country_imp)>0)
                            @foreach($country_imp as $country_imp)
                                <option value="{{$country_imp->id}}">{{$country_imp->country_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_pvp_btn" id="add_pvp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Import Permit</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Product Volumes (Import Permit) modal -->
<div id="edit_prod_vol_permit" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Gas Product Volumes (Import Permit) </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editprodvolpermit">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Product Volumes (Import Permit) modal -->
<div id="upl_prod_vol_permit" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Product Volumes (Import Permit) Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_product_volume_permit">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-import-permit-issued-template') }}" id="" download="Product Volumes (Import Permit) Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Product Volumes (Import Permit) Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Product Volumes (Import Permit) modal -->
<div id="view_prod_vol_permit" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> View Gas Product Volumes (Import Permit) </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewprodvolpermit">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Product Volumes (Import Permit) modal -->
<div id="apppermit" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Product Volumes (Import Permit)</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_permit"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Gas Actual Importation by Vessel modal -->
<div id="add_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Actual Importation by Vessel </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="refProdForm" action="{{url('/gas/')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_refinery_production">
                   


            <div class="form-group row">
                <label for="year_act" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_act" required="" readonly>
                </div>

                <label for="month_act" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control month" placeholder="Month" name="month" id="month_act" readonly>
                </div>
            </div>
                   


            <div class="form-group row">                
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id">
                        <option value=""> Select Company </option>
                        @if(count($company_act)>0)
                            @foreach($company_act as $company_act)
                                <option value="{{$company_act->id}}">{{$company_act->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="vessel_name" class="col-sm-2 col-form-label"> Vessel Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Vessel Name" name="vessel_name" id="vessel_name">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="state_id" class="col-sm-2 col-form-label"> State </label>
                <div class="col-sm-4">
                    <select class="form-control" name="state_id" id="state_id">
                        <option value=""> Select State </option>
                        @if(count($state_act)>0)
                            @foreach($state_act as $state_act)
                                <option value="{{$state_act->id}}">{{$state_act->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id">
                        <option value=""> Select Product </option>
                        @if(count($product_act)>0)
                            @foreach($product_act as $product_act)
                                <option value="{{$product_act->id}}">{{$product_act->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label"> Import VOL (MT) </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Import Volume MT" name="volume" id="volume" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="date_discharged" class="col-sm-2 col-form-label"> Date of Discharged </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" placeholder="Date of Discharged Completed" name="date_discharged" id="date_discharged">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rpro_btn" id="add_rpro_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Actual Importation </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Gas Actual Importation By Vessels modal -->
<div id="edit_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Gas Actual Importation By Vessels </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrefproduction">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Gas Actual Importation By Vessels modal -->
<div id="upl_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Actual Importation By Vessels Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_refinery_production">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-lpg-consumption-template') }}" id="" download="Gas Actual Importation By Vessels Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Actual Importation By Vessels Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Gas Actual Importation By Vessels modal -->
<div id="view_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Gas Actual Importation By Vessels </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrefproduction">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Gas Actual Importation By Vessels modal -->
<div id="apprefprod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Actual Importation By Vessels</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ref_prod"></div>
          </div>
    </div>
    </div>  
</div>




 <!-- Add Gas Actual Importation modal -->
<div id="add_gas_act_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Actual Importation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="gasActProdForm" action="{{url('/gas/')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_actual_production">
                   


            <div class="form-group row">
                <label for="year_act_p" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_act_p" required="" readonly>
                </div>

                <label for="month_act_p" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control month" placeholder="Month" name="month" id="month_act_p" readonly>
                </div>
            </div>
                   


            <div class="form-group row">                
                <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id">
                        <option value=""> Select Company </option>
                        @if(count($company_act_p)>0)
                            @foreach($company_act_p as $company_act_p)
                                <option value="{{$company_act_p->id}}">{{$company_act_p->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="vessel_name" class="col-sm-2 col-form-label"> Vessel Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Vessel Name" name="vessel_name" id="vessel_name">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="import_permit_no" class="col-sm-2 col-form-label"> Import Permit No </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Import Permit Number" name="import_permit_no" id="import_permit_no">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="state_id" class="col-sm-2 col-form-label"> State </label>
                <div class="col-sm-4">
                    <select class="form-control" name="state_id" id="state_id">
                        <option value=""> Select State </option>
                        @if(count($state_act_p)>0)
                            @foreach($state_act_p as $state_act_p)
                                <option value="{{$state_act_p->id}}">{{$state_act_p->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="zone" class="col-sm-2 col-form-label"> Zone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Zone" name="zone" id="zone">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id">
                        <option value=""> Select Product </option>
                        @if(count($product_act_p)>0)
                            @foreach($product_act_p as $product_act_p)
                                <option value="{{$product_act_p->id}}">{{$product_act_p->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label"> Import VOL (MT) </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Import Volume MT" name="volume" id="volume" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="date_discharged" class="col-sm-2 col-form-label"> Date of Discharged </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" placeholder="Date of Discharged Completed" name="date_discharged" id="date_discharged">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rpro_btn" id="add_rpro_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Actual Importation </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Gas Actual Importation modal -->
<div id="edit_gas_act_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Gas Actual Importation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editgasactprod">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Gas Actual Importation modal -->
<div id="upl_gas_act_prod" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Actual Importation Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_actual_production">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-actual-import-template') }}" id="" download="Gas Actual Importation Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Actual Importation Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Gas Actual Importation modal -->
<div id="view_gas_act_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Gas Actual Importation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewgasactprod">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Gas Actual Importation modal -->
<div id="appgasactprod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Actual Importation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_gas_act_prod"></div>
          </div>
    </div>
    </div>  
</div>














 <!-- Add Gas Export by Volume Vessel modal -->
<div id="add_gas_exp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Export by Volume Vessel </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="gasExpForm" action="{{url('/gas/')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_gas_export_volume_vessel">
                   


            <div class="form-group row">
                <label for="year_exp" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_exp" required="" readonly>
                </div>

                <label for="month_exp" class="col-sm-2 col-form-label"> Month </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control month" placeholder="Month" name="month" id="month_exp" required="" readonly>
                </div>
            </div>


            <div class="form-group row">
                <label for="equity_holder_id" class="col-sm-2 col-form-label"> Equity Holder </label>
                <div class="col-sm-10">                    
                    <input type="text" class="form-control" placeholder="Equity Holder" name="equity_holder_id" id="equity_holder_id" required>
                    {{-- <select class="form-control" name="equity_holder_id" id="equity_holder_id" required>
                        <option value=""> Select Equity Holder </option>
                        @if(count($equity_exp)>0)
                            @foreach($equity_exp as $equity_exp)
                                <option value="{{$equity_exp->id}}">{{$equity_exp->company_name}}</option>
                            @endforeach
                        @endif
                    </select> --}}
                </div>
            </div>


            <div class="form-group row">
                <label for="stream_id" class="col-sm-2 col-form-label"> Terminal </label>
                <div class="col-sm-10">
                    <select class="form-control" name="stream_id" id="stream_id" required>
                        <option value=""> Select Stream Terminal </option>
                        @if(count($stream_exp)>0)
                            @foreach($stream_exp as $stream_exp)
                                <option value="{{$stream_exp->id}}">{{$stream_exp->stream_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="product_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id" required>
                        <option value=""> Select Product </option>
                        @if(count($product_exp)>0)
                            @foreach($product_exp as $product_exp)
                                <option value="{{$product_exp->id}}">{{$product_exp->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="no_of_vessel" class="col-sm-2 col-form-label"> No of Vessel </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control rpro" placeholder="No of Vessel" name="no_of_vessel" id="no_of_vessel">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label"> Volume (MT) </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control rpro" placeholder="Volume (MT)" name="volume" id="volume" required="">
                </div>
            </div>

            
         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rpro_btn" id="add_rpro_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Gas Export</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Gas Export by Volume Vessel modal -->
<div id="edit_gas_exp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Gas Export by Volume Vessel </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editgasexp">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Gas Export by Volume Vessel modal -->
<div id="upl_gas_exp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Gas Export by Volume Vessel Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('gas')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_gas_export_volume_vessel">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left" />

                    <a href="{{ url('download-gas-export-template') }}" id="" download="Gas Export by Volume Vessel Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Gas Export by Volume Vessel Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Gas Export by Volume Vessel modal -->
<div id="view_gas_exp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Gas Export by Volume Vessel </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewgasexp">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Gas Export by Volume Vessel modal -->
<div id="app_gas_exp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Gas Export by Volume Vessel</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appgasexp"></div>
          </div>
    </div>
    </div>  
</div>










<!-- Success  modal -->
<div id="successModal" class="modal fade" role="dialog" style="margin-top: 10%">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">                    
                <div class="swal2-icon swal2-success animate" style="display: block;">
                    <span class="line tip animate-success-tip"></span> 
                    <span class="line long animate-success-long"></span>
                    <div class="placeholder"></div> <div class="fix"></div>
                </div>
            </div>

            <div class="modal-body">
                <center> <h2 class="swal2-title" style="margin-top:-40px">Record Approved for this Batch</h2> </center>
                <br>

                <div class="" style="text-align: center!important">
                    <button type="submit" name="succ_ok_btn" id="succ_ok_btn" class="btn btn-success btn-lg" data-dismiss="modal">
                        <i class="fa fa-check"></i> Ok </button>
                </div>
            </div>
        </div>
    </div>
</div>
