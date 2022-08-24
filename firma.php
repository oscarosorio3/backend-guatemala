<?php
// ini_set('display_errors', 1);
class classFirma 
{
    function firmarFactura($base64,$nombreSinExt){
        $curl = curl_init();
    
        $send = '{
            "llave":"9c934f31affc6685ad505f140d41eeb5",
            "archivo": "'.$base64.'",
            "codigo": "'.$nombreSinExt.'",
            "alias": "93955189",
            "es_anulacion": "N"
        }';

        // echo"\n".'<pre> send:'."\n";
		// print_r($send);
		// echo"\n<ber></pre>(".date('Y-m-d h:i:s A').")<br>\n";
        //die('---');

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://signer-emisores.feel.com.gt/sign_solicitud_firmas/firma_xml',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $send,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
    
        $response = curl_exec($curl);
        // echo"\n".'<pre> response:'."\n";
		// print_r($response);
		// echo"\n<ber></pre>(".date('Y-m-d h:i:s A').")<br>\n";
        // die('---');
        curl_close($curl);
        return json_decode($response);
    }
    
}


?>