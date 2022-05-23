@extends('admin.base')

@section('title', 'BUILDER')

@section('conteudo')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit(); " role="button">
            <i class="fas fa-sign-out-alt"></i>

            {{ __('Log Out') }}
        </a>
    </form>

    <p>Tela para construção de uma pesquisa</p>    
@endsection

