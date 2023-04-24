
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month </th>
            <th>Company </th>
            <th>Well Type</th>
            <th>Well Name </th>
            <th>Concession </th>
            <th>Radiation Permit Count</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->company?$detail->company->company_name:''}}</th>
                    <th>{{$detail->well_type}}</th>
                    <th>{{$detail->well_name}}</th>
                    <th>{{$detail->concession}}</th>
                    <th>{{$detail->count}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
