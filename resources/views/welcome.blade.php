<x-guest-layout>
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">BudgetCore</h1>
        <p class="mb-6">Controle financeiro pessoal com foco em clareza, organização e escala.</p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-black text-white rounded">
                Entrar
            </a>

            <a href="{{ route('register') }}" class="px-4 py-2 border rounded">
                Criar conta
            </a>
        </div>
    </div>
</x-guest-layout>
