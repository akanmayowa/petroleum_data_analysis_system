
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Field</th>
            <th>Concession</th>
            <th>Company</th>
            <th>Gas Reserves(BSCF)</th>
            <th>Condensate(MMSTB)</th>
            <th>AG Reserves(Bscf)</th>
            <th>Off-Take Rate(MMSCFD)</th>			
		</tr>
	</thead>
	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th> 
                    <th>@if($detail->field) {{$detail->field->field_name}} @endif </th> 
                    <th>@if($detail->concession) {{$detail->concession->concession_name}} @endif </th> 
                    <th>@if($detail->company) {{$detail->company->company_name}} @endif </th> 
                    <th>{{$detail->gas_reserve}}</th> 
                    <th>{{$detail->condensate}}</th> 
                    <th>{{$detail->ag_reserve}}</th> 
                    <th>{{$detail->off_take_rate}}</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>