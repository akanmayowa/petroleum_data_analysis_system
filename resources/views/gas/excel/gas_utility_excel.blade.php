
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Field</th>
			<th>Fuel Gas</th>
			<th>Gas Lift</th>
			<th>Re-Injection</th>
			<th>NGL LPG</th>
			<th>Gas To NIPP</th>
			<th>Local Others</th>
			<th>NLNG Export</th>
			<th>Total Gas Utilized</th>
			<th>Percent Utilized</th>
			<th>AG Gas Flared</th>
			<th>NAG Gas Flared</th>
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
					<td>{{$detail->fuel_gas}}</td>
					<td>{{$detail->gas_lift}}</td>
					<td>{{$detail->re_injection}}</td>
					<td>{{$detail->ngl_lpg}}</td>
					<td>{{$detail->gas_to_nipp}}</td>
					<td>{{$detail->local_others}}</td>
					<td>{{$detail->nlng_export}}</td>
					<td>{{$detail->total_gas_utilized}}</td>
					<td>{{$detail->percent_utilized}}</td>
					<td>{{$detail->ag_gas_flared}}</td>
					<td>{{$detail->nag_gas_flared}}</td>
					<td>{{$detail->total_gas_flared}}</td>
					<td>{{$detail->percent_flared}}</td>
					<td>{{$detail->shrinkage}}</td>
					<td>{{$detail->statistical_difference}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>