<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Post-IT</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="messages-container">
           @if(session('message'))
               <div class="message {{ session('type') ?? 'success' }}" id="session-message">
                   <i class="fas {{ session('type') == 'error' ? 'fa-exclamation-circle' : 'fa-check-circle' }}"></i>
                   <span class="message-content">{{ session('message') }}</span>
                   <button class="message-close" onclick="this.parentElement.remove()">
                       <i class="fas fa-times"></i>
                   </button>
                   <div class="message-progress"></div>
               </div>
           @endif

           @if($errors->any())
               <div class="message error" id="error-message">
                   <i class="fas fa-exclamation-circle"></i>
                   <span class="message-content">{{ $errors->first() }}</span>
                   <button class="message-close" onclick="this.parentElement.remove()">
                       <i class="fas fa-times"></i>
                   </button>
                   <div class="message-progress"></div>
               </div>
           @endif
       </div>
    <div class="container">
        <div class="auth-container">
            <!-- Cabeçalho com abas -->
            <div class="auth-header">
                <div class="auth-tab active" data-form="login">Login</div>
                <div class="auth-tab" data-form="register">Registro</div>
            </div>

            <!-- Container dos formulários -->
            <div class="forms-wrapper">
                <!-- Formulário de Login -->
                <form action="{{ route('login') }}" method="POST" class="auth-form sign-in-form active">
                    @csrf
                    <h2 class="form-title">Bem-vindo de volta</h2>

                    <div class="input-group">
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="name" type="text" placeholder="Usuário" />
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="password" type="password" placeholder="Senha" />
                        </div>
                    </div>

                    <div class="auth-links">
                        <a href="#">Esqueceu a senha?</a>
                    </div>

                    <input type="submit" value="Entrar" class="btn" />
                </form>

                <!-- Formulário de Registro -->
                <form action="{{ route('register') }}" method="POST" class="auth-form sign-up-form">
                    @csrf
                    <h2 class="form-title">Criar nova conta</h2>

                    <div class="input-group">
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="name" type="text" placeholder="Usuario" />
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input name="email" type="email" placeholder="Email" />
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="password" type="password" placeholder="Senha" />
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input name="password_confirmation" type="password" placeholder="Confirmar senha" />
                        </div>
                    </div>

                    <input type="submit" value="Registrar" class="btn" />
               </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}?v={{ time() }}"></script>
</body>
</html>
