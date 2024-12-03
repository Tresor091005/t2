@extends('layout.layout')

@section('main')

<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div  style="display: flex;justify-content: space-between; align-items: center; margin-bottom: 10px">
                <h5 class="card-title">Liste cooperatives</h5>
                <a class="btn btn-primary mt-4" href="{{route('cooperatives.create')}}">Ajouter une nouvelle cooperative</a>
            </div>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Filiere</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cooperatives as $co)
                <tr>
                    <td>{{$co->nom}}</td>
                    <td>{{$co->telephone}}</td>
                    <td>{{$co->email}}</td>
                    <td>{{$co->filiere->nom}}</td>
                    <td style="display: flex">
                        <a class="btn" href="{{route('cooperatives.edit', $co->id)}}" style="margin-right: -5px"><i class="bi bi-pencil"></i></a>

                        <form action="{{route('cooperatives.destroy', $co->id)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="btn delete-button"><i class="bi bi-trash"></i></button>
                        </form>

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('js')
<script src="{{asset('assets/sweetalert2@11.js')}}"></script>

<script>
    // Sélectionnez tous les boutons avec la classe delete-button
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault(); // Empêche l'action par défaut (si elle existe)

            // Récupère le formulaire parent du bouton cliqué
            const form = button.closest(".delete-form");

            Swal.fire({
                title: "Voulez-vous vraiment supprimer cet élément ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Oui, supprimer",
                cancelButtonText: "Annuler",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                        form.submit();
                } else if (result.isDismissed) {
                    Swal.fire("Annulé", "L'élément n'a pas été supprimé.", "info");
                }
            });
        });
    });
    </script>
@endsection
