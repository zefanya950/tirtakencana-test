<table>
    <thead>
        <tr>
            <td><b>Kode Toko</b></td>
            <td><b>Nominal Transaksi</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->kode_toko }}</td>
            <td>{{ number_format($item->nominal_transaksi, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
