<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechercher un praticien') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                        <!-- <div class="text-right" style="margin-right: 30%">  -->
                            <div class="mb-8">
                                <label class="form-label">Nom du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_NOM }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Prénom du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_PRENOM }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Adresse du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_ADRESSE }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Ville du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_VILLE }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Code Postal du Practicien :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_CP }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Coéfficient de notoriété :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->PRA_COEFNOTORIETE }}" disabled>
                            </div>
                            <div class="mb-8">
                                <label class="form-label">Lieu d'exercice :</label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $praticien->TYP_CODE }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>