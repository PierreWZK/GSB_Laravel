<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Rapports') }}
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class ="container overflow-x-auto text-black border-slate-600">
                                <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4" onclick="window.location.href = '/nouveauRapport';">Nouveau Rapport</button>
                                    <table class="table table-zebra w-full text-center border-slate-600">
                                        <thead>
                                            <tr>
                                                <td>Visiteur</strong></td>
                                                <td>Numéro</td>
                                                <td>Praticien</td>
                                                <td>Date</td>
                                                <td>Bilan</td>
                                                <td>Motif</td>
                                            </tr>
                                        </thead>
                                        <tbody >
                                                @foreach($rapports as $info)
                                                <tr>
                                                    <td>
                                                        <p>{{ $info->VIS_MATRICULE }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $info->RAP_NUM }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $info->PRA_NUM }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ date("d/m/Y H:i", strToTime($info->RAP_DATE)) }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $info->RAP_BILAN }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $info->RAP_MOTIF }}</p>
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