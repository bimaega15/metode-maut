@extends('layouts.admin')
@section('title')
    Hasil
@endsection
@section('content')
    @push('css')
        <style>
            .photoviewer-modal {
                background-color: transparent;
                border: none;
                border-radius: 0;
                box-shadow: 0 0 6px 2px rgba(0, 0, 0, .3);
            }

            .photoviewer-header .photoviewer-toolbar {
                background-color: rgba(0, 0, 0, .5);
            }

            .photoviewer-stage {
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: rgba(0, 0, 0, .85);
                border: none;
            }

            .photoviewer-footer .photoviewer-toolbar {
                background-color: rgba(0, 0, 0, .5);
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }

            .photoviewer-header,
            .photoviewer-footer {
                border-radius: 0;
                pointer-events: none;
            }

            .photoviewer-title {
                color: #ccc;
            }

            .photoviewer-button {
                color: #ccc;
                pointer-events: auto;
            }

            .photoviewer-header .photoviewer-button:hover,
            .photoviewer-footer .photoviewer-button:hover {
                color: white;
            }
        </style>
    @endpush

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @include('utils.session')
                        <div class="card-header">
                            <i data-feather="book"></i> <strong>Hasil</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>No. handphone</th>
                                            <th>Tingkat kecanduan</th>
                                            <th>Presentase</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.hasil.model')
@endsection

@push('js')
    @include('admin.hasil.script')
@endpush
