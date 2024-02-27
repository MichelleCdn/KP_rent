@extends('layouts.app')
@section('title')
invoice_{{$transaction->created_at->format('dmy')}}
@endsection
@push('post-style')
@endpush

@section('content')
    <div class="row mb-32 gy-32">

        <div class="col-12">
            <div class="row g-32">
                <div class="col-12 col-xl-8">
                    <div id="invoice" class="card border-none hp-invoice-card">
                        <div class="card-body">
                            <div class="text-center">
                                <h2>INVOICE NUMBER #{{ $transaction->id }}</h2>
                            </div>

                            <div class="divider"></div>

                            <div class="row justify-content-between">
                                <div class="col-4 pb-16 hp-print-info">
                                    <p class="hp-text-color-black-100 hp-text-color-dark-0 hp-input-label">CUSTOMER
                                        INFORMATION:</p>
                                    <p>{{ $transaction->customer->name }}</p>
                                    <p>{{ $transaction->customer->address }} </p>
                                    <p>{{ $transaction->customer->phone }}</p>
                                </div>

                                <div class="col-8 pb-16 hp-print-info">
                                    <p class="hp-text-color-black-100 hp-text-color-dark-0 hp-input-label text-end">ORDER
                                        INFORMATION:</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Metode Bayar: {{ $transaction->payment_method }}</p>
                                            <p>Penjamin: {{ $transaction->warranty_type }}</p>
                                            <p>Status: {{ $transaction->status }}</p>
                                            <p>Id : #{{ $transaction->id }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p>Tanggal Pesan: {{ $transaction->created_at->format('d/m/Y') }}</p>
                                            <p>Tanggal Pinjam: {{ $transaction->start_at->format('d/m/Y') }}</p>
                                            <p>Tanggal Kembali: {{ $transaction->end_at->format('d/m/Y') }}</p>
                                            <p>Catatan: {{ $transaction->additional_info ?? '-' }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="row mx-n24">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="pt-0 pe-0 pb-14 bg-transparent">Nama Asset
                                                    </th>
                                                    <th scope="col"
                                                        class="pt-0 pe-0 pb-14 bg-transparent hp-invoice-table-th text-center">
                                                        Kategori</th>
                                                    <th scope="col"
                                                        class="pt-0 pe-0 pb-14 bg-transparent hp-invoice-table-th">Harga
                                                    </th>
                                                    <th scope="col"
                                                        class="pt-0 px-0 pb-14 bg-transparent hp-invoice-table-th text-center">
                                                        Jumlah</th>
                                                        <th scope="col"
                                                        class="pt-0 px-0 pb-14 bg-transparent hp-invoice-table-th text-center">
                                                        Ongkos Kirim</th>
                                                    <th scope="col"
                                                        class="pt-0 ps-0 pb-14 bg-transparent hp-invoice-table-th text-end">
                                                        Subtotal</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="py-6 pe-0">
                                                        <p>{{ $transaction->asset->name }}</p>
                                                    </td>
                                                    <td class="py-6 text-center">
                                                        <p>{{ $transaction->asset->category->name }}</p>
                                                    </td>
                                                    <td class="py-6 pe-0">
                                                        <p>{{ number_format($transaction->asset->price, 2, ',', '.') }}</p>
                                                    </td>
                                                    <td class="py-6 px-0 text-center">
                                                        <p>{{ $transaction->quantity }}</p>
                                                    </td>
                                                    <td class="py-6 pe-0">
                                                        <p>{{ number_format($transaction->shipping_fee, 2, ',', '.') }}</p>
                                                    </td>
                                                    <td class="py-6 ps-0 text-end">
                                                        <h5>Rp. {{ number_format($transaction->total_price, 2, ',', '.') }}
                                                        </h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="row justify-content-end">
                                <div class="col-12 col-xl-4 pb-16 hp-print-checkout">
                                    <div class="row align-items-between justify-content-center flex-column align-items-end">
                                        <h5 class="text-primary hp-flex-none w-auto">Total</h5>
                                        <h5 class="text-primary hp-flex-none w-auto">Rp.
                                            {{ number_format($transaction->total_price, 2, ',', '.') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-4 hp-print-none">
                    <div class="card border-none mb-32">
                        <div class="card-body">

                            <div onclick="printDiv('invoice')">
                                <button type="button" class="btn btn-primary w-100 btn-ghost">
                                    <i class="ri-printer-line remix-icon" style="font-size: 16px;"></i>
                                    <span>Print Bukti</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('post-script')
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
