@extends('layouts.app')

    @section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
    @endsection

@section('css')

<style>   
    .btn-dark
    {
        background-color: #202020; color:#fff; font-size: 13px !important; padding: 6px;
    }

    .btn-dark:hover
    {
        background-color: #fff; color:#202020!important; font-size: 13px !important; padding: 6px;
    }

    .btn-info
    {
        color:#fff !important; font-size: 13px !important;
    }

    .btn-info:hover
    {
        font-size: 13px !important; background: #eee; color: #202020 !important;
    }

    .btn-primary
    {
        color:#fff !important; font-size: 13px !important; padding: 6px;
    }

    .btn-primary:hover
    {
        font-size: 13px !important; padding: 6px; background: #eee; color: #202020 !important;
    }

    .btn-secondary
    {
        color:#fff !important; font-size: 13px !important; padding: 6px;
    }

    .btn-secondary:hover
    {
        font-size: 13px !important; padding: 6px; background: #eee; color: #202020 !important;
    }

    .btn-default
    {
        color:#fff !important; font-size: 13px !important; padding: 6px;
    }

    .btn-default:hover
    {
        font-size: 13px !important; padding: 6px;
    }

    .btn-light
    {
        background: transparent; color:#202020 !important; font-size: 13px !important; padding: 6px;
    }

    .btn-light:hover
    {
        background: #eee; color: #000; font-size: 13px !important; padding: 6px;
    }
</style>

