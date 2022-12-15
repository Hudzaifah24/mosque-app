@extends('pages.dashboard.index')

@section('kajian', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Edit Uang Kas</h1>

        <div class="flex flex-wrap">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-list mr-3"></i> Edit Uang Kas
                </p>
                <div class="leading-loose">
                    <form class="p-10 bg-white rounded shadow-xl">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="amount">Jumlah</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="amount" name="amount" type="number" required="" placeholder="Jumlah Uang" aria-label="amount" value="">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="date">Tanggal</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="date" name="date" type="date" required="" placeholder="date" aria-label="date" value="">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="status">Status</label>
                            <div class="flex gap-10">
                                <label class="flex flex-col text-sm text-gray-600" for="income">
                                    Pemasukan
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="income" name="status" value="income" type="radio" required="">
                                </label>
                                <label class="flex flex-col text-sm text-gray-600" for="spend">
                                    Pengeluaran
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="spend" name="status" value="spend" type="radio" required="">
                                </label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('style')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
@endpush

@push('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
    });
</script>
@endpush
