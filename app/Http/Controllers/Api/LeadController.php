<?php

namespace App\Http\Controllers\Api;

use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
    
        //VALIDIAMO I DATI SENZA L'UTILIZZO DELLA CLASSE STOREREQUESTS
        $validator = Validator::make($data, [
            'name'  => 'required',
            'email'  => 'required|email',
            'content' => 'required'
        ]);
    
        //VERIFICHIAMO SE LA RICHIESTA NON VA A BUON FINE
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
    
        //SALVO I DATI NEL DATABASE
        $new_lead = new Lead();
        $new_lead->fill($data);                    
        $new_lead->save();
    
        //INVIO EMAIL
        Mail::to('contact@boolpress.com')->send(new NewContact($new_lead)); 
    
        //DIAMO UNA RISPOSTA ALL'UTENTE
        return response()->json([
            'success' => true,
        ]);
    }
}
