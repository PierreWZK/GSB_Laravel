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
                                <div class="container overflow-x-auto text-black border-slate-600">
                                    <table class="table table-zebra w-full text-center border-slate-600">
                                        <thead>
                                            <tr>
                                                <td>Dépot Légal</td>
                                                <td>Nom du Médicament</td>
                                                <td>Composition du Mécicament</td>
                                                <td>Effets du Médicament</td>
                                                <td>Les Contre-indication</td>
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