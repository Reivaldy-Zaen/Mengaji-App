<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isRegister ? 'Daftar' : 'Masuk' }} - Al-Qur'an Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sisi Kiri - Background dengan Ayat Al-Qur'an -->
        <div
            class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-teal-400 to-teal-500 p-12 flex-col justify-center items-start text-white">
            <div class="max-w-md">
                <!-- Ayat Al-Qur'an dalam bahasa Arab -->
                <h1 class="text-5xl font-bold mb-8 text-right leading-relaxed" dir="rtl">
                    اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ
                </h1>
                <!-- Terjemahan ayat -->
                <p class="text-xl mb-6 leading-relaxed">
                    "Bacalah dengan (menyebut) nama Tuhanmu yang Menciptakan."
                </p>
                <!-- Sumber ayat -->
                <p class="text-sm opacity-90">
                    QS. Al-'Alaq: 1
                </p>
            </div>
        </div>

        <!-- Sisi Kanan - Form Login & Register -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <!-- Bagian Logo -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-4">
                        <!-- Ikon Al-Qur'an -->
                        <div class="bg-teal-500 text-white p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6c-.6-.45-1.25-.75-2-1zm0 13.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5V8c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5v11.5z" />
                            </svg>
                        </div>
                        <!-- Judul Aplikasi -->
                        <h2 class="text-2xl font-bold text-gray-800">Al-Qur'an Digital</h2>
                    </div>
                </div>

                <!-- Pesan Selamat Datang -->
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-gray-800 mb-3">Selamat Datang</h3>
                    <p class="text-gray-600">
                        Silakan masuk atau daftar untuk melanjutkan progres bacaan Anda.
                    </p>
                </div>

                <!-- Tombol untuk Pilih Login atau Register -->
                <div class="flex mb-6 bg-gray-100 rounded-lg p-1">
                    <!-- Tombol Masuk -->
                    <button id="masukTab"
                        class="flex-1 py-2 px-4 rounded-md font-medium transition {{ !$isRegister ? 'bg-white shadow-sm text-gray-800' : 'text-gray-600 hover:text-gray-800' }}">
                        Masuk
                    </button>
                    <!-- Tombol Daftar -->
                    <button id="daftarTab"
                        class="flex-1 py-2 px-4 rounded-md font-medium transition {{ $isRegister ? 'bg-white shadow-sm text-gray-800' : 'text-gray-600 hover:text-gray-800' }}">
                        Daftar
                    </button>
                </div>

                <!-- Form untuk Login -->
                <form method="POST" action="{{ route('login') }}" class="{{ $isRegister ? 'hidden' : '' }}">
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-4">
                        <label for="login-email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" id="login-email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com" required>
                        <!-- Pesan Error jika email salah -->
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <label for="login-password" class="block text-sm font-medium text-gray-700 mb-2">
                            Kata Sandi
                        </label>
                        <input type="password" id="login-password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition @error('password') border-red-500 @enderror"
                            placeholder="••••••••" required>
                        <!-- Pesan Error jika password salah -->
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit Login -->
                    <button type="submit"
                        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-medium py-3 px-4 rounded-lg transition duration-200 shadow-sm">
                        Masuk ke Akun
                    </button>

                    <!-- Syarat dan Ketentuan -->
                    <p class="text-center text-sm text-gray-600 mt-6">
                        Dengan masuk, Anda menyetujui
                        <a href="#" class="text-teal-500 hover:text-teal-600 font-medium">Syarat & Ketentuan</a>
                        kami.
                    </p>
                </form>

                <!-- Form untuk Register -->
                <form method="POST" action="{{ route('register') }}" class="{{ !$isRegister ? 'hidden' : '' }}">
                    @csrf

                    <!-- Input Nama Lengkap -->
                    <div class="mb-4">
                        <label for="register-name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" id="register-name" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition @error('name') border-red-500 @enderror"
                            placeholder="Nama Anda" {{ $isRegister ? 'required' : '' }}>
                        <!-- Pesan Error jika nama tidak valid -->
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Email -->
                    <div class="mb-4">
                        <label for="register-email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" id="register-email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com" {{ $isRegister ? 'required' : '' }}>
                        <!-- Pesan Error jika email sudah digunakan -->
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div class="mb-4">
                        <label for="register-password" class="block text-sm font-medium text-gray-700 mb-2">
                            Kata Sandi
                        </label>
                        <input type="password" id="register-password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition @error('password') border-red-500 @enderror"
                            placeholder="••••••••" {{ $isRegister ? 'required' : '' }}>
                        <!-- Pesan Error jika password tidak memenuhi syarat -->
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Konfirmasi Password -->
                    <div class="mb-6">
                        <label for="register-password-confirmation"
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Konfirmasi Kata Sandi
                        </label>
                        <input type="password" id="register-password-confirmation" name="password_confirmation"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition"
                            placeholder="••••••••" {{ $isRegister ? 'required' : '' }}>
                    </div>

                    <!-- Tombol Submit Register -->
                    <button type="submit"
                        class="w-full bg-teal-500 hover:bg-teal-600 text-white font-medium py-3 px-4 rounded-lg transition duration-200 shadow-sm">
                        Daftar Akun
                    </button>

                    <!-- Syarat dan Ketentuan -->
                    <p class="text-center text-sm text-gray-600 mt-6">
                        Dengan mendaftar, Anda menyetujui
                        <a href="#" class="text-teal-500 hover:text-teal-600 font-medium">Syarat & Ketentuan</a>
                        kami.
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Mengatur Toggle Tab -->
    <script>
        // Ambil elemen tombol Masuk dan Daftar
        const masukTab = document.getElementById('masukTab');
        const daftarTab = document.getElementById('daftarTab');

        // Ketika tombol Masuk diklik, arahkan ke halaman login
        masukTab.addEventListener('click', () => {
            window.location.href = "{{ route('auth') }}";
        });

        // Ketika tombol Daftar diklik, arahkan ke halaman register
        daftarTab.addEventListener('click', () => {
            window.location.href = "{{ route('auth', ['register' => true]) }}";
        });
    </script>

</body>

</html>
