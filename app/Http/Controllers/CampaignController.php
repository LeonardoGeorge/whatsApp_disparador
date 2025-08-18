<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CampaignController extends Controller
{
    public function create()
    {
        return view('campaigns.create');
    }

    public function show(Campaign $campaign)
    {
        $contacts = $campaign->contacts()
            ->withPivot('status')
            ->orderBy('name')
            ->get();

        return view('campaigns.show', compact('campaign', 'contacts'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            $campaign = Campaign::create($validated);

            // Vincula todos os contatos existentes com status pendente
            $contactIds = Contact::pluck('id')->toArray();
            $campaign->contacts()->attach($contactIds, ['status' => 'pending']);

            return response()->json([
                'success' => true,
                'message' => 'Campanha criada com sucesso!',
                'redirect' => route('campaigns.show', $campaign->id)
            ]);
        } catch (\Exception $e) {
            Log::error('Erro ao criar campanha: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar campanha'
            ], 500);
        }
    }




    public function process($id)
    {
        try {
            $response = Http::post("http://localhost:3000/api/campaigns/{$id}/process");

            $body = $response->json();

            if ($response->successful() && $body['success']) {
                return back()->with('success', 'Campanha enviada com sucesso!');
            }

            $errorMsg = $body['error'] ?? 'Erro desconhecido ao enviar campanha';
            return back()->with('error', $errorMsg);
        } catch (\Exception $e) {
            return back()->with('error', 'Falha na conexão: ' . $e->getMessage());
        }
    }


    
}
