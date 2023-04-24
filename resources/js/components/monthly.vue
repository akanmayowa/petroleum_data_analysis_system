
<template>

  <!-- Page -->
  <div class="page" style="padding: -25px 0px 0px 0px;">

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <!-- Notification Panel --> 
                    <h4 class="mt-0 header-title"><i class="fa fa-calendar" ></i> Monthly Activities For Upstream Division
                        <select class="form-control m-b-2" v-model="week_to" style="width: 15%; float: right;" @change="setSeismicDataQuantum">
                            <option value=""> Select Last Week In Month </option>
                            <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                        </select>

                        <select class="form-control m-b-2" v-model="week_from" style="width: 15%; float: right; margin-right: 10px;">
                            <option value=""> Select First Week In Month </option>
                            <option v-for="allWeek in weeks" v-bind:key="allWeek.id" v-bind:value="allWeek.week"> {{ allWeek.week }} </option>
                        </select>

                        <input type="date" class="form-control pull-right m-b-2" style="width: 15%; float: right; margin-right: 10px;"
                         placeholder="Year (yyyy)" v-model="year_acq">
                    </h4>
                    <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-pad nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#acq" role="tab">ACQUISITION </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dri" role="tab">DRILLING </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ops" role="tab">RE-ENRTY </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rig" role="tab">RIG </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fdp" role="tab">FDP </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dep" role="tab">DEPLETION </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cop" role="tab">CRUDE OIL </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#rev" role="tab">REVENUE </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#unit" role="tab">UNITIZATION </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="acq" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive table-sm" style="padding: 0px">
                                    <table class="table" id="">
                                        <thead>
                                            <tr style="background-color: #fff; color: #202020">
                                                <th style="width: 15%"> <h4 class="mt-0 header-title"> Monthly Aquisition </h4> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Janaury </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> February </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> March </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Qrt 1 </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> April </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> May </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> June </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Qrt 2 </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Mid-year </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> July </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> August </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> September </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Qrt 3 </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> October </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> November </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> December </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Qrt 4 </label> </th>
                                                <th style="width: 4.6%"> <label for="" class="col-form-label"> Annual </label> </th>
                                            </tr>
                                        </thead>

                                        <tbody v-for="acq_array in acq_arrays">
                                            <tr style="background: #fff; color: #202020">
                                                <th> {{acq_array.name}} </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                                <th> <input type="text" class="form-control" readonly style="margin-bottom: 4px"> </th>
                                            </tr>
                                        </tbody>                                        
                                    </table>
                                </div>   
                            </p>
                        </div>                   
                        
                        <div class="tab-pane p-3" id="dri" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive"> 

                                </div>  
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="ops" role="tabpanel">
                            <p class="font-14 mb-0">  
                                <div class="table-responsive">  

                                </div> <!-- end row -->
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="rig" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   

                                </div> <!-- end row -->
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="fdp" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive"> 

                                </div> <!-- end row -->
                            </p>
                        </div>     

                        <div class="tab-pane p-3" id="dep" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">  

                                </div> <!-- end row -->
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="cop" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   

                                </div> <!-- end row -->
                            </p>
                        </div>    

                        <div class="tab-pane p-3" id="rev" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">  

                                </div> <!-- end row -->
                            </p>
                        </div>   

                        <div class="tab-pane p-3" id="unit" role="tabpanel">
                            <p class="font-14 mb-0">
                                <div class="table-responsive">   

                                </div> <!-- end row -->
                            </p>
                        </div>    
                    </div>

                </div>
            </div>
        </div>










    </div>

 </div>


</template>












<script>


    export default
    {
        data()
        {
            return{
                acq_arrays:[{"key":"1", "name":"Siesmic data quantum acquired - 3D Kms"}, 
                            {"key":"2","name":"Cumulative Siesmic Acquired - 3D Kms"}, 
                            {"key":"3","name":"Annual seismic aquisation target - 3D Kms"}, 
                            {"key":"4", "name":"Siesmic data Quantum Processed - 3D Kms"}],
                weeks: [],
                wk_1_col1: '', wk_1_col2: '', wk_1_col3: '', wk_1_col4: '', wk_2_col1: '', wk_2_col2: '', wk_2_col3: '', wk_2_col4: '', wk_3_col1: '', 
                wk_3_col2: '',  wk_3_col3: '', wk_3_col4: '', wk_4_col1: '', wk_4_col2: '', wk_4_col3: '', wk_4_col4: '', wk_5_col1: '', wk_5_col2: '', 
                wk_5_col3: '', wk_5_col4: '',

                tot_quantum_acquired: '',
                total_cummulative_aquired: '',
                total_aquisation_target: '',
                total_quantum_processed: '',

                year_acq: '',
                week_from: '',
                week_to: ''
            }
        },

        created()
        {
            this.fetchWeeks();

            // this.setSeismicDataQuantum();
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

            setSeismicDataQuantum()
            {
                let acquisition = '/api/monthly-acquisition/' + this.year_acq + '/' + this.week_from + '/' + this.week_to;
                fetch(acquisition)
                .then(res => res.json())
                .then(res => {
                    this.wk_1_col1 = res.wk_1_col1;
                    this.wk_1_col2 = res.wk_1_col2;
                    this.wk_1_col3 = res.wk_1_col3;
                    this.wk_1_col4 = res.wk_1_col4;
                    this.wk_2_col1 = res.wk_2_col1;
                    this.wk_2_col2 = res.wk_2_col2;
                    this.wk_2_col3 = res.wk_2_col3;
                    this.wk_2_col4 = res.wk_2_col4;
                    this.wk_3_col1 = res.wk_3_col1;
                    this.wk_3_col2 = res.wk_3_col2;
                    this.wk_3_col3 = res.wk_3_col3;
                    this.wk_3_col4 = res.wk_3_col4;
                    this.wk_4_col1 = res.wk_4_col1;
                    this.wk_4_col2 = res.wk_4_col2;
                    this.wk_4_col3 = res.wk_4_col3;
                    this.wk_4_col4 = res.wk_4_col4;
                    this.wk_5_col1 = res.wk_5_col1;
                    this.wk_5_col2 = res.wk_5_col2;
                    this.wk_5_col3 = res.wk_5_col3;
                    this.wk_5_col4 = res.wk_5_col4;

                    this.tot_quantum_acquired = res.data_1;
                    this.total_cummulative_aquired = res.data_2;
                    this.total_aquisation_target = res.data_3;
                    this.total_quantum_processed = res.data_4;
                })
                .catch(err => console.log(err));            
            },




        }
        
    };




    $(function()
    {   
        $('#year').datepicker(
        {
          autoclose: true,startView: 'decade',format: "yyyy",  viewMode: "years",   minViewMode: "years"
        });
    });
</script>


