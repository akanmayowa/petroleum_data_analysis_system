
<!-- Adding Review for Publication modal -->
<form id="reviewForm" action="{{url('/publication/nogiar/reviewPublication')}}" method="POST" enctype="multipart/form-data">
    <div id="add_review" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header header_bg">
                    <h4 class="modal-title"> Publication Review</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="note" class="col-form-label"> Note </label>
                            <textarea rows="2" class="form-control" placeholder="Notes" name="note"
                                      id="note"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" name="publication_id" id="publication_id"
                                   @if($nogiar) value="{{$nogiar->id}}"@endif>
                            <input type="hidden" class="form-control" name="year" id="year" value="{{$yrs}}">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"
                                onclick="return confirm('Are you sure you want to review NOGIAR Publication ?')"><i
                                    class="fa fa-check"></i> Save Review
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>




<!-- Adding Approval for Publication modal -->
<div id="add_approval" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header header_bg">
                <h4 class="modal-title"> Publication Approval</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form id="approvalForm" action="{{url('/publication/nogiar/approvePublication')}}" method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="note" class="col-form-label"> Note </label>
                            <textarea rows="2" class="form-control" placeholder="Notes" name="note"
                                      id="note"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" name="publication_id" id="publication_id"
                                   @if($nogiar) value="{{$nogiar->id}}"@endif>
                            <input type="hidden" class="form-control" name="year" id="year" value="{{$yrs}}">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"
                                onclick="return confirm('Are you sure you want to approve NOGIAR Publication ?')"><i
                                    class="fa fa-check"></i> Save Approval
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>




