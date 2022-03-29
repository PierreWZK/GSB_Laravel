<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechercher un praticien') }}
        </h2>
    </x-slot>

    
    <div class="py-9">
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
                                            <p class="py-4">Vous pouvez chercher une personne en particulier grâce a son Nom, Prénom ou sa Ville</p>
                                            @include('searchPraticien')
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
                                            @include('searchPraticien')
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
                                                <td>Nom</td>
                                                <td>Prénom</td>
                                                <td>Adresse</td>
                                                <td>Ville</td>
                                                <td>Notoriété</td>
                                                <td>Fonction</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($praticiens as $info)
                                            <tr>
                                                <td>
                                                    <p>{{ $info->PRA_NOM }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->PRA_PRENOM }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->PRA_ADRESSE }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->PRA_VILLE }}, {{$info->PRA_CP}}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->PRA_COEFNOTORIETE }}</p>
                                                </td>
                                                <td>
                                                    @if ($info->TYP_CODE == "MH")
                                                        <p>Médecin Hospitalier</p>        
                                                    @elseif ($info->TYP_CODE == "MV")
                                                        <p>Médecin de Ville</p>    
                                                    @elseif ($info->TYP_CODE == "PH")
                                                        <p>Pharmacien Hospitalier</p>
                                                    @elseif ($info->TYP_CODE == "PO")
                                                        <p>Pharmacien Officine</p>
                                                    @elseif ($info->TYP_CODE == "PS")
                                                        <p>Personnel de santé</p>
                                                    @endif
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
{{-- 
    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container text-black">
                        <form method="get" action="{{ route('recherchePraticien') }}" class="text-center text-black mb-8">
                            @csrf
                            <select class="select select-bordered w-full max-w-xs" name="recherchePraticiens" onChange="form.submit()">
                                <option selected="selected" disabled>Choisissez un practicien</option>
                                @foreach ($praticiens as $info)
                                <option value="{{ $info->PRA_NUM }}">{{ $info->PRA_NOM." ".$info->PRA_PRENOM }} </option>
                                @endforeach
                            </select>
                        </form>
                        <div class="text-center">
                            <div class="mb-8">
                                <label class="form-label">Nom du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_NOM }} {{ $praticien->PRA_PRENOM }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Adresse du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_ADRESSE }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Ville du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_VILLE }}, {{ $praticien->PRA_CP }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Coéfficient de notoriété :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_COEFNOTORIETE }}" disabled>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Fonction du Practicien :</label>
                                @if ($praticien->TYP_CODE == "MH")
                                    <input type="text" class="input input-bordered w-full max-w-xs" value="Médecin Hospitalier" disabled>
                                @elseif ($praticien->TYP_CODE == "MV")
                                    <input type="text" class="input input-bordered w-full max-w-xs" value="Médecin de Ville" disabled>
                                @elseif ($praticien->TYP_CODE == "PH")
                                    <input type="text" class="input input-bordered w-full max-w-xs" value="Pharmacien Hospitalier" disabled>
                                @elseif ($praticien->TYP_CODE == "PO")
                                    <input type="text" class="input input-bordered w-full max-w-xs" value="Pharmacien Officine" disabled>
                                @elseif ($praticien->TYP_CODE == "PS")
                                    <input type="text" class="input input-bordered w-full max-w-xs" value="Personnel de santé" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>