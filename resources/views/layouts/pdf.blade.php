<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img class="ml-45 mt-8 indicator text-center" src="images/2.png" alt="GSB">

    {{-- VISUEL VISITEUR --}}
    <div>
        VISITEUR :
        <ul>
            <li>Matricule : {{Auth::user()->VIS_MATRICULE}}</li>
            <li>Nom et Prénom : {{Auth::user()->VIS_NOM}} {{Auth::user()->Vis_PRENOM}}</li>
            <li>Adresse : {{Auth::user()->VIS_ADRESSE}}, {{Auth::user()->VIS_VILLE}} {{Auth::user()->VIS_CP}}</li>
        </ul>
    </div>

    {{-- VISUEL PRATICIEN --}}
    <div>
        PRATICIEN :
        <ul>
            <li>Matricule : {{$praticiens->PRA_NUM}}</li>
            <li>Nom et Prénom : {{$praticiens->PRA_NOM}} {{$praticiens->PRA_PRENOM}}</li>
            <li>Adresse : {{$praticiens->PRA_ADRESSE}}, {{$praticiens->PRA_VILLE}} {{$praticiens->PRA_CP}}</li>
        </ul>
    </div>

    {{-- VISUEL BILAN --}}
    <div>
        RAPPORT :
        <ul>
            <li>Date : {{ date("d/m/Y H:i", strToTime($rapports->RAP_DATE)) }}</li>
            <li>Bilan : {{$rapports->RAP_BILAN}}</li>
            <li>Motif : {{$rapports->RAP_MOTIF}}</li>
        </ul>
    </div>
</body>
</html>