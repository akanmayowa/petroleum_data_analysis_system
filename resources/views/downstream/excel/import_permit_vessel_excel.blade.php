
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Depot Name</th>
			<th>Field Offices</th>
			<th>Product</th>
			<th>Volume in Ltrs </th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->depot_name}}</td>
					<td>{{$detail->field_office?$detail->field_office->field_office_name:''}}</td>
					<td>{{$detail->product?$detail->product->product_name:''}}</td>
					<td>{{$detail->value}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>