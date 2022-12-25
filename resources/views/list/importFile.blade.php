@extends('layouts.default')
@section('content')
<div class="container mt-5 text-center">

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @if (Session::has('success'))
        <div class="alert alert-success">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{ implode('', $errors->all(':message')) }}</strong>
        </div>
        @endif
        @csrf

        <div class="container bg-grey">

            <div class="form-group  d-flex">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label mx-5" for="customFile">Choose a file (xlsx,xls)</label>
                </div>
                <button class="btn btn-primary">upload</button>
            </div>
        </div>

    </form>
</div>
@stop