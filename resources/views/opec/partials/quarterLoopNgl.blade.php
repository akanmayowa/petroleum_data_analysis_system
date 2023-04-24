@php $data=explode(',',@$OpecCrudes[$class]); $total=array_sum($data); @endphp
@for($i=1; $i<=4; $i++)
    <tr>
        <td height="20" align="right" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
        <td align="right" valign=bottom bgcolor="#B8FFE3"><font face="Courier New" color="#000000">Q{{$i}}</font></td>
        <td  style="border-top: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="left" valign=bottom bgcolor="#B8FFE3" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font> @if(!request()->has('excel')) <input type="number" id="{{$class}}{{$i}}" name="{{$class}}[]" step="0.01"  value="{{round(@$data[$i-1],3)}}"  @if(in_array($class,['field_condensate','statisticalDiff'])) readonly @endif class="{{$class}}"> @else {{round(@$data[$i-1],3)}}  @endif</td>
        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
        <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    </tr>
@endfor


<tr>
    <td height="21" align="right" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign=middle bgcolor="#FFFFFF"><font face="Courier New" color="#000000"><br></font></td>
    <td align="right" valign=bottom bgcolor="#B8FFE3" sdval="2019" sdnum="1033;"><font face="Courier New" color="#000000">{{$year}}</font></td>
    <td id="{{$class}}Total" style="border-bottom: 2px solid #ff0000; border-left: 2px solid #ff0000; border-right: 2px solid #ff0000" align="right" valign=bottom bgcolor="#B8FFE3" sdval="0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000">  {{round($total,3)}} </font></td>
    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
    <td align="left" valign=bottom bgcolor="#BFBFC0" sdnum="1033;0;#,##0.00"><font face="Courier New" color="#000000"><br></font></td>
</tr>


<script>

    $(function(){
        $(`.{{$class}}`).keyup(function(){

            totalSum=$(`.{{$class}}`).map(function(){ return  this.value }).get();
            sum=0;
            $.each(totalSum,function(index,element){
                sum +=parseFloat(element);
            })

            $(`#{{$class}}Total`).text(sum);
            statisticalDiff()
        })
    })
</script>

