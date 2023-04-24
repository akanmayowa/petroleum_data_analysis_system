@php
    use \App\Http\Controllers\PublicationController;
    $controllerName = new PublicationController;


    //function to check if a number is even or odd
    function even($i)
    {
        if($i % 2 == 0){ return true; }
    }

    function rowSpan3($num)
    {
        if($num % 3 == 0){ return true; }
    }
@endphp


@php
    $ref_perf = \App\down_plant_location::get();  $tot_cap = 1;
    $t_pms = '0'; $t_ago = '0'; $t_dpk = '0'; $t_atk = '0'; $t_lpf = '0'; $t_bas = '0'; $t_bit = '0';
    $krpc_cap = '0'; $pnew_cap = '0'; $pold_cap = '0'; $wrpc_cap = '0'; $ndpr_cap = '0'; $tot_cap = '0';
@endphp





@php $cap_tot = 0; $cap_tot_inde = 0; @endphp
<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 61) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>61,'yrs'=>$yrs, 'remark'=>' Licensed Base Oil Station Capacity'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Market Category</th>
                <th style="background: #A3C1AD!important;">Company</th>
                <th style="background: #A3C1AD!important;">Location</th>
                <th style="background: #A3C1AD!important;">Storage Capacity <i class="units">Litres</i></th>
            </tr>


            <tbody> @php $i=1; @endphp
            @if($base_capacity_major)
                @foreach($base_capacity_major as $key => $major_capacity)
                    <tr>
                        @if($key == 0)
                            <th class="th_h" rowspan="{{$major_comp}}" style="background: #ACE1AF!important; border-color: #fff!important">
                                {{$major_capacity->market_category?$major_capacity->market_category->market_segment_name:''}}
                            </th>
                        @endif
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @if($major_capacity->company) {{$major_capacity->company->company_name}} @endif</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$major_capacity->location_id}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($major_capacity->storage_capacity)}}</th>
                        @php $cap_tot += $major_capacity->storage_capacity; @endphp
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr style="background: #A3C1AD; border-color: #fff!important"> <td colspan="4"></td> </tr>
            @php $j=1; @endphp
            @forelse($base_capacity_inde as $k => $inde_capacity)
                <tr>
                    @if($k == 1)
                        <th class="th_h" rowspan="{{$inde_comp}}" style="background: #ACE1AF!important; border-color: #fff!important">
                            {{$inde_capacity->market_category?$inde_capacity->market_category->market_segment_name:''}}
                        </th>
                    @endif
                    <th class="th_h" @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                        @if($inde_capacity->company)
                            {{$inde_capacity->company->company_name}} @endif
                    </th>
                    <th class="th_h" @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                        {{$inde_capacity->location_id}}
                    </th>
                    <th class="th_h" @if(even($j) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($inde_capacity->storage_capacity)}}
                    </th>
                    @php $cap_tot_inde += $inde_capacity->storage_capacity; @endphp
                </tr>  @php $j++; @endphp
            @empty
            @endforelse

            <tr style="background: #A3C1AD">
                <th class="th_h" colspan="3" style="text-align: left; background: #A3C1AD!important;; border-color: #fff!important"><b class="bfont-size">
                        Subtotal Major Marketers</b>
                </th>
                <th class="th_h" style="background: #A3C1AD!important;text-align: right; ; border-color: #fff!important"><b class="bfont-size">
                        {{number_format($cap_tot)}}</b>
                </th>
            </tr>
            <tr style="background: #A3C1AD">
                <th class="th_h" colspan="3" style="text-align: left; background: #A3C1AD!important;; border-color: #fff!important"><b class="bfont-size">
                        Subtotal Independent Marketers</b></th>
                <th class="th_h" style="background: #A3C1AD!important;text-align: right; border-color: #fff!important"><b class="bfont-size">
                        {{number_format($cap_tot_inde)}}</b></th>
            </tr>


            <tr style="background: #A3C1AD">
                <th class="th_h" colspan="3" style="text-align: left;background: #A3C1AD!important;; border-color: #fff!important"><b class="bfont-size">
                        Grand Total</b></th>
                <th class="th_h" style="background: #A3C1AD!important;text-align: right; border-color: #fff!important"><b class="bfont-size">
                        {{number_format($cap_tot + $cap_tot_inde)}}</b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_61">
        @if($controllerName->bottomRemarks(61, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(61, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(61, $yrs)) {!! $controllerName->bottomRemarksTemp(61, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 62) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>62,'yrs'=>$yrs, 'remark'=>' Licences / Approvals / Permits Granted'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">#</th>
                <th style="background: #A3C1AD!important;">Facility Type</th>
                <th style="background: #A3C1AD!important;">Licences / Approvals / Permit Issued</th>
            </tr>

            <tbody>
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;"> 1 </th>
                <th class="th_h" style="background: #ACE1AF!important;"> Oil $ Condensate </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    {{$controllerName->ProjectLicenseCount('\App\\up_processing_plant_project', $yrs, 'year', $yrs)}}
                </th>
            </tr>
            <tr>
                <th class="th_h"> 2 </th>
                <th class="th_h"> Refineries </th>
                <th class="th_h">
                    {{$controllerName->ProjectLicenseCount('\App\\es_licensed_refinery_project', $yrs, 'project_name', 'Refinery')}}
                </th>
            </tr>
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;"> 3 </th>
                <th class="th_h" style="background: #ACE1AF!important;"> Fertilizers </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    {{$controllerName->ProjectLicenseCount('\App\\down_petrochemical_plant_project', $yrs, 'company', 'Fertilizer')}}
                </th>
            </tr>
            <tr>
                <th class="th_h"> 4 </th>
                <th class="th_h"> Gas </th>
                <th class="th_h">
                    {{$controllerName->ProjectLicenseCount('\App\\gas_processing_plant_project', $yrs,  'year', $yrs)}}
                </th>
            </tr>
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;"> 5 </th>
                <th class="th_h" style="background: #ACE1AF!important;"> Pipelines - Oil </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    {{$controllerName->ProjectLicenseCount('\App\\es_pipeline_project', $yrs, 'process_fluid', 'OIL')}}
                </th>
            </tr>
            <tr>
                <th class="th_h"> 6 </th>
                <th class="th_h"> Pipelines - Condensate </th>
                <th class="th_h">
                    {{$controllerName->ProjectLicenseCount('\App\\es_pipeline_project', $yrs,  'process_fluid', 'CONDENSATE')}}
                </th>
            </tr>
            <tr>
                <th class="th_h" style="background: #ACE1AF!important;"> 7 </th>
                <th class="th_h" style="background: #ACE1AF!important;"> Pipelines - Gas </th>
                <th class="th_h" style="background: #ACE1AF!important;">
                    {{$controllerName->ProjectLicenseCount('\App\\es_pipeline_project', $yrs, 'process_fluid', 'GAS')}}
                </th>
            </tr>
            <tr>
                <th class="th_h"> 8 </th>
                <th class="th_h"> Pipelines - Water Injector </th>
                <th class="th_h">
                    {{$controllerName->ProjectLicenseCount('\App\\es_pipeline_project', $yrs,  'process_fluid', 'WATER')}}
                </th>
            </tr>
            <tr>  @php $meter_count++; @endphp
                <th class="th_h" @if(even($meter_count) != true) style="background: #ACE1AF!important;" @endif> 9 </th>
                <th class="th_h" @if(even($meter_count) != true) style="background: #ACE1AF!important;" @endif> Technology Adaptation </th>
                <th class="th_h" @if(even($meter_count) != true) style="background: #ACE1AF!important;" @endif>
                    {{$controllerName->ProjectLicenseCount('\App\\es_technology', $yrs, 'year', $yrs)}}
                </th>
            </tr> @php $i = 10; @endphp
            @forelse($metering_phases as $metering_phase)
                <tr>
                    <th class="th_h" @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{$i}} </th>
                    <th class="th_h" @if(even($i) != true) style="background: #ACE1AF!important;" @endif> Metering
                        {{$metering_phase->phase_id}} </th>
                    <th class="th_h" @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                        {{$controllerName->ProjectLicenseCount('\App\\es_metering', $yrs, 'phase_id', $metering_phase->phase_id)}}
                    </th>
                </tr> @php $i++; @endphp
            @empty
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_62">
        @if($controllerName->bottomRemarks(62, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(62, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(62, $yrs)) {!! $controllerName->bottomRemarksTemp(62, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>

@if(Auth::user()->role_obj->role_name == 'Admin' ||
$contributors->contains('approver_id', Auth::user()->id) && $contributors->contains('division', 'MIDSTREAM') )

    <div class="row"> <div class="col-md-12" style="text-align-right"> <br>
            <a data-toggle="tooltip" onclick="showmodal('approve_divisional_article')" onmousedown="setDivision('MIDSTREAM')" style="color:#fff; font-size: 12px; margin-left: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right no-print" data-original-title="Approve All Articles for Midstream"> <i class="fa fa-check"></i> Approve Midstream Article </a>

            <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('MIDSTREAM')" style="color:#fff; font-size: 12px" class="btn btn-danger btn-sm pull-right no-print" data-original-title="Reject Article"> <i class="fa fa-ban"></i> Reject Midstream Article </a>
        </div> </div>

@endif








{{-- DOWNSTREAM --}}



<p style="margin-bottom: 650px !important"></p>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 63) == 0) display: none; @endif">  <br> <br>  <br>

    @include('publication.partials.tablehead',['t_id'=>63,'yrs'=>$yrs, 'remark'=>' Refinery Performance'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Month</th>
                <th style="background: #A3C1AD!important;">Product</th>
                @if($ref_perf)
                    @foreach($ref_perf as $ref_perfs)
                        <th style="background: #A3C1AD!important;">{{$ref_perfs->plant_location_name}}</th>
                    @endforeach
                @endif
                <th style="background: #A3C1AD!important;">Total, Ltrs</th>
                {{-- <th style="background: #A3C1AD!important;">Total, MT</th> --}}
            </tr>

            <tbody>
            <!-- JANUARY -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_jan1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'january');
                            $ref_jan2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'january');
                            $ref_jan3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'january');
                            $ref_jan4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'january');
                            $ref_jan5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'january');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> January</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jan1, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jan2, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jan3, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jan4, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jan5, 2)}}
                        </th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jan1 + $ref_jan2 + $ref_jan3 + $ref_jan4 + $ref_jan5, 2)}}
                        </th>
                        {{-- <th class="th_h" @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_jan1 + $ref_jan2 + $ref_jan3 + $ref_jan4 + $ref_jan5 ) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- FEBRUARY --> @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_feb1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'febuary');
                            $ref_feb2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'febuary');
                            $ref_feb3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'febuary');
                            $ref_feb4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'febuary');
                            $ref_feb5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'febuary');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important"> February</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_feb1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_feb2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_feb3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_feb4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_feb5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_feb1 + $ref_feb2 + $ref_feb3 + $ref_feb4 + $ref_feb5, 2)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_feb1 + $ref_feb2 + $ref_feb3 + $ref_feb4 + $ref_feb5 ) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- MARCH -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_mar1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'march');
                            $ref_mar2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'march');
                            $ref_mar3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'march');
                            $ref_mar4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'march');
                            $ref_mar5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'march');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> March</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_mar1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_mar2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_mar3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_mar4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_mar5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_mar1 + $ref_mar2 + $ref_mar3 + $ref_mar4 + $ref_mar5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_mar1 + $ref_mar2 + $ref_mar3 + $ref_mar4 + $ref_mar5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>
            <!-- April -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_apr1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'april');
                            $ref_apr2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'april');
                            $ref_apr3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'april');
                            $ref_apr4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'april');
                            $ref_apr5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'april');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> April</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_apr1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_apr2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_apr3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_apr4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_apr5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_apr1 + $ref_apr2 + $ref_apr3 + $ref_apr4 + $ref_apr5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_apr1 + $ref_apr2 + $ref_apr3 + $ref_apr4 + $ref_apr5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- May -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_may1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'may');
                            $ref_may2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'may');
                            $ref_may3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'may');
                            $ref_may4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'may');
                            $ref_may5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'may');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> May</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_may1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_may2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_may3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_may4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_may5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_may1 + $ref_may2 + $ref_may3 + $ref_may4 + $ref_may5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_may1 + $ref_may2 + $ref_may3 + $ref_may4 + $ref_may5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- June -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_jun1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'june');
                            $ref_jun2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'june');
                            $ref_jun3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'june');
                            $ref_jun4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'june');
                            $ref_jun5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'june');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> June</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jun1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jun2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jun3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jun4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jun5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jun1 + $ref_jun2 + $ref_jun3 + $ref_jun4 + $ref_jun5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_jun1 + $ref_jun2 + $ref_jun3 + $ref_jun4 + $ref_jun5) * $conv, 0)}}
                        </th> --}}
                    </tr> @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- July -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_jul1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'july');
                            $ref_jul2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'july');
                            $ref_jul3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'july');
                            $ref_jul4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'july');
                            $ref_jul5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'july');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> July</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jul1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jul2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jul3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jul4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jul5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_jul1 + $ref_jul2 + $ref_jul3 + $ref_jul4 + $ref_jul5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_jul1 + $ref_jul2 + $ref_jul3 + $ref_jul4 + $ref_jul5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- August -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_aug1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'august');
                            $ref_aug2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'august');
                            $ref_aug3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'august');
                            $ref_aug4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'august');
                            $ref_aug5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'august');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> August</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_aug1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_aug2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_aug3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_aug4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_aug5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_aug1 + $ref_aug2 + $ref_aug3 + $ref_aug4 + $ref_aug5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_aug1 + $ref_aug2 + $ref_aug3 + $ref_aug4 + $ref_aug5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- September -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_sep1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'september');
                            $ref_sep2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'september');
                            $ref_sep3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'september');
                            $ref_sep4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'september');
                            $ref_sep5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'september');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> September</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_sep1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_sep2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_sep3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_sep4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_sep5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_sep1 + $ref_sep2 + $ref_sep3 + $ref_sep4 + $ref_sep5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_sep1 + $ref_sep2 + $ref_sep3 + $ref_sep4 + $ref_sep5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- October -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_oct1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'october');
                            $ref_oct2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'october');
                            $ref_oct3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'october');
                            $ref_oct4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'october');
                            $ref_oct5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'october');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> October</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_oct1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_oct2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_oct3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_oct4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_oct5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_oct1 + $ref_oct2 + $ref_oct3 + $ref_oct4 + $ref_oct5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_oct1 + $ref_oct2 + $ref_oct3 + $ref_oct4 + $ref_oct5) * $conv, 0)}}
                        </th> --}}
                    </tr> @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- November -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_nov1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'november');
                            $ref_nov2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'november');
                            $ref_nov3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'november');
                            $ref_nov4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'november');
                            $ref_nov5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'november');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> November</th>
                        @endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_nov1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_nov2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_nov3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_nov4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_nov5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_nov1 + $ref_nov2 + $ref_nov3 + $ref_nov4 + $ref_nov5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_nov1 + $ref_nov2 + $ref_nov3 + $ref_nov4 + $ref_nov5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- December -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_dec1 = $controllerName->refProductTotal($yrs, $imp_product->id, 1, 'december');
                            $ref_dec2 = $controllerName->refProductTotal($yrs, $imp_product->id, 2, 'december');
                            $ref_dec3 = $controllerName->refProductTotal($yrs, $imp_product->id, 3, 'december');
                            $ref_dec4 = $controllerName->refProductTotal($yrs, $imp_product->id, 4, 'december');
                            $ref_dec5 = $controllerName->refProductTotal($yrs, $imp_product->id, 5, 'december');

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #ACE1AF!important;"> December</th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_dec1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_dec2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_dec3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_dec4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_dec5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ref_dec1 + $ref_dec2 + $ref_dec3 + $ref_dec4 + $ref_dec5, 0)}}
                        </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ($ref_dec1 + $ref_dec2 + $ref_dec3 + $ref_dec4 + $ref_dec5) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="9"></td>
            </tr>

            <!-- TOTAL -->  @php $i=1; @endphp
            @if($imp_products)
                @foreach($imp_products as $key => $imp_product)
                    <tr>
                        @php
                            $ref_1 = $controllerName->refProductYearTotal($yrs, $imp_product->id, 1);
                            $ref_2 = $controllerName->refProductYearTotal($yrs, $imp_product->id, 2);
                            $ref_3 = $controllerName->refProductYearTotal($yrs, $imp_product->id, 3);
                            $ref_4 = $controllerName->refProductYearTotal($yrs, $imp_product->id, 4);
                            $ref_5 = $controllerName->refProductYearTotal($yrs, $imp_product->id, 5);

                            if($imp_product->id == '1'){ $conv = 1341; }
                            else if($imp_product->id == '2'){ $conv = 1164; }
                            else if($imp_product->id == '3'){ $conv = 1164; }
                            else if($imp_product->id == '5'){ $conv = 1754.389; }
                            else if($imp_product->id == '6'){ $conv = 1050; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="5" style="border: thin solid #A3C1AD; background: #A3C1AD!important;"><b class="bfont-size"> Total</b></th>@endif
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{$imp_product->product_name}}</b></th>
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{number_format($ref_1, 2)}}</b></th>
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{number_format($ref_2, 2)}}</b></th>
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{number_format($ref_3, 2)}}</b></th>
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{number_format($ref_4, 2)}}</b></th>
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{number_format($ref_5, 2)}}</b></th>
                        <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                                {{number_format($ref_1 + $ref_2 + $ref_3 + $ref_4 + $ref_5, 0)}}
                            </b></th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #A3C1AD!important;" @endif><b class="bfont-size">
                           {{number_format( ($ref_1 + $ref_2 + $ref_3 + $ref_4 + $ref_5) * $conv, 0)}}
                       </b></th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_63">
        @if($controllerName->bottomRemarks(63, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(63, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(63, $yrs)) {!! $controllerName->bottomRemarksTemp(63, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<p style="margin-bottom: 230px !important"></p>


<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 64) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>64,'yrs'=>$yrs, 'remark'=>' Summary of Refinery Production Volumes'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Product</th>
                @if($ref_perf)
                    @foreach($ref_perf as $ref_perfs)
                        <th style="background: #A3C1AD!important;">{{$ref_perfs->plant_location_name}}</th>
                    @endforeach
                @endif
                <th style="background: #A3C1AD!important;">Total, Ltrs</th>
                {{-- <th style="background: #A3C1AD!important;">Total, MT</th> --}}
            </tr>


            <tbody>  @php $i=1; @endphp
            @php $i=1;  @endphp
            @forelse($array_year_10 as $k => $year)
                @forelse($imp_products as $key => $imp_product)
                    @php
                        $ref_1 = $controllerName->refProductYearTotal(($year), $imp_product->id, 1);
                        $ref_2 = $controllerName->refProductYearTotal(($year), $imp_product->id, 2);
                        $ref_3 = $controllerName->refProductYearTotal(($year), $imp_product->id, 3);
                        $ref_4 = $controllerName->refProductYearTotal(($year), $imp_product->id, 4);
                        $ref_5 = $controllerName->refProductYearTotal(($year), $imp_product->id, 5);
                        $tot_prod_vol = $ref_1 + $ref_2 + $ref_3 + $ref_4 + $ref_5;
                        if($imp_product->id == '1'){ $conv = 1341; }  else if($imp_product->id == '2'){ $conv = 1164; }
                        else if($imp_product->id == '3'){ $conv = 1164; } else if($imp_product->id == '5'){ $conv = 1754.389; }
                        else if($imp_product->id == '6'){ $conv = 1050; }
                    @endphp
                    {{-- @if($tot_prod_vol != 0) --}}
                    <tr>

                        <th rowspan="1" style="border: thin solid #A3C1AD; background: #ACE1AF!important;">@if($key == 0) {{$year}} @endif
                        </th>

                        {{-- <th class="th_h" style="background: #ACE1AF!important;"> {{$year}}</th>  --}}
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{$imp_product->product_name}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{number_format($ref_1, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{number_format($ref_2, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{number_format($ref_3, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{number_format($ref_4, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{number_format($ref_5, 2)}}</th>
                        <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif> {{number_format($tot_prod_vol, 2)}} </th>
                        {{-- <th class="th_h"  @if(even($i) != true) style="background: #ACE1AF!important;" @endif>
                            {{number_format( ( $tot_prod_vol) * $conv, 0)}}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                    {{-- @endif --}}
                @empty
                    <tr>   <td colspan="9"></td>  </tr>
                @endforelse

            @empty
            @endforelse


            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_64">
        @if($controllerName->bottomRemarks(64, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(64, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(64, $yrs)) {!! $controllerName->bottomRemarksTemp(64, $yrs)->remark !!}
        @endif
    </div>


</div>  </div>



{{-- <p style="margin-bottom: 10px !important"></p> --}}


<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 65) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>65,'yrs'=>$yrs, 'remark'=>' Monthly Petroleum Product Volumes'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;"> Months</th>
                @if($import_permit_tot)
                    @foreach($import_permit_tot as $import_permit_total)
                        <th style="background: #A3C1AD!important;"> @if($import_permit_total->product) {{$import_permit_total->product->product_name}} @endif </th>
                    @endforeach
                @endif
            </tr>

            <tbody>
            @if($month_arr) @php $i=1; @endphp
            @foreach($month_arr as $month)
                <tr class="">
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$month}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_pms += $p_pms = $controllerName->productImportMonthly($yrs, '1', $month); @endphp
                        {{number_format($p_pms, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_ago += $p_ago = $controllerName->productImportMonthly($yrs, '2', $month); @endphp
                        {{number_format($p_ago, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_dpk += $p_dpk = $controllerName->productImportMonthly($yrs, '3', $month); @endphp
                        {{number_format($p_dpk, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_atk += $p_atk = $controllerName->productImportMonthly($yrs, '4', $month); @endphp
                        {{number_format($p_atk, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_lpf += $p_lpf = $controllerName->productImportMonthly($yrs, '6', $month); @endphp
                        {{number_format($p_lpf, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_bas += $p_bas = $controllerName->productImportMonthly($yrs, '7', $month); @endphp
                        {{number_format($p_bas, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php $t_bit += $p_bit = $controllerName->productImportMonthly($yrs, '8', $month); @endphp
                        {{number_format($p_bit, 2)}} </th>
                </tr>  @php $i++; @endphp
            @endforeach
            @endif
            <tr class="">
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_pms, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_ago, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_dpk, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_atk, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_lpf, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_bas, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($t_bit, 2)}} </b></th>
                @php
                    $prod_import_arr = ['PMS' => $t_pms, 'AGO' => $t_ago, 'DPK' => $t_dpk, 'ATK' => $t_atk, 'LPFO' => $t_lpf, 'Base Oil' => $t_bas, 'Bitumen' => $t_bit];
                    $prod_import_legend = ['PMS' => 'PMS', 'AGO' => 'AGO', 'DPK' => 'DPK', 'ATK' => 'ATK', 'LPFO' => 'LPFO', 'Base Oil' => 'Base Oil', 'Bitumen' => 'Bitumen'];
                @endphp
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_65">
        @if($controllerName->bottomRemarks(65, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(65, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(65, $yrs)) {!! $controllerName->bottomRemarksTemp(65, $yrs)->remark !!}
        @endif
    </div>


</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 66) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>66,'yrs'=>$yrs, 'remark'=>' Yearly Petroleum Product Volumes'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;"> Years</th>
                @if($import_permit_tot)
                    @foreach($import_permit_tot as $import_permit_tot)
                        <th style="background: #A3C1AD!important;"> @if($import_permit_tot->product) {{$import_permit_tot->product->product_name}} @endif </th>
                    @endforeach
                @endif
            </tr>

            <tbody>
            <tr class="">
                <th> {{$yrs - 4}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 1), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 2), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 3), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 4), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 6), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 7), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 4, 8), 2)}} </th>
            </tr>
            <tr class="">
                <th style="background: #ACE1AF!important;"> {{$yrs - 3}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 1), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 2), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 3), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 4), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 6), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 7), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 3, 8), 2)}} </th>
            </tr>
            <tr class="">
                <th> {{$yrs - 2}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 1), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 2), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 3), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 4), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 6), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 7), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 2, 8), 2)}} </th>
            </tr>
            <tr class="">
                <th style="background: #ACE1AF!important;"> {{$yrs - 1}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 1), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 2), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 3), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 4), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 6), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 7), 2)}} </th>
                <th style="background: #ACE1AF!important;"> {{number_format($controllerName->productImportYearly($yrs - 1, 8), 2)}} </th>
            </tr>
            <tr class="">
                <th> {{$yrs - 0}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 1), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 2), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 3), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 4), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 6), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 7), 2)}} </th>
                <th> {{number_format($controllerName->productImportYearly($yrs - 0, 8), 2)}} </th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_66">
        @if($controllerName->bottomRemarks(66, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(66, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(66, $yrs)) {!! $controllerName->bottomRemarksTemp(66, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; margin-top: -100px !important; @if($controllerName->showHideTable($yrs, 67) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>67,'yrs'=>$yrs, 'remark'=>' Approved Product Import (By Import Permits)'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="width: 5%; background: #A3C1AD!important"> Products</th>
                <th style="width: 25%; text-align: center; border:thin solid #FFF; background: #A3C1AD!important" colspan="3"> MAJORS (MT)</th>
                <th style="width: 25%; text-align: center; border:thin solid #FFF; background: #A3C1AD!important" colspan="3"> DAPPMA (MT)</th>
                <th style="width: 25%; text-align: center; border:thin solid #FFF; background: #A3C1AD!important" colspan="3"> TRADERS (MT)</th>
                <th style="width: 20%; text-align: center; border:thin solid #FFF; background: #A3C1AD!important" colspan="2"> Total (MT)</th>
            </tr>
            <tr class="th_head">
                <th style="background: #A3C1AD!important"></th>
                <th style="background: #A3C1AD!important"> {{$yrs - 1}} </th>
                <th style="background: #A3C1AD!important"> {{$yrs - 0}} </th>
                <th style="background: #A3C1AD!important"> % Diff</th>
                <th style="background: #A3C1AD!important"> {{$yrs - 1}} </th>
                <th style="background: #A3C1AD!important"> {{$yrs - 0}} </th>
                <th style="background: #A3C1AD!important"> % Diff</th>
                <th style="background: #A3C1AD!important"> {{$yrs - 1}} </th>
                <th style="background: #A3C1AD!important"> {{$yrs - 0}} </th>
                <th style="background: #A3C1AD!important"> % Diff</th>
                <th style="background: #A3C1AD!important"> {{$yrs - 1}} </th>
                <th style="background: #A3C1AD!important"> {{$yrs - 0}} </th>
            </tr>

            <tbody>
            @php
                $major1 = 0; $major2 = 0; $ave_maj = 0; $diff_maj = 0;
                $ind1= 0;    $ind2 = 0; $ave_ind = 0; $diff_ind = 0;
                $nnpc1 = 0; $nnpc2 = 0; $ave_nnp = 0; $diff_nnp = 0;

                $major1_arr = 0; $ind1_arr = 0; $nnp1_arr = 0;
                $major2_arr = 0; $ind2_arr = 0; $nnp2_arr = 0;
                $diff_maj1_arr = 0; $diff_ind1_arr = 0; $diff_nnp1_arr = 0;
                $diff_maj2_arr = 0; $diff_ind2_arr = 0; $diff_nnp2_arr = 0;     $i=1;
            @endphp

            @forelse($down_products as $product)
                @php  $prod_diff = $controllerName->productImportYrDiff($yrs - 1, $product->id, 2);  @endphp
                {{-- @if($prod_diff) --}}
                <tr class="">

                    @php
                        $major1 = $controllerName->productImportYrDiff($yrs - 1, $product->id, 2);
                        $major2 = $controllerName->productImportYrDiff($yrs - 0, $product->id, 2);
                        $ave_maj = ($major2 - $major1);

                        $ind1 = $controllerName->productImportYrDiff($yrs - 1, $product->id, 3);
                        $ind2 = $controllerName->productImportYrDiff($yrs - 0, $product->id, 3);
                        $ave_ind = ($ind2 - $ind1);

                        $nnp1 = $controllerName->productImportYrDiff($yrs - 1, $product->id, 1);
                        $nnp1=$nnp1>0 ? $nnp1 : 0;
                        $nnp2 = $controllerName->productImportYrDiff($yrs - 0, $product->id, 1);
                        $ave_nnp = ($nnp2 - $nnp1);

                    @endphp

                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$product->product_name}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($major1, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($major2, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php
                            if($ave_maj == 0){ echo '0'; }
                            else
                            { $diff_maj = (($ave_maj / $major1) * 100); echo number_format($diff_maj, 0); }
                            $major1_arr += $major1;    $major2_arr += $major2;    $diff_maj1_arr += $diff_maj;
                        @endphp
                    </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($ind1, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($ind2, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php
                            if($ave_ind == 0){ echo '0'; }
                            else{ $diff_ind = (($ave_ind / $ind1) * 100);  echo number_format($diff_ind, 0); }
                            $ind1_arr += $ind1;    $ind2_arr += $ind2;    $diff_ind1_arr += $diff_ind;
                        @endphp
                    </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($nnp1, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($nnp2, 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @php
                            if($ave_nnp == 0){ echo '0'; }
                            else
                            { $diff_nnp = (($ave_nnp / $nnp1) * 100);  echo number_format($diff_nnp, 0); }
                            $nnp1_arr += $nnp1;    $nnp2_arr += $nnp2;    $diff_nnp1_arr += $diff_nnp;
                        @endphp
                    </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(($major1 + $ind1 + $nnp1), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(($major2 + $ind2 + $nnp2), 2)}} </th>
                </tr> @php $i++; @endphp
                {{-- @endif --}}
            @empty
            @endforelse
            <tr>
                <th style="font-size: 15px; background: #A3C1AD!important"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($major1_arr, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($major2_arr, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($diff_maj1_arr, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($ind1_arr, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($ind2_arr, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($diff_ind1_arr, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($nnp1_arr, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($nnp2_arr, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($diff_nnp1_arr, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($major1_arr + $ind1_arr + $nnp1_arr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($major2_arr + $ind2_arr + $nnp2_arr), 2)}} </b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_67">
        @if($controllerName->bottomRemarks(67, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(67, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(67, $yrs)) {!! $controllerName->bottomRemarksTemp(67, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 68) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>68,'yrs'=>$yrs, 'remark'=>' Petroleum Products Importation by Market Segment'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;"> Months</th>
                @if($import_prod_seg)
                    @foreach($import_prod_seg as $import_prod_segs)
                        <th style="background: #A3C1AD!important;"> {{$import_prod_segs->product_name}} </th>
                    @endforeach
                @endif
            </tr>
            <tr>
                <td colspan="9" style="text-align: center; background: #A3C1AD!important"><b class="bfont-size"> NNPC, Litres </b></td>
            </tr>

            @php
                $i=1; $pms_ltr_tot = 0; $ago_ltr_tot = 0; $dpk_ltr_tot = 0; $atk_ltr_tot = 0; $lpg_ltr_tot = 0; $fuel_ltr_tot = 0; $base_ltr_tot = 0; $bit_ltr_tot = 0;
            @endphp

            @if($month_arr)
                @foreach($month_arr as $month_array)
                    <tr class="">
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$month_array}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php
                                $pms_ltr_tot +=  $pms_ltr = $controllerName->importMarketSeg($yrs, 1, 6, $month_array);
                                $ago_ltr_tot +=  $ago_ltr = $controllerName->importMarketSeg($yrs, 2, 6, $month_array);
                                $dpk_ltr_tot +=  $dpk_ltr = $controllerName->importMarketSeg($yrs, 3, 6, $month_array);
                                $atk_ltr_tot +=  $atk_ltr = $controllerName->importMarketSeg($yrs, 4, 6, $month_array);
                                $lpg_ltr_tot +=  $lpg_ltr = $controllerName->importMarketSeg($yrs, 5, 6, $month_array);
                                $fuel_ltr_tot +=  $fuel_ltr = $controllerName->importMarketSeg($yrs, 6, 6, $month_array);
                                $base_ltr_tot +=  $base_ltr = $controllerName->importMarketSeg($yrs, 7, 6, $month_array);
                                $bit_ltr_tot +=  $bit_ltr = $controllerName->importMarketSeg($yrs, 8, 6, $month_array);
                            @endphp
                            {{number_format($pms_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ago_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($dpk_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($atk_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($lpg_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($fuel_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($base_ltr, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($bit_ltr, 2)}} </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $pms_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $ago_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $dpk_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $atk_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $lpg_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $fuel_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $base_ltr_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $bit_ltr_tot, 2)}} </b></th>
            </tr>
            <tbody>
            @php
                $i=1; $pms_ltr_mm_tot = 0; $ago_ltr_mm_tot = 0; $dpk_ltr_mm_tot = 0; $atk_ltr_mm_tot = 0; $lpg_ltr_mm_tot = 0; $fuel_ltr_mm_tot = 0; $base_ltr_mm_tot = 0; $bit_ltr_mm_tot = 0;
            @endphp

            <tr>
                <td colspan="9" style="text-align: center; background: #A3C1AD!important"><b class="bfont-size"> Major Marketers, Litres</b></td>
            </tr>  @php $i=1; @endphp
            @if($month_arr)
                @foreach($month_arr as $month_array)
                    <tr class="">
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$month_array}} </th>
                        @php
                            $pms_ltr_mm_tot +=  $pms_ltr_mm = $controllerName->importMarketSeg($yrs, 1, 2, $month_array);
                            $ago_ltr_mm_tot +=  $ago_ltr_mm = $controllerName->importMarketSeg($yrs, 2, 2, $month_array);
                            $dpk_ltr_mm_tot +=  $dpk_ltr_mm = $controllerName->importMarketSeg($yrs, 3, 2, $month_array);
                            $atk_ltr_mm_tot +=  $atk_ltr_mm = $controllerName->importMarketSeg($yrs, 4, 2, $month_array);
                            $lpg_ltr_mm_tot +=  $lpg_ltr_mm = $controllerName->importMarketSeg($yrs, 5, 2, $month_array);
                            $fuel_ltr_mm_tot +=  $fuel_ltr_mm = $controllerName->importMarketSeg($yrs, 6, 2, $month_array);
                            $base_ltr_mm_tot +=  $base_ltr_mm = $controllerName->importMarketSeg($yrs, 7, 2, $month_array);
                            $bit_ltr_mm_tot +=  $bit_ltr_mm = $controllerName->importMarketSeg($yrs, 8, 2, $month_array);
                        @endphp
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($pms_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ago_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($dpk_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($atk_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($lpg_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($fuel_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($base_ltr_mm, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($bit_ltr_mm, 2)}} </th>
                    </tr> @php $i++; @endphp
                @endforeach
            @endif
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $pms_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $ago_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $dpk_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $atk_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $lpg_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $fuel_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $base_ltr_mm_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $bit_ltr_mm_tot, 2)}} </b></th>
            </tr>
            @php
                $i=1; $pms_ltr_im_tot = 0; $ago_ltr_im_tot = 0; $dpk_ltr_im_tot = 0; $atk_ltr_im_tot = 0; $lpg_ltr_im_tot = 0; $fuel_ltr_im_tot = 0; $base_ltr_im_tot = 0; $bit_ltr_im_tot = 0;
            @endphp
            <tr>
                <td colspan="9" style="text-align: center; background: #A3C1AD!important"><b class="bfont-size"> Independent Marketers, Litres</b></td>
            </tr>  @php $i=1; @endphp
            @if($month_arr)
                @foreach($month_arr as $month_array)
                    <tr class="">
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$month_array}} </th>
                        @php
                            $pms_ltr_im_tot +=  $pms_ltr_im = $controllerName->importMarketSeg($yrs, 1, 3, $month_array);
                            $ago_ltr_im_tot +=  $ago_ltr_im = $controllerName->importMarketSeg($yrs, 2, 3, $month_array);
                            $dpk_ltr_im_tot +=  $dpk_ltr_im = $controllerName->importMarketSeg($yrs, 3, 3, $month_array);
                            $atk_ltr_im_tot +=  $atk_ltr_im = $controllerName->importMarketSeg($yrs, 4, 3, $month_array);
                            $lpg_ltr_im_tot +=  $lpg_ltr_im = $controllerName->importMarketSeg($yrs, 5, 3, $month_array);
                            $fuel_ltr_im_tot +=  $fuel_ltr_im = $controllerName->importMarketSeg($yrs, 6, 3, $month_array);
                            $base_ltr_im_tot +=  $base_ltr_im = $controllerName->importMarketSeg($yrs, 7, 3, $month_array);
                            $bit_ltr_im_tot +=  $bit_ltr_im = $controllerName->importMarketSeg($yrs, 8, 3, $month_array);
                        @endphp
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($pms_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ago_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($dpk_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($atk_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($lpg_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($fuel_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($base_ltr_im, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($bit_ltr_im, 2)}} </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $pms_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $ago_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $dpk_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $atk_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $lpg_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $fuel_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $base_ltr_im_tot, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">
                        {{number_format( $bit_ltr_im_tot, 2)}} </b></th>
            </tr>

            </tbody>

            <tr>
                <td colspan="9" style="text-align: center; background: #A3C1AD !important;"><b class="bfont-size"> Total, Litres </b></td>
                @php $pms = '0'; $ago = '0'; $dpk = '0'; $atk = '0'; $lpg = '0'; $lpf = '0'; $bas = '0'; $bit = '0';   @endphp
            </tr>  @php $i=1; @endphp
            @if($month_arr)
                @foreach($month_arr as $month_array)
                    <tr class="">
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$month_array}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $pms += $p_pms = ($controllerName->importMarketMonthTot($yrs, 1, $month_array)) @endphp
                            {{number_format($p_pms, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $ago += $p_ago = ($controllerName->importMarketMonthTot($yrs, 2, $month_array)) @endphp
                            {{number_format($p_ago, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $dpk += $p_dpk = ($controllerName->importMarketMonthTot($yrs, 3, $month_array)) @endphp
                            {{number_format($p_dpk, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $atk += $p_atk = ($controllerName->importMarketMonthTot($yrs, 4, $month_array)) @endphp
                            {{number_format($p_atk, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $lpg += $p_lpg = ($controllerName->importMarketMonthTot($yrs, 5, $month_array)) @endphp
                            {{number_format($p_lpg, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $lpf += $p_lpf = ($controllerName->importMarketMonthTot($yrs, 6, $month_array)) @endphp
                            {{number_format($p_lpf, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $bas += $p_bas = ($controllerName->importMarketMonthTot($yrs, 7, $month_array)) @endphp
                            {{number_format($p_bas, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            @php $bit += $p_bit = ($controllerName->importMarketMonthTot($yrs, 8, $month_array)) @endphp
                            {{number_format($p_bit, 2)}} </th>
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($pms, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($ago, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($dpk, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($atk, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($lpg, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($lpf, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($bas, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($bit, 2)}} </b></th>
            </tr>


            <tr>
                <td colspan="9" style="text-align: center; background: #A3C1AD!important"><b class="bfont-size"> Average Daily Import, Litres</b></td>
            </tr>


            @if($month_arr)  @php $i=1; @endphp
            @foreach($month_arr as $month_array)
                @php
                    $days_in_month = cal_days_in_month(CAL_GREGORIAN, key($month_arr), $yrs);
                @endphp
                <tr class="">
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$month_array}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 1, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 2, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 3, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 4, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 5, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 6, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 7, $month_array)) / $days_in_month), 2)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format(( ($controllerName->importMarketMonthTot($yrs, 8, $month_array)) / $days_in_month), 2)}} </th>
                </tr>  @php $i++; @endphp
            @endforeach
            @endif
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($pms / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($ago / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($dpk / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($atk / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($lpg / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($lpf / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($bas / $yr), 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($bit / $yr), 2)}} </b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_68">
        @if($controllerName->bottomRemarks(68, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(68, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(68, $yrs)) {!! $controllerName->bottomRemarksTemp(68, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 69) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>69,'yrs'=>$yrs, 'remark'=>' Petroleum Products Importation by Market Segment'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                @php $pms = '0'; $ago = '0'; $dpk = '0'; $atk = '0'; $lpg = '0'; $lpf = '0'; $bas = '0'; $bit = '0';   @endphp
                <th style="background: #A3C1AD!important;"> Market Segment</th>
                <th style="background: #A3C1AD!important;"> Product</th>
                @if($array_year)
                    @foreach($array_year as $array_years)
                        <th style="background: #A3C1AD!important;"> {{$array_years}} </th>
                    @endforeach
                @endif
                {{-- <th style="background: #A3C1AD!important;"> Total</th> --}}
            </tr>

            <!-- NNPC -->
            @if($import_prod_seg)  @php $i=1; @endphp
            @foreach($import_prod_seg as $key => $product)
                <tr class="th_h">
                    @php
                        if($product->id == 1){ $conv = 1341; }
                        else if($product->id == 2){ $conv = 1164; }
                        else if($product->id == 3){ $conv = 1164; }
                        else if($product->id == 4){ $conv = 1232; }
                        else if($product->id == 5){ $conv = 1754.389; }
                        else if($product->id == 6){ $conv = 1050; }
                        else if($product->id == 7){ $conv = 1067; }
                        else if($product->id == 8){ $conv = 961.9992; }

                        $yr_9 = ($controllerName->importMarketSegTot($yrs - 9, $product->id, 6) );
                        $yr_8 = ($controllerName->importMarketSegTot($yrs - 8, $product->id, 6) );
                        $yr_7 = ($controllerName->importMarketSegTot($yrs - 7, $product->id, 6) );
                        $yr_6 = ($controllerName->importMarketSegTot($yrs - 6, $product->id, 6) );
                        $yr_5 = ($controllerName->importMarketSegTot($yrs - 5, $product->id, 6) );
                        $yr_4 = ($controllerName->importMarketSegTot($yrs - 4, $product->id, 6) );
                        $yr_3 = ($controllerName->importMarketSegTot($yrs - 3, $product->id, 6) );
                        $yr_2 = ($controllerName->importMarketSegTot($yrs - 2, $product->id, 6) );
                        $yr_1 = ($controllerName->importMarketSegTot($yrs - 1, $product->id, 6) );
                        $yr_0 = ($controllerName->importMarketSegTot($yrs - 0, $product->id, 6) * $conv);

                        if($product->id == 1){  $PMS_NN = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                        if($product->id == 2){  $AGO_NN = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                        if($product->id == 3){  $DPK_NN = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                        if($product->id == 4){  $ATK_NN = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                    @endphp
                    @if($key == 0)
                        <th rowspan="8" style="border: thin solid #fff; background: #ACE1AF!important"> NNPC</th>@endif
                    <th class="" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$product->product_name}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_9, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_8, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_7, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_6, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_5, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_4, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_3, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_2, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_1, 2)}} </th>
                    <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($yr_0, 2)}} </th>
                    {{-- <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{ number_format($yr_9 + $yr_8 + $yr_7 + $yr_6 + $yr_5 + $yr_4 + $yr_3 + $yr_2 + $yr_1 + $yr_0, 1) }}
                    </th> --}}
                </tr>  @php $i++; @endphp
            @endforeach
            @endif

            <!-- MAJOR MARKETER -->
            @if($import_prod_seg)
                @foreach($import_prod_seg as $key => $product)
                    <tr class="th_h">
                        @php
                            if($product->id == 1){ $conv = 1341; }
                            else if($product->id == 2){ $conv = 1164; }
                            else if($product->id == 3){ $conv = 1164; }
                            else if($product->id == 4){ $conv = 1232; }
                            else if($product->id == 5){ $conv = 1754.389; }
                            else if($product->id == 6){ $conv = 1050; }
                            else if($product->id == 7){ $conv = 1067; }
                            else if($product->id == 8){ $conv = 961.9992; }

                            $yr_9 = ($controllerName->importMarketSegTot($yrs - 9, $product->id, 2) );
                            $yr_8 = ($controllerName->importMarketSegTot($yrs - 8, $product->id, 2) );
                            $yr_7 = ($controllerName->importMarketSegTot($yrs - 7, $product->id, 2) );
                            $yr_6 = ($controllerName->importMarketSegTot($yrs - 6, $product->id, 2) );
                            $yr_5 = ($controllerName->importMarketSegTot($yrs - 5, $product->id, 2) );
                            $yr_4 = ($controllerName->importMarketSegTot($yrs - 4, $product->id, 2) );
                            $yr_3 = ($controllerName->importMarketSegTot($yrs - 3, $product->id, 2) );
                            $yr_2 = ($controllerName->importMarketSegTot($yrs - 2, $product->id, 2) );
                            $yr_1 = ($controllerName->importMarketSegTot($yrs - 1, $product->id, 2) );
                            $yr_0 = ($controllerName->importMarketSegTot($yrs - 0, $product->id, 2) * $conv);

                            if($product->id == 1){  $PMS_MJ = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                            if($product->id == 2){  $AGO_MJ = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                            if($product->id == 3){  $DPK_MJ = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                            if($product->id == 4){  $ATK_MJ = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="8" style="border: thin solid #fff; background: #ACE1AF!important"> Major Marketers</th>@endif
                        <th class="" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$product->product_name}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_9, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_8, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_7, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_6, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_5, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_4, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_3, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_2, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_1, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_0, 2)}} </th>
                        {{-- <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{ number_format($yr_9 + $yr_8 + $yr_7 + $yr_6 + $yr_5 + $yr_4 + $yr_3 + $yr_2 + $yr_1 + $yr_0, 1) }}
                        </th> --}}
                    </tr> @php $i++; @endphp
                @endforeach
            @endif

            <!-- INDEPENDENT MARKETERS --> @php $i=1; @endphp
            @if($import_prod_seg)
                @foreach($import_prod_seg as $key => $product)
                    <tr class="th_h">
                        @php
                            if($product->id == 1){ $conv = 1341; }
                            else if($product->id == 2){ $conv = 1164; }
                            else if($product->id == 3){ $conv = 1164; }
                            else if($product->id == 4){ $conv = 1232; }
                            else if($product->id == 5){ $conv = 1754.389; }
                            else if($product->id == 6){ $conv = 1050; }
                            else if($product->id == 7){ $conv = 1067; }
                            else if($product->id == 8){ $conv = 961.9992; }

                            $yr_9 = ($controllerName->importMarketSegTot($yrs - 9, $product->id, 3) );
                            $yr_8 = ($controllerName->importMarketSegTot($yrs - 8, $product->id, 3) );
                            $yr_7 = ($controllerName->importMarketSegTot($yrs - 7, $product->id, 3) );
                            $yr_6 = ($controllerName->importMarketSegTot($yrs - 6, $product->id, 3) );
                            $yr_5 = ($controllerName->importMarketSegTot($yrs - 5, $product->id, 3) );
                            $yr_4 = ($controllerName->importMarketSegTot($yrs - 4, $product->id, 3) );
                            $yr_3 = ($controllerName->importMarketSegTot($yrs - 3, $product->id, 3) );
                            $yr_2 = ($controllerName->importMarketSegTot($yrs - 2, $product->id, 3) );
                            $yr_1 = ($controllerName->importMarketSegTot($yrs - 1, $product->id, 3) );
                            $yr_0 = ($controllerName->importMarketSegTot($yrs - 0, $product->id, 3) * $conv);

                            if($product->id == 1){  $PMS_ID = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                            if($product->id == 2){  $AGO_ID = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                            if($product->id == 3){  $DPK_ID = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                            if($product->id == 4){  $ATK_ID = [$yr_8, $yr_7, $yr_6, $yr_5, $yr_4, $yr_3, $yr_2, $yr_1, $yr_0]; }
                        @endphp
                        @if($key == 0)
                            <th rowspan="8" style="border: thin solid #fff; background: #ACE1AF!important"> Independent</th>@endif
                        <th class="" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$product->product_name}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_9, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_8, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_7, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_6, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_5, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_4, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_3, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_2, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_1, 2)}} </th>
                        <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($yr_0, 2)}} </th>
                        {{-- <th class="f-11" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{ number_format($yr_9 + $yr_8 + $yr_7 + $yr_6 + $yr_5 + $yr_4 + $yr_3 + $yr_2 + $yr_1 + $yr_0, 1) }}
                        </th> --}}
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif

            <tbody>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_69">
        @if($controllerName->bottomRemarks(69, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(69, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(69, $yrs)) {!! $controllerName->bottomRemarksTemp(69, $yrs)->remark !!}
        @endif
    </div>
    <br>

    <div class="row">
        <div class="col-md-6 chart-pad">
            <i class="pull-right" style="font-size: 14px"> Petrol Importation by Market Segment (Million Ltrs) </i>
            <div class="frame" style="">
                <canvas id="pmsChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 chart-pad">
            <i class="pull-right" style="font-size: 14px"> Diesel Importation by Market Segment (Million Ltrs) </i>
            <div class="frame" style="">
                <canvas id="agoChart"></canvas>
            </div>
        </div>
        <br> <br>

        <div class="col-md-6 chart-pad">
            <i class="pull-right" style="font-size: 14px"> Kerosene Importation by Market Segment (Million Ltrs) </i>
            <div class="frame" style="">
                <canvas id="dpkChart"></canvas>
            </div>

            <div class="fig1_69 figure">
                @if($controllerName->getFigure(69, $yrs)) Figure {!! $controllerName->getFigure(69, $yrs)->figure_no_1 !!} :
                {!! $controllerName->getFigure(69, $yrs)->figure_title_1 !!}
                @elseif($controllerName->getFigure(69, $yrs-1)) Figure {!! $controllerName->getFigure(69, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(69, $yrs-1)->figure_title_1 !!}
                @endif
            </div>
        </div>
        <div class="col-md-6 chart-pad">
            <i class="pull-right" style="font-size: 14px"> Aviation Importation by Market Segment (Million Ltrs) </i>
            <div class="frame" style="">
                <canvas id="atkChart"></canvas>
            </div>
        </div>
    </div>
    <br>

</div>   </div>



{{-- NOTE TABLE 69 --}}

{{-- NOTE TABLE 69 --}}



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 70) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>70,'yrs'=>$yrs, 'remark'=>' Petroleum Products Import Summary, Litres'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                @php
                    $pms = '0'; $ago = '0'; $dpk = '0'; $atk = '0'; $lpg = '0'; $lpf = '0'; $bas = '0'; $bit = '0';
                @endphp
                <th style="background: #A3C1AD!important;"> Year</th>
                @if($import_prod_seg)
                    @foreach($import_prod_seg as $import_prod_segs)
                        <th style="background: #A3C1AD!important;"> {{$import_prod_segs->product_name}} </th>
                    @endforeach
                @endif
            </tr>

            <tbody>  @php $i=1; @endphp
            {{-- MANUALLING INPUTED FIGURES --}}

            {{-- MANUALLING INPUTED FIGURES --}}
            @php
                if($product->id == 1){ $conv = 1341; }
                else if($product->id == 2){ $conv = 1164; }
                else if($product->id == 3){ $conv = 1164; }
                else if($product->id == 4){ $conv = 1232; }
                else if($product->id == 5){ $conv = 1754.389; }
                else if($product->id == 6){ $conv = 1050; }
                else if($product->id == 7){ $conv = 1067; }
                else if($product->id == 8){ $conv = 961.9992; }
            @endphp

            @forelse($array_year as $array_years)
                @if($array_years >= 2019)
                    @php
                        $prod_1 = ($controllerName->importSummaryTot($array_years, 1) * 1341);
                        $prod_2 = ($controllerName->importSummaryTot($array_years, 2) * 1164);
                        $prod_3 = ($controllerName->importSummaryTot($array_years, 3) * 1164);
                        $prod_4 = ($controllerName->importSummaryTot($array_years, 4) * 1232);
                        $prod_5 = ($controllerName->importSummaryTot($array_years, 5) * 1754.389);
                        $prod_6 = ($controllerName->importSummaryTot($array_years, 6) * 1050);
                        $prod_7 = ($controllerName->importSummaryTot($array_years, 7) * 1067);
                        $prod_8 = ($controllerName->importSummaryTot($array_years, 8) * 961.9992);
                        $total = $prod_1 + $prod_2 + $prod_3 + $prod_4 + $prod_5 + $prod_6 + $prod_7 + $prod_8;
                    @endphp
                @else
                    @php
                        $prod_1 = ($controllerName->importSummaryTot($array_years, 1) * 1);
                        $prod_2 = ($controllerName->importSummaryTot($array_years, 2) * 1);
                        $prod_3 = ($controllerName->importSummaryTot($array_years, 3) * 1);
                        $prod_4 = ($controllerName->importSummaryTot($array_years, 4) * 1);
                        $prod_5 = ($controllerName->importSummaryTot($array_years, 5) * 1);
                        $prod_6 = ($controllerName->importSummaryTot($array_years, 6) * 1);
                        $prod_7 = ($controllerName->importSummaryTot($array_years, 7) * 1);
                        $prod_8 = ($controllerName->importSummaryTot($array_years, 8) * 1);
                        $total = $prod_1 + $prod_2 + $prod_3 + $prod_4 + $prod_5 + $prod_6 + $prod_7 + $prod_8;
                    @endphp
                @endif
                @if($total != 0)
                    <tr>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$array_years}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_1, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_2, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_3, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_4, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_5, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_6, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_7, 2)}} </th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{number_format($prod_8, 2)}} </th>
                    </tr>  @php $i++; @endphp
                @endif
            @empty
            @endforelse

            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_70">
        @if($controllerName->bottomRemarks(70, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(70, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(70, $yrs)) {!! $controllerName->bottomRemarksTemp(70, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 71) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>71,'yrs'=>$yrs, 'remark'=>' Number of Product Vessels'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                @php
                    $pms_ = '0'; $ago_ = '0'; $dpk_ = '0'; $atk_ = '0';
                    $pms = '0'; $ago = '0'; $dpk = '0'; $atk = '0';
                @endphp
                <th style="background: #A3C1AD!important;"> Field Office</th>
                <th style="background: #A3C1AD!important;"> PMS Import Vessels</th>
                <th style="background: #A3C1AD!important;"> DPK Import Vessels</th>
                <th style="background: #A3C1AD!important;"> AGO Import Vessels</th>
                <th style="background: #A3C1AD!important;"> ATK Import Vessels</th>
            </tr>

            <tbody>  @php $i=1; @endphp
            @foreach($f_offices as $office)
                <tr>
                    @php
                        $pms_ = $controllerName->ProductVessel($yrs, $office->id, 1, 'value');
                        $ago_ = $controllerName->ProductVessel($yrs, $office->id, 3, 'value');
                        $dpk_ = $controllerName->ProductVessel($yrs, $office->id, 2, 'value');
                        $atk_ = $controllerName->ProductVessel($yrs, $office->id, 4, 'value');

                        $pms += $pms_;    $ago += $ago_;    $dpk += $dpk_;    $atk += $atk_;
                    @endphp
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$office->field_office_name}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$pms_}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$ago_}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$dpk_}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif> {{$atk_}} </th>
                </tr>  @php $i++; @endphp
            @endforeach
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$pms}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$ago}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$dpk}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{$atk}} </b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_71">
        @if($controllerName->bottomRemarks(71, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(71, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(71, $yrs)) {!! $controllerName->bottomRemarksTemp(71, $yrs)->remark !!}
        @endif
    </div>

    <br> <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 chart-pad">
            {{-- <h5> 4.2.3 Petroleum Products Importation / Local Ptroduction</h5>   --}}
            <div class="frame" style="">
                <i class="pull-right" style="font-size: 13px"> Petrol Local Production vs Import (Million Ltrs) </i>
                <canvas id="pmsLocalImportChart"></canvas>
            </div>

            <div class="fig1_71 figure">
                @if($controllerName->getFigure(71, $yrs)) Figure {!! $controllerName->getFigure(71, $yrs)->figure_no_1 !!} :
                {!! $controllerName->getFigure(71, $yrs)->figure_title_1 !!}
                @elseif($controllerName->getFigure(71, $yrs-1)) Figure {!! $controllerName->getFigure(71, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(71, $yrs-1)->figure_title_1 !!}
                @endif
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2 chart-pad"><br> <br>
            <i class="pull-right" style="font-size: 13px"> Diesel Local Production vs Import (Million Ltrs) </i>
            <div class="frame" style="">
                <canvas id="agoLocalImportChart"></canvas>
            </div>

            <div class="fig2_71 figure">
                @if($controllerName->getFigure(71, $yrs)) Figure {!! $controllerName->getFigure(71, $yrs)->figure_no_2 !!} :
                {!! $controllerName->getFigure(71, $yrs)->figure_title_2 !!}
                @elseif($controllerName->getFigure(71, $yrs-1)) Figure {!! $controllerName->getFigure(71, $yrs-1)->figure_no_2 !!} : {!! $controllerName->getFigure(71, $yrs-1)->figure_title_2 !!}
                @endif
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2 chart-pad"><br> <br>
            <i class="pull-right" style="font-size: 13px"> Kerosene Local Production vs Import (Million Ltrs) </i>
            <div class="frame" style="">
                <canvas id="dpkLocalImportChart"></canvas>
            </div>

            <div class="fig2_71 figure">
                @if($controllerName->getFigure(71, $yrs)) Figure 30 : Kerosene Local Production vs Import (Million Litres)
                @elseif($controllerName->getFigure(71, $yrs-1)) Figure 30 : Kerosene Local Production vs Import (Million Litres)
                @endif
            </div>
        </div>
    </div>

</div>   </div>



{{-- TABLE 72 Retail Outlet Count By Products --}}




{{-- TABLE 72 Retail Outlet Count By Products --}}



@php
    $ct_pms = 0;   $ct_ago = 0;   $ct_dpk = 0;
    $count = 0;   $ind = 0;   $maj = 0;   $nnp = 0; $rt_state = $controllerName->retailCount($yrs, 2, 1) ;
    $ind_ = 0;   $maj_ = 0;   $nnp_ = 0;
@endphp


<p style="margin-bottom: 115px !important"></p>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 72) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>72,'yrs'=>$yrs, 'remark'=>' Retail Outlet Count'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">State</th>
                <th style="background: #A3C1AD!important;">Independent</th>
                <th style="background: #A3C1AD!important;">Major</th>
                <th style="background: #A3C1AD!important;">NNPC - Franchise & Mega</th>
                <th style="background: #A3C1AD!important;">Grand Total</th>
            </tr>


            <tbody>  @php $i=1; @endphp
            @if($state_array)
                @foreach($state_array as $state)
                    <tr>
                        @php
                            $ind_ = $controllerName->retailCount($yrs, $state->id, 3);
                            $maj_ = $controllerName->retailCount($yrs, $state->id, 2);
                            $nnp_1 = $controllerName->retailCount($yrs, $state->id, 1);
                            $nnp_4 = $controllerName->retailCount($yrs, $state->id, 4);
                            $nnp_5 = $controllerName->retailCount($yrs, $state->id, 5);
                            $nnp_ = ($nnp_1 + $nnp_4 + $nnp_5);
                        @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$state->state_name}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ind_, 0)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($maj_, 0)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($nnp_, 0)}} </th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{ number_format(($ind_ + $maj_ + $nnp_), 0)}}</th>
                    </tr>
                    @php
                        $count += $controllerName->retailCount($yrs, $state->id, 3);
                        $count += $controllerName->retailCount($yrs, $state->id, 2);
                        $count += $controllerName->retailCount($yrs, $state->id, 1);
                        $ind += $ind_;  $maj += $maj_;  $nnp += $nnp_;  $i++;
                    @endphp
                @endforeach
            @endif
            <tr>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($ind, 0)}} </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($maj, 0)}} </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($nnp, 0)}} </b></th>
                <th class="th_h" style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format(($ind + $maj + $nnp), 0)}} </b></th>

                @php
                    $retail_chart[1] = $ind;  $retail_chart[2] = $maj;  $retail_chart[3] = $nnp;
                @endphp
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_72">
        @if($controllerName->bottomRemarks(72, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(72, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(72, $yrs)) {!! $controllerName->bottomRemarksTemp(72, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 73) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>73,'yrs'=>$yrs, 'remark'=>' Petroluem Product Marketers Total Capacities'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                @php   @endphp
                <th style="background: #A3C1AD!important;"> Marketers</th>
                <th style="background: #A3C1AD!important;"> PMS</th>
                <th style="background: #A3C1AD!important;"> DPK</th>
                <th style="background: #A3C1AD!important;"> AGO</th>
            </tr>

            <tbody>
            @php
                $pms = 0; $pms_array[] = ''; $dpk = 0; $dpk_array[] = ''; $ago = 0; $ago_array[] = '';
                $tot_pms=0;   $tot_dpk=0;   $tot_ago=0;   $i=1;
            @endphp
            @forelse($m_segments as $k => $m_segment)
                @if($m_segment->id < 6)
                    <tr>
                        @php
                            $tot_pms += $pms_array[$k] = $pms = $controllerName->marketSegCapacity($yrs, $m_segment->id, 1);
                            $tot_dpk += $dpk_array[$k] = $dpk = $controllerName->marketSegCapacity($yrs, $m_segment->id, 3);
                            $tot_ago += $ago_array[$k] = $ago = $controllerName->marketSegCapacity($yrs, $m_segment->id, 2);

                            if($m_segment->id == 1){ $nnpc_tot[$k] = $pms + $dpk + $ago; }
                            elseif($m_segment->id == 2){ $maj_pms_tot[$k] =  $pms; $maj_dpk_tot[$k] =  $dpk; $maj_ago_tot[$k] =  $ago; }
                            elseif($m_segment->id == 3){ $inde_pms_tot[$k] = $pms; $inde_dpk_tot[$k] = $dpk; $inde_ago_tot[$k] = $ago; }
                            elseif($m_segment->id == 4){ $mega_pms_tot[$k] = $pms; $mega_dpk_tot[$k] = $dpk; $mega_ago_tot[$k] = $ago; }
                            elseif($m_segment->id == 5){ $fran_pms_tot[$k] = $pms; $fran_dpk_tot[$k] = $dpk; $fran_ago_tot[$k] = $ago; }
                        @endphp
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$m_segment->market_segment_name}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($pms, 2)}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($dpk, 2)}}</th>
                        <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{number_format($ago, 2)}}</th>
                    </tr>
                @endif   @php $i++;  @endphp
            @empty
            @endforelse
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_pms, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_dpk, 2)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($tot_ago, 2)}} </b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_73">
        <i> All Volumes are in Litres </i>

        @if($controllerName->bottomRemarks(73, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(73, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(73, $yrs)) {!! $controllerName->bottomRemarksTemp(73, $yrs)->remark !!}
        @endif
    </div>


    <div class="row" style="padding:0px">
        <div class="col-md-3 chart-pad">
            <div class="frame" style="">
                <i class="pull-left" style="font-size: 14px"> Independent Marketers </i>
                <canvas id="prodStorageCapIndeChart"></canvas>
            </div>

            <div class="fig1_73 figure">
            </div>
        </div>

        <div class="col-md-3 chart-pad">
            <i class="pull-left" style="font-size: 14px"> Major Marketers </i>
            <div class="frame" style="">
                <canvas id="prodStorageCapMajoChart"></canvas>
            </div>

            <div class="fig2_73 figure">

            </div>
        </div>

        {{-- HADE CODED FIGURES FOR 33 & 34 --}}

        <div class="col-md-3 chart-pad">
            <i class="pull-left" style="font-size: 14px"> NNPC - Mega Marketers </i>
            <div class="frame" style="">
                <canvas id="prodStorageCapMegaChart"></canvas>
            </div>

            <div class="fig1_73 figure">

            </div>
        </div>

        <div class="col-md-3 chart-pad">
            <i class="pull-left" style="font-size: 14px"> NNPC - Franchise Marketers </i>
            <div class="frame" style="">
                <canvas id="prodStorageCapFranChart"></canvas>
            </div>

            <div class="fig2_73 figure">

            </div>
        </div>
    </div>

    <div class="row" style="padding:0px">
        <div class="col-md-12 chart-pad">

            <div class="fig1_73 figure">
                @if($controllerName->getFigure(73, $yrs)) Figure {!! $controllerName->getFigure(73, $yrs)->figure_no_1 !!} : {!! $controllerName->getFigure(73, $yrs)->figure_title_1 !!}
                @elseif($controllerName->getFigure(73, $yrs-1)) Figure {!! $controllerName->getFigure(73, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(73, $yrs-1)->figure_title_1 !!}
                @endif
            </div>
        </div>
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 74) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>74,'yrs'=>$yrs, 'remark'=>' Storage capacities of retail outlets by State and Market Segment'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th colspan="4" style="text-align: center; border: thin solid #FFF!important; background: #A3C1AD!important"><b class="bfont-size">
                        Independent </b></th>
                <th colspan="3" style="text-align: center; border: thin solid #FFF!important; background: #A3C1AD!important"><b class="bfont-size">
                        MAJOR </b></th>
                <th colspan="3" style="text-align: center; border: thin solid #FFF!important; background: #A3C1AD!important"><b class="bfont-size">
                        NNPC - Mega </b></th>
                <th colspan="3" style="text-align: center; border: thin solid #FFF!important; background: #A3C1AD!important"><b class="bfont-size">
                        NNPC - Franchise </b></th>
            </tr>
            <tr class="th_head">
                <th style="background: #A3C1AD!important;"> State</th>
                <th style="background: #A3C1AD!important;"> PMS</th>
                <th style="background: #A3C1AD!important;"> DPK</th>
                <th style="background: #A3C1AD!important;"> AGO</th>
                <th style="background: #A3C1AD!important;"> PMS</th>
                <th style="background: #A3C1AD!important;"> DPK</th>
                <th style="background: #A3C1AD!important;"> AGO</th>
                <th style="background: #A3C1AD!important;"> PMS</th>
                <th style="background: #A3C1AD!important;"> DPK</th>
                <th style="background: #A3C1AD!important;"> AGO</th>
                <th style="background: #A3C1AD!important;"> PMS</th>
                <th style="background: #A3C1AD!important;"> DPK</th>
                <th style="background: #A3C1AD!important;"> AGO</th>
            </tr>

            <tbody>
            @php
                $in_pms = 0; $in_ago = 0; $in_dpk = 0;
                $mj_pms = 0; $mj_ago = 0; $mj_dpk = 0;
                $mg_pms = 0; $mg_ago = 0; $mg_dpk = 0;
                $fr_pms = 0; $fr_ago = 0; $fr_dpk = 0;
                $i=1;
            @endphp
            @forelse($states as $state)
                @php
                    $in_pms += $IN_PMS = $controllerName->capByStateMarket($yrs, $state->id, 1, 3);
                    $in_ago += $IN_AGO = $controllerName->capByStateMarket($yrs, $state->id, 2, 3);
                    $in_dpk += $IN_DPK = $controllerName->capByStateMarket($yrs, $state->id, 3, 3);

                    $mj_pms += $ML_PMS = $controllerName->capByStateMarket($yrs, $state->id, 1, 2);
                    $mj_ago += $ML_AGO = $controllerName->capByStateMarket($yrs, $state->id, 2, 2);
                    $mj_dpk += $ML_DPK = $controllerName->capByStateMarket($yrs, $state->id, 3, 2);

                    // $nn_pms += $NN_PMS = $controllerName->capByStateMarket($yrs, $state->id, 1, 1);
                    // $nn_ago += $NN_AGO = $controllerName->capByStateMarket($yrs, $state->id, 2, 1);
                    // $nn_dpk += $NN_DPK = $controllerName->capByStateMarket($yrs, $state->id, 3, 1);

                    $mg_pms += $MG_PMS = $controllerName->capByStateMarket($yrs, $state->id, 1, 4);
                    $mg_ago += $MG_AGO = $controllerName->capByStateMarket($yrs, $state->id, 2, 4);
                    $mg_dpk += $MG_DPK = $controllerName->capByStateMarket($yrs, $state->id, 3, 4);

                    $fr_pms += $FR_PMS = $controllerName->capByStateMarket($yrs, $state->id, 1, 5);
                    $fr_ago += $FR_AGO = $controllerName->capByStateMarket($yrs, $state->id, 2, 5);
                    $fr_dpk += $FR_DPK = $controllerName->capByStateMarket($yrs, $state->id, 3, 5);
                @endphp
                <tr>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$state->state_name}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($IN_PMS, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($IN_AGO, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($IN_DPK, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($ML_PMS, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($ML_PMS, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($ML_DPK, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($MG_PMS, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($MG_AGO, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($MG_DPK, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($FR_PMS, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($FR_AGO, 0)}} </th>
                    <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($FR_DPK, 0)}} </th>
                </tr>   @php  $i++; @endphp
            @empty
            @endforelse
            <tr>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> Total </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($in_pms, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($in_ago, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($in_dpk, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($mj_pms, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($mj_ago, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($mj_dpk, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($mg_pms, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($mg_ago, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($mg_dpk, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($fr_pms, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($fr_ago, 0)}} </b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size"> {{number_format($fr_dpk, 0)}} </b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_74">
        @if($controllerName->bottomRemarks(74, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(74, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(74, $yrs)) {!! $controllerName->bottomRemarksTemp(74, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 75) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>75,'yrs'=>$yrs, 'remark'=>' Petroleum Products Average Consumer Price Range'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Market Segment</th>
                <th style="background: #A3C1AD!important;">PMS</th>
                <th style="background: #A3C1AD!important;">ago</th>
                <th style="background: #A3C1AD!important;">DPK</th>
            </tr>

            <tbody>  @php $i=1; $k = 3; @endphp
            @foreach($ave_price_range as $key => $ave_price_range)
                <tr>
                    {{-- <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>{{$ave_price_range->year}}</th> --}}
                    @if(rowSpan3($k) == true)
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif rowspan="3">
                            {{$ave_price_range->year}}
                        </th>
                    @endif
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$ave_price_range->production_types?$ave_price_range->production_types->market_segment_name:''}}
                    </th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($ave_price_range->pms == $ave_price_range->pms_to) {{$ave_price_range->pms}}
                        @else {{$ave_price_range->pms}} - {{$ave_price_range->pms_to}}
                        @endif
                    </th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($ave_price_range->ago == $ave_price_range->ago_to) {{$ave_price_range->ago}}
                        @else {{$ave_price_range->ago}} - {{$ave_price_range->ago_to}}
                        @endif
                    </th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        @if($ave_price_range->dpk == $ave_price_range->dpk_to) {{$ave_price_range->dpk}}
                        @else {{$ave_price_range->dpk}} - {{$ave_price_range->dpk_to}}
                        @endif
                    </th>
                </tr> @php $ARR[$i] = $i; $i++; $k++; @endphp
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_75">
        @if($controllerName->bottomRemarks(75, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(75, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(75, $yrs)) {!! $controllerName->bottomRemarksTemp(75, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 76) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>76,'yrs'=>$yrs, 'remark'=>' LPG importation by Zone'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Months</th>
                <th style="background: #A3C1AD!important;">LPG Import Figures (Metric Tonnes)</th>
            </tr>
            <tbody>
            @php
                $lpg_charts[] = '';  $i=1;
                foreach ($zones as $k => $zone)
                {
                     $zone = 0;   $k = 0;
                }
            @endphp
            @forelse($m_arr as $k =>$month)
                <tr>
                    <th @if(even($k) == true) style="background: #ACE1AF!important;" @endif>{{$month}}</th>
                    <th @if(even($k) == true) style="background: #ACE1AF!important;" @endif>
                        {{number_format($controllerName->LPGImportByZone(request()->year, $month), 2)}}
                    </th>
                    @empty
                    @endforelse
                </tr>
                @php $i++; @endphp
            </tbody>
            <tr>
                <th>Total</th>
                <th @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                    {{number_format($controllerName->LPGImportByZoneTotal(request()->year), 2)}}
                </th>
            </tr>
        </table>
        @forelse($array_year_5 as $k => $year)
            @php $lpg_charts[$k] = $controllerName->LPGImportByZoneChart($year);  @endphp
        @empty
        @endforelse
        {{-- @php dd($year); @endphp --}}
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_76">
        @if($controllerName->bottomRemarks(76, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(76, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(76, $yrs)) {!! $controllerName->bottomRemarksTemp(76, $yrs)->remark !!}
        @endif
    </div>


    {{-- <p style="margin-bottom: 650px !important"></p> --}}


    <div class="row" style="padding:0px">
        <div class="col-md-8 col-md-offset-2 chart-pad">
            <div class="frame" style="">
                <canvas id="LPGConsumptionChart"></canvas>
            </div>

            <div class="fig1_76 figure">
                @if($controllerName->getFigure(76, $yrs)) Figure {!! $controllerName->getFigure(76, $yrs)->figure_no_1 !!} :
                {!! $controllerName->getFigure(76, $yrs)->figure_title_1 !!}
                @elseif($controllerName->getFigure(76, $yrs-1)) Figure {!! $controllerName->getFigure(76, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(76, $yrs-1)->figure_title_1 !!}
                @endif
            </div>
        </div>
    </div>

</div>   </div>

@if(Auth::user()->role_obj->role_name == 'Admin' ||
$contributors->contains('approver_id', Auth::user()->id) && $contributors->contains('division', 'DOWNSTREAM') )

    <div class="row"> <div class="col-md-12" style="text-align-right"> <br>
            <a data-toggle="tooltip" onclick="showmodal('approve_divisional_article')" onmousedown="setDivision('DOWNSTREAM')" style="color:#fff; font-size: 12px; margin-left: 5px" class="btn btn-info waves-effect waves-light btn-sm pull-right no-print" data-original-title="Approve All Articles for UDownstream"> <i class="fa fa-check"></i> Approve Downstream Article </a>

            <a data-toggle="tooltip" onclick="showmodal('add_comment_div')" onmousedown="setDivision('DOWNSTREAM')" style="color:#fff; font-size: 12px" class="btn btn-danger btn-sm pull-right no-print" data-original-title="Reject Article"> <i class="fa fa-ban"></i> Reject Downstream Article </a>
        </div> </div>

@endif




<!-- HSE -->
<p style="margin-bottom: 20px !important"></p>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 77) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>77,'yrs'=>$yrs, 'remark'=>' Accident Report – Industry Wide'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Month</th>
                <th style="background: #A3C1AD!important;">Incidents</th>
                <th style="background: #A3C1AD!important;">Work Related</th>
                <th style="background: #A3C1AD!important;">Non Work Related</th>
                <th style="background: #A3C1AD!important;">Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Fatality</th>
            </tr>

            <tbody>
            @php
                $inci = 0;  $work_r = 0;  $n_work = 0;  $fata_ic = 0;  $n_fata = 0;
                $wr_fata = 0;  $nwr_fata = 0;  $fata = 0; $i=1;
            @endphp
            @forelse($ind_wide as $ind_wide=>$accident_iw )
                @php $accident_iw = (object) $accident_iw ; @endphp
                <tr>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->month}}</th>
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->incidents}}</th>
                    @php $inci += $accident_iw->incidents; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->work_related}}</th>
                    @php $work_r += $accident_iw->work_related; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->non_work_related}}</th>
                    @php $n_work += $accident_iw->non_work_related; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->fatal_incident}}</th>
                    @php $fata_ic += $accident_iw->fatal_incident; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->non_fatal_incident}}</th>
                    @php $n_fata += $accident_iw->non_fatal_incident; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->work_related_fatal_incident}}</th>
                    @php $wr_fata += $accident_iw->work_related_fatal_incident; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->non_work_related_fatal_incident}}</th>
                    @php $nwr_fata += $accident_iw->non_work_related_fatal_incident; @endphp
                    <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                        {{$accident_iw->fatality}}</th>
                    @php $fata += $accident_iw->fatality; @endphp
                </tr>  @php $i++; @endphp
            @empty
            @endforelse
            <tr class="th_head">
                <th style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$inci}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$work_r}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$n_work}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$fata_ic}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$n_fata}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$wr_fata}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$nwr_fata}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$fata}}</b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_77">
        @if($controllerName->bottomRemarks(77, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(77, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(77, $yrs)) {!! $controllerName->bottomRemarksTemp(77, $yrs)->remark !!}
        @endif
    </div>

</div>   </div>



<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 78) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>78,'yrs'=>$yrs, 'remark'=>' Accident Report – UPSTREAM'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">
            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Month</th>
                <th style="background: #A3C1AD!important;">Incidents</th>
                <th style="background: #A3C1AD!important;">Work Related</th>
                <th style="background: #A3C1AD!important;">Non Work Related</th>
                <th style="background: #A3C1AD!important;">Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Fatality</th>
            </tr>

            <tbody>
            @php
                $inci_up = 0;  $work_r_up = 0;  $n_work_up = 0;  $fata_ic_up = 0;  $n_fata_up = 0;
                $wr_fata_up = 0;  $nwr_fata_up = 0;  $fata_up = 0; $i=1;
            @endphp
            @if($accident_up)
                @foreach($accident_up as $accident_up)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->month}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->incidents}}</th>
                        @php $inci_up += $accident_up->incidents; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->work_related}}</th>
                        @php $work_r_up += $accident_up->work_related; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->non_work_related}}</th>
                        @php $n_work_up += $accident_up->non_work_related; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->fatal_incident}}</th>
                        @php $fata_ic_up += $accident_up->fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->non_fatal_incident}}</th>
                        @php $n_fata_up += $accident_up->non_fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->work_related_fatal_incident}}</th>
                        @php $wr_fata_up += $accident_up->work_related_fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->non_work_related_fatal_incident}}</th>
                        @php $nwr_fata_up += $accident_up->non_work_related_fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_up->fatality}}</th>
                        @php $fata_up += $accident_up->fatality; @endphp
                    </tr> @php $i++; @endphp
                @endforeach
                <tr class="th_head">
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$inci_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$work_r_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$n_work_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$fata_ic_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$n_fata_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$wr_fata_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$nwr_fata_up}}</b></th>
                    <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$fata_up}}</b></th>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_78">
        @if($controllerName->bottomRemarks(78, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(78, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(78, $yrs)) {!! $controllerName->bottomRemarksTemp(78, $yrs)->remark !!}
        @endif
    </div>
    <br>

    <div class="col-md-8 col-md-offset-2 chart-pad"><br> <br>
        <div class="frame" style="">
            <canvas id="accupPieChart"></canvas>
        </div>

        <div class="fig1_78 figure">
            @if($controllerName->getFigure(78, $yrs)) Figure {!! $controllerName->getFigure(78, $yrs)->figure_no_1 !!} :
            {!! $controllerName->getFigure(78, $yrs)->figure_title_1 !!}
            @elseif($controllerName->getFigure(78, $yrs-1)) Figure {!! $controllerName->getFigure(78, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(78, $yrs-1)->figure_title_1 !!}
            @endif
        </div>
    </div>

</div>   </div>



<p style="margin-top: 250px !important"></p>

<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 79) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>79,'yrs'=>$yrs, 'remark'=>' Accident Report – DOWNSTREAM'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Month</th>
                <th style="background: #A3C1AD!important;">Incidents</th>
                <th style="background: #A3C1AD!important;">Work Related</th>
                <th style="background: #A3C1AD!important;">Non Work Related</th>
                <th style="background: #A3C1AD!important;">Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Fatality</th>
            </tr>

            <tbody>
            @php
                $inci_dw = 0;  $work_r_dw = 0;  $n_work_dw = 0;  $fata_ic_dw = 0;  $n_fata_dw = 0;
                $wr_fata_dw = 0;  $nwr_fata_dw = 0;  $fata_dw = 0; $i=1;
            @endphp
            @if($accident_dw)
                @foreach($accident_dw as $accident_dw)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->month}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->incidents}}</th>
                        @php $inci_dw += $accident_dw->incidents; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->work_related}}</th>
                        @php $work_r_dw += $accident_dw->work_related; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->non_work_related}}</th>
                        @php $n_work_dw += $accident_dw->non_work_related; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->fatal_incident}}</th>
                        @php $fata_ic_dw += $accident_dw->fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->non_fatal_incident}}</th>
                        @php $n_fata_dw += $accident_dw->non_fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->work_related_fatal_incident}}</th>
                        @php $wr_fata_dw += $accident_dw->work_related_fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->non_work_related_fatal_incident}}</th>
                        @php $nwr_fata_dw += $accident_dw->non_work_related_fatal_incident; @endphp
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$accident_dw->fatality}}</th>
                        @php $fata_dw += $accident_dw->fatality; @endphp
                    </tr>  @php $i++; @endphp
                @endforeach
            @endif
            <tr class="th_head">
                <th style="background: #A3C1AD!important;"><b class="bfont-size">Total</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$inci_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$work_r_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$n_work_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$fata_ic_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$n_fata_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$wr_fata_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$nwr_fata_dw}}</b></th>
                <th style="background: #A3C1AD!important;"><b class="bfont-size">{{$fata_dw}}</b></th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_79">
        @if($controllerName->bottomRemarks(79, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(79, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(79, $yrs)) {!! $controllerName->bottomRemarksTemp(79, $yrs)->remark !!}
        @endif
    </div>
    <br>

    <div class="col-md-8 col-md-offset-2 chart-pad"><br> <br>
        <div class="frame" style="">
            <canvas id="accdwLineChart"></canvas>
        </div>

        <div class="fig1_79 figure">
            @if($controllerName->getFigure(79, $yrs)) Figure {!! $controllerName->getFigure(79, $yrs)->figure_no_1 !!} :
            {!! $controllerName->getFigure(79, $yrs)->figure_title_1 !!}
            @elseif($controllerName->getFigure(79, $yrs-1)) Figure {!! $controllerName->getFigure(79, $yrs-1)->figure_no_1 !!} : {!! $controllerName->getFigure(79, $yrs-1)->figure_title_1 !!}
            @endif
        </div>
    </div>

</div>   </div>




<div class="row" id="" style="padding: 0px; @if($controllerName->showHideTable($yrs, 80) == 0) display: none; @endif">

    @include('publication.partials.tablehead',['t_id'=>80,'yrs'=>$yrs, 'remark'=>' Yearly Accident Report - Upstream'])

    <div class="table-responsive">
        <table class="table table-condensed mb-0" id="" style="-webkit-print-color-adjust: exact!important;">

            <tr class="th_head">
                <th style="background: #A3C1AD!important;">Year</th>
                <th style="background: #A3C1AD!important;">Incidents</th>
                <th style="background: #A3C1AD!important;">Work Related</th>
                <th style="background: #A3C1AD!important;">Non Work Related</th>
                <th style="background: #A3C1AD!important;">Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Non Work Related Fatal Incident</th>
                <th style="background: #A3C1AD!important;">Fatality</th>
            </tr>

            <tbody> @php $i=1; @endphp
            @if($array_year_10)
                @foreach($array_year_10 as $year_arr_10)
                    <tr>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$year_arr_10}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'incidents')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'work_related')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'non_work_related')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'non_fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'work_related_fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'non_work_related_fatal_incident')}}</th>
                        <th class="th_h" @if(even($i) == true) style="background: #ACE1AF!important;" @endif>
                            {{$controllerName->yearlyHSEAccident($year_arr_10, '\App\\she_accident_report_upstream', 'fatality')}}</th>
                    </tr> @php $i++; @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row col-md-12 remark-div" id="bottomTab_80">
        @if($controllerName->bottomRemarks(80, $yrs) && $table_of_contents)
            {!! $controllerName->bottomRemarks(80, $yrs)->remark !!}
        @elseif($controllerName->bottomRemarksTemp(80, $yrs)) {!! $controllerName->bottomRemarksTemp(80, $yrs)->remark !!}
        @endif
    </div>


    <button type="button" id="load_five" class="btn btn-default pull-right no-print" onclick="loadFive()">Load More</button>
</div>  </div>




<div id="section_five">
</div>




<!-- INCLUDING CHARTS chart js-->
@include('publication.partials.chartFour')