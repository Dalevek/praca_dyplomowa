@extends('layouts.app')

@section('content')
    <h1>Strona główna</h1>
    <p>Aplikacja webowa do sterowania i wyświetlaniem danych ze sterownika.</p>

    @php
     {{
    $response = null;
    $t;
    $test = exec("ping -c 1 192.168.1.120", $t ,$response);
    if($response == 0)
    {
        echo "Connection with PLC (192.168.1.120)";
    }
    else
    {
        echo "Connection doesn't work with PLC (192.168.1.120";
    }

    }}
    @endphp
<br>
    @php
        {{
       $response2 = null;
       $t;
       $test = exec("ping -c 1 192.168.1.6",$t, $response2);
       if($response2 == 0)
       {
           echo "Connection with Raspberry PI [CAM] (192.168.1.6)";
       }
       else
       {
           echo "Connection doesn't work with Raspberry PI [CAM]  (192.168.1.6)";
       }

       }}
    @endphp
    <br>
    @php
            $connected = @fsockopen("192.168.1.5", 1880);
                                                //website, port  (try 80 or 443)
            if ($connected){
                echo "[Raspberry PI] Server - Node-RED - START";
                fclose($connected);

            }else{
                echo "[Raspberry PI] Server - Node-RED - STOP";


            }
    @endphp
    <br>
    @php
        $connected = @fsockopen("192.168.1.5", 8000);
                                            //website, port  (try 80 or 443)
        if ($connected){
            echo "[Raspberry PI] Server - Laravel - START";
            fclose($connected);

        }else{
            echo "[Raspberry PI] Server - Laravel - STOP";


        }
    @endphp
    <br>
    @php
        $connected = @fsockopen("127.0.0.1", 3306);
                                            //website, port  (try 80 or 443)
        if ($connected){
            echo "[Raspberry PI] Server - MySQL - START";
            fclose($connected);

        }else{
            echo "[Raspberry PI] Server - MySQL - STOP";


        }
    @endphp
    <br>
    @php
        $connected = @fsockopen("192.168.1.120", 11740);
                                            //website, port  (try 80 or 443)
        if ($connected){
            echo "[PLC] Sterownik - START";
            fclose($connected);

        }else{
            echo "[PLC] Sterownik - STOP";


        }
    @endphp
    {{ link_to_asset('documents/3_Praca_MGR.pdf', 'Open the pdf!') }}
    <br>

@endsection
