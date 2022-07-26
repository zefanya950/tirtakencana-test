<table>
    <thead>
        <tr>
            <td><b>Kode Sales</b></td>
            <td><b>Nama Sales</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->kode_sales }}</td>
            <td>{{ $item->nama_sales }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
