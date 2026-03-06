@extends('layout.main')

@section('content')

<div class="container">

    <h4 class="mb-4">
        Hasil Pencarian :
        <span class="text-primary">{{ $search }}</span>
    </h4>

    @if($letters->count() > 0)

        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Pengirim</th>
                            <th>Tujuan</th>
                            <th>Tanggal Surat</th>
                            <th>Jenis</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($letters as $letter)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $letter->reference_number }}</td>

                            <td>{{ $letter->from ?? '-' }}</td>

                            <td>{{ $letter->to ?? '-' }}</td>

                            <td>{{ $letter->letter_date }}</td>

                            <td>

                                @if($letter->type == 'incoming')
                                    <span class="badge bg-label-primary">
                                        Surat Masuk
                                    </span>
                                @else
                                    <span class="badge bg-label-success">
                                        Surat Keluar
                                    </span>
                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $letters->links() }}
        </div>

    @else

        <div class="alert alert-warning">
            Surat tidak ditemukan.
        </div>

    @endif

</div>

@endsection
