
<table>
	<thead>
		<tr>
			<th>Year</th>
            <th>Oil Royalty</th>
            <th>Gas Sales Royalty</th>
            <th>Gas Flare Payment</th>
            <th>Concession Rentals</th>
            <th>MOR</th>
            <th>Signature Bonus</th>
            <th>Total</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
					<th>{{number_format($detail->oil_projected, 2) }}</th>
					<th>{{number_format($detail->gas_projected, 2) }}</th>
					<th>{{number_format($detail->gas_flare_projected, 2) }}</th>
					<th>{{number_format($detail->concession_projected, 2) }}</th>
					<th>{{number_format($detail->misc_projected, 2) }}</th>
					<th>{{number_format($detail->signature_bonus, 2) }}</th>
					<th>{{number_format($detail->total_projected, 2) }}</th>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>