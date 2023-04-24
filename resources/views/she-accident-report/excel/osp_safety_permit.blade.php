
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Personnel Registered</th>
            <th>Personnel Captured</th>
            <th>Permit Issued</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->personnel_registered}}</th>
                    <th>{{$detail->personnel_captured}}</th> 
                    <th>{{$detail->permits_issued}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>