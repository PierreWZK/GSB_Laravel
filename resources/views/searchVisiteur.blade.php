<form action="{{ route('research') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="matricule" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Matricule">
        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Chercher</button>
    </div>
</form>
<form action="{{ route('research') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="nom" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Nom">
        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Chercher</button>
    </div>
</form>
<form action="{{ route('research') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="prenom" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Prénom">
        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Chercher</button>
    </div>
</form>
<form action="{{ route('research') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="ville" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Ville">
        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Chercher</button>
    </div>
</form>
<form action="{{ route('research') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="codelabo" class="input input-bordered w-full max-w-xs" value="{{ request()->q ?? '' }}" placeholder="Code Labo">
        <button type="submit" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-md mb-4">Chercher</button>
    </div>
</form>