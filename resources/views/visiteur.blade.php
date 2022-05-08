<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechercher un visiteur') }}
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
                                <form action="{{ route('research') }}" class="flex items-center d-flex mr-3 text-black mb-3">
                                    <div class="form-group mr-1 flex">
                                        <input type="text" name="q" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Recherche par Nom">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <select name="ville" class="input input-bordered w-full max-w-xs">
                                            <option selected="selected" disabled>Filtre par Ville</option>
                                            @foreach ($visiteurs as $info)
                                                <option value="{{ $info->VIS_VILLE }}">{{ $info->VIS_VILLE }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-1 ml-2">Chercher</button>
                                </form>

                                <!-- ===REINITIALISATION=== -->
                                <div class="mb-4 text-black">
                                    <form action="{{ route('research') }}" name="Reini">
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
                                                <td class="bg-blue-800">Matricule</td>
                                                <td class="bg-blue-800">Nom</td>
                                                <td class="bg-blue-800">Prénom</td>
                                                <td class="bg-blue-800">Adresse</td>
                                                <td class="bg-blue-800">Ville</td>
                                                <td class="bg-blue-800">Code Labo</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($visiteurs as $info)
                                                @if ($info->VIS_MATRICULE != "aaa")
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
                                                        <p>{{ $info->VIS_VILLE }}, {{ $info->VIS_CP }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $info->LAB_CODE }}</p>
                                                    </td>
                                                </tr>
                                                @endif
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