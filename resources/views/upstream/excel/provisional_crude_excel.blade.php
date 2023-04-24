
<table>
	<thead>
		<tr>
			<th>Company</th>
			<th>Field</th>
			<th>Contract</th>
			<th>Terrain</th>
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
			<th>Total</th>
			<th>Average</th>
			<th>Percentage</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->field?$detail->field->field_name:''}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->year}}</td>
					<td>{{$detail->january}}</td>
					<td>{{$detail->febuary}}</td>
					<td>{{$detail->march}}</td>
					<td>{{$detail->april}}</td>
					<td>{{$detail->may}}</td>
					<td>{{$detail->june}}</td>
					<td>{{$detail->july}}</td>
					<td>{{$detail->august}}</td>
					<td>{{$detail->september}}</td>
					<td>{{$detail->october}}</td>
					<td>{{$detail->november}}</td>
					<td>{{$detail->december}}</td>
					<td>{{$detail->company_total}}</td>
					<td>{{$detail->average_production}}</td>
					<td>{{$detail->percentage_production}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>