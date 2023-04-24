
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Facility</th>
			<th>Terrain</th>
			<th>Concession</th>
			<th>Volume</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->facility_id}}</td>
					<td>{{$detail->terrain}}</td>
					<td>{{$detail->concession_id}}</td>
					<td>{{$detail->volume}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>