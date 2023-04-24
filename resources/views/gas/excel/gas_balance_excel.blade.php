
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Field</th>
			<th>Total Gas Utilized</th>
			<th>Percent Utilized</th>
			<th>Total Gas Flared</th>
			<th>Percent Flared</th>
			<th>Shrinkage</th>
			<th>Statistical Diff</th>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->field?$detail->field->field_name:''}}</td>
					<td>{{$detail->total_gas_utilized}}</td>
					<td>{{$detail->percent_utilized}}</td>
					<td>{{$detail->total_gas_flared}}</td>
					<td>{{$detail->percent_flared}}</td>
					<td>{{$detail->shrinkage}}</td>
					<td>{{$detail->statistical_difference}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>