<table>
	<thead>
		<tr>
			<th>Field Code</th>
			<th>Field</th>
			<th>Concession</th>
			<th>Company</th>
			<th>Contract</th>
			<th>Terrain</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->field_code}}</td>
					<td>{{$detail->field_name}}</td>
					<td>{{$detail->concession?$detail->concession->concession_name:''}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>