
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Companies</th>
            <th>Facility Location Address</th>
            <th>Approved Courses</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->companies}}</th>
                    <th>{{$detail->facility_address}}</th> 
                    <th>{{$detail->approved_courses}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
