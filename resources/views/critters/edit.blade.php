<x-app-layout>


    <div class="container kalam-regular">

        <div class="row text-start mb-4">
            <div>
                <a href="{{ route('critters.all') }}" class="fs-1 text-white"><i
                        class="bi bi-arrow-left-circle-fill "></i></a>
            </div>

        </div>


        <audio id="{{ $critter->name }}Sound" hidden>
            <source src="/media/sounds/{{ $critter->sound }}" type="audio/mpeg">
        </audio>
        <form action="{{ route('critters.update', $critter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-1">

                <input type="hidden" name="id" value="{{ $critter->id }}">

                <div class="col-12 col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="/media/images/{{ $critter->image }}" class="card-img-top p-2"
                            alt="{{ $critter->image == null ? 'No image' : $critter->name . ' photo' }}">

                        <div class="card-body">
                            <h5 class="card-title">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" value="{{ $critter->name }}">
                            </h5>

                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Description:</strong>
                                <textarea id="description" name="description" class="form-control">{{ $critter->description }}</textarea>

                                @foreach ($errors->get('description') as $error)
                                    <span class="text-danger">{{ $error }}</span><br>
                                @endforeach
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>First type:</strong>
                                    <input type="text" name="type_1" class="form-control"
                                        value="{{ $critter->type_1 }}">
                                </li>
                                <li class="list-group-item">
                                    <strong>Second type:</strong>
                                    <input type="text" name="type_2" class="form-control"
                                        value="{{ $critter->type_2 }}">
                                </li>
                                <li class="list-group-item">
                                    <strong>Third type:</strong>
                                    <input type="text" name="type_3" class="form-control"
                                        value="{{ $critter->type_3 }}">
                                </li>
                            </ul>
                            <strong>Habitat:</strong>
                            <input type="text" name="habitat" class="form-control" value="{{ $critter->region }}">
                            <strong>Encounter Difficulty:</strong>
                            <select name="encounter_difficulty" class="form-select">
                                <option value="common"
                                    {{ $critter->encounter_difficulty == 'common' ? 'selected' : '' }}>Common
                                </option>
                                <option value="rare"
                                    {{ $critter->encounter_difficulty == 'rare' ? 'selected' : '' }}>Rare
                                </option>
                                <option value="ultra rare"
                                    {{ $critter->encounter_difficulty == 'ultra rare' ? 'selected' : '' }}>
                                    Ultra Rare</option>
                                <option value="legendary"
                                    {{ $critter->encounter_difficulty == 'legendary' ? 'selected' : '' }}>
                                    Legendary</option>
                            </select>
                            <strong>Image:</strong>
                            <input class="form-control" type="file" id="image" name="image" accept=".png">
                            <strong>Sound:</strong>
                            <input class="form-control" type="file" id="sound" name="sound" accept=".mp3">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update Critter</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
        <div class="row text-center mt-5">
            <form action="{{ route('critters.destroy', ['id' => $critter->id]) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este critter?');">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete Critter</button>
            </form>
        </div>

    </div>
</x-app-layout>
