
<table>
	<thead>
		<tr>
			<th>Company Code</th>
			<th>Company</th>
			<th>Parent Company</th>
			<th>Contact Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>ddress</th>
			<th>RC-Number</th>
			<th>License Expiry Date</th>
			<th>Operation Type</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->company_code}}</td>
					<td>{{$detail->company_name}}</td>
					<td>{{$detail->parent_company?$detail->parent_company->parent_company_name:''}}</td>
					<td>{{$detail->contact_name}}</td>
					<td>{{$detail->email}}</td>
					<td>{{$detail->phone}}</td>
					<td>{{$detail->address}}</td>
					<td>{{$detail->rc_number}}</td>
					<td>{{$detail->license_expire_date}}</td>
					<td>{{$detail->operation_type}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>