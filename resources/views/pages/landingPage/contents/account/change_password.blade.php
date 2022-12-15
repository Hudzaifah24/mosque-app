@extends('pages.landingPage.index')

@section('content')
    <main class="w-full flex justify-center flex-col p-6">
        <h1 class="w-full text-3xl text-black text-center">Ganti Password</h1>

        <div class="flex justify-center flex-wrap">
            <div class="lg:w-1/2 w-full my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <form action="" method="POST" class="p-10 bg-white rounded shadow-xl">
                        @csrf
                        @method('POST')
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="current_password">Password Lama</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="current_password" name="current" type="password" required="" placeholder="Password Lama" aria-label=_current_password">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password">Password Baru</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Password" aria-label="password">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="password_confirmation">Konfirmasi Password Baru</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password_confirmation" name="password_confirmation" type="password" required="" placeholder="Ulangi Password" aria-label="password_confirmation">
                        </div>
                        <div class="mt-6 flex gap-2">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection