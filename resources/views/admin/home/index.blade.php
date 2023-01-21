@extends('layouts.admin')
@section('title')
    Home
@endsection
@section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <i data-feather="home"></i> <strong>Dashboard</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="card stat-widget">
                                        <div class="card-body">
                                            <h5 class="card-title">User</h5>
                                            <h2>{{ $user }}</h2>
                                            <p>
                                                <i class="fas fa-user fa-2x"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card stat-widget">
                                        <div class="card-body">
                                            <h5 class="card-title">Gejala</h5>
                                            <h2>{{ $gejala }}</h2>
                                            <i class="fa-solid fa-pills fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card stat-widget">
                                        <div class="card-body">
                                            <h5 class="card-title">Penyakit</h5>
                                            <h2>{{ $penyakit }}</h2>
                                            <p><i class="fa-sharp fa-solid fa-virus fa-2x"></i></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card stat-widget">
                                        <div class="card-body">
                                            <h5 class="card-title">Rule</h5>
                                            <h2>{{ $rule }}</h2>
                                            <p><i class="fa-solid fa-user-gear fa-2x"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card stat-widget">
                                        <div class="card-body">
                                            <h5 class="card-title">Hasil</h5>
                                            <h2>{{ $hasil }}</h2>
                                            <p>
                                                <i class="fa-solid fa-book fa-2x"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
