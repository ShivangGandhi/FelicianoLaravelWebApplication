<p>
Hello, {{ json_decode($data)->name }} <br>
<br>
You Reservation has been updated. <br>
You Reservation status is now: {{ json_decode($data)->status }}<br>
<br>
We are expecting {{ json_decode($data)->person }} people, at 
{{ date('H:i', strtotime(json_decode($data)->time)) }} 
on 
{{ date('M. d, Y', strtotime(json_decode($data)->date)) }}.
<br>
For any queries please contact <a href="http://127.0.0.1:8000/contact">here</a>
<br>
This Reservation cannot be cancelled. Please be on Time. 
Stay Safe!!!
</p>