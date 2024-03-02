@extends('layouts.app')

@push('post-style')
@endpush

@section('modal')
    <div class="modal fade" id="customerFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="customerFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="asset-form" action="{{ route('customers.store') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerFormModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="method-input" name="_method" value="POST">
                        <div class="mb-24">
                            <label for="nameLabel" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="name" class="form-control" id="nameLabel">
                        </div>
                        <div class="mb-24">
                            <label for="phoneLabel" class="form-label">Nomor Telepon</label>
                            <input type="text" name="phone" class="form-control" id="phoneLabel">
                        </div>
                        <div class="mb-24">
                            <label for="addressLabel" class="form-label">Alamat</label>
                            <input type="text" name="address" class="form-control" id="addressLabel">
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
                    <h2>Data Pelanggan</h2>
                    <p class="hp-p1-body mb-0">Berikut merupakan tabel berisi list pelanggan yang tersedia di database.</p>
                </div>
                <div class="col-12 col-md-2">
                    @if (auth()->user()->hasRole('admin'))
                    <button class="btn btn-primary btn-modal" data-method="POST" data-title="Tambah Pelanggan" data-bs-toggle="modal"
                        data-bs-target="#customerFormModal" data-route="{{ route('customers.store') }}">Tambah</button>
                    @endif
                </div>
                <div class="col-12">
                    <div class="rounded-top border-start border-end border-top border-black-40 hp-border-color-dark-80">
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nomor Telepon</th>
                                        <th>Alamat</th>
                                        @if (auth()->user()->hasRole('admin'))
                                        <th class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($customers as $item)
                                        <tr>
                                            <td class="align-middle">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->name }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->phone }}
                                            </td>

                                            <td class="align-middle">
                                                {{ $item->address }}
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
                                                            data-bs-target="#customerFormModal" data-method="PUT"
                                                            data-title="Edit Pelanggan" href="javascript:;"
                                                            data-route="{{ route('customers.update', $item->id) }}"
                                                            data-item="{{ json_encode($item->toArray()) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item btn-hapus" href="{{route('customers.destroy', $item->id)}}">Hapus</a>
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
