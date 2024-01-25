
@extends('layouts/main')

@section('content')

    <div class="container-fluid mt-6 mb-6">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card shadow rounded">
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('user.update', $data->id) }}" method="post">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="text" class="form-control" name="email" value="{{ $data->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" name="role" value="{{ $data->role }}" required>
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @section('css')
        @parent
        <style>
            .card-header {
                border-bottom: 0;
            }

            .form-group {
                margin-bottom: 29px;
            }

            .btn-primary,
            .btn-warning {
                padding: 12px;
            }
        </style>

    @endsection
@endsection
