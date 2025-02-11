<x-app-layout>

    <div class="row text-center w-100 align-items-center g-5">
        <div class="col-sm-12 col-md-6 px-5">
            <h1 class="fs-1 kalam-bold">WELCOME TO CRITTOPEDIA</h1>
            <br>
            <h3 class="text-justified kalam-regular">Crittopedia is a global platform for documenting and exploring
                unique creatures.
                Whether you're a researcher or an enthusiast, you can contribute findings, share knowledge, and connect
                with others. Register now to add to our growing critter database and help uncover nature's mysteries.
                Join us in creating the ultimate critter encyclopedia!</h3>
            <br>
        </div>


        <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-center">
            <div class="pedia text-start">
                <div id="carousel" class="carousel slide">
                    <div class="carousel-inner h-100">
                        @foreach ($critters as $index => $critter)
                            <a href="{{ route('critters.showById', ['id' => $critter->id]) }}">
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="/media/images/{{ $critter->image }}"
                                        class="d-block w-100 carousel-img rounded" alt="{{ $critter->name }} image">
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
                <div class="buttons text-center pt-4 row">
                    <div id="pediaBtnLeftDiv" class="col-6 text-end pe-4 pediaBtnDiv">
                        <a href="">
                            <i id="btnPediaLeft" class="bi bi-arrow-left fs-1 text-black" data-bs-target="#carousel"
                                data-bs-slide="prev"></i>
                        </a>

                    </div>
                    <div id="pediaBtnRightDiv" class="col-6 text-start ps-4 pediaBtnDiv">
                        <a href="">
                            <i id="btnPediaRight" class="bi bi-arrow-right fs-1 text-black" data-bs-target="#carousel"
                                data-bs-slide="next"></i>
                        </a>
                    </div>


                </div>
            </div>

        </div>
    </div>


</x-app-layout>
