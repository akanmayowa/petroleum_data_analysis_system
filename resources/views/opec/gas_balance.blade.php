@extends('layouts.app')

@section('content')



    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    @if(!request()->has('excel'))
        <style type="text/css">
            body, div, table, thead, tbody, tfoot, tr, th, td, p {
                font-family: "Calibri";
                font-size: x-small
            }

            .fixed_headers {
                width: 750px;
                table-layout: fixed;
                border-collapse: collapse;
            }

            .fixed_headers th,
            .fixed_headers td {
                padding: 5px;
                text-align: left;
            }

            .fixed_headers td:nth-child(1),
            .fixed_headers th:nth-child(1) {
                min-width: 200px;
            }

            .fixed_headers td:nth-child(2),
            .fixed_headers th:nth-child(2) {
                min-width: 200px;
            }

            .fixed_headers td:nth-child(3),
            .fixed_headers th:nth-child(3) {
                width: 350px;
            }

            .fixed_headers thead tr {
                display: block;
                position: relative;
            }

            .fixed_headers tbody {
                display: block;
                overflow: auto;
                width: 100%;
                height: 300px;
            }

            .old_ie_wrapper {
                height: 300px;
                width: 750px;
                overflow-x: hidden;
                overflow-y: auto;
            }

            .old_ie_wrapper tbody {
                height: auto;
            }

            a.comment-indicator:hover + comment {
                background: #ffd;
                position: absolute;
                display: block;
                border: 1px solid black;
                padding: 0.5em;
            }

            a.comment-indicator {
                background: red;
                display: inline-block;
                border: 1px solid black;
                width: 0.5em;
                height: 0.5em;
            }

            comment {
                display: none;
            }

        </style>
    @endif


    @include('opec.partials.searchHeader',['action'=>url('opecGasBalance').'/manageGasBalance','formId'=>'submitGasBalance','url'=>url('opecGasBalance')])
    <form method="POST" id="submitGasBalance">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveGasBalance" name="type">


        <div>
            <div style="overflow-x: auto">

                <table cellspacing="0" border="0">
                    <colgroup width="239"></colgroup>
                    <colgroup width="237"></colgroup>
                    <colgroup width="325"></colgroup>
                    <colgroup width="225"></colgroup>
                    <tr>
                        <td height="20" align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New"
                                                                                           color="#000000"><br></font>
                        </td>
                        <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New"
                                                                               color="#000000">TOT</font></td>
                    </tr>
                    <tr>
                        <td colspan=3 rowspan=2 height="42" align="center" valign=middle bgcolor="#FF9742"><b><font
                                        face="Courier New" size=4 color="#000000">Table 3 Natural gas -
                                    balance</font></b></td>
                        <td align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3
                                                                                   color="#44546A"><br></font></u></td>
                    </tr>
                    <tr>
                        <td align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3
                                                                                   color="#44546A"><br></font></u></td>
                    </tr>
                    <tr>
                        <td colspan=3 height="20" align="center" valign=bottom bgcolor="#FF9741"><font
                                    face="Courier New" color="#FFFFFF"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="23" align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" size=3
                                                                                           color="#000000">Balance<br>(million
                                standard cubic meters)</font></td>
                        <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" size=3
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" size=3
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FF9741"><font face="Courier New" color="#000000">Production</font>
                        </td>
                        <td align="left" valign=middle bgcolor="#FF9741"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">+
                                Production (gross)</font></td>
                        <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000">{{$gasProduction}}<br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">-
                                Re-injection</font></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left"
                            valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                          color="#000000"><span
                                        class="re_injection">{{@$gasUtilization['re_injection']}}</span><br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">-
                                Flared</font></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left"
                            valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                          color="#000000"><span
                                        class="total_gas_flared">{{@$gasUtilization['total_gas_flared']}}</span><br></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">-
                                Shrinkage</font></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left"
                            valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                          color="#000000"><span
                                        class="shrinkage">{{@$gasUtilization['shrinkage']}}</span><br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">- Own
                                use</font></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left"
                            valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                          color="#000000"><span
                                        class="ownuse">{{@$gasUtilization['ownuse']}}</span><br></font></td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">=
                                Marketed production</font></td>
                        <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="right" valign=bottom bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><span
                                        class="marketedProduction">{{$gasProduction-@$gasUtilization['re_injection']-@$gasUtilization['total_gas_flared']-@$gasUtilization['shrinkage']-@$gasUtilization['ownuse']}}</span></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FF9741"><font face="Courier New" color="#000000">Balance</font>
                        </td>
                        <td align="left" valign=middle bgcolor="#FF9741"><font face="Courier New"
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">+
                                Marketed production</font></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="right" valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New"
                                    color="#000000">{{$gasProduction-@$gasUtilization['re_injection']-@$gasUtilization['total_gas_flared']-@$gasUtilization['shrinkage']-@$gasUtilization['ownuse']}}</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">+ From
                                other sources</font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left"
                            valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                          color="#000000"><input
                                        type="number" style="width:100%" step="0.01" name="gasBalance[]"
                                        class="gasBalance" value="{{round(@$gasBalance[0],2)}}"/> <br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">+
                                Imports</font> </td>
                        <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right"
                            valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                    color="#000000"><span class="import">0</span></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">-
                                Exports</font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right"
                            valign=bottom bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                    color="#000000"><span class="export">{{$export}}</span></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">-
                                Demand</font></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left"
                            valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                          color="#000000"><input
                                        type="number" style="width:100%" step="0.01" name="gasBalance[]"
                                        class="gasBalance" value="{{round(@$gasBalance[1],2)}}"/><br></font></td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">-
                                Stock change</font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><input type="number" style="width:100%"
                                                                              step="0.01" name="gasBalance[]"
                                                                              class="gasBalance"
                                                                              value="{{round(@$gasBalance[2],2)}}"/><br></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">=
                                Statistical difference</font></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="right" valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><span
                                    id="statistical_diff"></span></td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Closing
                                stocks</font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><input type="number" style="width:100%"
                                                                              step="0.01" name="gasBalance[]"
                                                                              class="gasBalance"
                                                                              value="{{round(@$gasBalance[3],2)}}"/><br></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">Memo:
                                Household consumption</font></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><input type="number" style="width:100%"
                                                                              step="0.01" name="gasBalance[]"
                                                                              class="gasBalance"
                                                                              value="{{round(@$gasBalance[4],2)}}"/><br></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Memo:
                                Power generation</font></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000">{{@$gasUtilization['gas_to_nipp']}}<br></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=middle bgcolor="#FFBF69"><font face="Courier New" color="#000000">Memo:
                                Deliveries to PetChem</font></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="24" align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" size=3
                                                                                           color="#000000">Representative
                                domestic prices</font></td>
                        <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" size=3
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" size=3
                                                                               color="#000000"><br></font></td>
                        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" size=3 color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font>
                        </td>
                        <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Retail
                                prices (incl. taxes, NC/MWh, {{$year}})</font></td>
                        <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><input type="number" style="width:100%"
                                                                              step="0.01" name="gasBalance[]"
                                                                              class="gasBalance"
                                                                              value="{{round(@$gasBalance[5],2)}}"/><br></font>
                        </td>
                    </tr>
                    <tr>
                        <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                              color="#000000"><br></font></b>
                        </td>
                        <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New"
                                                                                  color="#000000"><br></font></b></td>
                        <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Total
                                taxes (NC/MWh, {{$year}})</font></td>
                        <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font
                                    face="Courier New" color="#000000"><input type="number" style="width:100%"
                                                                              step="0.01" name="gasBalance[]"
                                                                              class="gasBalance"
                                                                              value="{{round(@$gasBalance[6],2)}}"/><br></font>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
        <!-- ************************************************************************** -->
    </form>
@endsection
@section('script')
    <script>
        $(function () {



            $('.datepicker').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
           calculateStatisticalDiff();

            $('.gasBalance').keyup(function () {

                calculateStatisticalDiff()
            })
        });


        function  convertNum(value) {
            return parseFloat(value);
            // console.log(value+"\n");
        }

        function  calculateStatisticalDiff() {
            var gasBalance = $('.gasBalance').map(function () {
                return this.value
            }).get();

            $import = $('.import').text();
            $export  = $('.export').text();
            otherBalance = convertNum(gasBalance[0]) - convertNum(gasBalance[1]) - convertNum(gasBalance[2]) + convertNum($import) - convertNum($export);

            var statisticalDifference = convertNum($('.marketedProduction').text()) + otherBalance ;
            // console.log(statisticalDifference);
            $('#statistical_diff').text(statisticalDifference);
        }
    </script>
@endsection


{{--{--}}
{{--"total_gas_flared": 9941276.73,--}}
{{--"ownuse": 5922558.33,--}}
{{--"re_injection": 20021045.91,--}}
{{--"shrinkage": 595207.56,--}}
{{--"gas_to_nipp": 1066670.8--}}
{{--}--}}