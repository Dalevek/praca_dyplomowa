@extends('layouts.app')

@section('content')
    <h1>Strona główna</h1>
    <p>Aplikacja webowa</p>

    @php
        function serverConnection($ip, $port) {
           $connected = @fsockopen($ip, $port);
            if ($connected){
                echo "<p class='text-success'>ONLINE</p>";
                fclose($connected);
            }else{
                echo "<p class='text-danger'>OFFLINE</p>";
            }
        }
    @endphp
    <table class="table table-bordered" >
        <thead>
        <tr>
            <th>Urządzenie</th>
            <th>Serwer</th>
            <th>IP</th>
            <th>PORT</th>
            <th>Status</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>PLC XV-102</td>
                <td>Sterownik</td>
                <td>192.168.1.120</td>
                <td>11740</td>
                <td> @php serverConnection("192.168.1.120", 11740) @endphp</td>
            </tr>
            <tr>
                <td>Raspberry PI 3</td>
                <td>Redis</td>
                <td>192.168.1.5</td>
                <td>6379</td>
                <td> @php serverConnection("192.168.1.5", 6379) @endphp</td>
            </tr>
            <tr>
                <td>Raspberry PI 3</td>
                <td>Laravel</td>
                <td>192.168.1.5</td>
                <td>8000</td>
                <td> @php serverConnection("192.168.1.5", 8000) @endphp</td>
            </tr>
            <tr>
                <td>Raspberry PI 3</td>
                <td>MySQL</td>
                <td>192.168.1.5</td>
                <td>3306</td>
                <td> @php serverConnection("127.0.0.1", 3306) @endphp</td>
            </tr>
            <tr>
                <td>Raspberry PI 3</td>
                <td>Node-RED</td>
                <td>192.168.1.5</td>
                <td>1880</td>
                <td> @php serverConnection("192.168.1.5", 1880) @endphp</td>
            </tr>
            <tr>
                <td>Raspberry PI</td>
                <td>Kamera</td>
                <td>192.168.1.6</td>
                <td>8000</td>
                <td> @php serverConnection("192.168.1.6", 8000) @endphp</td>
            </tr>
        </tbody>
    </table>



@endsection
