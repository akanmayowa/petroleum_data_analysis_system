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


    @include('opec.partials.searchHeader',['action'=>url('opecNgl').'/manageNgl','formId'=>'submitNglCrudeForm','url'=>url('opecNgl')])
{{--    action="{{url('opecNgl')}}" --}}
    <form method="POST"  id="submitNglCrudeForm">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveNgl" name="type">
        @csrf
        <div style="overflow-x: auto">
        <table cellspacing="0" border="0">
            <colgroup width="124"></colgroup>
            <colgroup width="271"></colgroup>
            <colgroup width="159"></colgroup>
            <colgroup span="5" width="116"></colgroup>
            <colgroup width="131"></colgroup>

            <tr>
                <td colspan=3 rowspan=2 height="42" align="center" valign=middle bgcolor="#5DD289"><b><font
                                face="Courier New" size=4 color="#000000">Table 1.2 NGL</font></b></td>
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
            </tr>
            <tr>
                <td colspan=3 height="21" align="right" valign=bottom bgcolor="#5DD289"><font face="Courier New"
                                                                                              color="#FFFFFF"><br></font>
                </td>
                <td align="left" valign=bottom bgcolor="#5DD289"><b><font face="Courier New">Total</font></b></td>
                @foreach($streams as $stream)
                    <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000; " align="left" valign=bottom bgcolor="#5DD289"><font face="Courier New">{{strtoupper($stream)}}</font></td>
                @endforeach
            </tr>
            <tr>
                <td height="23" align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="right" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3 color="#000000">Field
                        name/Gas plant site</font></td>
                <td align="left" valign=bottom bgcolor="#BFBFC0"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" size=3
                                                                       color="#000000"><br></font></td>
            </tr>
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
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Field (lease)
                        condensates (1,000 b/d)</font></td>
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
            @include('opec.partials.quarterLoopNglPlant',['data'=>$FieldCondensates,'streamData'=>$FieldCondensatesstreamQuarter])


            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Plant
                        condensates (1,000 b/d)</font></td>
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
            @include('opec.partials.quarterLoopNglPlant',['data'=>$PlantCondensates,'streamData'=>$PlantCondensatesstreamQuarter])
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Gas plant LPG
                        (1,000 b/d)</font></td>
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
            @include('opec.partials.quarterLoopNgl',['class'=>'gasPlant'])
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Others (1,000
                        b/d)</font></td>
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
            @include('opec.partials.quarterLoopNgl',['class'=>'others'])
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
            <tr>
                <td height="23" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><b><font face="Courier New" color="#000000">Total
                            (1,000 b/d)</font></b></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><b><font face="Courier New" color="#000000"><br></font></b>
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
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
            @include('opec.partials.quarterLoopNgl',['class'=>'total'])
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Memo: Ethane
                        (1,000 b/d)</font></td>
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
            @include('opec.partials.quarterLoopNgl',['class'=>'memoEthane'])
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Share of total
                        from associated production (%)</font></td>
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
            @include('opec.partials.quarterLoopNgl',['class'=>'associate_production'])
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
            <tr>
                <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
                                                                                   color="#000000"><br></font></td>
                <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000">Estimated
                        total for 2020 (1,000 b/d)</font></td>
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
            @include('opec.partials.quarterLoopNgl',['class'=>'estTotal'])
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
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
            @include('opec.partials.quarterLoopNgl',['class'=>'imports'])
            {{--    @include('opec.partials.quarterLoopNglPlant',['class'=>'refFuel','idTotal'=>'refFuelTotal'])--}}
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

            @include('opec.partials.quarterLoopNgl',['class'=>'field_condensate'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'directUse'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'stocks'])
            <tr>
                <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" size=3
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
            @include('opec.partials.quarterLoopNgl',['class'=>'change'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'refIntake'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'statisticalDiff'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'memeItems'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'refFuel'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'petChem'])
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
            @include('opec.partials.quarterLoopNgl',['class'=>'powGen'])
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

            statisticalDiff()
        })


        function statisticalDiff() {

            var Imports = $(`.imports`).map(function () {
                return parseFloat(this.value)
            }).get();
            var totals = $(`.total`).map(function () {
                return parseFloat(this.value)
            }).get();

            var field_condensate = $(`.field_condensate`).map(function () {
                return parseFloat(this.value)
            }).get();
            var directUse = $(`.directUse`).map(function () {
                return parseFloat(this.value)
            }).get();
            var change = $(`.change`).map(function () {
                return parseFloat(this.value)
            }).get();
            var refIntake = $(`.refIntake`).map(function () {
                return parseFloat(this.value)
            }).get();

            var Importdiff = 0;

            var total = 0;
            for ($i = 0; $i < 4; $i++) {
                $QDay = getQday($i);
                $sd = Imports[$i] + totals[$i] - field_condensate[$i] - directUse[$i] - change[$i] / $QDay - refIntake[$i];

                $(`#statisticalDiff${$i + 1}`).val($sd);
                total += $sd;
            }
            $('#statisticalDiffTotal').text(total);
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

