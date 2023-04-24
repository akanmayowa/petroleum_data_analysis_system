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

    @include('opec.partials.searchHeader',['action'=>url('opec').'/manageCrude','formId'=>'submitCrudeForm','url'=>url('opec')])

    {{--    action="{{url('opec')}}" --}}
    <form method="POST"  id="submitCrudeForm">
        <div style="overflow-x: auto">
        <table cellspacing="0" border="0">
            <colgroup span="2" width="64"></colgroup>
            <colgroup width="280"></colgroup>
            <colgroup span="5" width="64"></colgroup>
            <colgroup width="127"></colgroup>

            <tr>
                <td colspan=3 rowspan=2 height="42" align="center" valign=middle bgcolor="#5DD289"><b><font
                                face="Courier New" size=4 color="#000000">Table 1.1 Crude oil   </font></b></td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3 color="#44546A">


                        </font></u></td>
            </tr>
            <tr>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3 color="#44546A"><a
                                    href="#Menu.A1"> </a></font></u></td>
            </tr>
            <tr>
                <td colspan=3 height="22"  bgcolor="#5DD289"><b><font
                                face="Courier New" size=4 color="#000000"><font face="Courier New"
                                                                                              color="black">Major crude stream (name)</font>
                </td>
                <td align="left" valign=bottom bgcolor="#5DD289"><b><font face="Courier New">Total</font></b></td>
                @foreach($streams as $stream)
                <td align="left" style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" valign=bottom bgcolor="#5DD289"><font face="Courier New">{{strtoupper($stream)}}</font></td>
                    @endforeach
            </tr>
{{--            <tr>--}}
{{--                <td align="right"  colspan="3" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3 color="#000000">Major crude stream (name)</font></td>--}}
{{--                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" size=3--}}
{{--                                                                       color="#000000"><br></font></td>--}}
{{--                <td--}}
{{--                    align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3--}}
{{--                                                                       color="#000000"><br></font></td>--}}
{{--                <td   align="left" valign=bottom--}}
{{--                    bgcolor="#B8FFE3"><font face="Courier New" size=3 color="#000000"><br></font></td>--}}
{{--                <td   align="left" valign=bottom--}}
{{--                    bgcolor="#B8FFE3"><font face="Courier New" size=3 color="#000000"><br></font></td>--}}
{{--                <td   align="left" valign=bottom--}}
{{--                    bgcolor="#B8FFE3"><font face="Courier New" size=3 color="#000000"><br></font></td>--}}
{{--                <td--}}
{{--                    align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3--}}
{{--                                                                       color="#000000"><br></font></td>--}}
{{--            </tr>--}}
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Production</font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
            </tr>
            <tr>

                <td align="right" colspan="3" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" color="#000000">Gravity
                        (oAPI)</font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            <tr>

                <td align="right" colspan="3" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Sulphur
                        content (wt. %)</font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New"
                                                                                            color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New"
                                                                                            color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New"
                                                                                            color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New"
                                                                                            color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0.00%"><font face="Courier New"
                                                                                            color="#000000"><br></font>
                </td>
            </tr>
            <tr>

                <td colspan="2" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Quantity<br>(1,000
                        b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font>
                </td>
            </tr>
            @foreach($monthly as $month=>$value)
                <tr>
                    <td height="21" align="right" valign=middle bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                        color="#000000"><br></font></td>
                    <td align="left" valign=middle bgcolor="#FFFFFF"><font face="Courier New"
                                                                           color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#B8FFE3"><font face="Courier New"
                                                                            color="#000000">{{ucwords($month)}}</font>
                    </td>
                    <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                        align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font>
                        <b>{{$value}}</b>
                    </td>
                    @foreach($streams as $key=>$stream)
                        <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                            align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                       color="#000000"><br></font>
                        {{@$monthlyStream[$key][$month]}}
                    </td>
                        @endforeach
                </tr>
            @endforeach


            <tr>
                <td height="22" align="right" valign=middle bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                    color="#000000"><br></font></td>
                <td align="left" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="right" valign=bottom bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New"
                                                                                                   color="#000000">{{$year}}</font>
                </td>
                <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000" align="left" valign=bottom
                    bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font>
                    <b>{{$sumTotal}}</b></td>
                @foreach($streams as $key=>$stream)
                <td style="border: 2px solid #ff0000; "
                    align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><br></font><b>{{@$sumTotalStream[$key]}}</b></td>
                </td>
                    @endforeach
            </tr>
            <tr>
                <td height="22" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Imports (1,000
                        b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'imports','idTotal'=>'importTotal'])
            <tr>
                <td height="22" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Exports (1,000
                        b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @foreach($crudeExports as $quarter=>$export)
                @php $exportTotal +=$export @endphp
                <tr>
                    <td height="20" align="right" valign=middle bgcolor="#FFFFFF"><font face="Courier New"
                                                                                        color="#000000"><br></font></td>
                    <td align="left" valign=middle bgcolor="#FFFFFF"><font face="Courier New"
                                                                           color="#000000"><br></font></td>
                    <td align="right" valign=bottom bgcolor="#B8FFE3"><font face="Courier New"
                                                                            color="#000000">{{$quarter}}</font></td>
                    <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000"
                        align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font><b>{{$export}}</b>
                    </td>
                    <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font>
                    </td>
                    <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font>
                    </td>
                    <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font>
                    </td>
                    <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font>
                    </td>
                    <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                                   color="#000000"><br></font>
                    </td>
                </tr>
            @endforeach


            <input type="hidden" value="saveCrude" name="type">
            <input type="hidden" value="{{$year}}" name="year">
            <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
            @csrf
            <tr>
                <td height="21" align="right" valign=middle bgcolor="#FFFFFF"><font face="Courier New"
                                                                                    color="#000000"><br></font></td>
                <td align="left" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="right" valign=bottom bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New"
                                                                                                   color="#000000">{{$year}}</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000"
                    align="right" valign=bottom bgcolor="#B8FFE3" sdval="0" sdnum="1033;0;#,##0.00"><font
                            face="Courier New" color="#000000"></font><b>{{$exportTotal}}</b></td>
                <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000" align="left" valign=bottom
                    bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000" align="left" valign=bottom
                    bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000" align="left" valign=bottom
                    bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000" align="left" valign=bottom
                    bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-right: 2px solid #ff0000"
                    align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="22" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Direct use (1,000
                        b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'directs','idTotal'=>'directsTotal'])
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Stocks</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Closing levels
                        (1,000 b)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'stocks','idTotal'=>'stocksTotal'])

            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Change (1,000
                        b)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'diff','idTotal'=>'diffTotal'])

            <tr>
                <td height="22" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Refinery intake
                        (1,000 b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'refineryintakes','idTotal'=>'refineryintakesTotal'])

            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Statistical
                        difference (1,000 b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'refineryStatisticalDiff','idTotal'=>'refineryStatisticalDiffTotal'])

            <tr>
                <td height="23" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                                   color="#000000">Memo items (1,000
                        b/d)</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td style="border-left: 2px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0"
                    sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Refinery
                        losses</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td style="border-left: 2px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0"
                    sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'refloses','idTotal'=>'reflosesTotal'])

            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Refinery
                        fuel</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td style="border-left: 2px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0"
                    sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'refFuel','idTotal'=>'refFuelTotal'])

            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Deliveries
                        to PetChem</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td style="border-left: 2px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0"
                    sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'petchem','idTotal'=>'petchemTotal'])

            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New"
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Deliveries
                        to Power generation</font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font>
                </td>
                <td style="border-left: 2px solid #000000" align="left" valign=bottom bgcolor="#BFBFC0"
                    sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New"
                                                                                               color="#000000"><br></font>
                </td>
            </tr>
            @include('opec.partials.quarterLoop',['class'=>'powgen','idTotal'=>'powgenTotal'])

        </table>
        </div>
    </div>
    </form>
    <!-- ************************************************************************** -->
    @section('script')
        <script>

            $(function () {
                $('.datepicker').datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });

                statisticalDiff()
            })

            //getStatisticalDiff
            function statisticalDiff() {

                var Imports = $(`.imports`).map(function () {
                    return this.value
                }).get();
                var $refIntake = $(`.refineryintakes`).map(function () {
                    return this.value
                }).get();
                var Importdiff = 0;
                $.each(Imports, function (index, element) {
                    Importdiff -= parseFloat(element);
                });
                var total = 0;
                for ($i = 0; $i < 4; $i++) {
                    $QDay = getQday($i);
                    $average = ({{$exportTotal}}/12) + Importdiff /
                    $QDay - $refIntake[$i];
                    $(`#refineryStatisticalDiff${$i + 1}`).val($average);
                    total += $average;
                }
                $('#refineryStatisticalDiffTotal').text(total);
            }


            function getQday($i) {
                if ($i == 0) {
                    return {{$Q_Day[0]}}
                }
                if ($i == 1) {
                    return {{$Q_Day[1]}}
                }
                if ($i == 2) {
                    return {{$Q_Day[2]}}
                }
                if ($i == 3) {
                    return {{$Q_Day[3]}}
                }
            }
        </script>

@endsection

@endsection