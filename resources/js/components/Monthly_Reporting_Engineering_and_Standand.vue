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
                            <a class="nav-link" data-toggle="tab" href="#app_es" role="tab" @click="setApplication">APPLICATIONS </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#per" role="tab" @click="setPermit">PERMITS </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#deve" role="tab" @click="setDevelopment">DEVELOPMENT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#mai" role="tab" @click="setMaintenance">MAINTENANCE </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="app_es" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> E&S APPLICATIONS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandApplicationMonth('Annual')"> Annual </button> 
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

                                    <UpstreamExcelExport :data="list_applications" :file_name="'Monthly FDP Application'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="per" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Eng & Standand PERMIT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandPermitRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandPermitMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_permit in list_permits">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_permit.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_permit.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_permits" :file_name="'Monthly Permit'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="deve" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> PROJECTS/FACILITIES DEVELOPMENT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandDevelopmentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandDevelopmentMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_development in list_developments">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_development.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_development.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_developments" :file_name="'Monthly Project Development'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="mai" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> ICT MAINTENANCE & SUPPORT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addEngStandandMaintenanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setEngStandandMaintenanceMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_maintenance in list_maintenances">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_maintenance.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_maintenance.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_maintenances" :file_name="'Monthly Maintenance'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 
                    </div>

                </div>
            </div>
        </div>








        <!-- Add Remarks modal -->
        <form @submit.prevent="addEngStandandApplicationRemarks" class="form-horizontal">
            <div id="addEngStandandApplicationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> E&S Application Count Remark For {{eng_standand_application.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-10 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_application.year" required>
                        </div>
                      </div> 

                      
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Gas Plant-Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.processing_plant_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Gas Plant-Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.processing_plant_issued"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Pet Refinery Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.pet_refinery_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Pet Refinery Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.pet_refinery_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Petrochemicals Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.petrochemical_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Petrochemicals Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.petrochemical_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Oil Facility-Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.oil_facility_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Oil Facility-Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.oil_facility_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Fert Plants-Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.fert_plant_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Fert Plants-Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.fert_plant_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Alt Fuels-Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.alternate_fuel_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Alt Fuels-Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.alternate_fuel_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">PTS-Received </label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.pts_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">PTS-Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.pts_issued"></textarea>
                        </div>
                      </div>    

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">OPLL Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.opll_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">OPLL Issued</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="eng_standand_application.opll_issued"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="eng_standand_application.month">
                            <input type="hidden" class="form-control" v-model="eng_standand_application.type">
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




        <form @submit.prevent="addEngStandandPermitRemarks" class="form-horizontal">
            <div id="addEngStandandPermitRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> E&S Permit Count Remark For {{eng_standand_permit.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_permit.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> General-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_permit.general_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">General-Issued</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_permit.general_issued"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Major Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_permit.major_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Major Issued</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_permit.major_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Specialised Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_permit.specialised_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Specialised Issued</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_permit.specialised_issued"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="eng_standand_permit.month">
                            <input type="hidden" class="form-control" v-model="eng_standand_permit.type">
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



        <form @submit.prevent="addEngStandandDevelopmentRemarks" class="form-horizontal">
            <div id="addEngStandandDevelopmentRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> E&S Development Count Remark For {{eng_standand_development.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_development.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Deep offshore Projects</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_development.deep_offshore_project"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of western Area projects</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_development.western_area_project"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Eastern Area projects</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_development.eastern_area_project"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of Pipeline projects</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_development.pipeline_project"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="eng_standand_development.month">
                            <input type="hidden" class="form-control" v-model="eng_standand_development.type">
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




        <form @submit.prevent="addEngStandandMaintenanceRemarks" class="form-horizontal">
            <div id="addEngStandandMaintenanceRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> E&S mAINTENANCE Count Remark For {{eng_standand_maintenance.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="eng_standand_maintenance.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of system faillures</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.system_failure"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of system faillures Resolved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.system_failure_resolved"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Printer Faillures</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.printer_failure"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Printer Faillures Resolved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.printer_failure_resolved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of application Errors</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.application_error"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of application Errors Resolved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.application_error_resolved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Adhoc Issues</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.adhoc_issues"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Adhoc Issues Resolved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="eng_standand_maintenance.adhoc_issues_resolved"></textarea>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="eng_standand_maintenance.month">
                            <input type="hidden" class="form-control" v-model="eng_standand_maintenance.type">
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
                list_permits: [],
                list_developments: [],
                list_maintenances: [],


                eng_standand_application: {
                    id: '',
                    year: '',
                    month: '',
                    processing_plant_received: '',
                    processing_plant_issued: '',
                    pet_refinery_received: '',
                    pet_refinery_issued: '',
                    petrochemical_received: '',
                    petrochemical_issued: '',
                    oil_facility_received: '',
                    oil_facility_issued: '',
                    fert_plant_received: '',
                    fert_plant_issued: '',
                    alternate_fuel_received: '',
                    alternate_fuel_issued: '',
                    pts_received: '',
                    pts_issued: '',
                    opll_received: '',
                    opll_issued: '',
                    type: 'eng_standand_application'
                },
 
                eng_standand_permit: {
                    id: '',
                    year: '',
                    month: '',
                    general_received: '',
                    general_issued: '',
                    major_received: '',
                    major_issued: '',
                    specialised_received: '',
                    specialised_issued: '',
                    type: 'eng_standand_permit'
                },
 
                eng_standand_development: {
                    id: '',
                    year: '',
                    month: '',
                    deep_offshore_project: '',
                    western_area_project: '',
                    eastern_area_project: '',
                    pipeline_project: '',
                    type: 'eng_standand_development'
                },

                eng_standand_maintenance: {
                    id: '',
                    year: '',
                    month: '',
                    system_failure: '',
                    system_failure_resolved: '',
                    printer_failure: '',
                    printer_failure_resolved: '',
                    application_error: '',
                    application_error_resolved: '',
                    adhoc_issues: '',
                    adhoc_issues_resolved: '',
                    type: 'eng_standand_maintenance'
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
                this.setPermit(); 
                this.setDevelopment(); 
                this.setMaintenance();   
            },





            setApplication()
            {
                let report = '/api/monthly-reportings-es/application_es/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_applications = res;
                })
                .catch(err => console.log(err));            
            },

            setPermit()
            {
                let report = '/api/monthly-reportings-es/permit/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_permits = res;
                })
                .catch(err => console.log(err));            
            },

            setDevelopment()
            {
                let report = '/api/monthly-reportings-es/development_es/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_developments = res;
                })
                .catch(err => console.log(err));            
            },

            setMaintenance()
            {
                let report = '/api/monthly-reportings-es/maintenance_es/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_maintenances = res;
                })
                .catch(err => console.log(err));            
            },







            clearEngStandandApplicationForm()
            {
                this.eng_standand_application.processing_plant_received = '';
                this.eng_standand_application.processing_plant_issued = '';
                this.eng_standand_application.pet_refinery_received = '';
                this.eng_standand_application.pet_refinery_issued = '';
                this.eng_standand_application.petrochemical_received = '';
                this.eng_standand_application.petrochemical_issued = '';
                this.eng_standand_application.oil_facility_received = '';
                this.eng_standand_application.oil_facility_issued = '';
                this.eng_standand_application.fert_plant_received = '';
                this.eng_standand_application.fert_plant_issued = '';
                this.eng_standand_application.alternate_fuel_received = '';
                this.eng_standand_application.alternate_fuel_issued = '';
                this.eng_standand_application.pts_received = '';
                this.eng_standand_application.pts_issued = '';
                this.eng_standand_application.opll_received = '';
                this.eng_standand_application.opll_issued = '';
            },

            clearEngStandandPermitForm()
            {
                this.eng_standand_permit.general_received = '';
                this.eng_standand_permit.general_issued = '';
                this.eng_standand_permit.major_received = '';
                this.eng_standand_permit.major_issued = '';
                this.eng_standand_permit.specialised_received = '';
                this.eng_standand_permit.specialised_issued = '';
            },

            clearEngStandandDevelopmentForm()
            {
                this.eng_standand_development.deep_offshore_project = '';
                this.eng_standand_development.western_area_project = '';
                this.eng_standand_development.eastern_area_project = '';
                this.eng_standand_development.pipeline_project = '';
            },

            clearEngStandandMaintenanceForm()
            {
                this.eng_standand_maintenance.system_failure = '';
                this.eng_standand_maintenance.system_failure_resolved = '';
                this.eng_standand_maintenance.printer_failure = '';
                this.eng_standand_maintenance.printer_failure_resolved = '';
                this.eng_standand_maintenance.application_error = '';
                this.eng_standand_maintenance.application_error_resolved = '';
                this.eng_standand_maintenance.adhoc_issues = '';
                this.eng_standand_maintenance.adhoc_issues_resolved = '';
            },





            setEngStandandApplicationMonth(month)
            {
                this.eng_standand_application.month = month; 
                this.eng_standand_application.year = this.year_acq;

                this.clearEngStandandApplicationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/eng_standand_application/' + this.eng_standand_application.month +'/'+ this.eng_standand_application.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('processing_plant_received');
                         arr.push('processing_plant_issued');
                         arr.push('pet_refinery_received');
                         arr.push('pet_refinery_issued');
                         arr.push('petrochemical_received');
                         arr.push('petrochemical_issued');
                         arr.push('oil_facility_received');
                         arr.push('oil_facility_issued');
                         arr.push('fert_plant_received');
                         arr.push('fert_plant_issued');
                         arr.push('alternate_fuel_received');
                         arr.push('alternate_fuel_issued');
                         arr.push('pts_received');
                         arr.push('pts_issued');
                         arr.push('opll_received');
                         arr.push('opll_issued');


                        res.data.forEach((item, index)=>
                        {                  
                          this.eng_standand_application[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addEngStandandApplicationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.eng_standand_application),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addEngStandandApplicationRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },



            setEngStandandPermitMonth(month)
            {
                this.eng_standand_permit.month = month; 
                this.eng_standand_permit.year = this.year_acq;

                this.clearEngStandandPermitForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/eng_standand_permit/' + this.eng_standand_permit.month +'/'+ this.eng_standand_permit.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('general_received');
                         arr.push('general_issued');
                         arr.push('major_received');
                         arr.push('major_issued');
                         arr.push('specialised_received');
                         arr.push('specialised_issued');


                        res.data.forEach((item, index)=>
                        {                  
                          this.eng_standand_permit[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addEngStandandPermitRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.eng_standand_permit),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addEngStandandPermitRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },



            setEngStandandPermitMonth(month)
            {
                this.eng_standand_permit.month = month; 
                this.eng_standand_permit.year = this.year_acq;

                this.clearEngStandandPermitForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/eng_standand_permit/' + this.eng_standand_permit.month +'/'+ this.eng_standand_permit.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('general_received');
                         arr.push('general_issued');
                         arr.push('major_received');
                         arr.push('major_issued');
                         arr.push('specialised_received');
                         arr.push('specialised_issued');


                        res.data.forEach((item, index)=>
                        {                  
                          this.eng_standand_permit[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addEngStandandPermitRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.eng_standand_permit),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addEngStandandPermitRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },



            setEngStandandDevelopmentMonth(month)
            {
                this.eng_standand_development.month = month; 
                this.eng_standand_development.year = this.year_acq;

                this.clearEngStandandDevelopmentForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/eng_standand_development/' + this.eng_standand_development.month +'/'+ this.eng_standand_development.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('deep_offshore_project');
                         arr.push('western_area_project');
                         arr.push('eastern_area_project');
                         arr.push('pipeline_project');


                        res.data.forEach((item, index)=>
                        {                  
                          this.eng_standand_development[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addEngStandandDevelopmentRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.eng_standand_development),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addEngStandandDevelopmentRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },



            setEngStandandMaintenanceMonth(month)
            {
                this.eng_standand_maintenance.month = month; 
                this.eng_standand_maintenance.year = this.year_acq;

                this.clearEngStandandMaintenanceForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/eng_standand_maintenance/' + this.eng_standand_maintenance.month +'/'+ this.eng_standand_maintenance.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('system_failure');
                         arr.push('system_failure_resolved');
                         arr.push('printer_failure');
                         arr.push('printer_failure_resolved');
                         arr.push('application_error');
                         arr.push('application_error_resolved');
                         arr.push('adhoc_issues');
                         arr.push('adhoc_issues_resolved');


                        res.data.forEach((item, index)=>
                        {                  
                          this.eng_standand_maintenance[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addEngStandandMaintenanceRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.eng_standand_maintenance),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addEngStandandMaintenanceRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },





        }
        
    };


</script>

