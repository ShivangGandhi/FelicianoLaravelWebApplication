<p>
Hello, <strong>{{ json_decode($data)->name }}</strong> <br>
<br>
You Order has been Received at {{ json_decode($data)->time }} on {{ date('M. d, Y', strtotime(json_decode($data)->date)) }}. 
<br>
You Order Id is <strong>{{ json_decode($data)->id }}</strong>
<br>
For Change in Order or Address: {{ json_decode($data)->address }}-<br>
Please Contact here: <a href="http://127.0.0.1:8000/contact">here</a>
<br>
This Order cannot be cancelled. 
Stay Safe!!!
</p>
</p>
@php
          $items = [];
          $quantities = [];
          $arrays = json_decode(json_decode($data)->order);
          foreach ($arrays as $array){
          foreach ($array as $key => $value) {
            array_push($items, $key);
            array_push($quantities, $value);
          }
          }
@endphp
<table border="1">
	<caption>Your Order</caption>
	<thead>
		<tr>
			<th>Item</th>
			<th>Quantity</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>@foreach($items as $item){{$item}} <br> @endforeach</td>
          <td>@foreach($quantities as $item){{$item}} <br> @endforeach</td>
		</tr>
	</tbody>
</table>

<p>You Order total is: Rs. <strong> {{ json_decode($data)->total }} </strong></p>
<br>
You Order status is now: <strong>{{ json_decode($data)->status }}</strong>
