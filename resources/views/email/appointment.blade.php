<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>


Dear  {{$mailData['name']}},

<p>Thank you for booking your appointment with icares booking doctors</p>
The details of your appointment are below:<br>
    Date : {{$mailData['date']}} <br>
    Time : {{$mailData['time']}} <br>
    With doctor : dr. {{$mailData['doctorName']}}<br>
<hr>
<button>Click Payment</button>
<hr>

Where : Rumah Sakit Mulya, Jl. KH. Hasyim Ashari No. 18 Sudimara Pinang, Kota Tangerang <br>
Contac : 0813-1024-9588

</body>
</html>
