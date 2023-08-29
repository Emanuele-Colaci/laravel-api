@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-5">
                    <div>
                        <h1>{{ $type->name }}</h1>
                    </div>
                    <div>
                        <a href="{{ route('admin.types.index') }}" class="btn btn-success">Tipologia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection