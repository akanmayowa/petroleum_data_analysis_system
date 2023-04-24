
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Company</th>
			<th>Facility</th>
			<th>Facility Type</th>
			<th>Location</th>
			<th>Terrain</th>
			<th>Design Capacity</th>
			<th>Operating Capacity</th>
			<th>Design Life</th>
			<th>Date of Commissioning</th>
			<th>Operating Status</th>
			<th>License Status</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->facility?$detail->facility->facility_name:''}}</td>
					<td>{{$detail->facility_type?$detail->facility_type->facility_type_name:''}}</td>
					<td>{{$detail->location?$detail->location->location_name:''}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->design_capacity}}</td>
					<td>{{$detail->operating_capacity}}</td>
					<td>{{$detail->facility_design_life}}</td>
					<td>{{$detail->date_of_commissioning}}</td>
					<td>{{$detail->gas_status?$detail->gas_status->status_name:''}}</td>
					<td>{{$detail->up_license_status?$detail->up_license_status->license_status_name:''}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
