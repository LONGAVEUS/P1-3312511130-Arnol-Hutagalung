@extends('layouts.list')

@section('title', 'Daftar Produk')

@section('content')
<div class="ml-10 mt-20">
    <table border="1" class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
                <th>Harga Produk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nama as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item }}</td>
                    <td>{{ $desc[$index] }}</td>
                    <td>{{ $harga[$index] }}</td>
                    <td>
                        <form action="{{ route('produk.delete', $id[$index]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm
                            ('Are you sure you want to delete {{ $item }}?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
