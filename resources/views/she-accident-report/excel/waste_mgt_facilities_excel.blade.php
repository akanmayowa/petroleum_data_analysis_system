
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Facility Type</th>
			<th>No Of Approved Facilities</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->type_of_facility?$detail->type_of_facility->facility_type_name:''}}</td>
					<td>{{$detail->operational_permit}}</td>
					<td>{{$detail->status}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>