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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For Public Affairs Division </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control pull-right m-b-2" style="width: 60%; float: right;"
                         placeholder="Year (yyyy)" id="year" name="year" v-model="year_acq" @change="setMonthlyReportByYear">
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pau_" role="tab" @click="setPublicAffairs">PUBLIC AFFAIR UNIT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#leg" role="tab" @click="setLegalUnit">LEGAL UNIT </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane active p-3" id="pau_" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> PUBLIC AFFAIR UNIT (PAU) </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addPublicAffairsRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setPublicAffairsMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_public_affair in list_public_affairs">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_public_affair.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_public_affair.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_public_affairs" :file_name="'Monthly Public Affairs Unit (PAU)'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="leg" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">    
                                    <table class="table table-sm" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> LEGAL UNIT </h4> </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('January')"> January </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('February')"> February </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('March')"> March </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('Qrt 1')"> Qrt 1 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('April')"> April </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('May')"> May </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('June')"> June </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('Qrt 2 ')"> Qrt 2  </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('Mid-year')"> Mid-year </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('July')"> July </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('August')"> August </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('September')"> September </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('Qrt 3')"> Qrt 3 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('October')"> October </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('November')"> November </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('December')"> December </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('Qrt 4')"> Qrt 4 </button> 
                                                </th>
                                                <th style="width: 4.6%"> 
                                                    <button type="button" class="btn btn-sm btn-inverse" data-target="#addLegalRemarkModal" data-toggle="modal" data-original-title="Add Remark" style="background: #fff; color: #202020; font-size: 12px" @mouseup="setLegalMonth('Annual')"> Annual </button> 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="list_legal in list_legals">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{list_legal.name}} </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.jan" />
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.feb" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.mar" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.qrt1" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.apr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.may" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.jun" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.qrt2" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.m_yr" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.jul" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.aug" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.sep" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.qrt3" /> 
                                                </th>
                                                <th>
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.oct" /> 
                                                 </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.nov" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.dec" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.qrt4" /> 
                                                </th>
                                                <th> 
                                                    <input type="text" class="form-control" readonly style="margin-bottom: 4px; min-width: 65px" :value="list_legal.ann" /> 
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="19">
                                                    <input type="text" class="form-control" v-show="remark" style="margin-bottom: 4px;" />
                                                </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>

                                    <UpstreamExcelExport :data="list_legals" :file_name="'Monthly Legal Unit'"></UpstreamExcelExport>

                                </div> <!-- end col -->
                            </p>
                        </div> 
                    </div>

                </div>
            </div>
        </div>








        <form @submit.prevent="addPublicAffairsReportRemarks" class="form-horizontal">
            <div id="addPublicAffairsRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Public Affairs Count Remark For {{pau.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="pau.year" required>
                        </div>
                      </div>  


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No.of Meeting and conferences attended</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="pau.meeting_conference_attended"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Consular liaison – Visa Support Letters – No</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="pau.consular_liason_visa_support"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="pau.month">
                            <input type="hidden" class="form-control" v-model="pau.type">
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

        <form @submit.prevent="addLegalReportRemarks" class="form-horizontal">
            <div id="addLegalRemarkModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Legal Count Remark For {{legal.month}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body"> 
                        
                      <div class="form-group row">
                        <label for="year" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-9 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="legal.year" required>
                        </div>
                      </div> 


                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of court cases</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="legal.court_cases"></textarea>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No.of agreements executed</label>
                        <div class="col-sm-9">
                            <textarea rows="2" class="form-control" v-model="legal.agreement_executed"></textarea>
                        </div>
                      </div>


                      


                      <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" v-model="legal.month">
                            <input type="hidden" class="form-control" v-model="legal.type">
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
                list_public_affairs: [],
                list_legals: [],


                pau: {
                    id: '',
                    year: '',
                    month: '',
                    meeting_conference_attended: '',
                    consular_liason_visa_support: '',
                    type: 'pau'
                },
 
                legal: {
                    id: '',
                    year: '',
                    month: '',
                    court_cases: '',
                    agreement_executed: '',
                    type: 'legal'
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
                this.setPublicAffairs();  
                this.setLegalUnit(); 
            },





            setPublicAffairs()
            {
                let report = '/api/monthly-reporting-pau/public_affair/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_public_affairs = res;
                })
                .catch(err => console.log(err));            
            },

            setLegalUnit()
            {
                let report = '/api/monthly-reporting-pau/legal/' + this.year_acq;
                fetch(report)
                .then(res => res.json())
                .then(res => {

                    this.list_legals = res;
                })
                .catch(err => console.log(err));            
            },






            clearPAUForm()
            {
                this.pau.meeting_conference_attended = '';
                this.pau.consular_liason_visa_support = '';
            },


            clearLegalForm()
            {
                this.legal.court_cases = '';
                this.legal.agreement_executed = '';
            },




            




            setPublicAffairsMonth(month)
            {
                this.pau.month = month; 
                this.pau.year = this.year_acq;

                this.clearPAUForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/pau/' + this.pau.month +'/'+ this.pau.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('meeting_conference_attended');
                         arr.push('consular_liason_visa_support');

                        res.data.forEach((item, index)=>
                        {                  
                          this.pau[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addPublicAffairsReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.pau),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addPublicAffairsRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },



            setLegalMonth(month)
            {
                this.legal.month = month; 
                this.legal.year = this.year_acq;

                this.clearLegalForm();

                setTimeout(()=>{

                    let url = '/api/war-remarks/legal/' + this.legal.month +'/'+ this.legal.year
                    fetch(url)
                    .then(res => res.json())
                    .then(res => {
                      
                         let arr = [];

                         arr.push('court_cases');
                         arr.push('agreement_executed');

                        res.data.forEach((item, index)=>
                        {                  
                          this.legal[arr[index]] = item.remark;
                        });
                    })
                    .catch(err => console.log(err));

                },100);
            },

            addLegalReportRemarks()
            {
                fetch('api/war-remarks', 
                {
                    method: 'post',
                    body: JSON.stringify(this.legal),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                $('#addLegalRemarkModal').trigger('click');
                toastr.success('Remark Has Been Add Successfully');
            },





            

        }
        
    };


</script>

