<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('file') }} <br>
            {{ Form::file('file', $file->file, ['class' => 'form-control ' . ($errors->has('file') ? ' is-invalid' : ''), 'placeholder' => 'File']) }}
            {!! $errors->first('file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fileName') }}
            {{ Form::text('fileName', $file->fileName, ['class' => 'form-control' . ($errors->has('fileName') ? ' is-invalid' : ''), 'placeholder' => 'Filename']) }}
            {!! $errors->first('fileName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('fileType') }}
            {{ Form::text('fileType', $file->fileType, ['class' => 'form-control' . ($errors->has('fileType') ? ' is-invalid' : ''), 'placeholder' => 'Filetype']) }}
            {!! $errors->first('fileType', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        {{-- <div class="form-group">
            {{ Form::label('downloads') }}
            {{ Form::text('downloads', $file->downloads, ['class' => 'form-control' . ($errors->has('downloads') ? ' is-invalid' : ''), 'placeholder' => 'Downloads']) }}
            {!! $errors->first('downloads', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        {{-- <div class="form-group">
            {{ Form::label('storage_id') }}
            {{ Form::text('storage_id', $file->storage_id, ['class' => 'form-control' . ($errors->has('storage_id') ? ' is-invalid' : ''), 'placeholder' => 'Storage Id']) }}
            {!! $errors->first('storage_id', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">

            {{ Form::label('category_id') }}
            <select name="category_id" id="category_id" class="form-control" >
                <option value="">select category</option>
                @foreach ($categories as $category)
                    <option value=" {{ $category->id }} " title="{{ $category->description }}">
                        {{ $category->category }} </option>
                @endforeach
            </select>
               {{--  {{ Form::label('category_id', $file->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }} --}}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
