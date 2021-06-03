@extends('layouts.app')

@section('template_title')
    {{-- {{ $file->name ?? 'Show File' }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show File</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('files.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>File:</strong>
                            {{ $file->file }}
                        </div>
                        <div class="form-group">
                            <strong>Filename:</strong>
                            {{ $file->fileName }}
                        </div>
                        <div class="form-group">
                            <strong>Filetype:</strong>
                            {{ $file->fileType }}
                        </div>
                        <div class="form-group">
                            <strong>Downloads:</strong>
                            {{ $file->downloads }}
                        </div>
                        <div class="form-group">
                            <strong>Storage Id:</strong>
                            {{ $file->storage_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $file->category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