@section('content')


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- Script to change the value of the clicked checkedbox  -->




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> PRIS Settings</h4> 
                
                <!-- <p class="text-muted m-b-30 font-14">Configure Application wide settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    @if(Auth::user()->role_obj->permission->contains('constant', 'add_users') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_users') )
                            <li class="nav-item nav-pad">
                                <a class="nav-link allUsers" data-toggle="tab" href="#use" role="tab" onclick="displayUsers()"> Users </a>
                            </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'add_roles') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_roles') )
                            <li class="nav-item nav-pad">
                                <a class="nav-link allRoles" data-toggle="tab" href="#rol" role="tab" onclick="displayRoles()">Roles</a>
                            </li>
                            <!-- <li class="nav-item nav-pad">
                                <a class="nav-link allSubRoles" data-toggle="tab" href="#subrol" role="tab" onclick="displaySubRoles()">Sub Roles</a>
                            </li>-->
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'assign_permission') )
                            {{-- <li class="nav-item nav-pad">
                                <a class="nav-link permission_category" data-toggle="tab" href="#perm_cate" role="tab" onclick="displayPermissionCategory()"> Permission Cat </a>
                            </li> --}}
                            <li class="nav-item nav-pad">
                                <a class="nav-link permission" data-toggle="tab" href="#perm" role="tab" onclick="displayPermission()"> Permission </a>
                            </li> 
                           
                            <li class="nav-item nav-pad">
                                <a class="nav-link assign_perm" data-toggle="tab" href="#assign" role="tab" onclick="displayAssignPermission()">Assign Permissions</a>
                            </li>
                    @endif

                    @if(\Auth::user()->role_obj->role_name == 'Admin' ||
                        \Auth::user()->role_obj->role_name == 'Head Planning' ||
                        \Auth::user()->role_obj->role_name == 'Head Downstream' ||
                        \Auth::user()->role_obj->role_name == 'Head E&S' ||
                        \Auth::user()->role_obj->role_name == 'Head Upstream' ||
                        \Auth::user()->role_obj->role_name == 'Head Gas' ||
                        \Auth::user()->role_obj->role_name == 'Head HSE'
                        )
                            <li class="nav-item nav-pad">
                                <a class="nav-link delegate_role" data-toggle="tab" href="#del" role="tab" onclick="displayDelegateRole()">Delegate Role</a>
                            </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'configure_notification') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#notif" role="tab">Notifications</a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_workflow') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_workflow') )

                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#workflow" role="tab">Workflow</a>
                            </li>
                            {{-- <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#assign_workflows" role="tab">Assign Workflows</a>
                            </li> --}}
                            <!-- 
                            <li class="nav-item nav-pad">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
                            </li> -->
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content"> 
                    <div class="tab-pane active p-3" id="perm_cate" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="permission_category">   

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="perm" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="permission">   

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="assign" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="assign_perm">   

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="use" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="allUsers">   

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="rol" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="allRoles">   

                            </div> <!-- end row -->                            
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="subrol" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="allSubRoles">   

                            </div> <!-- end row -->                            
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="del" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="delegate_role">   

                            </div> <!-- end row --> 
                        </p>
                    </div>




                    <div class="tab-pane" id="notif" role="tabpanel" style="padding: 0px !important">
                        <p class="font-14 mb-0">
                          <!-- Nav tabs -->
                            <ul class="nav nav-pills" role="tablist" style="padding: 3px 0px">
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link" data-toggle="tab" href="#set_email" role="tab"> Email Listing & Setup </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link" data-toggle="tab" href="#set_notif" role="tab"> Notification </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="set_email" role="tabpanel" style="padding: 0px !important">
                                    <p class="font-14 mb-0">
                                        <form id="elistForm" action="{{ route('add-email-list') }}" method="POST">
                                            @csrf
                                            <p class="font-14 mb-0">
                                                <div class="row" style="padding: 0px">
                                                    <div class="col-md-5 col-sm-6" style="border-right: thin dotted #aaa">
                                                        <h5> Add User To Email List </h5>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                            <label for="division_elist" class="col-form-label"> Sections </label>
                                                                <select class="form-control" name="division" id="division_elist" required>
                                                                    <option value=""> </option>
                                                                    <option value="UPSTREAM"> Upstream </option>
                                                                    <option value="MIDSTREAM"> Midstream </option>
                                                                    <option value="DOWNSTREAM"> Downstream </option>
                                                                    <option value="HSE"> HSE </option>
                                                                    <option value="Engineering and Standard"> Engineering and Standard </option>
                                                                    <option value="REVENUE"> Revenue </option>
                                                                    <option value="MASTER DATA"> Master Data </option>
                                                                </select>
                                                            <input type="hidden" class="form-control" name="elist_id" id="elist_id" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                            <label for="user_id_elist" class="col-form-label"> Users </label>
                                                                <select class="form-control" name="user_id" id="user_id_elist" required>
                                                                    <option value="">  </option>
                                                                        @forelse($email_users as $user)
                                                                            <option value="{{$user->id}}"> {{$user->name}} </option>
                                                                        @empty
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                            <label for="role_elist" class="col-form-label"> Role </label>
                                                                <select class="form-control" name="role" id="role_elist">
                                                                    <option value=""> </option>
                                                                    <option value="Custodian"> Custodian </option>
                                                                    <option value="APPROVER"> Approver </option>
                                                                    <option value="OTHERS"> Others </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                 
                                                      <div class="form-group col-md-12" style="text-align: right; padding-right: 0px">
                                                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                                        <button type="button" name="add_email_list" id="add_email_list" class="btn btn-dark pull-right" onclick="return confirm('Are you sure you want to add user to emailing list?')"> Add </button>
                                                      </div>

                                                    </div>

                                                    <div class="col-md-7 col-sm-6" style="border-left: thin dotted #aaa">
                                                        <h5 style=""> List of User  </h5>
                                                        <table class="table table-striped table-sm mb-0" id="elist_row">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>Section</th>
                                                                    <th>Users</th>
                                                                    <th>Roles</th>
                                                                    <th style="text-align: right;"> Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div> <!-- end row -->

                                                
                                                {{-- <div class="col-md-12" style="text-align: right; padding-right: 0px">
                                                    <button type="button" name="add_email_list" id="add_email_list" class="btn btn-info pull-right"> Submit </button>
                                                </div> --}}
                                            </p>
                                        </form>
                                    </p>
                                </div>
                                

                                <div class="tab-pane p-3" id="set_notif" role="tabpanel" style="padding: 0px !important">
                                    <p class="font-14 mb-0">
                                        <form id="notifForm" action="{{route('admin.add_notification')}}" method="POST">
                                            @csrf
                                         
                                            <h5 style="margin-left: 5px; color: #aaa"> Configure PRIS Notification
                                                <button data-toggle="tooltip" type="submit" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px; margin-right: 10px" class="btn btn-info btn-sm pull-right" data-original-title="Submit Details" onclick="return confirm('Are you sure you want to UPDATE Notification Details?')">  <i class="fa fa-check"></i> </button>
                                            </h5>

                                            <table class="table" width="100%">
                                                <tr>
                                                    <td width="20%">
                                                      <label for="report_name" class="col-sm-12 col-form-label" style="padding: 5px 0px"> Data Upload Name </label>
                                                        <select class="form-control" name="report_name" id="report_name" required="">
                                                          <option value=""> Select Data Upload Name </option>
                                                            @if(count($pris_reports)>0)
                                                                @foreach($pris_reports as $pris_report)
                                                                    <option value="{{$pris_report->id}}">{{$pris_report->report_name}}</option>
                                                                @endforeach
                                                            @endif
                                                      </select>

                                                      <label for="report_custodian" class="col-sm-12 col-form-label" style="padding: 5px 0px"> Data Custodian </label>
                                                      <select class="form-control" name="report_custodian" id="report_custodian" required="">
                                                          <option value=""> Select Data Custodian </option>
                                                            @if(count($custodian)>0)
                                                                @foreach($custodian as $custodian)
                                                                    <option value="{{$custodian->id}}">{{$custodian->name}}</option>
                                                                @endforeach
                                                            @endif
                                                      </select>
                                                        <input type="hidden" class="form-control" name="report_custodian_email" id="report_custodian_email">
                                                    </td>
                                                    <td width="20%">
                                                      <label for="uploaded_every" class="col-sm-12 col-form-label" style="padding: 5px 0px"> Frequency </label>
                                                        <select class="form-control" name="uploaded_every" id="uploaded_every" required="">
                                                            <option value=""> Select When to Upload </option>
                                                            <option value="0">Base Data</option>
                                                            <option value="1">Annually</option>
                                                            <option value="2">Bi-Annual</option>
                                                            <option value="3">Quaterly</option>
                                                            <option value="4">Monthly</option>
                                                            <option value="5">Weekly</option>
                                                            <option value="6">Daily</option>
                                                      </select>

                                                      <label for="report_manager" class="col-sm-12 col-form-label" style="padding: 5px 0px"> Data Manager/Approver </label>
                                                      <select class="form-control" name="report_manager" id="report_manager" required="">
                                                          <option value=""> Select Data Manager - Approver </option>
                                                            @if(count($managers)>0)
                                                                @foreach($managers as $managers)
                                                                    <option value="{{$managers->id}}">{{$managers->name}}</option>
                                                                @endforeach
                                                            @endif
                                                      </select>
                                                        <input type="hidden" class="form-control" name="report_manager_email" id="report_manager_email">
                                                    </td>
                                                    <td width="20%">
                                                      <label for="month" class="col-sm-6 col-form-label" style="padding: 5px 0px"> Month To Upload </label>
                                                      <input type="text" class="form-control" placeholder="Month To Upload Data" name="month" id="month"> 
                                                      <label for="date" class="col-sm-6 col-form-label" style="padding: 5px 0px"> Date To Upload </label>
                                                      <select class="form-control" name="date" id="date" required="">
                                                        <option value="">Select Date</option>
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>
                                                        <option value="8">08</option>
                                                        <option value="9">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="20">30</option>
                                                        <option value="31">31</option>
                                                      </select>  

                                                      <input type="number" class="form-control" placeholder="Remind Me In" name="notification_reminder" id="notification_reminder" style="display: none;">
                                                      
                                                    </td>
                                                    <td width="40%">
                                                        <label for="message" class="col-sm-12 col-form-label" style="padding: 5px 0px"> Messages </label>
                                                        <textarea rows="4" class="form-control" name="message" id="message" required=""></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        
                                        </form>
                                    </p>
                                </div>                                           
                            </div>
                        </p>
                    </div>

                    








                    <div class="tab-pane p-3" id="workflow" role="tabpanel" style="padding: 0px!important">
                        <p class="font-14 mb-0">
                            <div class="table-responsive">   
                                <h5 style="margin-left: 5px; color: #aaa"> Manage All Workflows
                                    
                                </h5>
                                    <table class="table table-striped table-sm mb-0" id="workflow_table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Workflow Name</th>
                                            <th>Stages</th>
                                            <th>Created On</th>
                                            <th style=""> 
                                                <a data-toggle="tooltip" onclick="showmodal('add_workflow')" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px;" class="btn btn-dark btn-sm pull-right" data-original-title="Add New Workflow Her">  <i class="fa fa-plus"></i> </a>
                                            </th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            @if($workflows)
                                            @php
                                            $sn=1;
                                                @endphp
                                                    @foreach($workflows as $workflow)
                                                        <tr>  
                                                            <th>{{$workflow->id}}</th>
                                                            <th>{{$workflow->name}}</th>
                                                            <th>{{$workflow->stages->count()}}</th>    
                                                            <th>{{\Carbon\Carbon::parse($workflow->created_at)->diffForHumans()}}</th>    
                                                            <th>
                                                                <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_workflows({{$workflow->id}})" class="btn-sm pull-right" title="Edit Workflow"> <i class="fa fa-pencil"></i>  </a>
                                                            </th>  
                                                        </tr>
                                                        @php
                                                            $sn++;
                                                        @endphp
                                                    @endforeach
                                                @endif
                                        </tbody>
                                    </table>
                                    {{$workflows->render()}} 
                            </div> <!-- end col -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="assign_workflows" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="table-responsive">   
                                <h5 style="margin-left: 5px; color: #aaa"> Assign Workflows
                                    
                                </h5>
                                    <table class="table table-striped table-sm mb-0" id="workflow_tables">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Module</th>
                                            <th>Workflow</th>
                                            <th>Updated On</th>
                                            <th style="text-align: right">Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                           {{--  @if($wf_settings)
                                            @php
                                                $sn=1;
                                            @endphp
                                                @foreach($wf_settings as $setting)
                                                    <tr>  
                                                        <th>{{strtoupper($setting->module)}}</th>
                                                        <th>{{$setting->workflow?$setting->workflow->name:'None Assigned'}}</th>  
                                                        <th>{{\Carbon\Carbon::parse($workflow->updated_at)->diffForHumans()}}</th>    
                                                        <th>
                                                            <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_wf_settings({{$setting->id}})" class="btn-sm pull-right" title="Change Workflow"> <i class="fa fa-pencil"></i>  </a>
                                                        </th>  
                                                    </tr>
                                                    @php
                                                        $sn++;
                                                    @endphp
                                                @endforeach
                                            @endif --}}
                                        </tbody>
                                    </table>
                                     
                            </div> <!-- end col -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="messages" role="tabpanel">
                        <p class="font-14 mb-0">
                            Configure messages here.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
