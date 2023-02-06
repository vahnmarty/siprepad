<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="admin@toxsl.in" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" value="Admin@1854"  name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
                </a>
                @endif --}}

                <x-jet-button class="ml-4 login-button" style="background: linear-gradient(180deg, #A71930 0%, #002664 100%);
                border:none;">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<script>
    window.addEventListener("pageshow", function(event) {
                var historyTraversal = event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2);
                if (historyTraversal) { 
                    // Handle page restore.     window.location.reload();   
                } });
</script>