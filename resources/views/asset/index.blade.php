@extends('layouts.app')

@push('post-style')
@endpush

@section('modal')
    <div class="modal fade" id="assetFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="assetFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="asset-form" action="{{ route('tools.store') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assetFormModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="method-input" name="_method" value="POST">
                        <div class="mb-24">
                            <label for="nameLabel" class="form-label">Nama Alat</label>
                            <input type="text" name="name" class="form-control" id="nameLabel">
                        </div>
                        <div class="mb-24">
                            <label for="typeLabel" class="form-label">Jenis Alat</label>
                            <select class="form-select" name="category_id" aria-label="Jenis Alat">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-24">
                            <label for="sizeLabel" class="form-label">Ukuran Alat</label>
                            <input type="text" name="size" class="form-control" id="sizeLabel">
                        </div>
                        <div class="mb-24">
                            <label for="priceLabel" class="form-label">Harga Alat</label>
                            <input type="number" name="price" class="form-control" id="priceLabel">
                        </div>
                        <div class="mb-24">
                            <label for="stockLabel" class="form-label">Stok Alat</label>
                            <input type="number" name="stock" class="form-control" id="stockLabel">
                        </div>
                        <div class="mb-24">
                            <label for="infoLabel" class="form-label">Keterangan Tambahan</label>
                            <textarea class="form-control" id="infoLabel" name="additional_info" aria-label="Keterangan Tambahan"></textarea>
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
                    <h2>Data Alat Pinjaman</h2>
                    <p class="hp-p1-body mb-0">Berikut merupakan tabel berisi list alat yang tersedia di database.</p>
                </div>
                <div class="col-12 col-md-2">
                    @if (auth()->user()->hasRole('admin'))
                    <button class="btn btn-primary btn-modal" data-method="POST" data-title="Tambah Alat" data-bs-toggle="modal"
                        data-bs-target="#assetFormModal" data-route="{{ route('tools.store') }}">Tambah</button>
                    @endif
                </div>
                <div class="col-12">
                    <div class="rounded-top border-start border-end border-top border-black-40 hp-border-color-dark-80">
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Alat</th>
                                        <th>Biaya Sewa</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Ukuran</th>
                                        <th>Keterangan Tambahan</th>
                                        @if (auth()->user()->hasRole('admin'))
                                            <th class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($assets as $item)
                                        <tr>
                                            <td class="align-middle">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->name }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->price }}
                                            </td>

                                            <td class="align-middle text-center">
                                                {{ $item->stock }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ $item->category->name }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ $item->size }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->additional_info }}
                                            </td>

                                            @if (auth()->user()->hasRole('admin'))
                                                <td class="align-middle text-center">
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
                                                                data-bs-target="#assetFormModal" data-method="PUT"
                                                                data-title="Edit Alat" href="javascript:;"
                                                                data-route="{{ route('tools.update', $item->id) }}"
                                                                data-item="{{ json_encode($item->toArray()) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item btn-hapus" href="{{route('tools.destroy', $item->id)}}">Hapus</a>
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