</div>









<!-- Add Permission Category modal -->
<div id="add_perm_cate" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Permission Category </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
          <form id="cateForm" action="{{url('/admin/add_permission_category')}}" method="POST">
                <input type="hidden" name="token" id="token" value="{{csrf_token()}}">


              <div class="form-group row">
                <label for="category_name" class="col-sm-2 col-form-label"> Category </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Category Name" name="category_name" id="category_name" required="">
                </div>
              </div>


             <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label"> Description </label>
                <div class="col-sm-10">
                    <textarea rows="3" class="form-control" placeholder="Category Description" name="description" id="description" required=""></textarea>
                </div>
            </div>



            <div class="modal-footer" id="add_footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Permission Category </button>
            </div>
        </form>
     </div>
    </div>
   </div>  
</div>



<!-- Edit Permission Category modal -->
<div id="edit_perm_cate" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Permission Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="editpermcate"> </div>
        </div>
    </div>
 </div>  
</div>




<!-- Add Permission modal -->
<div id="add_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4 class="modal-title">Add Permission </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
          <form id="permForm" action="{{url('/admin/add_permission')}}" method="POST">
                <input type="hidden" name="token" id="token" value="{{csrf_token()}}">


                <div class="form-group row">
                    <label for="permission_category_id" class="col-sm-2 col-form-label"> Category </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="permission_category_id" id="permission_category_id" required>
                            <option value=""> Select Permission Category </option>
                                @if(count($perm_category)>0)
                                    @foreach($perm_category as $perm_category)
                                        <option value="{{$perm_category->id}}">{{$perm_category->category_name}}</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                </div> 


              <div class="form-group row">
                <label for="permission_name" class="col-sm-2 col-form-label"> Permission </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Permission Name" name="permission_name" id="permission_name" required="">
                </div>
              </div>


             <div class="form-group row">
                <label for="constant" class="col-sm-2 col-form-label"> Constant </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Constant" name="constant" id="constant" required="">
                </div>
            </div>



            <div class="modal-footer" id="add_footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Permission </button>
            </div>
        </form>
     </div>
    </div>
   </div>  
</div>



<!-- Edit Permission modal -->
<div id="edit_perm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Permission </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="editperm"> </div>
        </div>
    </div>
 </div>  
</div>








