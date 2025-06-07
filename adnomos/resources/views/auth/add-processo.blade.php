@extends('auth.layout.dashboard')

@section('estilo')
    <link rel="stylesheet" href="{{ asset('views/css/add-processo.css') }}">
@endsection

@section('content')
<div class="processo-container">
    <form class="processo-form" method="POST" action="{{ route('caso.save') }}">
        @csrf

        <div class="processo-form-group">
            <label for="numero_processo">Número do Processo <span style="color:red">*</span></label>
            <input type="text" id="numero_processo" name="numero_processo" value="{{ old('numero_processo') }}"  oninput="formatarNumeroProcesso(this)">
        </div>

        <div class="processo-form-group">
            <label for="polo_ativo">Polo Ativo</label>
            <input type="text" id="polo_ativo" name="polo_ativo" value="{{ old('polo_ativo') }}">
        </div>

        <div class="processo-form-group">
            <label for="assunto">Assunto</label>
            <input type="text" id="assunto" name="assunto" value="{{ old('assunto') }}">
        </div>

        <div class="processo-form-group">
            <label for="tribunal">Tribunal</label>
            <input type="text" id="tribunal" name="tribunal" value="{{ old('tribunal') }}">
        </div>

        <div class="processo-form-group">
            <label for="orgaoJugador">Órgão Julgador</label>
            <input type="text" id="orgaoJugador" name="orgaoJugador" value="{{ old('orgaoJugador') }}">
        </div>

        <button type="submit" class="btn-dashboard" style="width:100%;margin-top:1.2rem;">Criar</button>
        <p class="processo-info">O campo "Número do Processo" é obrigatório. Os demais são opcionais.</p>
    </form>
</div>
@endsection

@section('script')
    <script>
        function formatarNumeroProcesso(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 20);
            let res = '';
            if (v.length > 7) res += v.substr(0,7) + '-';
            else res += v;
            if (v.length > 7) {
                res += v.substr(7,2);
                if (v.length > 9) res += '.' + v.substr(9,4);
                if (v.length > 13) res += '.' + v.substr(13,1);
                if (v.length > 14) res += '.' + v.substr(14,2);
                if (v.length > 16) res += '.' + v.substr(16,4);
            }
            input.value = res;
        }
    </script>
@endsection