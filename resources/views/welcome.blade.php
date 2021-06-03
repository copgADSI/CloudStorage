@extends('layouts.app')

@section('content')
    <div class="container mt-5 py-3 ">
        <div class="d-flex justify-content-center">...</div>

        <div class="d-flex justify-content-between">
            <div class="form group m-3 py-3 border border-secondary" style="width: 80vh">
                <p class="h1">
                    <i class="fas fa-file alert alert-primary border border-primary  m-3 py-3 "></i>
                    <i class="fas fa-long-arrow-alt-right border border-secondary m-3 py-3"></i>
                    <i class="fas fa-cloud-upload-alt alert alert-success border border-success  m-3 py-3  "></i>
                </p>
                <h3 class="m-3 py-3">upload your files at any time.</h3>
            </div>



            <div class="form group m-3 py-3 border border-secondary" style="width: 80vh">
                <p class="h1">
                    <i class="fas fa-database alert alert-warning border border-secondary  m-3 py-3"></i>
                    <i class="fas fa-chart-line alert alert-info border border-secondary  m-3 py-3"></i>
                </p>

                <h3 class=" m-3 py-3">You has storage capacity of 15 GB and analytics.</h3>
            </div>
            <div class="form-group m-3 py-3 border border-secondary" style="width: 80vh">
                <p class="h1">
                    <i class="fas fa-trash-alt alert alert-danger border border-danger   m-3 py-3"></i>
                    <i class="fas fa-wrench alert alert-warning border border-warning m-3 py-3"></i>
                    <i class="fas fa-file-download  alert alert-success border border-success m-3 py-3"></i>
                </p>
                <h3 class="m-3 py-3">Can you do deleted, update or download</h3>
            </div>

        </div>

    </div>

@endsection