<!-- Adding Remarks for Publication modal -->
<form id="remarkForm" action="{{url('/publication/nogiar/admin/add_publication_remark')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div id="add_remark" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 70% !important;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header header_bg">
                    <h4 class="modal-title"> Add Publication Remark </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="fig_title_1" id="fig_title_1">
                    <input type="hidden" class="form-control" name="fig_title_2" id="fig_title_2">
                    <input type="hidden" class="form-control" name="add_remark_btn" id="" value="true">
                    <input type="hidden" class="form-control" name="table_id" id="table_id">
                    <input type="hidden" class="form-control" name="year" id="year" value="{{$yrs}}">

                    {{-- <label for="" class="col-form-label"> Display Position </label> <br> --}}
                    {{-- <label class="" style="padding: 2px 5px; margin-right: 5px">

                    </label> --}}
                    <div class="row ">
                        <div class="col-md-12 pull-left" style="padding-left: 0px">
                            <div class="col-sm-3 pull-left">
                                <label for="header" class="col-form-label"> Article Position </label>
                            </div>

                            <div class="col-sm-4 pull-left">
                                <label class="radio-inline container" style="">
                                    <input type="radio" class="posi" name="position" id="top" value="1"> <span> Top </span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-sm-5 pull-left">
                                <label class="radio-inline container">
                                    <input type="radio" class="posi" name="position" id="bottom" value="0"> <span> Bottom </span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <input type="hidden" name="posit" id="posit">
                        </div>
                    </div>


                    {{-- <div class="col-md-12" style="padding-left: 0px">
                        <label for="figure_title" class="col-form-label"> Figure Title </label>
                        <input type="text" class="form-control" name="figure_title" id="figure_title">
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label for="header" class="col-sm-3 col-form-label"> Header </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="header" id="header">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sub_head" class="col-sm-3 col-form-label"> Sub-Header </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_head" id="sub_head">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sub_sub_head" class="col-sm-3 col-form-label"> Sub-sub-Header </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_sub_head" id="sub_sub_head">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="table_title" class="col-sm-3 col-form-label"> Table Title </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="table_title" id="table_title" readonly>
                            {{-- <textarea rows="2" class="summernote" name="t_title" id="t_title"
                                style="min-height: 200px; max-height: 100px"></textarea> --}}
                            <input type="hidden" class="form-control" name="page_no" id="page_no">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="remark" class="col-form-label"> Remark / Article </label>
                            <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark" style="min-height: 200px; max-height: 400px"></textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_remark_btn" id="add_remark_btn" class="btn btn-dark"
                                onclick="return confirm('Are you sure you want to Add Remark?')" onmouseover="checkPosition()"><i class="fa fa-commenting-o"></i> 
                                Save Remark </button>
                             {{-- @if($contributors->contains('user_id', Auth::user()->id) )
                                <button type="submit" name="add_remark_btn" id="add_remark_btn" class="btn btn-dark"
                                onclick="return confirm('Are you sure you want to Add Remark?')"><i class="fa fa-commenting-o"></i> 
                                Save Remark </button>
                            @elseif($contributors->contains('approver_id', Auth::user()->id) )
                                <button type="button" name="appr_remark_btn" id="appr_remark_btn" class="btn btn-info"
                                onclick="return confirm('Are you sure you want to Approve Remark?')"><i class="fa fa-check-o"></i> 
                                Approve Remark </button>
                            @endif --}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</form>




<!-- Editting Remarks for Publication modal -->
<div id="edit_remark" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header header_bg">
                <h4 class="modal-title"> Edit Publication Remark </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div id="editremark">

                </div>

            </div>
        </div>
    </div>
</div>




<!-- Upload Publication -->
<form id="uploadForm" action="{{url('publication/upload')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="upl_pub" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                  
                    <div class="swal2-icon swal2-warning" style="display: block;">!</div>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="year" id="year_upload" value="{{$yrs}}">
                    <center> <h2 class="swal2-title" style="margin-top:-40px">Upload Publication</h2> </center>
                    <br>

                    <div class="row" style="text-align: center!important">
                        <div class="col-md-7"><input type="file" name="pdf_file" id="pdf_file" required></div>
                        <div class="col-md-5"><input type="submit" value="Upload File" id="upload_filed" class="btn btn-dark pull-right"/></div>
                                                
                        <p style="color:red"> {{$errors->first('pdf_file')}} </p>
                    </div>
                </div>
            </div>
       
        </div>
    </div>
</form>





<!-- Success  modal -->
<div id="successUploadModal" class="modal fade" role="dialog" style="margin-top: 10%">
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
                <center> <h2 class="swal2-title" style="margin-top:-40px">Converted to PDF Successfully</h2> </center>
                <br>

                <div class="" style="text-align: center!important">
                    <button type="submit" name="pdf_ok_btn" id="pdf_ok_btn" class="btn btn-success btn-lg" data-dismiss="modal">
                        <i class="fa fa-check"></i> Ok </button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Generate All Table Header -->
<form id="genHeadForm" action="{{route('add_page_number')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="gen_tab_head" class="modal fade" role="dialog" style="margin-top: 10%; z-index: 10000">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                  
                    <div class="swal2-icon swal2-question" style="display: block;">?</div>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="year" id="year_gen" value="{{$yrs}}">
                    <center> <h2 class="swal2-title" style="margin-top:-40px">Are you sure you want to Generate Table Headers?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" id="noGenBtn" class="btn btn-outline-warning waves-effect waves-light btn-lg" 
                        data-dismiss="modal"> Cancel </button>
                        <button type="submit" name="gen_tab_head_btn" id="gen_tab_head_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>

                    <div id="progressMsg" style="text-align: center!important; font-size: 16px; color: #008B8B; margin-top: 2%">   </div>
                </div>
            </div>
        </div>
    </div>
</form>




<!-- Declining Remarks for Publication modal -->
<form id="commentForm" action="{{route('publication-comment')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="add_comment_div" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none; background: #008B8B; color: #fff">   {{-- f32f53 --}}                 
                    <h4 class="modal-title"> <i class="fa fa-info"></i> Decline Approval of Article? </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <input type="hidden" class="form-control" name="year" id="year" value="{{$yrs}}">
                    <input type="hidden" class="form-control" name="division" id="_division" value="">

                    <h2 class="swal2-title" style="">Your Reason</h2>
                    <textarea rows="3" class="form-control" name="comment" id="comment"></textarea>
                    <br>  <br> 

                   {{--  <div class="form-group row">
                        <label for="comment" class="col-sm-12 col-form-label"> Your Reason </label>
                        <div class="col-sm-12">
                            
                        </div>
                    </div> --}}


                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="" class="btn btn-outline-warning waves-effect waves-light btn-lg" data-dismiss="modal"> Cancel </button>
                        <button type="submit" name="comm_dec_btn" id="comm_dec_btn" class="btn btn-danger btn-lg">
                            <i class="fa fa-ban"></i> Decline
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Approving Divisional Remarks for Publication modal -->
<form id="commentForm" action="{{route('publication-comment')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="approve_divisional_article" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-question pulse-question" style="display: block;">?</div>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="year" id="year" value="{{$yrs}}">
                    <input type="hidden" class="form-control" name="division" id="_division" value="">

                    <center> <h2 class="swal2-title" style="margin-top:-40px">Are you sure you want to approve article(s)?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="" class="btn btn-outline-warning waves-effect waves-lightbtn-lg" data-dismiss="modal"> Cancel </button>
                        <button type="submit" name="comm_app_btn" id="comm_app_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Approve
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




<!-- Enable Save Upload Btn -->
<form id="enableSaveUploadForm" action="{{route('enable-save-upload')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="enable_save_uploadModal" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-question pulse-question" style="display: block;">?</div>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="year" id="year_enab" value="{{$yrs}}">
                    <center> <h2 class="swal2-title" style="margin-top:-40px">Are you sure you want to Re-enable Save and Upload?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" id="" class="btn btn-outline-warning waves-effect waves-lightbtn-lg" data-dismiss="modal"> Cancel </button>
                        <button type="submit" name="enable_su_btn" id="enable_su_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes 
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>


<!-- Sending Notification For for Publication Approval modal -->
<form id="sendNotifyForm" action="{{route('notify-head-for-approval')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="sendNotifyModal" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-question pulse-question" style="display: block;">!</div>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="year" id="year" value="{{$yrs}}">
                    <input type="hidden" class="form-control" name="notify_type" id="notify_type" value="">

                    <center> <h2 class="swal2-title" style="margin-top:-40px">Are you sure you want to send for approval?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="" class="btn btn-outline-warning waves-effect waves-lightbtn-lg" data-dismiss="modal"> No </button>
                        <button type="submit" name="send_notif_appr_btn" id="send_notif_appr_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



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
                <center> <h2 class="swal2-title" style="margin-top:-40px">Email Notification Sent</h2> </center>
                <br>

                <div class="" style="text-align: center!important">
                    <button type="submit" name="succ_ok_btn" id="succ_ok_btn" class="btn btn-success btn-lg" data-dismiss="modal">
                        <i class="fa fa-check"></i> Ok </button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Send Notification for Approval modal -->
<form id="sendApprForm" action="{{route('send-for-approval')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="send_for_appr" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header header_bg">
                    <h4 class="modal-title"> Send Notification For Approval </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <input type="hidden" class="form-control" name="year" id="year_napp" value="{{$yrs}}">
                    <input type="hidden" class="form-control" name="stage" id="stage" value="{{$stage->stage_id}}">

                    <div class="form-group row">
                        <label for="user_id" class="col-sm-12 col-form-label"> User </label>
                        <div class="col-sm-12">
                            <select class="form-control" name="user_id" id="user_id" required>
                                <option value=""> Select User </option>
                                @forelse($users as $user)
                                    @if($user->role == 29 && $user->rrole == 1)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="message" class="col-sm-12 col-form-label"> Message </label>
                        <div class="col-sm-12">
                            <textarea rows="4" class="form-control" name="message" id="message"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="" id="" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i>
                            Cancel
                        </button>
                        <button type="submit" name="" id="sendAppBtn" class="btn btn-info"> <i class="fa fa-success"></i> Send </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>




<!-- Approve NOGIAR Publication -->
<form id="pubApprForm" action="{{route('approve-publication')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="pub_appr_modal" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">                    
                    <div class="swal2-icon swal2-question pulse-question" style="display: block;">!</div>
                </div>

                <div class="modal-body">
                    <input type="hidden" class="form-control" name="year" id="year_pub_appr" value="{{$yrs}}">
                    <input type="hidden" class="form-control" name="app_dec" id="app_dec">

                    <center> <h2 class="swal2-title" style="margin-top:-40px">Are you sure you want to Approve this Publication?</h2> </center>
                    <br>

                    <div class="" style="text-align: center!important">
                        <button type="button" name="" id="" class="btn btn-outline-warning waves-effect waves-lightbtn-lg" data-dismiss="modal"> No </button>
                        <button type="submit" name="pub_appr_btn" id="pub_appr_btn" class="btn btn-info btn-lg">
                            <i class="fa fa-check"></i> Yes </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<!-- Decline NOGIAR Publication -->
<form id="decApprForm" action="{{route('notify-head-for-decline')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="dec_appr_modal" class="modal fade" role="dialog" style="margin-top: 10%">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #5D8AA8; color: #fff">
                    <h4 class="modal-title">Decline Approval of Publication? </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <input type="hidden" class="form-control" name="year" id="year_pub_appr" value="{{$yrs}}">
                    <input type="hidden" class="form-control" name="app_dec" id="app_dec" value="0">
                    <input type="hidden" class="form-control" name="notify_type" id="notify_typed" value="">


                    <div class="form-group row" id="res" style="">
                        <label for="reason" class="col-lg-12 col-form-label" style="font-size: 14px !important"> Your Reason </label>
                        <div class="col-sm-12">
                            <textarea rows="4" class="form-control" placeholder=""  name="reason"id="reason"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer" style="border-top: none;">
                        <table class="" style="width: 100%">
                            <tr>
                              <td style="width: 50%">
                                <button type="button" class="btn btn-danger btn-lg pull-right" data-dismiss="modal"><i class="fa fa-remove"></i> No </button>
                              </td>
                              <td style="width: 50%">
                                <button type="submit" name="send_dec_btn" id="send_dec_btn" class="btn btn-info btn-lg pull-left">
                                    <i class="fa fa-check"></i> Yes
                                </button>
                              </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>



<!-- Upload Publication -->
<form id="uploadFinalForm" action="{{url('publication/upload-final')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="upl_final_pub" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header header_bg">
                    <h4 class="modal-title">Upload Final Copy </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="file" name="pdf_file_final" id="pdf_file_final" required>
                    <input type="hidden" name="year" id="year_upload" value="{{$yrs}}" required>
                    <p style="color:red"> {{$errors->first('pdf_file_final')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-info pull-left"/>
                </div>
            </div>
        </div>
    </div>
</form>
