@extends('layout.layout')

@section('main')
    <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Modifier filiere</h5>

                <!-- Vertical Form -->
                <form class="row g-3">
                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="inputNanme4" name="nom" value="{{ old('nom', $filiere->nom ?? '') }}">
                        @if ($errors->has('nom'))
                            <span class="text-danger">{{ $errors->first('nom') }}</span>
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
