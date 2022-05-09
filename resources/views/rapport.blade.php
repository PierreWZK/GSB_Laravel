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
            @if (session('update'))
                <div class="alert alert-warning shadow-lg mb-9">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        <span>
                            {{ session('update') }}
                        </span>
                    </div>
                </div>
            @endif
            @if (session('delete'))
                <div class="alert alert-error shadow-lg mb-9">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>
                            {{ session('delete') }}
                        </span>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4 btn-success" onclick="window.location.href = '/nouveauRapport';">Nouveau Rapport</button>
                                @if (!session('empty'))
                                    <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4 btn-error" onclick="window.location.href = '/deleteRapport';">Supprimer un Rapport</button>
                                    <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4 btn-primary" onclick="window.location.href = '/updateRapportListe';">Modifier un Rapport</button>
                                @endif
                                <div class ="container overflow-x-auto text-black border-slate-600">
                                    @if (session('empty'))
                                    <div class="alert alert-warning shadow-lg my-9">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span>
                                                {{ session('empty') }}
                                            </span>
                                        </div>
                                    </div>
                                    @else
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
                                                            <a href="{{ route('pdf', ['id'=>$info->RAP_NUM]) }}" target="blank"><img src="https://img.icons8.com/material-rounded/96/000000/download--v1.png" alt="Img PDF"/></a>
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>