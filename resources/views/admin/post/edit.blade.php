@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica Proggetto</h1>
            </div>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-6">
            <form action=" {{ Route('admin.project.update', $project) }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group border p-4">
                        <div class="row">
                            <div class="col-12 my-3">
                                <!-- Titolo -->
                                <label class="control-label my-3">Titolo</label>
                                <input type="text" name="titolo" id="titolo" placeholder="Inserisci il titolo" class="form-control @error('titolo') is-invalid @enderror" value="{{ old('titolo') ?? $project->titolo}}" required>
                                @error('titolo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <img src="{{ asset('storage/'.$project->image) }}" width="600px" height="500px">
                            </div>
                            <div class="col-12 my-3">
                                <!-- Immagine -->
                                <label class="control-label my-3">Immagine</label>
                                <input type="file" name="image" id="image" placeholder="Inserisci la tua immagine" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') ?? $project->image}}">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 my-3">
                                <!-- Descrizione -->
                                <label class="control-label my-3">Descrizione</label>
                                <textarea name="descrizione" id="descrizione" placeholder="Inserisci la descrizione" cols="30" rows="10" class="form-control @error('descrizione') is-invalid @enderror" required>{{ old('descrizione') ?? $project->descrizione }}</textarea>
                                @error('descrizione')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <label class="control-label my-2">Tipologia:</label>
                                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror" value="">
                                    <option value="">Modifica La Tipologia</option>
                                    @foreach ($types as $type)
                                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 my-3">
                                <!-- Data -->
                                <label class="control-label my-3">Data</label>
                                <input type="date" name="data" id="data" placeholder="Inserisci la data" class="form-control @error('data') is-invalid @enderror" value="{{ old('data') ?? $project->data }}" required>
                                @error('data')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-4">
                                <label class="control-label my-2">Tecnologie:</label>
                                @foreach($technologies as $technology)
                                    <div class="form-check">
                                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input @error('technologies') is-invalid @enderror"
                                        @if(in_array($technology->id, $project->technologies->pluck('id')->toArray())) checked @endif>
                                        <label class="form-check-label">{{ $technology->name }}</label>
                                    </div>
                                @endforeach
                                @error('technologies')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 text-center my-5">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success">Aggiungi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection