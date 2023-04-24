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
                            <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Weekly Activities For PUBLIC AFFAIR UNIT (PAU) & LEGAL </h4>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control pull-right m-b-2" placeholder="Search" v-model="search" style="width: 60%;" />
                        </div>
                    </div>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pau_" role="tab" @click="globalPagination(pau_data)">PUBLIC AFFAIR UNIT </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#leg" role="tab" @click="globalPagination(legal_data)">LEGAL UNIT </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">  
                        <div class="tab-pane active p-3" id="pau_" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> PUBLIC AFFAIR UNIT (PAU) <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload PUBLIC AFFAIR UNIT" style="background: #202020; color: #fff" @click="setModaleHeader('PUBLIC AFFAIR UNIT', 'pau')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="paus" :file_name="'PAU'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>No.of Meeting and Conferences Attended</th>
                                                    <th>Consular Liaison – Visa Support Letters – No<i class="units"></i></th>
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addPAUModal" data-toggle="modal" data-original-title="Enter Public Affair Unit" @click="clearPAUForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="pau in filteredPAUs" v-bind:key="pau.id">
                                                <tr>  
                                                    <th>{{pau.date}}</th>
                                                    <th>{{pau.week}}</th>
                                                    <th>{{pau.meeting_conference_attended}}</th>
                                                    <th>{{pau.consular_liason_visa_support}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deletePAU(pau.id, 'pau')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addPAUModal" @click="editPAU(pau)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPAUs(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPAUs(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 

                        <div class="tab-pane p-3" id="leg" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> LEGAL UNIT <span class="unit-header">  </span>

                                        <button type="button" class="btn btn-sm btn-round btn-inverse btn-round pull-right" data-target="#uploadModal" data-toggle="modal" data-original-title="Upload LEGAL" style="background: #202020; color: #fff" @click="setModaleHeader('LEGAL', 'legal')">  <i class="fa fa-upload"></i> </button>
                                        
                                        <UpstreamExcelExport :data="legals" :file_name="'LEGAL'"></UpstreamExcelExport>
                                        
                                    </h5> 
                                        <table class="table table-striped table-sm mb-0" id="">
                                            <thead>
                                                <tr style="background-color: #202020; color: #fff">
                                                    <th>Date</th>
                                                    <th>Week</th>
                                                    <th>No. of Court Cases</th>
                                                    <th>No.of Agreements Executed<i class="units"></i></th>
                                                    <th style="text-align: right"> 
                                                        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-target="#addLegalModal" data-toggle="modal" data-original-title="Enter Legal Unit" @click="clearLegalForm()" style="color: #fff">  <i class="fa fa-plus"></i> </button>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody v-for="legal in filteredLegals" v-bind:key="legal.id">
                                                <tr>  
                                                    <th>{{legal.date}}</th>
                                                    <th>{{legal.week}}</th>
                                                    <th>{{legal.court_cases}}</th>
                                                    <th>{{legal.agreement_executed}}</th>
                                                    <th>  
                                                      <a class="pull-right" @click="deleteLegal(legal.id, 'legal')"><span class="fa fa-trash text-inverse m-r-10" style="margin :1px 2px; color: red"></span>
                                                      </a>
                                                      <a class="pull-right" data-toggle="modal" data-target="#addLegalModal" @click="editLegal(legal)">  <span class="fa fa-pencil text-inverse m-r-10" style="margin :1px 2px; color: #202020"></span>
                                                      </a>
                                                    </th>  
                                                </tr>
                                            </tbody>
                                        </table>

                                          <nav aria-label="Page navigation example pull-right">
                                              <ul class="pagination pagination-sm">
                                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchLegals(pagination.prev_page_url)">Prev</a></li>
                                                <li class="page-item disabled"><a class="page-link text-dark" href="#" >Page {{pagination.current_page}} of {{pagination.last_page}} </a></li>
                                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchLegals(pagination.next_page_url)">Next</a></li>
                                              </ul>
                                          </nav>

                                    </div> <!-- end col -->
                            </p>
                        </div> 
                    </div>

                </div>
            </div>
        </div>














        <!-- Add PAU modal -->
        <form @submit.prevent="addPAU" class="form-horizontal">
            <div id="addPAUModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Public Affairs Unit':'Add Public Affairs Unit' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="pau.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="pau.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="pau.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No.of Meeting and conferences attended</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="pau.meeting_conference_attended" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Consular liaison – Visa Support Letters – No</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="pau.consular_liason_visa_support" required>
                        </div>
                      </div>  


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add PAU' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>



        <!-- Add Legal modal -->
        <form @submit.prevent="addLegal" class="form-horizontal">
            <div id="addLegalModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header war-modal-header">
                        <h4 class="modal-title"> {{ edit? 'Edit Legal Unit':'Add Legal Unit' }}  </h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>                        
                      </div>
                      <div class="modal-body">

                        
                      <div class="form-group row">
                        <label for="week" class="col-sm-3 col-form-label"> Week </label>
                        <div class="col-sm-3">
                            <select class="form-control" v-model="legal.week" required>
                                <option value=""> Select Week </option>
                                <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                            </select>
                            <input type="hidden" class="form-control" v-model="legal.type" required>
                        </div>

                        <label for="date" class="col-sm-3 col-form-label"> Date </label>
                        <div class="col-sm-3 input-group">
                            <input type="date" class="form-control" placeholder="yyyy-m-d" v-model="legal.date" required>
                        </div>
                      </div> 
                      

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No. of court cases</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" v-model="legal.court_cases" required>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No.of agreements executed</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" class="form-control" v-model="legal.agreement_executed" required>
                        </div>
                      </div>  


                      <div class="modal-footer" id="add_footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" id="" class="btn btn-dark"> <i class="fa fa-plus"></i> {{ edit? 'Save Changes':'Add Legal' }} </button>
                      </div>


                    </div>
                  </div>
                </div>  
            </div>
        </form>





        <!-- Upload PAU modal -->
        <form @submit.prevent="uploadPAUDataExcel" class="form-horizontal">
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
                paus: [], 
                pau: {
                    id: '',
                    date: '',
                    week: '',
                    meeting_conference_attended: '',
                    consular_liason_visa_support: '',
                    type: 'pau',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                legals: [], 
                legal: {
                    id: '',
                    date: '',
                    week: '',
                    court_cases: '',
                    agreement_executed: '',
                    type: 'legal',
                    user_id:window.sessionStorage.getItem('user_id')
                },

                pau_id: '',
                legal_id: '',
                pagination: {},
                pau_data: {},
                legal_data: {},
                modal_header: '',
                type: '',
                edit: false
            }
        },


        created()
        {
            this.fetchWeeks();

            this.fetchAllPAUs();
            this.fetchPAUs();
            this.fetchAllLegals();
            this.fetchLegals();
        },

        computed: {
            filteredPAUs: function()
            {
                return this.paus.filter((pau) => {
                    return pau.date.toLowerCase().match(this.search.toLowerCase()) || 
                           pau.week.toLowerCase().match(this.search.toLowerCase()) || 
                           pau.meeting_conference_attended.toString().match(this.search.toString()) || 
                           pau.consular_liason_visa_support.toString().match(this.search.toString())   
                });
            },

            filteredLegals: function()
            {
                return this.legals.filter((legal) => {
                    return legal.date.toLowerCase().match(this.search.toLowerCase()) || 
                           legal.week.toLowerCase().match(this.search.toLowerCase()) || 
                           legal.court_cases.toString().match(this.search.toString()) || 
                           legal.agreement_executed.toString().match(this.search.toString())   
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






            //PAUs
            fetchAllPAUs(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-public-affairs-units?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.pau_data = res;
                    this.paus = res.data;
                })
                .catch(err => console.log(err));
            },

            fetchPAUs(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-public-affairs-units'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.pau_data = res;
                    this.paus = res.data;
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

            deletePAU(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Public Affairs Unit ?'))
                {
                    fetch(`api/war-public-affairs-unit/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Public Affairs Unit Has Been Deleted Successfully');
                        this.fetchPAUs();
                    })
                    .catch(err => console.log(err));
                }
            },

            addPAU()
            {
                if(this.edit === false)
                {
                    fetch('api/war-public-affairs-unit', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.pau),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearPAUForm()
                        toastr.success('Public Affairs Unit Has Been Add Successfully');
                        this.fetchPAUs();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addPAUModal').trigger('click');

                }
                else
                {
                    fetch('api/war-public-affairs-unit', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.pau),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearPAUForm();
                        toastr.success('Public Affairs Unit Has Been Updated Successfully');
                        this.fetchPAUs();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addPAUModal').trigger('click');
                }
            },

            editPAU(pau)
            {
                this.edit = true;
                this.pau.id = pau.id;
                this.pau.pau_id = pau.id;
                this.pau.date = pau.date;
                this.pau.week = pau.week;
                this.pau.meeting_conference_attended = pau.meeting_conference_attended;
                this.pau.consular_liason_visa_support = pau.consular_liason_visa_support;
            },

            clearPAUForm()
            {
                this.pau.id = '';
                this.pau.date = '';
                this.pau.week = '';
                this.pau.meeting_conference_attended = '';
                this.pau.consular_liason_visa_support = '';
            },





            //Legals
            fetchAllLegals(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-legals?all=1'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.legal_data = res;
                    this.legals = res.data;
                })
                .catch(err => console.log(err));
            },



            fetchLegals(page_url)
            {
                let vm = this;
                page_url = page_url || 'api/war-legals'
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.legal_data = res;
                    this.legals = res.data;
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

            deleteLegal(id, type)
            {
                if(confirm('Are You Sure You Want To Delete This Legal Unit ?'))
                {
                    fetch(`api/war-public-affairs-unit/${id}/${type}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        toastr.success('Legal Unit Has Been Deleted Successfully');
                        this.fetchLegals();
                    })
                    .catch(err => console.log(err));
                }
            },

            addLegal()
            {
                if(this.edit === false)
                {
                    fetch('api/war-public-affairs-unit', 
                    {
                        method: 'post',
                        body: JSON.stringify(this.legal),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearLegalForm()
                        toastr.success('Legal Unit Has Been Add Successfully');
                        this.fetchLegals();
                        this.edit = false;
                    })
                    .catch(err => console.log(err)); 
                    $('#addLegalModal').trigger('click');

                }
                else
                {
                    fetch('api/war-public-affairs-unit', 
                    {
                        method: 'put',
                        body: JSON.stringify(this.legal),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.clearLegalForm();
                        toastr.success('Legal Unit Has Been Updated Successfully');
                        this.fetchLegals();
                        this.edit = false;
                    }) 
                    .catch(err => console.log(err));
                    $('#addLegalModal').trigger('click');
                }
            },

            editLegal(legal)
            {
                this.edit = true;
                this.legal.id = legal.id;
                this.legal.legal_id = legal.id;
                this.legal.date = legal.date;
                this.legal.week = legal.week;
                this.legal.court_cases = legal.court_cases;
                this.legal.agreement_executed = legal.agreement_executed;
            },

            clearLegalForm()
            {
                this.legal.id = '';
                this.legal.date = '';
                this.legal.week = '';
                this.legal.court_cases = '';
                this.legal.agreement_executed = '';
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


            uploadPAUDataExcel()
            {
                var input = document.querySelector('input[type="file"]')

                var data = new FormData()
                data.append('file', input.files[0])
                // data.append('user', 'hubot')

                fetch('api/war-public-affairs-uploading/'+this.type, 
                {
                    method: 'post',
                    body: data
                })
                .then(data => {
                if (data.ok)
                    {
                        toastr.success(this.modal_header + ' Uploaded Successfully');

                        this.fetchPAUs();
                        this.fetchLegals();
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

