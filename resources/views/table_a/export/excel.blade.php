<table>
    <thead>
        <tr>
            <td><b>Kode Baru</b></td>
            <td><b>Kode Lama</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->kode_baru }}</td>
            <td>{{ $item->kode_lama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