$arr_wks = ['wk_1'=>'Week 1', 'wk_2'=>'Week 2', 'wk_3'=>'Week 3', 'wk_4'=>'Week 4', 'wk_5'=>'Week 5', 'wk_6'=>'Week 6', 'wk_7'=>'Week 7', 'wk_8'=>'Week 8', 'wk_9'=>'Week 9', 'wk_10'=>'Week 10', 'wk_11'=>'Week 11', 'wk_12'=>'Week 12', 'wk_13'=>'Week 13', 'wk_14'=>'Week 14', 'wk_15'=>'Week 15', 'wk_16'=>'Week 16', 'wk_17'=>'Week 17', 'wk_18'=>'Week 18', 'wk_19'=>'Week 19', 'wk_20'=>'Week 20', 'wk_21'=>'Week 21', 'wk_22'=>'Week 22', 'wk_23'=>'Week 23', 'wk_24'=>'Week 24', 'wk_25'=>'Week 25', 'wk_26'=>'Week 26', 'wk_27'=>'Week 27', 'wk_28'=>'Week 28', 'wk_29'=>'Week 29', 'wk_30'=>'Week 30', 'wk_31'=>'Week 31', 'wk_32'=>'Week 32', 'wk_33'=>'Week 33', 'wk_34'=>'Week 34', 'wk_35'=>'Week 35', 'wk_36'=>'Week 36', 'wk_37'=>'Week 37', 'wk_38'=>'Week 38', 'wk_39'=>'Week 39', 'wk_40'=>'Week 40', 'wk_41'=>'Week 41', 'wk_42'=>'Week 42', 'wk_43'=>'Week 43', 'wk_44'=>'Week 44', 'wk_45'=>'Week 45', 'wk_46'=>'Week 46', 'wk_47'=>'Week 47', 'wk_48'=>'Week 48', 'wk_49'=>'Week 49', 'wk_50'=>'Week 50', 'wk_51'=>'Week 51', 'wk_52'=>'Week 52'];






        
        $jan_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 1')->where('week', '<=', 'Week 5')->sum('seismic_data_acquired');
        $jan_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 1')->where('week', '<=', 'Week 5')->sum('cumulative_seismic_acquired');
        $jan_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 1')->where('week', '<=', 'Week 5')->sum('annual_seismic_acquisition');
        $jan_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 1')->where('week', '<=', 'Week 5')->sum('seismic_data_processed');

        $feb_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 6')->where('week', '<=', 'Week 9')->sum('seismic_data_acquired');
        $feb_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 6')->where('week', '<=', 'Week 9')->sum('cumulative_seismic_acquired');
        $feb_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 6')->where('week', '<=', 'Week 9')->sum('annual_seismic_acquisition');
        $feb_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 6')->where('week', '<=', 'Week 9')->sum('seismic_data_processed');

        $mar_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 10')->where('week', '<=', 'Week 13')->sum('seismic_data_acquired');
        $mar_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 10')->where('week', '<=', 'Week 13')->sum('cumulative_seismic_acquired');
        $mar_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 10')->where('week', '<=', 'Week 13')->sum('annual_seismic_acquisition');
        $mar_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 10')->where('week', '<=', 'Week 13')->sum('seismic_data_processed');


        $apr_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 14')->where('week', '<=', 'Week 18')->sum('seismic_data_acquired');
        $apr_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 14')->where('week', '<=', 'Week 18')->sum('cumulative_seismic_acquired');
        $apr_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 14')->where('week', '<=', 'Week 18')->sum('annual_seismic_acquisition');
        $apr_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 14')->where('week', '<=', 'Week 18')->sum('seismic_data_processed');


        $may_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 19')->where('week', '<=', 'Week 22')->sum('seismic_data_acquired');
        $may_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 19')->where('week', '<=', 'Week 22')->sum('cumulative_seismic_acquired');
        $may_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 19')->where('week', '<=', 'Week 22')->sum('annual_seismic_acquisition');
        $may_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 19')->where('week', '<=', 'Week 22')->sum('seismic_data_processed');


        $jun_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 23')->where('week', '<=', 'Week 26')->sum('seismic_data_acquired');
        $jun_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 23')->where('week', '<=', 'Week 26')->sum('cumulative_seismic_acquired');
        $jun_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 23')->where('week', '<=', 'Week 26')->sum('annual_seismic_acquisition');
        $jun_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 23')->where('week', '<=', 'Week 26')->sum('seismic_data_processed');


        $jul_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 27')->where('week', '<=', 'Week 30')->sum('seismic_data_acquired');
        $jul_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 27')->where('week', '<=', 'Week 30')->sum('cumulative_seismic_acquired');
        $jul_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 27')->where('week', '<=', 'Week 30')->sum('annual_seismic_acquisition');
        $jul_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 27')->where('week', '<=', 'Week 30')->sum('seismic_data_processed');


        $aug_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 31')->where('week', '<=', 'Week 35')->sum('seismic_data_acquired');
        $aug_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 31')->where('week', '<=', 'Week 35')->sum('cumulative_seismic_acquired');
        $aug_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 31')->where('week', '<=', 'Week 35')->sum('annual_seismic_acquisition');
        $aug_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 31')->where('week', '<=', 'Week 35')->sum('seismic_data_processed');


        $sep_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 36')->where('week', '<=', 'Week 39')->sum('seismic_data_acquired');
        $sep_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 36')->where('week', '<=', 'Week 39')->sum('cumulative_seismic_acquired');
        $sep_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 36')->where('week', '<=', 'Week 39')->sum('annual_seismic_acquisition');
        $sep_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 36')->where('week', '<=', 'Week 39')->sum('seismic_data_processed');


        $oct_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 40')->where('week', '<=', 'Week 44')->sum('seismic_data_acquired');
        $oct_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 40')->where('week', '<=', 'Week 44')->sum('cumulative_seismic_acquired');
        $oct_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 40')->where('week', '<=', 'Week 44')->sum('annual_seismic_acquisition');
        $oct_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 40')->where('week', '<=', 'Week 44')->sum('seismic_data_processed');


        $nov_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 45')->where('week', '<=', 'Week 48')->sum('seismic_data_acquired');
        $nov_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 45')->where('week', '<=', 'Week 48')->sum('cumulative_seismic_acquired');
        $nov_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 45')->where('week', '<=', 'Week 48')->sum('annual_seismic_acquisition');
        $nov_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 45')->where('week', '<=', 'Week 48')->sum('seismic_data_processed');


        $dec_1 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 49')->where('week', '<=', 'Week 52')->sum('seismic_data_acquired');
        $dec_2 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 49')->where('week', '<=', 'Week 52')->sum('cumulative_seismic_acquired');
        $dec_3 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 49')->where('week', '<=', 'Week 52')->sum('annual_seismic_acquisition');
        $dec_4 = \App\WARAcquisition::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                    ->where('week', '>=', 'Week 49')->where('week', '<=', 'Week 52')->sum('seismic_data_processed');