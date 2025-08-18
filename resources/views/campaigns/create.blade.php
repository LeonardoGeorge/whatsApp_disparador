@extends('layouts.app')

@section('content')
<style>
    input, textarea {
        color:#000;
    }
</style>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold mb-4">Disparador de Mensagens</h2>
                
                @auth
                    <form id="campaignForm" action="{{ route('campaigns.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Nome da Campanha</label>
                            <input type="text" name="name" class="w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Mensagem</label>
                            <textarea name="message" rows="5" class="w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                        </div>
                        
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                            Criar Campanha
                        </button>
                        
                    </form>
                @else
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <p>Faça <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> para acessar o disparador.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
<!-- JavaScript para integração com API -->
<script>
document.querySelector('form').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const form = e.target;
    const statusDiv = document.getElementById('status');
    const statusMessage = document.getElementById('status-message');
    
    // Mostra status
    statusDiv.classList.remove('hidden');
    
    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: new FormData(form)
        });

        const data = await response.json();
        
        if (response.ok) {
            statusMessage.textContent = 'Campanha criada com sucesso! As mensagens estão sendo enviadas.';
            form.reset();
        } else {
            throw new Error(data.message || 'Erro ao enviar');
        }
    } catch (error) {
        statusDiv.classList.add('bg-red-50', 'text-red-600');
        statusMessage.textContent = 'Erro: ' + error.message;
    }
});
</script>
@endsection