<!-- ADD NEW USER MODAL -->

    <div id="adduser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header header_bg">  <h4 class="modal-title"> <i class="fa fa-user"></i> Create New User </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
        </div>
        <div class="modal-body">       
        

        <!-- Begin page -->

            <div class="p-3">
                <form id="userForm" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{route('admin.add_users')}}">
                <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                
                <input type="hidden" name="date_u" id="date_u" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Email </label>
                        <div class="col-10">
                            <input class="form-control" type="email" required="" placeholder="Email" name="email" id="email" focused>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Fullname </label>
                        <div class="col-10">
                            <input class="form-control" type="text" required="" placeholder="Fullname" name="name" id="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Password </label>
                        <div class="col-10">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label"> Roles </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="role" id="role" required>
                                <option value=""> Select Role </option>
                                    @if(count($roles)>0)
                                        @foreach($roles as $roles)
                                            <option value="{{$roles->id}}">{{$roles->role_name}}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>  

                    {{-- <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label font-weight-normal" for="customCheck1">I accept 
                                    <a href="#" class="text-muted">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                   
                </form>
            </div>

             


    
  

        </div>
        </div>

        </div>
        </div>
        






<!-- Edit NEW USER modal -->
<div id="edituser" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4> Edit USER </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div id="edit_user">

             </div>
        </div>
    </div>
    </div>  
</div>





<!-- De activate Reactivate User Confirm Modal -->


  <!-- Deactivate User modal -->
<form id="" action="{{url('admin/deactivateUser')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div id="deact_user" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header app_modal_bg">
                <span class="modal-title"><h3>Confirm Action?</h3></span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>

              <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-12 col-form-label"> 
                    <span class="modal-title" style="text-align: center"><h4> Are You Sure You Want To Deactivate User?</h4></span> </label>
                </div> 
              </div>

                            
                <div class="modal-footer">
                  <table class="table" style="width: 100%">
                    <tr>
                      <td style="width: 50%"><button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="noBtn"> <i class="fa fa-remove"></i> No</button></td>
                      <td style="width: 50%"><button type="submit" name="yesBtn" id="yesBtn" class="btn btn-success pull-left"> <i class="fa fa-check"></i> Yes </button></td>
                    </tr>
                  </table> 
                </div>
            </div>
    </div>  
</div>
</form>


  <!-- Reactivate User modal -->
<form id="" action="{{url('admin/reactivateUser')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div id="react_user" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
              <div class="modal-header app_modal_bg">
                <span class="modal-title"><h3>Confirm Action?</h3></span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>

              <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-12 col-form-label"> 
                    <span class="modal-title" style="text-align: center"><h4> Are You Sure You Want To Re-activate User?</h4></span> </label>
                </div> 
              </div>

                            
                <div class="modal-footer">
                  <table class="table" style="width: 100%">
                    <tr>
                      <td style="width: 50%"><button type="button" class="btn btn-danger pull-right" data-dismiss="modal" id="noBtn"> <i class="fa fa-remove"></i> No</button></td>
                      <td style="width: 50%"><button type="submit" name="yesBtn" id="yesBtn" class="btn btn-success pull-left"> <i class="fa fa-check"></i> Yes </button></td>
                    </tr>
                  </table> 
                </div>
            </div>
    </div>  
</div>
</form>






<!-- Add Role modal -->
<div id="addrole" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Role</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          <form id="roleForm" action="{{url('/admin/add_roles')}}" method="POST">
           <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_rol" id="date_rol" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


              <div class="form-group row">
                <div class="col-sm-12" style="padding-left: 0px">
                    <label for="role_name" class="col-sm-12 col-form-label"> Role Name </label>
                </div>
                <div class="col-sm-12">
                    <input type="text" class="form-control" placeholder="Role Name" name="role_name" id="role_name" required>
                </div>
              </div>


              <div class="form-group row">
                <div class="col-sm-12" style="padding-left: 0px">
                    <label for="description" class="col-sm-12 col-form-label"> Description </label>
                </div>
                <div class="col-sm-12">
                    <textarea rows="3" class="form-control" placeholder="Role Description" name="description" id="description" required></textarea>
                </div>
              </div>

          

          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rol_btn" id="add_rol_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Role </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Roles modal -->
<div id="editrole" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Roles</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_role">  </div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Roles modal -->
<div id="uplrole" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Role Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{route('admin.upload_roles')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="button" value="Upload File" class="btn btn-info pull-left" />
                    <input type="button" value="Download Excel Template" class="btn btn-default pull-right" />
                </form>
        </div>
    </div>
    </div>  
</div>




{{-- <!-- Add Sub Role modal -->
<div id="addsubrole" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Sub Role</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          <form id="subroleForm" action="{{url('/admin/add_sub_roles')}}" method="POST">
           <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_rol" id="date_rol" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


         <div class="form-group row">
            <label for="role_id" class="col-sm-3 col-form-label"> Role </label>
            <div class="col-sm-9">
                <select class="form-control" name="role_id" id="role_id" required>
                    <option value=""> Select Role </option>
                    @if(count($sub_role)>0)
                        @foreach($sub_role as $sub_role)
                            <option value="{{$sub_role->id}}">{{$sub_role->role_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 


          <div class="form-group row">
            <label for="sub_role_name" class="col-sm-3 col-form-label"> Sub Role Name </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Sub Role Name" name="sub_role_name" id="sub_role_name" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label"> Description </label>
            <div class="col-sm-9">
                <textarea rows="2" class="form-control" placeholder="Role Description" name="description" id="description" required></textarea>
            </div>
          </div>

          

          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_rol_btn" id="add_rol_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Sub Role </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>



<!-- Edit Sub Roles modal -->
<div id="editsubrole" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Sub Roles</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="edit_sub_role">  </div>
          </div>
    </div>
    </div>  
</div>


<!-- Upload Roles modal -->
<div id="uplsubrole" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Sub Role Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
                <form action="{{route('admin.upload_sub_roles')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="button" value="Upload File" class="btn btn-info pull-left" />
                    <input type="button" value="Download Excel Template" class="btn btn-default pull-right" />
                </form>
        </div>
    </div>
    </div>  
</div>
 --}}







{{-- add workflow modal --}}
<div id="add_workflow" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Workflow</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>

          <div class="modal-body">
          <form id="wfForm" action="{{url('/workflows')}}" method="POST">
          @csrf
           <input type="hidden" name="date_wf" id="date_wf" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="wfname" name="wfname" placeholder="">
          </div>

          <div class="panel  panel-info panel-line">
              <div class="panel-heading ">
                <h3 class="panel-title">Stage Details</h3>
              </div>

              <div class="panel-body">
                <ul id="stgcont" style="padding: 0px">
                  
                </ul>
                <button type="button" id="addStage" name="button" class="btn btn-dark">New Stage</button>
              </div>
          </div>
          <input type="hidden" value="workflow" name="type">
 
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_wf_btn" id="add_wf_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Workflow </button>
          </div>
          </form>
        </div>
    </div>
    </div>  
</div>


<!-- Edit workflow settings modal -->
<div id="edit_wfsetting" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Modify Module Workflow</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <div id="editwfsetting">  </div>
          </div>
    </div>
    </div>  
</div>





{{-- edit workflow modal --}}

<div id="edit_workflow" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header_bg">
        <h4> Edit Workflow </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
           <div id="editworkflow"> </div>
        </div>
    </div>
 </div>  
</div>














@endsection

@section('script')







<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{
    if(tableId == 'perm_cate_table')
    {   
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th> <th> '+data.category_name+' </th>  <th> '+data.description+' </th>  <th> <a href="#" class="pull-right" title="Remove '+data.category_name+' Details" data-toggle="tooltip">   <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>  </a> <a href="#" class="pull-right" title="Edit '+data.category_name+' Details" onclick="load_permission_category('+data.id+')">  <i class="fa fa-pencil text-inverse m-r-10"></i>   </a></th>   </tr>'); 
    }

    else if(tableId == 'perm_table')
    {   
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th> <th> '+data.category+' </th>  <th> '+data.permission_name+' </th>  <th> '+data.constant+' </th> <th> <a href="#" class="pull-right" title="Remove '+data.permission_name+' Details" data-toggle="tooltip">   <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>  </a> <a href="#" class="pull-right" title="Edit '+data.permission_name+' Details" onclick="load_permission('+data.id+')">  <i class="fa fa-pencil text-inverse m-r-10"></i>   </a></th>   </tr>'); 
    }

    else if(tableId == 'user_table')
    {   
        var _date = document.getElementById('date_u').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th> <th> '+data.name+' </th>  <th> '+data.email+' </th>  <th> '+data.role+' </th>  <th> '+_date+' </th>   <th> <a href="#" class="pull-right" title="Edit '+data.name+' Details" data-toggle="modal">   <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>  </a> <a href="#" class="pull-right" title="Edit '+data.name+' Details" onclick="load_users('+data.id+')">  <i class="fa fa-pencil text-inverse m-r-10"></i>   </a></th>   </tr>'); 
    }

    else if(tableId == 'role_table')
    {   
        var _date = document.getElementById('date_rol').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th> <th> '+data.role_name+' </th> <th> '+data.description+' </th>  <th> '+_date+' </th>   <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_roles('+data.id+')" class="btn-sm pull-right" title="Edit Roles"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>'); 
    }

    else if(tableId == 'sub_role_table')
    {   
        var _date = document.getElementById('date_rol').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th> <th> '+data.role+' </th> <th> '+data.sub_role_name+' </th> <th> '+data.description+' </th>  <th> '+_date+' </th>   <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_sub_roles('+data.id+')" class="btn-sm pull-right" title="Edit Sub Roles"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>'); 
    }

    else if(tableId == 'workflow_table')
    {   
        var _date = document.getElementById('date_wf').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th> <th> '+data.name+' </th> <th> '+data.stages_count+' </th>  <th> '+data.date+' </th>   <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_workflows('+data.id+')" class="btn-sm pull-right" title="Edit Workflow"> <i class="fa fa-pencil"></i>    </a>  </th>   </tr>'); 
    }
}

//function to process form data
function processForm(formid, route, tableId, progress, modalid)
{

   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token','{{csrf_token()}}');
  
    $.ajax(
    {
        // Your server script to process the upload
        url: route,
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data, status, xhr)
        {
            if(data.status=='ok')
            {
                appendTable(data.message,tableId);
                $('#'+modalid).modal('hide');
                toastr.success(data.info, {timeOut:10000});
                return;
                alert(data.info);
            }
           
            return toastr.error(data.info, {timeOut:10000});
                alert(data.info);

        },
        // Custom XMLHttpRequest
        xhr: function() 
        {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) 
            {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) 
                {
                    if (e.lengthComputable) 
                    {
                        percent=Math.round((e.loaded/e.total)*100,2);
                        $('#'+progress).css('width',percent+'%');
                        $('#'+progress+'_text').text(percent+'%');
                    }
                }, false);
            }
            return myXhr;
        }
    });


}


//function to process form data
function editForm(formid, route, modalid)
{

   formdata= new FormData($('#'+formid)[0]);
   formdata.append('_token','{{csrf_token()}}');
  
    $.ajax(
    {
        // Your server script to process the upload
        url: route,
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data, status, xhr)
        {
            $('#'+modalid).modal('hide');
            toastr.success('Success, Record Has Been Updaded', {timeOut:10000});
           
            //return toastr.error(data.info, {timeOut:10000});
        },
    })

}






    $(function()
    {  
         //Permission Category 
        $("#cateForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('cateForm', "{{url('/admin/add_permission_category')}}", 'perm_cate_table', 'progressUser', 'add_perm_cate');
        });

         //Permission Category 
        $("#permForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('permForm', "{{url('/admin/add_permission')}}", 'perm_table', 'progressUser', 'add_perm');
        });

        //USER 
        $("#userForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('userForm', "{{url('/admin/add_users')}}", 'user_table', 'progressUser', 'adduser');
        });

        //ROLE
        $("#roleForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('roleForm', "{{url('/admin/add_roles')}}", 'role_table', 'progressRole', 'addrole');
        });

        //NOTIFY
        $("#notifForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('notifForm', "{{url('/admin/add_notification')}}", 'notify_table', 'progressNotify', 'add_notify');
        });

        $("#wfForm").on('submit',function(e)
        { 
            e.preventDefault();
            processForm('wfForm', "{{url('/workflows')}}", 'workflow_table', 'progressWorkflow', 'add_workflow');
        });


    });
