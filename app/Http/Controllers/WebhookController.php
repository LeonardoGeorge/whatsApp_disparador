<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\SendLog; // Importe o modelo de logs
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Validação básica do payload
        $data = $request->validate([
            'message_id' => 'required|string',
            'status' => 'required|in:sent,delivered,failed',
            'contact' => 'required|string',
            'timestamp' => 'required|numeric'
        ]);

        // 2. Registrar o recebimento (para debug)
        Log::info('Webhook WhatsApp: ', $data);

        // 3. Atualizar o status no banco de dados
        try {
            $log = SendLog::where('message_id', $data['message_id'])
                ->firstOrFail();

            $log->update([
                'status' => $data['status'],
                'delivered_at' => ($data['status'] === 'delivered')
                    ? now()
                    : null
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error("Erro no webhook: " . $e->getMessage());
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }
    }
}
