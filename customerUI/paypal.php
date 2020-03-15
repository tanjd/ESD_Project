<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

<!-- This integration uses the PayPal JavaScript SDK to integrate the Smart Payment Buttons into your site without any server code.-->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
  <script
    src="https://www.paypal.com/sdk/js?client-id=AbIxMLEzEKKNL3RneA8f1FmkHiXf178hxTJR7PLfL9qW1ZNKzElEKGUTj5-Ki3I-N53iH-oYBSUP4nY8"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>
</body>

<!-- Render the PayPal Smart Payment Buttons to a container element on your web page. --> 
<body>
    <script
      src="https://www.paypal.com/sdk/js?client-id=AbIxMLEzEKKNL3RneA8f1FmkHiXf178hxTJR7PLfL9qW1ZNKzElEKGUTj5-Ki3I-N53iH-oYBSUP4nY8"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
  
    <div id="paypal-button-container"></div>
  
  </body>

<?php
  $_SESSION["cart"] = [
    [ 'id' => 223, "name" => "Snakeskin1","quantity"=>1, "unit_price"=>75],
    [ 'id' => 334, "name" => "Snakeskin2", "quantity"=>1, "unit_price"=>89]
                    ];

  $_total = 0;  
  foreach ($_SESSION['cart'] as $c_list){
        $product_price = $c_list['unit_price'];
        $_total += $product_price;
      }
?>

  <script>
  var total = "<?php echo $_total ?>";
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: total
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      window.location.href="http://localhost/esd/customerui/try.php";
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
  
  //This function displays Smart Payment Buttons on your web page.
  </script>

</html>