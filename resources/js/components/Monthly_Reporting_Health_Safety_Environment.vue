<style>
    .p-3
    {
        padding: 10px 0px !important;
    }
</style>


<template>

  <!-- Page -->
  <div class="page" style="padding: -25px 0px 0px 0px;">

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <!-- Notification Panel --> 
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For Engineering and Standand Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control pull-right m-b-2" style="width: 60%; float: right;"
                         placeholder="Year (yyyy)" id="year" name="year" v-model="year_acq" @change="setMonthlyReportByYear">
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#app_hse" role="tab" @click="setApplication">APPLICATIONS </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#osp" role="tab" @click="setOSPRegistration">OSP REGISTRATION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#mgt" role="tab" @click="setIncidence">INCIDENCE MGT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#spi" role="tab" @click="setSpillIncidence">SPILL INCIDENCE MGT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#was" role="tab" @click="setWasteManagement">WASTE MGT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rep" role="tab" @click="setOthers">OTHER REPORT </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="app_hse" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> OPERATION APPLICATIONS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEApplicationMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_application in list_applications">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_application.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_application.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_applications" :file_name="'Monthly Operation Applications'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="osp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> OSP REGISTRATION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOSPRegistrationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOSPRegistrationMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_osp_registration in list_osp_registrations">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_osp_registration.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_osp_registration.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_osp_registrations" :file_name="'Monthly OSP Registration'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="mgt" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> INCIDENCE MANAGEMENT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEIncidenceMgtRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEIncidenceMgtMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_incidence in list_incidences">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_incidence.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_incidence.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_incidences" :file_name="'Monthly Incidence Management'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="spi" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> SPILL INCIDENCE MGT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSESpillIncidenceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSESpillIncidenceMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_spill_incidence in list_spill_incidences">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_spill_incidence.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_spill_incidence.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_spill_incidences" :file_name="'Monthly Spill Incidence MGT'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="was" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> WASTE MANAGEMENT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEWasteManagementRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEWasteManagementMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_waste_management in list_waste_managements">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_waste_management.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_waste_management.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_waste_managements" :file_name="'Monthly Waste Management'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="rep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> OTHER REPORT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addHSEOtherReportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setHSEOtherReportMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_others in list_otherss">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_others.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_others.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_otherss" :file_name="'Monthly Other Reports'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                    </div>

                </div>
            </div>
        </div>










        <form @submit.prevent="addHSEApplicationRemarks" class="form-horizontal">
            <div id="addHSEApplicationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> SHEC Application Count Remark For {{shec_application.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-10 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_application.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Env Studies Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.environment_application_receiced"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Env Studies issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.environment_application_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Discharge Permits Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.discharge_permit_receiced"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Discharge Permits Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.discharge_permit_issued"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Radiation Permits Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.radiation_safety_permit_receiced"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Radiation Permits Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.radiation_safety_permit_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Safety Cases Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.safety_case_permit_receiced"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Safety Cases Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.safety_case_permit_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Lab Accreditatiod Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.lab_accredition_receiced"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Lab Accreditatiod Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.lab_accredition_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Oil Field Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.chemical_application_receiced"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Oil Field Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.chemical_application_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Point Sour Reg Received </label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.registration_application_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Point Sour Reg issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_application.registration_application_issued"></textarea>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="shec_application.month">
                            <input type="hidden" class="form-control" v-model="shec_application.type">
                        </div>
                      </div>



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Remark</button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>

        <form @submit.prevent="addHSEOSPRegistrationRemarks" class="form-horizontal">
            <div id="addHSEOSPRegistrationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> SHEC OSP Registration Count Remark For {{shec_osp_registration.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_osp_registration.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Personnel Registered</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_osp_registration.personel_captured"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Image Captured</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_osp_registration.image_captured"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Permit issued</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_osp_registration.permit_issued"></textarea>
                        </div>
                      </div>  


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="shec_osp_registration.month">
                            <input type="hidden" class="form-control" v-model="shec_osp_registration.type">
                        </div>
                      </div>



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Remark</button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>

        <form @submit.prevent="addHSEIncidenceMgtRemarks" class="form-horizontal">
            <div id="addHSEIncidenceMgtRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> SHEC Incidence MGT Count Remark For {{shec_incidence_mgt.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_incidence_mgt.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Incidents/Accidents</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_incidence_mgt.incidence_accident"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Fatal Incidents</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="shec_incidence_mgt.fatal_incidence"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Fatalities</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="shec_incidence_mgt.fatalities"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Work Related</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="shec_incidence_mgt.work_related"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Non-Work Related</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="shec_incidence_mgt.non_work_related"></textarea>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="shec_incidence_mgt.month">
                            <input type="hidden" class="form-control" v-model="shec_incidence_mgt.type">
                        </div>
                      </div>



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Remark</button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>

        <form @submit.prevent="addHSESpillIncidentRemarks" class="form-horizontal">
            <div id="addHSESpillIncidenceRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> SHEC Spill Incidence MGT Count Remark For {{shec_spill_incidence_mgt.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_spill_incidence_mgt.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Spill Number</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_spill_incidence_mgt.spill_number"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Spill Volume (bbls)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_spill_incidence_mgt.spill_volume"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Quantity recovered(bbls)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_spill_incidence_mgt.quantity_recoverd"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of JIV conducted</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_spill_incidence_mgt.jiv_conducted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Community issues</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="shec_spill_incidence_mgt.community_issued"></textarea>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="shec_spill_incidence_mgt.month">
                            <input type="hidden" class="form-control" v-model="shec_spill_incidence_mgt.type">
                        </div>
                      </div>



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Remark</button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>

        <form @submit.prevent="addHSEWasteManagementRemarks" class="form-horizontal">
            <div id="addHSEWasteManagementRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> SHEC Waste Management Count Remark For {{shec_waste_management.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_waste_management.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">TDU-Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.tdu_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">TDU-Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.tdu_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Incinerator Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.incinerator_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Incinerator Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.incinerator_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">WBM Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.wbm_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">WBM Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.wbm_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Cln Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.tank_cleaning_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Tank Cln Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.tank_cleaning_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Solid Ctrl Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.solid_control_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Solid Ctrl Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.solid_control_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Spill Clean up Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.spill_clean_up_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Spill Clean up Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.spill_clean_up_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Remediation Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.remediation_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Remediation Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.remediation_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Prod Water Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.produced_water_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Prod Water Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.produced_water_approval_granted"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Waste Water/Slop Application</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.waste_slop_new_application"></textarea>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Waste Water/Slop Appr Granted</label>
                        <div class="col-sm-3">
                            <textarea rows="2" class="form-control" v-model="shec_waste_management.waste_slop_approval_granted"></textarea>
                        </div>
                      </div>  


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="shec_waste_management.month">
                            <input type="hidden" class="form-control" v-model="shec_waste_management.type">
                        </div>
                      </div>



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Remark</button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>

        <form @submit.prevent="addHSEOtherReportRemarks" class="form-horizontal">
            <div id="addHSEOtherReportRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> SHEC Other Reports Count Remark For {{shec_other_report.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-10 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="shec_other_report.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">HAZOP</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.hazop"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">RBI</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.rbi"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">PSV Certification</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.psv_certification"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Leak Test</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.leak_test"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Rig inspection</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.rig_inspection"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Vessel Inspection</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.vessel_inspection"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">New Technologies</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.new_technologies"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Compliance monitoring</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.conpliance_monitoring"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Project monitoring activities</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.project_monitoring_activities"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Facility Inspection/HSC Audit</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.facility_inspection_audit"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Safety/HSE Training</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.safety_training"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Permit withdrawal cases</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="shec_other_report.permit_withdrawal_cases"></textarea>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="shec_other_report.month">
                            <input type="hidden" class="form-control" v-model="shec_other_report.type">
                        </div>
                      </div>



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Remark</button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>







    </div>
