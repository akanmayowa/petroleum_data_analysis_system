
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Project</th>
			<th>Location</th>
			<th>Company</th>
			<th>Others</th>
			<th>Terrain</th>
			<th>Expected Oil</th>
			<th>Expected Gas</th>
			<th>Expected Water</th>
			<th>Enhanced Facility</th>
			<th>Facility Type</th>
			<th>Dev Type</th>
			<th>Start Date</th>
			<th>Completion Date</th>
			<th>Status</th>
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->project}}</td>
					<td>{{$detail->locstion}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->others}}</td>
					<td>{{$detail->terrain_id}}</td>
					<td>{{$detail->expected_oil}}</td>
					<td>{{$detail->expected_gas}}</td>
					<td>{{$detail->expected_water}}</td>
					<td>{{$detail->expected_efi}}</td>
					<td>{{$detail->facility_type}}</td>
					<td>{{$detail->development_type}}</td>
					<td>{{$detail->start_date}}</td>
					<td>{{$detail->completion_date}}</td>
					<td>{{$detail->status_id}}</td>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>