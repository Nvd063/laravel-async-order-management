<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - Smart Order System</title>
    <style type="text/css">
        /* Reset styles */
        body { margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, Helvetica, sans-serif; }
        table { border-collapse: collapse; }
        img { border: 0; display: block; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0; padding: 0;">

    <!-- Main Container -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">

                <!-- Email Wrapper (max 600px for email safety) -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #007bff; padding: 40px 30px; text-align: center; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 32px; font-weight: bold;">Order Confirmed!</h1>
                            <p style="margin: 10px 0 0; font-size: 18px;">Your purchase is being processed</p>
                        </td>
                    </tr>

                    <!-- Greeting & Intro -->
                    <tr>
                        <td style="padding: 40px 30px 20px; font-size: 16px; line-height: 1.5; color: #333333;">
                            <p style="margin: 0 0 20px;">Hello there,</p>
                            <p style="margin: 0 0 20px;">Great news! Your order has been successfully placed with <strong>Smart Order System</strong>. We're excited to get your items ready for you!</p>
                        </td>
                    </tr>

                    <!-- Order Details -->
                    <tr>
                        <td style="padding: 0 30px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f9f9f9; border-radius: 6px; padding: 20px;">
                                <tr>
                                    <td style="font-size: 18px; font-weight: bold; color: #007bff; padding-bottom: 15px;">
                                        Order Details
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="margin: 5px 0; font-size: 16px;"><strong>Order ID:</strong> {{ $order->id }}</p>
                                        <p style="margin: 5px 0; font-size: 16px;"><strong>Total Amount:</strong> {{ number_format($order->total_amount, 2) }} PKR</p>
                                        <p style="margin: 5px 0; font-size: 16px;"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                        <p style="margin: 5px 0; font-size: 16px;"><strong>Order Date:</strong> {{ $orderDate }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Items Table -->
                    <tr>
                        <td style="padding: 0 30px 40px;">
                            <h3 style="margin: 0 0 15px; font-size: 20px; color: #333333; text-align: center;">Your Items</h3>
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; font-size: 15px; color: #333333;">
                                <thead>
                                    <tr style="background-color: #007bff; color: #ffffff;">
                                        <th style="padding: 12px; text-align: left;">Product</th>
                                        <th style="padding: 12px; text-align: center;">Qty</th>
                                        <th style="padding: 12px; text-align: right;">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td style="padding: 12px; border-bottom: 1px solid #dddddd;">
                                            {{ $item->product_name }} 
                                            @if(isset($item->color)) ({{ $item->color }}) @endif
                                        </td>
                                        <td style="padding: 12px; text-align: center; border-bottom: 1px solid #dddddd;">
                                            {{ $item->quantity }}
                                        </td>
                                        <td style="padding: 12px; text-align: right; border-bottom: 1px solid #dddddd;">
                                            {{ number_format($item->price, 2) }} PKR
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Thank You & Next Steps -->
                    <tr>
                        <td style="padding: 0 30px 40px; text-align: center; font-size: 16px; line-height: 1.5; color: #333333;">
                            <p style="margin: 0 0 20px;">Thank you for choosing <strong>Smart Order System</strong>! </p>
                            <p style="margin: 0 0 20px;">We'll notify you soon once your order ships. If you have any questions, feel free to reply to this email or contact us at support@smartordersystem.com.</p>
                            <a href="{{ url('/') }}" style="display: inline-block; background-color: #007bff; color: #ffffff; padding: 12px 30px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 10px;">Visit Our Store</a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f4f4f4; padding: 30px; text-align: center; font-size: 14px; color: #777777;">
                            <p style="margin: 0 0 10px;">Smart Order System</p>
                            <p style="margin: 0;">Lahore, Pakistan | support@smartordersystem.com</p>
                            <p style="margin: 10px 0 0;">© {{ date('Y') }} Smart Order System. All rights reserved.</p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>