</div>


</template>












<script>


    export default
    {
        data()
        {
            return{

                jan: '', feb: '', mar: '', qrt1: '', apr: '', may: '', jun: '', qrt2: '', m_yr: '', 
                jul: '',  aug: '', sep: '', qrt3: '', oct: '', nov: '', dec: '', qrt4: '', ann: '', 

                remark: false,

                year_acq: '2019-01-01',
                week_from: '',
                week_to: '',
                list_applications: [],
                list_osp_registrations: [],
                list_incidences: [],
                list_spill_incidences: [],
                list_waste_managements: [],
                list_otherss: [],


                shec_application: {
                    id: '',
                    year: '',
                    month: '',
                    environment_application_receiced: '',
                    environment_application_issued: '',
                    discharge_permit_receiced: '',
                    discharge_permit_issued: '',
                    radiation_safety_permit_receiced: '',
                    radiation_safety_permit_issued: '',
                    safety_case_permit_receiced: '',
                    safety_case_permit_issued: '',
                    lab_accredition_receiced: '',
                    lab_accredition_issued: '',
                    chemical_application_receiced: '',
                    chemical_application_issued: '',
                    registration_application_received: '',
                    registration_application_issued: '',
                    type: 'shec_application'
                },
 
                shec_osp_registration: {
                    id: '',
                    year: '',
                    month: '',
                    personel_captured: '',
                    image_captured: '',
                    permit_issued: '',
                    type: 'shec_osp_registration'
                },

                shec_incidence_mgt: {
                    id: '',
                    year: '',
                    month: '',
                    incidence_accident: '',
                    fatal_incidence: '',
                    fatalities: '',
                    work_related: '',
                    non_work_related: '',
                    type: 'shec_incidence_mgt'
                },

                shec_spill_incidence_mgt: {
                    id: '',
                    year: '',
                    month: '',
                    spill_number: '',
                    spill_volume: '',
                    quantity_recoverd: '',
                    jiv_conducted: '',
                    community_issued: '',
                    type: 'shec_spill_incidence_mgt'
                },

                shec_waste_management: {
                    id: '',
                    year: '',
                    month: '',
                    tdu_new_application: '',
                    tdu_approval_granted: '',
                    incinerator_new_application: '',
                    incinerator_approval_granted: '',
                    wbm_new_application: '',
                    wbm_approval_granted: '',
                    tank_cleaning_new_application: '',
                    tank_cleaning_approval_granted: '',
                    solid_control_new_application: '',
                    solid_control_approval_granted: '',
                    spill_clean_up_new_application: '',
                    spill_clean_up_approval_granted: '',
                    remediation_new_application: '',
                    remediation_approval_granted: '',
                    produced_water_new_application: '',
                    produced_water_approval_granted: '',
                    waste_slop_new_application: '',
                    waste_slop_approval_granted: '',
                    type: 'shec_waste_management'
                },

                shec_other_report: {
                    id: '',
                    year: '',
                    month: '',
                    hazop: '',
                    rbi: '',
                    psv_certification: '',
                    leak_test: '',
                    rig_inspection: '',
                    vessel_inspection: '',
                    new_technologies: '',
                    conpliance_monitoring: '',
                    project_monitoring_activities: '',
                    facility_inspection_audit: '',
                    safety_training: '',
                    permit_withdrawal_cases: '',
                    type: 'shec_other_report'
                },


            }
        },


        created()
        {
            this.year_acq = '2019-01-01';
        },


        methods:{

            setMonthlyReportByYear()
            {
                this.year_acq = year_acq;
                this.setApplication();  
                this.setOSPRegistration(); 
                this.setIncidence();   
                this.setSpillIncidence(); 
                this.setWasteManagement(); 
                this.setOthers(); 
            },





            setApplication()
            {
                let report = '/api/monthly-reportings/application_hse/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_applications = res;
                })
                .catch(err => console.log(err));            
            },

            setOSPRegistration()
            {
                let report = '/api/monthly-reportings/osp_registration/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_osp_registrations = res;
                })
                .catch(err => console.log(err));            
            },

            setIncidence()
            {
                let report = '/api/monthly-reportings/incidence/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_incidences = res;
                })
                .catch(err => console.log(err));            
            },

            setSpillIncidence()
            {
                let report = '/api/monthly-reportings/spill_incidence/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_spill_incidences = res;
                })
                .catch(err => console.log(err));            
            },

            setWasteManagement()
            {
                let report = '/api/monthly-reportings/waste_management/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_waste_managements = res;
                })
                .catch(err => console.log(err));            
            },

            setOthers()
            {
                let report = '/api/monthly-reportings/others/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_otherss = res;
                })
                .catch(err => console.log(err));            
            },








            clearHSEApplicationForm()
            {
                this.shec_application.environment_application_receiced = '';
                this.shec_application.environment_application_issued = '';
                this.shec_application.discharge_permit_receiced = '';
                this.shec_application.discharge_permit_issued = '';
                this.shec_application.radiation_safety_permit_receiced = '';
                this.shec_application.radiation_safety_permit_issued = '';
                this.shec_application.safety_case_permit_receiced = '';
                this.shec_application.safety_case_permit_issued = '';
                this.shec_application.lab_accredition_receiced = '';
                this.shec_application.lab_accredition_issued = '';
                this.shec_application.chemical_application_receiced = '';
                this.shec_application.chemical_application_issued = '';
                this.shec_application.registration_application_received = '';
                this.shec_application.registration_application_issued = '';
            },

            clearHSEOSPRegistrationForm()
            {
                this.shec_osp_registration.personel_captured = '';
                this.shec_osp_registration.image_captured = '';
                this.shec_osp_registration.permit_issued = '';
            },

            clearHSEIncidenceMgtForm()
            {
                this.shec_incidence_mgt.incidence_accident = '';
                this.shec_incidence_mgt.fatal_incidence = '';
                this.shec_incidence_mgt.fatalities = '';
                this.shec_incidence_mgt.work_related = '';
                this.shec_incidence_mgt.non_work_related = '';
            },

            clearHSESpillIncidenceForm()
            {
                this.shec_spill_incidence_mgt.spill_number = '';
                this.shec_spill_incidence_mgt.spill_volume = '';
                this.shec_spill_incidence_mgt.quantity_recoverd = '';
                this.shec_spill_incidence_mgt.jiv_conducted = '';
                this.shec_spill_incidence_mgt.community_issued = '';
            },

            clearHSEWasteManagementForm()
            {
                this.shec_waste_management.tdu_new_application = '';
                this.shec_waste_management.tdu_approval_granted = '';
                this.shec_waste_management.incinerator_new_application = '';
                this.shec_waste_management.incinerator_approval_granted = '';
                this.shec_waste_management.wbm_new_application = '';
                this.shec_waste_management.wbm_approval_granted = '';
                this.shec_waste_management.tank_cleaning_new_application = '';
                this.shec_waste_management.tank_cleaning_approval_granted = '';
                this.shec_waste_management.solid_control_new_application = '';
                this.shec_waste_management.solid_control_approval_granted = '';
                this.shec_waste_management.spill_clean_up_new_application = '';
                this.shec_waste_management.spill_clean_up_approval_granted = '';
                this.shec_waste_management.remediation_new_application = '';
                this.shec_waste_management.remediation_approval_granted = '';
                this.shec_waste_management.produced_water_new_application = '';
                this.shec_waste_management.produced_water_approval_granted = '';
                this.shec_waste_management.waste_slop_new_application = '';
                this.shec_waste_management.waste_slop_approval_granted = '';
            },

            clearHSEOtherReportForm()
            {
                this.shec_other_report.hazop = '';
                this.shec_other_report.rbi = '';
                this.shec_other_report.psv_certification = '';
                this.shec_other_report.leak_test = '';
                this.shec_other_report.rig_inspection = '';
                this.shec_other_report.vessel_inspection = '';
                this.shec_other_report.new_technologies = '';
                this.shec_other_report.conpliance_monitoring = '';
                this.shec_other_report.project_monitoring_activities = '';
                this.shec_other_report.facility_inspection_audit = '';
                this.shec_other_report.safety_training = '';
                this.shec_other_report.permit_withdrawal_cases = '';
            },




           
            setHSEApplicationMonth(month)
            {
                this.shec_application.month = month; 
                this.shec_application.year = this.year_acq;

                this.clearHSEApplicationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/shec_application/' + this.shec_application.month +'/'+ this.shec_application.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('environment_application_receiced');
                         arr.push('environment_application_issued');
                         arr.push('discharge_permit_receiced');
                         arr.push('discharge_permit_issued');
                         arr.push('radiation_safety_permit_receiced');
                         arr.push('radiation_safety_permit_issued');
                         arr.push('safety_case_permit_receiced');
                         arr.push('safety_case_permit_issued');
                         arr.push('lab_accredition_receiced');
                         arr.push('lab_accredition_issued');
                         arr.push('chemical_application_receiced');
                         arr.push('chemical_application_issued');
                         arr.push('registration_application_received');
                         arr.push('registration_application_issued');


                        res.data.forEach((item, index)=>
                        {                  
                          this.shec_application[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addHSEApplicationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.shec_application),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addHSEApplicationRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },
           
            setHSEOSPRegistrationMonth(month)
            {
                this.shec_osp_registration.month = month; 
                this.shec_osp_registration.year = this.year_acq;

                this.clearHSEOSPRegistrationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/shec_osp_registration/' + this.shec_osp_registration.month +'/'+ this.shec_osp_registration.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('personel_captured');
                         arr.push('image_captured');
                         arr.push('permit_issued');


                        res.data.forEach((item, index)=>
                        {                  
                          this.shec_osp_registration[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addHSEOSPRegistrationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.shec_osp_registration),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addHSEOSPRegistrationRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },
           
            setHSEIncidenceMgtMonth(month)
            {
                this.shec_incidence_mgt.month = month; 
                this.shec_incidence_mgt.year = this.year_acq;

                this.clearHSEIncidenceMgtForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/shec_incidence_mgt/' + this.shec_incidence_mgt.month +'/'+ this.shec_incidence_mgt.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('incidence_accident');
                         arr.push('fatal_incidence');
                         arr.push('fatalities');
                         arr.push('work_related');
                         arr.push('non_work_related');


                        res.data.forEach((item, index)=>
                        {                  
                          this.shec_incidence_mgt[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addHSEIncidenceMgtRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.shec_incidence_mgt),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addHSEIncidenceMgtRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },
           
            setHSESpillIncidenceMonth(month)
            {
                this.shec_spill_incidence_mgt.month = month; 
                this.shec_spill_incidence_mgt.year = this.year_acq;

                this.clearHSESpillIncidenceForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/shec_spill_incidence_mgt/' + this.shec_spill_incidence_mgt.month +'/'+ this.shec_spill_incidence_mgt.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('spill_number');
                         arr.push('spill_volume');
                         arr.push('quantity_recoverd');
                         arr.push('jiv_conducted');
                         arr.push('community_issued');


                        res.data.forEach((item, index)=>
                        {                  
                          this.shec_spill_incidence_mgt[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addHSESpillIncidentRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.shec_spill_incidence_mgt),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addHSESpillIncidenceRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },
           
            setHSEWasteManagementMonth(month)
            {
                this.shec_waste_management.month = month; 
                this.shec_waste_management.year = this.year_acq;

                this.clearHSEWasteManagementForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/shec_waste_management/' + this.shec_waste_management.month +'/'+ this.shec_waste_management.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('tdu_new_application');
                         arr.push('tdu_approval_granted');
                         arr.push('incinerator_new_application');
                         arr.push('incinerator_approval_granted');
                         arr.push('wbm_new_application');
                         arr.push('wbm_approval_granted');
                         arr.push('tank_cleaning_new_application');
                         arr.push('tank_cleaning_approval_granted');
                         arr.push('solid_control_new_application');
                         arr.push('solid_control_approval_granted');
                         arr.push('spill_clean_up_new_application');
                         arr.push('spill_clean_up_approval_granted');
                         arr.push('remediation_new_application');
                         arr.push('remediation_approval_granted');
                         arr.push('produced_water_new_application');
                         arr.push('produced_water_approval_granted');
                         arr.push('waste_slop_new_application');
                         arr.push('waste_slop_approval_granted');


                        res.data.forEach((item, index)=>
                        {                  
                          this.shec_waste_management[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addHSEWasteManagementRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.shec_waste_management),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addHSEWasteManagementRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },
           
            setHSEOtherReportMonth(month)
            {
                this.shec_other_report.month = month; 
                this.shec_other_report.year = this.year_acq;

                this.clearHSEOtherReportForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/shec_other_report/' + this.shec_other_report.month +'/'+ this.shec_other_report.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('hazop');
                         arr.push('rbi');
                         arr.push('psv_certification');
                         arr.push('leak_test');
                         arr.push('rig_inspection');
                         arr.push('vessel_inspection');
                         arr.push('new_technologies');
                         arr.push('conpliance_monitoring');
                         arr.push('project_monitoring_activities');
                         arr.push('facility_inspection_audit');
                         arr.push('safety_training');
                         arr.push('permit_withdrawal_cases');


                        res.data.forEach((item, index)=>
                        {                  
                          this.shec_other_report[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addHSEOtherReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.shec_other_report),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addHSEOtherReportRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },




        }
        
    };


</script>

