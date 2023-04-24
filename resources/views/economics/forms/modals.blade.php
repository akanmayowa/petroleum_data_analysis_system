
 <!-- Add Revenue Projected modal -->                                                                
<div id="add_revenue_pro" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Revenue Performance Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="proForm" action="{{url('economics')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
       


          <div class="form-group row">
            <label for="year_pro" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-10">
                <input type="text" class="form-control year" placeholder="Year (yyyy)" name="year" id="year_pro" required readonly>
            </div>
          </div> 


          <div class="form-group row">
            <label for="oil_projected" class="col-sm-2 col-form-label"> Oil Royalty </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="oil_projected" id="oil_projected" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_projected" class="col-sm-2 col-form-label"> Gas Royalty </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="gas_projected" id="gas_projected" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_flare_projected" class="col-sm-2 col-form-label"> Flared Payment </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="gas_flare_projected" id="gas_flare_projected" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="concession_projected" class="col-sm-2 col-form-label"> Concession Rentals </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="concession_projected" id="concession_projected" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="misc_projected" class="col-sm-2 col-form-label"> MOR </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="misc_projected" id="misc_projected" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="signature_bonus" class="col-sm-2 col-form-label"> Signature Bonus </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="signature_bonus" id="signature_bonus" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div> 


          <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" step="0.01" class="form-control" name="total_projected" id="total_projected" value="0" min="0" required="" readonly="">
                    <input type="hidden" class="form-control" name="type" id="" value="add_revenue_projected">
            </div>
          </div> 



                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Revenue Projected</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Revenue Projected Summary modal -->
<div id="edit_revenue_pro" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg"> Edit Revenue Projected </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrevenuepro">  </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Revenue Projected Summary modal -->
<div id="upl_revenue_pro" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Revenue Projected Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('economics')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-revenue-template') }}" download="Sample Revenue Projected Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Revenue Projected Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                    <input type="hidden" class="form-control" name="type" id="" value="upload_revenue_projected">
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Revenue Projected Summary modal -->
<div id="view_revenue_pro" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg"> View Revenue Projected </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrevenuepro">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Revenue Projected Summary modal -->
<div id="appproj" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-75">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Revenue Projected Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_proj"></div>
          </div>
    </div>
    </div>  
</div>









 <!-- Add Revenue Actual Summary modal -->                                                                
<div id="add_revenue_act" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Revenue Actual </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
          <form id="actForm" action="{{url('economics')}}" method="POST">
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
       


          <div class="form-group row">
            <label for="year_rev" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control year" placeholder="Year (yyyy)" name="year" id="year_rev" required readonly>
            </div>

            <label for="month" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control month" placeholder="Month" name="month" id="month" required>
            </div>
          </div> 


          <div class="form-group row">
            <label for="oil_projected" class="col-sm-2 col-form-label"> Oil Royalty </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control act" name="oil_actual" id="oil_actual" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_actual" class="col-sm-2 col-form-label"> Gas Sales Royalty </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control act" name="gas_actual" id="gas_actual" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="gas_flare_actual" class="col-sm-2 col-form-label"> Flared Payment </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control act" name="gas_flare_actual" id="gas_flare_actual" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="concession_actual" class="col-sm-2 col-form-label"> Concession Rentals </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control act" name="concession_actual" id="concession_actual" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="misc_actual" class="col-sm-2 col-form-label"> MOR </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control act" name="misc_actual" id="misc_actual" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div>  


          <div class="form-group row">
            <label for="signature_bonus" class="col-sm-2 col-form-label"> Signature Bonus </label>
            <div class="col-sm-10">
                <input type="number" step="0.01" class="form-control proj" name="signature_bonus" id="signature_bonus" value="0" min="0" onkeyup="checktotal(this)">
            </div>
          </div> 


          <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" step="0.01" class="form-control" name="total_actual" id="total_actual" value="0" min="0" onkeyup="checktotal(this)" readonly="">
                    <input type="hidden" class="form-control" name="type" id="" value="add_revenue_actual">
            </div>
          </div> 



                            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Revenue Actual</button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit Revenue Actual Summary modal -->
<div id="edit_revenue_act" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg"> Edit Revenue Actual </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editrevenueact">  </div>
          </div>
    </div>
    </div>  
  </div>


<!-- Upload Revenue Actual Summary modal -->
<div id="upl_revenue_act" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Actual Revenue Summary Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{url('economics')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a href="{{ url('download-revenue-template') }}" download="Sample Revenue Actual Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Revenue Actual Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                    <input type="hidden" class="form-control" name="type" id="" value="upload_revenue_actual">
                </form>
        </div>
    </div>
    </div>  
</div>


<!-- View Revenue Actual modal -->
<div id="view_revenue_act" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header head_bg"> View Revenue Actual Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="viewrevenueact">  </div>
          </div>
    </div>
    </div>  
</div>



<!-- Approve Revenue Actual Summary modal -->
<div id="appact" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-75">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Revenue Actual Summary </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="app_act"></div>
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
                <center> <h2 class="swal2-title" style="margin-top:-40px">Selected Record Approved Successfully</h2> </center>
                <br>

                <div class="" style="text-align: center!important">
                    <button type="submit" name="succ_ok_btn" id="succ_ok_btn" class="btn btn-success btn-lg" data-dismiss="modal">
                        <i class="fa fa-check"></i> Ok </button>
                </div>
            </div>
        </div>
    </div>
</div>
