<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau Rapport') }}
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- ERROR MESSAGE IF ONE OR MORE VARIABLE IS NULL --}}
            @if ($errors->any())
                <div class="alert alert-error shadow-lg mb-9">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>
                            ERREUR ! Vous avez oublié . <b>Veuillez remplir tous les champs obligatoires.</b>
                        </span>
                    </div>
                </div>
            @endif
            {{-- END ERROR MESSAGE --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="/nouveauRapport" method="post">
                                    @csrf
                                    <div class="container text-center text-black flex flex-col items-center">
                                        {{-- NOM PRATICIEN --}}
                                        <div class="mb-8 indicator">
                                            <span class="indicator-item badge">Obligatoire</span>
                                            <label for="exampleInputEmail1" class="form-label mr-3">Nom du Praticien</label>
                                            <select class="select select-bordered w-full max-w-xs" name="praticien">
                                                <option selected="selected" disabled>Choisissez un praticien</option>
                                                @foreach ($praticiens as $info)
                                                    <option value="{{ $info->PRA_NUM }}">{{ $info->PRA_NOM." ".$info->PRA_PRENOM }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- DATE DE RAPPORT --}}
                                        <div class="mb-8 indicator">
                                            <span class="indicator-item badge">Obligatoire</span>
                                            <label class="form-label">Date du Rapport</label>
                                            <input type="datetime-local" class="input input-bordered w-full max-w-xs" name="date">
                                        </div>
                                        {{-- BILAN RAPPORT --}}
                                        <div class="mb-8 indicator">
                                            <span class="indicator-item badge">Obligatoire</span>
                                            <label class="form-label">Bilan du Rapport</label>
                                            <input type="text" placeholder="Exemple : Médecin a rappeler" class="input input-bordered w-full max-w-xs" name="bilan">
                                        </div>
                                        {{-- MOTIF DU RAPPORT --}}
                                        <div class="mb-12 indicator">
                                            <label class="form-label">Motif du Rapport</label>
                                            <input type="text" placeholder="Exemple : Cancer du poumon" class="input input-bordered w-full max-w-xs" name="motif">
                                        </div>
                                        {{-- MEDICAMENT --}}
                                        <div class="grid grid-cols-2">
                                            <div class="form-control pb-8 items-center mr-4">
                                                <label class="form-label">Ajouter un médicament</label>
                                                <select name="medoc1" class="select select-bordered w-full max-w-xs mb-3">
                                                    <option selected="selected" value="0" disabled>Choisissez votre medoc</option>
                                                    @foreach ($medocs as $info)
                                                        <option value="{{ $info->MED_DEPOTLEGAL }}">{{ $info->MED_NOMCOMMERCIAL }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="range" min="0" max="5" value="0" class="range" step="1" name="qte1">
                                                <div class="w-full flex justify-between text-xs px-2">
                                                    <span>0</span>
                                                    <span>1</span>
                                                    <span>2</span>
                                                    <span>3</span>
                                                    <span>4</span>
                                                    <span>5</span>
                                                </div>
                                            </div>
                                            <div class="form-control pb-8 items-center">
                                                <label class="form-label">Ajouter un médicament</label>
                                                <select name="medoc2" class="select select-bordered w-full max-w-xs mb-3">
                                                    <option selected="selected" value="0" disabled>Choisissez votre medoc</option>
                                                    @foreach ($medocs as $info)
                                                        <option value="{{ $info->MED_DEPOTLEGAL }}">{{ $info->MED_NOMCOMMERCIAL }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="range" min="0" max="5" value="0" class="range" step="1" name="qte2">
                                                <div class="w-full flex justify-between text-xs px-2">
                                                    <span>0</span>
                                                    <span>1</span>
                                                    <span>2</span>
                                                    <span>3</span>
                                                    <span>4</span>
                                                    <span>5</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md">Ajouter un nouveau rapport</button>
                                        <h1>
                                            {{-- DISPLAY INITIAL NOM & --}}
                                        </h1>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>