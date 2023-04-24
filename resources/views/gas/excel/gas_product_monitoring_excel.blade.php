
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Month</th>
            <th>Product</th>
            <th>Category</th>
            {{-- <th>State</th> --}}
            {{-- <th>Local Govt Area <i class="units"></i></th> --}}
            <th>Zones <i class="units"></i></th>
            {{-- <th>No of Plant <i class="units"></i></th> --}}
            <th>Capacity <i class="units">MT</i></th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
					<th>{{$detail->month}}</th>
					<th>{{$detail->product_type}}</th>
                     {{-- <th>{{$detail->company?$detail->company->company_name:''}}</th>  --}}
                     <th>{{$detail->category?$detail->category->category_name:''}}</th> 
                     {{-- <th>{{$detail->state?$detail->state->state_name:''}}</th> --}}
                     {{-- <th>{{$detail->lga}}</th> --}}
                     <th>{{$detail->zone}}</th>
                     {{-- <th>{{$detail->no_of_plant}}</th> --}}
                     <th>{{$detail->capacity}}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>