<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Age -->
        <div>
            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
            <input id="age" name="age" type="number" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('age', $user->age) }}">
        </div>

        <!-- Gender -->
       <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            {{-- <input id="gender" name="gender" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('gender', $user->gender) }}"> --}}
            <div>
                <select id="gender" name="gender" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input id="location" name="location" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('location', $user->location) }}">
        </div>

        <!-- Language -->
        <div>
            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
            <div class="flex">
                <input id="selectedLanguages" name="language" type="text" readonly class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('language', $user->language) }}">
                <select id="languageDropdown" class="w-4 mt-1 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" id="clearLanguages">Clear</option>
                    <option value="Bahasa Melayu">Bahasa Melayu</option>
                    <option value="English">English</option>
                    <option value="Mandarin">Mandarin</option>
                    <option value="Hindi">Hindi</option>
                </select>
            </div>
        </div>

        {{-- <div>
            <label for="user_profile" class="block text-sm font-medium text-gray-700">RESUME</label>
            <input id="user_profile" name="user_profile" type="file" class="mt-1 block w-full">
        </div> --}}

        <div class="right">
            <div id="user_profile_preview">
                @if ($user->user_profile)
                    <label class="block text-sm font-medium text-gray-700">Current Resume:</label>

                    <!-- MAHU BAGAIMANA CARANYA-->
                    <iframe src="{{ asset($user->user_profile) }}" class="mt-1 h-64 w-full" frameborder="0"></iframe>
                    <a href="{{ asset($user->user_profile) }}" class="mt-1 h-64 w-full">{{ basename($user->user_profile) }}</a>
                @endif
            </div>

            <div>
                <label for="user_profile" class="block text-sm font-medium text-gray-700"></label>
                <input id="user_profile" name="user_profile" type="file" class="mt-1 block w-full rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('user_profile') border-red-500 @enderror">
                @error('user_profile')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    document.getElementById('languageDropdown').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex].text; // Get the selected option text
        var inputField = document.getElementById('selectedLanguages');
        var currentValues = inputField.value.split(', ').filter(function(el) { return el.trim(); }); // Split current input values into an array

        if (!currentValues.includes(selectedOption)) { // Check if the selected language is not already in the input field
            currentValues.push(selectedOption); // Add the new selection
            inputField.value = currentValues.join(', '); // Join the array back into a string and set it as the new value of the input field
        }

        // Optionally, reset the dropdown
        this.selectedIndex = 0;
    });
</script>

<script>
    document.getElementById('clearLanguages').addEventListener('click', function() {
        document.getElementById('selectedLanguages').value = ''; // Clear the input field
    });
</script>


</section>
