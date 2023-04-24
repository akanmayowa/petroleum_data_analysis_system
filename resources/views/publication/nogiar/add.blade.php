 @extends('layouts.app_statistics')

@section('content')




<!-- INCLUDING modals-->
@include('publication.nogiar.add-styles')




@php    
    //SET NOGIAR PDF FILE PATH
    $pdf_name = 'NOGIAR 2012.pdf'; //'NOGIAR '.$yrs.'.pdf';
    $pdf_path = 'assets/images/publications/'.$pdf_name.'/'.$pdf_name;
@endphp

<div class="row font-12" style="">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body"> 

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Publication Section </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <ul class="nav nav-pills nav-justified" role="tablist">     
                    @if(Auth::user()->role_obj->role_name == 'Admin')
                        <li class="nav-item nav-pad">
                            <a class="nav-link init font-12" data-toggle="tab" href="#initPub" style="cursor: pointer;"> Initiate Publication</a>
                        </li> 

                        <li class="nav-item nav-pad">
                            <a class="nav-link notify font-12" data-toggle="modal" id="notif" data-target="#notifyModal" role="tab"> Contributors</a>
                        </li>
                    @endif 

                    @if($contributors->contains('user_id', Auth::user()->id) || $contributors->contains('approver_id', Auth::user()->id) 
                        && $contributors->contains('division', 'DIRECTOR REMARK') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link font-12" data-toggle="tab" id="dir" href="#director" role="tab" onclick="changeYearval('year_dremark')"> Directors Remarks</a>
                        </li>   
                    @endif

                    @if($contributors->contains('user_id', Auth::user()->id) || $contributors->contains('approver_id', Auth::user()->id) 
                        && $contributors->contains('division', 'DPR STRUCTURE') ) 
                    <li class="nav-item nav-pad">
                        <a class="nav-link font-12" data-toggle="tab" id="reg" href="#regulatory" onclick="changeYearval('year_reg')" role="tab"> DPR Structure</a>
                    </li>  
                    @endif

                    @if($contributors->contains('user_id', Auth::user()->id) || $contributors->contains('approver_id', Auth::user()->id) 
                        && $contributors->contains('division', 'MAIN ARTICLE') )
                    <li class="nav-item nav-pad">
                        <a class="nav-link font-12" data-toggle="tab" id="mod" href="#modular" onclick="changeYearval('year_mod')" role="tab"> Main Article</a>
                    </li>  
                    @endif

                    @if($contributors->contains('user_id', Auth::user()->id) || $contributors->contains('approver_id', Auth::user()->id) 
                        && $contributors->contains('division', 'GLOSSARY') ) 
                    <li class="nav-item nav-pad">
                        <a class="nav-link font-12" data-toggle="tab" id="glo" href="#glossary" onclick="changeYearval('year_glo')" role="tab"> Glossary</a>
                    </li> 
                    @endif

                    @if(Auth::user()->role_obj->role_name == 'Admin')
                        <li class="nav-item nav-pad">
                            <a class="nav-link init font-12" data-toggle="tab" href="#mess" style="cursor: pointer;"> Messages</a>
                        </li> 

                        <li class="nav-item nav-pad">
                            <a class="nav-link init font-12" data-toggle="tab" href="#noti" style="cursor: pointer;"> Notifications</a>
                        </li> 

                        <li class="nav-item nav-pad">
                            <a class="nav-link init font-12" data-toggle="tab" href="#sett" style="cursor: pointer;"> Settings</a>
                        </li> 
                    @endif 
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">                 

                    <div class="tab-pane p-3" id="initPub" role="tabpanel">
                    <form id="InitForm" action="{{ route('add-init-user') }}" method="POST">
                        @csrf
                        <p class="font-14 mb-0">
                            <div class="row" style="padding: 0px">
                                <div class="col-md-5 col-sm-6" style="border-right: thin dotted #aaa">
                                    <h5> Add Contributors for NOGIAR Articles </h5>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="year_init" class="col-form-label"> Year </label>
                                            <input type="text" class="form-control year" value="" placeholder="Year" name="year" id="year_init" required readonly>
                                            <input type="hidden" class="form-control" value="" name="edit_id" id="edit_id" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="workflow_id" class="col-form-label"> Workflow </label>
                                            <select class="form-control" name="workflow_id" id="workflow_id" required>
                                                {{-- <option value=""> Select Workflow </option> --}}
                                                @forelse($workflows as $workflow)
                                                    <option value="{{$workflow->id}}"> {{$workflow->name}} </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="division" class="col-form-label"> Sections </label>
                                            <select class="form-control" name="division" id="division" required>
                                                <option value=""> </option>
                                                <option value="DIRECTOR REMARK"> Director Remark </option>
                                                <option value="DPR STRUCTURE"> DPR Structure </option>
                                                <option value="MAIN ARTICLE"> Main Article </option>
                                                <option value="GLOSSARY"> Glossary </option>
                                                <option value="UPSTREAM"> Upstream </option>
                                                <option value="MIDSTREAM"> Midstream </option>
                                                <option value="DOWNSTREAM"> Downstream </option>
                                                <option value="HSE"> HSE </option>
                                                <option value="E&S"> E&S </option>
                                                <option value="REVENUE"> Revenue </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="user_id_ini" class="col-form-label"> Contributor </label>
                                            <select class="form-control" name="user_id" id="user_id_ini" required>
                                                <option value=""> Select User </option>
                                                    @forelse($users as $user)
                                                        <option value="{{$user->id}}"> {{$user->name}} </option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="approver_id_ini" class="col-form-label"> Approver </label>
                                            <select class="form-control" name="approver_id" id="approver_id_ini">
                                                <option value=""> Select Approver </option>
                                                    @forelse($users as $user)
                                                        <option value="{{$user->id}}"> {{$user->name}} </option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
             
                                  <div class="form-group col-md-12" style="text-align: right; padding-right: 0px">
                                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                    <button type="button" name="initAdd" id="initAdd" class="btn btn-dark pull-right" onclick="return confirm('Are you sure you want to add user for Reviewing and Approval?')"> Add </button>
                                  </div>

                                </div>

                                <div class="col-md-7 col-sm-6" style="border-left: thin dotted #aaa">
                                    <h5 style=""> List of Contributors for NOGIAR Articles </h5>
                                    <table class="table table-striped table-sm mb-0" id="init_row">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Year</th>
                                            <th>Division</th>
                                            <th>Contributors</th>
                                            <th>Approver</th>
                                            <th style="text-align: right;"> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> 
                            </div> <!-- end row -->

                            
                            <div class="col-md-12" style="text-align: right; padding-right: 0px">
                                <button type="button" name="submitAdd" id="submitAdd" class="btn btn-info pull-right"> Submit </button>
                            </div>
                        </p>
                    </form>
                    </div>                   

                    <div class="tab-pane p-3" id="director" role="tabpanel">
                    <form id="" action="{{ route('add-section') }}" method="POST">
                        @csrf
                        <p class="font-14 mb-0">
                            <div class="row" style="padding: 0px">
                                <div class="col-md-9 col-sm-6" style="">
                                    <h5 style="color: #aaa"> Directors Remark </h5>
                                </div>

                                {{-- <div class="col-md-3 col-sm-0"> </div> --}}

                                <div class="row col-md-3 col-sm-6" style=""> 
                                    <div class="col-xl-10 col-sm-10" style="text-align: right"> 
                                        <input type="text" class="form-control year" value="" placeholder="Year" name="year" id="year_dremark" required readonly>
                                        <input type="hidden" class="form-control" name="id" id="id_dr">
                                    </div>

                                    <div class="col-xl-2 col-md-2 col-sm-2" style="text-align: right"> 
                                        <button type="button" id="prevYearDrem" class="btn btn-dark btn-sm round marg" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                    </div> 
                                </div>

                                <div class="form-group col-md-12" style="margin-top: 10px">
                                    {{-- <label for="title" class="col-md-3 col-form-label"> Title </label> --}}
                                    
                                    <input type="text" class="form-control" name="title" id="title" required="" value="">

                                    <input type="hidden" class="form-control" name="section_type" id="section_type" required="" value="1">
                                  
                                </div> 


                                {{-- <div class="col-lg-12">
                                    <label class=""></label>
                                    <input type="text" class="form-control" id="title" id="title" required="" 
                                           value="">
                                </div> --}}
                                <div class="col-lg-12" style="margin-top: 10px">
                                    <textarea name="content" id="content" rows="10" cols="80">   </textarea>
                                </div>

                                

                                {{-- <div class="col-lg-12" style="margin-top: 10px">
                                    <div class="adjoined-bottom">
                                        <div class="grid-container">
                                            <div class="grid-width-100">
                                                <div id="editor">                                                    
                                                    <textarea id="content" name="content" class="summernote" required=""></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                                {{-- <div class="col-lg-12" style="margin-top: 10px">
                                    <input type="hidden" class="form-control" id="section_type" id="section_type" value="1">
                                </div> --}}


                                <div class="col-lg-12" style="margin-top: 10px;">
                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                       <button type="button" id="ena_director_remark" class="btn btn-outline-success waves-effect waves-light pull-left"> Enable Article </button>
                                    @endif

                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                       <button type="button" id="app_director_remark" class="btn btn-info btn-sm waves-effect waves-light pull-right"> Approve </button>
                                       <button type="button" id="dec_director_remark" class="btn btn-danger btn-sm waves-effect waves-light pull-right mg-l"> Decline</button>
                                    @endif

                                    <button type="button" id="save_director_remark" class="btn btn-dark btn-sm pull-right mg-l"> Submit </button>
                                    <button type="button" id="draft_director_remark" class="btn btn-secondary btn-sm pull-right mg-l"> Save as Draft </button>
                                </div>
                                     
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div>

                    <div class="tab-pane p-3" id="regulatory" role="tabpanel">
                    <form id="" action="{{ route('add-section') }}" method="POST">
                    @csrf
                        <p class="font-14 mb-0">
                            <div class="row">
                                <div class="col-md-9 col-sm-6" style="">
                                    <h5 style="margin-left: 5px; color: #aaa"> Article for DPR Structure </h5>
                                </div>

                                <div class="row col-md-3 col-sm-6" style=""> 
                                    <div class="col-xl-10 col-sm-10" style="text-align: right"> 
                                        <input type="text" class="form-control year" value="" placeholder="Year" readonly="" name="year" id="year_reg" required="">
                                        <input type="hidden" class="form-control" name="id" id="id_reg">
                                    </div>

                                    <div class="col-xl-2 col-md-2 col-sm-2" style="text-align: right"> 
                                        <button type="button" id="prevYearRstru" class="btn btn-dark btn-sm round marg" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                    </div> 
                                </div>

                                <div class="form-group col-md-12" style="margin-top: 10px">
                                    {{-- <label for="title" class="col-md-3 col-form-label"> Title </label> --}}
                                    
                                    <input type="text" class="form-control" name="title" id="title_reg" required="" value="">

                                    <input type="hidden" class="form-control" name="section_type" id="section_type_reg" required="" value="2">
                                  
                                </div> 
                                <div class="col-lg-12" style="margin-top: 10px">
                                    <textarea name="content" id="content_reg" class="content_reg_sign" rows="10" cols="80">   </textarea>
                                </div>


                                <div class="col-lg-12" style="margin-top: 10px;">
                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                        <button type="button" id="ena_reg_sign" class="btn btn-outline-success waves-effect waves-light pull-left"> Enable Article </button>
                                    @endif

                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                       <button type="button" id="app_reg_sign" class="btn btn-info btn-sm waves-effect waves-light pull-right"> Approve </button>
                                       <button type="button" id="dec_reg_sign" class="btn btn-danger btn-sm waves-effect waves-light pull-right mg-l"> Decline</button>
                                    @endif

                                    <button type="button" id="save_reg_sign" class="btn btn-dark btn-sm pull-right mg-l"> Submit </button>
                                    <button type="button" id="draft_reg_sign" class="btn btn-secondary btn-sm pull-right mg-l"> Save as Draft </button>
                                </div>
                                     
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div>                   

                    <div class="tab-pane p-3" id="modular" role="tabpanel">
                    <form id="" action="{{ route('add-section') }}" method="POST">
                    @csrf
                        <p class="font-14 mb-0">
                            <div class="row">
                                <div class="col-md-9 col-sm-6" style="">
                                    <h5 style="margin-left: 5px; color: #aaa"> Main Article for NOGIAR </h5>
                                </div>

                                <div class="row col-md-3 col-sm-6" style=""> 
                                    <div class="col-xl-10 col-sm-10" style="text-align: left"> 
                                        <input type="text" class="form-control year" value="" placeholder="Year" readonly="" name="year" id="year_mod" required="">
                                        <input type="hidden" class="form-control" name="id" id="id_mod">
                                    </div>

                                    <div class="col-xl-2 col-md-2 col-sm-2" style="text-align: right"> 
                                        <button type="button" id="prevYearMref" class="btn btn-dark btn-sm round marg" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                    </div> 
                                </div>

                                <div class="form-group col-md-12" style="margin-top: 10px">
                                    {{-- <label for="title" class="col-md-3 col-form-label"> Title </label> --}}
                                    
                                        <input type="text" class="form-control" name="title" id="title_mod" required="" value="">

                                        <input type="hidden" class="form-control" name="section_type" id="section_type_mod" required="" value="3">
                                  
                                </div> 

                                <div class="col-lg-12" style="margin-top: 10px">
                                    <textarea name="content" id="content_mod" class="content_mod_ref" rows="10" cols="80">   </textarea>
                                </div>


                                <div class="col-lg-12" style="margin-top: 10px;">
                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                        <button type="button" id="ena_mod_ref" class="btn btn-outline-success waves-effect waves-light pull-left"> Enable Article </button>
                                    @endif

                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                       <button type="button" id="app_mod_ref" class="btn btn-info btn-sm waves-effect waves-light pull-right"> Approve </button>
                                       <button type="button" id="dec_mod_ref" class="btn btn-danger btn-sm waves-effect waves-light pull-right mg-l"> Decline</button>
                                    @endif
                                   
                                    <button type="button" id="save_mod_ref" class="btn btn-dark btn-sm pull-right mg-l"> Submit </button>
                                    <button type="button" id="draft_mod_ref" class="btn btn-secondary btn-sm pull-right mg-l"> Save as Draft </button>
                                </div>
                                     
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div>                   
                   

                    <div class="tab-pane p-3" id="glossary" role="tabpanel">
                        <form id="" action="{{ route('add-section') }}" method="POST">
                        @csrf
                        <p class="font-14 mb-0">
                            <div class="row">
                                <div class="col-md-9 col-sm-6" style="">
                                    <h5 style="margin-left: 5px; color: #aaa"> GLOSSARY </h5>
                                </div>

                                <div class="row col-md-3 col-sm-6" style=""> 
                                    <div class="col-xl-10 col-sm-10" style="text-align: right"> 
                                        <input type="text" class="form-control year" value="" placeholder="Year" readonly="" name="year" id="year_glo" required="">
                                        <input type="hidden" class="form-control" name="id" id="id_glo">
                                    </div>

                                    <div class="col-xl-2 col-md-2 col-sm-2" style="text-align: right"> 
                                        <button type="button" id="prevYearGlos" class="btn btn-dark btn-sm round marg" data-toggle="tooltip" tooltip="true" title="Use Previous Year Template"> <i class="fa fa-calendar"></i> </button>
                                    </div> 
                                </div>

                                <div class="form-group col-md-12" style="margin-top: 10px">
                                    {{-- <label for="title" class="col-md-3 col-form-label"> Title </label> --}}
                                    
                                        <input type="text" class="form-control" name="title" id="title_glo" required="" 
                                        value="Glossary of Terms">

                                        <input type="hidden" class="form-control" name="section_type" id="section_type_glo" required="" value="5">
                                  
                                </div>

                                <div class="col-lg-12" style="margin-top: 10px">
                                    <textarea name="content" id="content_glo" class="content_glossary" rows="10" cols="80">   </textarea>
                                </div> 


                                <div class="col-lg-12" style="margin-top: 10px;">
                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                        <button type="button" id="ena_glossary" class="btn btn-outline-success waves-effect waves-light pull-left"> Enable Article </button>
                                    @endif

                                    @if(\Auth::user()->role_obj->role_name == 'Admin')
                                       <button type="button" id="app_glossary" class="btn btn-info btn-sm waves-effect waves-light pull-right"> Approve </button>
                                       <button type="button" id="dec_glossary" class="btn btn-danger btn-sm waves-effect waves-light pull-right mg-l"> Decline</button>
                                    @endif
                                   
                                    <button type="button" id="save_glossary" class="btn btn-dark btn-sm pull-right mg-l"> Submit </button>
                                    <button type="button" id="draft_glossary" class="btn btn-secondary btn-sm pull-right mg-l"> Save as Draft </button>
                                </div>
                                     
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div> 

                    <div class="tab-pane p-3" id="toc" role="tabpanel">
                        <form id="tocForms" action="{{ route('add-table-of-content') }}" method="POST">
                            @csrf 
                            <p class="font-14 mb-0">

                                <div class="row" style="">
                                    <div class="col-md-9 col-sm-6" style="">
                                        <h5 style="margin-left: 5px; color: #aaa"> Table of Content </h5>
                                    </div>

                                    <div class="row col-md-3 col-sm-6" style=""> 
                                        <div class="col-xl-10 col-sm-10" style="text-align: left"> 
                                            <input type="text" class="form-control year" value="" placeholder="Year" readonly="" name="year" id="year_toc" required="">
                                            <input type="hidden" class="form-control" name="id" id="id_toc">
                                        </div>

                                        <div class="col-md-2 col-sm-2" style="padding: 0px; "> 
                                            <button type="sunmit" id="generateBtns" class="btn btn-default btn-sm pull-right gen marg" title="Generate Table of Content"> <i class="fa fa-check"> Generate</i>
                                            </button>
                                        </div>
                                    </div>

                                </div> 

                            </p>
                        </form>
                    </div> 



                    <div class="tab-pane p-3" id="mess" role="tabpanel">
                    <form id="MsgForm" action="{{ route('add-publication-message') }}" method="POST">
                        @csrf
                        <p class="font-14 mb-0">
                            <div class="row" style="padding: 0px">
                                <div class="col-md-8 offset-md-2 col-sm-12" style="border: thin dotted #bbb">
                                    <h5> Setup Email Messages for Publications </h5>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                        <label for="year_msg" class="col-form-label"> Year </label>
                                            <input type="text" class="form-control year" value="" placeholder="Year" name="year" id="year_msg" required readonly>
                                            <input type="hidden" class="form-control" value="" name="edit_msg" id="edit_msg" readonly>
                                        </div>

                                        <div class="col-sm-6">
                                        <label for="section" class="col-form-label"> Sections </label>
                                            <select class="form-control" name="section" id="section_msg" required>
                                                <option value=""> </option>
                                                <option value="NOTIFY CONTRIBUTORS"> Notify Contributors </option>
                                                <option value="DIRECTOR REMARK"> Director Remark </option>
                                                <option value="DPR STRUCTURE"> DPR Structure </option>
                                                <option value="MAIN ARTICLE"> Main Article </option>
                                                <option value="GLOSSARY"> Glossary </option>
                                                <option value="UPSTREAM"> Upstream </option>
                                                <option value="MIDSTREAM"> Midstream </option>
                                                <option value="DOWNSTREAM"> Downstream </option>
                                                <option value="HSE"> HSE </option>
                                                <option value="E&S"> E&S </option>
                                                <option value="REVENUE"> Revenue </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="message" class="col-form-label"> Messages </label>
                                            <textarea rows="5" class="form-control" name="message" id="message_msg" required></textarea>
                                        </div>
                                    </div>
             
                                  <div class="form-group col-md-12" style="text-align: right; padding-right: 0px">
                                    <button type="reset" class="btn btn-warning">Clear</button>
                                    <button type="submit" name="messageBtn" id="messageBtn" class="btn btn-dark pull-right" onclick="return confirm('Are you sure you want to add this message?')" style="margin-left: 5px"> Submit </button>
                                  </div>

                                </div> 
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div> 


                    <div class="tab-pane p-3" id="noti" role="tabpanel">
                    <form id="RemForm" action="{{ route('send-reminder') }}" method="POST">
                        @csrf
                        <p class="font-14 mb-0">
                            <div class="row" style="padding: 0px">
                                <div class="col-md-8 offset-md-2 col-sm-12" style="border: thin dotted #bbb">
                                    <h5> Send Email Reminder </h5>
                                    <div class="form-group row">
                                        <div class="col-md-5 col-sm-12">
                                            <label for="user_id_rem" class="col-form-label"> User </label>
                                            <select class="form-control" name="user_id" id="user_id_rem">
                                                <option value=""> Select User </option>
                                                    @forelse($users as $user)
                                                        <option value="{{$user->id}}"> {{$user->name}} </option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col-md-5 col-sm-12">
                                            <label for="division_rem" class="col-form-label"> Sections </label>
                                            <input type="hidden" class="form-control" value="" name="edit_rem" id="edit_rem" readonly>
                                            <select class="form-control" name="division" id="division_rem">
                                                <option value=""> </option>
                                                <option value="DIRECTOR REMARK"> Director Remark </option>
                                                <option value="DPR STRUCTURE"> DPR Structure </option>
                                                <option value="MAIN ARTICLE"> Main Article </option>
                                                <option value="GLOSSARY"> Glossary </option>
                                                <option value="UPSTREAM"> Upstream </option>
                                                <option value="MIDSTREAM"> Midstream </option>
                                                <option value="DOWNSTREAM"> Downstream </option>
                                                <option value="HSE"> HSE </option>
                                                <option value="E&S"> E&S </option>
                                                <option value="REVENUE"> Revenue </option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 col-sm-12">
                                            <label for="all" class="col-form-label"> All </label>
                                            <label class="container"> 
                                              <input type="checkbox" name="all" id="all" value="1"> <span class="checkmark" style="margin-top: 0px;"></span>
                                            </label>

                                            {{-- <input type="checkbox" class="form-control" name="all_users" id="all_users"> --}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <label for="message_rem" class="col-form-label"> Messages </label>
                                            <textarea rows="5" class="form-control" name="message" id="message_rem" required></textarea>
                                        </div>
                                    </div>
             
                                  <div class="form-group col-md-12" style="text-align: right; padding-right: 0px">
                                    <button type="reset" class="btn btn-warning">Clear</button>
                                    <button type="submit" name="remindBtn" id="remindBtn" class="btn btn-dark pull-right" onclick="return confirm('Are you sure you want to add this message?')" style="margin-left: 5px"> Send Reminder </button>
                                  </div>

                                </div> 
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div> 


                    <div class="tab-pane p-3" id="sett" role="tabpanel">
                    <form id="SetForm" action="{{ route('showhide-publication-tables') }}" method="POST">
                        @csrf
                        <p class="font-14 mb-0">
                            <div class="row" style="padding: 0px">
                                <div class="col-md-7" style="border: thin dotted #bbb">
                                    <table class="table">
                                        <tr>
                                            <th style="width: 50%"> <h5> List of Publication Statistical Tables </h5> </th>
                                            <th style="width: 20%"><label for="year_sett" class="col-form-label pull-right"> Year </label></th>
                                            <th style="width: 30%">
                                            <input type="text" class="form-control year pull-left" value="" placeholder="Year" name="year" id="year_sett" required readonly></th>
                                        </tr>
                                    </table>
                                    
                                    
                                    <div class="table-responsive">  
                                        <table class="table table-striped table-sm mb-0" id="sett_table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>Year </th>
                                                <th>Table No</th>
                                                {{-- <th>Section</th> --}}
                                                <th>Title</th>
                                                <th style=""> 
                                                    <label class="text-align: left"> Check All
                                                      <input type="checkbox" id="check_all" style="margin-top: 5px;">
                                                    </label>
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody id="pub_tables">
                                                {{-- @forelse($tables as $table)
                                                    <tr> 
                                                    <th>{{$table->year}}
                                                    <input type="hidden" name="sett_{{$table->table_id}}" id="sett_{{$table->table_id}}" value="{{$table->id}}"> </th>
                                                        <th>{{number_format($table->table_id, 0)}} </th>
                                                        <th>
                                                            @if($table->table_id >= 1 && $table->table_id <= 42) UPSTREAM 
                                                            @elseif($table->table_id >= 43 && $table->table_id <= 62) MIDSTREAM 
                                                            @elseif($table->table_id >= 63 && $table->table_id <= 76) DOWNSTREAM 
                                                            @elseif($table->table_id >= 77 && $table->table_id <= 98) HSE 
                                                            @elseif($table->table_id >= 99 && $table->table_id <= 99) REVENUE 
                                                            @endif
                                                        </th>
                                                        <th>{{$table->table_title}} </th>
                                                        <th style="text-align: left">
                                                            <input type="checkbox" class="check_tab" id="tab_{{number_format($table->table_id, 0)}}" name="tab_{{number_format($table->table_id, 0)}}" value="">
                                                        </th>  
                                                    </tr>
                                                @empty
                                                    <tr> <th colspan="6" style="text-align: center"> No Table Found </th> </tr>
                                                @endforelse --}}
                                            </tbody>
                                        </table>
                                    </div>
             
                                    <div class="form-group col-md-12" id="sbtn" 
                                        style="margin-top: 5px; text-align: right; padding-right: 0px; display: none;">
                                        <button type="reset" class="btn btn-warning">Clear</button>
                                        <button type="submit" name="settingBtn" id="settingBtn" class="btn btn-dark pull-right" onclick="return confirm('Are you sure you want to update NOGIAR Publication tables?')" style="margin-left: 5px"> Submit </button>
                                    </div>

                                </div> 

                                <div class="col-md-5" style="border: thin dotted #bbb">                                    
                                    <table class="table" border="0" style="width: 100%">
                                        <tr>
                                            <th style="width: 25%"><label for="year_sett" class="col-form-label pull-right"> Year </label></th>
                                            <th style="width: 45%">
                                            <input type="text" class="form-control year pull-left" value="" placeholder="Year" name="year" id="year_reset" required readonly></th>

                                            <th style="width: 30%">  
                                                <button type="button" id="saveUpBtn" class="btn btn-danger waves-effect waves-light pull-left no-print btn-sm pull-right" data-toggle="modal" data-target="#enable_save_uploadModal" style="margin-right: 5px;">Reset Publication Process </button>
                                            </h5> 
                                        </tr>
                                    </table>
                                </div>
                            </div> <!-- end row -->
                        </p>
                    </form>
                    </div>    
                    
                </div>

            <!-- Nav tabs -->
                
           

                


            @php
                // function getNumPagesInPDF($file) 
                // {
                //     if(!file_exists($file))return null;
                //     if (!$fp = @fopen($file, "r"))return null;
                //     $max = 0;
                //     while(!feof($fp)) 
                //     {
                //         $line = fgets($fp, 255);
                //         if (preg_match('/\/Count [0-9]+/', $line, $matches))
                //         {
                //             preg_match('/[0-9]+/', $matches[0], $matches2);
                //             if ($max < $matches2[0]) $max = $matches2[0];
                //         }
                //     }
                //     fclose($fp);
                //     return (int)$max;
                // }

                // function test($file)
                // {

                //     $r = [];

                //     // Parse pdf file and build necessary objects.
                //     $parser = new \Smalot\PdfParser\Parser();
                //     $pdf    = $parser->parseFile($file);
                     
                //     // Retrieve all pages from the pdf file.
                //     $pages  = $pdf->getPages();
                     
                //     // Loop over each page to extract text.
                //     foreach ($pages as $k=>$page) 
                //     {
                //         // echo $page->getText() . '<hr /><br />';
                //         $r[] = [
                //           'data'=>$page->getText(),
                //           'page'=>($k + 1)
                //         ];

                //     }

                //     // dd($r);
                //     return $r;

                // }

                // $file = public_path($pdf_path);
                // $r = test($file);

                // function test2($file)
                // {                        
                //     // Parse pdf file and build necessary objects.
                //     $parser = new \Smalot\PdfParser\Parser();
                //     $pdf    = $parser->parseFile($file);
                     
                //     // Retrieve all details from the pdf file.
                //     $details = $pdf->getDetails();
                     
                //     // Loop over each property to extract values (string or array).
                //     foreach ($details as $property => $value) 
                //     {
                //         if (is_array($value)) 
                //         {
                //             $value = implode(', ', $value);
                //         }
                //         echo $property . ' => ' . $value . "\n";
                //     }
                // }
            @endphp



          
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->













<!-- Adding Review for Publication modal -->
<form id="" action="{{url('/publication/nogiar/initPublication')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
      
    </div>
</form>





<!-- Notify Contributors -->
<form id="notifRemContForm" action="{{route('notify-remark-contributor')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div id="notifyModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header header_bg">
                    <h4 class="modal-title">Send Contributors Email Notification </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="year_notif" class="col-sm-12 col-form-label"> Year </label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control year" placeholder="Pick Year" name="year" id="year_notif" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="message" class="col-sm-12 col-form-label"> Message </label>
                        <div class="col-sm-12">
                            <textarea rows="5" class="form-control" name="message" id="message"></textarea>
                        </div>
                    </div>


                    <div class="modal-footer"> <center>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i>
                            Cancel
                        </button>
                        <button type="submit" name="notify_btn" id="notify_btn" class="btn btn-info">
                            <i class="fa fa-check"></i> Send
                        </button> </center>
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
                    <input type="hidden" class="form-control" name="year" id="year_enab" value="">
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






@endsection




<!-- INCLUDING modals-->
@include('publication.nogiar.add-script')




@endsection