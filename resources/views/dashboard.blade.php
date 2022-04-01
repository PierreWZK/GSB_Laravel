<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de l\'entreprise GSB') }}
        </h2>
    </x-slot>
    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center text-black p-6">
                <div class="flex">
                    <div class="">
                        <div class="flex flex-wrap">
                            <div class="card w-96 bg-base-100 shadow-xl image-full my-auto mb-4 mr-6">
                                <figure><img src="images/Rapports.JPG" alt="RAPPORT IMAGE" /></figure>
                                <div class="card-body">
                                    <h2 class="card-title">Rapport</h2>
                                    <p>Vous pouvez voir tout vos rapport ainsi qu'en créer de nouveau !</p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary" onclick="window.location.href = '/rapport';">Aller</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card w-96 bg-base-100 shadow-xl image-full mb-4">
                                <figure><img src="images/Praticiens.JPG" alt="Shoes" /></figure>
                                <div class="card-body">
                                    <h2 class="card-title">Praticien</h2>
                                    <p>Vous pouvez rechercher un practicien dans ce tableau !</p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary" onclick="window.location.href = '/praticien';">Aller</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="card w-96 bg-base-100 shadow-xl image-full my-auto mr-6">
                                <figure><img src="images/Visiteurs.JPG" alt="Shoes" /></figure>
                                <div class="card-body">
                                    <h2 class="card-title">Visiteur</h2>
                                    <p>Vous pouvez rechercher un visiteur dans ce tableau !</p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary" onclick="window.location.href = '/visiteur';">Aller</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card w-96 bg-base-100 shadow-xl image-full mb-auto">
                                <figure><img src="images/Medicaments.JPG" alt="Shoes" /></figure>
                                <div class="card-body">
                                    <h2 class="card-title">Médicaments</h2>
                                    <p>Vous pouvez rechercher un médicaments dans ce tableau !</p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary" onclick="window.location.href = '/medicaments';">Aller</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span hidden> {{$nbRapports = 0}} </span>
                    <span hidden> {{$nbPraticiens = 0}} </span>
                    <span hidden> {{$nbVisiteurs = 0}} </span>
                    <span hidden> {{$nbMedicaments = 0}} </span>
                    @foreach($rapports as $infoR)
                    <span hidden>{{$nbRapports++}}</span>
                    @endforeach
                    @foreach($praticiens as $infoP)
                    <span hidden>{{$nbPraticiens++}}</span>
                    @endforeach
                    @foreach($visiteurs as $infoV)
                    <span hidden>{{$nbVisiteurs++}}</span>
                    @endforeach
                    @foreach($medicaments as $infoM)
                    <span hidden>{{$nbMedicaments++}}</span>
                    @endforeach
                    <div class='flex-auto my-auto'>
                        <div class="stats stats-vertical shadow">
                            <div class="stat">
                              <div class="stat-title text-black">Nb de Rapports</div>
                              <div class="stat-value text-primary">{{$nbRapports}}</div>
                              {{-- <div class="stat-desc">DESCRIPTION</div> --}}
                            </div>
                            <div class="stat">
                              <div class="stat-title text-black">Nb de Praticiens</div>
                              <div class="stat-value text-primary">{{$nbPraticiens}}</div>
                              {{-- <div class="stat-desc">DESCRIPTION</div> --}}
                            </div>
                            <div class="stat">
                              <div class="stat-title text-black">Nb de Visiteurs</div>
                              <div class="stat-value text-primary">{{$nbVisiteurs}}</div>
                              {{-- <div class="stat-desc">DESCRIPTION</div> --}}
                            </div>
                            <div class="stat">
                                <div class="stat-title">Nb de Médicaments</div>
                                <div class="stat-value text-primary">{{$nbMedicaments}}</div>
                              {{-- <div class="stat-desc">DESCRIPTION</div> --}}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>