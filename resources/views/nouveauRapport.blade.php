<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau Rapport') }}
        </h2>
    </x-slot>
    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="/nouveauRapport" method="post">
                                    @csrf
                                    <div class="container text-center text-black">
                                        <div class="mb-8">
                                        <label for="exampleInputEmail1" class="form-label">Nom du Praticien :</label>
                                            <select class="select select-bordered w-full max-w-xs" name="practicien" required>
                                                <option selected="selected" disabled>Choisissez un practicien</option>
                                                @foreach ($praticiens as $info)
                                                <option value="{{ $info->PRA_NUM }}">{{ $info->PRA_NOM." ".$info->PRA_PRENOM }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-8">
                                            <label class="form-label">Date du Rapport :</label>
                                            <input type="datetime-local" class="input input-bordered w-full max-w-xs" name="date" required>
                                        </div>
                                        <div class="mb-8">
                                            <label class="form-label">Bilan du Rapport :</label>
                                            <input type="text" placeholder="Exemple : Médecin a rappeler" class="input input-bordered w-full max-w-xs" name="bilan" required>
                                        </div>
                                        <div class="mb-12">
                                            <label class="form-label">Motif du Rapport :</label>
                                            <input type="text" placeholder="Exemple : Cancer du poumon" class="input input-bordered w-full max-w-xs" name="motif" required>
                                        </div>
                                        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md">Ajouter un nouveau rapport</button>
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