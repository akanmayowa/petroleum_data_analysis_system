@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Concession Reports Dashboard </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#conc" role="tab"> Concession  </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="conc" role="tabpanel">
                        <h4 class="mt-0 header-title"> Concession Report (OPLs, OMLs, Open Blocks, Marginal Fields) </h4> 
                            <div class="resp-container">
                                <iframe class="resp-iframe" width="1425" height="900" src="https://app.powerbi.com/view?r=eyJrIjoiZWZkZWVlNTctOWRlZi00ZjY5LTk4MWUtNzVhNzIxZGIxNzJkIiwidCI6ImJhMTMwZWNhLTMwMzAtNDhlMS05MDg5LWM5NzkyOTNhZWI3MCIsImMiOjh9" frameborder="0" allowFullScreen="true"></iframe> 
                            </div>
                    </div>                    
                    
                </div>


                <div class="row" style="margin-top: -37px">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>





@endsection













