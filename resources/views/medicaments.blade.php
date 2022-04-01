<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Médicaments') }}
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
                                <form action="{{ route('researchMed') }}" class="flex items-center d-flex mr-3 text-black mb-3">
                                    <div class="form-group mr-1 flex">
                                        <input type="text" name="q" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Recherche par Effets">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <select name="med" class="input input-bordered w-full max-w-xs">
                                            <option selected="selected" disabled>Filtre par Nom</option>
                                            @foreach ($medicaments as $info)
                                                <option value="{{ $info->MED_NOMCOMMERCIAL }}">{{ $info->MED_NOMCOMMERCIAL }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-1 ml-2">Chercher</button>
                                </form>
                                
                                <!-- ===REINITIALISATION=== -->
                                <div class="mb-4 text-black">
                                    <form action="{{ route('researchMed') }}" name="Reini">
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
                                                <td class="bg-blue-800">Dépot Légal</td>
                                                <td class="bg-blue-800">Nom du Médicament</td>
                                                <td class="bg-blue-800">Composition du Mécicament</td>
                                                <td class="bg-blue-800">Effets du Médicament</td>
                                                <td class="bg-blue-800">Les Contre-indication</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($medicaments as $info)
                                            <tr>
                                                <td>
                                                    <p>{{ $info->MED_DEPOTLEGAL }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->MED_NOMCOMMERCIAL }}</p>
                                                </td>
                                                <td class="break-all word-">
                                                    <p>{{ $info->MED_COMPOSITION }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->MED_EFFETS }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $info->MED_CONTREINDIC }}</p>
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