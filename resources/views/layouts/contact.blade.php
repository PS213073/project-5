@include('layouts.header')

<section class="py-11">
    <h2 class="text-center text-3xl font-bold pb-16">Contact</h2>
    <div class="px-9 grid grid-cols-2">
        <div class="flex flex-col pr-6">
            <div class="pr-8">
                <iframe
                    src="https://www.google.com/maps/d/u/0/embed?mid=1aJ3zSXV3hPvEbUGhE4BZZCdVFEsyGdU&ehbc=2E312F&noprof=1"
                    width="590" height="400"></iframe>
            </div>

            <h3>Plan je route naar een van onze filialen:</h3>
            <div class="flex justify-between">
                <input type="button" value="Neunen">
                <input type="button" value="Veldhoven">
                <input type="button" value="Best">
            </div>
        </div>
        <form action="" class="flex flex-col gap-4">
            <label for="">Naam*</label>
            <input type="text" name="name" id="name">
            <label for="">Telefoonnummer*</label>
            <input type="text" name="telefoonnummer" id="telefoonnummer">
            <label for="">Email*</label>
            <input type="text" name="email" id="email">
            <label for="">Facatuurnummer</label>
            <input type="text" name="facatuurnummer" id="facatuurnummer">
            <label for="">Bericht*</label>
            {{-- <input type="textarea" name="bericht" id="berict"> --}}

            <input type="button">
        </form>
    </div>
</section>

@include('layouts.footer')
