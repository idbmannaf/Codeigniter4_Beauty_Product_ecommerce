<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyStore!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            font-size: 20px;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td width="25%" valign="top"><img alt="" src="data:image/png;base64,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" />
        </td>
        <td width="50%" align="center" style="font-size: 50px;">Invoice</td>
        <td align="right">
            <h3>My Store Ltd.</h3>
            <p><b>Phone: </b>+8801744508287</p>
            <p><b>Website: </b><a href="https://github.com/idbmannaf">https://github.com/idbmannaf</a></p>
            <p><b>Order Id: </b> <?php  echo $orders->id;?></p>
            <p><b>Invoice Id: </b> <?php  echo $orders->invoice_id;?></p>
        </td>
    </tr>

</table>

<table width="100%">
    <tr>
        <td><strong>From:</strong> Abdul Mannaf</td>
        <td><strong>To:</strong><?php echo $billing_details->name;?> </td>
    </tr>
    <tr>
        <td><strong>Compay:</strong> Mystore</td>
        <td><strong>Company:</strong> <?php echo $billing_details->company;?></td>
    </tr>
    <tr>
        <td><strong>Email:</strong> idbmananf@gmail.com</td>
        <td><strong>Email:</strong> <?php echo $billing_details->email;?></td>
    </tr>
    <tr>
        <td><strong>Address:</strong> 488/1, West Shawrapara, Mirpur, Dhaka-1216</td>
        <td><strong>Address:</strong> <?php echo $billing_details->address.', '.$city.', '. $state.', '. $country.', '.$billing_details->postcode;?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td><strong>Phone:</strong> <?php echo $billing_details->phone;?></td>
    </tr>

</table>

<br/>

<table width="100%">
    <thead style="background-color: lightgray; font-size: 30px">
    <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($order_details): $sl=1;foreach ($order_details as $order): ?>
    <tr>
        <th scope="row"><?php echo $sl++; ?></th>
        <td><?php echo $order['product_name'];?></td>
        <td align="right"><?php echo $qty= $order['product_quantity'];?></td>
        <td align="right"><?php echo $price= $order['product_price']?></td>
        <td align="right"><?php echo $qty*$price?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </tbody>

    <tfoot>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 20px" align="right">Subtotal :</td>
        <td style="font-size: 15px" align="right"><?php echo $orders->total; ?>$</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 20px" align="right">Discount :</td>
        <td  style="font-size: 15px" align="right"><?php echo $orders->discount; ?>$</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 20px" align="right">Subtotal $</td>
        <td style="font-size: 15px" align="right" class="gray">$ <?php echo $orders->subtotal; ?></td>
    </tr>
    </tfoot>
</table>

</body>
</html>