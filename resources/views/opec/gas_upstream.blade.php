@extends('layouts.app')

@section('content')



    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    @if(!request()->has('excel'))
        <style type="text/css">
            body, div, table, thead, tbody, tfoot, tr, th, td, p {
                font-family: "Calibri";
                font-size: x-small
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

{{--    /opecGasUpstream/manageGasUpstream--}}
    @include('opec.partials.searchHeader',['action'=>url('opecGasUpstream').'/manageGasUpstream','formId'=>'submitGasUpstream','url'=>url('opecGasUpstream')])
    <form method="POST"  id="submitGasUpstream">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveGasUpstream" name="type">
        @csrf
        <div style="overflow-x: auto">
            <table cellspacing="0" border="0">
                <colgroup span="3" width="34"></colgroup>
                <colgroup width="278"></colgroup>
                <colgroup width="75"></colgroup>
                <colgroup span="5" width="34"></colgroup>
                <tr>
                    <td colspan=4 rowspan=2 height="42" align="center" valign=middle bgcolor="#FF9741"><b><font face="Courier New" size=4 color="#000000">Table 3.2 Natural gas - upstream</font></b></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3 color="#44546A"><br></font></u></td>
                </tr>
                <tr>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3 color="#44546A"><br></font></u></td>
                </tr>
                <tr>
                    <td height="21" align="right" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#FFFFFF"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#FFFFFF"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#FFFFFF"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#FFFFFF"><br></font></td>
                    <td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FF9741"><b><font face="Courier New">Total</font></b></td>
                    <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New">FIELD 1</font></td>
                    <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New">FIELD 2</font></td>
                    <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New">FIELD 3</font></td>
                    <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New">FIELD 4</font></td>
                    <td align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New">FIELD 5</font></td>
                </tr>
                <tr>
                    <td height="21" align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Field name</font></td>
                    <td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Onshore / Offshore</font></td>
                    <td style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BFBFC0"><b><font face="Courier New" color="#FFFFFF"><br></font></b></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" align="left"  colspan="3" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#000000">Reserves (1,000 mscm)</font></td>

                    <td align="right" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#FFFFFF"><br></font></td>
                    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Associated</font></td>
                    <td style="border-right: 1px solid #000000" align="right" valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{($gasReserve['associated_gas'])}}</font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="22" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font face="Courier New" color="#000000"><br></font></b></td>
                    <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Not-Associated</font></td>
                    <td style="border-right: 1px solid #000000" align="right" valign=bottom bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{$gasReserve['non_associated_gas']   }}</font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="22" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New" color="#000000">Total</font></b></td>
                    <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{$gasReserve['total_gas']}}</font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" colspan="3" align="left" valign=bottom bgcolor="#FF9741"><font face="Courier New" color="#000000">Production capacity and expansion plans (1,000 mscm)</font></td>

                    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="21" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Current gross capacity</font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New" color="#000000"><br></font></b></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="21" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69" sdval="2019" sdnum="1033;"><b><font face="Courier New" color="#000000">{{$year}}</font></b></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Associated</font></td>
                    <td style="border-right: 1px solid #000000" align="right" valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" value="{{@collect($futureGrossCapacities)->where('year',$year)->pluck('currentgrossassociated')[0]}}" name="currentgrossassociated_{{$year}}"   /></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Non-associated</font></td>
                    <td style="border-right: 1px solid #000000" align="right" valign=bottom bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><input type="number" value="{{@collect($futureGrossCapacities)->where('year',$year)->pluck('currentgrossnonassociated')[0]}}" name="currentgrossnonassociated_{{$year}}"   /></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="21" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Future gross capacity</font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69"><b><font face="Courier New" color="#000000"><br></font></b></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>

@for($i=$year+1; $i<=$year+4; $i++)
                <tr>
                    <td height="21" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69" sdval="2020" sdnum="1033;"><b><font face="Courier New" color="#000000">{{$i}}</font></b></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000"><br></font></td>
                    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFBF69"><font face="Courier New" color="#000000">Associated</font></td>
                    <td style="border-right: 1px solid #000000" align="right" valign=bottom bgcolor="#FFBF69" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><label>
                                <input type="number"  name="currentgrossassociated_{{$i}}"  value="{{@collect($futureGrossCapacities)->where('year',$i)->pluck('currentgrossassociated')[0]}}"  />
                            </label></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFBF69" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>
                <tr>
                    <td height="20" align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="center" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Non-associated</font></td>
                    <td style="border-right: 1px solid #000000" align="right" valign=bottom bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><label>
                                <input type="number"  name="currentgrossnonassociated_{{$i}}"  value="{{@collect($futureGrossCapacities)->where('year',$i)->pluck('currentgrossnonassociated')[0]}}" />
                            </label></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                </tr>

 @endfor
            </table>
        </div>
    </form>
    <!-- ************************************************************************** -->


@endsection

@section('script')

    <script>
        $(function () {
            $('.datepicker').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        })
    </script>
@endsection