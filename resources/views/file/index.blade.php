@extends('layouts.app')

@section('template_title')
    Files
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Files') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('files.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        {{-- <th>File</th> --}}
                                        <th class="text-center">Filename</th>
                                        <th class="text-center">Filetype</th>
                                        <th class="text-center">Downloads</th>


                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            {{-- <td>{{ $file->file }}</td> --}}
                                            <td class="text-center">{{ $file->fileName }}</td>
                                            <td class="text-center">{{ $file->fileType }}</td>
                                            <td class="text-center">{{ $file->downloads }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('files.destroy', $file->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success "
                                                        href="{{ route('download', $file) }}"><i
                                                            class="fas fa-cloud-download-alt"></i> Download</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('files.edit', $file->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $files->links() !!}
            </div>
        </div>
    </div>
@endsection
