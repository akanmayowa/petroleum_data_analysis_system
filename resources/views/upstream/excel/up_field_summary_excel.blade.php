
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Company</th>
            <th>Contract</th>
            <th>Producing Field</th>
            <th>Well</th>
            <th>String</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>  
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif </th> 
                    <th>@if($detail->contract) {{$detail->contract->contract_name}} @endif </th> 
                    <th>{{$detail->producing_field}}</th> 
                    <th>{{$detail->well}}</th> 
                    <th>{{$detail->string}}</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>