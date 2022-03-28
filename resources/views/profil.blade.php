<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier mon profil') }}
        </h2>
    </x-slot>
    
    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="/profil" method="post" class="text-center text-black">
                                    @csrf
                                    <div class="container text-center text-black flex flex-col justify-center items-center">
                                        <div class="mb-4">  
                                            <label class="form-label">Nom du visiteur :</label>
                                            <input value="{{$visiteurs = auth()->user()->VIS_NOM}}" type="text" class="form-control input input-bordered w-full max-w-xs" name="nom" required>
                                        </div>
                                        <div class="mb-4">  
                                            <label class="form-label">Prénom du visiteur :</label>
                                            <input value="{{$visiteurs = auth()->user()->Vis_PRENOM}}" type="text" class="form-control input input-bordered w-full max-w-xs" name="prenom" required>
                                        </div>
                                        <div class="mb-4">  
                                            <label for="exampleInputEmail1" class="form-label">Adresse :</label>
                                            <input value="{{$visiteurs = auth()->user()->VIS_ADRESSE}}" type="text" class="form-control input input-bordered w-full max-w-xs" name="adresse" required>
                                        </div>
                                        <div class="mb-4">  
                                            <label class="form-label">Ville :</label>
                                            <input value="{{$visiteurs = auth()->user()->VIS_VILLE}}" type="text" class="form-control input input-bordered w-full max-w-xs" name="ville" required>
                                        </div>
                                        <div class="mb-4">  
                                            <label class="form-label">Code postal :</label>
                                            <input value="{{$visiteurs = auth()->user()->VIS_CP}}" type="text" class="form-control input input-bordered w-full max-w-xs" name="cp" required>
                                        </div>
                                        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md">Modifier le profil</button>
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
