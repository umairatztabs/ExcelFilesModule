@extends('layouts.default')
@section('content')


<div class="container mt-5 text-center">
    <div class=" d-flex justify-content-center">
        <a href="{{ route('importView') }}" class="btn btn-primary">Import</a>
    </div>
    @if($files->isNotEmpty())
    <div class="container mt-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">File</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $file->name }}</td>
                    <td>
                        <a href="{{ route('view', ['file' => $file->id]) }}"><button type="button" class="btn btn-secondary">View</button></a>
                    </td>
                    <td>
                        <a href="{{ route('export', ['file' => $file->id]) }}"><button type="button" class="btn btn-secondary">Download</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else

    <div>
        <h4>
            No data. Please upload files
        </h4>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ implode('', $errors->all(':message')) }}</strong>
    </div>
    @endif
</div>

@stop