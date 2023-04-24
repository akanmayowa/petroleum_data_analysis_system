<table>
	<thead>
		<tr>
			<th>Concession Name</th>
			<th>Company</th>
			<th>Area</th>
			<th>Geo Terrain</th>
			<th>Remark</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->concession_name}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->area}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>