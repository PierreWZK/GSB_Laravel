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
                                <!-- ===SEARCH=== -->
                                <form action="{{ route('researchPra') }}" class="flex items-center d-flex mr-3 text-black mb-3">
                                    <div class="form-group mr-1 flex">
                                        <input type="text" name="q" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Recherche par Nom">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <select name="ville" class="input input-bordered w-full max-w-xs">
                                            <option selected="selected" disabled>Filtre par Ville</option>
                                            @foreach ($praticiens as $info)
                                                <option value="{{ $info->PRA_VILLE }}">{{ $info->PRA_VILLE }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <select name="type" class="input input-bordered w-full max-w-xs">
                                            <option selected="selected" disabled>Filtre par Fonction</option>
                                            <option value="MH">Médecin Hospitalier</option>
                                            <option value="MV">Médecin de Ville</option>
                                            <option value="PS">Pharmacien Hospitalier</option>
                                            <option value="PH">Personnel de santé</option>
                                            <option value="PO">Pharmacien Officine</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-1 ml-2">Chercher</button>
                                </form>
                                
                                <!-- ===REINITIALISATION=== -->
                                <div class="mb-4 text-black">
                                    <form action="{{ route('researchPra') }}" name="Reini">
                                        <div>
                                            <input type="text" name="resa" value="0" hidden>
                                            <button type="submit" name="res" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Réinitialiser les filtres</button>
                                        </div>
                                    </form>
                                </div>
                                

                                <div class="container overflow-x-auto text-black border-slate-600">
                                    <table class="table table-zebra w-full text-center border-slate-600">
                                        <thead>
                                            <tr class="text-white">
                                                <td class="bg-blue-800">Nom</td>
                                                <td class="bg-blue-800">Prénom</td>
                                                <td class="bg-blue-800">Adresse</td>
                                                <td class="bg-blue-800">Ville</td>
                                                <td class="bg-blue-800">Notoriété</td>
                                                <td class="bg-blue-800">Fonction</td>
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