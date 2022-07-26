<table>
    <thead>
        <tr>
            <td><b>Kode Toko</b></td>
            <td><b>Area Sales</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->kode_toko }}</td>
            <td>{{ $item->area_sales }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
