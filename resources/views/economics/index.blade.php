@extends('layouts.app')

    @section('search')
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">          
            <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">  <i class="mdi mdi-close-circle" style="font-size:20px"></i> </a>
        </div>
    </div>
    @endsection

@section('css')






{{-- INCLUDING CSS --}}
@include('economics.css.styles')





@section('content')





<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Revenue Data Upload  </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">                      
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_actual') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_actual') ||
                        Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_actual') ||
                        Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_actual') )              
                        <li class="nav-item nav-pad">
                            <a class="nav-link" data-toggle="tab" href="#ex_rate" role="tab"> Exchange Rate</a>
                        </li>
                    @endif

                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_projected') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_projected') )              
                        <li class="nav-item nav-pad">
                            <a class="nav-link revenue_projected" data-toggle="tab" href="#pro" role="tab" onclick="displayRevenueProjected()"> Projected</a>
                        </li>   
                    @endif
                    
                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_revenue_actual') ||
                      Auth::user()->role_obj->permission->contains('constant', 'approve_revenue_actual') )              
                        <li class="nav-item nav-pad">
                            <a class="nav-link revenue_actual" data-toggle="tab" href="#act" role="tab" onclick="displayRevenueActual()"> Actual</a>
                        </li>
                    @endif

                        {{-- <li class="nav-item nav-pad pull-right">
                          <select class="form-control pull-right" name="curr" id="curr" required style="">
                              <option value="Naira"> Naira </option>
                              <option value="Dollar"> Dollar </option>
                              <option value="Euro"> Euro </option>
                          </select>
                        </li> --}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">                  

                    <div class="tab-pane p-3" id="ex_rate" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="" style="">

                              <div class="col-md-7 col-sm-12" style="margin-left: -15px;">
                                <div class="table-responsive">   
                                    <h5 style="margin-left: 5px; color: #aaa"> All Exchange Rate for Revenue </h5>
                                        <table class="table table-striped table-sm mb-0" id="rate_table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Currency</th>
                                                    <th>Rate</th>
                                                    <th>Entered on</th>
                                                    <th style="">  </th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                @forelse($exchange_rates as $exchange_rate)
                                                    <tr id="row_{{$exchange_rate->id}}">  
                                                        <th>{{$exchange_rate->id}}</th>
                                                        <th>{{ date('Y-m-d', strtotime($exchange_rate->date)) }}</th>
                                                        <th>{{$exchange_rate->currency}}</th>
                                                        <th>{{$exchange_rate->rate}}</th> 
                                                        <th>{{\Carbon\Carbon::parse($exchange_rate->created_at)->diffForHumans()}}</th>   
                                                        <th>                                                            
                                                            <a style="cursor: pointer; color:#202020; font-size:10px" tooltip="true" id="{{$exchange_rate->id}}" class="btn-sm pull-right x_rate" title="Edit Revenue Exchange Rate"> <i class="fa fa-pencil"></i>    </a>
                                                        </th>  
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                        
                                </div> <!-- end col -->
                              </div>


                              <div class="col-md-5 col-sm-12" style="padding-right: -15px; padding-left: 75px">
                                  <!-- Add   --> 
                                  <form id="rateForm" action="{{url('/economics')}}" method="POST">
                                    @csrf    
                                    <input type="hidden" class="form-control" name="id" id="idd" value="">
                                    <input type="hidden" class="form-control" name="type" id="" value="add_exchange_rate">
                                    <input type="hidden" name="date_rate" id="date_rate" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
                                    <h4 class="modal-title">Add New Exchange Rate </h4>                           


                                    <div class="form-group row">
                                      <label for="date_exc" class="col-sm-2 col-form-label"> Date </label>
                                      <div class="col-sm-10">
                                          <input type="date" class="form-control" name="date" id="date_exc" required>
                                      </div>
                                    </div>                    

                                     
                                    <div class="form-group row">
                                      <label for="currency" class="col-sm-2 col-form-label"> Currency </label>
                                      <div class="col-sm-10">
                                          <select class="form-control" name="currency" id="currency" required>
                                              <option value=""> Select Currency </option>
                                              <option value="Naira"> Naira </option>
                                              <option value="Dollar"> Dollar </option>
                                              <option value="Euro"> Euro </option>
                                          </select>
                                      </div>
                                    </div>


                                    <div class="form-group row">
                                      <label for="rate" class="col-sm-2 col-form-label"> Rate </label>
                                      <div class="col-sm-10">
                                          <input type="number" step="0.0001" class="form-control" name="rate" id="rate" min="0" required>
                                      </div>
                                    </div> 



                                                      
                                    <div class="modal-footer" style="padding-right: 0px">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" name="add_rate_btn" id="add_rate_btn" class="btn btn-dark"> <i class="fa fa-plus"></i> Add Rate  </button>
                                    </div>
                                  </form>
                              </div>   

                                <script>
                                    // $(function()
                                    // {
                                    //     $('.page-link').click(function(e)
                                    //     {
                                    //         e.preventDefault();
                                    //         var aID=$(this).attr('href');
                                    //         type=sessionStorage.getItem('name');
                                    //         $('#'+type).load(aID);      
                                           
                                    //     });
                                    // });

                                    // //SORT SCRIPT
                                    // sortAscDesc();
                                </script>
                            </div> <!-- end row -->
                        </p>
                    </div>                  




                    <div class="tab-pane p-3" id="pro" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="revenue_projected">

                            </div> <!-- end row -->
                        </p>
                    </div>

                    <div class="tab-pane p-3" id="act" role="tabpanel">
                        <p class="font-14 mb-0">
                            <div class="row" id="revenue_actual">

                            </div> <!-- end row -->
                        </p>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</div>














{{-- INCLUDING FORMS --}}
@include('economics.forms.modals')




















@endsection

@section('script')





{{-- INCLUDING SCRIPT --}}
@include('economics.js.script')




    @if(Session::has('info'))
        <script>
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif


@endsection