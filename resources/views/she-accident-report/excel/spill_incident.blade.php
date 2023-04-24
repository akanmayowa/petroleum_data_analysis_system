
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Natural Accident</th>
            <th>Corrosion</th>
            <th>Equipment Failure</th>
            <th>Sabotage</th>
            <th>Human Error</th>
            <th>YTBD</th>
            <th>Mystery</th>  
            <th>Total Spill</th>
            <th>Volume Spill</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th>
                    <th>{{$detail->natural_accident}}</th> 
                    <th>{{$detail->corrosion}}</th>
                    <th>{{$detail->equipment_failure}}</th>
                    <th>{{$detail->sabotage}}</th>
                    <th>{{$detail->human_error}}</th>
                    <th>{{$detail->ytbd}}</th> 
                    <th>{{$detail->mystery}}</th>
                    <th>{{$detail->total_no_of_spills}}</th>
                    <th>{{$detail->volume_spilled}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>