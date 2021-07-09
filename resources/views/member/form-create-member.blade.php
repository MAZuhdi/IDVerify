<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="{{ route('member.store') }}">
            @bind($members)
            @csrf

            <!-- ID Number -->
            <div>
                <x-label for="idnumber" :value="__('ID Number')" />

                <x-input id="idnumber" class="block mt-1 w-full" type="text" name="idnumber" :value="old('idnumber')" required autofocus />
            </div>

            <!-- Position -->
            <div>
                <x-label for="position" :value="__('Position')" />
                <x-form-select class="block mt-1 w-full" name="position" >
                    @foreach ( $positions as $position )
                    <option value={{$position->name}}>{{$position->name}}</option>
                    @endforeach
                 </x-form-select>
            </div>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Call Name -->
            <div>
                <x-label for="callname" :value="__('Call Name')" />

                <x-input id="callname" class="block mt-1 w-full" type="text" name="callname" :value="old('callname')" required autofocus />
            </div>

            <!-- Phone number -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone Number')" />

                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
            </div>

            {{-- <!-- Position -->
            <div class="mt-4">
                <x-form-select name="country_code" :options="$options" />
            </div> --}}

            <!-- Validity -->
            <div class="mt-4">
                <x-label for="validity" :value="__('Valid Until')" />

                <x-input id="validity" class="block mt-1 w-full" type="date" name="validity" :value="old('validity')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            @endbind
        </form>
    </x-auth-card>
</x-guest-layout>
