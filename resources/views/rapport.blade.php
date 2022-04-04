<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Rapports') }}
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- SUCCES MESSAGE WITH FLASH SESSION --}}
            @if (session('success'))
                <div class="alert alert-success shadow-lg mb-9">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>
                            {{ session('success') }}
                        </span>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class ="container overflow-x-auto text-black border-slate-600">
                                <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4" onclick="window.location.href = '/nouveauRapport';">Nouveau Rapport</button>
                                    <table class="table table-zebra w-full text-center border-slate-600">
                                        <thead>
                                            <tr class="text-white">
                                                <td class="bg-blue-800">PDF</td>
                                                <td class="bg-blue-800">Praticien</td>
                                                <td class="bg-blue-800">Date</td>
                                                <td class="bg-blue-800">Bilan</td>
                                                <td class="bg-blue-800">Motif</td>
                                                <td class="bg-blue-800">Medicament</td>
                                                <td class="bg-blue-800">Qte</td>
                                            </tr>
                                        </thead>
                                        <tbody >
                                                @foreach($rapports as $info)
                                                <tr>
                                                    <td>
                                                        <a href=""><img src="https://img.icons8.com/material-rounded/96/000000/download--v1.png"/></a>
                                                    </td>
                                                    <td>
                                                        <p>{{ $info->PRA_PRENOM }} {{ $info->PRA_NOM }}</p>
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
                                                    <td>
                                                        <ul>
                                                    @foreach($medocsQte as $infoMed)
                                                        @if ($infoMed->RAP_NUM == $info->RAP_NUM)
                                                            <li>{{ $infoMed->MED_NOMCOMMERCIAL }}</li>
                                                        @endif
                                                    @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                    @foreach($medocsQte as $infoMed)
                                                        @if ($infoMed->RAP_NUM == $info->RAP_NUM)
                                                            <li>{{ $infoMed->OFF_QTE }}</li>
                                                        @endif
                                                    @endforeach
                                                        </ul>
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