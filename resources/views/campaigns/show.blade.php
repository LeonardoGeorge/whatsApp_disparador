@extends('layouts.app')

@section('content')
<style>
    .campaign-info, .contacts-table {
        color:#000;
        background-color: #f8fafc;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }
    .contacts-table {
        width: 100%;
    }
    .contacts-table th {
        text-align: left;
        padding: 0.5rem;
        border-bottom: 1px solid #ddd;
    }
    .contacts-table td {
        padding: 0.5rem;
        border-bottom: 1px solid #eee;
    }
</style>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold mb-4">Detalhes da Campanha</h2>
                
                @auth
                    <div class="campaign-info dark:bg-gray-700 dark:text-gray-100 mb-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $campaign->name }}</h3>

                        {{-- Se houver imagem, exibe aqui --}}
                    @if($campaign->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $campaign->image) }}" 
                                alt="Capa da campanha" 
                                class="w-64 rounded-md shadow-md">
                        </div>
                    @endif


                        <p class="whitespace-pre-wrap">{{ $campaign->message }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            Criada em: {{ $campaign->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-2">Contatos para Disparo</h3>
                        <div class="contacts-table overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>
                                                @php
                                                    $status = $campaign->contacts()->where('contact_id', $contact->id)->first()->pivot->status ?? 'pending';
                                                @endphp
                                                <span class="px-2 py-1 text-xs rounded-full 
                                                    {{ $status === 'sent' ? 'bg-green-100 text-green-800' : 
                                                       ($status === 'failed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4">Nenhum contato vinculado a esta campanha</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="status" class="hidden p-4 mb-4 rounded-md">
                        <p id="status-message"></p>
                    </div>

                    <div class="flex gap-4">
                       <form id="dispatchForm" action="{{ route('campaigns.process', $campaign->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                                <i class="fas fa-paper-plane mr-2"></i> Disparar Mensagens
                            </button>
                        </form>
                        
                        <a href="{{ route('campaigns.edit', $campaign->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                            <i class="fas fa-edit mr-2"></i> Editar Campanha
                        </a>
                    </div>

                    <!-- Mensagens de status -->
                    @if(session('success'))
                        <div class="mt-4 p-4 bg-green-50 text-green-600 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="mt-4 p-4 bg-red-50 text-red-600 rounded-md">
                            {{ session('error') }}
                        </div>
                    @endif
                @else
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <p>Faça <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> para acessar o disparador.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>

<!-- JavaScript para integração com API -->
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('dispatchForm');
    const statusDiv = document.getElementById('status');
    const statusMessage = document.getElementById('status-message');
    
    if (!form || !statusDiv || !statusMessage) {
        console.error('Elementos necessários não encontrados no DOM');
        return;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Mostra status
        statusDiv.classList.remove('hidden');
        statusDiv.classList.remove('bg-red-50', 'text-red-600');
        statusDiv.classList.add('bg-blue-50', 'text-blue-600');
        statusMessage.textContent = 'Iniciando disparo de mensagens...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();
            
            if (response.ok) {
                statusMessage.textContent = 'Disparo iniciado com sucesso! As mensagens estão sendo enviadas.';
                statusDiv.classList.remove('bg-blue-50', 'text-blue-600');
                statusDiv.classList.add('bg-green-50', 'text-green-600');
            } else {
                throw new Error(data.message || 'Erro ao iniciar disparo');
            }
        } catch (error) {
            statusDiv.classList.remove('bg-blue-50', 'text-blue-600');
            statusDiv.classList.add('bg-red-50', 'text-red-600');
            statusMessage.textContent = 'Erro: ' + error.message;
            console.error('Erro no disparo:', error);
        }
    });
});""
@endsection