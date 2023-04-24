
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Project Title</th>
			<th>Objective</th>
			<th>LNG</th>
			<th>NG</th>
			<th>CNG</th>
			<th>LPG</th>
			<th>NGR</th>
			<th>Condensate</th>
			<th>Fertilizer</th>
			<th>Petrochemical</th>
			<th>Company</th>
			<th>Others</th>
			<th>Location</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->project_title}}</td>
					<td>{{$detail->project_objective}}</td>
					<td>{{$detail->lng}}</td>
					<td>{{$detail->ng}}</td>
					<td>{{$detail->cng}}</td>
					<td>{{$detail->lpg}}</td>
					<td>{{$detail->ngr}}</td>
					<td>{{$detail->condensate}}</td>
					<td>{{$detail->fertilizer}}</td>
					<td>{{$detail->petrochemical}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->others}}</td>
					<td>{{$detail->location_id}}</td>
					<td>{{$detail->start_date}}</td>
					<td>{{$detail->completion_date}}</td>
					<td>{{$detail->status?$detail->status->status_name:''}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>