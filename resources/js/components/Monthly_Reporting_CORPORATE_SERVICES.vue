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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For Corporate Services Division </h4>
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
                            <a class="nav-link" data-toggle="tab" href="#sta" role="tab" @click="setStaffMatters">STAFF </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#med" role="tab" @click="setMedicalServices">MEDICAL SERVICES </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dis" role="tab" @click="setDiseasePattern">DISEASE PATTERN </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#log" role="tab" @click="setLogistics">LOGISTICS </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane p-3" id="sta" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-striped table-sm mb-0" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> STAFF DISPOSITION/MATTERS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addStaffMattersRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setStaffMattersMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_staff_matter in list_staff_matters">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_staff_matter.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_staff_matter.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_staff_matters" :file_name="'Monthly Staff Desposition Matters'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="med" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-striped table-sm mb-0" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> MEDICAL SERVICES </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addMedicalServicesRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setMedicalServicesMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_medical in list_medicals">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_medical.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_medical.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_medicals" :file_name="'Monthly Medical Services'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="dis" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-striped table-sm mb-0" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> DISEASE PATTERN </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDiseasePatternRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDiseasePatternMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_disease in list_diseases">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_disease.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_disease.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_diseases" :file_name="'Monthly Disease Pattern'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>

                        <div class="tab-pane p-3" id="log" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-striped table-sm mb-0" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> LOGISTICS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLogisticsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLogisticsMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_logistic in list_logistics">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_logistic.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_logistic.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_logistics" :file_name="'Monthly logistics'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                    </div>

                </div>
            </div>
        </div>










        <form @submit.prevent="addStaffMattersReportRemarks" class="form-horizontal">
            <div id="addStaffMattersRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Staff Matters Count Remark For {{staff_matter.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="staff_matter.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Staff Strength</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.staff_strength"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Retired</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.retired"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Deceased</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.deceased"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Commence Annual Leave</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.commence_annual_leave"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Resumed Annual Leave</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.resumed_annaul_leave"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Disciplinary Cases</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.new_disiplinary_case"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Contractors  Registered</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.contractor_registered"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Local Training</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.local_training"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Overseas Training</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="staff_matter.overseas_training"></textarea>
                        </div>
                      </div>  


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="staff_matter.month">
                            <input type="hidden" class="form-control" v-model="staff_matter.type">
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



        <form @submit.prevent="addMedicalServicesReportRemarks" class="form-horizontal">
            <div id="addMedicalServicesRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Medical Services Count Remark For {{medical_service.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="medical_service.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Patient Attendance/Clinic Visits</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.clinic_visit"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Referrals</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.referral"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sick Leave</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.sick_leave_case"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Maternity Leave</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.maternity_leave"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Talk</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.health_talk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Walk</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.health_walk"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Immunization</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.immunization"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Canteen Visits</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="medical_service.canteen_visit"></textarea>
                        </div>
                      </div>  


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="medical_service.month">
                            <input type="hidden" class="form-control" v-model="medical_service.type">
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



        <form @submit.prevent="addDiseasePatternReportRemarks" class="form-horizontal">
            <div id="addDiseasePatternRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Disease Pattern Count Remark For {{disease_pattern.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="disease_pattern.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Patient Attendance/Clinic Visits</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="disease_pattern.arthritis"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Referrals</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="disease_pattern.malaria"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sick Leave</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="disease_pattern.urti"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Maternity Leave</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="disease_pattern.diabetes"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Talk</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="disease_pattern.hypertension"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">YTD on Health Walk</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="disease_pattern.viral_syndrome"></textarea>
                        </div>
                      </div>   


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="disease_pattern.month">
                            <input type="hidden" class="form-control" v-model="disease_pattern.type">
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



        <form @submit.prevent="addLogisticsReportRemarks" class="form-horizontal">
            <div id="addLogisticsRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Staff Matters Count Remark For {{logistic.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="logistic.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">New Vehicles</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.newly_received_vehicle"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Util-Total Fleet</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.fleet_utilization"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Coaster buses</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.coaster_bus"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Hilux</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.hilux"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Cars</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.cars"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Peugeot buses</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.peugeot_bus"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Mits p/up van</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.mits_p_up_van"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">land cruisers</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.land_cruiser"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Prado SUV</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.prado_suv"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Hiace buses</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.hiace_bus"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Ambulance</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="logistic.ambulance"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="logistic.month">
                            <input type="hidden" class="form-control" v-model="logistic.type">
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
                list_staff_matters: [],
                list_medicals: [],
                list_diseases: [],
                list_logistics: [],



                staff_matter: {
                    id: '',
                    year: '',
                    month: '',
                    staff_strength: '',
                    retired: '',
                    deceased: '',
                    commence_annual_leave: '',
                    resumed_annaul_leave: '',
                    new_disiplinary_case: '',
                    contractor_registered: '',
                    local_training: '',
                    overseas_training: '',
                    type: 'staff_matter'
                },
 
                medical_service: {
                    id: '',
                    year: '',
                    month: '',
                    clinic_visit: '',
                    referral: '',
                    sick_leave_case: '',
                    maternity_leave: '',
                    health_talk: '',
                    health_walk: '',
                    immunization: '',
                    canteen_visit: '',
                    type: 'medical_service'
                },
 
                disease_pattern: {
                    id: '',
                    year: '',
                    month: '',
                    arthritis: '',
                    malaria: '',
                    urti: '',
                    diabetes: '',
                    hypertension: '',
                    viral_syndrome: '',
                    type: 'disease_pattern'
                },
 
                logistic: {
                    id: '',
                    year: '',
                    month: '',
                    newly_received_vehicle: '',
                    fleet_utilization: '',
                    coaster_bus: '',
                    hilux: '',
                    cars: '',
                    peugeot_bus: '',
                    mits_p_up_van: '',
                    land_cruiser: '',
                    prado_suv: '',
                    hiace_bus: '',
                    ambulance: '',
                    type: 'logistic'
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
                this.setStaffMatters();  
                this.setMedicalServices(); 
                this.setDiseasePattern(); 
                this.setLogistics();
            },





            setStaffMatters()
            {
                let report = '/api/monthly-reporting-corp-services/staff_matter/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_staff_matters = res;
                })
                .catch(err => console.log(err));            
            },

            setMedicalServices()
            {
                let report = '/api/monthly-reporting-corp-services/medical/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_medicals = res;
                })
                .catch(err => console.log(err));            
            },

            setDiseasePattern()
            {
                let report = '/api/monthly-reporting-corp-services/disease/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_diseases = res;
                })
                .catch(err => console.log(err));            
            },

            setLogistics()
            {
                let report = '/api/monthly-reporting-corp-services/logistic/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_logistics = res;
                })
                .catch(err => console.log(err));            
            },





            clearStaffMattersForm()
            {
                this.staff_matter.staff_strength = '';
                this.staff_matter.retired = '';
                this.staff_matter.deceased = '';
                this.staff_matter.commence_annual_leave = '';
                this.staff_matter.resumed_annaul_leave = '';
                this.staff_matter.new_disiplinary_case = '';
                this.staff_matter.contractor_registered = '';
                this.staff_matter.local_training = '';
                this.staff_matter.overseas_training = '';
            },

            clearMedicalServicesForm()
            {
                this.medical_service.clinic_visit = '';
                this.medical_service.referral = '';
                this.medical_service.sick_leave_case = '';
                this.medical_service.maternity_leave = '';
                this.medical_service.health_talk = '';
                this.medical_service.health_walk = '';
                this.medical_service.immunization = '';
                this.medical_service.canteen_visit = '';
            },

            clearDiseasePatternForm()
            {
                this.disease_pattern.arthritis = '';
                this.disease_pattern.malaria = '';
                this.disease_pattern.urti = '';
                this.disease_pattern.diabetes = '';
                this.disease_pattern.hypertension = '';
                this.disease_pattern.viral_syndrome = '';
            },

            clearLogisticsForm()
            {
                this.logistic.newly_received_vehicle = '';
                this.logistic.fleet_utilization = '';
                this.logistic.coaster_bus = '';
                this.logistic.hilux = '';
                this.logistic.cars = '';
                this.logistic.peugeot_bus = '';
                this.logistic.mits_p_up_van = '';
                this.logistic.land_cruiser = '';
                this.logistic.prado_suv = '';
                this.logistic.hiace_bus = '';
                this.logistic.ambulance = '';
            },
           





            setStaffMattersMonth(month)
            {
                this.staff_matter.month = month; 
                this.staff_matter.year = this.year_acq;

                this.clearStaffMattersForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/staff_matter/' + this.staff_matter.month +'/'+ this.staff_matter.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('staff_strength');
                         arr.push('retired');
                         arr.push('deceased');
                         arr.push('commence_annual_leave');
                         arr.push('resumed_annaul_leave');
                         arr.push('new_disiplinary_case');
                         arr.push('contractor_registered');
                         arr.push('local_training');
                         arr.push('overseas_training');


                        res.data.forEach((item, index)=>
                        {                  
                          this.staff_matter[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addStaffMattersReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.staff_matter),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addStaffMattersRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },




            setMedicalServicesMonth(month)
            {
                this.medical_service.month = month; 
                this.medical_service.year = this.year_acq;

                this.clearMedicalServicesForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/medical_service/' + this.medical_service.month +'/'+ this.medical_service.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('clinic_visit');
                         arr.push('referral');
                         arr.push('sick_leave_case');
                         arr.push('maternity_leave');
                         arr.push('health_talk');
                         arr.push('health_walk');
                         arr.push('immunization');
                         arr.push('canteen_visit');


                        res.data.forEach((item, index)=>
                        {                  
                          this.medical_service[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addMedicalServicesReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.medical_service),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addMedicalServicesRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },




            setDiseasePatternMonth(month)
            {
                this.disease_pattern.month = month; 
                this.disease_pattern.year = this.year_acq;

                this.clearDiseasePatternForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/disease_pattern/' + this.disease_pattern.month +'/'+ this.disease_pattern.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('arthritis');
                         arr.push('malaria');
                         arr.push('urti');
                         arr.push('diabetes');
                         arr.push('hypertension');
                         arr.push('viral_syndrome');

                        res.data.forEach((item, index)=>
                        {                  
                          this.disease_pattern[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addDiseasePatternReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.disease_pattern),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addDiseasePatternRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },




            setLogisticsMonth(month)
            {
                this.logistic.month = month; 
                this.logistic.year = this.year_acq;

                this.clearLogisticsForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/logistic/' + this.logistic.month +'/'+ this.logistic.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('newly_received_vehicle');
                         arr.push('fleet_utilization');
                         arr.push('coaster_bus');
                         arr.push('hilux');
                         arr.push('cars');
                         arr.push('peugeot_bus');
                         arr.push('mits_p_up_van');
                         arr.push('land_cruiser');
                         arr.push('prado_suv');
                         arr.push('hiace_bus');
                         arr.push('ambulance');

                        res.data.forEach((item, index)=>
                        {                  
                          this.logistic[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addLogisticsReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.logistic),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addLogisticsRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            }

        }
        
    };


</script>

