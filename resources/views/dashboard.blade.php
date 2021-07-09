<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex justify-center sm:items-center py-4 sm:pt-0" >
        <div class="container w-1/2 bg-white w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
            <div class="space-y-4">
                <span class="block ">
                    <h1 class="font-sans text-6xl font-bold text-center">IDVerify</h1>
                </span>
                <span class="block text-justify italic">
                    <P>Cegah penyalahgunaan identitas dengan menggunakan ini. Aplikasi untuk melakukan verifikasi terhadap keanggotaan suatu organisasi menggunakan nomor keanggotaan.</P>
                </span>
                <span class="block text-center">
                    <form method="GET" action="{{ route('member.check') }}">
                        {{-- @csrf --}}
                        <!-- Nomor Keanggotaan -->
                        <div>
                            {{-- <input id="idnumber"
                            type="text"
                            class="@error('idnumber') border-red-500 is-invalid @enderror bg-gray-200 focus:bg-white text-center md:px-12 xm:px-8"
                            name="idnumber"
                            placeholder="Enter member ID"> --}}
                                        <!-- ID Number -->
                            <div>
                                <x-input id="idnumber" class="block mt-1 w-full @error('idnumber') border-red-500 is-invalid @enderror" type="text" name="idnumber" :value="old('idnumber')" required autofocus />
                            </div>
                            {{-- <input type="submit" value="Search" class="py-2 bg-blue-700 hover:bg-blue-300 dark:bg-gray-500 text-white"> --}}
                            @error('idnumber')
                                {{-- @if ($message == "The idnumber field is required.")
                                    <div class="text-center hover:text-red-900 text-red-600">{{'Tidak bisa lebih dari 10 Angka  '}}</div>
                                @else --}}
                                    <div class="text-center hover:text-red-900 text-red-600">{{ $message }}</div>
                                {{-- @endif --}}
                            @enderror
                            <x-button class="mt-4">
                                {{ __('Search') }}
                            </x-button>
                        </div>
                    </form>
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
