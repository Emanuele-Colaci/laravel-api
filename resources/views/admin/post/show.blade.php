@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-5">
                    <div>
                        <h1>{{ $project->titolo }}</h1>
                    </div>
                    <div>
                        <a href="{{ route('admin.project.index') }}" class="btn btn-success">Proggetti</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p>{{ $project->descrizione }}</p>
            </div>
            <div class="col-12">
                <!-- VINCOLATO DAL NOME DELLA MODEL -->
                <div class="my-5">
                    @if(empty($project->type->name))
                        <h3>Tipologia non disponibile</h3>
                    @else
                        <h3 class="mb-3">Tipologia:</h3>
                        <p class="mx-3">{{ $project->type->name }}</p>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="my-5">
                    @if($project->technologies->count() > 0)
                        <h3 class="control-label mb-3">Tecnologie associate:</h3>
                        <ul>
                            @foreach($project->technologies as $technology)
                                <li>{{ $technology->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nessuna tecnologia associata a questo progetto.</p>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="container-img">
                    <img src="{{ asset('storage/'. $project->image) }}" height="100%" width="100%">
                </div>
            </div>
        </div>
    </div>
@endsection