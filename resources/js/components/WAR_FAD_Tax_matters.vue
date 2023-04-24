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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For FAD & TAX MATTERS</h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#fad" role="tab" @click="globalPagination(fad_data)">FAD </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tax" role="tab" @click="globalPagination(tax_data)">TAX MATTERS </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane active p-3" id="fad" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> FAD <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload FAD" style="background: #202020; color: #fff" @click="setModaleHeader('FAD', 'fad')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="revenue_fads" :file_name="'FAD'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>Revenue</th>
                                                    <th>Revenue Issued<i class="units"></i></th>
                                                    <th>Funds Transfer <i class="units"></i></th>
                                                    <th>Personnel Cost</th>
                                                    <th>Medical Bill Transfer<i class="units"></i></th>
                                                    <th>Outsourced Security Services<i class="units"></i></th>
                                                    <th>Outsourced C;eaning Services </th>
                                                    <th>Penalty Fee<i class="units"></i></th> 
                                                    <th>Overhead Allocation <i class="units"></i></th> 
                                                    <th>Salary/Allowances </th>                                         
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addFADModal" data-toggle="modal" data-original-title="Enter FAD" @click="clearFADForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="revenue_fad in filteredFADs" v-bind:key="revenue_fad.id">
                                                <tr>  
                                                    <th>{{revenue_fad.date}}</th>
                                                    <th>{{revenue_fad.week}}</th>
                                                    <th>{{revenue_fad.revenue}}</th>
                                                    <th>{{revenue_fad.revenue_receipt_issued}}</th>
                                                    <th>{{revenue_fad.fund_transfer}}</th>
                                                    <th>{{revenue_fad.personnel_cost}}</th> 
                                                    <th>{{revenue_fad.medical_bill_transfer}}</th> 
                                                    <th>{{revenue_fad.outsorced_secuirity_services}}</th> 
                                                    <th>{{revenue_fad.outsorced_cleaning_services}}</th> 
                                                    <th>{{revenue_fad.penalty_fee}}</th> 
                                                    <th>{{revenue_fad.overhead_allocation}}</th> 
                                                    <th>{{revenue_fad.salary_allowance}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteFAD(revenue_fad.id, 'revenue_fad')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addFADModal" @click="editFAD(revenue_fad)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFADs(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchFADs(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="tax" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> TAX MATTERS <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload TAX MATTERS" style="background: #202020; color: #fff" @click="setModaleHeader('TAX MATTERS', 'tax_matter')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="revenue_tax_matters" :file_name="'TAX MATTERS'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>VAT</th>
                                                    <th>PAYE<i class="units"></i></th>
                                                    <th>WHT <i class="units"></i></th>
                                                    <th>Third Party Bills</th>
                                                    <th>Mandatory Monthly Expenditure to Zonal/ Field Office(N)<i class="units"></i></th>
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addTaxMatterModal" data-toggle="modal" data-original-title="Enter Tax Matters" @click="clearTaxMatterForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="revenue_tax_matter in filteredTaxMatters" v-bind:key="revenue_tax_matter.id">
                                                <tr>  
                                                    <th>{{revenue_tax_matter.date}}</th>
                                                    <th>{{revenue_tax_matter.week}}</th>
                                                    <th>{{revenue_tax_matter.vat}}</th>
                                                    <th>{{revenue_tax_matter.paye}}</th>
                                                    <th>{{revenue_tax_matter.wht}}</th>
                                                    <th>{{revenue_tax_matter.third_party_bill}}</th> 
                                                    <th>{{revenue_tax_matter.monthly_expenditure}}</th> 
                                                    <th>  
                                                      <a class="pull-right" @click="deleteTaxMatter(revenue_tax_matter.id, 'revenue_tax_matter')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addTaxMatterModal" @click="editTaxMatter(revenue_tax_matter)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTaxMatters(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchTaxMatters(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>














        <!-- Add FAD modal -->
        <form @submit.prevent="addFAD" class="form-horizontal">
            <div id="addFADModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit FAD':'Add FAD' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="revenue_fad.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="revenue_fad.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="revenue_fad.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Revenue</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="revenue_fad.revenue" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Revenue Issued</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.revenue_receipt_issued" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Funds Transfer</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.fund_transfer" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Personnel Cost</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.personnel_cost" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Medical Bill Transfer</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.medical_bill_transfer" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Outsourced Security Services</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.outsorced_secuirity_services" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Outsourced C;eaning Services</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.outsorced_cleaning_services" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Penalty Fee</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.penalty_fee" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Overhead Allocation</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.overhead_allocation" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Salary/Allowances</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_fad.salary_allowance" required>
                        </div>
                      </div> 


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add FAD' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add Tax Matter modal -->
        <form @submit.prevent="addTaxMatter" class="form-horizontal">
            <div id="addTaxMatterModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Tax Matter':'Add Tax Matter' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="revenue_tax_matter.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="revenue_tax_matter.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="revenue_tax_matter.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">VAT</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="revenue_tax_matter.vat" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">PAYE</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_tax_matter.paye" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">WHT</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_tax_matter.wht" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Third Party Bills</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_tax_matter.third_party_bill" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Mandatory monthly expenditure to zonal/ Field Office(N)</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="revenue_tax_matter.monthly_expenditure" required>
                        </div>
                      </div>  



                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Tax Matter' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>





        <!-- Upload FAD modal -->
        <form @submit.prevent="uploadFADDataExcel" class="form-horizontal">
            <div id="uploadModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">{{modal_header}} </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">                        
                     
                        <input type="hidden" class="form-control" name="type" id="" v-model='type'>
                        <input type="file" name="file" id="filed">
                        <p style="color:red">  </p>
                        <input type="submit" value="Upload Excel" class="btn btn-dark pull-right" /> 

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
                search: '',
                weeks: [],
                revenue_fads: [], 
                revenue_fad: {
                    id: '',
                    date: '',
                    week: '',
                    revenue: '',
                    revenue_receipt_issued: '',
                    fund_transfer: '',
                    personnel_cost: '',
                    medical_bill_transfer: '',
                    outsorced_secuirity_services: '',
                    outsorced_cleaning_services: '',
                    penalty_fee: '',
                    overhead_allocation: '',
                    salary_allowance: '',
                    type: 'revenue_fad'
                },

                revenue_tax_matters: [], 
                revenue_tax_matter: {
                    id: '',
                    date: '',
                    week: '',
                    vat: '',
                    paye: '',
                    wht: '',
                    third_party_bill: '',
                    monthly_expenditure: '',
                    type: 'revenue_tax_matter'
                },


                revenue_fad_id: '',
                revenue_tax_matter_id: '',
                pagination: {},
                fad_data: {},
                tax_data: {},
                modal_header: '',
                type: '',
                edit: false
            }
        },


        created()
        {
            this.fetchWeeks();

            this.fetchAllFADs();
            this.fetchFADs();
            this.fetchAllTaxMatters();
            this.fetchTaxMatters();
        },

        computed: {
            filteredFADs: function()
            {
                return this.revenue_fads.filter((revenue_fad) => {
                    return revenue_fad.date.toLowerCase().match(this.search.toLowerCase()) || 
                           revenue_fad.week.toLowerCase().match(this.search.toLowerCase()) || 
                           revenue_fad.revenue.toString().match(this.search.toString()) || 
                           revenue_fad.revenue_receipt_issued.toString().match(this.search.toString()) || 
                           revenue_fad.fund_transfer.toString().match(this.search.toString()) || 
                           revenue_fad.personnel_cost.toString().match(this.search.toString()) || 
                           revenue_fad.medical_bill_transfer.toString().match(this.search.toString()) || 
                           revenue_fad.outsorced_secuirity_services.toString().match(this.search.toString()) || 
                           revenue_fad.outsorced_cleaning_services.toString().match(this.search.toString()) || 
                           revenue_fad.penalty_fee.toString().match(this.search.toString()) || 
                           revenue_fad.overhead_allocation.toString().match(this.search.toString()) || 
                           revenue_fad.salary_allowance.toString().match(this.search.toString())     
                });
            },

            filteredTaxMatters: function()
            {
                return this.revenue_tax_matters.filter((revenue_tax_matter) => {
                    return revenue_tax_matter.date.toLowerCase().match(this.search.toLowerCase()) || 
                           revenue_tax_matter.week.toLowerCase().match(this.search.toLowerCase()) || 
                           revenue_tax_matter.vat.toString().match(this.search.toString()) || 
                           revenue_tax_matter.paye.toString().match(this.search.toString()) || 
                           revenue_tax_matter.wht.toString().match(this.search.toString()) || 
                           revenue_tax_matter.third_party_bill.toString().match(this.search.toString()) || 
                           revenue_tax_matter.monthly_expenditure.toString().match(this.search.toString()) 
                });
            },
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






            //FADs
            fetchAllFADs(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-fads?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.fad_data = res;
                    this.revenue_fads = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchFADs(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-fads'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.fad_data = res;
                    this.revenue_fads = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteFAD(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This FADs ?'))
                {
                    fetch(`api/war-fad/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('FADs Has Been Deleted Successfully');
                        this.fetchFADs();
                    })
                    .catch(err => console.log(err));
                }
            },

            addFAD()
            {
                if(this.edit === false)
                {
                    fetch('api/war-fad', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.revenue_fad),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearFADForm()
                        toastr.success('FADs Has Been Add Successfully');
                        this.fetchFADs();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addFADModal').trigger('click');

                }
                else
                {
                    fetch('api/war-fad', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.revenue_fad),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearFADForm();
                        toastr.success('FADs Has Been Updated Successfully');
                        this.fetchFADs();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addFADModal').trigger('click');
                }
            },

            editFAD(revenue_fad)
            {
                this.edit = true;
                this.revenue_fad.id = revenue_fad.id;
                this.revenue_fad.revenue_fad_id = revenue_fad.id;
                this.revenue_fad.date = revenue_fad.date;
                this.revenue_fad.week = revenue_fad.week;
                this.revenue_fad.revenue = revenue_fad.revenue;
                this.revenue_fad.revenue_receipt_issued = revenue_fad.revenue_receipt_issued;
                this.revenue_fad.fund_transfer = revenue_fad.fund_transfer;
                this.revenue_fad.personnel_cost = revenue_fad.personnel_cost;
                this.revenue_fad.medical_bill_transfer = revenue_fad.medical_bill_transfer;
                this.revenue_fad.outsorced_secuirity_services = revenue_fad.outsorced_secuirity_services;
                this.revenue_fad.outsorced_cleaning_services = revenue_fad.outsorced_cleaning_services;
                this.revenue_fad.penalty_fee = revenue_fad.penalty_fee;
                this.revenue_fad.overhead_allocation = revenue_fad.overhead_allocation;
                this.revenue_fad.salary_allowance = revenue_fad.salary_allowance;
            },

            clearFADForm()
            {
                this.revenue_fad.id = '';
                this.revenue_fad.date = '';
                this.revenue_fad.week = '';
                this.revenue_fad.revenue = '';
                this.revenue_fad.revenue_receipt_issued = '';
                this.revenue_fad.fund_transfer = '';
                this.revenue_fad.personnel_cost = '';
                this.revenue_fad.medical_bill_transfer = '';
                this.revenue_fad.outsorced_secuirity_services = '';
                this.revenue_fad.outsorced_cleaning_services = '';
                this.revenue_fad.penalty_fee = '';
                this.revenue_fad.overhead_allocation = '';
                this.revenue_fad.salary_allowance = '';
            },





            //TaxMatters
            fetchAllTaxMatters(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-tax-matters?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.tax_data = res;
                    this.revenue_tax_matters = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchTaxMatters(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-tax-matters'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.tax_data = res;
                    this.revenue_tax_matters = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
            },
            makePagination(meta, links) 
            {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },

            deleteTaxMatter(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Tax Matters ?'))
                {
                    fetch(`api/war-fad/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Tax Matters Has Been Deleted Successfully');
                        this.fetchTaxMatters();
                    })
                    .catch(err => console.log(err));
                }
            },

            addTaxMatter()
            {
                if(this.edit === false)
                {
                    fetch('api/war-fad', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.revenue_tax_matter),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTaxMatterForm()
                        toastr.success('Tax Matters Has Been Add Successfully');
                        this.fetchTaxMatters();
                        this.edit = false;

                    })
                    .catch(err => console.log(err)); 
                    $('#addTaxMatterModal').trigger('click');

                }
                else
                {
                    fetch('api/war-fad', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.revenue_tax_matter),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearTaxMatterForm();
                        toastr.success('Tax Matters Has Been Updated Successfully');
                        this.fetchTaxMatters();
                        this.edit = false;

                    }) 
                    .catch(err => console.log(err));
                    $('#addTaxMatterModal').trigger('click');
                }
            },

            editTaxMatter(revenue_tax_matter)
            {
                this.edit = true;
                this.revenue_tax_matter.id = revenue_tax_matter.id;
                this.revenue_tax_matter.revenue_tax_matter_id = revenue_tax_matter.id;
                this.revenue_tax_matter.date = revenue_tax_matter.date;
                this.revenue_tax_matter.week = revenue_tax_matter.week;
                this.revenue_tax_matter.vat = revenue_tax_matter.vat;
                this.revenue_tax_matter.paye = revenue_tax_matter.paye;
                this.revenue_tax_matter.wht = revenue_tax_matter.wht;
                this.revenue_tax_matter.third_party_bill = revenue_tax_matter.third_party_bill;
                this.revenue_tax_matter.monthly_expenditure = revenue_tax_matter.monthly_expenditure;
            },

            clearTaxMatterForm()
            {
                this.revenue_tax_matter.id = '';
                this.revenue_tax_matter.date = '';
                this.revenue_tax_matter.week = '';
                this.revenue_tax_matter.vat = '';
                this.revenue_tax_matter.paye = '';
                this.revenue_tax_matter.wht = '';
                this.revenue_tax_matter.third_party_bill = '';
                this.revenue_tax_matter.monthly_expenditure = '';
            },








            globalPagination(res) 
            {
                let meta = res.meta;
                let links = res.links;
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };

                this.pagination = pagination;
            },


            uploadFADDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-fad-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchFADs();
                        this.fetchTaxMatters();
                    }
                    else
                    {
                        toastr.error('Error occurred While Uploading ' + this.modal_header + ' : ' + err)
                        .catch(err => console.log(err)); 
                    }
                })    
                $('#filed').val('');            
                $('#uploadModal').trigger('click');
                
            },


            setModaleHeader(modal_header, type)
            {
                this.modal_header = modal_header;
                this.type = type;
            }











        }
        
    };


</script>

