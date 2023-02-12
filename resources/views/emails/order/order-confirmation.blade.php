<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
</head>

<body style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 0; background: white;">
    <center>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="text-align: center;">
                                <img style="margin-top: 20px;" src="{{ $logo }}" width="250" alt="logo">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    <center>
        <div style="width: 75%">
            <table style="margin-top: 25px;">
                @if($storeCategorId == 10)
                <table width="100%" style="border: 1px solid #145835; background: #145835;">
                    <tr>
                        <td style="height: 25px;">
                        </td>
                    </tr>
                </table>
                @else
                <table width="100%" style="border: 1px solid black; background: black;">
                    <tr>
                        <td style="height: 25px;">
                        </td>
                    </tr>
                </table>
                @endif
                <table width="100%" style="border-left: 1px solid black; border-right: 1px solid black;">
                    <tr>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: small; margin-left: 10px; font-weight: 500;">Hello,</p>
                            <p style="font-size: small; margin-left: 10px; font-weight: 500;">Thank you for your order. Here is your order summary:</p>
                            <p style="font-size: small; margin-left: 10px; font-weight: 500;">Order Number: #{{ $order->number }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr style="margin-left: 10px; margin-right: 10px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @if($storeCategorId == 10)
                            <p style="font-size: medium; margin-left: 10px; font-weight: 700;">Pre-order Details:</p>
                            <p style="font-size: small; margin-left: 10px; font-weight: 500;">You will receive more information when your order is ready to be shipped</p>
                            @else
                            <p style="font-size: medium; margin-left: 10px; font-weight: 700;">Order Details:</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="float: left; width: 50%;">
                                <p style="font-size: small; margin-left: 10px; font-weight: 700;">Description</p>
                                @foreach ($orderDetails as $orderDetail)
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100;">{{ $orderDetail->name }}</p>
                                @endforeach
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100;">Shipping - {{ $shippingMethod }}</p>
                            </div>
                            <div style="float: left; width: 10%;">
                                <p style="font-size: small; margin-left: 10px; font-weight: 700;">Quantity</p>
                                @foreach ($orderDetails as $orderDetail)
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100; text-align: center;">{{ $orderDetail->quantity }}</p>
                                @endforeach
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100; color: white;">0</p>
                                <p style="font-size: x-small; margin-right: 20px; font-weight: 700; text-align: center;">Total:</p>
                            </div>
                            <div style="float: right; width: 40%;">
                                <p style="font-size: small; margin-left: 10px; font-weight: 700;">Subtotal</p>
                                @foreach ($orderDetails as $orderDetail)
                                @if($storeCategorId == 10)
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100;">€ {{ ($orderDetail->price - ($orderDetail->price * $discount)) * $orderDetail->quantity }}</p>
                                @else
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100;">€ {{ $orderDetail->price * $orderDetail->quantity }}</p>
                                @endif
                                @endforeach
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100;">€ {{ $shippingFee }}</p>
                                <p style="font-size: x-small; margin-left: 10px; font-weight: 100;">€ {{ $total }}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr style="margin-left: 10px; margin-right: 10px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: small; margin-left: 10px; font-weight: 100;">Questions? Our customer support team is available to assist you at inquiries@gatezen.co</p>
                            <p style="font-size: small; margin-left: 10px; font-weight: 100;">Thank you!<br>Customer Service</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                    </tr>
                </table>
                @if($storeCategorId == 10)
                <table width="100%" style="border: 1px solid #145835; background: #145835;">
                    <tr>
                        <td>
                            <img src="https://gatezen.s3.eu-central-1.amazonaws.com/logo/cbd/gatezen-natural-white.png" width="100" alt="logo" style="margin: 20px">
                        </td>
                    </tr>
                </table>
                @else
                <table width="100%" style="border: 1px solid black; background: black;">
                    <tr>
                        <td>
                            @if($storeCategorId == 4)
                            <img src="https://gatezen.s3.eu-central-1.amazonaws.com/logo/saint-roches/saint-roches-logo-white.png" width="100" alt="logo" style="margin: 20px">
                            @else
                            <img src="https://gatezen.s3.eu-central-1.amazonaws.com/logo/hauger/hauger-timeless-craftsmanship-logo-white.png" width="100" alt="logo" style="margin: 20px">
                            @endif
                        </td>
                        <td style="text-align: right;">
                            @if($storeCategorId == 4)
                            <p style="color: white; font-size: xx-small; margin-right: 20px; font-weight: 100;">Saint Roches sunglasses are offered via <b>THE GATE ECOMMERCE (CY) LTD</b></p>
                            @else
                            <p style="color: white; font-size: xx-small; margin-right: 20px; font-weight: 100;">Hauger Watches are offered via <b>THE GATE ECOMMERCE (CY) LTD</b></p>
                            @endif
                        </td>
                    </tr>
                </table>
                @endif
            </table>
        </div>
    </center>
</body>

</html>