<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Basin</th>
			<th>Allocated Blocks OPL</th>
			<th>Allocated Blocks OML</th>
			<th>Open Blocks</th>
			<th>Total Blocks</th>
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->basin?$detail->basin->basin_name:''}}</td>
					<td>{{$detail->opl_blocks_allocated}}</td>
					<td>{{$detail->oml_blocks_allocated}}</td>
					<td>{{$detail->blocks_open}}</td>
					<td>{{$detail->total_block}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>