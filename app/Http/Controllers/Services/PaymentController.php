<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PaymentController extends Controller
{
    public function checkout(request $request)
    {
        $response = Http::post('https://api.mercadolibre.com/checkout/preferences?access_token=TEST-891424025012503-120821-3497a5daebb64b6f7f35f30cb899d71c-684707079', [
            
            
            'items' => 
            array (
                
              $producto_datos =array (
                        'title' => 'Servicio de Courier',
                        'description' => 'Codigo de Servicio #777',
                        'quantity' => 1,
                        'unit_price' => $request->price,
                        'currency_id' => 'PEN',
                        'picture_url' => 'http://34.95.149.225/purple/assets/images/logo.png',
                    )

            ),
            "auto_return"=>"approved",

				"back_urls"=> array ( 
					"failure"=> "",
					"pending"=> "",
					"success"=> "http://34.95.149.225/api/completed"
				)
             
          
          ]);

        return $response;
    }

    public function completed(request $request)
    {
        

        /* return $request; */
        return redirect('tracking');
    }


}
