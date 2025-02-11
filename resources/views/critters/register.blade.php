<x-app-layout>
    <div class="container">

        <div class="row text-center mb-5">
            <h1>Register a Critter</h1>
        </div>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row my-2 text-danger">
            <h6 class="fs-6">* Required</h6>
        </div>

        <form action="{{ route('critters.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="name">Name:</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="description">Description:</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="type_1">Type 1:</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" id="type_1" name="type_1" value="{{ old('type_1') }}"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="type_2">Type 2 (optional):</label>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" id="type_2" name="type_2"
                        value="{{ old('type_2') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="type_3">Type 3 (optional):</label>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" id="type_3" name="type_3"
                        value="{{ old('type_3') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="habitat">Habitat:</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" id="habitat" name="habitat"
                        value="{{ old('habitat') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="encounter_difficulty">Difficulty of encounter:</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <select class="form-select" id="encounter_difficulty" name="encounter_difficulty" required>
                        <option value="common" {{ old('encounter_difficulty') == 'common' ? 'selected' : '' }}>Common
                        </option>
                        <option value="rare" {{ old('encounter_difficulty') == 'rare' ? 'selected' : '' }}>Rare
                        </option>
                        <option value="ultra rare" {{ old('encounter_difficulty') == 'ultra rare' ? 'selected' : '' }}>
                            Ultra rare</option>
                        <option value="legendary" {{ old('encounter_difficulty') == 'legendary' ? 'selected' : '' }}>
                            Legendary</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="image">Picture (PNG, max 5MB, 1024x1024px):</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <input class="form-control" type="file" id="image" name="image" accept=".png" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4 text-end">
                    <label for="sound">Sound (MP3, max 2MB):</label><span class="text-danger">*</span>
                </div>
                <div class="col-6">
                    <input class="form-control" type="file" id="sound" name="sound" accept=".mp3" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <button class="btn btn-primary" type="submit">Create Critter</button>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>
