@extends('layouts.app')

@push('post-style')
@endpush

@section('modal')
    {{-- Tambah Transaksi Modal --}}
    <div class="modal fade" id="transactionFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="transactionFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="transaction-form" action="{{ route('transactions.store') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transactionFormModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="method-input" name="_method" value="POST">
                        <div class="mb-24">
                            <label for="nameLabel" class="form-label">Nama Pelanggan</label>
                            <select class="form-control" name="customer_id" id="select-customer"
                                placeholder="Pilih Pelanggan">
                                <option value="" selected disabled>-- Pilih Pelanggan --</option>
                                @forelse ($customers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-24">
                            <label for="typeLabel" class="form-label">Alat Yang Dipinjam</label>
                            <select class="form-control" name="asset_id" id="select-tool" placeholder="Pilih Alat">
                                <option value="" selected disabled data-price="0">-- Pilih Alat --</option>
                                @forelse ($assets as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-24">
                            <label for="sizeLabel" class="form-label">Tanggal Sewa</label>
                            {{-- <input type="date" name="start_at" class="form-control" id="sizeLabel"> --}}
                            <div class="input-group">
                                <input type="date" name="start_at" class="form-control" placeholder="Mulai Sewa"
                                    aria-label="Mulai Sewa">
                                <span class="input-group-text">Sampai</span>
                                <input type="date" name="end_at" class="form-control" placeholder="Selesai Sewa"
                                    aria-label="Selesai Sewa">
                            </div>
                        </div>
                        <div class="mb-24">
                            <label for="qtyLabel" class="form-label">Jumlah Yang di Sewa</label>
                            <input type="number" name="quantity" value="1" min="1" class="form-control"
                                id="qtyLabel">
                        </div>
                        <div class="mb-24">
                            <label for="methodLabel" class="form-label">Jenis Pembayaran</label>
                            <input type="text" name="payment_method" class="form-control" id="methodLabel">
                        </div>
                        <div class="mb-24">
                            <label for="shipFeeLabel" class="form-label">Ongkos Kirim</label>
                            <input type="number" name="shipping_fee" value="0" class="form-control" id="shipFeeLabel">
                        </div>
                        <div class="mb-24">
                            <label for="totalLabel" class="form-label">Total Biaya</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="total_price" value="0" class="form-control" id="totalLabel"
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-24">
                            <label for="warrantLabel" class="form-label">Jenis Jaminan</label>
                            <select class="form-control" name="warranty_type" id="warrantLabel">
                                <option value="" disabled selected>-- Pilih Jaminan --</option>
                                <option value="KTP">KTP</option>
                                <option value="SIM">SIM</option>
                            </select>
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

    {{-- Rubah Status Modal --}}
    <div class="modal fade" id="transactionFormStatusModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="transactionFormStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="transaction-status-form" action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transactionFormStatusModalLabel">Rubah Status Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="method-input" name="_method" value="PUT">
                        <div class="mb-0">
                            <label for="statusLabel" class="form-label">Rubah Ke Status</label>
                            <select class="form-control" name="status" id="statusLabel" placeholder="Pilih Pelanggan">
                                <option value="dipesan">Dipesan</option>
                                <option value="sedang disewakan">Sedang Disewakan</option>
                                <option value="telah dikembalikan">Telah Dikembalikan</option>
                            </select>
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
                    <h2>Data Riwayat Transaksi</h2>
                    <p class="hp-p1-body mb-0">Berikut merupakan tabel berisi list transaksi yang tersedia di database.</p>
                </div>
                <div class="col-12 col-md-2">
                    @if (auth()->user()->hasRole('admin'))
                    <button class="btn btn-primary btn-modal" data-method="POST" data-title="Buat Transaksi"
                        data-bs-toggle="modal" data-bs-target="#transactionFormModal"
                        data-route="{{ route('transactions.store') }}">Pinjam Barang</button>
                    @endif
                </div>
                <div class="col-12">
                    {{-- Filter --}}
                    <div class="rounded bg-white" style="padding: 5px; margin-bottom:5px;">
                       <form action="{{ route('transactions-filter-index') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-0">
                                        <label for="sizeLabel" class="form-label">Mulai Sewa</label>
                                        {{-- <input type="date" name="start_at" class="form-control" id="sizeLabel"> --}}
                                        <input type="date" name="start_at" class="form-control" placeholder="Mulai Sewa"
                                            aria-label="Mulai Sewa">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-0">
                                        <label for="statusLabel" class="form-label">Status</label>
                                        <select class="form-control" name="status" id="statusLabel" placeholder="Pilih Pelanggan">
                                            @php
                                                $status = isset($status) ? $status : '';
                                            @endphp
                                            <option value="dipesan" {{ $status  == 'dipesan' ? 'selected' : '' }}>Dipesan</option>
                                            <option value="sedang disewakan" {{ $status  == 'sedang disewakan' ? 'selected' : '' }}>Sedang Disewakan</option>
                                            <option value="telah dikembalikan" {{ $status  == 'telah dikembalikan' ? 'selected' : '' }} >Telah Dikembalikan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="sizeLabel" class="form-label"></label>
                                    <div class="d-flex flex-center">
                                        <a href="{{ route('transactions.index') }}" class="btn btn-text me-5">Reset</a>
                                        <button type="submit" id="btnFilter" class="btn btn-primary">Terapkan</button>
                                    </div>
                                </div>
                            </div>
                       </form>
                    </div>
                    <div class="rounded-top border-start border-end border-top border-black-40 hp-border-color-dark-80">
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <thead>
                                    <tr class="text-center align-middle">
                                        <th>#</th>
                                        <th>Tanggal Sewa</th>
                                        <th class="text-start">Nama Alat</th>
                                        <th>Jumlah Pinjam</th>
                                        <th class="text-start">Peminjam</th>
                                        <th>Mulai Tanggal</th>
                                        <th>Selesai Tanggal</th>
                                        <th>Total Biaya</th>
                                        <th>Status</th>
                                        @if (auth()->user()->hasRole('admin'))
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($transactions as $item)
                                        <tr class="text-center align-middle">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $item->created_at->format('d F Y') }}
                                            </td>

                                            <td>
                                                {{ $item->asset->name }}
                                            </td>

                                            <td>
                                                {{ $item->quantity }}
                                            </td>

                                            <td>
                                                {{ $item->customer->name }}
                                            </td>
                                            <td>
                                                {{ $item->start_at->format('d F Y') }}
                                            </td>
                                            <td>
                                                {{ $item->end_at->format('d F Y') }}
                                            </td>
                                            <td>
                                                Rp. {{ number_format($item->total_price,2,",",".") }} {{ $item->fine_back != 0 ? '+ ( Rp. '.number_format($item->fine_back,2,",",".").' - Denda) ' : ""}}
                                            </td>
                                            <td>
                                                {{ ucfirst($item->status) }}
                                            </td>
                                            @if (auth()->user()->hasRole('admin'))
                                            <td>
                                                <div class="d-inline-block" id="profile-menu-dropdown"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <button type="button" class="btn btn-text btn-icon-only">
                                                        <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1"
                                                            style="font-size: 24px;"></i>
                                                    </button>
                                                </div>

                                                <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                                                    @if ($item->status != 'telah dikembalikan')
                                                        <li>
                                                            <a class="dropdown-item btn-edit-status"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#transactionFormStatusModal"
                                                                data-route="{{ route('transactions.update', $item->id) }}"
                                                                data-status="{{ $item->status }}"
                                                                href="javascript:;">Ubah
                                                                Status</a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('transactions.show', $item->id) }}">Detail</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item btn-hapus"
                                                            href="{{ route('transactions.destroy', $item->id) }}">Hapus</a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Maaf, Tidak ada Alat yang tersedia.
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
    <script>
        $(document).ready(function() {
        
            // $.ajax({
            //     type: "GET",
            //     url: "{{ route('tools.index') }}",
            //     dataType: "json",
            //     success: function(response) {
            //         // console.log("🚀 ~ file: index.blade.php:177 ~ $ ~ response:", response)
            //         const $select = $('#select-tool').selectize({
            //             valueField: 'id',
            //             labelField: 'name',
            //             searchField: 'name',
            //             options: response,
            //             // dropdownParent: "body",
            //             inputClass: 'form-control',
            //             onChange: function(value) {
            //                 alert(value);
            //             }
            //         });
            //     }
            // });

            // $.ajax({
            //     type: "GET",
            //     url: "{{ route('customers.index') }}",
            //     dataType: "json",
            //     success: function(response) {
            //         // console.log("🚀 ~ file: index.blade.php:177 ~ $ ~ response:", response)
            //         const $select = $('#select-customer').selectize({
            //             valueField: 'id',
            //             labelField: 'name',
            //             searchField: 'name',
            //             options: response,
            //             // dropdownParent: "body",
            //             inputClass: 'form-control',
            //         });
            //     }
            // });

            $('#select-tool').on('change', function() {
                calculateTotal();
            });

            $('#qtyLabel').on('change', function() {
                calculateTotal();
            });
            $('#shipFeeLabel').on('change', function() {
                calculateTotal();
            });

            $('.btn-edit-status').on('click', function() {
                const route = $(this).data('route');
                const status = $(this).data('status');

                $('#transaction-status-form').attr('action', route);

                // toggle attr selected
                let select = $('#statusLabel');
                select.find('option')
                select.removeAttr('selected');
                select.find("option[value='" + status + "']").attr("selected", "selected");
            });

            calculateTotal = function() {
                const tool_price = $('#select-tool').find(':selected').attr('data-price');
                const qty = $('#qtyLabel').val();
                const ship_fee = $('#shipFeeLabel').val();

                const total = Number(tool_price * qty) + Number(ship_fee);
                console.log("🚀 ~ file: index.blade.php:240 ~ $ ~ total:", total)

                $('#totalLabel').val(Number(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            }

            


        });
    </script>
@endpush
