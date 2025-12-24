<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <title>{{ $isRegister ? 'Daftar' : 'Masuk' }} - Al-Qur'an Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --teal-primary: #14b8a6;
            --teal-dark: #0d9488;
            --teal-light: #99f6e4;
            --teal-gradient: linear-gradient(135deg, var(--teal-primary), var(--teal-dark));
        }

        [data-bs-theme="dark"] {
            --teal-primary: #2dd4bf;
            --teal-dark: #0d9488;
            --teal-light: #5eead4;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            background-color: #f8fafc;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        [data-bs-theme="dark"] body {
            background-color: #0f172a;
        }

        .auth-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem 1rem;
        }

        .auth-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        [data-bs-theme="dark"] .auth-card {
            background: #1e293b;
            border-color: #334155;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 56px;
            height: 56px;
            background: var(--teal-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .brand-title {
            color: var(--teal-primary);
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 0.875rem;
        }

        [data-bs-theme="dark"] .brand-subtitle {
            color: #94a3b8;
        }

        /* Tabs */
        .auth-tabs {
            display: flex;
            gap: 0.5rem;
            background: #f1f5f9;
            padding: 4px;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        [data-bs-theme="dark"] .auth-tabs {
            background: #334155;
        }

        .tab-btn {
            flex: 1;
            padding: 0.75rem;
            border: none;
            background: none;
            border-radius: 10px;
            color: #64748b;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .tab-btn:hover {
            color: var(--teal-primary);
            background: rgba(20, 184, 166, 0.1);
        }

        .tab-btn.active {
            background: var(--teal-gradient);
            color: white;
            font-weight: 600;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            color: #475569;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        [data-bs-theme="dark"] .form-label {
            color: #cbd5e1;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.875rem;
            background: white;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--teal-primary);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }

        [data-bs-theme="dark"] .form-input {
            background: #334155;
            border-color: #475569;
            color: #f1f5f9;
        }

        [data-bs-theme="dark"] .form-input:focus {
            background: #334155;
            border-color: var(--teal-primary);
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        .input-with-icon input {
            padding-left: 3rem;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 0;
        }

        .password-toggle:hover {
            color: var(--teal-primary);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        /* Checkbox */
        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            width: 1rem;
            height: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--teal-primary);
            border-color: var(--teal-primary);
        }

        .form-check-label {
            font-size: 0.875rem;
            color: #64748b;
            cursor: pointer;
        }

        [data-bs-theme="dark"] .form-check-label {
            color: #94a3b8;
        }

        /* Links */
        .link {
            color: var(--teal-primary);
            text-decoration: none;
            font-size: 0.875rem;
        }

        .link:hover {
            text-decoration: underline;
        }

        /* Button */
        .auth-button {
            width: 100%;
            padding: 0.875rem;
            background: var(--teal-gradient);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 1.5rem;
        }

        .auth-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
        }

        /* Switch Link */
        .switch-link {
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
        }

        [data-bs-theme="dark"] .switch-link {
            color: #94a3b8;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .auth-container {
                padding: 1rem;
            }

            .auth-card {
                padding: 1.5rem;
            }
        }

        /* Animation */
        .form-group {
            animation: fadeIn 0.3s ease forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">
            <!-- Logo -->
            <div class="logo">
                <div class="logo-icon">
                    <i class="bi bi-book"></i>
                </div>
                <div class="brand-title">Al-Qur'an Digital</div>
                <div class="brand-subtitle">Masuk atau daftar untuk melanjutkan</div>
            </div>

            <!-- Tabs -->
            <div class="auth-tabs">
                <a href="{{ route('auth') }}" class="tab-btn {{ !$isRegister ? 'active' : '' }}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk
                </a>
                <a href="{{ route('auth', ['register' => true]) }}" class="tab-btn {{ $isRegister ? 'active' : '' }}">
                    <i class="bi bi-person-plus"></i>
                    Daftar
                </a>
            </div>

            @if (!$isRegister)
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <!-- LOGIN FORM -->
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <div class="form-group" style="animation-delay: 0.1s">
                        <label class="form-label">Email</label>
                        <div class="input-with-icon">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-input @error('email') is-invalid @enderror" placeholder="nama@email.com"
                                required>
                        </div>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" style="animation-delay: 0.2s">
                        <label class="form-label">Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="bi bi-lock input-icon"></i>
                            <input type="password" name="password" id="loginPassword"
                                class="form-input @error('password') is-invalid @enderror"
                                placeholder="Masukkan kata sandi" required>
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check" style="animation-delay: 0.3s">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Ingat saya</label>
                    </div>

                    <button type="submit" class="auth-button" style="animation-delay: 0.4s">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk ke Akun
                    </button>

                    <div class="switch-link" style="animation-delay: 0.5s">
                        Belum punya akun? <a href="{{ route('auth', ['register' => true]) }}" class="link">Daftar
                            disini</a>
                    </div>
                </form>
            @else
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <!-- REGISTER FORM -->
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <div class="form-group" style="animation-delay: 0.1s">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-with-icon">
                            <i class="bi bi-person input-icon"></i>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-input @error('name') is-invalid @enderror" placeholder="Nama lengkap Anda"
                                required>
                        </div>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" style="animation-delay: 0.2s">
                        <label class="form-label">Email</label>
                        <div class="input-with-icon">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-input @error('email') is-invalid @enderror" placeholder="nama@email.com"
                                required>
                        </div>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" style="animation-delay: 0.3s">
                        <label class="form-label">Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="bi bi-lock input-icon"></i>
                            <input type="password" name="password" id="registerPassword"
                                class="form-input @error('password') is-invalid @enderror"
                                placeholder="Minimal 8 karakter" required>
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('registerPassword', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" style="animation-delay: 0.4s">
                        <label class="form-label">Konfirmasi Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="bi bi-lock-fill input-icon"></i>
                            <input type="password" name="password_confirmation" id="confirmPassword"
                                class="form-input" placeholder="Ulangi kata sandi" required>
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('confirmPassword', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="auth-button" style="animation-delay: 0.5s">
                        <i class="bi bi-person-plus"></i> Daftar Akun
                    </button>

                    <div class="switch-link" style="animation-delay: 0.6s">
                        Sudah punya akun? <a href="{{ route('auth') }}" class="link">Masuk disini</a>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-bs-theme', savedTheme);

        // Auto-hide validation messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 500);
                });
            }, 5000);


            // Add animation delays to form groups
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.animationDelay = `${(index + 1) * 0.1}s`;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
