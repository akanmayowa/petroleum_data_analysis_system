
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Company</th>
            <th>Import Permit No</th>
            <th>Date Issued <i class="units"></i></th>
            <th>Validity Period <i class="units"></i></th>
            <th>Product <i class="units"></i></th>
            <th>Volume <i class="units"> MT</i></th>
            <th>Country <i class="units"></i></th> 
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                     <th>{{$detail->month}}</th>
                     <th>@if($detail->company) {{$detail->company->company_name}} @endif</th>
                     <th>{{$detail->import_permit_no}}</th>
                     <th>{{$detail->issued_date}}</th>
                     <th>{{$detail->validity_period}}</th>
                     <th>@if($detail->product) {{$detail->product->product_name}} @endif</th> 
                     <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{$detail->volume}}</th>
                     <th>@if($detail->country) {{$detail->country->country_name}} @endif</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>