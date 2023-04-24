@extends('layouts.app')

@section('content')







<div class="row">
    <div class="col-md-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Email Sent</h4>

                <ul class="list-inline widget-chart m-t-20 text-center">
                    <li>
                        <h4 class=""><b>3652</b></h4>
                        <p class="text-muted m-b-0">Marketplace</p>
                    </li>
                    <li>
                        <h4 class=""><b>5421</b></h4>
                        <p class="text-muted m-b-0">Last week</p>
                    </li>
                    <li>
                        <h4 class=""><b>9652</b></h4>
                        <p class="text-muted m-b-0">Last Month</p>
                    </li>
                </ul>

                <div id="morris-area-example" style="height: 300px"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Revenue</h4>

                <ul class="list-inline widget-chart m-t-20 text-center">
                    <li>
                        <h4 class=""><b>5248</b></h4>
                        <p class="text-muted m-b-0">Marketplace</p>
                    </li>
                    <li>
                        <h4 class=""><b>321</b></h4>
                        <p class="text-muted m-b-0">Last week</p>
                    </li>
                    <li>
                        <h4 class=""><b>964</b></h4>
                        <p class="text-muted m-b-0">Last Month</p>
                    </li>
                </ul>

                <div id="morris-bar-example" style="height: 300px"></div>
            </div>
        </div>
    </div>
</div>








@endsection