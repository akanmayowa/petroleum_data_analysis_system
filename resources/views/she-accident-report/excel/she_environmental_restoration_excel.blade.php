
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Service</th>
            <th>Approval Status</th>
            <th>New (Approval Type)</th>
            <th>Renew (Approval Type)</th>
            <th>Total</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->service}}</th> 
                    <th>@if($detail->status){{$detail->status->status_name}}@endif</th> 
                    <th>{{$detail->new}}</th> 
                    <th>{{$detail->renew}}</th> 
                    <th>{{$detail->total}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>
