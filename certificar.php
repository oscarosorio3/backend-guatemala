<?php
class classCertificar{
  function certificarFactura($facturaFirmada){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://certificador.feel.com.gt/fel/certificacion/v2/dte/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
    "nit_emisor":"93955189",
    "correo_copia":"oscar.osorio@benitomo.com",
    "xml_dte":"'.$facturaFirmada.'"
    }',
      CURLOPT_HTTPHEADER => array(
        'usuario: 93955189',
        'llave: 28BC0983B53AD692A34ED75B466EDED5',
        'identificador: 93955189',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
}

?>