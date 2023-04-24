
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Company</th>
			<th>Facility Type</th>
			<th>Facility Description</th>
			<th>Location Area</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->type_of_facility?$detail->type_of_facility->facility_type_name:''}}</td>
					<td>{{$detail->facility_description}}</td>
					<td>{{$detail->state_id}}</td>
					<td>{{$detail->operational_status_id}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>