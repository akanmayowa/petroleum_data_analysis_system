
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Type</th>
			<th>Contract</th>
			<th>Terrain</th>
			<th>Company</th>
			<th>Condensate Reserves</th>			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->type_id}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->condensate_reserves}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>