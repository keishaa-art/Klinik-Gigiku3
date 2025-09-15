<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Masukkan kode OTP yang telah dikirim ke email Anda.
    </div>

    <form method="POST" action="{{ route('verification.otp.submit') }}" id="otp-form">
        @csrf

        <div>
            <x-input-label for="otp" :value="'Kode OTP'" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" maxlength="6" required autofocus />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <div>
                <span id="countdown" class="text-red-500 font-bold">30</span> detik tersisa
            </div>
            <x-primary-button id="submit-btn">
                Verifikasi
            </x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{ route('verification.otp.resend') }}" id="resend-form" class="mt-2 hidden">
        @csrf
        <x-primary-button>
            Kirim Ulang OTP
        </x-primary-button>
    </form>

    <script>
        let countdown = 30;
        const countdownElement = document.getElementById('countdown');
        const submitBtn = document.getElementById('submit-btn');
        const resendForm = document.getElementById('resend-form');

        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(interval);
                submitBtn.disabled = true;
                countdownElement.textContent = "OTP sudah kadaluarsa";
                countdownElement.classList.remove("text-red-500");
                countdownElement.classList.add("text-gray-500");

                resendForm.classList.remove('hidden');
            }
        }, 1000);
    </script>
</x-guest-layout>