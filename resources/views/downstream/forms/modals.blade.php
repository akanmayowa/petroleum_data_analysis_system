

<!-- Add Terminal Streams Production  modal -->
<div id="addterm_stre_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title"> Reconciled Crude & Condensate Production </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="streaProdForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_terminal_stream_prod">
          

          <div class="form-group row">
            <label for="stream_id_t" class="col-sm-1 col-form-label"> Stream/Blend </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_t" required>
                    <option value=""> Select Stream / Blend</option>
                    @if(count($streams_prod)>0)
                        @foreach($streams_prod as $stream)
                            <option value="{{$stream->id}}">{{$stream->stream_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="sulphur_content" class="col-sm-1 col-form-label"> Sulphur </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="Sulphur Content" name="sulphur_content" id="sulphur_content">
            </div>
          </div> 
          

          <div class="form-group row">
            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company</option>
                    @if(count($company_reconcile)>0)
                        @foreach($company_reconcile as $company_reconcile)
                            <option value="{{$company_reconcile->id}}">{{$company_reconcile->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="contract_id" class="col-sm-1 col-form-label"> Contract </label>
            <div class="col-sm-5">
                <select class="form-control" name="contract_id" id="contract_id">
                    <option value=""> Select Contract</option>
                    @if(count($contract_ddl)>0)
                        @foreach($contract_ddl as $contract_ddl)
                            <option value="{{$contract_ddl->id}}">{{$contract_ddl->contract_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 


          <div class="form-group row">
            <label for="year_tsp" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year Of Export" name="year" id="year_tsp" required readonly="">
            </div>

            <label for="year_tsp" class="col-sm-1 col-form-label"> Type </label>
            <div class="col-sm-5">                
                <label class="radio-inline" style="margin-left: 0px">
                  <input type="radio" name="production_type_id" value="1" required> Oil
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="2"> Condensate
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="3"> Plant
                </label>
            </div>
          </div> 


          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="January" name="january" id="january" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="febuary" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="February" name="febuary" id="febuary" onkeyup="checkValue(this)" value="0">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="March" name="march" id="march" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="april" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="April" name="april" id="april" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="May" name="may" id="may" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="june" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="June" name="june" id="june" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="July" name="july" id="july" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="august" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="August" name="august" id="august" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="September" name="september" id="september" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="october" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="October" name="october" id="october" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="November" name="november" id="november" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="december" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control st_prod" placeholder="December" name="december" id="december" onkeyup="checkValue(this)" value="0">
            </div>
          </div>    


        <div class="form-group row" style="height: 5px"> <hr> </div>



          <div class="form-group row">
            <label for="api" class="col-sm-1 col-form-label"> API </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="American Production Index" name="api" id="api">
            </div>
                <input type="hidden" step="0.01" class="form-control" placeholder="Stream Total" name="stream_total" id="stream_total" value="0" readonly="" required>
           
          </div>
                          


          <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_tsp_btn" id="add_tsp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Reconciled Production </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Terminal Streams Production modal -->
<div id="editterm_stre_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Reconciled Crude & Condensate Production</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div id="edit_streamprod">

             </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Terminal Streams Production modal -->
<div id="uplterm_stre_prod" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Reconciled Production Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_terminal_stream_prod">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-crude-production-template') }}" download="Gas Reserve Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Stream Production Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Terminal Streams Production modal -->
<div id="view_term_stre_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Terminal Streams Production</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div id="view_streamprod">

             </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Reconciled Crude Production modal -->
<div id="appreco" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Reconciled Production</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_reco"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Monthly Summary of Crude Export modal -->
<div id="addcrude_export" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Monthly Summary of Crude Export </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="crudeExportForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_monthly_summary_crude_export">
          

          <div class="form-group row">
            <label for="stream_id_ce" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_ce" required>
                    <option value=""> Select Stream / Blend </option>
                    @if(count($streams_export)>0)
                        @foreach($streams_export as $stream)
                            <option value="{{$stream->id}}">{{$stream->stream_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="year_exp" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_exp" required="" readonly="">
            </div>
        </div>     


        <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label"> Type </label>
            <div class="col-sm-5" style="margin-top: 5px">                
                <label class="radio-inline" style="margin-left: 0px">
                  <input type="radio" name="production_type_id" value="1" required> Oil
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="2"> Condensate
                </label>
                <label class="radio-inline" style="margin-left: 10px">
                  <input type="radio" name="production_type_id" value="3"> Plant
                </label>
            </div>            
        </div>   
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="January" name="january" id="january_ce" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="February" name="febuary" id="febuary_ce" onkeyup="checkValue(this)" value="0">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="March" name="march" id="march_ce" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="April" name="april" id="april_ce" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="May" name="may" id="may_ce" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="June" name="june" id="june_ce" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="July" name="july" id="july_ce" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="August" name="august" id="august_ce" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="September" name="september" id="september_ce" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="October" name="october" id="october_ce" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="November" name="november" id="november_ce" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control crex" placeholder="December" name="december" id="december_ce" onkeyup="checkValue(this)" value="0">
            </div>
          </div>    


        <div class="form-group row" style="height: 5px"> <hr> </div>



          <div class="form-group row">
            <label for="api_ce" class="col-sm-1 col-form-label"> API </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="American Production Index" name="api" id="api_ce">
            </div>
                <input type="hidden" step="0.01" class="form-control" placeholder="Stream Total" name="stream_total" id="stream_total_ce" readonly="">
           
          </div>
                          


          <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ce_btn" id="add_ce_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Crude Export </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>


<!-- Edit Monthly Summary of Crude Export modal -->
<div id="editcrude_export" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Monthly Summary of Crude Export </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_summaryexport">

             </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Monthly Summary of Crude modal -->
<div id="uplcrude_export" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Summary of Crude Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_monthly_summary_crude_export">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-crude-export-template') }}" download="Summary of Crude Export Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Summary of Crude Export Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Monthly Summary of Crude Export modal -->
<div id="view_crude_export" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Monthly Summary of Crude Export </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="view_summaryexport">

             </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve  Crude Export Data modal -->
<div id="appexpo" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Reconciled Crude Export Data </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_expo"></div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Crude Export By Destination modal -->
    <div id="addexport_destination" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Crude Export By Destination </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="exportDestForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_crude_export_destination">
                 

          <div class="form-group row">
            <label for="year_de" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_de" required="" readonly="">
            </div>
          </div> 
                 

          <div class="form-group row">
            <label for="stream_id" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id" required>
                    <option value=""> Select Stream </option>
                    @if(count($dest_stream)>0)
                        @foreach($dest_stream as $dest_stream)
                            <option value="{{$dest_stream->id}}">{{$dest_stream->stream_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="country_id" class="col-sm-1 col-form-label"> Country </label>
            <div class="col-sm-5">
                <select class="form-control" name="country_id" id="country_id" required>
                    <option value=""> Select Country </option>
                    @if(count($countries)>0)
                        @foreach($countries as $countries)
                            <option value="{{$countries->id}}">{{$countries->country_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 


          {{-- <div class="form-group row">
            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id">
                    <option value=""> Select Company </option>
                    @if(count($company_dest)>0)
                        @foreach($company_dest as $company_dest)
                            <option value="{{$company_dest->id}}">{{$company_dest->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <select class="form-control" name="destination" id="destination">
                    <option value=""> Select Destination (Continent) </option>
                    @if(count($continents)>0)
                        @foreach($continents as $continents)
                            <option value="{{$continents->id}}">{{$continents->continent_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>  --}}         
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="January" name="january" id="january_ce">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="February" name="febuary" id="febuary_ce">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="March" name="march" id="march_ce">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="April" name="april" id="april_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="May" name="may" id="may_ce">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="June" name="june" id="june_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="July" name="july" id="july_ce">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="August" name="august" id="august_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="September" name="september" id="september_ce">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="October" name="october" id="october_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="November" name="november" id="november_ce">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="December" name="december" id="december_ce">
            </div>
          </div>   


         
          <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Export Destination </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Crude Export By Destination modal -->
<div id="editexport_destination" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Crude Export By Destination </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_exportdestination">

             </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Crude Export By Destination modal -->
<div id="uplexport_destination" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Export By Destination Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_crude_export_destination">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-crude-export-destination-template') }}" download="Crude Export By Destination Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Crude Export By Destination Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View Crude Export By Destination modal -->
<div id="view_export_destination" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Crude Export By Destination </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="view_exportdestination">

             </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve  Crude Eport by Destination modal -->
<div id="appdest" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Reconciled Crude Eport by Destination </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_dest"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Crude Export By Company modal -->
    <div id="addexport_company" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Crude Export By Company</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="exportCompForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_crude_export_company">
                 

          <div class="form-group row">
            <label for="year_de" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_co" required="" readonly="">
            </div>

            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id" required>
                    <option value=""> Select Company </option>
                    @if(count($company_ddl)>0)
                        @foreach($company_ddl as $company_ddl)
                            <option value="{{$company_ddl->id}}">{{$company_ddl->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 


          <div class="form-group row">
            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <select class="form-control" name="destination" id="destination" required>
                    <option value=""> Select Destination (Continent) </option>
                    @if(count($continent_ddl)>0)
                        @foreach($continent_ddl as $continent_ddl)
                            <option value="{{$continent_ddl->id}}">{{$continent_ddl->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="country_id" class="col-sm-1 col-form-label"> Country </label>
            <div class="col-sm-5">
                <select class="form-control" name="country_id" id="country_id" required>
                    <option value=""> Select Country </option>
                    @if(count($country_ddl)>0)
                        @foreach($country_ddl as $country_ddl)
                            <option value="{{$country_ddl->id}}">{{$country_ddl->country_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div> 
          </div>          
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="January" name="january" id="january_ce">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="February" name="febuary" id="febuary_ce">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="March" name="march" id="march_ce">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="April" name="april" id="april_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="May" name="may" id="may_ce">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="June" name="june" id="june_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="July" name="july" id="july_ce">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="August" name="august" id="august_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="September" name="september" id="september_ce">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="October" name="october" id="october_ce">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="November" name="november" id="november_ce">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="December" name="december" id="december_ce">
            </div>
          </div>   


         
          <div class="modal-footer" id="add_footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Export By Company </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
  </div>



<!-- Edit Crude Export By Company modal -->
<div id="editexport_company" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Crude Export By Company </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_exportcompany">

             </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Crude Export By Company modal -->
<div id="uplexport_company" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Export By Company Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_crude_export_company">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-crude-export-country-template') }}" download="Crude Export By Company Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Crude Export By Company Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View Crude Export By Company modal -->
<div id="view_export_company" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Crude Export By Company </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
             <div id="view_exportcompany">

             </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve  Crude Eport by Company modal -->
<div id="appcomp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Reconciled Crude Eport by Company </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_comp"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Petrochemical Plant Situation modal -->
<div id="add_pet_plant" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Petrochemical Plant Situation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="petPlantForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_petrochemical_plant">
                   

          <div class="form-group row">
            <label for="plant_location" class="col-sm-2 col-form-label"> Plant </label>
            <div class="col-sm-10">
                <select class="form-control" name="plant_location" id="plant_location" required>
                    <option value=""> Select Plant </option>
                    @if(count($location)>0)
                        @foreach($location as $location)
                            <option value="{{$location->id}}">{{$location->plant_location_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


         <div class="form-group row">
            <label for="ownership" class="col-sm-2 col-form-label"> Ownership </label>
            <div class="col-sm-10">
                <select class="form-control" name="ownership" id="ownership" required>
                    <option value=""> Select Ownership </option>
                    @if(count($ownership)>0)
                        @foreach($ownership as $ownership)
                            <option value="{{$ownership->id}}">{{$ownership->ownership_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div>  


          <div class="form-group row">   
            <label for="state_id" class="col-sm-2 col-form-label"> State </label>
            <div class="col-sm-4">
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value=""> Select State </option>
                    @if(count($state_plant_ddl)>0)
                        @foreach($state_plant_ddl as $state_plant_ddl)
                            <option value="{{$state_plant_ddl->id}}">{{$state_plant_ddl->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" required="">
            </div>
         </div> 


         <div class="form-group row">
            <label for="plant_type" class="col-sm-2 col-form-label"> Plant Type </label>
            <div class="col-sm-10">
                <select class="form-control" name="plant_type" id="plant_type" required>
                    <option value=""> Select Plant Type </option>
                    @if(count($plant_type)>0)
                        @foreach($plant_type as $plant_type)
                            <option value="{{$plant_type->id}}">{{$plant_type->plant_type_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 



          <div class="form-group row">
            <label for="plant_capacity" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Plant Capacity MTPA" name="plant_capacity" id="plant_capacity" required="">
            </div>
          </div> 


         <div class="form-group row">
            <label for="feedstock" class="col-sm-2 col-form-label"> Feedstock </label>
            <div class="col-sm-10">
                <select class="form-control" name="feedstock" id="feedstock" required>
                    <option value=""> Select Feedstock </option>
                    @if(count($feedstock)>0)
                        @foreach($feedstock as $feedstock)
                            <option value="{{$feedstock->id}}">{{$feedstock->feedstock_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div>  


         <div class="form-group row">
            <label for="products" class="col-sm-2 col-form-label"> Products </label>
            <div class="col-sm-10">
                <select class="form-control" name="products" id="products" required>
                    <option value=""> Select Products </option>
                    @if(count($product)>0)
                        @foreach($product as $product)
                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 



         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_pla_btn" id="add_pla_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Plant Details</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Petrochemical Plant Situation modal -->
<div id="edit_pet_plant" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Petrochemical Plant Situation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editpetplant">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Petrochemical Plant Situation modal -->
<div id="upl_pet_plant" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Petrochemical Plant Situation Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_petrochemical_plant">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-petrochemical-plant-template') }}" download="Petrochemical Plant Situation Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Petrochemical Plant Situation Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View Petrochemical Plant Situation modal -->
<div id="view_pet_plant" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Petrochemical Plant Situation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewpetplant">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Petrochemical Plant Situation modal -->
<div id="apppetplant" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Petrochemical Plant Situation </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_pet_plant"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Refinery Crude Processed modal -->
<div id="add_ref_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Refinery Crude Processed </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="refCapForm" action="{{url('/downstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_refinary_capacity">
                   

          <div class="form-group row">
            <label for="year_rc" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_rc" required="" readonly="">
            </div>

            <label for="refinery_id_rp" class="col-sm-1 col-form-label"> Refinery </label>
            <div class="col-sm-5">
                <select class="form-control" name="refinery_id" id="refinery_id_rp" required>
                    <option value=""> Select Refinery </option>
                    @if(count($refinery_ddl)>0)
                        @foreach($refinery_ddl as $refinery_ddl)
                            <option value="{{$refinery_ddl->id}}">{{$refinery_ddl->plant_location_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div> 

          {{-- <div class="form-group row">   
            <label for="product_id" class="col-sm-1 col-form-label"> Product </label>
            <div class="col-sm-11">
                <select class="form-control" name="product_id" id="product_id" required>
                    <option value=""> Select Product </option>
                    @if(count($product_ddl)>0)
                        @foreach($product_ddl as $product_ddl)
                            <option value="{{$product_ddl->id}}">{{$product_ddl->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div>  

          <div class="form-group row">   
            <label for="state_id" class="col-sm-1 col-form-label"> State </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value=""> Select State </option>
                    @if(count($state_ddl)>0)
                        @foreach($state_ddl as $state_ddl)
                            <option value="{{$state_ddl->id}}">{{$state_ddl->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-1 col-form-label"> Location </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" required="">
            </div>
         </div>  --}}                   
              
                 
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="January" name="january" id="january_rc" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="February" name="febuary" id="febuary_rc" onkeyup="checkValue(this)" value="0">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="March" name="march" id="march_rc" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="April" name="april" id="april_rc" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="May" name="may" id="may_rc" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="June" name="june" id="june_rc" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="July" name="july" id="july_rc" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="August" name="august" id="august_rc" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="September" name="september" id="september_rc" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="October" name="october" id="october_rc" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="November" name="november" id="november_rc" onkeyup="checkValue(this)" value="0">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control r_cap" placeholder="December" name="december" id="december_rc" onkeyup="checkValue(this)" value="0">
            </div>
          </div>          

          <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" step="0.01" class="form-control dsg" placeholder="0.00" name="krpc" id="" onkeyup="checkValue(this)" value="@if($ref_d_cap){{$ref_d_cap->krpc}}@endif" readonly="">
                <input type="hidden" step="0.01" class="form-control dsg" placeholder="0.00" name="wrpc" id="" onkeyup="checkValue(this)" value="@if($ref_d_cap){{$ref_d_cap->wrpc}}@endif" readonly="">
                <input type="hidden" step="0.01" class="form-control dsg" placeholder="0.00" name="new_phrc" id="" onkeyup="checkValue(this)" value="@if($ref_d_cap){{$ref_d_cap->new_phrc}}@endif" readonly="">
                <input type="hidden" step="0.01" class="form-control dsg" placeholder="0.00" name="old_phrc" id="" onkeyup="checkValue(this)" value="@if($ref_d_cap){{$ref_d_cap->old_phrc}}@endif" readonly="">
                <input type="hidden" step="0.01" class="form-control dsg" placeholder="0.00" name="ndpr" id="" onkeyup="checkValue(this)" value="@if($ref_d_cap){{$ref_d_cap->ndpr}}@endif" readonly="">


                <input type="hidden" step="0.01" class="form-control" placeholder="0.00" name="total" id="total_rc" readonly="" value="0">
                <input type="hidden" step="0.01" class="form-control" placeholder="" name="total_utilization" id="total_utilization_rp" readonly="" value="0">
                <input type="hidden" class="form-control" placeholder="" name="capacity_utilization" id="capacity_utilization_rc" readonly="" value="0">
            </div>
          </div>      



         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rcap_btn" id="add_rcap_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Refinery Crude Processed</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Refinery Crude Processed modal -->
<div id="edit_ref_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Refinery Crude Processed </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrefcapacity">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Refinery Crude Processed modal -->
<div id="upl_ref_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Refinery Crude Processed Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_refinary_capacity">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-refined-crude-processed-template') }}" download="Refinery Performance Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Refinery Performance Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Refinery Crude Processed modal -->
<div id="view_ref_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Refinery Crude Processed </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrefcapacity">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Refinery Capacity Utilization modal -->
<div id="apprefcap" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Refinery Capacity Utilization </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ref_cap"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Refinery Details  modal -->
<div id="add_ref_performance" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Refinery Details </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="refPerfForm" action="{{url('/downstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_refinary_performance">
                   

            <div class="form-group row">
                <label for="year_rd" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_rd" value="" readonly required>
                </div>
            </div>  


          <div class="form-group row"> 
            <label for="processing_unit" class="col-sm-2 col-form-label"> Processing Unit </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Processing Unit" name="processing_unit" id="processing_unit" required="">
            </div>
         </div> 
                   

            <div class="form-group row">
                <label for="refinery_id_plt" class="col-sm-2 col-form-label"> Refinery </label>
                <div class="col-sm-10">
                    <select class="form-control" name="refinery_id" id="refinery_id_plt" required>
                        <option value=""> Select A Refinery Plant </option>
                        @if(count($refinery_plant)>0)
                            @foreach($refinery_plant as $refinery_plant)
                                <option value="{{$refinery_plant->id}}">{{$refinery_plant->plant_location_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


          <div class="form-group row"> 
            <label for="location" class="col-sm-2 col-form-label"> Location </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location">
            </div>
         </div>


          <div class="form-group row"> 
            <label for="value" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Value" name="value" id="value" required="">
            </div>
         </div>   
   

          
         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rper_btn" id="add_rper_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Refinery Details </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Refinery Details Report modal -->
<div id="edit_ref_performance" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Refinery Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrefperformance">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Refinery Plants in Nigeria modal -->
<div id="upl_ref_performance" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Refinery Details Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_refinary_performance">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-refinery-details-template') }}" download="Refinery Details Report Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Refinery Details in Nigeria Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Refinery Details modal -->
<div id="view_ref_performance" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Refinery Details </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrefperformance">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Refinery Details modal -->
<div id="apprefperf" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Refinery Details </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ref_perf"></div>
          </div>
    </div>
    </div>  
</div>











 <!-- Add Depot modal -->
<div id="add_dep" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Depot </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="depForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
            <input type="hidden" class="form-control" name="type" id="" value="add_depot">

         

          <div class="form-group row">   
            <label for="year_dep" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_dep" required="" readonly="">
            </div>

            <label for="depot_name" class="col-sm-1 col-form-label"> Depot Name </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Depot Name" name="depot_name" id="depot_name" required="">
            </div>
         </div> 

          <div class="form-group row">   
            <label for="state_id" class="col-sm-1 col-form-label"> State </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value=""> Select State </option>
                    @if(count($state_dep_ddl)>0)
                        @foreach($state_dep_ddl as $state_dep_ddl)
                            <option value="{{$state_dep_ddl->id}}">{{$state_dep_ddl->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-1 col-form-label"> Location </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location">
            </div>
         </div> 



         <div class="form-group row">
            <label for="ownership_id" class="col-sm-1 col-form-label"> Owner </label>
            <div class="col-sm-11">
                <select class="form-control" name="ownership_id" id="ownership_id" required>
                    <option value=""> Select Ownership </option>
                    @if(count($ownership_dep)>0)
                        @foreach($ownership_dep as $ownership_dep)
                            <option value="{{$ownership_dep->id}}">{{$ownership_dep->ownership_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


         <div class="form-group row">
            <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
            <div class="col-sm-11">
                <select class="form-control" name="product_id" id="product_id" required>
                    <option value=""> Select Products </option>
                    @if(count($product_dep)>0)
                        @foreach($product_dep as $product_dep)
                            <option value="{{$product_dep->id}}">{{$product_dep->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


          <div class="form-group row">
            <label for="design_capacity" class="col-sm-1 col-form-label">Storage Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Design Capacity MTPA" name="design_capacity" id="design_capacity" required="">
            </div>
          </div> 

          <div class="form-group row">
            <label for="truckout" class="col-sm-1 col-form-label"> Truckout Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Truckout Capacity" name="truckout" id="truckout">
            </div>
          </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Depot Details</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Depot modal -->
<div id="edit_dep" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Depot </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editdep">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Depot modal -->
<div id="upl_dep" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Depot Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body"> 
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_depot">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-depot-template') }}" download="Depot Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Depot Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
          </div>
    </div>
    </div>  
</div>



<!-- View Depot modal -->
<div id="view_dep" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Depot </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewdep">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Depot modal -->
<div id="appdepo" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Depot </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_depo"></div>
          </div>
    </div>
    </div>  
</div>




 <!-- Add Jetty modal -->
<div id="add_jet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Jetty </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="jetForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
            <input type="hidden" class="form-control" name="type" id="" value="add_jetty">

         

          <div class="form-group row">   
            <label for="year_jet" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_jet" required="" readonly="">
            </div>

            <label for="jetty_name" class="col-sm-1 col-form-label"> Jetty Name </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Jetty Name" name="jetty_name" id="jetty_name" required="">
            </div>
         </div> 

          <div class="form-group row">   
            <label for="state_id" class="col-sm-1 col-form-label"> State </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value=""> Select State </option>
                    @if(count($state_jet_ddl)>0)
                        @foreach($state_jet_ddl as $state_jet_ddl)
                            <option value="{{$state_jet_ddl->id}}">{{$state_jet_ddl->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-1 col-form-label"> Location </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location" name="location" id="location" required="">
            </div>
         </div> 



         <div class="form-group row">
            <label for="ownership_id" class="col-sm-1 col-form-label"> Owner </label>
            <div class="col-sm-11">
                <select class="form-control" name="ownership_id" id="ownership_id" required>
                    <option value=""> Select Ownership </option>
                    @if(count($ownership_jet)>0)
                        @foreach($ownership_jet as $ownership_jet)
                            <option value="{{$ownership_jet->id}}">{{$ownership_jet->ownership_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


         <div class="form-group row">
            <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
            <div class="col-sm-11">
                <select class="form-control" name="product_id" id="product_id" required>
                    <option value=""> Select Products </option>
                    @if(count($product_jet)>0)
                        @foreach($product_jet as $product_jet)
                            <option value="{{$product_jet->id}}">{{$product_jet->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


          <div class="form-group row">
            <label for="design_capacity" class="col-sm-1 col-form-label"> Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Design Capacity MTPA" name="design_capacity" id="design_capacity" required="">
            </div>
          </div> 


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Jetty Details</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Jetty modal -->
<div id="edit_jet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Jetty </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editjet">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Jetty modal -->
<div id="upl_jet" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Jetty Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_jetty">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-jetty-template') }}" download="Jetty Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Jetty Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View Jetty modal -->
<div id="view_jet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Jetty </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewjet">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Jetty modal -->
<div id="appjett" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Jetty </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_jett"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Terminal modal -->
<div id="add_term" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Terminal </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="termForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}"> 
            <input type="hidden" class="form-control" name="type" id="" value="add_terminal">

         

          <div class="form-group row">   
            <label for="year_term" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_term" required="" readonly="">
            </div>

            <label for="terminal_name" class="col-sm-1 col-form-label"> Terminal Name </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Terminal Name" name="terminal_name" id="terminal_name" required="">
            </div>
         </div> 

          <div class="form-group row">   
            <label for="state_id" class="col-sm-1 col-form-label"> State </label>
            <div class="col-sm-5">
                <select class="form-control" name="state_id" id="state_id" required>
                    <option value=""> Select State </option>
                    @if(count($state_term_ddl)>0)
                        @foreach($state_term_ddl as $state_term_ddl)
                            <option value="{{$state_term_ddl->id}}">{{$state_term_ddl->state_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="location" class="col-sm-1 col-form-label"> Coordinates </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Location / Coordinates" name="location" id="location" required="">
            </div>
         </div> 



         <div class="form-group row">
            <label for="facility_type_id" class="col-sm-1 col-form-label"> Facility Type </label>
            <div class="col-sm-5">
                <select class="form-control" name="facility_type_id" id="facility_type_id">
                    <option value=""> Select Facility Type </option>
                    @if(count($facility_types)>0)
                        @foreach($facility_types as $facility_types)
                            <option value="{{$facility_types->id}}">{{$facility_types->facility_type_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="ownership_id" class="col-sm-1 col-form-label"> Owner </label>
            <div class="col-sm-5">
                <select class="form-control" name="ownership_id" id="ownership_id" required>
                    <option value=""> Select Ownership </option>
                    @if(count($ownership_term)>0)
                        @foreach($ownership_term as $ownership_term)
                            <option value="{{$ownership_term->id}}">{{$ownership_term->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


         <div class="form-group row">
            <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
            <div class="col-sm-11">
                <select class="form-control" name="product_id" id="product_id" required>
                    <option value=""> Select Products </option>
                    @if(count($product_term)>0)
                        @foreach($product_term as $product_term)
                            <option value="{{$product_term->id}}">{{$product_term->product_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


          <div class="form-group row">
            <label for="design_capacity" class="col-sm-1 col-form-label"> Capacity </label>
            <div class="col-sm-11">
                <input type="number" class="form-control" placeholder="Design Capacity MTPA" name="design_capacity" id="design_capacity" required="">
            </div>
          </div> 


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Terminal Details</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Terminal modal -->
<div id="edit_term" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Terminal </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editterm">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Terminal modal -->
<div id="upl_term" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Terminal Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_terminal">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-terminal-template') }}" download="Terminal Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Terminal Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>



<!-- View Terminal modal -->
<div id="view_term" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Terminal </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewterm">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Terminal modal -->
<div id="appterm" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Terminal </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_term"></div>
          </div>
    </div>
    </div>  
</div>

 <!-- Add Import Products. modal -->
<div id="add_imp_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Import Products </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="impProdForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_import_product">
                   

            
            <div class="form-group row">
                <label for="product_name" class="col-sm-2 col-form-label"> Product Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Product Name" name="product_name" id="product_name" value="" required="">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_prod_btn" id="add_prod_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Product</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Import Product modal -->
<div id="edit_imp_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Import Product </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editimpprod">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Import Product modal -->
<div id="upl_imp_prod" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Import Product Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream.')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_import_product">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="downloadImpProductTemplate" download="Import Product Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Import Product Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Import Product modal -->
<div id="view_imp_prod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Import Product </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewimpprod">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Import Product modal -->
<div id="appprod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Import Product </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_prod"></div>
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
            <h4 class="modal-title">Add Products Volumes (Import Permits) </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="prodVolPerForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit">
                   


            <div class="form-group row">                
                <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-11">
                    <select class="form-control" name="market_segment_id" id="market_segment_id" required>
                        <option value=""> Select Market Segment </option>
                        @if(count($market_segs)>0)
                            @foreach($market_segs as $market_segs)
                                <option value="{{$market_segs->id}}">{{$market_segs->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="product_id" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id" required>
                        <option value=""> Select Products </option>
                        @if(count($iv_products)>0)
                            @foreach($iv_products as $iv_products)
                                <option value="{{$iv_products->id}}">{{$iv_products->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_pvp" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control year" placeholder="Year Of Import" name="year" id="year_pvp" required="" readonly="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_pvp" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="january" id="january_pvp" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_pvp" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="febuary" id="febuary_pvp" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_pvp" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="march" id="march_pvp" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="april_pvp" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="april" id="april_pvp" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_pvp" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="may" id="may_pvp" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="june_pvp" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="june" id="june_pvp" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_pvp" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="july" id="july_pvp" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="august_pvp" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="august" id="august_pvp" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_pvp" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="september" id="september_pvp" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="october_pvp" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="october" id="october_pvp" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_pvp" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="november" id="november_pvp" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="december_pvp" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control pvp" placeholder="" name="december" id="december_pvp" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" class="form-control" placeholder="Yearly Total" name="total" id="total_pvp" value="" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_pvp_btn" id="add_pvp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Product Volume</button>
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
            <h4> Edit Product Volumes (Import Permit) </h4>
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
            <h4 class="modal-title">Upload Product Volumes (Import Permit) Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_product_volume_permit">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-import-permit-issued-template') }}" download="Product Volumes (Import Permit) Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Product Volumes (Import Permit) Excel Template"> <i class="fa fa-download"></i> Download Template</a>
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
            <h4> View Product Volumes (Import Permit) </h4>
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
<div id="appperm" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Product Volumes (Import Permit) </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_perm"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Petroleum Products Importation by Market Segment modal -->
<div id="add_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Petroleum Products Importation by Market Segment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="refProdForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_refinery_production">
                   


            <div class="form-group row">
                <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_id" required>
                        <option value=""> Select Market Segment </option>
                        @if(count($market_seg)>0)
                            @foreach($market_seg as $market_seg)
                                <option value="{{$market_seg->id}}">{{$market_seg->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="product_id_rpro" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id_rpro" required>
                        <option value=""> Select Products </option>
                        @if(count($product_rpro)>0)
                            @foreach($product_rpro as $product_rpro)
                                <option value="{{$product_rpro->id}}">{{$product_rpro->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="company_id_rpro" class="col-sm-1 col-form-label"> Company </label>
                <div class="col-sm-5">
                    <select class="form-control" name="company_id" id="company_id_rpro" required>
                        <option value=""> Select Company </option>
                        @if(count($company_rpro)>0)
                            @foreach($company_rpro as $company_rpro)
                                <option value="{{$company_rpro->id}}">{{$company_rpro->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_rpro" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control year" name="year" id="year_rpro" required="" readonly="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rpro" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="january" id="january_rpro" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="febuary" id="febuary_rpro" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="march" id="march_rpro" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="april" id="april_rpro" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="may" id="may_rpro" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="june" id="june_rpro" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="july" id="july_rpro" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="august" id="august_rpro" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="september" id="september_rpro" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="october" id="october_rpro" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="november" id="november_rpro" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rpro" placeholder="" name="december" id="december_rpro" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rpro" value="" required="" readonly="">
                </div>

                <div class="col-sm-5">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total Litres" name="total_litres" id="total_litres" value="" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rpro_btn" id="add_rpro_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Petroleum Products Importation </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Petroleum Products Importation by Market Segment modal -->
<div id="edit_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Petroleum Products Importation by Market Segment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrefproduction">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Refinery Production modal -->
<div id="upl_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Petroleum Products Importation by Market Segment Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_refinery_production">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-product-import-by-market-template') }}" download="Product Import by Market Segment Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Refinery Production Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Refinery Production modal -->
<div id="view_ref_production" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Petroleum Products Importation by Market Segment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrefproduction">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Petroleum Products Importation by Market Segment modal -->
<div id="apprefprod" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Petroleum Products Importation by Market Segment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_refprod"></div>
          </div>
    </div>
    </div>  
</div>






 <!-- Add Petroleum Products Importation by Vessel modal -->
<div id="add_import_vessel" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Product Import: Number of Product Vessel </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="impVesselForm" action="{{url('/downstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_product_volume_permit_vessel">
                   


            <div class="form-group row">
                <label for="depot_name" class="col-sm-2 col-form-label"> Depot Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Depot Name" name="depot_name" id="depot_name" required>
                </div>
            </div>


            <div class="form-group row">
                <label for="field_office_id" class="col-sm-2 col-form-label"> Field Office </label>
                <div class="col-sm-10">
                    <select class="form-control" name="field_office_id" id="field_office_id" required>
                        <option value=""> Select Field Office </option>
                        @if(count($field_office)>0)
                            @foreach($field_office as $field_office)
                                <option value="{{$field_office->id}}">{{$field_office->field_office_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="product_id_rpro" class="col-sm-2 col-form-label"> Products </label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id_vess" required>
                        <option value=""> Select Products </option>
                        @if(count($product_vess)>0)
                            @foreach($product_vess as $product_vess)
                                <option value="{{$product_vess->id}}">{{$product_vess->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control year" placeholder="Year" name="year" id="year" required readonly>
                </div>
            </div>

            
            <div class="form-group row">
                <label for="value" class="col-sm-2 col-form-label"> No of Liters </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="" name="value" id="value" onkeyup="checkValue(this)">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_vess_btn" id="add_rpro_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Products Importation Vessel </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Petroleum Products Importation by Field Office modal -->
<div id="edit_imp_vessel" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Petroleum Products Importation by Vessels </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editimpvessel">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Refinery Production modal -->
<div id="upl_imp_vessel" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Product Import: Number of Product Vessel </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_product_volume_permit_vessel">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-product-import-vessel-template') }}" download="Refinery Production Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Import By Vessel Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Refinery Production modal -->
<div id="view_imp_vessel" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Petroleum Products Importation by Market Segment </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewimpvessel">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Petroleum Products Importation by Field Office modal -->
<div id="app_imp_vessel" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Product Import: Number of Product Vessel</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="appimpvessel"></div>
          </div>
    </div>
    </div>  
</div>








 <!-- Add Refinery Production Volume modal -->
<div id="add_ref_volume" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Refinery Production Volume </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="refVolForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_refinery_production_volume">
                   


            <div class="form-group row">
                <label for="refinery_id_rvol" class="col-sm-1 col-form-label"> Refinery </label>
                <div class="col-sm-5">
                    <select class="form-control" name="refinery_id" id="refinery_id_rvol" required>
                        <option value=""> Select Refinery </option>
                        @if(count($refinery_rvol)>0)
                            @foreach($refinery_rvol as $refinery_rvol)
                                <option value="{{$refinery_rvol->id}}">{{$refinery_rvol->plant_location_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="product_id_rvol" class="col-sm-1 col-form-label"> Products </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id_rvol" required>
                        <option value=""> Select Products </option>
                        @if(count($product_rvol)>0)
                            @foreach($product_rvol as $product_rvol)
                                <option value="{{$product_rvol->id}}">{{$product_rvol->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="stream_id" class="col-sm-1 col-form-label"> Stream </label>
                <div class="col-sm-5">
                    <select class="form-control" name="stream_id" id="stream_id">
                        <option value=""> Select Stream / Terminal </option>
                        @if(count($stream_ddl)>0)
                            @foreach($stream_ddl as $stream_ddl)
                                <option value="{{$stream_ddl->id}}">{{$stream_ddl->stream_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_rpro" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control year" placeholder="YYYY Year Of Production" name="year" id="year_rvol" required="" readonly="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rvol" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="january" id="january_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rvol" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="febuary" id="febuary_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rvol" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="march" id="march_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="april" id="april_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rvol" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="may" id="may_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="june_rvol" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="june" id="june_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rvol" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="july" id="july_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="august_rvol" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="august" id="august_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rvol" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="september" id="september_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="october_rvol" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="october" id="october_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rvol" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="november" id="november_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="december_rvol" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="december" id="december_rvol" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total_rvol" value="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rvol_btn" id="add_rvol_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Refinery Volume</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Refinery Production Volume modal -->
<div id="edit_ref_volume" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Refinery Production Volume </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrefvolume">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Refinery Production Volume modal -->
<div id="upl_ref_volume" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Refinery Production Volume Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_refinery_production_volume">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-domestic-production-template') }}" download="Refinery Production Volume Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Refinery Production Volume Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Refinery Production Volume modal -->
<div id="view_ref_volume" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Refinery Production Volume </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrefvolume">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Refinery Production Volume modal -->
<div id="apprefvol" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Refinery Production Volume </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ref_vol"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Products Average Consumer Price Range modal -->
<div id="addave_price_range" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Products Average Consumer Price Range </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="avePriceForm" action="{{url('/downstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_prod_ave_price_range">
                   

          <div class="form-group row">
            <label for="year_apr" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year YYYY" name="year" id="year_apr" readonly="">
            </div>

            <label for="month_apr" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month_apr" readonly="">
            </div>
          </div>  


          <div class="form-group row">
            <label for="production_type" class="col-sm-2 col-form-label"> Market Segment </label>
            <div class="col-sm-10">
                <select class="form-control" name="production_type" id="production_type" required="true">
                    <option value=""> Select Market Segment </option>
                        @forelse($range_mkt_seg as $range_mkt_seg)
                            <option value="{{$range_mkt_seg->id}}">{{$range_mkt_seg->market_segment_name}}</option>
                        @empty
                        @endforelse
                </select>
            </div>
          </div>         

          <div class="form-group row">
            <label for="pms" class="col-sm-2 col-form-label"> Lowest PMS in &#8358; </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="From" name="pms" id="pms">
            </div>

            <label for="pms_to" class="col-sm-2 col-form-label"> Highest PMS in &#8358; </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="To" name="pms_to" id="pms_to">
            </div>
          </div>         

          <div class="form-group row">
            <label for="ago" class="col-sm-2 col-form-label"> Lowest AGO in &#8358; </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="From" name="ago" id="ago">
            </div>

          <label for="ago_to" class="col-sm-2 col-form-label"> Highest AGO in &#8358; </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="To" name="ago_to" id="ago_to">
            </div>
          </div>         

          <div class="form-group row">
            <label for="dpk" class="col-sm-2 col-form-label"> Lowest DPK in &#8358; </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="From" name="dpk" id="dpk">
            </div>

          <label for="dpk_to" class="col-sm-2 col-form-label"> Highest DPK in &#8358; </label>
            <div class="col-sm-4">
                <input type="number" step="0.01" class="form-control" placeholder="To" name="dpk_to" id="dpk_to">
            </div>
          </div>      

         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_apr_btn" id="add_apr_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Ave Price Range </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Products Average Consumer Price Range modal -->
<div id="editave_price_range" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Products Average Consumer Price Range </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_aveprice_range">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Products Average Consumer Price Range modal -->
<div id="uplave_price_range" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Average Consumer Price Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_prod_ave_price_range">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-product-retail-price-template') }}" download="Average Consumer Price Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Average Consumer Price Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Products Average Consumer Price Range modal -->
<div id="view_ave_price_range" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Products Average Consumer Price Range </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="view_aveprice_range">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Products Average Consumer Price Range modal -->
<div id="apprange" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Products Average Consumer Price Range </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_range"></div>
          </div>
    </div>
    </div>  
</div>






<!-- Add Retail Outlet Summary modal -->
<div id="add_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Retail Outlet Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="retOutForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_retail_outlet">
                   



            <div class="form-group row">
                <label for="state_id_out" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_out" required>
                        <option value=""> Select States </option>
                        @if(count($states)>0)
                            @foreach($states as $states)
                                <option value="{{$states->id}}">{{$states->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="market_segment_out" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_outt" required>
                        <option value=""> Select Market Segment </option>
                        @if(count($market_segment)>0)
                            @foreach($market_segment as $market_segment)
                                <option value="{{$market_segment->id}}">{{$market_segment->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="year_out" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_out" required="" readonly="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rpro" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="january" id="january_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="febuary" id="febuary_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="march" id="march_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="april" id="april_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="may" id="may_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="june" id="june_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="july" id="july_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="august" id="august_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="september" id="september_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="october" id="october_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="november" id="november_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="december" id="december_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>      
            

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Total" name="total" id="total_out" value="" required="" readonly="">
                </div>
            </div>


         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_out_btn" id="add_out_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Retail Outlet</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Retail Outlet Summary modal -->
<div id="edit_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Retail Outlet Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editretoutlet">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Retail Outlet Summary modal -->
<div id="upl_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Retail Outlet Summary Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_retail_outlet">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-retail-outlet-count-template') }}" download="Retail Outlet Summary Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Retail Outlet Summary Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Retail Outlet Summary modal -->
<div id="view_ret_outlet" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Retail Outlet Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewretoutlet">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Retail Outlet Count modal -->
<div id="appout" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Retail Outlet Count </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_out"></div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Retail Outlet Storage Capacity modal -->
<div id="add_out_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Retail Outlet Storage Capacity </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="outCapForm" action="{{url('/downstream')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_retail_outlet_capacity">
                   

            <div class="form-group row">
                <label for="state_id_cap" class="col-sm-1 col-form-label"> States </label>
                <div class="col-sm-5">
                    <select class="form-control" name="state_id" id="state_id_cap" required>
                        <option value=""> Select States </option>
                        @if(count($states_cap)>0)
                            @foreach($states_cap as $states_cap)
                                <option value="{{$states_cap->id}}">{{$states_cap->state_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="market_segment_id" class="col-sm-1 col-form-label"> Market </label>
                <div class="col-sm-5">
                    <select class="form-control" name="market_segment_id" id="market_segment_id" required>
                        <option value=""> Select Market Segment </option>
                        @if(count($market_segment_cap)>0)
                            @foreach($market_segment_cap as $market_segment_cap)
                                <option value="{{$market_segment_cap->id}}">{{$market_segment_cap->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="product_id" class="col-sm-1 col-form-label"> Product </label>
                <div class="col-sm-5">
                    <select class="form-control" name="product_id" id="product_id" required>
                        <option value=""> Select Product </option>
                        @if(count($product_cap)>0)
                            @foreach($product_cap as $product_cap)
                                <option value="{{$product_cap->id}}">{{$product_cap->product_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="year_cap" class="col-sm-1 col-form-label"> Year </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_cap" required="" readonly="">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="january_rpro" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="january" id="january_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="febuary_rpro" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="febuary" id="febuary_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march_rpro" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="march" id="march_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="april" id="april_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may_rpro" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="may" id="may_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="june_rpro" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="june" id="june_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july_rpro" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="july" id="july_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="august_rpro" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="august" id="august_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september_rpro" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="september" id="september_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="october_rpro" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="october" id="october_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november_rpro" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="november" id="november_out" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="december_rpro" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control out" placeholder="" name="december" id="december_out" value="0" onkeyup="checkValue(this)">
                </div>
            </div>      
            

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Total" name="total" id="total_out" value="" required="" readonly="">
                </div>
            </div>

           

         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_cap_btn" id="add_cap_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Outlet Capacity</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Retail Outlet Storage Capacity modal -->
<div id="edit_out_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Retail Outlet Storage Capacity </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editoutcapacity">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Retail Outlet Storage Capacity modal -->
<div id="upl_out_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Outlet Storage Capacity Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_retail_outlet_capacity">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-retail-outlet-capacity-template') }}" download="Outlet Storage Capacity Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Outlet Storage Capacity Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Retail Outlet Storage Capacity modal -->
<div id="view_out_capacity" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Retail Outlet Storage Capacity </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewoutcapacity">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Retail Outlet Storage Capacity modal -->
<div id="appcap" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Retail Outlet Storage Capacity </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_cap"></div>
          </div>
    </div>
    </div>  
</div>





 <!-- Add Lubricant Blending Plant modal -->
<div id="add_license_marketer" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Lubricant Blending Plant </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="licMakForm" action="{{url('/downstream')}}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="type" id="" value="add_license_marketer_storage">
                   




            <div class="form-group row">
                <label for="year_oil" class="col-sm-2 col-form-label"> Year </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control year" placeholder="Year - YYYY" name="year" id="year_oil" required="" readonly="">
                </div>
            </div>

            <div class="form-group row">
                <label for="market_category_id" class="col-sm-2 col-form-label"> Market Segment </label>
                <div class="col-sm-10">
                    <select class="form-control" name="market_category_id" id="market_category_id" required>
                        <option value=""> Select Market Segment </option>
                        @if(count($m_category)>0)
                            @foreach($m_category as $m_category)
                                <option value="{{$m_category->id}}">{{$m_category->market_segment_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="company_id_mak" class="col-sm-2 col-form-label"> Company </label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id_mak" required>
                        <option value=""> Select Company </option>
                        @if(count($company_mak)>0)
                            @foreach($company_mak as $company_mak)
                                <option value="{{$company_mak->id}}">{{$company_mak->company_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="location_id" class="col-sm-2 col-form-label"> Location </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Location" name="location_id" id="location_id" required="">
                </div>
            </div>

            <div class="form-group row">
                <label for="value" class="col-sm-2 col-form-label"> Storage Capacity </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="storage_capacity" id="storage_capacity" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

           

         
          <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_mak_btn" id="add_mak_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Lubricant Blending Plant </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Lubricant Blending Plant modal -->
<div id="edit_license_marketer" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit Lubricant Blending Plant </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editlicensemarketer">

            </div>
        </div>
    </div>
    </div>  
</div>


<!-- Upload Lubricant Blending Plant modal -->
<div id="upl_license_marketer" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Lubricant Blending Plant Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="type" id="" value="upload_license_marketer_storage">
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-lube-blending-plant-template') }}" download="Lubricant Blending Plant Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Lubricant Blending Plant Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Lubricant Blending Plant modal -->
<div id="view_license_marketer" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg">
            <h4> View Lubricant Blending Plant </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewlicensemarketer">

            </div>
        </div>
    </div>
    </div>  
</div>



<!-- Approve Lubricant Blend Plant Capacity modal -->
<div id="appmar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Lubricant Blend Plant Capacity </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_mar"></div>
          </div>
    </div>
    </div>  
</div>







 <!-- Add Average Price of Nigeria's Crude Streams modal -->                                                                
<div id="addave_price" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Average Price of Nigeria's Crude Streams  </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="avePriForm" action="{{url('/downstream')}}" method="POST">
          @csrf
          <input type="hidden" class="form-control" name="type" id="" value="add_ave_price_crude">       


          <div class="form-group row">
            <label for="year_ave" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-5">
                <input type="text" class="form-control year" placeholder="Year (yyyy)" name="year" id="year_ave" required readonly>
            </div>

            <label for="stream_id_ave" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id_ave" required>
                    <option value=""> Select Stream / Field </option>
                    @if($stream_ave)
                        @foreach($stream_ave as $stream_ave)
                            <option value="{{$stream_ave->id}}"> {{$stream_ave->stream_name}} </option>                           
                        @endforeach
                    @endif
                </select>
            </div>
          </div>


          <div class="form-group row">
                <label for="january" class="col-sm-1 col-form-label"> January </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="january" id="january" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="febuary" class="col-sm-1 col-form-label"> February </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="febuary" id="febuary" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="march" class="col-sm-1 col-form-label"> March </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="march" id="march" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="april_rpro" class="col-sm-1 col-form-label"> April </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="april" id="april" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="may" class="col-sm-1 col-form-label"> May </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="may" id="may" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="june" class="col-sm-1 col-form-label"> June </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="june" id="june" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="july" class="col-sm-1 col-form-label"> July </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="july" id="july" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="august" class="col-sm-1 col-form-label"> August </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="august" id="august" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="september" class="col-sm-1 col-form-label"> September </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="september" id="september" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="october" class="col-sm-1 col-form-label"> October </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="october" id="october" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="november" class="col-sm-1 col-form-label"> November </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="november" id="november" min="0" value="0" onkeyup="checkValue(this)">
                </div>

                <label for="december" class="col-sm-1 col-form-label"> December </label>
                <div class="col-sm-5">
                    <input type="number" step="0.01" class="form-control rvol" name="december" id="december" min="0" value="0" onkeyup="checkValue(this)">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-sm-11">
                    <input type="hidden" step="0.01" class="form-control" placeholder="Yearly Total" name="total" id="total" value="" readonly="">
                </div>
            </div>



                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ave_btn" id="add_ave_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Ave Crude Price </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Average Price of Nigeria's Crude Streams modal -->
<div id="editave_price" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Edit Average Price of Nigeria's Crude Streams</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="edit_aveprice">  </div>
            </div>

        </div>
    </div>  
</div>



<!-- Upload Average Price of Nigeria's Crude Streams modal -->
<div id="uplave_price" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Ave Crude Price Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('downstream')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />
                    <input type="hidden" class="form-control" name="type" id="" value="upload_ave_price_crude">

                    <a href="{{ url('download-average-crude-price-template') }}" download="Sample Average Crude  Stream Price Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Average Crude  Stream Price Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Average Price of Nigeria's Crude Streams modal -->
<div id="viewave_price" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg"> View Average Price of Nigeria's Crude Streams</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewaveprice">  </div>
          </div>
    </div>
    </div>  
  </div>



<!-- Approve Average Price of Nigeria's Crude Streams modal -->
<div id="appavepri" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Average Price of Nigeria's Crude Streams </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_ave_pri"></div>
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
