
<table>
	<thead>
		<tr>
			<th>Thematic Area</th>
			<th>Key Result Area</th>
			<th>KPI</th>
			<th>Source</th>
			<th>Metric</th>
			<th>Frequency of Measurement</th>
			<th>Year</th>
			<th>Jan</th>
			<th>Feb</th>
			<th>Mar</th>
			<th>Apr</th>
			<th>May</th>
			<th>Jun</th>
			<th>Jul</th>
			<th>Aug</th>
			<th>Sep</th>
			<th>Oct</th>
			<th>Nov</th>
			<th>Dec</th>
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->themic_area?$detail->themic_area->themic_area_name:''}}</td>
					<td>{{$detail->key_result_area?$detail->key_result_area->key_result_area_name:''}}</td>
					<td>{{$detail->kpis?$detail->kpis->kpis_name:''}}</td>
					<td>{{$detail->source?$detail->source->source_name:''}}</td>
					<td>{{$detail->metric?$detail->metric->metric_name:''}}</td>
					<td>{{$detail->frequency_of_measurement?$detail->frequency_of_measurement->frequency_of_measurement_name:''}}</td>
					<td>{{$detail->year}}</td>
					<td>{{$detail->getMpm('january')}}</td>
					<td>{{$detail->getMpm('febuary')}}</td>
					<td>{{$detail->getMpm('march')}}</td>
					<td>{{$detail->getMpm('april')}}</td>
					<td>{{$detail->getMpm('may')}}</td>
					<td>{{$detail->getMpm('june')}}</td>
					<td>{{$detail->getMpm('july')}}</td>
					<td>{{$detail->getMpm('august')}}</td>
					<td>{{$detail->getMpm('september')}}</td>
					<td>{{$detail->getMpm('october')}}</td>
					<td>{{$detail->getMpm('november')}}</td>
					<td>{{$detail->getMpm('december')}}</td>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>