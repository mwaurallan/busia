@push('third_party_stylesheets')
    @include('fuel::layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('third_party_scripts')
    @include('fuel::layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush