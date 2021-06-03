@extends('layouts.app')

@section('template_title')
    {{ $rol->name ?? 'Show Rol' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rols.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Role:</strong>
                            {{ $rol->role }}
                        </div>
                        <div class="form-group">
                            <strong>Descriptionrole:</strong>
                            {{ $rol->descriptionRole }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
