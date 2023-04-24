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


    @include('opec.partials.searchHeader',['action'=>url('opecPetroleum').'/managePetroleum','formId'=>'submitPetroleum','url'=>url('opecPetroleum')])
    <form method="POST"  id="submitPetroleum">
        <input type="hidden" value="{{$year}}" name="year">
        <input type="hidden" value="{{Auth::user()->id}}" name="a_id">
        <input type="hidden" value="savePetroleum" name="type">



        <div>
            <div style="overflow-x: auto">
    <table cellspacing="0" border="0">

        <thead style="margin-bottom: 10px; ">
        <tr >
            <th colspan=3 rowspan=2 height="40" align="center" valign=middle bgcolor="#5DD289"><b><font face="Courier New" size=4 color="#000000">Table 1.4 Petroleum products</font></b></th>
            <th align="left" valign=middle bgcolor="#FFFFFF"><b><font face="Courier New" size=4 color="#000000"><br></font></b></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></th>
            <th align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3 color="#44546A"> </font></u></th>
            <th align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></th>
        </tr>
        <tr >
            <th align="left" valign=middle bgcolor="#FFFFFF"><b><font face="Courier New" size=4 color="#000000"><br></font></b></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></th>
            <th align="right" valign=middle bgcolor="#D9D9D9"><u><font face="Courier New" size=3 color="#44546A"></font></u></th>
            <th align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></th>
        </tr>
        <tr >
            <th height="63" align="center" valign=middle bgcolor="#5DD289"><font face="Courier New" color="#FFFFFF"><br></font></th>
            <th align="center" valign=middle bgcolor="#5DD289"><font face="Courier New" color="#FFFFFF"><br></font></th>
            <th align="center" valign=middle bgcolor="#5DD289"><font face="Courier New" color="#FFFFFF"><br></font></th>
            <th style="border-right: 1px solid #000000" align="center" valign=middle bgcolor="#5DD289"><b><font face="Courier New">Total products</font></b></th>
            @foreach($headers as $key=>$header)
                <th style="border-left: 2px solid #ff0000; border-right: 1px solid #000000; border-top: 1px solid #000000" align="center" valign=middle bgcolor="#5DD289"><font face="Courier New">{{$key}}</font></th>
            @endforeach
        </tr>
        {{--        <tr>--}}
        {{--            <th height="23" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Balance</font></th>--}}
        {{--            <th align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000"><br></font></th>--}}
        {{--            <th align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000"><br></font></th>--}}
        {{--            <th style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></th>--}}

        {{--            @foreach($headers as $key=>$header)--}}
        {{--                <th align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font><input style="width:100px" ></th>--}}
        {{--            @endforeach--}}
        {{--        </tr>--}}
        </thead>



        <tr>
            <td height="23" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Balance</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000"><br></font></td>
            <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></td>
        </tr>
        <tr>

            <td align="left" colspan="3" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Gross refinery output (1,000 b/d)</font></td>

            <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000"><br></font></td>
        </tr>
   @include('opec.partials.quarterLoopPetroleum',['data'=>$petroleumQuarter,'class'=>'grossRef'])

        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Receipts (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
           @include('opec.partials.petroleumHeader')
{{--            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td> --}}
        </tr>
        @include('opec.partials.quarterLoopPetroleum',['data'=>'','class'=>'reciepts'])

        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Imports (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleum',['data'=>$petroleumQuarterImport,'class'=>'imports'])

        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Exports (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleum',['data'=>'','class'=>'exports'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Products transferred (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'producttrans'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Interproduct transfers (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'interproduct'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Stock change (1,000 b)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'stockchange'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Demand (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'demand'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Statistical difference (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>

        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'statisticalDifference'])
        <tr>
            <td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Closing stocks (1,000 b)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'closingStock'])
        <tr>
            <td height="23" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Memo items (1,000 b/d)</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'memoItems'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Deliveries to PetChem</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'petchemDelivery'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Deliveries to Power generation</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'powGenDelivery'])
        <tr>
            <td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">International bunkers</font></td>
            <td align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        @include('opec.partials.quarterLoopPetroleumForm',['data'=>$petroleumData,'class'=>'intertnationalBuncker'])
        <tr>
            <td height="24" colspan="2" align="left" valign=bottom bgcolor="#71E69D"><font face="Courier New" size=3 color="#000000">Representative domestic prices</font></td>

            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
            @include('opec.partials.petroleumHeader')
        </tr>
        <tr>
            <td align="right" valign=bottom bgcolor="#B8FFE3" colspan="2"><font face="Courier New" color="#000000">Retail prices (incl. taxes, NC/liter, {{$year}})</font></td>
            <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{collect($retailPrice)->flatten()->sum()}}<br></font></td>
            <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-top: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-top: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-top: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{@$retailPrice['pms']}}<br></font></td>
            <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{@$retailPrice['dpk']}}<br></font></td>
            <td style="border-top: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-top: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">{{@$retailPrice['ago']}}<br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000">0<br></font></td>
        </tr>
        <tr>
            <td align="right" colspan="2" valign=bottom bgcolor="#FFFFFF"><font face="Courier New" color="#000000">Total tax (NC/liter, {{$year}})</font></td>
            <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
            <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-bottom: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-bottom: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-bottom: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-bottom: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td style="border-bottom: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#C0C0C0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">0<br></font></td>
            <td align="left" valign=bottom bgcolor="#D9D9D9"><font face="Courier New" color="#000000">0<br></font></td>
        </tr>
        </tbody>
    </table>
            </div>
        </div>
    <!-- ************************************************************************** -->
    </form>
@endsection
@section('script')
    <script>
        $(function(){
            $('.datepicker').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        })
    </script>
    @endsection

