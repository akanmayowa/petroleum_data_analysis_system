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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For Downstream Division </h4>
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
                            <a class="nav-link" data-toggle="tab" href="#rom" role="tab" @click="setROM">ROM </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#lic" role="tab" @click="setLicense">LICENSE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sur" role="tab" @click="setSurveillance">SURVEILLANCE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab">DEPOT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pro" role="tab" @click="setProductImport">PRODUCT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ref_prod" role="tab">PRODUCTION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ref_perf" role="tab">PERFORMANCE </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#t_out" role="tab" @click="setTruckOut">TRUCK OUT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seg" role="tab">MARKET </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ops" role="tab">OPERATIONS </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="rom" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> ROM APPLICATIONS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('January', 'rom_application')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('February', 'RomApplication')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('March', 'RomApplication')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('Qrt 1', 'RomApplication')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('April', 'RomApplication')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('May', 'RomApplication')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('June', 'RomApplication')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('Qrt 2 ', 'RomApplication')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('Mid-year', 'RomApplication')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('July', 'RomApplication')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('August', 'RomApplication')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('September', 'RomApplication')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('Qrt 3', 'RomApplication')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('October', 'RomApplication')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('November', 'RomApplication')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('December', 'RomApplication')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('Qrt 4', 'RomApplication')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRomApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRomApplicationMonth('Annual', 'RomApplication')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_rom in list_roms">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_rom.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rom.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_roms" :file_name="'Monthly ROM'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="lic" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> LICENSES </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('January', 'License')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('February', 'License')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('March', 'License')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('Qrt 1', 'License')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('April', 'License')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('May', 'License')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('June', 'License')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('Qrt 2 ', 'License')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('Mid-year', 'License')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('July', 'License')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('August', 'License')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('September', 'License')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('Qrt 3', 'License')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('October', 'License')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('November', 'License')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('December', 'License')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('Qrt 4', 'License')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLicenseRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLicenseMonth('Annual', 'License')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_license in list_licenses">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_license.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_license.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_licenses" :file_name="'Monthly License'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="sur" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> SURVEILLANCE </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('January', 'Surveillance')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('February', 'Surveillance')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('March', 'Surveillance')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('Qrt 1', 'Surveillance')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('April', 'Surveillance')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('May', 'Surveillance')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('June', 'Surveillance')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('Qrt 2 ', 'Surveillance')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('Mid-year', 'Surveillance')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('July', 'Surveillance')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('August', 'Surveillance')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('September', 'Surveillance')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('Qrt 3', 'Surveillance')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('October', 'Surveillance')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('November', 'Surveillance')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('December', 'Surveillance')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('Qrt 4', 'Surveillance')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addSurveillanceRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setSurveillanceMonth('Annual', 'Surveillance')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_surveillance in list_surveillances">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_surveillance.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_surveillance.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_surveillances" :file_name="'Monthly Surveillance'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#d_sto" role="tab" @click="setDepotStock">DEPOT STOCK LEVEL</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#d_app" role="tab" @click="setDepotApplication">DEPOT APPLICATIONS</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="d_sto" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> DEPOT STOCK LEVEL </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('January', 'DepotStock')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('February', 'DepotStock')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('March', 'DepotStock')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('Qrt 1', 'DepotStock')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('April', 'DepotStock')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('May', 'DepotStock')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('June', 'DepotStock')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('Qrt 2 ', 'DepotStock')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('Mid-year', 'DepotStock')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('July', 'DepotStock')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('August', 'DepotStock')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('September', 'DepotStock')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('Qrt 3', 'DepotStock')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('October', 'DepotStock')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('November', 'DepotStock')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('December', 'DepotStock')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('Qrt 4', 'DepotStock')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotStockRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotStockMonth('Annual', 'DepotStock')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_depot_stock in list_depot_stocks">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_depot_stock.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_stock.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                    <UpstreamExcelExport :data="list_depot_stocks" :file_name="'Monthly Depot Stock Level'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="d_app" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> DEPOT APPLICATION </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('January', 'DepotApplication')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('February', 'DepotApplication')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('March', 'DepotApplication')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('Qrt 1', 'DepotApplication')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('April', 'DepotApplication')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('May', 'DepotApplication')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('June', 'DepotApplication')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('Qrt 2 ', 'DepotApplication')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('Mid-year', 'DepotApplication')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('July', 'DepotApplication')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('August', 'DepotApplication')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('September', 'DepotApplication')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('Qrt 3', 'DepotApplication')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('October', 'DepotApplication')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('November', 'DepotApplication')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('December', 'DepotApplication')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('Qrt 4', 'DepotApplication')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepotApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepotApplicationMonth('Annual', 'DepotApplication')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_depot_application in list_depot_applications">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_depot_application.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depot_application.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                        <UpstreamExcelExport :data="list_depot_applications" :file_name="'Monthly Depot Application'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 
                            </div> 








                            
                        </div>

                        <div class="tab-pane p-3" id="pro" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> PRODUCT IMPORT  </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('January', 'ProductImport')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('February', 'ProductImport')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('March', 'ProductImport')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('Qrt 1', 'ProductImport')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('April', 'ProductImport')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('May', 'ProductImport')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('June', 'ProductImport')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('Qrt 2 ', 'ProductImport')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('Mid-year', 'ProductImport')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('July', 'ProductImport')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('August', 'ProductImport')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('September', 'ProductImport')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('Qrt 3', 'ProductImport')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('October', 'ProductImport')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('November', 'ProductImport')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('December', 'ProductImport')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('Qrt 4', 'ProductImport')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addProductImportRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setProductImportMonth('Annual', 'ProductImport')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_product_import in list_product_imports">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_product_import.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_product_import.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_product_imports" :file_name="'Monthly Product Import'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>



                        <div class="tab-pane p-3" id="ref_prod" role="tabpanel" style="">
                            
                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#krcp" role="tab" @click="setProductionKRPC">Kaduna Refinery (KRPC)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#wrcp" role="tab" @click="setProductionWRPC">Warri Refinery (WRPC)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#phrc_old" role="tab" @click="setProductionPHRC_old">Old Port Harcourt Refinery</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#phrc_new" role="tab" @click="setProductionPHRC_new">New Port Harcourt Refinery</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#total" role="tab" @click="setProductionTotal">Refinery Total</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="krcp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> Kaduna Refinery (KRPC) </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('January', 'RefineryKRPC')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('February', 'RefineryKRPC')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('March', 'RefineryKRPC')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('Qrt 1', 'RefineryKRPC')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('April', 'RefineryKRPC')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('May', 'RefineryKRPC')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('June', 'RefineryKRPC')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('Qrt 2 ', 'RefineryKRPC')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('Mid-year', 'RefineryKRPC')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('July', 'RefineryKRPC')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('August', 'RefineryKRPC')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('September', 'RefineryKRPC')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('Qrt 3', 'RefineryKRPC')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('October', 'RefineryKRPC')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('November', 'RefineryKRPC')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('December', 'RefineryKRPC')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('Qrt 4', 'RefineryKRPC')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryKRPCMonth('Annual', 'RefineryKRPC')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_productionKRPC in list_productionKRPCs">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_productionKRPC.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionKRPC.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_productionKRPCs" :file_name="'Monthly Kaduna Refinery'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="wrcp" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> Warri Refinery (WRPC) </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('January', 'RefineryWRPC')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('February', 'RefineryWRPC')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('March', 'RefineryWRPC')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('Qrt 1', 'RefineryWRPC')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('April', 'RefineryWRPC')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('May', 'RefineryWRPC')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('June', 'RefineryWRPC')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('Qrt 2 ', 'RefineryWRPC')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('Mid-year', 'RefineryWRPC')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('July', 'RefineryWRPC')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('August', 'RefineryWRPC')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('September', 'RefineryWRPC')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('Qrt 3', 'RefineryWRPC')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('October', 'RefineryWRPC')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('November', 'RefineryWRPC')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('December', 'RefineryWRPC')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('Qrt 4', 'RefineryWRPC')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryWRPCMonth('Annual', 'RefineryWRPC')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_productionWRPC in list_productionWRPCs">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_productionWRPC.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionWRPC.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_productionWRPCs" :file_name="'Monthly Warri Refinery'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="phrc_old" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> Old Port Harcourt Refinery </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('January', 'RefineryPHRCOld')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('February', 'RefineryPHRCOld')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('March', 'RefineryPHRCOld')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('Qrt 1', 'RefineryPHRCOld')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('April', 'RefineryPHRCOld')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('May', 'RefineryPHRCOld')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('June', 'RefineryPHRCOld')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('Qrt 2 ', 'RefineryPHRCOld')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('Mid-year', 'RefineryPHRCOld')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('July', 'RefineryPHRCOld')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('August', 'RefineryPHRCOld')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('September', 'RefineryPHRCOld')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('Qrt 3', 'RefineryPHRCOld')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('October', 'RefineryPHRCOld')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('November', 'RefineryPHRCOld')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('December', 'RefineryPHRCOld')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('Qrt 4', 'RefineryPHRCOld')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCOldMonth('Annual', 'RefineryPHRCOld')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_productionPHRC_old in list_productionPHRC_olds">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_productionPHRC_old.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_old.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_productionPHRC_olds" :file_name="'Monthly Old Port Harcourt Refinery'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="phrc_new" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> New Port Harcourt Refinery </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('January', 'RefineryPHRCNew')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('February', 'RefineryPHRCNew')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('March', 'RefineryPHRCNew')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('Qrt 1', 'RefineryPHRCNew')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('April', 'RefineryPHRCNew')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('May', 'RefineryPHRCNew')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('June', 'RefineryPHRCNew')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('Qrt 2 ', 'RefineryPHRCNew')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('Mid-year', 'RefineryPHRCNew')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('July', 'RefineryPHRCNew')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('August', 'RefineryPHRCNew')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('September', 'RefineryPHRCNew')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('Qrt 3', 'RefineryPHRCNew')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('October', 'RefineryPHRCNew')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('November', 'RefineryPHRCNew')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('December', 'RefineryPHRCNew')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('Qrt 4', 'RefineryPHRCNew')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryPHRCNewMonth('Annual', 'RefineryPHRCNew')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_productionPHRC_new in list_productionPHRC_news">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_productionPHRC_new.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionPHRC_new.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_productionPHRC_news" :file_name="'Monthly New Port Harcourt Refinery'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 
   

                                <div class="tab-pane p-3" id="total" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title">  Refinery Total </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('January', 'RefineryTotal')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('February', 'RefineryTotal')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('March', 'RefineryTotal')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('Qrt 1', 'RefineryTotal')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('April', 'RefineryTotal')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('May', 'RefineryTotal')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('June', 'RefineryTotal')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('Qrt 2 ', 'RefineryTotal')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('Mid-year', 'RefineryTotal')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('July', 'RefineryTotal')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('August', 'RefineryTotal')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('September', 'RefineryTotal')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('Qrt 3', 'RefineryTotal')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('October', 'RefineryTotal')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('November', 'RefineryTotal')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('December', 'RefineryTotal')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('Qrt 4', 'RefineryTotal')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRefineryTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRefineryTotalMonth('Annual', 'RefineryTotal')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_productionTotal in list_productionTotals">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_productionTotal.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_productionTotal.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_productionTotals" :file_name="'Monthly Refinery Total'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>
                            </div> 
                        </div>


                        <div class="tab-pane p-3" id="ref_perf" role="tabpanel">

                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#util_wrpc" role="tab" @click="setUtilizationWRPC">WRPC Perf Utilization</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#util_krpc" role="tab" @click="setUtilizationKRPC">KRPC Perf Utilization</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#util_phrc_new" role="tab" @click="setUtilizationPHRC_new">PHRC NEW Perf Utilization</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#util_ndpr" role="tab" @click="setUtilizationNDPR">NDPR Perf Utilization</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#util_phrc_old" role="tab" @click="setUtilizationPHRC_old">PHRC OLD Perf Utilization</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#perf_tot" role="tab" @click="setUtilizationTotal">Total</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="util_wrpc" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> WRPC Perf Utilization </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('January', 'UtilizationWRPC')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('February', 'UtilizationWRPC')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('March', 'UtilizationWRPC')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('Qrt 1', 'UtilizationWRPC')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('April', 'UtilizationWRPC')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('May', 'UtilizationWRPC')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('June', 'UtilizationWRPC')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('Qrt 2 ', 'UtilizationWRPC')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('Mid-year', 'UtilizationWRPC')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('July', 'UtilizationWRPC')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('August', 'UtilizationWRPC')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('September', 'UtilizationWRPC')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('Qrt 3', 'UtilizationWRPC')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('October', 'UtilizationWRPC')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('November', 'UtilizationWRPC')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('December', 'UtilizationWRPC')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('Qrt 4', 'UtilizationWRPC')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationWRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationWRPCMonth('Annual', 'UtilizationWRPC')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_utilization_WRPC in list_utilization_WRPCs">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_utilization_WRPC.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_WRPC.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_utilization_WRPCs" :file_name="'Monthly WRPC Perf Util'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="util_krpc" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> KRPC Perf Utilization </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('January', 'UtilizationKRPC')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('February', 'UtilizationKRPC')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('March', 'UtilizationKRPC')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('Qrt 1', 'UtilizationKRPC')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('April', 'UtilizationKRPC')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('May', 'UtilizationKRPC')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('June', 'UtilizationKRPC')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('Qrt 2 ', 'UtilizationKRPC')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('Mid-year', 'UtilizationKRPC')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('July', 'UtilizationKRPC')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('August', 'UtilizationKRPC')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('September', 'UtilizationKRPC')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('Qrt 3', 'UtilizationKRPC')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('October', 'UtilizationKRPC')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('November', 'UtilizationKRPC')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('December', 'UtilizationKRPC')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('Qrt 4', 'UtilizationKRPC')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationKRPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationKRPCMonth('Annual', 'UtilizationKRPC')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_utilization_KRPC in list_utilization_KRPCs">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_utilization_KRPC.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_KRPC.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                    <UpstreamExcelExport :data="list_utilization_KRPCs" :file_name="'Monthly KRPC Perf Util'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="util_phrc_new" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> PHRC NEW Perf Utilization </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('January', 'UtilizationPHRCNew')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('February', 'UtilizationPHRCNew')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('March', 'UtilizationPHRCNew')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('Qrt 1', 'UtilizationPHRCNew')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('April', 'UtilizationPHRCNew')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('May', 'UtilizationPHRCNew')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('June', 'UtilizationPHRCNew')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('Qrt 2 ', 'UtilizationPHRCNew')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('Mid-year', 'UtilizationPHRCNew')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('July', 'UtilizationPHRCNew')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('August', 'UtilizationPHRCNew')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('September', 'UtilizationPHRCNew')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('Qrt 3', 'UtilizationPHRCNew')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('October', 'UtilizationPHRCNew')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('November', 'UtilizationPHRCNew')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('December', 'UtilizationPHRCNew')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('Qrt 4', 'UtilizationPHRCNew')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCNewRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCNewMonth('Annual', 'UtilizationPHRCNew')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_utilization_PHRC_new in list_utilization_PHRC_news">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_utilization_PHRC_new.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_new.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_utilization_PHRC_news" :file_name="'Monthly New PHRC Perf Util'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="util_ndpr" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> NDPR Perf Utilization </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('January', 'UtilizationNDPR')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('February', 'UtilizationNDPR')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('March', 'UtilizationNDPR')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('Qrt 1', 'UtilizationNDPR')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('April', 'UtilizationNDPR')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('May', 'UtilizationNDPR')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('June', 'UtilizationNDPR')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('Qrt 2 ', 'UtilizationNDPR')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('Mid-year', 'UtilizationNDPR')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('July', 'UtilizationNDPR')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('August', 'UtilizationNDPR')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('September', 'UtilizationNDPR')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('Qrt 3', 'UtilizationNDPR')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('October', 'UtilizationNDPR')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('November', 'UtilizationNDPR')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('December', 'UtilizationNDPR')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('Qrt 4', 'UtilizationNDPR')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationNDPRRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationNDPRMonth('Annual', 'UtilizationNDPR')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_utilization_NDPR in list_utilization_NDPRs">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_utilization_NDPR.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_NDPR.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_utilization_NDPRs" :file_name="'Monthly FDP Application'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="util_phrc_old" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> PHRC OLD Perf Utilization </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('January', 'UtilizationPHRCOld')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('February', 'UtilizationPHRCOld')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('March', 'UtilizationPHRCOld')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('Qrt 1', 'UtilizationPHRCOld')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('April', 'UtilizationPHRCOld')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('May', 'UtilizationPHRCOld')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('June', 'UtilizationPHRCOld')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('Qrt 2 ', 'UtilizationPHRCOld')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('Mid-year', 'UtilizationPHRCOld')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('July', 'UtilizationPHRCOld')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('August', 'UtilizationPHRCOld')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('September', 'UtilizationPHRCOld')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('Qrt 3', 'UtilizationPHRCOld')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('October', 'UtilizationPHRCOld')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('November', 'UtilizationPHRCOld')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('December', 'UtilizationPHRCOld')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('Qrt 4', 'UtilizationPHRCOld')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationPHRCOldRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationPHRCOldMonth('Annual', 'UtilizationPHRCOld')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_utilization_PHRC_old in list_utilization_PHRC_olds">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_utilization_PHRC_old.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_PHRC_old.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_utilization_PHRC_olds" :file_name="'Monthly Old PHRC Perf Util'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 

                                <div class="tab-pane p-3" id="perf_tot" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> Perfomance Utilization Total </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('January', 'UtilizationTotal')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('February', 'UtilizationTotal')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('March', 'UtilizationTotal')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('Qrt 1', 'UtilizationTotal')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('April', 'UtilizationTotal')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('May', 'UtilizationTotal')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('June', 'UtilizationTotal')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('Qrt 2 ', 'UtilizationTotal')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('Mid-year', 'UtilizationTotal')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('July', 'UtilizationTotal')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('August', 'UtilizationTotal')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('September', 'UtilizationTotal')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('Qrt 3', 'UtilizationTotal')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('October', 'UtilizationTotal')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('November', 'UtilizationTotal')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('December', 'UtilizationTotal')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('Qrt 4', 'UtilizationTotal')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUtilizationTotalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUtilizationTotalMonth('Annual', 'UtilizationTotal')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_utilization_total in list_utilization_totals">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_utilization_total.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization_total.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_utilization_totals" :file_name="'Monthly Total Perf Util'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 
                            </div>

                        </div>

                        <div class="tab-pane p-3" id="t_out" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Depot Truck Out </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('January', 'DepotOut')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('February', 'DepotOut')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('March', 'DepotOut')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('Qrt 1', 'DepotOut')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('April', 'DepotOut')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('May', 'DepotOut')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('June', 'DepotOut')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('Qrt 2 ', 'DepotOut')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('Mid-year', 'DepotOut')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('July', 'DepotOut')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('August', 'DepotOut')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('September', 'DepotOut')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('Qrt 3', 'DepotOut')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('October', 'DepotOut')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('November', 'DepotOut')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('December', 'DepotOut')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('Qrt 4', 'DepotOut')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTruckOutRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTruckOutMonth('Annual', 'DepotOut')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_truck_out in list_truck_outs">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_truck_out.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_truck_out.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_truck_outs" :file_name="'Monthly Depot Truck Out'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>


                        <div class="tab-pane p-3" id="seg" role="tabpanel">

                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#seg_nnpc" role="tab" @click="setMarketNNPC">Market Segment NNPC</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#seg_maj" role="tab" @click="setMarketMajor">Market Segment Major Marketers</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#seg_ind" role="tab" @click="setMarketIndependent">Market Segment Independent Marketer</a>
                                </li>
                            </ul>

                            <div class="tab-content">                        

                                <div class="tab-pane p-3" id="seg_nnpc" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> MARKET SEGMENT NNPC </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('January', 'MktSegmentNNPC')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('February', 'MktSegmentNNPC')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('March', 'MktSegmentNNPC')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('Qrt 1', 'MktSegmentNNPC')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('April', 'MktSegmentNNPC')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('May', 'MktSegmentNNPC')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('June', 'MktSegmentNNPC')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('Qrt 2 ', 'MktSegmentNNPC')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('Mid-year', 'MktSegmentNNPC')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('July', 'MktSegmentNNPC')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('August', 'MktSegmentNNPC')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('September', 'MktSegmentNNPC')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('Qrt 3', 'MktSegmentNNPC')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('October', 'MktSegmentNNPC')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('November', 'MktSegmentNNPC')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('December', 'MktSegmentNNPC')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('Qrt 4', 'MktSegmentNNPC')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentNNPCRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentNNPCMonth('Annual', 'MktSegmentNNPC')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_market_nnpc in list_market_nnpcs">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_market_nnpc.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_nnpc.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_market_nnpcs" :file_name="'Monthly Market Segment - NNPC'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="seg_maj" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> MAJOR MARKETER </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('January', 'MktSegmentMajor')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('February', 'MktSegmentMajor')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('March', 'MktSegmentMajor')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('Qrt 1', 'MktSegmentMajor')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('April', 'MktSegmentMajor')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('May', 'MktSegmentMajor')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('June', 'MktSegmentMajor')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('Qrt 2 ', 'MktSegmentMajor')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('Mid-year', 'MktSegmentMajor')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('July', 'MktSegmentMajor')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('August', 'MktSegmentMajor')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('September', 'MktSegmentMajor')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('Qrt 3', 'MktSegmentMajor')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('October', 'MktSegmentMajor')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('November', 'MktSegmentMajor')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('December', 'MktSegmentMajor')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('Qrt 4', 'MktSegmentMajor')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentMajorRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentMajorMonth('Annual', 'MktSegmentMajor')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_market_major in list_market_majors">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_market_major.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_major.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_market_majors" :file_name="'Monthly Market Segment - Major'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>

                                <div class="tab-pane p-3" id="seg_ind" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> INDEPENDENT MARKETER </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('January', 'MktSegmentIndependent')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('February', 'MktSegmentIndependent')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('March', 'MktSegmentIndependent')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('Qrt 1', 'MktSegmentIndependent')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('April', 'MktSegmentIndependent')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('May', 'MktSegmentIndependent')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('June', 'MktSegmentIndependent')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('Qrt 2 ', 'MktSegmentIndependent')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('Mid-year', 'MktSegmentIndependent')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('July', 'MktSegmentIndependent')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('August', 'MktSegmentIndependent')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('September', 'MktSegmentIndependent')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('Qrt 3', 'MktSegmentIndependent')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('October', 'MktSegmentIndependent')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('November', 'MktSegmentIndependent')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('December', 'MktSegmentIndependent')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('Qrt 4', 'MktSegmentIndependent')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMktSegmentIndependentRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMktSegmentIndependentMonth('Annual', 'MktSegmentIndependent')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_market_independent in list_market_independents">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_market_independent.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_market_independent.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_market_independents" :file_name="'Monthly Market Segment - Independent'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>

                            </div>
                        </div>


                        <div class="tab-pane p-3" id="ops" role="tabpanel">

                            <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#term_ops" role="tab" @click="setTerminalOperation">TERMINAL OPERATION</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#ops_app" role="tab" @click="setTerminalOperationApplication">OPERATION APPLICATION</a>
                                </li>
                            </ul>

                            <div class="tab-content">  
                                <div class="tab-pane p-3" id="term_ops" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> CRUDE OIL TERMINAL OPERATION </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('January', 'TerminalOperation')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('February', 'TerminalOperation')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('March', 'TerminalOperation')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('Qrt 1', 'TerminalOperation')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('April', 'TerminalOperation')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('May', 'TerminalOperation')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('June', 'TerminalOperation')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('Qrt 2 ', 'TerminalOperation')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('Mid-year', 'TerminalOperation')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('July', 'TerminalOperation')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('August', 'TerminalOperation')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('September', 'TerminalOperation')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('Qrt 3', 'TerminalOperation')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('October', 'TerminalOperation')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('November', 'TerminalOperation')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('December', 'TerminalOperation')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('Qrt 4', 'TerminalOperation')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addTerminalOperationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setTerminalOperationMonth('Annual', 'TerminalOperation')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_terminal_operation in list_terminal_operations">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_terminal_operation.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_terminal_operations" :file_name="'Monthly Crud  Terminal Ops'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div>  

                                <div class="tab-pane p-3" id="ops_app" role="tabpanel">
                                    <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                    <tr style="background-color: #fff; color: #202020">
                                                        <th style="width: 15%"> <h4 class="mt-0 header-title"> OIL TERMINAL OPERATION APPLICATION </h4> </th>
                                                        <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('January', 'OperationApplication')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('February', 'OperationApplication')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('March', 'OperationApplication')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('Qrt 1', 'OperationApplication')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('April', 'OperationApplication')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('May', 'OperationApplication')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('June', 'OperationApplication')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('Qrt 2 ', 'OperationApplication')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('Mid-year', 'OperationApplication')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('July', 'OperationApplication')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('August', 'OperationApplication')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('September', 'OperationApplication')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('Qrt 3', 'OperationApplication')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('October', 'OperationApplication')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('November', 'OperationApplication')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('December', 'OperationApplication')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('Qrt 4', 'OperationApplication')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addOperationApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setOperationApplicationMonth('Annual', 'OperationApplication')"> Annual </button> 
                                                </th>
                                                    </tr>
                                                </thead>

                                                <tbody v-for="list_terminal_operation_application in list_terminal_operation_applications">
                                                    <tr style="background: #fff; color: #202020">
                                                        <th> {{list_terminal_operation_application.name}} </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.jan" />
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.feb" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.mar" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.qrt1" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.apr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.may" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.jun" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.qrt2" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.m_yr" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.jul" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.aug" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.sep" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.qrt3" /> 
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.oct" /> 
                                                         </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.nov" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.dec" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.qrt4" /> 
                                                        </th>
                                                        <th> 
                                                            <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_terminal_operation_application.ann" /> 
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="19">
                                                            <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                        </th>
                                                    </tr>
                                                </tbody>                                        
                                            </table>

                                            <UpstreamExcelExport :data="list_terminal_operation_applications" :file_name="'Monthly Oil Terminal Ops'"></UpstreamExcelExport>

                                        </div> <!-- end col -->
                                    </p>
                                </div> 
                            </div>

                        </div>





                    </div>

                </div>
            </div>
        </div>









        <!-- Add Remarks modal -->
        <form @submit.prevent="addRomApplicationRemark" class="form-horizontal">
            <div id="addRomApplicationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Rom Application Remark For {{rom_application.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="rom_application.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Suitability Insp-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.suitability_inspection_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Suitability Insp-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.suitability_inspection_approved"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATC- Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.atc_received"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATC- Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.atc_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Pressure test -Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.pressure_test_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Pressure test -Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.pressure_test_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Burial- Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.tank_buried_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Burial- Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.tank_buried_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Leak Test- Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.leak_detection_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Leak Test- Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.leak_detection_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Final insp -Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.final_inspection_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Final insp -Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.final_inspection_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Renewal insp- Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.renewal_inspection_received"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Renewal insp- Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.renewal_inspection_approved"></textarea>
                        </div>
                      </div>    

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Vessel License- Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.vessel_license_received"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Vessel License- Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rom_application.vessel_license_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="rom_application.month">
                            <input type="hidden" class="form-control" v-model="rom_application.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addLicenseRemarks" class="form-horizontal">
            <div id="addLicenseRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Licenses Count Remark For {{downstream_license.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_license.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Catigory A- New</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.category_a_new"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory A- Renewal</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.category_a_renewal"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory B- New</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.category_b_new"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory B- Renewal</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.category_b_renewal"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory C- New</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.category_c_new"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Catigory C- Renewal</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.category_c_renewal"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total CAT A</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.total_cat_a"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total CAT B</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.total_cat_b"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total CAT C</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_license.total_cat_c"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_license.month">
                            <input type="hidden" class="form-control" v-model="downstream_license.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addSurveillanceRemarks" class="form-horizontal">
            <div id="addSurveillanceRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Surveillance Count Remark For {{downstream_surveillance.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_surveillance.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> station visited</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.station_visited"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Station With PMS</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.station_with_pms"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for under Dispensing</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.sealed_under_dispensing"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Over Pricing</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.sealed_for_over_price"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Hoarding</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.sealed_for_hoarding"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Diversion</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.sealed_for_diversion"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sealed for Violation of seal</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.sealed_for_violation_of_seal"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Others</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.other"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total Station Sealed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_surveillance.total_station_sealed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_surveillance.month">
                            <input type="hidden" class="form-control" v-model="downstream_surveillance.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addDepotStockRemarks" class="form-horizontal">
            <div id="addDepotStockRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Depot Stock Count Remark For {{downstream_depot_stock.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_depot_stock.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS Opening Stock -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.pms_open_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PMS Reciept -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.pms_reciept"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PMS Lifting/Tranfers -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.pms_lifting_transfer"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PMS Closing Stock -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.pms_closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Opening Stock -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.dpk_open_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Reciept -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.dpk_reciept"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Lifting/Tranfers -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.dpk_lifting_transfer"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK Closing Stock -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.dpk_closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Opening Stock -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.ago_open_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Reciept -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.ago_reciept"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Lifting/Tranfers -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.ago_lifting_transfer"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO Closing Stock -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_stock.ago_closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_depot_stock.month">
                            <input type="hidden" class="form-control" v-model="downstream_depot_stock.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addDepotApplicationRemarks" class="form-horizontal">
            <div id="addDepotApplicationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Depot Application Count Remark For {{downstream_depot_application.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label"> Date </label>
                        <div class="col-sm-10 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_depot_application.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Proposal Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.proposal_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Proposal Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.proposal_approved"></textarea>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Presentation Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.presentation_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">presentation Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.presentation_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Assesment Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.assessment_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Assesment Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.assessment_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ATC Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.atc_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">ATC Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.atc_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Test Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.presure_test_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Test Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.presure_test_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Calibration Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.calibration_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Calibration Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.calibration_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Final Inspection Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.final_inspection_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Final Inspection Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.final_inspection_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Renewal Inspection Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.renewal_inspection_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Renewal Inspection Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.renewal_inspection_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">New LTO Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.new_lto_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">New LTO Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.new_lto_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Renewal LTO Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.renewal_lto_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Renewal LTO Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.renewal_lto_approved"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Permit Received</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.import_permit_received"></textarea>
                        </div>

                        <label for="" class="col-sm-2 col-form-label">Permit Approved</label>
                        <div class="col-sm-4">
                            <textarea rows="2" class="form-control" v-model="downstream_depot_application.import_permit_approved"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_depot_application.month">
                            <input type="hidden" class="form-control" v-model="downstream_depot_application.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addProductImportRemarks" class="form-horizontal">
            <div id="addProductImportRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Product Import Count Remark For {{downstream_product_import.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_product_import.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_product_import.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_product_import.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_product_import.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_product_import.atk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_product_import.month">
                            <input type="hidden" class="form-control" v-model="downstream_product_import.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addRefineryKRPCRemarks" class="form-horizontal">
            <div id="addRefineryKRPCRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery KRPC Count Remark For {{downstream_refinery_krpc.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_krpc.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_krpc.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_krpc.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_krpc.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_krpc.atk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_krpc.fuel_oil"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_krpc.month">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_krpc.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addRefineryWRPCRemarks" class="form-horizontal">
            <div id="addRefineryWRPCRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery WRPC Count Remark For {{downstream_refinery_wrpc.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_wrpc.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_wrpc.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_wrpc.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_wrpc.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_wrpc.atk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_wrpc.fuel_oil"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_wrpc.month">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_wrpc.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addRefineryPHRCOldRemarks" class="form-horizontal">
            <div id="addRefineryPHRCOldRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> RefineryPHRCOld Count Remark For {{downstream_refinery_phrc_old.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_phrc_old.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_phrc_old.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_phrc_old.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_phrc_old.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_phrc_old.atk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_phrc_old.fuel_oil"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_phrc_old.month">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_phrc_old.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addRefineryPHRCNewRemarks" class="form-horizontal">
            <div id="addRefineryPHRCNewRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery PHRC New Count Remark For {{downstream_refinery_phrc_new.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_phrc_new.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_phrc_new.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_phrc_new.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_phrc_new.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_phrc_new.atk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_phrc_new.fuel_oil"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_phrc_new.month">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_phrc_new.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addRefineryTotalRemarks" class="form-horizontal">
            <div id="addRefineryTotalRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Total Remark For {{downstream_refinery_total.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_refinery_total.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_refinery_total.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_total.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_total.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_total.atk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">FUEL OIL -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_refinery_total.fuel_oil"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_total.month">
                            <input type="hidden" class="form-control" v-model="downstream_refinery_total.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addUtilizationWRPCRemarks" class="form-horizontal">
            <div id="addUtilizationWRPCRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Performance Utilization WRPC Count Remark For {{refinery_utilization_wrpc.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="refinery_utilization_wrpc.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_wrpc.install_capacity"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_wrpc.opening_stock"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_wrpc.crude_receipt"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_wrpc.crude_processed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_wrpc.closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_wrpc.capacity_utilization"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_wrpc.month">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_wrpc.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addUtilizationKRPCRemarks" class="form-horizontal">
            <div id="addUtilizationKRPCRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Performance Utilization KRPC Count Remark For {{refinery_utilization_krpc.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="refinery_utilization_krpc.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_krpc.install_capacity"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_krpc.opening_stock"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_krpc.crude_receipt"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_krpc.crude_processed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_krpc.closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_krpc.capacity_utilization"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_krpc.month">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_krpc.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addUtilizationPHRCNewRemarks" class="form-horizontal">
            <div id="addUtilizationPHRCNewRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Performance Utilization PHRC New Count Remark For {{refinery_utilization_phrc_new.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="refinery_utilization_phrc_new.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_new.install_capacity"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_new.opening_stock"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_new.crude_receipt"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_new.crude_processed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_new.closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_new.capacity_utilization"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_phrc_new.month">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_phrc_new.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addUtilizationNDPRRemarks" class="form-horizontal">
            <div id="addUtilizationNDPRRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Performance Utilization NDPR Count Remark For {{refinery_utilization_ndpr.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="refinery_utilization_ndpr.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_ndpr.install_capacity"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_ndpr.opening_stock"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_ndpr.crude_receipt"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_ndpr.crude_processed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_ndpr.closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_ndpr.capacity_utilization"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_ndpr.month">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_ndpr.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addUtilizationPHRCOldRemarks" class="form-horizontal">
            <div id="addUtilizationPHRCOldRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Performance Utilization PHRC Old Count Remark For {{refinery_utilization_phrc_old.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="refinery_utilization_phrc_old.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_old.install_capacity"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_old.opening_stock"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_old.crude_receipt"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_old.crude_processed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_old.closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_phrc_old.capacity_utilization"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_phrc_old.month">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_phrc_old.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addUtilizationTotalRemarks" class="form-horizontal">
            <div id="addUtilizationTotalRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Refinery Performance Utilization Total Count Remark For {{refinery_utilization_total.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="refinery_utilization_total.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Install Capacity (BPSD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_total.install_capacity"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Opening Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_total.opening_stock"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Receipt</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_total.crude_receipt"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Processed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_total.crude_processed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Closing Stock</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_total.closing_stock"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Capacity Utilisation %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="refinery_utilization_total.capacity_utilization"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_total.month">
                            <input type="hidden" class="form-control" v-model="refinery_utilization_total.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addTruckOutRemarks" class="form-horizontal">
            <div id="addTruckOutRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Truck Out Count Remark For {{downstream_truck_out.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_truck_out.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_truck_out.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">HHK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_truck_out.hhk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_truck_out.ago"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">ATK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" step="0.01" class="form-control" v-model="downstream_truck_out.atk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_truck_out.month">
                            <input type="hidden" class="form-control" v-model="downstream_truck_out.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addMktSegmentNNPCRemarks" class="form-horizontal">
            <div id="addMktSegmentNNPCRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Market Segment NNPC Count Remark For {{truck_out_marketer_nnpc.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="truck_out_marketer_nnpc.year" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_nnpc.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_nnpc.dpk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_nnpc.ago"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="truck_out_marketer_nnpc.month">
                            <input type="hidden" class="form-control" v-model="truck_out_marketer_nnpc.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addMktSegmentMajorRemarks" class="form-horizontal">
            <div id="addMktSegmentMajorRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Market Segment Major Count Remark For {{truck_out_marketer_major.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="truck_out_marketer_major.year" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_major.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_major.dpk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_major.ago"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="truck_out_marketer_major.month">
                            <input type="hidden" class="form-control" v-model="truck_out_marketer_major.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addMktSegmentIndependentRemarks" class="form-horizontal">
            <div id="addMktSegmentIndependentRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Market Segment Independent Count Remark For {{truck_out_marketer_independent.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="truck_out_marketer_independent.year" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> PMS -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_independent.pms"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DPK -Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_independent.dpk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AGO-Litres</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="truck_out_marketer_independent.ago"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="truck_out_marketer_independent.month">
                            <input type="hidden" class="form-control" v-model="truck_out_marketer_independent.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addTerminalOperationRemarks" class="form-horizontal">
            <div id="addTerminalOperationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Terminal Operation Count Remark For {{downstream_terminal_operation.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="downstream_terminal_operation.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Crude oil and condensate production(bbls)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_terminal_operation.oil_condensate_production"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Crude Oil and condensate Export(Bbls)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_terminal_operation.oil_condensate_export"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Refinery Supply(Bbls)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="downstream_terminal_operation.refinery_supply"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="downstream_terminal_operation.month">
                            <input type="hidden" class="form-control" v-model="downstream_terminal_operation.type">
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


        <!-- Add Remarks modal -->
        <form @submit.prevent="addOperationApplicationRemarks" class="form-horizontal">
            <div id="addOperationApplicationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Terminal Operation Application Count Remark For {{terminal_operation_application.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="terminal_operation_application.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Permits Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.export_permit_received"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Permits Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.export_permit_approved"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Establishment-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.establishment_received"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Establishment-Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.establishment_approved"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Trucking-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.suttle_trucking_received"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Trucking-Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.suttle_trucking_approved"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Barging-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.suttle_bargingreceived"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Barging-Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.suttle_bargingapproved"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Calib-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.tank_calibration_received"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tank Calib-Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.tank_calibration_approved"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Meter Calib-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.calibration_proving_received"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Meter Calib-Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.calibration_proving_approved"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Instrument Calib-Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.instrument_calibration_received"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Instrument Calib-Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="terminal_operation_application.instrument_calibration_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="terminal_operation_application.month">
                            <input type="hidden" class="form-control" v-model="terminal_operation_application.type">
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

                weeks: [],
                jan: '', feb: '', mar: '', qrt1: '', apr: '', may: '', jun: '', qrt2: '', m_yr: '', 
                jul: '',  aug: '', sep: '', qrt3: '', oct: '', nov: '', dec: '', qrt4: '', ann: '', 

                remark: false,

                year_acq: '2019-01-01',
                week_from: '',
                week_to: '',
                list_roms: [],
                list_licenses: [],
                list_surveillances: [],
                list_depot_stocks: [],
                list_depot_applications: [],
                list_product_imports: [],
                list_productionKRPCs: [],
                list_productionWRPCs: [],
                list_productionPHRC_olds: [],
                list_productionPHRC_news: [],
                list_productionTotals: [],
                list_utilization_WRPCs: [],
                list_utilization_KRPCs: [],
                list_utilization_PHRC_news: [],
                list_utilization_NDPRs: [],
                list_utilization_PHRC_olds: [],
                list_utilization_totals: [],
                list_truck_outs: [],
                list_market_nnpcs: [],
                list_market_majors: [],
                list_market_independents: [],
                list_terminal_operations: [],
                list_terminal_operation_applications: [],




                rom_applications: [],
                rom_application: {
                    id: '',
                    year: '',
                    month: '',
                    suitability_inspection_received: '',
                    suitability_inspection_approved: '',
                    atc_received: '',
                    atc_approved: '',
                    pressure_test_received: '',
                    pressure_test_approved: '',
                    tank_buried_received: '',
                    tank_buried_approved: '',
                    leak_detection_received: '',
                    leak_detection_approved: '',
                    final_inspection_received: '',
                    final_inspection_approved: '',
                    renewal_inspection_received: '',
                    renewal_inspection_approved: '',
                    vessel_license_received: '',
                    vessel_license_approved: '',
                    type: 'rom_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_licenses: [], 
                downstream_license: {
                    id: '',
                    year: '',
                    month: '',
                    category_a_new: '',
                    category_a_renewal: '',
                    category_b_new: '',
                    category_b_renewal: '',
                    category_c_new: '',
                    category_c_renewal: '',
                    total_cat_a: '',
                    total_cat_b: '',
                    total_cat_c: '',
                    type: 'downstream_license',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_surveillances: [], 
                downstream_surveillance: {
                    id: '',
                    year: '',
                    month: '',
                    station_visited: '',
                    station_with_pms: '',
                    sealed_under_dispensing: '',
                    sealed_for_over_price: '',
                    sealed_for_hoarding: '',
                    sealed_for_diversion: '',
                    sealed_for_violation_of_seal: '',
                    other: '',
                    total_station_sealed: '',
                    type: 'downstream_surveillance',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_depot_stocks: [], 
                downstream_depot_stock: {
                    id: '',
                    year: '',
                    month: '',
                    pms_open_stock: '',
                    pms_reciept: '',
                    pms_lifting_transfer: '',
                    pms_closing_stock: '',
                    dpk_open_stock: '',
                    dpk_reciept: '',
                    dpk_lifting_transfer: '',
                    dpk_closing_stock: '',
                    ago_open_stock: '',
                    ago_reciept: '',
                    ago_lifting_transfer: '',
                    ago_closing_stock: '',
                    type: 'downstream_depot_stock',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_depot_applications: [], 
                downstream_depot_application: {
                    id: '',
                    year: '',
                    month: '',
                    proposal_received: '',
                    proposal_approved: '',
                    presentation_received: '',
                    presentation_approved: '',
                    assessment_received: '',
                    assessment_approved: '',
                    atc_received: '',
                    atc_approved: '',
                    presure_test_received: '',
                    presure_test_approved: '',
                    calibration_received: '',
                    calibration_approved: '',
                    final_inspection_received: '',
                    final_inspection_approved: '',
                    renewal_inspection_received: '',
                    renewal_inspection_approved: '',
                    new_lto_received: '',
                    new_lto_approved: '',
                    renewal_lto_received: '',
                    renewal_lto_approved: '',
                    import_permit_received: '',
                    import_permit_approved: '',
                    type: 'downstream_depot_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_product_imports: [], 
                downstream_product_import: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    type: 'downstream_product_import',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_krpcs: [], 
                downstream_refinery_krpc: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_krpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_wrpcs: [], 
                downstream_refinery_wrpc: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_wrpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_phrc_olds: [], 
                downstream_refinery_phrc_old: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_phrc_old',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_phrc_news: [],
                downstream_refinery_phrc_new: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_phrc_new',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_refinery_totals: [],
                downstream_refinery_total: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    fuel_oil: '',
                    type: 'downstream_refinery_total',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_wrpcs: [],  
                refinery_utilization_wrpc: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_wrpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_krpcs: [],  
                refinery_utilization_krpc: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_krpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_phrc_news: [],  
                refinery_utilization_phrc_new: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_phrc_new',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_totals: [],  
                refinery_utilization_total: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_total',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_ndprs: [],  
                refinery_utilization_ndpr: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_ndpr',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_phrc_olds: [],  
                refinery_utilization_phrc_old: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_phrc_old',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                refinery_utilization_totals: [],  
                refinery_utilization_total: {
                    id: '',
                    year: '',
                    month: '',
                    install_capacity: '',
                    opening_stock: '',
                    crude_receipt: '',
                    crude_processed: '',
                    closing_stock: '',
                    capacity_utilization: '',
                    type: 'downstream_perf_util_total',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_truck_outs: [], 
                downstream_truck_out: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    hhk: '',
                    ago: '',
                    atk: '',
                    type: 'downstream_truck_out',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                truck_out_marketer_nnpcs: [], 
                truck_out_marketer_nnpc: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    dpk: '',
                    ago: '',
                    type: 'downstream_terminal_operation_nnpc',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                truck_out_marketer_majors: [], 
                truck_out_marketer_major: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    dpk: '',
                    ago: '',
                    type: 'downstream_terminal_operation_major',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                truck_out_marketer_independents: [], 
                truck_out_marketer_independent: {
                    id: '',
                    year: '',
                    month: '',
                    pms: '',
                    dpk: '',
                    ago: '',
                    type: 'downstream_terminal_operation_independent',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                downstream_terminal_operations: [], 
                downstream_terminal_operation: {
                    id: '',
                    year: '',
                    month: '',
                    oil_condensate_production: '',
                    oil_condensate_export: '',
                    refinery_supply: '',
                    type: 'downstream_terminal_operation',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                terminal_operation_applications: [], 
                terminal_operation_application: {
                    id: '',
                    year: '',
                    month: '',
                    export_permit_received: '',
                    export_permit_approved: '',
                    establishment_received: '',
                    establishment_approved: '',
                    suttle_trucking_received: '',
                    suttle_trucking_approved: '',
                    suttle_bargingreceived: '',
                    suttle_bargingapproved: '',
                    tank_calibration_received: '',
                    tank_calibration_approved: '',
                    calibration_proving_received: '',
                    calibration_proving_approved: '',
                    instrument_calibration_received: '',
                    instrument_calibration_approved: '',
                    type: 'downstream_terminal_operation_application',
                    user_id:window.sessionStorage.getItem('user_id')
                },

            }
        },


        created()
        {
            // this.setROM();
            this.year_acq = '2019-01-01';   //REMEMBER SET YEAR USING JAVASCRIPT HERE
        },

        

        methods:{

            setMonthlyReportByYear()
            {
                this.year_acq = year_acq;
                this.setROM();     
                this.setLicense();   
                this.setSurveillance();  
                this.setDepotStock(); 
                this.setDepotApplication();
                this.setProductImport();  
                this.setProductionKRPC();  
                this.setProductionWRPC();   
                this.setProductionPHRC_old(); 
                this.setProductionPHRC_new();
                this.setProductionTotal();  
                this.setUtilizationWRPC();   
                this.setUtilizationKRPC(); 
                this.setUtilizationPHRC_new(); 
                this.setUtilizationNDPR(); 
                this.setUtilizationPHRC_old();  
                this.setUtilizationTotal(); 
                this.setTruckOut();
                this.setMarketNNPC();
                this.setMarketMajor();
                this.setMarketIndependent();
                this.setTerminalOperation();
                this.setTerminalOperationApplication();
            },




            setROM()
            {
                let report = '/api/monthly-report/rom/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_roms = res;
                })
                .catch(err => console.log(err));            
            },

            setLicense()
            {
                let report = '/api/monthly-report/license/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_licenses = res;
                })
                .catch(err => console.log(err));            
            },

            setSurveillance()
            {
                let report = '/api/monthly-report/surveillance/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_surveillances = res;
                })
                .catch(err => console.log(err));            
            },

            setDepotStock()
            {
                let report = '/api/monthly-report/depot_stock/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_depot_stocks = res;
                })
                .catch(err => console.log(err));            
            },

            setDepotApplication()
            {
                let report = '/api/monthly-report/depot_application/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_depot_applications = res;
                })
                .catch(err => console.log(err));            
            },

            setProductImport()
            {
                let report = '/api/monthly-report/product_import/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_product_imports = res;
                })
                .catch(err => console.log(err));            
            },

            setProductionKRPC()
            {
                let report = '/api/monthly-report/KRPC/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_productionKRPCs = res;
                })
                .catch(err => console.log(err));            
            },

            setProductionWRPC()
            {
                let report = '/api/monthly-report/WRPC/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_productionWRPCs = res;
                })
                .catch(err => console.log(err));            
            },

            setProductionPHRC_old()
            {
                let report = '/api/monthly-report/PHRC_old/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_productionPHRC_olds = res;
                })
                .catch(err => console.log(err));            
            },

            setProductionPHRC_new()
            {
                let report = '/api/monthly-report/PHRC_new/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_productionPHRC_news = res;
                })
                .catch(err => console.log(err));            
            },

            setProductionTotal()
            {
                let report = '/api/monthly-report/Total/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_productionTotals = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilizationWRPC()
            {
                let report = '/api/monthly-report/utilization_WRPC/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilization_WRPCs = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilizationKRPC()
            {
                let report = '/api/monthly-report/utilization_KRPC/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilization_KRPCs = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilizationPHRC_new()
            {
                let report = '/api/monthly-report/utilization_PHRC_new/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilization_PHRC_news = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilizationNDPR()
            {
                let report = '/api/monthly-report/utilization_NDPR/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilization_NDPRs = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilizationPHRC_old()
            {
                let report = '/api/monthly-report/utilization_PHRC_old/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilization_PHRC_olds = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilizationTotal()
            {
                let report = '/api/monthly-report/utilization_total/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilization_totals = res;
                })
                .catch(err => console.log(err));            
            },

            setTruckOut()
            {
                let report = '/api/monthly-report/truck_out/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_truck_outs = res;
                })
                .catch(err => console.log(err));            
            },

            setMarketNNPC()
            {
                let report = '/api/monthly-report/market_nnpc/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_market_nnpcs = res;
                })
                .catch(err => console.log(err));            
            },

            setMarketMajor()
            {
                let report = '/api/monthly-report/market_major/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_market_majors = res;
                })
                .catch(err => console.log(err));            
            },

            setMarketIndependent()
            {
                let report = '/api/monthly-report/market_independent/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_market_independents = res;
                })
                .catch(err => console.log(err));            
            },

            setTerminalOperation()
            {
                let report = '/api/monthly-report/terminal_operation/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_terminal_operations = res;
                })
                .catch(err => console.log(err));            
            },

            setTerminalOperationApplication()
            {
                let report = '/api/monthly-report/terminal_operation_application/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_terminal_operation_applications = res;
                })
                .catch(err => console.log(err));            
            },





            showRemark()
            {
              this.remark = !this.remark;  
            },




            clearRomApplicationForm()
            {
                this.rom_application.id = '';
                this.rom_application.suitability_inspection_received = '';
                this.rom_application.suitability_inspection_approved = '';
                this.rom_application.atc_received = '';
                this.rom_application.atc_approved = '';
                this.rom_application.pressure_test_received = '';
                this.rom_application.pressure_test_approved = '';
                this.rom_application.tank_buried_received = '';
                this.rom_application.tank_buried_approved = '';
                this.rom_application.leak_detection_received = '';
                this.rom_application.leak_detection_approved = '';
                this.rom_application.final_inspection_received = '';
                this.rom_application.final_inspection_approved = '';
                this.rom_application.renewal_inspection_received = '';
                this.rom_application.renewal_inspection_approved = '';
                this.rom_application.vessel_license_received = '';
                this.rom_application.vessel_license_approved = '';
            },

            clearLicenseForm()
            {
                this.downstream_license.id = '';
                this.downstream_license.category_a_new = '';
                this.downstream_license.category_a_renewal = '';
                this.downstream_license.category_b_new = '';
                this.downstream_license.category_b_renewal = '';
                this.downstream_license.category_c_new = '';
                this.downstream_license.category_c_renewal = '';
                this.downstream_license.total_cat_a = '';
                this.downstream_license.total_cat_b = '';
                this.downstream_license.total_cat_c = '';
            },


            clearSurveillanceForm()
            {
                this.downstream_surveillance.id = '';
                this.downstream_surveillance.station_visited = '';
                this.downstream_surveillance.station_with_pms = '';
                this.downstream_surveillance.sealed_under_dispensing = '';
                this.downstream_surveillance.sealed_for_diversion = '';
                this.downstream_surveillance.sealed_for_violation_of_seal = '';
                this.downstream_surveillance.other = '';
                this.downstream_surveillance.total_station_sealed = '';
            },

            clearDepotStockForm()
            {
                this.downstream_depot_stock.id = '';
                this.downstream_depot_stock.pms_open_stock = '';
                this.downstream_depot_stock.pms_reciept = '';
                this.downstream_depot_stock.pms_lifting_transfer = '';
                this.downstream_depot_stock.pms_closing_stock = '';
                this.downstream_depot_stock.dpk_open_stock = '';
                this.downstream_depot_stock.dpk_reciept = '';
                this.downstream_depot_stock.dpk_lifting_transfer = '';
                this.downstream_depot_stock.dpk_closing_stock = '';
                this.downstream_depot_stock.ago_open_stock = '';
                this.downstream_depot_stock.ago_reciept = '';
                this.downstream_depot_stock.ago_lifting_transfer = '';
                this.downstream_depot_stock.ago_closing_stock = '';
            },

            clearDepotApplicationForm()
            {
                this.downstream_depot_application.id = '';
                this.downstream_depot_application.proposal_received = '';
                this.downstream_depot_application.proposal_approved = '';
                this.downstream_depot_application.presentation_received = '';
                this.downstream_depot_application.presentation_approved = '';
                this.downstream_depot_application.assessment_received = '';
                this.downstream_depot_application.assessment_approved = '';
                this.downstream_depot_application.atc_received = '';
                this.downstream_depot_application.atc_approved = '';
                this.downstream_depot_application.presure_test_received = '';
                this.downstream_depot_application.presure_test_approved = '';
                this.downstream_depot_application.calibration_received = '';
                this.downstream_depot_application.calibration_approved = '';
                this.downstream_depot_application.final_inspection_received = '';
                this.downstream_depot_application.final_inspection_approved = '';
                this.downstream_depot_application.renewal_inspection_received = '';
                this.downstream_depot_application.renewal_inspection_approved = '';
                this.downstream_depot_application.new_lto_received = '';
                this.downstream_depot_application.new_lto_approved = '';
                this.downstream_depot_application.renewal_lto_received = '';
                this.downstream_depot_application.renewal_lto_approved = '';
                this.downstream_depot_application.import_permit_received = '';
                this.downstream_depot_application.import_permit_approved = '';
            },

            clearProductImportForm()
            {
                this.downstream_product_import.id = '';
                this.downstream_product_import.pms = '';
                this.downstream_product_import.hhk = '';
                this.downstream_product_import.ago = '';
                this.downstream_product_import.atk = '';
            },

            clearRefineryKRPCForm()
            {
                this.downstream_refinery_krpc.id = '';
                this.downstream_refinery_krpc.pms = '';
                this.downstream_refinery_krpc.hhk = '';
                this.downstream_refinery_krpc.ago = '';
                this.downstream_refinery_krpc.atk = '';
                this.downstream_refinery_krpc.fuel_oil = '';
            },

            clearRefineryWRPCForm()
            {
                this.downstream_refinery_wrpc.id = '';
                this.downstream_refinery_wrpc.pms = '';
                this.downstream_refinery_wrpc.hhk = '';
                this.downstream_refinery_wrpc.ago = '';
                this.downstream_refinery_wrpc.atk = '';
                this.downstream_refinery_wrpc.fuel_oil = '';
            },

            clearRefineryPHRCNewForm()
            {
                this.downstream_refinery_phrc_new.id = '';
                this.downstream_refinery_phrc_new.pms = '';
                this.downstream_refinery_phrc_new.hhk = '';
                this.downstream_refinery_phrc_new.ago = '';
                this.downstream_refinery_phrc_new.atk = '';
                this.downstream_refinery_phrc_new.fuel_oil = '';
            },

            clearRefineryPHRCOldForm()
            {
                this.downstream_refinery_phrc_old.id = '';
                this.downstream_refinery_phrc_old.pms = '';
                this.downstream_refinery_phrc_old.hhk = '';
                this.downstream_refinery_phrc_old.ago = '';
                this.downstream_refinery_phrc_old.atk = '';
                this.downstream_refinery_phrc_old.fuel_oil = '';
            },

            clearRefineryTotalForm()
            {
                this.downstream_refinery_total.id = '';
                this.downstream_refinery_total.pms = '';
                this.downstream_refinery_total.hhk = '';
                this.downstream_refinery_total.ago = '';
                this.downstream_refinery_total.atk = '';
                this.downstream_refinery_total.fuel_oil = '';
            },

            clearUtilizationKRPCForm()
            {
                this.refinery_utilization_krpc.install_capacity = '';
                this.refinery_utilization_krpc.opening_stock = '';
                this.refinery_utilization_krpc.crude_receipt = '';
                this.refinery_utilization_krpc.crude_processed = '';
                this.refinery_utilization_krpc.closing_stock = '';
                this.refinery_utilization_krpc.capacity_utilization = '';
            },

            clearUtilizationWRPCForm()
            {
                this.refinery_utilization_wrpc.install_capacity = '';
                this.refinery_utilization_wrpc.opening_stock = '';
                this.refinery_utilization_wrpc.crude_receipt = '';
                this.refinery_utilization_wrpc.crude_processed = '';
                this.refinery_utilization_wrpc.closing_stock = '';
                this.refinery_utilization_wrpc.capacity_utilization = '';
            },

            clearUtilizationPHRCNewForm()
            {
                this.refinery_utilization_phrc_new.install_capacity = '';
                this.refinery_utilization_phrc_new.opening_stock = '';
                this.refinery_utilization_phrc_new.crude_receipt = '';
                this.refinery_utilization_phrc_new.crude_processed = '';
                this.refinery_utilization_phrc_new.closing_stock = '';
                this.refinery_utilization_phrc_new.capacity_utilization = '';
            },

            clearUtilizationNDPRForm()
            {
                this.refinery_utilization_ndpr.install_capacity = '';
                this.refinery_utilization_ndpr.opening_stock = '';
                this.refinery_utilization_ndpr.crude_receipt = '';
                this.refinery_utilization_ndpr.crude_processed = '';
                this.refinery_utilization_ndpr.closing_stock = '';
                this.refinery_utilization_ndpr.capacity_utilization = '';
            },

            clearUtilizationPHRCOldForm()
            {
                this.refinery_utilization_phrc_old.install_capacity = '';
                this.refinery_utilization_phrc_old.opening_stock = '';
                this.refinery_utilization_phrc_old.crude_receipt = '';
                this.refinery_utilization_phrc_old.crude_processed = '';
                this.refinery_utilization_phrc_old.closing_stock = '';
                this.refinery_utilization_phrc_old.capacity_utilization = '';
            },

            clearUtilizationTotalForm()
            {
                this.refinery_utilization_total.install_capacity = '';
                this.refinery_utilization_total.opening_stock = '';
                this.refinery_utilization_total.crude_receipt = '';
                this.refinery_utilization_total.crude_processed = '';
                this.refinery_utilization_total.closing_stock = '';
                this.refinery_utilization_total.capacity_utilization = '';
            },


            clearTruckOutForm()
            {
                this.downstream_truck_out.pms = '';
                this.downstream_truck_out.hhk = '';
                this.downstream_truck_out.ago = '';
                this.downstream_truck_out.atk = '';
            },

            clearMktSegmentNNPCForm()
            {
                this.truck_out_marketer_nnpc.pms = '';
                this.truck_out_marketer_nnpc.dpk = '';
                this.truck_out_marketer_nnpc.ago = '';
            },

            clearMktSegmentMajorForm()
            {
                this.truck_out_marketer_major.pms = '';
                this.truck_out_marketer_major.dpk = '';
                this.truck_out_marketer_major.ago = '';
            },

            clearMktSegmentIndependentForm()
            {
                this.truck_out_marketer_independent.pms = '';
                this.truck_out_marketer_independent.dpk = '';
                this.truck_out_marketer_independent.ago = '';
            },

            clearTerminalOperationForm()
            {
                this.terminal_operation.oil_condensate_production = '';
                this.terminal_operation.oil_condensate_export = '';
                this.terminal_operation.refinery_supply = '';
            },

            clearTerminalOperationApplicationForm()
            {
                this.terminal_operation_application.export_permit_received = '';
                this.terminal_operation_application.export_permit_approved = '';
                this.terminal_operation_application.establishment_received = '';
                this.terminal_operation_application.establishment_approved = '';
                this.terminal_operation_application.suttle_trucking_received = '';
                this.terminal_operation_application.suttle_trucking_approved = '';
                this.terminal_operation_application.suttle_bargingreceived = '';
                this.terminal_operation_application.suttle_bargingapproved = '';
                this.terminal_operation_application.tank_calibration_received = '';
                this.terminal_operation_application.tank_calibration_approved = '';
                this.terminal_operation_application.calibration_proving_received = '';
                this.terminal_operation_application.calibration_proving_approved = '';
                this.terminal_operation_application.instrument_calibration_received = '';
                this.terminal_operation_application.instrument_calibration_approved = '';
            },








            setRomApplicationMonth(month, type)
            {
                this.rom_application.month = month; 
                this.rom_application.year = this.year_acq;

                this.clearRomApplicationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/rom_application/' + this.rom_application.month +'/'+ this.rom_application.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('suitability_inspection_received');
                         arr.push('suitability_inspection_approved');
                         arr.push('atc_received');
                         arr.push('atc_approved');
                         arr.push('pressure_test_received');
                         arr.push('pressure_test_approved');
                         arr.push('tank_buried_received');
                         arr.push('tank_buried_approved');
                         arr.push('leak_detection_received');
                         arr.push('leak_detection_approved');
                         arr.push('final_inspection_received');
                         arr.push('final_inspection_approved');
                         arr.push('renewal_inspection_received');
                         arr.push('renewal_inspection_approved');
                         arr.push('vessel_license_received');
                         arr.push('vessel_license_approved');

                        res.data.forEach((item, index)=>
                        {                  
                          this.rom_application[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addRomApplicationRemark()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.rom_application),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err));
                $('#addRomApplicationRemarkModal').trigger('click');
            },


            setLicenseMonth(month, type)
            {
                this.downstream_license.month = month; 
                this.downstream_license.year = this.year_acq;

                this.clearLicenseForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_license/' + this.downstream_license.month +'/'+ this.downstream_license.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('category_a_new');
                         arr.push('category_a_renewal');
                         arr.push('category_b_new');
                         arr.push('category_b_renewal');
                         arr.push('category_c_new');
                         arr.push('category_c_renewal');
                         arr.push('total_cat_a');
                         arr.push('total_cat_b');
                         arr.push('total_cat_c');

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_license[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addLicenseRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_license),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err));
                $('#addLicenseRemarkModal').trigger('click');
            },


            setSurveillanceMonth(month, type)
            {
                this.downstream_surveillance.month = month; 
                this.downstream_surveillance.year = this.year_acq;

                this.clearSurveillanceForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_surveillance/' + this.downstream_surveillance.month +'/'+ this.downstream_surveillance.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('station_visited');
                         arr.push('station_with_pms');
                         arr.push('sealed_under_dispensing');
                         arr.push('sealed_for_over_price');
                         arr.push('sealed_for_hoarding');
                         arr.push('sealed_for_diversion');
                         arr.push('sealed_for_violation_of_seal');
                         arr.push('other');
                         arr.push('total_station_sealed');

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_surveillance[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addSurveillanceRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_surveillance),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err));
                $('#addSurveillanceRemarkModal').trigger('click');
            },



            setDepotStockMonth(month, type)
            {
                this.downstream_depot_stock.month = month; 
                this.downstream_depot_stock.year = this.year_acq;

                this.clearDepotStockForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_depot_stock/' + this.downstream_depot_stock.month +'/'+ this.downstream_depot_stock.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms_open_stock');
                         arr.push('pms_reciept');
                         arr.push('pms_lifting_transfer');
                         arr.push('pms_closing_stock');
                         arr.push('dpk_open_stock');
                         arr.push('dpk_reciept');
                         arr.push('dpk_lifting_transfer');
                         arr.push('dpk_closing_stock');
                         arr.push('ago_open_stock');
                         arr.push('ago_reciept');
                         arr.push('ago_lifting_transfer');
                         arr.push('ago_closing_stock');

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_depot_stock[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addDepotStockRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_depot_stock),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err));
                $('#addDepotStockRemarkModal').trigger('click');
            },



            setDepotApplicationMonth(month, type)
            {
                this.downstream_depot_application.month = month; 
                this.downstream_depot_application.year = this.year_acq;

                this.clearDepotApplicationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_depot_application/' + this.downstream_depot_application.month +'/'+ this.downstream_depot_application.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('proposal_received');
                         arr.push('proposal_approved');
                         arr.push('presentation_received');
                         arr.push('presentation_approved');
                         arr.push('assessment_received');
                         arr.push('assessment_approved');
                         arr.push('atc_received');
                         arr.push('atc_approved');
                         arr.push('presure_test_received');
                         arr.push('presure_test_approved');
                         arr.push('calibration_received');
                         arr.push('calibration_approved');
                         arr.push('final_inspection_received');
                         arr.push('final_inspection_approved');
                         arr.push('renewal_inspection_received');
                         arr.push('renewal_inspection_approved');
                         arr.push('new_lto_received');
                         arr.push('new_lto_approved');
                         arr.push('renewal_lto_received');
                         arr.push('renewal_lto_approved');
                         arr.push('import_permit_received');
                         arr.push('import_permit_approved');                         

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_depot_application[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addDepotApplicationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_depot_application),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addDepotApplicationRemarkModal').trigger('click');
            },



            setProductImportMonth(month, type)
            {
                this.downstream_product_import.month = month; 
                this.downstream_product_import.year = this.year_acq;

                this.clearProductImportForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_product_import/' + this.downstream_product_import.month +'/'+ this.downstream_product_import.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms');  
                         arr.push('hhk');   
                         arr.push('ago');   
                         arr.push('atk');                        

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_product_import[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addProductImportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_product_import),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addProductImportRemarkModal').trigger('click');
            },



            setRefineryKRPCMonth(month, type)
            {
                this.downstream_refinery_krpc.month = month; 
                this.downstream_refinery_krpc.year = this.year_acq;

                this.clearRefineryKRPCForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_refinery_krpc/' + this.downstream_refinery_krpc.month +'/'+ this.downstream_refinery_krpc.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('hhk');
                         arr.push('ago');
                         arr.push('atk');
                         arr.push('fuel_oil');                       

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_refinery_krpc[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addRefineryKRPCRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_refinery_krpc),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addRefineryKRPCRemarkModal').trigger('click');
            },



            setRefineryWRPCMonth(month, type)
            {
                this.downstream_refinery_wrpc.month = month; 
                this.downstream_refinery_wrpc.year = this.year_acq;

                this.clearRefineryWRPCForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_refinery_wrpc/' + this.downstream_refinery_wrpc.month +'/'+ this.downstream_refinery_wrpc.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('hhk');
                         arr.push('ago');
                         arr.push('atk');
                         arr.push('fuel_oil');                       

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_refinery_wrpc[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addRefineryWRPCRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_refinery_wrpc),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addRefineryWRPCRemarkModal').trigger('click');
            },



            setRefineryPHRCOldMonth(month, type)
            {
                this.downstream_refinery_phrc_old.month = month; 
                this.downstream_refinery_phrc_old.year = this.year_acq;

                this.clearRefineryPHRCOldForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_refinery_phrc_old/' + this.downstream_refinery_phrc_old.month +'/'+ this.downstream_refinery_phrc_old.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('hhk');
                         arr.push('ago');
                         arr.push('atk');
                         arr.push('fuel_oil');                       

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_refinery_phrc_old[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addRefineryPHRCOldRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_refinery_phrc_old),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addRefineryPHRCOldRemarkModal').trigger('click');
            },



            setRefineryPHRCNewMonth(month, type)
            {
                this.downstream_refinery_phrc_new.month = month; 
                this.downstream_refinery_phrc_new.year = this.year_acq;

                this.clearRefineryPHRCNewForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_refinery_phrc_new/' + this.downstream_refinery_phrc_new.month +'/'+ this.downstream_refinery_phrc_new.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('hhk');
                         arr.push('ago');
                         arr.push('atk');
                         arr.push('fuel_oil');                       

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_refinery_phrc_new[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addRefineryPHRCNewRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_refinery_phrc_new),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addRefineryPHRCNewRemarkModal').trigger('click');
            },



            setRefineryTotalMonth(month, type)
            {
                this.downstream_refinery_total.month = month; 
                this.downstream_refinery_total.year = this.year_acq;

                this.clearRefineryTotalForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_refinery_total/' + this.downstream_refinery_total.month +'/'+ this.downstream_refinery_total.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('hhk');
                         arr.push('ago');
                         arr.push('atk');
                         arr.push('fuel_oil');                       

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_refinery_total[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addRefineryTotalRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_refinery_total),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addRefineryTotalRemarkModal').trigger('click');
            },



            setUtilizationWRPCMonth(month, type)
            {
                this.refinery_utilization_wrpc.month = month; 
                this.refinery_utilization_wrpc.year = this.year_acq;

                this.clearUtilizationWRPCForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_perf_util_wrpc/' + this.refinery_utilization_wrpc.month +'/'+ this.refinery_utilization_wrpc.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('install_capacity'); 
                         arr.push('opening_stock');
                         arr.push('crude_receipt');
                         arr.push('crude_processed');
                         arr.push('closing_stock');  
                         arr.push('capacity_utilization');                     

                        res.data.forEach((item, index)=>
                        {                  
                          this.refinery_utilization_wrpc[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addUtilizationWRPCRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.refinery_utilization_wrpc),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addUtilizationWRPCRemarkModal').trigger('click');
            },



            setUtilizationKRPCMonth(month, type)
            {
                this.refinery_utilization_krpc.month = month; 
                this.refinery_utilization_krpc.year = this.year_acq;

                this.clearUtilizationKRPCForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_perf_util_krpc/' + this.refinery_utilization_krpc.month +'/'+ this.refinery_utilization_krpc.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('install_capacity'); 
                         arr.push('opening_stock');
                         arr.push('crude_receipt');
                         arr.push('crude_processed');
                         arr.push('closing_stock');  
                         arr.push('capacity_utilization');                      

                        res.data.forEach((item, index)=>
                        {                  
                          this.refinery_utilization_krpc[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addUtilizationKRPCRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.refinery_utilization_krpc),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addUtilizationKRPCRemarkModal').trigger('click');
            },



            setUtilizationPHRCNewMonth(month, type)
            {
                this.refinery_utilization_phrc_new.month = month; 
                this.refinery_utilization_phrc_new.year = this.year_acq;

                this.clearUtilizationPHRCNewForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_perf_util_phrc_new/' + this.refinery_utilization_phrc_new.month +'/'+ this.refinery_utilization_phrc_new.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('install_capacity'); 
                         arr.push('opening_stock');
                         arr.push('crude_receipt');
                         arr.push('crude_processed');
                         arr.push('closing_stock');  
                         arr.push('capacity_utilization');                      

                        res.data.forEach((item, index)=>
                        {                  
                          this.refinery_utilization_phrc_new[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addUtilizationPHRCNewRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.refinery_utilization_phrc_new),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addUtilizationPHRCNewRemarkModal').trigger('click');
            },



            setUtilizationNDPRMonth(month, type)
            {
                this.refinery_utilization_ndpr.month = month; 
                this.refinery_utilization_ndpr.year = this.year_acq;

                this.clearUtilizationNDPRForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_perf_util_ndpr/' + this.refinery_utilization_ndpr.month +'/'+ this.refinery_utilization_ndpr.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('install_capacity'); 
                         arr.push('opening_stock');
                         arr.push('crude_receipt');
                         arr.push('crude_processed');
                         arr.push('closing_stock');  
                         arr.push('capacity_utilization');                      

                        res.data.forEach((item, index)=>
                        {                  
                          this.refinery_utilization_ndpr[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addUtilizationNDPRRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.refinery_utilization_ndpr),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addUtilizationNDPRRemarkModal').trigger('click');
            },



            setUtilizationPHRCOldMonth(month, type)
            {
                this.refinery_utilization_phrc_old.month = month; 
                this.refinery_utilization_phrc_old.year = this.year_acq;

                this.clearUtilizationPHRCOldForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_perf_util_phrc_old/' + this.refinery_utilization_phrc_old.month +'/'+ this.refinery_utilization_phrc_old.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('install_capacity'); 
                         arr.push('opening_stock');
                         arr.push('crude_receipt');
                         arr.push('crude_processed');
                         arr.push('closing_stock');  
                         arr.push('capacity_utilization');                      

                        res.data.forEach((item, index)=>
                        {                  
                          this.refinery_utilization_phrc_old[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addUtilizationPHRCOldRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.refinery_utilization_phrc_old),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addUtilizationPHRCOldRemarkModal').trigger('click');
            },



            setUtilizationTotalMonth(month, type)
            {
                this.refinery_utilization_total.month = month; 
                this.refinery_utilization_total.year = this.year_acq;

                this.clearUtilizationTotalForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_perf_util_total/' + this.refinery_utilization_total.month +'/'+ this.refinery_utilization_total.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('install_capacity'); 
                         arr.push('opening_stock');
                         arr.push('crude_receipt');
                         arr.push('crude_processed');
                         arr.push('closing_stock');  
                         arr.push('capacity_utilization');                      

                        res.data.forEach((item, index)=>
                        {                  
                          this.refinery_utilization_total[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addUtilizationTotalRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.refinery_utilization_total),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addUtilizationTotalRemarkModal').trigger('click');
            },



            setTruckOutMonth(month, type)
            {
                this.downstream_truck_out.month = month; 
                this.downstream_truck_out.year = this.year_acq;

                this.clearTruckOutForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_truck_out/' + this.downstream_truck_out.month +'/'+ this.downstream_truck_out.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('hhk');
                         arr.push('ago');
                         arr.push('atk');                     

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_truck_out[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addTruckOutRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_truck_out),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addTruckOutRemarkModal').trigger('click');
            },



            setMktSegmentNNPCMonth(month, type)
            {
                this.truck_out_marketer_nnpc.month = month; 
                this.truck_out_marketer_nnpc.year = this.year_acq;

                this.clearMktSegmentNNPCForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/truck_out_marketer_nnpc/' + this.truck_out_marketer_nnpc.month +'/'+ this.truck_out_marketer_nnpc.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('dpk');
                         arr.push('ago');                     

                        res.data.forEach((item, index)=>
                        {                  
                          this.truck_out_marketer_nnpc[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addMktSegmentNNPCRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.truck_out_marketer_nnpc),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addMktSegmentNNPCRemarkModal').trigger('click');
            },



            setMktSegmentMajorMonth(month, type)
            {
                this.truck_out_marketer_major.month = month; 
                this.truck_out_marketer_major.year = this.year_acq;

                this.clearMktSegmentMajorForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/truck_out_marketer_major/' + this.truck_out_marketer_major.month +'/'+ this.truck_out_marketer_major.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('dpk');
                         arr.push('ago');                     

                        res.data.forEach((item, index)=>
                        {                  
                          this.truck_out_marketer_major[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addMktSegmentMajorRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.truck_out_marketer_major),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addMktSegmentMajorRemarkModal').trigger('click');
            },



            setMktSegmentIndependentMonth(month, type)
            {
                this.truck_out_marketer_independent.month = month; 
                this.truck_out_marketer_independent.year = this.year_acq;

                this.clearMktSegmentIndependentForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/truck_out_marketer_independent/' + this.truck_out_marketer_independent.month +'/'+ this.truck_out_marketer_independent.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('pms'); 
                         arr.push('dpk');
                         arr.push('ago');                     

                        res.data.forEach((item, index)=>
                        {                  
                          this.truck_out_marketer_independent[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addMktSegmentIndependentRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.truck_out_marketer_independent),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addMktSegmentIndependentRemarkModal').trigger('click');
            },



            setTerminalOperationMonth(month, type)
            {
                this.downstream_terminal_operation.month = month; 
                this.downstream_terminal_operation.year = this.year_acq;

                this.clearTerminalOperationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/downstream_terminal_operation/' + this.downstream_terminal_operation.month +'/'+ this.downstream_terminal_operation.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('oil_condensate_production'); 
                         arr.push('oil_condensate_export');
                         arr.push('refinery_supply');                     

                        res.data.forEach((item, index)=>
                        {                  
                          this.downstream_terminal_operation[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addTerminalOperationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.downstream_terminal_operation),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addTerminalOperationRemarkModal').trigger('click');
            },



            setTerminalOperationApplicationMonth(month, type)
            {
                this.terminal_operation_application.month = month; 
                this.terminal_operation_application.year = this.year_acq;

                this.clearTerminalOperationApplicationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/terminal_operation_application/' + this.terminal_operation_application.month +'/'+ this.terminal_operation_application.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('export_permit_received');
                         arr.push('export_permit_approved');
                         arr.push('establishment_received');
                         arr.push('establishment_approved');
                         arr.push('suttle_trucking_received');
                         arr.push('suttle_trucking_approved');
                         arr.push('suttle_bargingreceived');
                         arr.push('suttle_bargingapproved');
                         arr.push('tank_calibration_received');
                         arr.push('tank_calibration_approved');
                         arr.push('calibration_proving_received');
                         arr.push('calibration_proving_approved');
                         arr.push('instrument_calibration_received');
                         arr.push('instrument_calibration_approved');                  

                        res.data.forEach((item, index)=>
                        {                  
                          this.terminal_operation_application[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addTerminalOperationApplicationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.terminal_operation_application),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                toastr.success('Remark Has Been Add Successfully');
                $('#addTerminalOperationApplicationRemarkModal').trigger('click');
            },




        }
        
    };


</script>

