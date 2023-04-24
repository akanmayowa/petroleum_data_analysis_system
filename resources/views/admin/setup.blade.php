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


    .multi
    {
        color: blue;
    }
    .null
    {
        color: red;
    }

    .unresolevd
    {
      margin-left: 50px;
      color: #D2691E;
      font-size: 16px;
    }
</style>
@section('content')







<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel -->
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Master Data Configuration </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_companies') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_companies') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#comp" role="tab" style="padding: 4px 0px"> Companies </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_fields') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_fields') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link Field" data-toggle="tab" href="#field" role="tab" onclick="displayField()" style="padding: 4px 0px"> Fields </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_contract') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_contract') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link Contract" data-toggle="tab" href="#contract" role="tab" onclick="displayContract()" style="padding: 4px 0px"> Contracts </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_concession') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_concession') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#blocks" role="tab" style="padding: 4px 0px"> Concession </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_terrain') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_terrain') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link Terrain" data-toggle="tab" href="#terrain" role="tab" onclick="displayTerrain()" style="padding: 4px 0px"> Terrains </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_stream') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_stream') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link Stream" data-toggle="tab" href="#stream" role="tab" onclick="displayStream()" style="padding: 4px 0px"> Streams </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#fac" role="tab" style="padding: 4px 0px"> Facilities </a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_location') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_location') )
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#store" role="tab" style="padding: 4px 0px"> Locations </a>
                        </li>
                    @endif
                        {{-- <li class="nav-item nav-pad">
                            <a class="nav-link Department" data-toggle="tab" href="#department" role="tab" onclick="displayDepartment()" style="padding: 4px 0px"> Departments </a>
                        </li> --}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <div class="tab-pane" id="comp" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link ParentCompany" data-toggle="tab" href="#p_company" role="tab" onclick="displayParentCompany()">Equity holders</a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link Company" data-toggle="tab" href="#company" role="tab" onclick="displayCompany()">Operators</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="p_company" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="ParentCompany">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="company" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="Company">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                            </div>
                        </p>
                    </div>



                    <div class="tab-pane p-3" id="field" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="Field">

                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="contract" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="Contract">


                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane" id="blocks" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link Concession" data-toggle="tab" href="#concession" role="tab" onclick="displayConcession()" style="padding: 3px 30px"> Allocated </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link Unlisted_open" data-toggle="tab" href="#UnOp" role="tab" onclick="displayUnlistedOpen()" style="padding: 3px 30px"> Open Block </a>
                                </li>

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link bala_field" data-toggle="tab" href="#lmf" role="tab" onclick="displayMarginalField()"> Marginal Fields </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="concession" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="Concession">


                                        </div> <!-- end row -->

                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="UnOp" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="Unlisted_open">


                                        </div> <!-- end row -->

                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="lmf" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="bala_field">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                            </div>
                        </p>
                    </div>


                    <div class="tab-pane p-3" id="terrain" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="Terrain">


                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane p-3" id="stream" role="tabpanel">
                        <p class="font-14 mb-0">

                            <div class="row" id="Stream">

                            </div> <!-- end row -->

                        </p>
                    </div>

                    <div class="tab-pane" id="fac" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link Facilities" data-toggle="tab" href="#facilities" role="tab" onclick="displayFacility()"> Facilities </a>
                                </li>

                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link Facility_Type" data-toggle="tab" href="#f_type" role="tab" onclick="displayFacility_Type()"> Facility Types </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane p-3" id="facilities" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="Facilities">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="f_type" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="Facility_Type">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                            </div>
                        </p>
                    </div>


                    <div class="tab-pane" id="store" role="tabpanel">
                        <p class="font-14 mb-0" style="padding: 3px 0px">

                          <!-- Tab panes -->
                            <ul class="nav nav-pills nav-pad" role="tablist">
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link Location" data-toggle="tab" href="#location" role="tab" onclick="displayLocation()"> Location </a>
                                </li>
                                <li class="nav-item nav-pad nav-pad-sub">
                                    <a class="nav-link storage_loc" data-toggle="tab" href="#slocation" role="tab" onclick="displayStorageLocation()"> Storage Location </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane p-3" id="location" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="Location">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="slocation" role="tabpanel">
                                    <p class="font-14 mb-0">

                                        <div class="row" id="storage_loc">

                                        </div> <!-- end row -->

                                    </p>
                                </div>

                            </div>
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="department" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="Department">

                            </div>
                        </p>
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>





<!-- Add Department modal -->
<div id="adddept" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Department</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="deptForm" action="{{url('/admin/adddepartment')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_dept" id="date_dept" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="department_name" class="col-sm-2 col-form-label"> Department </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Department" name="department_name" id="department_name" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_dept_btn" id="add_dept_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Department </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit department Report modal -->
<div id="editdept" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Department</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_dept"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Department modal -->
<div id="upl_dept" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Department Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_department')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Departments" class="btn btn-dark pull-left" />
                    <a id="downloadDepartmentTemplate" download="Sample Departments Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Departments Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>





  <!-- Add Company modal -->
<div id="addcomp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Company / Operator</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="compForm" action="{{url('/admin/add_company')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_com" id="date_com" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label"> Company Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" required>
                </div>

                <label for="contact_name" class="col-sm-2 col-form-label"> Contact Person </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Contact Person" name="contact_name" id="contact_name">
                </div>
          </div>


          <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> Email </label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" placeholder="Company Email Address" name="email" id="email">
                </div>

                <label for="phone" class="col-sm-2 col-form-label"> Phone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Phone Number" name="phone" id="phone">
                </div>
          </div>


          <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label"> Address </label>
                <div class="col-sm-4">
                    <textarea rows="2" class="form-control" placeholder="Company Address" name="address" id="address"></textarea>
                </div>

                <label for="rc_number" class="col-sm-2 col-form-label"> RC Number </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company RC Number" name="rc_number" id="rc_number">
                </div>
          </div>


          <div class="form-group row">
                <label for="license_expire_date_com" class="col-sm-2 col-form-label"> License Expire Date </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company License Expiring Date" name="license_expire_date" id="license_expire_date_com">
                </div>

                <label for="operation_type" class="col-sm-2 col-form-label"> Operation Type </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Company Operation Type" name="operation_type" id="operation_type">
                </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_comp_btn" id="add_comp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Company </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Company modal -->
<div id="editcomp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Company</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_comp"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Company modal -->
<div id="upl_comp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Company Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_company')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Company" class="btn btn-dark pull-left" />
                    <a id="downloadCompanyTemplate" download="Sample Company Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Company Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Company modal -->
<div id="appcomp" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Companies</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="app_comp"></div>
          </div>
    </div>
    </div>
</div>




  <!-- Add Parent Company modal -->
<div id="addparentcomp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Parent Companies</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="parentcompForm" action="{{url('/admin/add_parent_company')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_com" id="date_com" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label"> Company Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" required>
                </div>
          </div>

          <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label"> Address </label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" placeholder="Address" name="address" id="address"></textarea>
                </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_comp_btn" id="add_comp_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Parent Company </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Parent Company modal -->
<div id="editparentcomp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Parent</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_parent_comp"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Parent Company modal -->
<div id="upl_parent_comp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Parent Company Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_parent_company')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Company" class="btn btn-dark pull-left" />
                    <a id="downloadParentCompTemplate" download="Sample Equity holders Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Equity holders Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>






  <!-- Add Fields  modal -->
<div id="addfield" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Fields </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="fieldForm" action="{{url('/admin/add_field')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_fie" id="date_fie" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
          <div class="form-group row">
                <label for="field_name" class="col-sm-2 col-form-label"> Field Name </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Field (Marginal) Name" name="field_name" id="field_name" required>
                </div>
          </div>


          <div class="form-group row">
                <label for="concession_id" class="col-sm-2 col-form-label"><i class=""> Concession </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="concession_id" id="concession_id" required>
                        <option value=""> Select Concession/Block Name </option>
                        @if($conc_ddl)
                            @foreach($conc_ddl as $conc_ddl)
                                <option value="{{$conc_ddl->id}}"> {{$conc_ddl->concession_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"><i class=""> Company </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id" required>
                        <option value=""> Select Company Name </option>
                        @if($field_company)
                            @foreach($field_company as $field_company)
                                <option value="{{$field_company->id}}"> {{$field_company->company_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="contract_id" class="col-sm-2 col-form-label"><i class=""> Contract </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_id" id="contract_id" required>
                        <option value=""> Select Contract Name </option>
                        @if($field_contract)
                            @foreach($field_contract as $field_contract)
                                <option value="{{$field_contract->id}}"> {{$field_contract->contract_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="terrain_id" class="col-sm-2 col-form-label"><i class=""> Terrain </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="terrain_id" id="terrain_id" required>
                        <option value=""> Select Terrain Name </option>
                        @if($field_terrain)
                            @foreach($field_terrain as $field_terrain)
                                <option value="{{$field_terrain->id}}"> {{$field_terrain->terrain_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_field_btn" id="add_field_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Field </button>
          </div>
          </form>
        </div>
    </div>
    </div>
  </div>



<!-- Edit Field modal -->
<div id="editfield" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_field"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Field modal -->
<div id="upl_field" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Field Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_field')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Field" class="btn btn-dark pull-left" />
                    <a id="downloadFieldTemplate" download="Sample Field Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Field Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Field modal -->
<div id="appfie" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="app_fie"></div>
          </div>
    </div>
    </div>
</div>




  <!-- Add Contracts  modal -->
 <div id="addcont" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Contract </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="contForm" action="{{url('/admin/add_contract')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_cnt" id="date_cnt" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group row">
            <label for="contract_name" class="col-sm-2 col-form-label"> Contract </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Contract Name" name="contract_name" id="contract_name" required>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_cont_btn" id="add_cont_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Contract </button>
          </div>
          </form>
        </div>
    </div>
    </div>
 </div>



<!-- Edit Contracts modal -->
<div id="editcont" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_cont"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Contracts modal -->
<div id="upl_contract" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Contracts Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_contract')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Contracts" class="btn btn-dark pull-left" />
                    <a id="downloadContractTemplate" download="Sample Contract Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Contract Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>





 <!-- Add Concession modal -->
<div id="add_conc" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Concession - Block</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="concessForm" action="{{url('/admin/add_concession')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_conc" id="date_conc" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="concession_name" class="col-sm-2 col-form-label"><i class=""> Concession Number</i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Concession Held" name="concession_name" id="concession_name" required>
                </div>

                <label for="conc" class="col-sm-2 col-form-label"><i class=""> Type </i></label>
                <div class="col-sm-4">
                    <select class="form-control" name="conc" id="conc" required>
                        <option value=""> Select Concession Type </option>
                        <option value="OML"> OML </option>
                        <option value="OPL"> OPL </option>
                    </select>
                </div>
          </div>



          <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"><i class=""> Company </i></label>
                <div class="col-sm-6">
                    <select class="form-control" name="company_id" id="company_id" required>
                        <option value=""> Select Company Name </option>
                        @if($block_comp)
                            @foreach($block_comp as $block_comp)
                                <option value="{{$block_comp->id}}"> {{$block_comp->company_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <label for="addEquity" class="col-sm-3 col-form-label"><span class=""> Add Equity Distribution and % </span></label>
                <div class="col-sm-1">  <button type="button" name="" id="addEquity" class="btn btn-sm btn-dark pull-right" style="cursor: pointer; font-size:10px; border-radius:13px" data-toggle="tooltip" data-original-title="Add Equity Distribution by Percent for each Company Here"> <i class="fa fa-plus"></i> </button>  </div>
          </div>


          <div id="equity_div" style="display: none;">
              <div class="form-group row">
                    <label for="equity_1" class="col-sm-2 col-form-label"><i class=""> Equity Holder 1 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_1" id="equity_1">
                            <option value="0"> Select Equity Holder 1 </option>
                            @if($equity_1)
                                @foreach($equity_1 as $equity_1)
                                    <option value="{{$equity_1->id}}"> {{$equity_1->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_1" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_1" id="percentage_1" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_2" class="col-sm-2 col-form-label"><i class=""> Equity Holder 2 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_2" id="equity_2">
                            <option value="0"> Select Equity Holder 2 </option>
                            @if($equity_2)
                                @foreach($equity_2 as $equity_2)
                                    <option value="{{$equity_2->id}}"> {{$equity_2->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_2" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_2" id="percentage_2" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_3" class="col-sm-2 col-form-label"><i class=""> Equity Holder 3 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_3" id="equity_3">
                            <option value="0"> Select Equity Holder 3 </option>
                            @if($equity_3)
                                @foreach($equity_3 as $equity_3)
                                    <option value="{{$equity_3->id}}"> {{$equity_3->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_3" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_3" id="percentage_3" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_4" class="col-sm-2 col-form-label"><i class=""> Equity Holder 4 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_4" id="equity_4">
                            <option value="0"> Select Equity Holder 4 </option>
                            @if($equity_4)
                                @foreach($equity_4 as $equity_4)
                                    <option value="{{$equity_4->id}}"> {{$equity_4->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_4" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_4" id="percentage_4" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_5" class="col-sm-2 col-form-label"><i class=""> Equity Holder 5 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_5" id="equity_5">
                            <option value="0"> Select Equity Holder 5 </option>
                            @if($equity_5)
                                @foreach($equity_5 as $equity_5)
                                    <option value="{{$equity_5->id}}"> {{$equity_5->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_5" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_5" id="percentage_5" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_6" class="col-sm-2 col-form-label"><i class=""> Equity Holder 6 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_6" id="equity_6">
                            <option value="0"> Select Equity Holder 6 </option>
                            @if($equity_6)
                                @foreach($equity_6 as $equity_6)
                                    <option value="{{$equity_6->id}}"> {{$equity_6->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_6" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_6" id="percentage_6" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_7" class="col-sm-2 col-form-label"><i class=""> Equity Holder 7 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_7" id="equity_7">
                            <option value="0"> Select Equity Holder 7 </option>
                            @if($equity_7)
                                @foreach($equity_7 as $equity_7)
                                    <option value="{{$equity_7->id}}"> {{$equity_7->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_7" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_7" id="percentage_7" value="0">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_8" class="col-sm-2 col-form-label"><i class=""> Equity Holder 8 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_8" id="equity_8">
                            <option value="0"> Select Equity Holder 8 </option>
                            @if($equity_8)
                                @foreach($equity_8 as $equity_8)
                                    <option value="{{$equity_8->id}}"> {{$equity_8->company_name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_8" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_8" id="percentage_8" value="0">
                    </div>
              </div>
          </div>

          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"><i class=""> Area </i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Area in Square Km" name="area" id="area">
                </div>

                <label for="geological_terrain_id" class="col-sm-2 col-form-label"><i class=""> Terrain </i></label>
                <div class="col-sm-4">
                    <select class="form-control" name="geological_terrain_id" id="geological_terrain_id">
                        <option value=""> Select Geological Terrain </option>
                        @if($block_terrain)
                            @foreach($block_terrain as $block_terrain)
                                <option value="{{$block_terrain->id}}"> {{$block_terrain->terrain_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>



          <div class="form-group row">
                <label for="contract_id" class="col-sm-2 col-form-label"><i class=""> Contract </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_id" id="contract_id">
                        <option value=""> Select Contract Type </option>
                        @if($block_cont)
                            @foreach($block_cont as $block_cont)
                                <option value="{{$block_cont->id}}"> {{$block_cont->contract_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="award_date" class="col-sm-2 col-form-label"><i class=""> Award Year </i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="award_date" id="award_date">
                </div>

                <label for="license_expire_date" class="col-sm-2 col-form-label"><i class=""> License Expires </i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="License Expiry Date" name="license_expire_date" id="license_expire_date">
                </div>
          </div>


          <div class="form-group row">
                <label for="comment" class="col-sm-2 col-form-label"><i class=""> Comment </i></label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" placeholder="Comment Here" name="comment" id="comment"></textarea>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Concession </button>
          </div>
          </form>
        </div>
    </div>
    </div>
  </div>



<!-- Edit Concession modal -->
<div id="edit_conc" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Concession</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="editconc"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Concession modal -->
<div id="upl_concession" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Concession Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_concession')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Concession" class="btn btn-dark pull-left" />
                    <a id="downloadConcessionTemplate" download="Sample Concession / Block Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Concession / Block Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Concession modal -->
<div id="appconc" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Concession</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="app_conc"></div>
          </div>
    </div>
    </div>
</div>




 <!-- Add Unlisted / Open Concession modal -->
<div id="add_unopen" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Unlisted / Open - Block</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="unopenForm" action="{{url('/admin/add_unlisted_open_block')}}" method="POST">
            @csrf
            <input type="hidden" name="date_conc" id="date_conc" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="concession_name" class="col-sm-2 col-form-label"><i class=""> Concession Number</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Concession Held" name="concession_name" id="concession_name" required>
                </div>
          </div>



          <div class="form-group row">
                <label for="conc" class="col-sm-2 col-form-label"><i class=""> Concession </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="conc" id="conc" required readonly>
                        <option value="OPL"> OPL </option>
                    </select>
                </div>
          </div>



          <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"><i class=""> Company </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="company_id" id="company_id" readonly>
                        <option value="108"> OPEN ACREAGE </option>
                        {{-- @if($open_comp)
                            @foreach($open_comp as $open_comp)
                                <option value="{{$open_comp->id}}"> {{$open_comp->company_name}} </option>
                            @endforeach
                        @endif --}}
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"><i class=""> Area </i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Area in Square Km" name="area" id="area" required>
                </div>
          </div>



          <div class="form-group row">
                <label for="terrain_id" class="col-sm-2 col-form-label"><i class=""> Terrain </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="terrain_id" id="terrain_id" required>
                        <option value=""> Select Geological Terrain </option>
                        @if($open_terrain)
                            @foreach($open_terrain as $open_terrain)
                                <option value="{{$open_terrain->id}}"> {{$open_terrain->terrain_name}} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="remark" class="col-sm-2 col-form-label"><i class=""> Remark </i></label>
                <div class="col-sm-10">
                    <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark"></textarea>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Open Block </button>
          </div>
          </form>
        </div>
    </div>
    </div>
  </div>



<!-- Edit Unlisted / Open Concession modal -->
<div id="edit_unopen" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Unlisted / Open Concession</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="editunopen"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Unlisted / Open Concession modal -->
<div id="upl_unopen" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Unlisted / Open Concession Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_unlisted_open_block')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Concession" class="btn btn-dark pull-left" />

                    <a id="downloadOpenConcTemplate" download="Sample Unlisted / Open Concession Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Unlisted / Open Concession Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Concession Unlisted  modal -->
<div id="appconcunlist" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg modal-70">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Concession Unlisted </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="app_conc_unlist"></div>
          </div>
    </div>
    </div>
</div>






 <!-- Add Marginal Fields modal -->
<div id="addbala_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add  Marginal Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="fieldMForm" action="{{url('/admin/add_marginal_field')}}" method="POST">
            @csrf
            <input type="hidden" name="date_mf" id="date_mf" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">



          <div class="form-group row">
                <label for="year_mf" class="col-sm-2 col-form-label"> Year  </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Year" name="year" id="year_mf" required readonly>
                </div>
          </div>

          <div class="form-group row">
            <label for="company_id_mf" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_mf" required>
                    <option value=""> Select Company </option>
                    @if($company_mf)
                        @foreach($company_mf as $company_mf)
                            <option value="{{$company_mf->id}}"> {{$company_mf->company_name}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id">
                </select>
            </div>
          </div>

          <div class="form-group row">
                <label for="blocks" class="col-sm-2 col-form-label"> Blocks Number  </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Blocks Name/Number" name="blocks" id="blocks" required>
                </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_mf_btn" id="add_mf_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Marginal Field </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Marginal Fields modal -->
<div id="editbala_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">Edit Marginal Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_balamfield"></div>
          </div>
    </div>
    </div>
</div>


<!-- Upload Marginal Fields modal -->
<div id="uplbala_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Marginal Fields Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_marginal_field')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" required>
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload File" class="btn btn-dark pull-left" />

                    <a id="downloadMarginalFieldTemplate" download="Sample Marginal Fields Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Marginal Fields Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Marginal Fields modal -->
<div id="app_m_field" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Marginal Fields </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="appmfield"></div>
          </div>
    </div>
    </div>
</div>





  <!-- Add Terrain modal -->
<div id="add_terr" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Terrain</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="terrForm" action="{{url('/admin/add_terrain')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date_terr" id="date_terr" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group row">
                <label for="terrain_name" class="col-sm-2 col-form-label"><i class="fa fa-flag"> Terrain </i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Terrain / Location Name" name="terrain_name" id="terrain_name"
                    required>
                </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_terr_btn" id="add_terr_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Terrain</button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Terrain modal -->
<div id="edit_terr" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Terrain</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="editterr"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Terrain modal -->
<div id="upl_terrain" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Terrain Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_terrain')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Terrain" class="btn btn-dark pull-left" />
                    <a id="downloadTerrainTemplate" download="Sample Terrain Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Terrain Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



  <!-- Add Stream modal -->
<div id="add_stream" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Stream</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="streForm" action="{{url('/admin/add_streams')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="_date_stre" id="date_stre" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">

          <div class="form-group row">
              <label for="stream_names" class="col-sm-2 col-form-label">Stream</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Stream Name" name="stream_name" id="stream_name"
                  required>
              </div>
          </div>

          <div class="form-group row">
            <label for="company_id_s" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_s">
                    <option value=""> Select Company</option>
                    @if(count($stream_company)>0)
                        @foreach($stream_company as $stream_company)
                            <option value="{{$stream_company->id}}">{{$stream_company->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="production_type" class="col-sm-2 col-form-label"> Production Type</label>
            <div class="col-sm-10">
                <select class="form-control" name="production_type" id="production_type">
                    <option value=""> Select Production Type </option>
                    @if(count($production_types)>0)
                        @foreach($production_types as $production_types)
                            <option value="{{$production_types->id}}">{{$production_types->production_type_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_stre_btn" id="add_stre_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Stream</button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>




<!-- Edit Stream modal -->
<div id="edit_stream" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Stream</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="editstream"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Stream modal -->
<div id="upl_stream" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Stream Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_streams')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Stream" class="btn btn-dark pull-left" />
                    <a id="downloadStreamTemplate" download="Sample Stream Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Stream Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Stream modal -->
<div id="appstream" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Stream</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="app_stream"></div>
          </div>
    </div>
    </div>
</div>





  <!-- Add Facilities modal -->
<div id="add_facility" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Facilities</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="faciForm" action="{{url('/admin/addfacility')}}" method="POST">
            @csrf
            <input type="hidden" name="date_fac" id="date_fac" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="facility_name" class="col-sm-2 col-form-label"><i class="">Facility</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Facilities Name" name="facility_name" id="facility_name" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_fac_btn" id="add_fac_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Facility </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Facility  modal -->
<div id="editfacility" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Facility</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_facility"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Facility modal -->
<div id="upl_facility" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Facility Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_facility')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Facility" class="btn btn-dark pull-left" />
                    <a id="downloadFacilityTemplate" download="Sample Facility Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Facility Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



  <!-- Add Facility Type modal -->
<div id="add_facility_type" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Facility Types </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="typeForm" action="{{url('/admin/addfacilitytype')}}" method="POST">
            @csrf
            <input type="hidden" name="date_type" id="date_type" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="facility_type_name" class="col-sm-2 col-form-label"><i class="">Type Name</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Facility Type Name" name="facility_type_name" id="facility_type_name" required>
                </div>
          </div>
                @if(Auth::user()->role_obj->role_name != 'Admin')
                    <!-- SETTING TYPE BASED ON WHO IS LOGIN -->
                    @if(Auth::user()->role_obj->permission->contains('constant', 'access_rm') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_mfio') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_up_operations') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_exploration') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_bala') )
                            <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="1" required>
                     @elseif(Auth::user()->role_obj->permission->contains('constant', 'access_coto') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_pdj') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_rom') )
                            <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="2" required>
                     @elseif(Auth::user()->role_obj->permission->contains('constant', 'access_dom') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_exploration_production') ||
                          Auth::user()->role_obj->permission->contains('constant', 'access_gas_operation') )
                            <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="3" required>
                     @elseif(Auth::user()->role_obj->permission->contains('constant', 'access_hse') )
                            <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="4" required>
                    @endif

                @elseif(Auth::user()->role_obj->role_name == 'Admin')
                            <input type="hidden" class="form-control" placeholder="Type" name="type_id" id="type_id" value="5" required>
                @endif





          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_type_btn" id="add_type_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Facility Type </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Facility Type  modal -->
<div id="editfacilitytype" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Facility Type</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_facility_type"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Facility Type modal -->
<div id="upl_facility_type" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Facility Type Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_facilitytype')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Facility Type" class="btn btn-dark pull-left" />
                    <a id="downloadFacTypeTemplate" download="Sample Facility Type Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Facility Type Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



<!-- Approve Facility modal -->
<div id="appfac" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header app_bg">
            <h4 class="modal-title">Approve Pending Facility</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="app_fac"></div>
          </div>
    </div>
    </div>
</div>




  <!-- Add Location modal -->
<div id="add_location" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Gas Location </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="locForm" action="{{url('/admin/addlocation')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_loc" id="date_loc" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="location_name" class="col-sm-2 col-form-label"><i class="">Location</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Location Name" name="location_name" id="location_name" required>
                </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_loc_btn" id="add_loc_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Location </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Location modal -->
<div id="editlocation" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Location</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="edit_location"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Location modal -->
<div id="upl_location" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Location Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_location')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Location" class="btn btn-dark pull-left" />
                    <a id="downloadLocationTemplate" download="Sample Location Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Location Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
        </div>
    </div>
    </div>
</div>



  <!-- Add Storage Location modal -->
<div id="add_storage_location" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Add Storage Location </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
          <form id="stoLocForm" action="{{url('/admin/add_storage_location')}}" method="POST">
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="date_sloc" id="date_sloc" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">


          <div class="form-group row">
                <label for="location_names" class="col-sm-2 col-form-label"><i class="">Location</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Location Name" name="location_name" id="location_names" required>
                </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="add_sloc_btn" id="add_sloc_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Storage Location </button>
          </div>
          </form>
        </div>
    </div>
    </div>
</div>



<!-- Edit Storage Location  modal -->
<div id="edit_storage_location" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Edit Storage Location</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div id="editstoragelocation"></div>
          </div>
    </div>
    </div>
</div>



<!-- Upload Location modal -->
<div id="upl_storage_location" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header header_bg">
            <h4 class="modal-title">Upload Storage Location Excel Sheet </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
                <form action="{{url('admin/upload_storage_location')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file">
                    <p style="color:red"> {{$errors->first('file')}} </p>
                    <input type="submit" value="Upload Storage Location" class="btn btn-dark pull-left" />
                    <a id="downloadStoreLocTemplate" download="Sample Storage Location Excel Template" class="btn btn-sm pull-right text-muted" style="font-size: 12px; border:thin solid #e1e1e1" title="Download Sample Storage Location Excel Template"> <i class="fa fa-download"></i> Download Template</a>
                </form>
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













@endsection

@section('script')

<script>

    $(function()
    {
        $('#start_dates').datepicker();
    });


    function showmodal(modalid,url=0,hrefid=0)
    {
      if(url!=0){
      $('#'+hrefid).attr('href',url);
      }

        $('#'+modalid).modal('show');
    }

     $(function()  //MARGINAL AND NON MARGINAL FIELD VALUES
    {

        $('input[name="f_type"]').change(function()
        {
            if($('#m_field').prop('checked'))
            {
                $('#field_type').val(1);
            }
            else
            {
                $('#field_type').val(2);
            }
        });
        $('input[name="f_types"]').change(function()
        {
            var id = this.id; alert(id);
            if($('#m_fields').prop('checked'))
            {
                $('.field_types').val(1);
            }
            else
            {
                $('.field_types').val(2);
            }
        });



        $('#award_date').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years",
          minViewMode: "years"
      })

        $('#month_fac').datepicker(
        {
          autoclose: true, format: "yyyy",
          viewMode: "months",
          minViewMode: "months"
      })

        $('#year_mf').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years",
          minViewMode: "years"
      })



        $('#license_expire_date_com').datepicker(
        {
          autoclose: true, format: "yyyy-mm-dd"
      })





    });


    $(function()
    {
        //Appending Field for selected Company
        $('#company_id_mf').change(function(e)
        {
            var company_id = $(this).val();
              $.get('{{url('getFields')}}?company_id=' +company_id, function(data)
              {
                $('#field_id').empty();
                $('#field_id').append('<option value=""> Select A Field </option>');
                $.each(data, function(index, fieldObj)
                {
                  $('#field_id').append('<option value="'+ fieldObj.id +'"> '+ fieldObj.field_name +' </option>');
                });
              });
        });


    });

</script>




<script>   // JAVASCRIPT AJAX FUNCTION

function appendTable(data, tableId)
{

    if(tableId == 'dept_table')
    {
        var _date = document.getElementById('date_dept').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.department+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_department('+data.id+')" class="btn-sm pull-right" title="Edit Department"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'parent_company_table')
    {
        var _date = document.getElementById('date_com').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.company_code+' </th> <th> '+data.company+' </th>  <th> '+data.address+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_parent_company('+data.id+')" class="btn-sm pull-right" title="Edit Parent Company"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'company_table')
    {
        var _date = document.getElementById('date_com').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.company_code+' </th> <th> '+data.company+' </th> <th> '+data.parent_company+' </th> <th> '+data.contact_name+' </th> <th> '+data.email+' </th> <th> '+data.phone+' </th> <th> '+data.rc_number+' </th> <th> '+data.license_expire_date+' </th> <th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_company('+data.id+')" class="btn-sm pull-right" title="Edit Company / Operator"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'field_table')
    {
        var _date = document.getElementById('date_fie').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.field_code+' </th> <th> '+data.field+' </th>  <th> '+data.field_type+' </th>   <th> '+data.concession+' </th>   <th> '+data.terrain+' </th> <th> '+data.company+' </th> <th> '+_date+' </th> <th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_field('+data.id+')" class="btn-sm pull-right" title="Edit Field"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'contract_table')
    {
        var _date = document.getElementById('date_cnt').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.contract+' </th> <th> '+_date+' </th> <th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_contract('+data.id+')" class="btn-sm pull-right" title="Edit Contract"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'conc_table')
    {
        var _date = document.getElementById('date_conc').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.concession+' </th>  <th> '+data.company+' </th>  <th> '+data.area+' </th>  <th> '+data.contract+' </th>  <th> '+data.award_date+' </th>  <th> '+data.terrain+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_concession('+data.id+')" class="btn-sm pull-right" title="Edit Concession Held"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'unopen_table')
    {
        var _date = document.getElementById('date_conc').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.concession+' </th>  <th> '+data.contract+' </th>  <th> '+data.area+' </th>  <th> '+data.contract+' </th>  <th> '+data.award_date+' </th>  <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_unlisted_open_block('+data.id+')" class="btn-sm pull-right" title="Edit Unlisted / Open Concession Held"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'm_field_table')
    {
        var _date = document.getElementById('date_mf').value;
        $('#'+tableId).prepend('<tr>   <td> '+data.id+' </td>  <td> '+data.company+' </td> <td> '+data.field+' </td> <td> '+data.blocks+' </td>  <td> '+_date+' </td>  <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <td> <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_bala_m_field('+data.id+')" class="btn-sm pull-right" title="Edit list Of Marginal Fields"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
    }

    else if(tableId == 'terrain_table')
    {
        var _date = document.getElementById('date_terr').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.terrain+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_terrain('+data.id+')" class="btn-sm pull-right" title="Edit Terrain / Location"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'stream_table')
    {
        var _date = document.getElementById('date_stre').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.stream_code+' </th>  <th> '+data.stream+' </th> <th> '+data.company+' </th>  <th> '+data.production_type+' </th>  <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_stream('+data.id+')" class="btn-sm pull-right" title="Edit Stream"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'facility_table')
    {
        var _date = document.getElementById('date_fac').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.facility_code+' </th>  <th> '+data.facility+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_facility('+data.id+')" class="btn-sm pull-right" title="Edit Facility"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'facility_type_table')
    {
        var _date = document.getElementById('date_type').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.type+' </th> <th> '+data.facility_type+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_facility_type('+data.id+')" class="btn-sm pull-right" title="Edit Facility"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'location_table')
    {
        var _date = document.getElementById('date_loc').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.location+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_location('+data.id+')" class="btn-sm pull-right" title="Edit Location"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
    }

    else if(tableId == 'sto_loc_table')
    {
        var _date = document.getElementById('date_sloc').value;
        $('#'+tableId).prepend('<tr>  <th> '+data.id+' </th>  <th> '+data.location+' </th> <th> '+_date+' </th> <th style="text-align: right;">  <img src="{{URL::asset('assets/images/yellow.png')}}" alt="" height="12" class=""> </th> <th>  <a data-toggle="modal" style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" onclick="load_storage_location('+data.id+')" class="btn-sm pull-right" title="Edit Storage Location"> <i class="fa fa-pencil"></i>    </a>  </th>    </tr>');
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
            }

            return toastr.error(data.info, {timeOut:10000});

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
    })

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

        //DEPARTMENT
        $("#deptForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('deptForm', "{{url('/admin/adddepartment')}}", 'dept_table', 'progressDept', 'adddept');
        });


        //COMPANY
        $("#compForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('compForm', "{{url('/admin/add_company')}}", 'company_table', 'progressComp', 'addcomp');
        });


        //PARENT COMPANY
        $("#parentcompForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('parentcompForm', "{{url('/admin/add_parent_company')}}", 'parent_company_table', 'progressComp', 'addparentcomp');
        });

        //FIELD
        $("#fieldForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('fieldForm', "{{url('/admin/add_field')}}", 'field_table', 'progressField', 'addfield');
        });

        //CONTRACT
        $("#contForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('contForm', "{{url('/admin/add_contract')}}", 'contract_table', 'progressCont', 'addcont');
        });

        //CONCESSION
        $("#concessForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('concessForm', "{{url('/admin/add_concession')}}", 'conc_table', 'progressConc', 'add_conc');
        });

        //Unlisted / Open CONCESSION
        $("#unopenForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('unopenForm', "{{url('/admin/add_unlisted_open_block')}}", 'unopen_table', 'progressConc', 'add_unopen');
        });

        //M FIELD
        $("#fieldMForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('fieldMForm', "{{url('/admin/add_marginal_field')}}", 'm_field_table', 'progressMField', 'addbala_m_field');
        });


        //TERRAIN
        $("#terrForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('terrForm', "{{url('/admin/add_terrain')}}", 'terrain_table', 'progressTerr', 'add_terr');
        });


        //STREAM
        $("#streForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('streForm', "{{url('/admin/add_streams')}}", 'stream_table', 'progressStre', 'add_stream');
        });

        //FACILITY
        $("#faciForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('faciForm', "{{url('/admin/addfacility')}}", 'facility_table', 'progressFaci', 'add_facility');
        });

        //FACILITY TYPE
        $("#typeForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('typeForm', "{{url('/admin/addfacilitytype')}}", 'facility_type_table', 'progressType', 'add_facility_type');
        });

        //LOCATION
        $("#locForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('locForm', "{{url('/admin/addlocation')}}", 'location_table', 'progressLoc', 'add_location');
        });

        //STORAGE LOCATION
        $("#stoLocForm").on('submit',function(e)
        {
            e.preventDefault();
            processForm('stoLocForm', "{{url('/admin/add_storage_location')}}", 'sto_loc_table', 'progressStoLoc', 'add_storage_location');
        })


    });
</script>


<script> //FUNCTIONS TO LOAD EDIT MODALS
    function load_department(id)
    {
        $('#edit_dept').load("{{url('admin')}}/modals/editDepartment?id="+id);
        $('#editdept').modal('show');
    }

    function load_company(id)
    {
        $('#edit_comp').load("{{url('admin')}}/modals/editCompany?id="+id);
        $('#editcomp').modal('show');
    }
    function approve_company()
    {
        $('#app_comp').load("{{url('admin')}}/view/approveCompany");
        $('#appcomp').modal('show');
    }

    function load_parent_company(id)
    {
        $('#edit_parent_comp').load("{{url('admin')}}/modals/editParentCompany?id="+id);
        $('#editparentcomp').modal('show');
    }

    function load_field(id)
    {
        $('#edit_field').load("{{url('admin')}}/modals/editField?id="+id);
        $('#editfield').modal('show');
    }
    function approve_field()
    {
        $('#app_fie').load("{{url('admin')}}/view/approveField");
        $('#appfie').modal('show');
    }

    function load_contract(id)
    {
        $('#edit_cont').load("{{url('admin')}}/modals/editContract?id="+id);
        $('#editcont').modal('show');
    }

    function load_concession(id)
    {
        $('#editconc').load("{{url('admin')}}/modals/editConcession?id="+id);
        $('#edit_conc').modal('show');
    }
    function approve_concession()
    {
        $('#app_conc').load("{{url('admin')}}/view/approveConcession");
        $('#appconc').modal('show');
    }

    function load_unlisted_open_block(id)
    {
        $('#editunopen').load("{{url('admin')}}/modals/editUnlistedOpenBlock?id="+id);
        $('#edit_unopen').modal('show');
    }
    function approve_concession_unlisted()
    {
        $('#app_conc_unlist').load("{{url('admin')}}/view/approveConcessionUnlisted");
        $('#appconcunlist').modal('show');
    }

    function load_bala_m_field(id)
    {
        $('#edit_balamfield').load("{{url('admin')}}/modals/editMarginalField?id="+id);
        $('#editbala_m_field').modal('show');
    }
    function approve_m_field()
    {
        $('#appmfield').load("{{url('admin')}}/view/approveBalaMarginalField");
        $('#app_m_field').modal('show');
    }

    function load_terrain(id)
    {
        $('#editterr').load("{{url('admin')}}/modals/editTerrain?id="+id);
        $('#edit_terr').modal('show');
    }
    function load_stream(id)
    {
        $('#editstream').load("{{url('admin')}}/modals/editStream?id="+id);
        $('#edit_stream').modal('show');
    }
    function approve_stream()
    {
        $('#app_stream').load("{{url('admin')}}/view/approveStream");
        $('#appstream').modal('show');
    }

    function load_facility(id)
    {
        $('#edit_facility').load("{{url('admin')}}/modals/editFacilities?id="+id);
        $('#editfacility').modal('show');
    }
    function approve_facility()
    {
        $('#app_fac').load("{{url('admin')}}/view/approveFacility");
        $('#appfac').modal('show');
    }

    function load_facility_type(id)
    {
        $('#edit_facility_type').load("{{url('admin')}}/modals/editFacilityTypes?id="+id);
        $('#editfacilitytype').modal('show');
    }

    function load_location(id)
    {
        $('#edit_location').load("{{url('admin')}}/modals/editLocations?id="+id);
        $('#editlocation').modal('show');
    }

    function load_storage_location(id)
    {
        $('#editstoragelocation').load("{{url('admin')}}/modals/editStorageLocations?id="+id);
        $('#edit_storage_location').modal('show');
    }



    //Hide alert message box
    $('#succ_alert_msg').hide();
    $('#err_alert_msg').hide();
</script>



<!-- AJAX TO POPULATE TABLES AND PAGINATION -->
<script>
    function displayDepartment($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Department?q='+$search+'&excel=excel');
        $('#Department').load('{{url('ajax')}}/Department?q='+$search);
        sessionStorage.setItem('name', 'Department');
    }

    function displayCompany($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Company?q='+$search+'&excel=excel');
        $('#Company').load('{{url('ajax')}}/Company?q='+$search);
        sessionStorage.setItem('name', 'Company');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayParentCompany($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/ParentCompany?q='+$search+'&excel=excel');
        $('#ParentCompany').load('{{url('ajax')}}/ParentCompany?q='+$search);
        sessionStorage.setItem('name', 'ParentCompany');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayField($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Field?q='+$search+'&excel=excel');
        $('#Field').load('{{url('ajax')}}/Field?q='+$search);
        sessionStorage.setItem('name', 'Field');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayContract($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Contract?q='+$search+'&excel=excel');
        $('#Contract').load('{{url('ajax')}}/Contract?q='+$search);
        sessionStorage.setItem('name', 'Contract');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayConcession($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Concession?q='+$search+'&excel=excel');
        $('#Concession').load('{{url('ajax')}}/Concession?q='+$search);
        sessionStorage.setItem('name', 'Concession');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayUnlistedOpen($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Unlisted_open?q='+$search+'&excel=excel');
        $('#Unlisted_open').load('{{url('ajax')}}/Unlisted_open?q='+$search);
        sessionStorage.setItem('name', 'Unlisted_open');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayMarginalField($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/bala_field?q='+$search+'&excel=excel');
        $('#bala_field').load('{{url('ajax')}}/bala_field?q='+$search);
        sessionStorage.setItem('name', 'bala_field');
    }

    function displayTerrain($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Terrain?q='+$search+'&excel=excel');
        $('#Terrain').load('{{url('ajax')}}/Terrain?q='+$search);
        sessionStorage.setItem('name', 'Terrain');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayStream($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Stream?q='+$search+'&excel=excel');
        $('#Stream').load('{{url('ajax')}}/Stream?q='+$search);
        sessionStorage.setItem('name', 'Stream');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayFacility($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Facilities?q='+$search+'&excel=excel');
        $('#Facilities').load('{{url('ajax')}}/Facilities?q='+$search);
        sessionStorage.setItem('name', 'Facilities');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayFacility_Type($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Facility_Type?q='+$search+'&excel=excel');
        $('#Facility_Type').load('{{url('ajax')}}/Facility_Type?q='+$search);
        sessionStorage.setItem('name', 'Facility_Type');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayLocation($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/Location?q='+$search+'&excel=excel');
        $('#Location').load('{{url('ajax')}}/Location?q='+$search);
        sessionStorage.setItem('name', 'Location');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }

    function displayStorageLocation($search=0)
    {
        sessionStorage.setItem('url','{{url('ajax')}}/storage_loc?q='+$search+'&excel=excel');
        $('#storage_loc').load('{{url('ajax')}}/storage_loc?q='+$search);
        sessionStorage.setItem('name', 'storage_loc');
         // $('.'+sessionStorage.getItem('name')).addClass('active');
    }









    function resolveLoad()
    {

        switch (sessionStorage.getItem('name'))
        {
           case 'Department':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Company':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'ParentCompany':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Field':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Contract':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Concession':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Unlisted_open':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'bala_field':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Terrain':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Stream':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Facilities':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Facility_Type':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'Location':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

           case 'storage_loc':
                 $('.'+sessionStorage.getItem('name')).trigger('click');
                 break;

            // default:
            //       $('.Department').trigger('click');
            //       break;
        }

    }
    //

    $(function()
    {
        resolveLoad();
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

              if(name =='Department')
               {
                 displayDepartment(q);
               }
               else if(name =='Company')
               {
                 displayCompany(q);
               }
               else if(name =='ParentCompany')
               {
                 displayParentCompany(q);
               }
               else if(name =='Field')
               {
                 displayField(q);
               }
               else if(name =='Contract')
               {
                 displayContract(q);
               }
               else if(name =='Concession')
               {
                 displayConcession(q);
               }
               else if(name =='Unlisted_open')
               {
                 displayUnlistedOpen(q);
               }
               else if(name =='bala_field')
               {
                 displayMarginalField(q);
               }
               else if(name =='Terrain')
               {
                 displayTerrain(q);
               }
               else if(name =='Stream')
               {
                 displayStream(q);
               }
               else if(name =='Facilities')
               {
                 displayFacility(q);
               }
               else if(name =='Facility_Type')
               {
                 displayFacility_Type(q);
               }
               else if(name =='Location')
               {
                 displayLocation(q);
               }
               else if(name =='storage_loc')
               {
                 displayStorageLocation(q);
               }

           })

         $("#addEquity").click(function()
         {
            $("#equity_div").toggle();
          });

    });
</script>



<script>
    function setValue(id, model_name)
    {
        $(function()
        {
            var chk = $('#tab_'+id).prop('checked');
            if( chk == true ){ $('#tab_'+id).val(1); }
            else if( chk == false ){ $('#tab_'+id).val(0); }
            var stage_id = $('#tab_'+id).val();  //alert(stage_id);


            var tid = $('#tab_'+id).attr("id");
            formData =
            {
                id:id,
                stage_id:stage_id,
                model_name:model_name,
                section:'MASTER DATA',
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('set-stage_id')}}', formData, function(data, status, xhr)
            {
                if(data.status=='ok'){ }  else{  }
            });
        });
    }
</script>




@if(Session::has('info'))
        <script>
            $(function()
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function()
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection