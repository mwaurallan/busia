@extends('layouts.app')
@section('title', 'Pumps')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Pumps
            <small>Manage Pumps</small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' => 'All Pumps'])
                @slot('tool')
                    <div class="box-tools">
                        <a class="btn btn-primary float-right"
                           href="{{ route('pumps.create') }}">
                            Add New
                        </a>
                    </div>
                @endslot
                <div class="table-responsive">
                    @include('fuel::pumps.table')
                </div>
        @endcomponent


    </section>
    <!-- /.content -->

@endsection
