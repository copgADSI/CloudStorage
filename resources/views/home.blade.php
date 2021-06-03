@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">100%
                            </div>
                        </div>

                        <a href="{{ route('files.index') }}" id="button" class="btn btn-info m-2"><i class="far fa-file-image"></i>
                            Manage
                            files </a>

                        @if (auth()->user()->role === 'administrator')
                            <a href="{{ route('categories.index') }}" id="button" class="btn btn-info m-2"><i
                                    class="fas fa-globe"></i>
                                Manage categories </a>
                            <a href="{{ route('users.index') }}" id="button"class="btn btn-info m-2"><i class="fas fa-users"></i>
                                Manage
                                users </a>
                            <a href="{{ route('get.files') }}" id="button" class="btn btn-info m-2"><i class="fas fa-file-code"></i>
                                Get files </a>
                            

                        @endif
                        <a href="{{ route('users.index') }}" id="button" class="btn btn-info m-2"><i class="fas fa-user-cog"></i>
                            Manage profile </a>

                        <a href="#detailsCapacity" id="button" class="btn btn-info m-2"><i class="fas fa-chart-bar"></i>
                            Analytics </a>
                        <br><br>

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

    </div>
    <div class="container" style="height: 300px;width:300px">
        <div class="d-flex justify-content-center ">
            <label for="myChart" id="fileTotal" class="form-label">Files Totals: </label>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <canvas id="myCapacity"></canvas>
            <canvas id="myChart"></canvas>
        </div>

        @if (auth()->user()->role === 'administrator')
            <div class="d-flex justify-content-center mb-6">
                <canvas id="totalUsers"></canvas>

            </div>
        @endif


    </div>
@endsection