</script>



<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_permission_category(id)
    {   
        $('#editpermcate').load("{{url('admin')}}/modals/editPermissionCategory?id="+id);
        $('#edit_perm_cate').modal('show');
    }

    function load_permission(id)
    {   
        $('#editperm').load("{{url('admin')}}/modals/editPermission?id="+id);
        $('#edit_perm').modal('show');
    }

    function load_users(id)
    {   
        $('#edit_user').load("{{url('admin')}}/modals/editUsers?id="+id);
        $('#edituser').modal('show');
    }

    function load_roles(id)
    {   
        $('#edit_role').load("{{url('admin')}}/modals/editRoles?id="+id);
        $('#editrole').modal('show');
    }

    function load_sub_roles(id)
    {   
        $('#edit_sub_role').load("{{url('admin')}}/modals/editSubRoles?id="+id);
        $('#editsubrole').modal('show');
    }
     function load_workflows(id)
    {   
        $('#editworkflow').load("{{url('workflows')}}/editWorkflows?id="+id);
        $('#edit_workflow').modal('show');
    }
     function load_wf_settings(id)
    {   
        $('#editwfsetting').load("{{url('workflows')}}/editWfSettings?id="+id);
        $('#edit_wfsetting').modal('show');
    }
</script>









    



<!-- CHECK ALL PERMISSION CHECKBOX -->
<script>

    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }


    $(function()
    {
        $('#selectall').on('change', function()
        {
            if(this.checked) // if changed state is "CHECKED"
            {
                $('.checkall').each(function() 
                {
                    this.checked = true;
                });
                //Check all to 1
                $('.all').val(1);
            }
            else// if changed state is "UN CHECKED"
            {
                $('.checkall').each(function() 
                {
                    this.checked = false;
                });
                //Check all to 0
                $('.all').val(0);
            }
        });

        $('#role_id').on('change', function()
        {
            $('#role').val(this.value);
        });


        $('#month').datepicker(
        {
          autoclose: true, format: "MM",
          viewMode: "months", 
          minViewMode: "months"
      })

    });
