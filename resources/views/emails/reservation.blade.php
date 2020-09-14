<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2 style="text-align: center;">Confirmed Boat Reservation</h2>
<hr>
    <p><strong>Name: </strong>{{ $data['name'] }}</p>
    <p><strong>Email: </strong>{{ $data['email'] }}</p>
    <p><strong>State: </strong>{{ $data['state'] }}</p>
    <p><strong>Phone: </strong>{{ $data['phone'] }}</p>
    <p><strong>Receipt: </strong><a href="{{ $data['stripe_receipt_url']}}">Click here to view.</a></p>
  </body>
</html>
