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



    @include('opec.partials.searchHeader',['action'=>url('opecOtherPrimaries').'/manageOtherPrimaries','formId'=>'submitOtherPrimaries','url'=>url('opecOtherPrimaries')])
    {{--    action="{{url('opecOtherPrimaries')}}" --}}
    <form method="POST"  id="submitOtherPrimaries">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="saveOtherPrimaries" name="type">
        @csrf
        <div style="overflow-x: auto">
        <table cellspacing="0" border="0">
    <colgroup span="2" width="64"></colgroup>
    <colgroup width="324"></colgroup>
    <colgroup span="6" width="64"></colgroup>
    <tbody><tr>
        <td colspan="3" rowspan="2" height="42" align="center" valign="middle" bgcolor="#5DD289"><b><font face="Courier New" size="4" color="#000000">Table 1.3 Other primary oil</font></b></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="middle" bgcolor="#D9D9D9"><u><font face="Courier New" size="3" color="#44546A"><br></font></u></td>
    </tr>
    <tr>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="center" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign="middle" bgcolor="#D9D9D9"><u><font face="Courier New" size="3" color="#44546A"><br></font></u></td>
    </tr>
    <tr>
        <td colspan="3" height="21" align="right" valign="bottom" bgcolor="#5DD289"><font face="Courier New" color="#FFFFFF"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#5DD289"><b><font face="Courier New">Total</font></b></td>
        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New">PLANT 1</font></td>
        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New">PLANT 2</font></td>
        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New">PLANT 3</font></td>
        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New">PLANT 4</font></td>
        <td align="left" valign="bottom" bgcolor="#5DD289"><font face="Courier New">PLANT 5</font></td>
    </tr>
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000">Plant site (name)</font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" size="3" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Production (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>

    @include('opec.partials.quarterLoop',['class'=>'production','idTotal'=>'stocksTotal'])



    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">From other sources</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000">GTL (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'gtl','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000">CTL (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'ctl','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000">Others (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'others','idTotal'=>'stocksTotal'])
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><b><font face="Courier New" color="#000000">Total (1,000 b/d)</font></b></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><b><font face="Courier New" color="#000000"><br></font></b></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" color="#000000">Q1</font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000" class="totalQ1Total">0<br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Q2</font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000" class="totalQ2Total">0<br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#B8FFE3"><font face="Courier New" color="#000000">Q3</font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000" class="totalQ3Total">0<br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="right" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Q4</font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000" class="totalQ4Total">0<br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom" bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="22" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="right" valign="bottom" bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New" color="#000000">2019</font></td>
        <td style="border-top: 2px solid #ff0000; border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000" class="totalQTotal">0<br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Imports (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'imports','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Exports (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'exports','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Products transferred /Backflows (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'product','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Direct use (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'direct_use','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Stocks</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'stock','idTotal'=>'stocksTotal'])
    <tr>
        <td height="20" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000">Change (1,000 b)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'change','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Refinery intake (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'ref_intake','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Statistical difference (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'statistical_diff','idTotal'=>'stocksTotal'])
    <tr>
        <td height="23" align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Memo items (1,000 b/d)</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000"><br></font></td>
        <td style="border-left: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Refinery losses</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'ref_loses','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Refinery fuel</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'ref_fuel','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Deliveries to PetChem</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'delivery_to_petchem','idTotal'=>'stocksTotal'])
    <tr>
        <td height="21" align="left" valign="bottom" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" size="3" color="#000000">Deliveries to Power generation</font></td>
        <td align="left" valign="bottom" bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
        <td style="border-left: 2px solid #000000" align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign="bottom" bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
    @include('opec.partials.quarterLoop',['class'=>'delivery_power_gen','idTotal'=>'stocksTotal'])
    </tbody></table>

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


{{--            {{$class}}{{$i}}--}}
        });

      function statisticalDiff() {

          // totalQ1+ProductionQ1+ImportsQ1-exportsQ1+productTransferredQ1-directuseQ1-changeQ1 / Q1_Days-refineryQ1
            production=$('.production').map(function(){ return parseFloat(this.value) }).get()
            imports=$('.imports').map(function(){ return parseFloat(this.value) }).get()
            exports=$('.exports').map(function(){ return parseFloat(this.value) }).get()
            productTransferred=$('.product').map(function(){ return parseFloat(this.value) }).get()
            directuse=$('.direct_use').map(function(){ return parseFloat(this.value) }).get()
            change=$('.change').map(function(){ return parseFloat(this.value) }).get()
            refinery=$('.ref_intake').map(function(){ return parseFloat(this.value) }).get()


            var Importdiff = 0;

            var total = 0;
            for ($i = 0; $i < 4; $i++) {
                $QDay = getQday($i);
                total=parseFloat($(`.totalQ${$i+1}Total`).text());

                $sd = total+production[$i]+imports[$i]-exports[$i]+productTransferred[$i]-directuse[$i]-change[$i] / parseFloat($QDay)-refinery[$i];

                $(`#statistical_diff${$i + 1}`).val($sd.toFixed(2));
                total += $sd;
            }
            $('#statistical_diffTotal').text(total.toFixed(2));
        }

        function totalQuarters(){

            gtl=$('.gtl').map(function(){ return this.value }).get();
            ctl=$('.ctl').map(function(){ return this.value }).get();
            others=$('.others').map(function(){ return this.value }).get();
            totalQ=total=0;
            $.each(gtl,function(index,element){
                totalQ=parseFloat(gtl[index]) + parseFloat(ctl[index]) + parseFloat(others[index]);
                total +=parseFloat(totalQ);
                $(`.totalQ${index+1}Total`).text(totalQ);
            });


            $(`.totalQTotal`).text(total);
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