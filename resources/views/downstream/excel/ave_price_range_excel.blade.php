
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Market Segment</th>
			<th>PMS</th>
			<th>AGO</th>
			<th>DPK</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->production_types?$detail->production_types->market_segment_name:''}}</td>
					<td>{{$detail->pms .' - '. $detail->pms_to}}</td>
					<td>{{$detail->ago .' - '. $detail->ago_to}}</td>
					<td>{{$detail->dpk .' - '. $detail->dpk_to}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>