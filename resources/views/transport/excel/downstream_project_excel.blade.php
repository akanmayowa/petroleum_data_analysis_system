
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Company</th>
			<th>Location</th>
			<th>Plant Name</th>
			<th>Plant Type</th>
			<th>Capacity</th>
			<th>Output Yield</th>
			<th>Status</th>
			<th>Start Year</th>
			<th>Expected Completion Date</th>
			<th>Proj Description</th>
			<th>Feed</th>
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->company}}</td>
					<td>{{$detail->location}}</td>
					<td>{{$detail->plant_name}}</td>
					<td>{{$detail->plant_type}}</td>
					<td>{{$detail->capacity_by_unit}}</td>
					<td>{{$detail->output_yield}}</td>
					<td>{{$detail->statuses?$detail->statuses->status_name:''}}</td>
					<td>{{$detail->start_year}}</td>
					<td>{{$detail->estimated_completion}}</td>
					<td>{{$detail->project_desc_by_unit}}</td>
					<td>{{$detail->feed}}</td>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>