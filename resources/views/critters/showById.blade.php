<x-app-layout>


    <div class="container ">
        <div class="row text-start mb-4">
            <div>
                <a href="{{ route('critters.all') }}" class="fs-1 text-white"><i
                        class="bi bi-arrow-left-circle-fill "></i></a>
            </div>

        </div>

        <div class="row">
            <audio hidden>
                <source src="/media/sounds/{{ $critter->sound }}" type="audio/mpeg">
            </audio>

            <div class="col-12 col-md-6 mx-auto">
                <div class="card mb-4 mx-auto" style="width: 350px">
                    <img src="/media/images/{{ $critter->image }}" class="card-img-top p-2"
                        alt="{{ $critter->image == null ? 'No image' : $critter->name . ' photo' }}">

                    <div class="card-body">
                        <h5 class="card-title fs-5"><strong>ID:</strong> {{ $critter->id }}</h5>
                        <h5 class="fs-5"><strong>Registered by:</strong> {{ $investigatorName }}</h5>
                        <h5 class="fs-5"><strong>Name:</strong> {{ $critter->name }}</h5>


                        <div class="card-footer text-center">
                            <button class="btn btn-primary soundBtn"><strong>Sound</strong></button>
                            @if (Route::has('login'))
                                @if (auth()->id() == $critter->user_id)
                                    <a href="{{ route('critters.edit', ['id' => $critter->id]) }}"
                                        class="btn btn-success">Edit Critter</a>
                                @endif
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mx-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text"><strong>Description:</strong> {{ $critter->description }}</p>

                        <p class="card-text"><strong>Types:</strong>
                            {{ $critter->type_1 }}{{ $critter->type_2 ? ', ' . $critter->type_2 : '' }}{{ $critter->type_3 ? ',' . $critter->type_3 : '' }}
                        </p>

                        <p class="card-text"><strong>Habitat:</strong> {{ $critter->region }}</p>
                        <p class="card-text"><strong>Encounter Difficulty:</strong>
                            {{ $critter->encounter_difficulty }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</x-app-layout>
