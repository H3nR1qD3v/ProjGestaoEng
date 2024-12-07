<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px; background-color: #1e2a47; border-radius: 30px;">
            <div class="card-body p-5">
                <h2 class="text-light mb-4 text-center">EngFlow</h2>
                <p class="text-light text-center mb-5">Gerenciamento de Projetos de Engenharia</p>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" class="text-light" />
                        <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" class="text-light" />
                        <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                

                        <x-primary-button class="ms-3 login-button">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        body {
            background-color: #1e2a47; /* Fundo escuro */
            color: white;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #1e2a47; 
            border-radius: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 2rem;
        }

        h2 {
            font-size: 2rem;
            color: #4c9be1;
        }

        p {
            color: #cfd8e3;
            font-size: 1rem;
        }

        .form-control {
            background-color: #2c3e50;
            border-radius: 10px;
            color: white;
            border: 2px solid transparent;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4c9be1;
            outline: none;
            background-color: #34495e;
        }

        .form-control::placeholder {
            color: #7f8c8d;
        }

        .login-button {
            background-color: #4c9be1;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #357ca2;
        }

        .text-light {
            color: #ffffff;
        }

        .underline {
            text-decoration: underline;
        }

        .ms-2 {
            margin-left: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .block {
            display: block;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</x-guest-layout>
