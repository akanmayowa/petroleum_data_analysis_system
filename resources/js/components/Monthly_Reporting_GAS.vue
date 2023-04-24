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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For GAS Division </h4>
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
                            <a class="nav-link" data-toggle="tab" href="#drill" role="tab" @click="setDrilling">DRILLING </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#re" role="tab" @click="setReEntry">RE ENTRY </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fdp" role="tab" @click="setFDP">FDP </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab" @click="setDepletion">DEPLETION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#puf" role="tab" @click="setProduction">PRODUCTION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#util" role="tab" @click="setUtilization">UTILIZATION </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fla" role="tab" @click="setFlared">FLARED </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dom" role="tab" @click="setDGSO">DGSO </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#exp" role="tab">GAS EXPORT </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane active p-3" id="drill" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> DRILLING ACTIVITIES </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDrillingRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDrillingMonth('Annual')"> Annual </button> 
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

                                    <UpstreamExcelExport :data="list_drillings" :file_name="'Monthly Drilling Activities'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="re" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> WEll RE-ENTRY OPERATIONS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasReEntryRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasReEntryMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_re_entry in list_re_entrys">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_re_entry.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_re_entry.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_re_entrys" :file_name="'Monthly Well Re-Entry'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="fdp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> FIELD DEV. PLAN APPROVALS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFDPRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFDPMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_FDP in list_FDPs">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_FDP.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_FDP.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_FDPs" :file_name="'Monthly Field Dev. Plan (FDP)'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> DEPLETION RATE </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDepletionRateRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDepletionRateMonth('Annual')"> Annual </button> 
                                                </th>                                            </tr>
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

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="puf" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> PRODUCTION, UTILIZATION & FLARE </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasProductionRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasProductionMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_production in list_productions">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_production.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_production.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_productions" :file_name="'Monthly Production, Util. Flare'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="util" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> GAS UTILIZATION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasUtilizationRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasUtilizationMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_utilization in list_utilizations">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_utilization.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_utilization.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_utilizations" :file_name="'Monthly Gas Utilization'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="fla" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> FLARE MANAGEMENT OPERATIONS </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasFlaredRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasFlaredMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_flared in list_flareds">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_flared.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_flared.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_flareds" :file_name="'Monthly Flared Mgt Operations'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="dom" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> DOMESTIC GAS SUPPLY OBLIGATION </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasDGSORemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasDGSOMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_DGSO in list_DGSOs">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_DGSO.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_DGSO.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_DGSOs" :file_name="'Monthly Domestic Gas Supply Obligation'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div>  

                        <div class="tab-pane p-3" id="exp" role="tabpanel" style="">
                            
                                <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#bonny" role="tab" @click="setBonny">Bonny River Terminal </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#nlng" role="tab" @click="setNLNG">NLNG </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#esc" role="tab" @click="setEscravos">Escravos </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#ops" role="tab" @click="setGasOperation">GAS OPERATION-DOWNSTREAM </a>
                                    </li>
                                </ul>

                                <div class="tab-content">  
                                    <div class="tab-pane p-3" id="bonny" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="table-responsive">    
                                                <table class="table table-sm" id="">
                                                    <thead>
                                                        <tr style="background-color: #fff; color: #202020">
                                                            <th style="width: 15%"> <h4 class="mt-0 header-title"> Bonny River Terminal </h4> </th>
                                                            <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasBonnyRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasBonnyMonth('Annual')"> Annual </button> 
                                                </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody v-for="list_bonny in list_bonnys">
                                                        <tr style="background: #fff; color: #202020">
                                                            <th> {{list_bonny.name}} </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.jan" />
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.feb" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.mar" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.qrt1" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.apr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.may" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.jun" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.qrt2" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.m_yr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.jul" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.aug" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.sep" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.qrt3" /> 
                                                            </th>
                                                            <th>
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.oct" /> 
                                                             </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.nov" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.dec" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.qrt4" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_bonny.ann" /> 
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="19">
                                                                <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                            </th>
                                                        </tr>
                                                    </tbody>                                        
                                                </table>

                                                <UpstreamExcelExport :data="list_bonnys" :file_name="'Monthly Bonny Terminal'"></UpstreamExcelExport>

                                            </div> <!-- end col -->
                                        </p>
                                    </div>  

                                    <div class="tab-pane p-3" id="nlng" role="tabpanel">
                                        <p class="font-14 mb-0">
                                        <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                                <thead>
                                                <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> NLNG Terminal </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasNLNGRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasNLNGMonth('Annual')"> Annual </button> 
                                                </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody v-for="list_NLNG in list_NLNGs">
                                                        <tr style="background: #fff; color: #202020">
                                                            <th> {{list_NLNG.name}} </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.jan" />
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.feb" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.mar" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.qrt1" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.apr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.may" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.jun" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.qrt2" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.m_yr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.jul" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.aug" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.sep" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.qrt3" /> 
                                                            </th>
                                                            <th>
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.oct" /> 
                                                             </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.nov" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.dec" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.qrt4" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_NLNG.ann" /> 
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="19">
                                                                <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                            </th>
                                                        </tr>
                                                    </tbody>                                        
                                                </table>

                                                <UpstreamExcelExport :data="list_NLNGs" :file_name="'Monthly NLNG Terminal'"></UpstreamExcelExport>

                                            </div> <!-- end col -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="esc" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="table-responsive">    
                                            <table class="table table-sm" id="">
                                            <thead>
                                                <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Escravos Terminal </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasEscravosRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasEscravosMonth('Annual')"> Annual </button> 
                                                </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody v-for="list_escravos in list_escravoss">
                                                        <tr style="background: #fff; color: #202020">
                                                            <th> {{list_escravos.name}} </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.jan" />
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.feb" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.mar" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.qrt1" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.apr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.may" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.jun" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.qrt2" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.m_yr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.jul" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.aug" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.sep" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.qrt3" /> 
                                                            </th>
                                                            <th>
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.oct" /> 
                                                             </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.nov" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.dec" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.qrt4" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_escravos.ann" /> 
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="19">
                                                                <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                            </th>
                                                        </tr>
                                                    </tbody>                                        
                                                </table>

                                                <UpstreamExcelExport :data="list_escravoss" :file_name="'Monthly Escravos Terminal'"></UpstreamExcelExport>

                                            </div> <!-- end col -->
                                        </p>
                                    </div>

                                    <div class="tab-pane p-3" id="ops" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            <div class="table-responsive">    
                                                <table class="table table-sm" id="">
                                                <thead>
                                                <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Gas Operation </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addGasOperationDownstreamRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setGasOperationDowmstreamMonth('Annual')"> Annual </button> 
                                                </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody v-for="list_gas_operation in list_gas_operations">
                                                        <tr style="background: #fff; color: #202020">
                                                            <th> {{list_gas_operation.name}} </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.jan" />
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.feb" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.mar" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.qrt1" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.apr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.may" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.jun" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.qrt2" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.m_yr" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.jul" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.aug" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.sep" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.qrt3" /> 
                                                            </th>
                                                            <th>
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.oct" /> 
                                                             </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.nov" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.dec" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.qrt4" /> 
                                                            </th>
                                                            <th> 
                                                                <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_gas_operation.ann" /> 
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="19">
                                                                <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                            </th>
                                                        </tr>
                                                    </tbody>                                        
                                                </table>

                                                <UpstreamExcelExport :data="list_gas_operations" :file_name="'Monthly Gas Operation'"></UpstreamExcelExport>

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
        <form @submit.prevent="addGasDrillingRemarks" class="form-horizontal">
            <div id="addGasDrillingRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Drilling Count Remark For {{gas_drilling.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_drilling.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_commenced" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.exploration_commenced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_ongoing" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.exploration_ongoing"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="exploration_completed" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.exploration_completed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_commenced" class="col-sm-3 col-form-label">Appraisal Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.appraisal_commenced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_ongoing" class="col-sm-3 col-form-label">Appraisal Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.appraisal_ongoing"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="appraisal_completed" class="col-sm-3 col-form-label">Appraisal Drilling Completed </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.appraisal_completed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_commenced" class="col-sm-3 col-form-label">Development Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.development_commenced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_ongoing" class="col-sm-3 col-form-label">Development Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.development_ongoing"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="development_completed" class="col-sm-3 col-form-label">Development Drilling Completed </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.development_completed"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_completion" class="col-sm-3 col-form-label">Well Completion </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.well_completion"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="well_spudded" class="col-sm-3 col-form-label">Well Spudded </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_drilling.well_spudded"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_drilling.month">
                            <input type="hidden" class="form-control" v-model="gas_drilling.type">
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
        <form @submit.prevent="addGasReEntryRemarks" class="form-horizontal">
            <div id="addGasReEntryRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Re-Entry Count Remark For {{gas_re_entry.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_re_entry.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_re_entry.completion"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_re_entry.workover"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_re_entry.total_reserve_addition"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appraisal Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_re_entry.expected_rate"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_re_entry.month">
                            <input type="hidden" class="form-control" v-model="gas_re_entry.type">
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
        <form @submit.prevent="addGasFDPRemarks" class="form-horizontal">
            <div id="addGasFDPRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> FDP Count Remark For {{gas_fdp.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_fdp.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Commenced </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_fdp.application_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Exploration Drilling Ongoing </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_fdp.application_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Exploration Drilling Completed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_fdp.reserves"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_fdp.month">
                            <input type="hidden" class="form-control" v-model="gas_fdp.type">
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
        <form @submit.prevent="addGasDepletionRateRemarks" class="form-horizontal">
            <div id="addGasDepletionRateRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Depletion Rate Count Remark For {{gas_depletion_rate.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_depletion_rate.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> AG. Reserve (TSCF)  </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_depletion_rate.ag_reserves"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> NAG. Reserve (TSCF) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_depletion_rate.nag_reserves"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AG. Depletion rate (%)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_depletion_rate.ag_depletion"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">NAG. Depletion rate (%)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_depletion_rate.nag_depletion"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">AG life index (Years)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_depletion_rate.ag_life_year"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">NAG life index (Years)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_depletion_rate.nag_life_year"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_depletion_rate.month">
                            <input type="hidden" class="form-control" v-model="gas_depletion_rate.type">
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
        <form @submit.prevent="addGasProductionRemarks" class="form-horizontal">
            <div id="addGasProductionRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Production Count Remark For {{gas_production_utilization_flare.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_production_utilization_flare.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> AG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_production_utilization_flare.ag_produced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> NAG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_production_utilization_flare.nag_produced"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas production(Mscf)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_production_utilization_flare.gas_production"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Utilized(Mscf)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_production_utilization_flare.gas_utilization"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Flared(Mscf)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_production_utilization_flare.gas_flared"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Percent Gas Flared %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_production_utilization_flare.gas_flared_perc"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_production_utilization_flare.month">
                            <input type="hidden" class="form-control" v-model="gas_production_utilization_flare.type">
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
        <form @submit.prevent="addGasUtilizationRemarks" class="form-horizontal">
            <div id="addGasUtilizationRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Utilization Count Remark For {{gas_utilization.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_utilization.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> AG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.fuel_gas"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> NAG produced(Mscf) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.gas_lift"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas production(Mscf)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.gas_reinjection"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Utilized(Mscf)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.ngl_lpg"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Gas Flared(Mscf)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.gas_to_ipp"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Percent Gas Flared %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.local_supply"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Percent Gas Flared %</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_utilization.gas_export"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_utilization.month">
                            <input type="hidden" class="form-control" v-model="gas_utilization.type">
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
        <form @submit.prevent="addGasFlaredRemarks" class="form-horizontal">
            <div id="addGasFlaredRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Flared Count Remark For {{gas_flare.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_flare.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> No of Permit to flare</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_flare.permit_to_flare"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Quantity -Approved </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_flare.quantity_approved"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Quantity- Under review</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_flare.quantity_under_review"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_flare.month">
                            <input type="hidden" class="form-control" v-model="gas_flare.type">
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
        <form @submit.prevent="addGasDGSORemarks" class="form-horizontal">
            <div id="addGasDGSORemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Domestic Gas Supply Obligation Count Remark For {{gas_supply_obligation.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_supply_obligation.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Total allocated DGSO (MMscf/D)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_supply_obligation.allocated_dgso"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Dom. Gas Supply (MMscf/D) </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_supply_obligation.dom_gas_supply"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">DGSO Performance (%)</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_supply_obligation.dgso_performance"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_supply_obligation.month">
                            <input type="hidden" class="form-control" v-model="gas_supply_obligation.type">
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
        <form @submit.prevent="addGasBonnyRemarks" class="form-horizontal">
            <div id="addGasBonnyRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Export- Bonny Terminal Count Remark For {{gas_export_bonny.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_bonny.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Propane MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_bonny.propane"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Butane MT </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_bonny.butane"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Pentane MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_bonny.pentane"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total No. of Vessels</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_bonny.total_no_vessel"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_export_bonny.month">
                            <input type="hidden" class="form-control" v-model="gas_export_bonny.type">
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
        <form @submit.prevent="addGasNLNGRemarks" class="form-horizontal">
            <div id="addGasNLNGRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Export- NLNG Count Remark For {{gas_export_nlng.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_nlng.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Propane MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_nlng.propane"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Butane MT </label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_nlng.butane"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Condensate MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_nlng.condensate"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">LNG MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_nlng.lng"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total No. of Vessels</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_nlng.total_no_vessel"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_export_nlng.month">
                            <input type="hidden" class="form-control" v-model="gas_export_nlng.type">
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
        <form @submit.prevent="addGasEscravosRemarks" class="form-horizontal">
            <div id="addGasEscravosRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Export- Escravos Remark For {{gas_export_escravos.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_escravos.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> LPG MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_escravos.lpg"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Condensate MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_escravos.condensate"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Transmix MT</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_escravos.transmix"></textarea>
                        </div>
                      </div>   

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total No. of Vessels</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_escravos.total_no_vessel"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_export_escravos.month">
                            <input type="hidden" class="form-control" v-model="gas_export_escravos.type">
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
        <form @submit.prevent="addGasOperationDownstreamRemarks" class="form-horizontal">
            <div id="addGasOperationDownstreamRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Gas Operation Downstream Count Remark For {{gas_export_operation.month}}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="gas_export_operation.year" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> App Received</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.application_received"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">App Approved</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.application_approved"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">App Querried</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.application_querried"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Site Verification</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.site_verification"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appr CNG</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.approval_for_cng_downloading"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appr LPG Refilling</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.approval_for_lpg_refilling"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appr LPG Bulk Stg</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.approval_for_lpg_bulk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Appr LPG Addon</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.approval_for_lpg_addon"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice CNG</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.license_for_cng_downloading"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice LPG Refilling</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.license_for_lpg_refilling"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice LPG Bulk Stg</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.license_for_lpg_bulk"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice LPG Addon</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.license_for_lpg_addon"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Lice LPG Reseller</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.license_for_lpg_reseller"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Inspection Conducted</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="gas_export_operation.facility_inspection_conducted"></textarea>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="gas_export_operation.month">
                            <input type="hidden" class="form-control" v-model="gas_export_operation.type">
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
                list_drillings: [],
                list_re_entrys: [],
                list_FDPs: [],
                list_depletions: [],
                list_productions: [],
                list_utilizations: [],
                list_flareds: [],
                list_DGSOs: [],
                list_bonnys: [],
                list_NLNGs: [],
                list_escravoss: [],
                list_gas_operations: [],





                gas_drillings: [], 
                gas_drilling: {
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
                    type: 'gas_drilling'
                },

                gas_re_entries: [], 
                gas_re_entry: {
                    id: '',
                    year: '',
                    month: '',
                    completion: '',
                    workover: '',
                    total_reserve_addition: '',
                    expected_rate: '',
                    type: 'gas_re_entry'
                },

                gas_fdps: [], 
                gas_fdp: {
                    id: '',
                    year: '',
                    month: '',
                    application_received: '',
                    application_approved: '',
                    reserves: '',
                    type: 'gas_fdp'
                },

                gas_depletion_rates: [], 
                gas_depletion_rate: {
                    id: '',
                    year: '',
                    month: '',
                    ag_reserves: '',
                    nag_reserves: '',
                    ag_depletion: '',
                    nag_depletion: '',
                    ag_life_year: '',
                    nag_life_year: '',
                    type: 'gas_depletion_rate'
                },

                gas_production_utilization_flares: [], 
                gas_production_utilization_flare: {
                    id: '',
                    year: '',
                    month: '',
                    ag_produced: '',
                    nag_produced: '',
                    gas_production: '',
                    gas_utilization: '',
                    gas_flared: '',
                    gas_flared_perc: '',
                    type: 'gas_production_utilization_flare'
                },

                gas_utilizations: [], 
                gas_utilization: {
                    id: '',
                    year: '',
                    month: '',
                    fuel_gas: '',
                    gas_lift: '',
                    gas_reinjection: '',
                    ngl_lpg: '',
                    gas_to_ipp: '',
                    local_supply: '',
                    gas_export: '',
                    type: 'gas_utilization'
                },

                gas_flares: [], 
                gas_flare: {
                    id: '',
                    year: '',
                    month: '',
                    permit_to_flare: '',
                    quantity_approved: '',
                    quantity_under_review: '',
                    type: 'gas_flare'
                },

                gas_supply_obligations: [], 
                gas_supply_obligation: {
                    id: '',
                    year: '',
                    month: '',
                    allocated_dgso: '',
                    dom_gas_supply: '',
                    dgso_performance: '',
                    type: 'gas_supply_obligation'
                },

                gas_export_bonnies: [], 
                gas_export_bonny: {
                    id: '',
                    year: '',
                    month: '',
                    propane: '',
                    butane: '',
                    pentane: '',
                    total_no_vessel: '',
                    type: 'gas_export_bonny'
                },

                gas_export_nlngs: [], 
                gas_export_nlng: {
                    id: '',
                    year: '',
                    month: '',
                    propane: '',
                    butane: '',
                    condensate: '',
                    lng: '',
                    total_no_vessel: '',
                    type: 'gas_export_nlng'
                },

                gas_export_escravoses: [], 
                gas_export_escravos: {
                    id: '',
                    year: '',
                    month: '',
                    lpg: '',
                    condensate: '',
                    transmix: '',
                    total_no_vessel: '',
                    type: 'gas_export_escravos'
                },

                gas_export_operations: [], 
                gas_export_operation: {
                    id: '',
                    year: '',
                    month: '',
                    application_received: '',
                    application_approved: '',
                    application_querried: '',
                    site_verification: '',
                    approval_for_cng_downloading: '',
                    approval_for_lpg_refilling: '',
                    approval_for_lpg_bulk: '',
                    approval_for_lpg_addon: '',
                    license_for_cng_downloading: '',
                    license_for_lpg_refilling: '',
                    license_for_lpg_bulk: '',
                    license_for_lpg_addon: '',
                    license_for_lpg_reseller: '',
                    facility_inspection_conducted: '',
                    type: 'gas_export_operation'
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
                this.setDrilling();     
                this.setReEntry();     
                this.setFDP();    
                this.setDepletion();  
                this.setProduction();  
                this.setUtilization();  
                this.setFlared(); 
                this.setDGSO();
                this.setBonny();
                this.setNLNG();
                this.setEscravos();
                this.setGasOperation();
            },





            setDrilling()
            {
                let report = '/api/monthly-reporting/drilling/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_drillings = res;
                })
                .catch(err => console.log(err));            
            },

            setReEntry()
            {
                let report = '/api/monthly-reporting/re_entry/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_re_entrys = res;
                })
                .catch(err => console.log(err));            
            },

            setFDP()
            {
                let report = '/api/monthly-reporting/FDP/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_FDPs = res;
                })
                .catch(err => console.log(err));            
            },

            setDepletion()
            {
                let report = '/api/monthly-reporting/depletion/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_depletions = res;
                })
                .catch(err => console.log(err));            
            },

            setProduction()
            {
                let report = '/api/monthly-reporting/production/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_productions = res;
                })
                .catch(err => console.log(err));            
            },

            setUtilization()
            {
                let report = '/api/monthly-reporting/utilization/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_utilizations = res;
                })
                .catch(err => console.log(err));            
            },

            setFlared()
            {
                let report = '/api/monthly-reporting/flared/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_flareds = res;
                })
                .catch(err => console.log(err));            
            },

            setDGSO()
            {
                let report = '/api/monthly-reporting/DGSO/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_DGSOs = res;
                })
                .catch(err => console.log(err));            
            },

            setBonny()
            {
                let report = '/api/monthly-reporting/bonny/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_bonnys = res;
                })
                .catch(err => console.log(err));            
            },

            setNLNG()
            {
                let report = '/api/monthly-reporting/NLNG/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_NLNGs = res;
                })
                .catch(err => console.log(err));            
            },

            setEscravos()
            {
                let report = '/api/monthly-reporting/escravos/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_escravoss = res;
                })
                .catch(err => console.log(err));            
            },

            setGasOperation()
            {
                let report = '/api/monthly-reporting/gas_operation/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_gas_operations = res;
                })
                .catch(err => console.log(err));            
            },





            

            clearDrillingForm()
            {
                this.gas_drilling.exploration_commenced = '';
                this.gas_drilling.exploration_ongoing = '';
                this.gas_drilling.exploration_completed = '';
                this.gas_drilling.appraisal_commenced = '';
                this.gas_drilling.appraisal_ongoing = '';
                this.gas_drilling.appraisal_completed = '';
                this.gas_drilling.development_commenced = '';
                this.gas_drilling.development_ongoing = '';
                this.gas_drilling.development_completed = '';
                this.gas_drilling.well_completion = '';
                this.gas_drilling.well_spudded = '';
            },

            clearReEntryForm()
            {
                this.gas_re_entry.completion = '';
                this.gas_re_entry.workover = '';
                this.gas_re_entry.total_reserve_addition = '';
                this.gas_re_entry.expected_rate = '';
            },

            clearFDPForm()
            {
                this.gas_fdp.application_received = '';
                this.gas_fdp.application_approved = '';
                this.gas_fdp.reserves = '';
            },

            clearDepletionRateForm()
            {
                this.gas_depletion_rate.ag_reserves = '';
                this.gas_depletion_rate.nag_reserves = '';
                this.gas_depletion_rate.ag_depletion = '';
                this.gas_depletion_rate.nag_depletion = '';
                this.gas_depletion_rate.ag_life_year = '';
                this.gas_depletion_rate.nag_life_year = '';
            },

            clearProductionUtilizationFlareForm()
            {
                this.gas_production_utilization_flare.ag_produced = '';
                this.gas_production_utilization_flare.nag_produced = '';
                this.gas_production_utilization_flare.gas_production = '';
                this.gas_production_utilization_flare.gas_utilization = '';
                this.gas_production_utilization_flare.gas_flared = '';
                this.gas_production_utilization_flare.gas_flared_perc = '';
            },

            clearUtilizationForm()
            {
                this.gas_utilization.fuel_gas = '';
                this.gas_utilization.gas_lift = '';
                this.gas_utilization.gas_reinjection = '';
                this.gas_utilization.ngl_lpg = '';
                this.gas_utilization.gas_to_ipp = '';
                this.gas_utilization.local_supply = '';
                this.gas_utilization.gas_export = '';
            },

            clearFlareForm()
            {
                this.gas_flare.permit_to_flare = '';
                this.gas_flare.quantity_approved = '';
                this.gas_flare.quantity_under_review = '';
            },

            clearSupplyObligationForm()
            {
                this.gas_supply_obligation.allocated_dgso = '';
                this.gas_supply_obligation.dom_gas_supply = '';
                this.gas_supply_obligation.dgso_performance = '';
            },

            clearExportBonnyForm()
            {
                this.gas_export_bonny.propane = '';
                this.gas_export_bonny.butane = '';
                this.gas_export_bonny.pentane = '';
                this.gas_export_bonny.total_no_vessel = '';
            },

            clearExportNlngForm()
            {
                this.gas_export_nlng.propane = '';
                this.gas_export_nlng.butane = '';
                this.gas_export_nlng.condensate = '';
                this.gas_export_nlng.lng = '';
                this.gas_export_nlng.total_no_vessel = '';
            },

            clearExportEscravosForm()
            {
                this.gas_export_escravos.lpg = '';
                this.gas_export_escravos.condensate = '';
                this.gas_export_escravos.transmix = '';
                this.gas_export_escravos.total_no_vessel = '';
            },

            clearExportOperationForm()
            {
                this.gas_export_operation.application_received = '';
                this.gas_export_operation.application_approved = '';
                this.gas_export_operation.application_querried = '';
                this.gas_export_operation.site_verification = '';
                this.gas_export_operation.approval_for_cng_downloading = '';
                this.gas_export_operation.approval_for_lpg_refilling = '';
                this.gas_export_operation.approval_for_lpg_bulk = '';
                this.gas_export_operation.approval_for_lpg_addon = '';
                this.gas_export_operation.license_for_cng_downloading = '';
                this.gas_export_operation.license_for_lpg_refilling = '';
                this.gas_export_operation.license_for_lpg_bulk = '';
                this.gas_export_operation.license_for_lpg_addon = '';
                this.gas_export_operation.license_for_lpg_reseller = '';
                this.gas_export_operation.facility_inspection_conducted = '';
            },








            setGasDrillingMonth(month)
            {
                this.gas_drilling.month = month; 
                this.gas_drilling.year = this.year_acq;

                this.clearDrillingForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_drilling/' + this.gas_drilling.month +'/'+ this.gas_drilling.year
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

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_drilling[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasDrillingRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_drilling),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasDrillingRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasReEntryMonth(month)
            {
                this.gas_re_entry.month = month; 
                this.gas_re_entry.year = this.year_acq;

                this.clearReEntryForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_re_entry/' + this.gas_re_entry.month +'/'+ this.gas_re_entry.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('completion');
                         arr.push('workover');
                         arr.push('total_reserve_addition');
                         arr.push('expected_rate');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_re_entry[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasReEntryRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_re_entry),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasReEntryRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasFDPMonth(month)
            {
                this.gas_fdp.month = month; 
                this.gas_fdp.year = this.year_acq;

                this.clearFDPForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_fdp/' + this.gas_fdp.month +'/'+ this.gas_fdp.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('application_received');
                         arr.push('application_approved');
                         arr.push('reserves');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_fdp[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasFDPRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_fdp),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasFDPRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasDepletionRateMonth(month)
            {
                this.gas_depletion_rate.month = month; 
                this.gas_depletion_rate.year = this.year_acq;

                this.clearDepletionRateForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_depletion_rate/' + this.gas_depletion_rate.month +'/'+ this.gas_depletion_rate.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('ag_reserves');
                         arr.push('nag_reserves');
                         arr.push('ag_depletion');
                         arr.push('nag_depletion');
                         arr.push('ag_life_year');
                         arr.push('nag_life_year');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_depletion_rate[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasDepletionRateRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_depletion_rate),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasDepletionRateRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasProductionMonth(month)
            {
                this.gas_production_utilization_flare.month = month; 
                this.gas_production_utilization_flare.year = this.year_acq;

                this.clearProductionUtilizationFlareForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_production_utilization_flare/' + this.gas_production_utilization_flare.month +'/'+ this.gas_production_utilization_flare.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];
                         
                         arr.push('ag_produced');
                         arr.push('nag_produced');
                         arr.push('gas_production');
                         arr.push('gas_utilization');
                         arr.push('gas_flared');
                         arr.push('gas_flared_perc');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_production_utilization_flare[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasProductionRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_production_utilization_flare),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasProductionRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasUtilizationMonth(month)
            {
                this.gas_utilization.month = month; 
                this.gas_utilization.year = this.year_acq;

                this.clearUtilizationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_utilization/' + this.gas_utilization.month +'/'+ this.gas_utilization.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];
                         
                         arr.push('fuel_gas');
                         arr.push('gas_lift');
                         arr.push('gas_reinjection');
                         arr.push('ngl_lpg');
                         arr.push('gas_to_ipp');
                         arr.push('local_supply');
                         arr.push('gas_export');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_utilization[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasUtilizationRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_utilization),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasUtilizationRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasFlaredMonth(month)
            {
                this.gas_flare.month = month; 
                this.gas_flare.year = this.year_acq;

                this.clearFlareForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_flare/' + this.gas_flare.month +'/'+ this.gas_flare.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];
                         
                         arr.push('permit_to_flare');
                         arr.push('quantity_approved');
                         arr.push('quantity_under_review');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_flare[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasFlaredRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_flare),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasFlaredRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasDGSOMonth(month)
            {
                this.gas_supply_obligation.month = month; 
                this.gas_supply_obligation.year = this.year_acq;

                this.clearSupplyObligationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_supply_obligation/' + this.gas_supply_obligation.month +'/'+ this.gas_supply_obligation.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('allocated_dgso');
                         arr.push('dom_gas_supply');
                         arr.push('dgso_performance');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_supply_obligation[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasDGSORemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_supply_obligation),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasDGSORemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasBonnyMonth(month)
            {
                this.gas_export_bonny.month = month; 
                this.gas_export_bonny.year = this.year_acq;

                this.clearExportBonnyForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_export_bonny/' + this.gas_export_bonny.month +'/'+ this.gas_export_bonny.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('propane');
                         arr.push('butane');
                         arr.push('pentane');
                         arr.push('total_no_vessel');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_export_bonny[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasBonnyRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_export_bonny),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasBonnyRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasNLNGMonth(month)
            {
                this.gas_export_nlng.month = month; 
                this.gas_export_nlng.year = this.year_acq;

                this.clearExportNlngForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_export_nlng/' + this.gas_export_nlng.month +'/'+ this.gas_export_nlng.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('propane');
                         arr.push('butane');
                         arr.push('condensate');
                         arr.push('lng');
                         arr.push('total_no_vessel');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_export_nlng[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasNLNGRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_export_nlng),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasNLNGRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasEscravosMonth(month)
            {
                this.gas_export_escravos.month = month; 
                this.gas_export_escravos.year = this.year_acq;

                this.clearExportEscravosForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_export_escravos/' + this.gas_export_escravos.month +'/'+ this.gas_export_escravos.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('lpg');
                         arr.push('condensate');
                         arr.push('transmix');
                         arr.push('total_no_vessel');

                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_export_escravos[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasEscravosRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_export_escravos),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasEscravosRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },


            setGasOperationDowmstreamMonth(month)
            {
                this.gas_export_operation.month = month; 
                this.gas_export_operation.year = this.year_acq;

                this.clearExportOperationForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/gas_export_operation/' + this.gas_export_operation.month +'/'+ this.gas_export_operation.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('application_received');
                         arr.push('application_approved');
                         arr.push('application_querried');
                         arr.push('site_verification');
                         arr.push('approval_for_cng_downloading');
                         arr.push('approval_for_lpg_refilling');
                         arr.push('approval_for_lpg_bulk');
                         arr.push('approval_for_lpg_addon');
                         arr.push('license_for_cng_downloading');
                         arr.push('license_for_lpg_refilling');
                         arr.push('license_for_lpg_bulk');
                         arr.push('license_for_lpg_addon');
                         arr.push('license_for_lpg_reseller');
                         arr.push('facility_inspection_conducted');


                        res.data.forEach((item, index)=>
                        {                  
                          this.gas_export_operation[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addGasOperationDownstreamRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.gas_export_operation),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addGasOperationDownstreamRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },






        }
        
    };


</script>

