<div class="table-responsive">   
    <h5 style="margin-left: 5px; color: #aaa"> Ministerial KPI - Net Cash Flow         
        <a href="{{url('ministerial-performance/download_mpm_net_cash_flow/xlsx')}}" data-toggle="tooltip" class="btn btn-sm pull-right excel-button" title="Download Ministerial KPI Net Cash Flow Excel Here">  <i class="fa fa-file-excel-o"></i> Download</a>
    </h5>
        <table class="table table-striped table-sm mb-0" id="net_cash_flow_table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Year <i class="units"></i></th>
                    <th>Jannuary <i class="units"></i></th>
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
            <tbody> @php  $yr = date('Y');   $yr_1 = $yr - 1;    $yr_2 = $yr - 2;    $yr_3 = $yr - 3;    $yr_4 = $yr - 4;    $yr_6 = $yr - 6; @endphp
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr}}</th>
                    @if($net_cash_flows_1)
                        @foreach($net_cash_flows_1 as $flow_1) 
                            @if($flow_1->year == $yr) 
                                <th data-toggle="tooltip" title="Millions">{{$flow_1->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr}}</th>
                    @if($net_cash_flows_2)
                        @foreach($net_cash_flows_2 as $flow_2) 
                            @if($flow_2->year == $yr)
                                <th data-toggle="tooltip" title="Millions">{{$flow_2->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr}}</th>
                    @if($net_cash_flows_3)
                        @foreach($net_cash_flows_3 as $flow_3) 
                            @if($flow_3->year == $yr)
                                <th data-toggle="tooltip" title="Millions">{{$flow_3->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr}}</th>
                    @if($net_cash_flows_4)
                        @foreach($net_cash_flows_4 as $flow_4) 
                            @if($flow_4->year == $yr)
                                <th data-toggle="tooltip" title="Millions">{{$flow_4->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>




                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_1}}</th>
                    @if($net_cash_flows_1)
                        @foreach($net_cash_flows_1 as $flow_1) 
                            @if($flow_1->year == $yr_1) 
                                <th data-toggle="tooltip" title="Millions">{{$flow_1->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_1}}</th>
                    @if($net_cash_flows_2)
                        @foreach($net_cash_flows_2 as $flow_2) 
                            @if($flow_2->year == $yr_1)
                                <th data-toggle="tooltip" title="Millions">{{$flow_2->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_1}}</th>
                    @if($net_cash_flows_3)
                        @foreach($net_cash_flows_3 as $flow_3) 
                            @if($flow_3->year == $yr_1)
                                <th data-toggle="tooltip" title="Millions">{{$flow_3->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_1}}</th>
                    @if($net_cash_flows_4)
                        @foreach($net_cash_flows_4 as $flow_4) 
                            @if($flow_4->year == $yr_1)
                                <th data-toggle="tooltip" title="Millions">{{$flow_4->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>



                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_2}}</th>
                    @if($net_cash_flows_1)
                        @foreach($net_cash_flows_1 as $flow_1) 
                            @if($flow_1->year == $yr_2) 
                                <th data-toggle="tooltip" title="Millions">{{$flow_1->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_2}}</th>
                    @if($net_cash_flows_2)
                        @foreach($net_cash_flows_2 as $flow_2) 
                            @if($flow_2->year == $yr_2)
                                <th data-toggle="tooltip" title="Millions">{{$flow_2->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_2}}</th>
                    @if($net_cash_flows_3)
                        @foreach($net_cash_flows_3 as $flow_3) 
                            @if($flow_3->year == $yr_2)
                                <th data-toggle="tooltip" title="Millions">{{$flow_3->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
                <tr>
                    <th data-toggle="tooltip" title="Millions">{{$yr_2}}</th>
                    @if($net_cash_flows_4)
                        @foreach($net_cash_flows_4 as $flow_4) 
                            @if($flow_4->year == $yr_2)
                                <th data-toggle="tooltip" title="Millions">{{$flow_4->mpm}}</th>    
                            @endif
                        @endforeach
                    @endif   
                </tr>
            </tbody>
        </table>
</div> 



<script type="text/javascript">
    $(function()
    {
        $('.page-link').click(function(e)
        {

            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID);      
           
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>