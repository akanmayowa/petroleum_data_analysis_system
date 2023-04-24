
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Company</th>
            {{-- <th>Supplied to Power <i class="units"></i></th>
            <th>Supplied to Commercials <i class="units"></i></th>
            <th>Supplied to GBI <i class="units"></i></th> --}}
            <th>Total Gas Supplied <i class="units"></i></th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->company?$detail->company->company_name:''}}</th> 
                    {{-- <th data-toggle="tooltip" title="Volume In MMscf">{{$detail->power}}</th>
                    <th data-toggle="tooltip" title="Volume In MMscf">{{$detail->commercial}}</th>
                    <th data-toggle="tooltip" title="Volume In MMscf">{{$detail->industry}}</th> --}}
                    <th data-toggle="tooltip" title="Volume In MMscf">{{$detail->total}}</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>