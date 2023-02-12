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
                                <img style="margin-top: 50px;" src="{{ $logo }}" width="250" alt="logo">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="font-size: large; font-weight: 400;">
                                    Reset your password<br>
                                </p>
                                <p style="font-size: small;font-weight: 100;line-height: 20px;">
                                    Follow this link to reset your customer account password.<br>
                                    If you didn't request a new password, you can safely delete this email.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    <center>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="width: 25%;">
                                @if($store_category_id == 10)
                                <a href="{{ $url }}/reset-password?token={{ $token }}" style="display: block; width: 125px; height: 20px; background: #145835; padding: 10px; text-align: center; color: white; font-weight: 100; line-height: 20px; text-decoration: none;">Reset Password</a>
                                @else
                                <a href="{{ $url }}/reset-password?token={{ $token }}" style="display: block; width: 125px; height: 20px; background: black; padding: 10px; text-align: center; color: white; font-weight: 100; line-height: 20px; text-decoration: none;">Reset Password</a>
                                @endif
                            </td>
                            <td style="text-align: left; width: 75%">
                                <p style="font-size: small;">or <a href="{{ $url }}" style="color: black;">Visit Store</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    <center>
        <hr>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <p style="margin-top: -10px;">
                                    @if($store_category_id == 10)
                                    <span style="font-size: x-small;">Questions? Our customer support team is available to assist you at inquiries@gatezencbd.co<br /></span>
                                    <span style="font-size: xx-small">Gatezen Natural Products are offered via <b>ABC BIOTEC PHARMACEUTICAL CORPORATION LTD</b></span>
                                    @elseif($store_category_id == 5)
                                    <span style="font-size: x-small;">Questions? Our customer support team is available to assist you at inquiries@gatezencbd.co<br /></span>
                                    <span style="font-size: xx-small">Hauger Watches are offered via <b>THE GATE ECOMMERCE (CY) LTD</b></span>
                                    @else
                                    <span style="font-size: x-small;">Questions? Our customer support team is available to assist you at inquiries@gatezencbd.co<br /></span>
                                    <span style="font-size: xx-small;">Saint Roches Sunglasses are offered via <b>THE GATE ECOMMERCE (CY) LTD</b></span>
                                    @endif
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>