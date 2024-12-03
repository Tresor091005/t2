@extends('layout.layout')


@section('main')
    <form action="{{ route('cooperatives.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Créer cooperative</h5>

                <!-- Vertical Form -->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="inputNanme4" name="nom" value="{{ old('nom', $cooperative->nom ?? '') }}">
                        @if ($errors->has('nom'))
                            <span class="text-danger">{{ $errors->first('nom') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Telephone</label>
                        <input type="number" class="form-control" id="inputEmail4" name="telephone" value="{{ old('telephone', $cooperative->telephone ?? '') }}">
                        @if ($errors->has('telephone'))
                            <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ old('email', $cooperative->email ?? '') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="inputState" class="form-label">Filiere</label>
                        <select id="inputState" class="form-select" name="filiere_id">
                            <option selected="">Choisir...</option>
                            @foreach ($filieres as $filiere)
                            <option value={{$filiere->id}}>{{$filiere->nom}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('filiere_id'))
                            <span class="text-danger">{{ $errors->first('filiere_id') }}</span>
                        @endif
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>

    </form>
@endsection
