
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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For Upstream Division </h4>
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
                            <a class="nav-link" data-toggle="tab" href="#acq" role="tab" @click="setSeismicDataQuantum">ACQUISITION </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dri" role="tab" @click="setWellDrilling">DRILLING </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ops" role="tab" @click="setReEntry">RE-ENRTY </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rig" role="tab" @click="setRig">RIG </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fdp" role="tab" @click="setFDP">FDP </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab" @click="setDepletion">DEPLETION </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cop" role="tab" @click="setCrudeOil">CRUDE OIL </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rev" role="tab" @click="setRevenue">REVENUE </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#unit" role="tab" @click="setUnitization">UNITIZATION </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3" id="acq" role="tabpanel" style="padding-left: 0px !important; padding-right: 0px !important">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <form @submit.prevent="addAcquisitionRemarks" class="form-horizontal">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Seismic Aquisition </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('January', 'Acquisition')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('February', 'Acquisition')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('March', 'Acquisition')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('Qrt 1', 'Acquisition')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('April', 'Acquisition')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('May', 'Acquisition')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('June', 'Acquisition')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('Qrt 2 ', 'Acquisition')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('Mid-year', 'Acquisition')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('July', 'Acquisition')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('August', 'Acquisition')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('September', 'Acquisition')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('Qrt 3', 'Acquisition')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('October', 'Acquisition')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('November', 'Acquisition')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('December', 'Acquisition')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('Qrt 4', 'Acquisition')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addAcquisitionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setAcquisitionMonth('Annual', 'Acquisition')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>


                                        <tbody v-for="(list_acquisition, index) in list_acquisitions">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_acquisition.name }} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_acquisition.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" 
                                                    :name="'acquisition_' + index" :id="'acquisition_' + index" />
                                                </th>
                                            </tr>
                                        </tbody> 
                                        <!-- <button type="submit" class="btn btn-dark"> <i class="fa fa-plus"></i> Save Changes </button>                                    -->
                                    </table>
                                    </form>

                                        <UpstreamExcelExport :data="list_acquisitions" :file_name="'Monthly Seismic Data Acquisition'"></UpstreamExcelExport>
                                </div>   
                            </p>
                        </div>                   
                        
                        <div class="tab-pane p-3" id="dri" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Drilling Activities </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('January', 'Drilling')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('February', 'Drilling')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('March', 'Drilling')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('Qrt 1', 'Drilling')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('April', 'Drilling')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('May', 'Drilling')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('June', 'Drilling')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('Qrt 2 ', 'Drilling')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('Mid-year', 'Drilling')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('July', 'Drilling')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('August', 'Drilling')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('September', 'Drilling')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('Qrt 3', 'Drilling')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('October', 'Drilling')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('November', 'Drilling')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('December', 'Drilling')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('Qrt 4', 'Drilling')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDrillingMonth('Annual', 'Drilling')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_drilling in list_drillings">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_drilling.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_drilling.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                        <UpstreamExcelExport :data="list_drillings" :file_name="'Monthly WELL RE ENTRY OPERATIONS'"></UpstreamExcelExport>
                                </div>  
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="ops" role="tabpanel">
                            <p class="font-14 mb-0">  
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> WELL RE ENTRY OPERATIONS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('January', 'ReEntry')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('February', 'ReEntry')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('March', 'ReEntry')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('Qrt 1', 'ReEntry')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('April', 'ReEntry')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('May', 'ReEntry')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('June', 'ReEntry')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('Qrt 2 ', 'ReEntry')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('Mid-year', 'ReEntry')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('July', 'ReEntry')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('August', 'ReEntry')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('September', 'ReEntry')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('Qrt 3', 'ReEntry')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('October', 'ReEntry')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('November', 'ReEntry')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('December', 'ReEntry')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('Qrt 4', 'ReEntry')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setReEntryMonth('Annual', 'ReEntry')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_entry in list_re_entries">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_entry.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_entry.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_re_entries" :file_name="'Monthly Well ReEntry'"></UpstreamExcelExport>
                                </div> 
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="rig" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> RIG DISPOSITION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('January', 'RigDisposition')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('February', 'RigDisposition')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('March', 'RigDisposition')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('Qrt 1', 'RigDisposition')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('April', 'RigDisposition')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('May', 'RigDisposition')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('June', 'RigDisposition')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('Qrt 2 ', 'RigDisposition')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('Mid-year', 'RigDisposition')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('July', 'RigDisposition')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('August', 'RigDisposition')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('September', 'RigDisposition')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('Qrt 3', 'RigDisposition')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('October', 'RigDisposition')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('November', 'RigDisposition')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('December', 'RigDisposition')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('Qrt 4', 'RigDisposition')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRigDispositionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRigDispositionMonth('Annual', 'RigDisposition')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_rig in list_rigs">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_rig.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_rig.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_rigs" :file_name="'Monthly Rig Disposition'"></UpstreamExcelExport>
                                </div>
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="fdp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> FDP APPLICATION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('January', 'FDPApplication')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('February', 'FDPApplication')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('March', 'FDPApplication')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('Qrt 1', 'FDPApplication')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('April', 'FDPApplication')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('May', 'FDPApplication')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('June', 'FDPApplication')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('Qrt 2 ', 'FDPApplication')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('Mid-year', 'FDPApplication')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('July', 'FDPApplication')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('August', 'FDPApplication')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('September', 'FDPApplication')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('Qrt 3', 'FDPApplication')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('October', 'FDPApplication')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('November', 'FDPApplication')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('December', 'FDPApplication')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('Qrt 4', 'FDPApplication')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addFDPApplicationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setFDPApplicationMonth('Annual', 'FDPApplication')"> Annual </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_fdp in list_fdps">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_fdp.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_fdp.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_fdps" :file_name="'Monthly FDP Application'"></UpstreamExcelExport>
                                </div>
                            </p>
                        </div>     

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> DEPLETION RATE, LIFE INDEX </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('January', 'DepletionRate')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('February', 'DepletionRate')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('March', 'DepletionRate')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('Qrt 1', 'DepletionRate')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('April', 'DepletionRate')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('May', 'DepletionRate')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('June', 'DepletionRate')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('Qrt 2 ', 'DepletionRate')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('Mid-year', 'DepletionRate')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('July', 'DepletionRate')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('August', 'DepletionRate')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('September', 'DepletionRate')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('Qrt 3', 'DepletionRate')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('October', 'DepletionRate')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('November', 'DepletionRate')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('December', 'DepletionRate')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('Qrt 4', 'DepletionRate')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setDepletionRateMonth('Annual', 'DepletionRate')"> Annual </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_depletion in list_depletions">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_depletion.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_depletion.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_depletions" :file_name="'Monthly Depletion Rate'"></UpstreamExcelExport>
                                </div>
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="cop" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> CRUDE OIL PRODUCTION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('January', 'CrudeOilProduction')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('February', 'CrudeOilProduction')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('March', 'CrudeOilProduction')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('Qrt 1', 'CrudeOilProduction')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('April', 'CrudeOilProduction')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('May', 'CrudeOilProduction')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('June', 'CrudeOilProduction')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('Qrt 2 ', 'CrudeOilProduction')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('Mid-year', 'CrudeOilProduction')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('July', 'CrudeOilProduction')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('August', 'CrudeOilProduction')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('September', 'CrudeOilProduction')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('Qrt 3', 'CrudeOilProduction')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('October', 'CrudeOilProduction')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('November', 'CrudeOilProduction')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('December', 'CrudeOilProduction')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('Qrt 4', 'CrudeOilProduction')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addCrudeOilProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setCrudeOilProductionMonth('Annual', 'CrudeOilProduction')"> Annual </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_crude_oil in list_crude_oils">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_crude_oil.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_crude_oil.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_crude_oils" :file_name="'Monthly Crude Oil Production'"></UpstreamExcelExport>
                                </div>
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="rev" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> REVENUE GENERATION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('January', 'RevenueGenerated')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('February', 'RevenueGenerated')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('March', 'RevenueGenerated')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('Qrt 1', 'RevenueGenerated')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('April', 'RevenueGenerated')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('May', 'RevenueGenerated')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('June', 'RevenueGenerated')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('Qrt 2 ', 'RevenueGenerated')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('Mid-year', 'RevenueGenerated')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('July', 'RevenueGenerated')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('August', 'RevenueGenerated')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('September', 'RevenueGenerated')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('Qrt 3', 'RevenueGenerated')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('October', 'RevenueGenerated')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('November', 'RevenueGenerated')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('December', 'RevenueGenerated')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('Qrt 4', 'RevenueGenerated')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addRevenueGeneratedRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setRevenueGeneratedMonth('Annual', 'RevenueGenerated')"> Annual </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_revenue in list_revenues">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_revenue.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_revenue.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_revenues" :file_name="'Monthly Revenue Generated'"></UpstreamExcelExport>
                                </div>
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="unit" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive" style="padding: 0px">
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> UNITIZATION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('January', 'Unitization')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('February', 'Unitization')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('March', 'Unitization')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('Qrt 1', 'Unitization')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('April', 'Unitization')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('May', 'Unitization')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('June', 'Unitization')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('Qrt 2 ', 'Unitization')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('Mid-year', 'Unitization')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('July', 'Unitization')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('August', 'Unitization')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('September', 'Unitization')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('Qrt 3', 'Unitization')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('October', 'Unitization')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('November', 'Unitization')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('December', 'Unitization')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('Qrt 4', 'Unitization')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addUnitizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setUnitizationMonth('Annual', 'Unitization')"> Annual </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_unitization in list_unitizations">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_unitization.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_unitization.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_unitizations" :file_name="'Monthly Unitization'"></UpstreamExcelExport>
                                </div>
                            </p>
                        </div>    
                    </div>

                </div>
            </div>
        </div>






        <!-- Add Remarks modal -->
        <form @submit.prevent="addAcquisitionRemarks" class="form-horizontal">
            <div id="addAcquisitionRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Seismic Date Acquisition Remark For {{acquisition.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="acquisition.year" required>
                        </div>
                      </div>                     

                      <div class="form-group row">
                        <label for="seismic_data_acquired" class="col-sm-3 col-form-label"> Siesmic data acquired </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="acquisition.seismic_data_acquired" required></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="cumulative_seismic_acquired" class="col-sm-3 col-form-label"> Cumulative Siesmic Acquired </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="acquisition.cumulative_seismic_acquired"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="annual_seismic_acquisition" class="col-sm-3 col-form-label">Annual seismic aquisation</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="acquisition.annual_seismic_acquisition"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="seismic_data_processed" class="col-sm-3 col-form-label">Siesmic data Quantum Processed </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="acquisition.seismic_data_processed"></textarea>
                            <input type="hidden" class="form-control" v-model="acquisition.month">
                            <input type="hidden" class="form-control" v-model="acquisition.type">
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
        <form @submit.prevent="addDrillingRemarks" class="form-horizontal">
            <div id="addDrillingRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Well Drilling Count Remark For {{well_drilling.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="well_drilling.year" required>
                        </div>
                      </div>                      

                      <div class="form-group row">
                        <label for="exploration_commenced" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.exploration_commenced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_ongoing" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.exploration_ongoing"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_completed" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.exploration_completed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_commenced" class="col-sm-3 col-form-label">Appraisal Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.appraisal_commenced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_ongoing" class="col-sm-3 col-form-label">Appraisal Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.appraisal_ongoing"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_completed" class="col-sm-3 col-form-label">Appraisal Drilling Completed </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.appraisal_completed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_commenced" class="col-sm-3 col-form-label">Development Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.development_commenced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_ongoing" class="col-sm-3 col-form-label">Development Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.development_ongoing"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_completed" class="col-sm-3 col-form-label">Development Drilling Completed </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.development_completed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_completion" class="col-sm-3 col-form-label">Well Completion  </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.well_completion"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_spudded" class="col-sm-3 col-form-label">Well Spudded  </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.well_spudded"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="drilling_rig" class="col-sm-3 col-form-label">Drilling Rig </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_drilling.drilling_rig"></textarea>
                            <input type="hidden" class="form-control" v-model="well_drilling.month">
                            <input type="hidden" class="form-control" v-model="well_drilling.type">
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
        <form @submit.prevent="addReEntryRemarks" class="form-horizontal">
            <div id="addReEntryRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Well Re Entry Count Remark For {{well_re_entry.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="well_re_entry.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="re_entry_commenced" class="col-sm-3 col-form-label"> Well re_entry Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.re_entry_commenced" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_ongoing" class="col-sm-3 col-form-label"> Well re_entry Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.re_entry_ongoing" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_completed" class="col-sm-3 col-form-label">Well re_entry Completed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.re_entry_completed" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="workover_commenced" class="col-sm-3 col-form-label">Well re_entry Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.workover_commenced" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="workover_ongoing" class="col-sm-3 col-form-label">Well re_entry Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.workover_ongoing" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="workover_completed" class="col-sm-3 col-form-label">Well re_entry Completed </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.workover_completed" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_completion" class="col-sm-3 col-form-label">Well re_entry Completion </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.re_entry_completion" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_workover" class="col-sm-3 col-form-label">Well re_entry Workover </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.re_entry_workover" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="re_entry_reserve_addition" class="col-sm-3 col-form-label">Well re_entry Reserve Addition (MMBO) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.re_entry_reserve_addition" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_expected_rate" class="col-sm-3 col-form-label">Well Expected Rate (Bopd) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="well_re_entry.well_expected_rate" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="well_re_entry.month">
                            <input type="hidden" class="form-control" v-model="well_re_entry.type">
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
        <form @submit.prevent="addRigDispositionRemarks" class="form-horizontal">
            <div id="addRigDispositionRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Rig Disposition Count Remark For {{rig_disposition.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="rig_disposition.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="active_rig" class="col-sm-3 col-form-label"> No. of Active Rigs </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rig_disposition.active_rig" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="statcked_rig" class="col-sm-3 col-form-label"> No. of Stacked Rigs </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rig_disposition.statcked_rig" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="rig_on_standby" class="col-sm-3 col-form-label"> No. of Rigs on Standby</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rig_disposition.rig_on_standby" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="total_rig" class="col-sm-3 col-form-label">Total no of Rigs </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="rig_disposition.total_rig" ></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="rig_disposition.month">
                            <input type="hidden" class="form-control" v-model="rig_disposition.type">
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
        <form @submit.prevent="addFDPApplicationRemarks" class="form-horizontal">
            <div id="addFDPApplicationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> FDP Application Count Remark For {{fdp_application.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="fdp_application.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> FDP applications Received </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="fdp_application.application_received" ></div>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> FDP applications Approved </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="fdp_application.application_approved" ></div>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Anticipated production Rate(BOPD)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="fdp_application.production_rate" ></div>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Expected Reserve(MMSTB) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="fdp_application.expected_reserve" ></div>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total cost (MM$) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="fdp_application.total_cost" ></div>
                        </div>
                      </div> 
 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="fdp_application.month">
                            <input type="hidden" class="form-control" v-model="fdp_application.type">
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
        <form @submit.prevent="addDepletionRateRemarks" class="form-horizontal">
            <div id="addDepletionRateRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Depletion Rate Count Remark For {{depletion_rate.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="depletion_rate.year" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Estimated annual production-Oil(MMB) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.annual_production_oil" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Estimated annual production-Condensate(MMB) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.annual_production_condensate" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Depletion Rate-Oil (%) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.depletion_rate_oil" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Depletion Rate-Condensate (%) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.depletion_rate_condensate" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Reserves as at {{(new Date).getFullYear()}} Oil(MMB) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.year_start_reserve_oil" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Reserves as at {{(new Date).getFullYear()}} Condensate(MMB) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.year_start_reserve_condensate" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Life Index-Oil(Years) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.life_index_oil" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Life Index-Condensate(Years) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="depletion_rate.life_index_condensate" ></textarea>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="depletion_rate.month">
                            <input type="hidden" class="form-control" v-model="depletion_rate.type">
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
        <form @submit.prevent="addCrudeOilProductionRemarks" class="form-horizontal">
            <div id="addCrudeOilProductionRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Crude OilProduction Count Remark For {{crude_oil_production.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="crude_oil_production.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Avg Oil & Condensate Prod(BOPD) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="crude_oil_production.avg_oil_condensate_production" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Deferment (BOPD) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="crude_oil_production.deferment" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Producing Companies </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="crude_oil_production.producing_companies" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Producing Fields </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="crude_oil_production.producing_field" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No of Shut-in Fields </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="crude_oil_production.shut_in_field" ></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="crude_oil_production.month">
                            <input type="hidden" class="form-control" v-model="crude_oil_production.type">
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
        <form @submit.prevent="addRevenueGeneratedRemarks" class="form-horizontal">
            <div id="addRevenueGeneratedRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Revenue Generated Count Remark For {{revenue_generated.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="revenue_generated.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Amount of Revenue generated from Proposal/request(N) </label>
                        <div class="col-sm-9">
                            <textarea rows="3" step="0.01" class="form-control" v-model="revenue_generated.revenue_generated" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="revenue_generated.month">
                            <input type="hidden" class="form-control" v-model="revenue_generated.type">
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
        <form @submit.prevent="addUnitizationRemarks" class="form-horizontal">
            <div id="addUnitizationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Unitization Count Remark For {{unitization.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="unitization.year" required>
                        </div>
                      </div>  
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> STATUS OF UNITIZATION </label>
                        <div class="col-sm-9">
                            <textarea rows="3" step="0.01" class="form-control" v-model="unitization.unitized_field" required></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="unitization.month">
                            <input type="hidden" class="form-control" v-model="unitization.type">
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

                // month:'',
                acquisitions: [], 
                acquisition: {
                    id: '',
                    year: '',
                    month: '',
                    seismic_data_acquired: '',
                    cumulative_seismic_acquired: '',
                    annual_seismic_acquisition: '',
                    seismic_data_processed: '',
                    type: 'acquisition'
                },

                well_drillings: [], 
                well_drilling: {
                    id: '',
                    year: '',
                    month: '',
                    exploration_commenced: '',
                    exploration_ongoing: '',
                    exploration_completed: '',
                    appraisal_commenced: '',
                    appraisal_ongoing: '',
                    appraisal_completed: '',
                    development_commenced: '',
                    development_ongoing: '',
                    development_completed: '',
                    well_completion: '',
                    well_spudded: '',
                    drilling_rig: '',
                    type: 'drilling'
                },

                well_re_entries: [], 
                well_re_entry: {
                    id: '',
                    year: '',
                    month: '',
                    re_entry_commenced: '',
                    re_entry_ongoing: '',
                    re_entry_completed: '',
                    workover_commenced: '',
                    workover_ongoing: '',
                    workover_completed: '',
                    re_entry_completion: '',
                    re_entry_workover: '',
                    re_entry_reserve_addition: '',
                    well_expected_rate: '',
                    type: 're_entry'
                },

                rig_dispositions: [], 
                rig_disposition: {
                    id: '',
                    year: '',
                    month: '',
                    active_rig: '',
                    statcked_rig: '',
                    rig_on_standby: '',
                    total_rig: '',
                    type: 'rig_disposition'
                },

                fdp_applications: [], 
                fdp_application: {
                    id: '',
                    year: '',
                    month: '',
                    application_received: '',
                    application_approved: '',
                    production_rate: '',
                    expected_reserve: '',
                    total_cost: '',
                    type: 'fdp_application'
                },

                depletion_rates: [], 
                depletion_rate: {
                    id: '',
                    year: '',
                    month: '',
                    annual_production_oil: '',
                    annual_production_condensate: '',
                    depletion_rate_oil: '',
                    depletion_rate_condensate: '',
                    year_start_reserve_oil: '',
                    year_start_reserve_condensate: '',
                    life_index_oil: '',
                    life_index_condensate: '',
                    type: 'depletion_rate'
                },

                crude_oil_productions: [], 
                crude_oil_production: {
                    id: '',
                    year: '',
                    month: '',
                    avg_oil_condensate_production: '',
                    deferment: '',
                    producing_companies: '',
                    producing_field: '',
                    shut_in_field: '',
                    type: 'crude_oil_production'
                },

                revenue_generateds: [], 
                revenue_generated: {
                    id: '',
                    year: '',
                    month: '',
                    revenue_generated: '',
                    type: 'revenue_generated'
                },

                unitizations: [], 
                unitization: {
                    id: '',
                    year: '',
                    month: '',
                    unitized_field: '',
                    type: 'unitization'
                },



                
                monthly_remark_id: "",

                year_acq: '2019-01-01',
                week_from: '',
                week_to: '',
                list_acquisitions: [],
                list_drillings: [],
                list_re_entries: [],
                list_rigs: [],
                list_fdps: [],
                list_depletions: [],
                list_crude_oils: [],
                list_revenues: [],
                list_unitizations: [],
                edit: false,
                vform:{}
            }
        },

        created()
        {
            this.fetchWeeks();
            this.year_acq = '2019-01-01';   //REMEMBER SET YEAR USING JAVASCRIPT HERE
        },

        
        methods:{

            fetchWeeks()
            {
                let weeks = '/api/weeks'
                fetch(weeks)
                .then(res => res.json())
                .then(res => {
                    this.weeks = res.data;
                })
                .catch(err => console.log(err));            
            },

            setMonthlyReportByYear()
            {
                this.year_acq = year_acq;
                this.setSeismicDataQuantum(); 
                this.setWellDrilling(); 
                this.setReEntry(); 
                this.setRig();  
                this.setFDP();  
                this.setDepletion(); 
                this.setCrude(); 
                this.setRevenue();  
                this.setUnitization();         
            },


            setSeismicDataQuantum()
            {
                let report = '/api/monthly-report-upstream/acquisition/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_acquisitions = res;
                })
                .catch(err => console.log(err));            
            },

            setWellDrilling()
            {
                let report = '/api/monthly-report-upstream/drilling/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_drillings = res;
                })
                .catch(err => console.log(err));            
            },

            setReEntry()
            {
                let report = '/api/monthly-report-upstream/re_entry/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_re_entries = res;
                })
                .catch(err => console.log(err));            
            },

            setRig()
            {
                let report = '/api/monthly-report-upstream/rig/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_rigs = res;
                })
                .catch(err => console.log(err));            
            },

            setFDP()
            {
                let report = '/api/monthly-report-upstream/fdp/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_fdps = res;
                })
                .catch(err => console.log(err));            
            },

            setDepletion()
            {
                let report = '/api/monthly-report-upstream/depletion/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_depletions = res;
                })
                .catch(err => console.log(err));            
            },

            setCrudeOil()
            {
                let report = '/api/monthly-report-upstream/crude_oil/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_crude_oils = res;
                })
                .catch(err => console.log(err));            
            },

            setRevenue()
            {
                let report = '/api/monthly-report-upstream/revenue/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_revenues = res;
                })
                .catch(err => console.log(err));            
            },

            setUnitization()
            {
                let report = '/api/monthly-report-upstream/unitization/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_unitizations = res;
                })
                .catch(err => console.log(err));            
            },





            showRemark()
            {
                this.remark = !this.remark;  
            },


            clearAcquisitionForm()
            {
                this.acquisition.id = '';
                this.acquisition.date = '';
                this.acquisition.week = '';
                this.acquisition.seismic_data_acquired = '';
                this.acquisition.cumulative_seismic_acquired = '';
                this.acquisition.annual_seismic_acquisition = '';
                this.acquisition.seismic_data_processed = '';
            },

            clearDrillingForm()
            {
                this.well_drilling.id = '';
                this.well_drilling.date = '';
                this.well_drilling.week = '';
                this.well_drilling.exploration_commenced = '';
                this.well_drilling.exploration_ongoing = '';
                this.well_drilling.exploration_completed = '';
                this.well_drilling.appraisal_commenced = '';
                this.well_drilling.appraisal_ongoing = '';
                this.well_drilling.appraisal_completed = '';
                this.well_drilling.development_commenced = '';
                this.well_drilling.development_ongoing = '';
                this.well_drilling.development_completed = '';
                this.well_drilling.well_completion = '';
                this.well_drilling.well_spudded = '';
                this.well_drilling.drilling_rig = '';
            },

            clearReEntryForm()
            {
                this.well_re_entry.id = '';
                this.well_re_entry.date = '';
                this.well_re_entry.week = '';
                this.well_re_entry.re_entry_commenced = '';
                this.well_re_entry.re_entry_ongoing = '';
                this.well_re_entry.re_entry_completed = '';
                this.well_re_entry.workover_commenced = '';
                this.well_re_entry.workover_ongoing = '';
                this.well_re_entry.workover_completed = '';
                this.well_re_entry.re_entry_completion = '';
                this.well_re_entry.re_entry_workover = '';
                this.well_re_entry.re_entry_reserve_addition = '';
                this.well_re_entry.well_expected_rate = '';
            },

            clearRigDispositionForm()
            {
                this.rig_disposition.id = '';
                this.rig_disposition.date = '';
                this.rig_disposition.week = '';
                this.rig_disposition.active_rig = '';
                this.rig_disposition.statcked_rig = '';
                this.rig_disposition.rig_on_standby = '';
                this.rig_disposition.total_rig = '';
            },

            clearFDPApplicationForm()
            {
                this.fdp_application.id = '';
                this.fdp_application.date = '';
                this.fdp_application.week = '';
                this.fdp_application.application_received = '';
                this.fdp_application.application_approved = '';
                this.fdp_application.production_rate = '';
                this.fdp_application.expected_reserve = '';
                this.fdp_application.total_cost = '';
            },

            clearDepletionRateForm()
            {
                this.depletion_rate.id = '';
                this.depletion_rate.date = '';
                this.depletion_rate.week = '';
                this.depletion_rate.annual_production_oil = '';
                this.depletion_rate.annual_production_condensate = '';
                this.depletion_rate.depletion_rate_oil = '';
                this.depletion_rate.depletion_rate_condensate = '';
                this.depletion_rate.year_start_reserve_oil = '';
                this.depletion_rate.year_start_reserve_condensate = '';
                this.depletion_rate.life_index_oil = '';
                this.depletion_rate.life_index_condensate = '';
            },

            clearCrudeOilProductionForm()
            {
                this.crude_oil_production.id = '';
                this.crude_oil_production.date = '';
                this.crude_oil_production.week = '';
                this.crude_oil_production.avg_oil_condensate_production = '';
                this.crude_oil_production.deferment = '';
                this.crude_oil_production.producing_companies = '';
                this.crude_oil_production.producing_field = '';
                this.crude_oil_production.shut_in_field = '';
            },

            clearRevenueGeneratedForm()
            {
                this.revenue_generated.id = '';
                this.revenue_generated.date = '';
                this.revenue_generated.week = '';
                this.revenue_generated.revenue_generated = '';
            },

            clearUnitizationForm()
            {
                this.unitization.id = '';
                this.unitization.date = '';
                this.unitization.week = '';
                this.unitization.unitized_field = '';
            },




            setAcquisitionMonth(month, type)
            {
                this.acquisition.month = month; 
                this.acquisition.year = this.year_acq;

                this.clearAcquisitionForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/acquisition/' + this.acquisition.month +'/'+ this.acquisition.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                        // this.acquisition = res.data;
                      
                         let arr = [];

                         arr.push('seismic_data_acquired');
                         arr.push('cumulative_seismic_acquired');
                         arr.push('annual_seismic_acquisition');
                         arr.push('seismic_data_processed');

                        res.data.forEach((item, index)=>
                        {                  
                          this.acquisition[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addAcquisitionRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.acquisition),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err));
                $('#addAcquisitionRemarkModal').trigger('click');
            },



            setDrillingMonth(month, type)
            {               
                setTimeout(()=>{

                this.well_drilling.month = month; 
                this.well_drilling.year = this.year_acq;

                this.clearDrillingForm();

                    let url = '/api/war-remarks/drilling/' + this.well_drilling.month +'/'+ this.well_drilling.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('exploration_commenced');
                         arr.push('exploration_ongoing');
                         arr.push('exploration_completed');
                         arr.push('appraisal_commenced');
                         arr.push('appraisal_ongoing');
                         arr.push('appraisal_completed');
                         arr.push('development_commenced');
                         arr.push('development_ongoing');
                         arr.push('development_completed');
                         arr.push('well_completion');
                         arr.push('well_spudded');
                         arr.push('drilling_rig');

                        res.data.forEach((item, index)=>
                        {                  
                          this.well_drilling[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addDrillingRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.well_drilling),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Drilling Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addDrillingRemarkModal').trigger('click');
            },



            setReEntryMonth(month, type)
            {               
                setTimeout(()=>{

                this.well_re_drilling.month = month; 
                this.well_re_drilling.year = this.year_acq;

                this.clearReEntryForm();

                    let url = '/api/war-remarks/re_entry/' + this.well_re_entry.month +'/'+ this.well_re_entry.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('re_entry_commenced');
                         arr.push('re_entry_ongoing');
                         arr.push('re_entry_completed');
                         arr.push('workover_commenced');
                         arr.push('workover_ongoing');
                         arr.push('workover_completed');
                         arr.push('re_entry_completion');
                         arr.push('re_entry_workover');
                         arr.push('re_entry_reserve_addition');
                         arr.push('well_expected_rate');

                        res.data.forEach((item, index)=>
                        {                  
                          this.well_re_drilling[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addReEntryRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.well_re_drilling),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Re Entry Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addReEntryRemarkModal').trigger('click');
            },



            setRigDispositionMonth(month, type)
            {               
                setTimeout(()=>{

                this.rig_disposition.month = month; 
                this.rig_disposition.year = this.year_acq;

                this.clearRigDispositionForm();

                    let url = '/api/war-remarks/rig_disposition/' + this.rig_disposition.month +'/'+ this.rig_disposition.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('active_rig');
                         arr.push('statcked_rig');
                         arr.push('rig_on_standby');
                         arr.push('total_rig');

                        res.data.forEach((item, index)=>
                        {                  
                          this.rig_disposition[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addRigDispositionRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.rig_disposition),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Rig Disposition Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addRigDispositionRemarkModal').trigger('click');
            },



            setFDPApplicationMonth(month, type)
            {               
                setTimeout(()=>{

                this.fdp_application.month = month; 
                this.fdp_application.year = this.year_acq;

                this.clearFDPApplicationForm();

                    let url = '/api/war-remarks/fdp_application/' + this.fdp_application.month +'/'+ this.fdp_application.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('application_received');
                         arr.push('application_approved');
                         arr.push('production_rate');
                         arr.push('expected_reserve');
                         arr.push('total_cost');

                        res.data.forEach((item, index)=>
                        {                  
                          this.fdp_application[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addFDPApplicationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.fdp_application),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well FDP Application Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addFDPApplicationRemarkModal').trigger('click');
            },



            setDepletionRateMonth(month, type)
            {               
                setTimeout(()=>{

                this.depletion_rate.month = month; 
                this.depletion_rate.year = this.year_acq;

                this.clearDepletionRateForm();

                    let url = '/api/war-remarks/depletion_rate/' + this.depletion_rate.month +'/'+ this.depletion_rate.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('annual_production_oil');
                         arr.push('annual_production_condensate');
                         arr.push('depletion_rate_oil');
                         arr.push('depletion_rate_condensate');
                         arr.push('year_start_reserve_oil');
                         arr.push('year_start_reserve_condensate');
                         arr.push('life_index_oil');
                         arr.push('life_index_condensate');

                        res.data.forEach((item, index)=>
                        {                  
                          this.depletion_rate[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addDepletionRateRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.depletion_rate),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Depletion Rate Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addDepletionRateRemarkModal').trigger('click');
            },



            setCrdueOilProductionMonth(month, type)
            {               
                setTimeout(()=>{

                this.crude_oil_production.month = month; 
                this.crude_oil_production.year = this.year_acq;

                this.clearCrdueOilProductionForm();

                    let url = '/api/war-remarks/crude_oil_production/' + this.crude_oil_production.month +'/'+ this.crude_oil_production.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('avg_oil_condensate_production');
                         arr.push('deferment');
                         arr.push('producing_companies');
                         arr.push('producing_field');
                         arr.push('shut_in_field');

                        res.data.forEach((item, index)=>
                        {                  
                          this.crude_oil_production[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addCrdueOilProductionRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.crude_oil_production),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Crdue Oil Production Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addCrdueOilProductionRemarkModal').trigger('click');
            },



            setRevenueGeneratedMonth(month, type)
            {               
                setTimeout(()=>{

                this.revenue_generated.month = month; 
                this.revenue_generated.year = this.year_acq;

                this.clearRevenueGeneratedForm();

                    let url = '/api/war-remarks/revenue_generated/' + this.revenue_generated.month +'/'+ this.revenue_generated.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('revenue_generated');

                        res.data.forEach((item, index)=>
                        {                  
                          this.revenue_generated[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addRevenueGeneratedRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.revenue_generated),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Revenue Generated Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addRevenueGeneratedRemarkModal').trigger('click');
            },



            setUnitizationMonth(month, type)
            {               
                setTimeout(()=>{

                this.unitization.month = month; 
                this.unitization.year = this.year_acq;

                this.clearUnitizationForm();

                    let url = '/api/war-remarks/unitization/' + this.unitization.month +'/'+ this.unitization.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('unitized_field');
                        res.data.forEach((item, index)=>
                        {                  
                          this.unitization[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);               
            },

            addUnitizationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.unitization),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    toastr.success('Well Unitization Count Remark Has Been Add Successfully');
                })
                .catch(err => console.log(err)); 
                $('#addUnitizationRemarkModal').trigger('click');
            },

        }
        
    };




    $(function()
    {   
        $('#year_').datepicker({ autoclose: true, dateFormat: 'YYYY' });
    });
</script>

