<table>
	<thead>
		<tr>
			<th>Company</th>
			<th>Concession</th>
			<th>Equity Distribution</th>
			<th>Contract</th>
			<th>Award Year</th>
			<th>License Expiry Date</th>
			<th>Area</th>
			<th>Geological Terrain</th>
			<th>Comment</th>
			<th>Year</th>
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->concession?$detail->concession->concession_name:''}}</td>
					<td>{{$detail->equity_distribution}}</td>
					<td>{{$detail->contract?$detail->contract->contract_name:''}}</td>
					<td>{{$detail->year_of_award}}</td>
					<td>{{$detail->license_expire_date}}</td>
					<td>{{$detail->area}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->comment}}</td>
					<td>{{$detail->year}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>