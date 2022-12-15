@extends('pages.dashboard.index')

@section('kajian', 'active-nav-link')

@section('content')
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Edit Kajian</h1>

        <div class="flex flex-wrap">
            <div class="w-full my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-list mr-3"></i> Edit Kajian
                </p>
                <div class="leading-loose">
                    <form action="{{ route('kajian.update', $kajian->id) }}" method="POST" class="p-10 bg-white rounded shadow-xl">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label class="block text-sm text-gray-600" for="title">Judul</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="title" name="title" type="text" required="" placeholder="Judul Kajian" aria-label="title" value="{{ $kajian->title }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="speaker">Penceramah</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="speaker" name="speaker" type="text" required="" placeholder="Penceramah" aria-label="speaker" value="{{ $kajian->speaker }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="jam">Jam</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="jam" name="jam" type="time" required="" placeholder="Jam" aria-label="jam" value="{{ $kajian->jam }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="tanggal">Tanggal</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="tanggal" name="tanggal" type="date" required="" placeholder="date" aria-label="date" value="{{ $kajian->tanggal }}">
                        </div>
                        <div class="mt-2">
                            <label class=" block text-sm text-gray-600" for="description">Deskripsi</label>
                            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="description" name="desc" rows="6" placeholder="description" aria-label="description">{{ $kajian->desc }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="status">Status</label>
                            <div class="flex gap-10">
                                <label class="flex flex-col text-sm text-gray-600" for="active">
                                    Active
                                    <input {{ $kajian->status == 'active' ? 'checked' : '' }} class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="active" name="status" value="active" type="radio" required="">
                                </label>
                                <label class="flex flex-col text-sm text-gray-600" for="inactive">
                                    Inactive
                                    <input {{ $kajian->status == 'inactive' ? 'checked' : '' }} class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="inactive" name="status" value="inactive" type="radio" required="">
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
