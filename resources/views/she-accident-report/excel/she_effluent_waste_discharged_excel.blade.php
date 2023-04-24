
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Company</th>
            <th>Well Name</th>
            <th>Spent WBM</th>
            <th>Spent OBM</th>
            <th>WBM Cuttings Generated</th>
            <th>OBM Cuttings Generated</th>
            <th>Waste Managers</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
                    <th>{{$detail->year}}</th>
                    <th>{{$detail->month}}</th> 
                    <th>{{substr($detail->company?$detail->company->company_name:'', 0, 30)}}</th>
                    <th>{{$detail->well_name}}</th>
                    <th>{{$detail->spent_wbm}}</th> 
                    <th>{{$detail->spent_obm}}</th>
                    <th>{{$detail->wbm_generated}}</th> 
                    <th>{{$detail->obm_generated}}</th> 
                    <th>{{$detail->waste_manager}}</th> 
                </tr>
			@endforeach
		@endif		
	</tbody>
</table>