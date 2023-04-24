@extends('layouts.app')
    @section('search')

        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
              
                <input class="search-input" type="search" id="dynamicsearch" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle" style="font-size:20px"></i>
                </a>
              
            </div>
        </div>

    @endsection
@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Ministerial KPI - Net Cash Flow </h4>                
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->

                <div class="table-responsive">   
                    <h5 style="margin-left: 5px; color: #aaa"> <span style="font-size: 16px"> {{$themic_area_name->themic_area_name}} </span> - Net Cash Flow  For  <strong style="font-size: 20px"> {{$year}} </strong>      
                        {{-- <a href="{{url('ministerial-performance/download_mpm_net_cash_flow/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Ministerial KPI Net Cash Flow Excel Here">  <i class="fa fa-download"></i> Excel</a> --}}
                    </h5>
                        <table class="table table-striped table-sm mb-0" id="net_cash_flow_table">
                            <thead class="thead-dark">
                            <tr style="">
                                <th>Year <i class="units"></i></th>
                                <th>January <i class="units"></i></th>
                                <th>February <i class="units"></i></th>
                                <th>March <i class="units"></i></th>
                                <th>April <i class="units"></i></th>
                                <th>May <i class="units"></i></th>
                                <th>June <i class="units"></i></th>
                                <th>July <i class="units"></i></th>
                                <th>August <i class="units"></i></th>
                                <th>September <i class="units"></i></th>
                                <th>October <i class="units"></i></th>
                                <th>November <i class="units"></i></th>
                                <th>December <i class="units"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $jan='0'; $feb='0'; $mar='0'; $apr='0'; $may='0'; $jun='0'; $jul='0'; 
                                    $aug='0'; $sep='0'; $oct='0'; $nov='0'; $dec='0'; 
                                @endphp

                                @forelse($flows as $flow)
                                    <tr> 
                                        {{-- {{dd($flows)}} --}}
                                        <th style="font-weight: bolder;">{{$year}}</th>
                                        @php
                                            $flo = \App\MPM::where('year', $year)->where('themic_area_id', $flow->themic_area_id)
                                                           ->where('id', '>=', $flow->id)
                                                           ->where('id', '<=', $flow->id+11)->get();
                                        @endphp
                                        @forelse($flo as $net_cash_flow)
                                            <th>
                                                {{$net_cash_flow->mpm}} 
                                                <input type="hidden" class="{{$net_cash_flow->month}}" name="{{$net_cash_flow->month}}" 
                                                value="{{$net_cash_flow->mpm}}">
                                            </th>
                                        @empty
                                            
                                        @endforelse
                                    </tr>
                                @empty
                                    
                                @endforelse

                                <tr style="font-size: 14px; color: #FF5C5C">
                                    <th style="font-weight: bolder;">Expenditure</th>
                                    @if($expenditures)
                                        @foreach($expenditures as $expenditure)
                                            <th>{{$expenditure->expenditure}} <input type="hidden" id="exp{{strtolower($expenditure->month)}}" name="{{substr($expenditure->month,0, 3)}}" value="{{$expenditure->expenditure}}"></th>
                                        @endforeach
                                    @endif
                                </tr>


                                <tr style="font-size: 14px; background: #ddd">
                                    <th style="font-weight: bolder; font-size: 14px; color: #396">Net Cash Flow</th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="january"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="february"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="march"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="april"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="may"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="june"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="july"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="august"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="september"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="october"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="november"></th>
                                    <th style="font-weight: bolder; font-size: 14px; color: #396" id="december"></th>
                                </tr>
                            </tbody>
                        </table>
                </div> 


            </div>
        </div>
    </div>

</div>








@endsection

@section('script')

<script type="">
    var months = ["january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"];  
    // document.getElementById("january").innerHTML = months[0];
      
    $(function()
    {
        //compute Net Cash Flow for each month    
        months.forEach((v,k)=>{
        let tot = 0;  let exp = 0; let result = 0;
            $('.' + v).each(function()            
            {                
               tot += parseFloat($(this).val());
               exp = $("#exp" + v).val();

               result = (tot - exp);
            });
            $("#" + v).html(+result.toFixed(2)); 
          

        });
                 
    });
</script>



<!-- SERACH FUNCTIONALITY -->
<script>
    $(function()
    {
         $('#dynamicsearch').on('keyup', function()
         {           
              name = sessionStorage.getItem('name');

              q = $('#dynamicsearch').val().replace(' ','%20');
              
              if(name=='net_cash_flow')
               {
                  displayNetCashFlow(q);
               }

        })
    });
</script>



    @if(Session::has('info'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script type="text/javascript">
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection