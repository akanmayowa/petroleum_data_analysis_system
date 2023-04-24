@php $i=0; $upstreamData=explode(',',@$upstreamData[5][$name]); $firstSum=array_sum($upstreamData); @endphp
@foreach($product1 as $product)

<tr>
    <td height="20" align="center" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign="middle" bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
    <td align="right" valign="bottom" bgcolor="{{$loop->index%2==0 ? '#FFFFFF' : '#DAEEF3'}}"><font face="Courier New" color="#000000">{{$product}}</font></td>
    <td style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign="bottom" bgcolor="{{$loop->index%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdval="0" sdnum="1033;0;#,##0"><font face="Courier New" color="#000000">
            @if(in_array($product,['Oil','Total']))
                <span class="{{$product.$name}}" >
                    @if(in_array($product,['Total']))
                        {{@$data[$product]+$firstSum}}
                    @else
                        {{@$data[$product]}}
                    @endif
                </span>
            @else
                <input type="number" class="{{$name}}" name="{{$name}}[]" value="{{@$upstreamData[$i]}}" />
                @php $i++; @endphp
            @endif
        </font></td>
    <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign="bottom" bgcolor="{{$loop->index %2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign="bottom" bgcolor="{{$loop->index%2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign="bottom" bgcolor="{{$loop->index %2==0 ? '#FFFFFF' : '#DAEEF3'}}" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
</tr>
@endforeach

<script>
    $(function(){

        $('.{{$name}}').keyup(function(){
            totalCollection = $('.{{$name}}').map(function () {
                return this.value
            }).get();
            total = 0;
            $.each(totalCollection, function (index, element) {
                total += parseFloat(element);
            });
            totalTotal=parseFloat({{@$data['Oil']}}) + parseFloat(total);
            // console.log(totalTotal);
            $('.Total{{$name}}').text(totalTotal);
        })
    })
</script>