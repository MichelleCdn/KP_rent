@extends('layouts.app')

@push('post-style')
@endpush

@section('modal')
    <div class="modal fade" id="categoryFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="asset-form" action="{{ route('tools.categories.store') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryFormModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="method-input" name="_method" value="POST">
                        <div>
                            <label for="nameLabel" class="form-label">Nama Kategori</label>
                            <input type="text" name="name" class="form-control" id="nameLabel">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mb-32 g-32">
        <div class="col flex-grow-1 overflow-hidden">
            <div class="row g-32">
                <div class="col-12 col-md-10">
                    <h2>Data Kategori Alat Pinjaman</h2>
                    <p class="hp-p1-body mb-0">Berikut merupakan tabel berisi list kategori alat yang tersedia di database.</p>
                </div>
                <div class="col-12 col-md-2">
                    @if (auth()->user()->hasRole('admin'))
                    <button class="btn btn-primary btn-modal" data-method="POST" data-title="Tambah Kategori" data-bs-toggle="modal"
                        data-bs-target="#categoryFormModal" data-route="{{ route('tools.categories.store') }}">Tambah</button>
                    @endif
                </div>
                <div class="col-12">
                    <div class="rounded-top border-start border-end border-top border-black-40 hp-border-color-dark-80">
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Kategori Alat</th>
                                        <th class="text-center">Jumlah Alat Terdaftar</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        @if (auth()->user()->hasRole('admin'))
                                        <th class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($categories as $item)
                                        <tr class="text-center">
                                            <td class="align-middle">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="align-middle text-start">
                                                {{ $item->name }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->tools_count }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->created_at->format('d F Y') }}
                                            </td>
                                            @if (auth()->user()->hasRole('admin'))
                                            <td class="align-middle">
                                                <div class="d-inline-block" id="profile-menu-dropdown"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <button type="button" class="btn btn-text btn-icon-only">
                                                        <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1"
                                                            style="font-size: 24px;"></i>
                                                    </button>
                                                </div>

                                                <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                                                    <li>
                                                        <a class="dropdown-item btn-modal btn-edit" data-bs-toggle="modal"
                                                            data-bs-target="#categoryFormModal" data-method="PUT"
                                                            data-title="Edit Kategori" href="javascript:;"
                                                            data-route="{{ route('tools.categories.update', $item->id) }}"
                                                            data-item="{{ json_encode($item->toArray()) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item btn-hapus" href="{{route('tools.categories.destroy', $item->id)}}">Hapus</a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Maaf, Tidak ada Alat yang tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('post-script')
@endpush
