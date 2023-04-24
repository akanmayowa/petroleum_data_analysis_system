
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Drilling Fluid Type</th>
            <th>Number</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->fluid_type}}</th> 
                    <th>{{$detail->number}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
