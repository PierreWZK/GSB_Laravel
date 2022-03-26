<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechercher un visiteur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- ===DEBUT MODAL=== -->
                                <div class="mb-4 text-black">

                                    <!-- ===RECHERCHER=== -->
                                    <label for="my-modal-4" class="btn modal-button mb-4">Rechercher</label>
                                    <input type="checkbox" id="my-modal-4" class="modal-toggle">
                                    <label for="my-modal-4" class="modal cursor-pointer">
                                        <label class="modal-box relative" for="">
                                            <label for="my-modal-4" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                            <h3 class="text-lg font-bold">Chercher un visiteur</h3>
                                            <p class="py-4">Vous pouvez chercher une personne en particulier grâce a son Nom, Prénom, Matricule, Ville, Code Postal ou Code Labo</p>
                                            @include('search')
                                        </label>
                                    </label>

                                    <!-- ===TRIER PAR=== -->
                                    <!-- <label for="my-modal-4" class="btn modal-button mb-4">Trier par</label>
                                    <input type="checkbox" id="my-modal-4" class="modal-toggle">
                                    <label for="my-modal-4" class="modal cursor-pointer">
                                        <label class="modal-box relative" for="">
                                            <label for="my-modal-4" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                            <h3 class="text-lg font-bold">Trie du tableau</h3>
                                            <p class="py-4">Vous pouvez trier le tableau ci-dessous par Nom, Prénom ou Ville</p>
                                            @include('search')
                                        </label>
                                    </label> -->

                                    <!-- ===REINITIALISATION=== -->
                                    <form action="{{ route('research') }}" name="Reini">
                                        <div>
                                            <input type="text" name="resa" value="0" hidden>
                                            <button type="submit" name="res" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Réinitialiser les filtres</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- ===FIN MODAL=== -->

                                <div class="container overflow-x-auto text-black border-slate-600">
                                    <table class="table table-zebra w-full text-center border-slate-600">
                                        <thead>
                                            <tr>
                                                <td>Matricule</td>
                                                <td>Nom</td>
                                                <td>Prénom</td>
                                                <td>Adresse</td>
                                                <td>Ville</td>
                                                <td>Code postale</td>
                                                <td>Code Labo</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($visiteurs as $info)
                                            <tr>
                                                <td>
                                                    <p>{{ $info->VIS_MATRICULE }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->VIS_NOM }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->Vis_PRENOM }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->VIS_ADRESSE }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->VIS_VILLE }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->VIS_CP }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->LAB_CODE }}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>