</script>




        
<!-- AJAX FUNCTIONALITY TO CHECK PERMISSION ALREADY ASSIGNED TO THE SELECTED ROLE --> 





        
<!-- AJAX FUNCTIONALITY for Notification --> 
<script>
    $(function()
      {
        $('#report_name').change(function(e)
        { 
          var report_name = $(this).val();  
              //$('select option:selected').removeAttr('selected');
              $('#id').val('');
              $('#uploaded_every').get(0).selectedIndex = 0;
              $('#month').val('');
              $('#date').get(0).selectedIndex = 0;
              $('#report_custodian').get(0).selectedIndex = 0;
              $('#report_manager').get(0).selectedIndex = 0;
              $('#report_custodian_email').val('');
              $('#report_manager_email').val('');
              $('#message').val('');
              $('#notification_reminder').val('');

          $.get('{{url('getNotificationDetails')}}?report_name=' +report_name, function(data)
          {  
            $.each(data, function(index, notifyObj)
            { 
              //UPLOAD
              $('#id').val(notifyObj.id);
              $('#uploaded_every').val(notifyObj.uploaded_every);
              $('#month').val(notifyObj.month);
              $('#date').val(notifyObj.date);
              $('#notification_reminder').val(notifyObj.notification_reminder);
              $('#report_custodian').val(notifyObj.report_custodian);
              $('#report_custodian_email').val(notifyObj.report_custodian_email);
              $('#report_manager').val(notifyObj.report_manager);
              $('#report_manager_email').val(notifyObj.report_manager_email);
              $('#message').val(notifyObj.message);
            });
          });       
        });

        $('#uploaded_every').change(function(e)
        { 
          var reminder = $(this).val();     
               if(reminder == 0){ rem = 0 }
          else if(reminder == 1){ rem = 30 }
          else if(reminder == 2){ rem = 15 }
          else if(reminder == 3){ rem = 10 }
          else if(reminder == 4){ rem = 5 }
          else if(reminder == 5){ rem = 2 }
          else if(reminder == 6){ rem = 1 }
             //console.log(rem);
          //UPLOAD
          $('#notification_reminder').val(rem);
                           
        });


        //getting CUSTODIAM EMAIL
        $('#report_custodian').change(function(e)
        { 
          var report_custodian = $(this).val();   //alert(report_custodian);
          $.get('{{url('getReportCustodianEmail')}}?report_custodian=' +report_custodian, function(data)
          {  //success data
            $.each(data, function(index, emailObj)
            {
              
              $('#report_custodian_email').val(emailObj.email);
            });
          });       
        });

        //getting MANAGER EMAIL
        $('#report_manager').change(function(e)
        { 
          var report_manager = $(this).val();   //alert(report_manager);
          $.get('{{url('getReportManagerEmail')}}?report_manager=' +report_manager, function(data)
          {  //success data
            $.each(data, function(index, emailObj)
            { 
              
              $('#report_manager_email').val(emailObj.email);
            });
          });       
        });

      });



     //Adding Emailing List
     $(function()
     {
        //add users
        $('#add_email_list').on('click', function(e)
        {     
            e.preventDefault();      
            elist_id = $('#elist_id').val();
            division = $('#division_elist').val();
            user_id = $('#user_id_elist').val();
            role = $('#role_elist').val();

            if(user_id != '')
            {
                formData = 
                {
                    elist_id:elist_id,
                    division:division,
                    user_id:user_id,
                    role:role,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('add-email-list')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {                        
                        $('._row').remove();  var division = $('#division_elist').val();
                        $.get('{{url('getEmailListing')}}?division=' +division, function(data)
                        {  
                            $.each(data, function(index, User)
                            {   
                                $('#elist_row').append('<tr class="_row row_'+User.id+'">  <th> '+User.division+' </th>  <th> '+User.user.name+' </th>  <th> '+User.role+' </th> <th>  <a onclick="removeUser('+User.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  <a onclick="editUser('+User.id+')" href="#" style="cursor: pointer; color:#177245; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right editBtn" title="Edit User Record"> <i class="fa fa-pencil"></i>    </a> </th>   </tr>');
                            });
                        });    

                        $('#division_elist').val(0) 
                        $('#user_id_elist').val(0) 
                        $('#role_elist').val(0) 

                        toastr.success(data.message);
                    }
                    else{  toastr.error(data.message);  }
                    
                })
            }
            else
            {
                toastr.warning('Sorry, no user was selected, please select a user to add', {timeOut:100000});
            }            

        });



        //AJAX SCRIPT TO GET USERS FOR EMAILING LIST
        $('#division_elist').change(function(e)
        {  
            var division = $(this).val();
            $("#elist_id").val('');      
            $('._row').remove();
            $('#user_id_elist').val(0) 
            $('#role_elist').val(0) 

            $.get('{{url('getEmailListing')}}?division=' +division, function(data)
            {  
                $.each(data, function(index, User)
                {   
                    $('#elist_row').append('<tr class="_row row_'+User.id+'">  <th> '+User.division+' </th>  <th> '+User.user.name+' </th>  <th> '+User.role+' </th> <th>  <a onclick="removeUser('+User.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  <a onclick="editUser('+User.id+')" href="#" style="cursor: pointer; color:#177245; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right editBtn" title="Edit User Record"> <i class="fa fa-pencil"></i>    </a> </th>   </tr>');
                });
            });
        });
    });





    function removeUser(id)
    { 
        if(confirm('Are you sure you want to remove this user?'))
        { 
            formData = 
            {
                id:id,
                _token:'{{csrf_token()}}'
            }
            $.post('{{url('/admin/remove-user')}}', formData, function(data, status, xhr)
            {  //success data
                if(data.status=='success')
                {    
                    $('._row').remove();
                    var division = $('#division_elist').val();    
                    $.get('{{url('getEmailListing')}}?year=' +division, function(data)
                    {  
                        $.each(data, function(index, User)
                        { 
                            $('#init_row').append('<tr class="_row row_'+User.id+'">  </th>  <th> '+User.division+' </th>  <th> '+User.user.name+' </th>  <th> '+User.role+' </th>  <th>  <a onclick="removeUser('+User.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  </th>   </tr>');
                        });
                    });

                    toastr.success(data.message); 
                }
                else{ toastr.error(data.message); }
            });  
        }  
    }



    function editUser(id)
    { 
        $(function()
        {
            var division = $('#division_elist').val();   
            $.get('{{url('getEmailUsersById')}}?id=' +id, function(data)
            {                 
                $("#elist_id").val(id);
                $("#division_elist").prop('value', data.division);
                $("#user_id_elist").prop('value', data.user_id);
                $("#role_elist").prop('value', data.role);
            });
        }); 
                  
    }
        
</script> 







<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>

    function displayPermissionCategory()
    {
        $('#permission_category').load('{{url('ajax')}}/permission_category');
        sessionStorage.setItem('name', 'permission_category'); 
    }

    function displayPermission()
    {
        $('#permission').load('{{url('ajax')}}/permission');
        sessionStorage.setItem('name', 'permission'); 
    }

    function displayAssignPermission()
    {
        $('#assign_perm').load('{{url('ajax')}}/assign_perm');
        sessionStorage.setItem('name', 'assign_perm'); 
    }

    function displayUsers($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/allUsers?q='+$search+'&excel=excel');
        $('#allUsers').load('{{url('ajax')}}/allUsers?q='+$search);
        sessionStorage.setItem('name', 'allUsers');
    }

    function displayRoles($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/allRoles?q='+$search+'&excel=excel');
        $('#allRoles').load('{{url('ajax')}}/allRoles?q='+$search);
        sessionStorage.setItem('name', 'allRoles');
    }

    function displaySubRoles($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/allSubRoles?q='+$search+'&excel=excel');
        $('#allSubRoles').load('{{url('ajax')}}/allSubRoles?q='+$search);
        sessionStorage.setItem('name', 'allSubRoles');
    }

    function displayDelegateRole()
    {
        $('#delegate_role').load('{{url('ajax')}}/delegate_role');
        sessionStorage.setItem('name', 'delegate_role'); 
    }
   
      


    function resolveLoad()
    {

        switch (sessionStorage.getItem('name'))
        {
            case 'permission_category':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'permission':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'assign_perm':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'allUsers':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'allRoles':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'allSubRoles':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            case 'delegate_role':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;



            default:
                  $('allUsers').trigger('click');
                  break; 
        }
       
    }

    $(function()
    {     
        resolveLoad();                
    }); 










     

    //workflow script
   $(document).ready(function() 
   {
        //add stage 
        var stgcont = $('#stgcont');
        var i = $('#stgcont li').length + 1;

        $('#addStage').on('click', function() 
        {           
          //console.log('working');
            $(' <li style="list-style:none;"> <div class="form-cont">  <div class="form-group row"> <label for="" class="col-sm-1 col-form-label">Name</label> <div class="col-sm-5"> <input type="text" class="form-control" name="stagename[]" id="" placeholder="" required>   </div>  <label for="" class="col-sm-1 col-form-label">Type</label> <div class="col-sm-5">        <select class="form-control select-type " name="wftype[]" > <option value="1">User</option> <option value="2">Role</option>   </select> </div> </div> <div class="form-group users-div"> <label for="" class="col-form-label">Users</label> <select class="form-control users" name="user_id[]" > @forelse ($users as $user)  <option value="{{$user->id}}">{{$user->name}}</option> @empty <option value="">No Users Created</option> @endforelse </select> </div>  <div class="form-group roles-div"> <label for="" class="col-form-label">Roles</label> <select class="form-control roles" name="role[]" >  @forelse ($wfroles as $role) <option value="{{$role->id}}">{{$role->role_name}}</option> @empty <option value="">No Roles Created</option> @endforelse </select> </div>  <div class="form-group"> <button type="button" class="btn btn-danger " id="remStage">Remove Stage</button> </div>  </div> </li>').appendTo(stgcont);
            //console.log('working'+i);
            $('#stgcont li').last().find('.roles-div').hide();
            $('#stgcont li').last().find('.roles-div').find('.roles').attr("disabled",true);
            i++;
            return false;
        });

        $(document).on('click',"#remStage",function() 
        {
            //console.log('working'+i);
            if( i > 1 ) 
            {
                console.log('working'+i);
                $(this).parents('li').remove();
                i--;
            }
            return false;
        });
        //end of add stage

        //edit stage
        var estgcont = $('#estgcont');
        var i = 0;

         $(document).on('click',"#eaddStage",function() 
         {
           
        estgcont = $('#estgcont');
        i = $('#estgcont li').length + 1;

            console.log('working');
            $(' <li style="list-style:none;"><div class="form-cont" > <div class="form-group"> <label for="">Name</label> <input type="text" class="form-control" name="stagename[]" id="" placeholder="" required> </div><div class="form-group type"> <label for="">Type</label> <select class="form-control select-type " name="wftype[]" >  <option value="1">User</option> <option value="2">Role</option> </select> </div> <div class="form-group users-div"> <label for="">Users</label> <select class="form-control users" name="user_id[]" > @forelse ($users as $user) <option value="{{$user->id}}">{{$user->name}}</option> @empty <option value="">No Users Created</option> @endforelse </select> </div> <div class="form-group roles-div"> <label for="">Roles</label> <select class="form-control roles" name="role[]" >   @forelse ($wfroles as $role) <option value="{{$role->id}}">{{$role->role_name}}</option> @empty <option value="">No Roles Created</option> @endforelse </select> </div> <div class="form-group"> <button type="button" class="btn btn-danger " id="eremStage">Remove Stage</button> </div> </div> </li>').appendTo(estgcont);
            //console.log('working'+i);
            $('#estgcont li').last().find('.roles-div').hide();
            $('#estgcont li').last().find('.roles-div').find('.roles').attr("disabled",true);
            i++;
            return false;
        });

        $(document).on('click',"#eremStage",function() 
        {
            // console.log('working'+i);
            if( i > 1 ) 
            {
               // console.log('working'+i);
                $(this).parents('li').remove();
                i--;
            }
            return false;
        });
        //end of edit stage 
        $(document).on('change',".select-type",function() 
        {
         
          if (this.value==2)
            {
                $(this).parents('li').find('.users-div').find('.users').attr("disabled",true);
                $(this).parents('li').find('.users-div').hide();
                $(this).parents('li').find('.roles-div').find('.roles').removeAttr("disabled");
                $(this).parents('li').find('.roles-div').show();
            } 
            if (this.value==1)
            {             
                $(this).parents('li').find('.roles-div').find('.roles').attr("disabled",true);
              
                $(this).parents('li').find('.users-div').find('.users').removeAttr("disabled");
                $(this).parents('li').find('.users-div').show();
                $(this).parents('li').find('.roles-div').hide(); 
            }          
            
          });    
    }); 


    

</script>



<script>
    $(function()
    {    
        $('input[type=checkbox]').click(
        function () 
        {
            var id = this.id; //retrieving the clicked id of the checkedbox
            id = id += 's';  
            var val = document.getElementById(id).value;
            if(val == 0){ document.getElementById(id).value = '1'; }
            else if(val == 1){ document.getElementById(id).value = '0'; }
        });



       ///
       @if (session()->has('del'))
      
        $('#{{ session()->del }}').trigger('click');
 
       @endif

    });
</script>

<!-- SERACH FUNCTIONALITY -->
<script>
    $(function()
    {
         $('#dynamicsearch').on('keyup', function()
         {           
              name = sessionStorage.getItem('name');

              q = $('#dynamicsearch').val().replace(' ','%20');
              
              if(name =='allUsers')
               {
                 displayUsers(q);
               }
              
              else if(name =='allRoles')
               {
                 displaySubRoles(q);
               }
              
              else if(name =='allSubRoles')
               {
                 displayRoles(q);
               }
           })
    });
</script>









@if(Session::has('info'))
    <script>
        $(function() 
        {
            toastr.options.timeOut = 20000;   toastr.success('{{session('info')}}', {timeOut:50000});
        });
    </script>
@elseif(Session::has('error'))
    <script>
        $(function() 
        {
            toastr.options.timeOut = 5500;   toastr.error('{{session('error')}}', {timeOut:50000});
        });
    </script>
@endif  




@endsection