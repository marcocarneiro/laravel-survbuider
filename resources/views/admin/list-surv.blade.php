@extends('base.app')

@section('title', 'LISTA')

@section('conteudo')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit(); " role="button">
            <i class="fas fa-sign-out-alt"></i>

            {{ __('Log Out') }}
        </a>
    </form>

    <p>Lista as pesquisas cadastradas</p>    
@endsection