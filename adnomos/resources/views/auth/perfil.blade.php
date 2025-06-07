@extends('auth.layout.dashboard')

@section('estilo')
    <link rel="stylesheet" href="{{asset('views/css/perfil.css')}}">
@endsection

@section('content')
    <div class="perfil-container">
        
        <form class="perfil-form" method="POST" action="{{ route('perfil.atualizar') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="perfil-foto-area">
                <div class="perfil-foto-preview">
                    <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('storage/images/user-default.png') }}" alt="Foto de perfil" id="foto-preview">
                </div>
                <label for="foto" class="perfil-foto-label">
                    <span class="material-icons-sharp">photo_camera</span>
                    Alterar Foto
                    <input type="file" id="foto" name="foto" accept="image/*" onchange="previewFoto(event)">
                </label>
            </div>

            <div class="perfil-form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <div class="perfil-form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{ old('cpf', Auth::user()->cpf) }}" oninput="formatCPF(this)">
            </div>

            <div class="perfil-form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj', Auth::user()->cnpj) }}">
            </div>

            <div class="perfil-form-group">
                <label for="oab">OAB</label>
                <input type="text" id="oab" name="oab" value="{{ old('oab', Auth::user()->oab) }}" readonly>
            </div>

            <div class="perfil-form-group">
                <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" value="{{ old('celular', Auth::user()->celular) }}" oninput="formatPhone(this)">
            </div>

            <div class="perfil-form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
            </div>

            <div class="perfil-form-group">
                <label for="password">Nova Senha</label>
                <input type="password" id="password" name="password" autocomplete="new-password">
            </div>

            <div class="perfil-form-group">
                <label for="password_confirmation">Confirmar Nova Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
            </div>

            <button type="submit" class="btn-dashboard perfil-btn-salvar">Salvar Alterações</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        function formatPhone(input) {
            let value = input.value.replace(/\D/g, ''); 
            value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
            input.value = value;
        }

        function formatCPF(input) {
            let value = input.value.replace(/\D/g, ''); 
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            input.value = value;
        }

        function previewFoto(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto-preview').src = e.target.result;
            }
            if(input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

