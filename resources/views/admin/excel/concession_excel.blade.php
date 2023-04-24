<table>
	<thead>
		<tr>
			<th>Concession Name</th>
			<th>Company</th>
			<th>Equity %</th>
			<th>Equity %</th>
			<th>Equity %</th>
			<th>Equity %</th>
			<th>Equity %</th>
			<th>Contract</th>
			<th>Award Date</th>
			<th>License Expiry Date</th>
			<th>Area</th>
			<th>Geo Terrain</th>
			<th>Comment</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->concession_name}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->equity_one?$detail->equity_one->company_name:''}}</td>
					<td>{{$detail->equity_two?$detail->equity_two->company_name:''}}</td>
					<td>{{$detail->equity_three?$detail->equity_three->company_name:''}}</td>
					<td>{{$detail->equity_four?$detail->equity_four->company_name:''}}</td>
					<td>{{$detail->equity_five?$detail->equity_five->company_name:''}}</td>
					<td>{{$detail->award_date}}</td>
					<td>{{$detail->license_expire_date}}</td>
					<td>{{$detail->area}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->comment}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>