
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Company</th>
            <th>Non-Compliance</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->service}}</th> 
                    <th>{{$detail->company?$detail->company->company_name:''}}</th> 
                    <th>{{$detail->compliance}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
