@extends('layouts.app')

@section('content')

@push('styles')
{{-- <link rel="stylesheet" href="{{asset("datatables/bootstrap.min.css")}}"> --}}
{{-- <link rel="stylesheet" href="{{asset("datatables/font-awesome.min.css")}}"> --}}
@endpush

<div style="width: 80%; margin:0 auto;">
    <div class="card">
        <div class="card-header fw-bold text-center">SISTEMA INTERNOS/ASISTIDOS</div>
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts() }}
@endpush