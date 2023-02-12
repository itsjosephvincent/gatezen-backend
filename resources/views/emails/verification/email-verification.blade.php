<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media only screen and (min-width: 1024px) and (max-width: 2559px) {
            .logo {
                width: 250px !important;
                margin-top: 75px !important;
            }

            .first-message {
                margin-top: 60px !important;
                font-size: xx-large !important;

            }

            .second-message {
                font-size: large !important;
            }

            .button {
                margin-top: 20px !important;
                display: block;
                width: 200px !important;
                height: 30px !important;
                background: #145835;
                padding: 10px;
                text-align: center;
                color: white;
                font-weight: 100;
                line-height: 25px !important;
                text-decoration: none;
                font-size: x-large !important;
            }

            .line {
                margin-top: 50px !important;
            }

            .line-first-message span {
                font-size: medium !important;
            }

            .line-second-message span {
                font-size: small !important;
            }
        }

        @media only screen and (min-width: 2560px) {
            .logo {
                width: 250px !important;
                margin-top: 75px !important;
            }

            .first-message {
                margin-top: 60px !important;
                font-size: xx-large !important;

            }

            .second-message {
                font-size: large !important;
            }

            .button {
                margin-top: 20px !important;
                display: block;
                width: 200px !important;
                height: 30px !important;
                background: #145835;
                padding: 10px;
                text-align: center;
                color: white;
                font-weight: 100;
                line-height: 25px !important;
                text-decoration: none;
                font-size: x-large !important;
            }

            .line {
                margin-top: 50px !important;
            }

            .line-first-message span {
                font-size: medium !important;
            }

            .line-second-message span {
                font-size: small !important;
            }
        }
    </style>
</head>

<body style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 0; background: white;">
    <center>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="text-align: center;">
                                <img style="margin-top: 50px;" class="logo" src="{{ $logo }}" width="250" alt="logo">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="first-message" style="font-size: large; font-weight: 400;">
                                    You have successfully activated your account<br />
                                </p>
                                <p class="second-message" style="font-size: small; font-weight: 100">
                                    You can use your account login information:<br />
                                    - For faster checkout<br />
                                    - Check your orders
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if($store_category_id == 10)
                                <a class="button" href="{{ $url }}/verify-email?token={{ $token }}" style="display: block; width: 125px; height: 20px; background: #145835; padding: 10px; text-align: center; color: white; font-weight: 100; line-height: 20px; text-decoration: none;">Visit Store</a>
                                @else
                                <a class="button" href="{{ $url }}/verify-email?token={{ $token }}" style="display: block; width: 125px; height: 20px; background: #000000; padding: 10px; text-align: center; color: white; font-weight: 100; line-height: 20px; text-decoration: none;">Visit Store</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    <center>
        <hr class="line">
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                @if($store_category_id == 10)
                                <p class="line-first-message" style="margin-top: -10px;">
                                    <span style="font-size: x-small;">Questions? Our customer support team is available to assist you at inquiries@gatezencbd.co<br /></span>
                                </p>
                                <p class="line-second-message" style="margin-top: -15px;">
                                    <span style="font-size: xx-small">Gatezen Natural Products are offered via <b>ABC BIOTEC PHARMACEUTICAL CORPORATION LTD</b></span>
                                </p>
                                @elseif($store_category_id == 5)
                                <p class="line-first-message" style="margin-top: -10px;">
                                    <span style="font-size: x-small;">Questions? Our customer support team is available to assist you at inquiries@gatezencbd.co<br /></span>
                                </p>
                                <p class="line-second-message" style="margin-top: -15px;">
                                    <span style="font-size: xx-small">Hauger Watches are offered via <b>THE GATE ECOMMERCE (CY) LTD</b></span>
                                </p>
                                @else
                                <p class="line-first-message" style="margin-top: -10px;">
                                    <span style="font-size: x-small;">Questions? Our customer support team is available to assist you at inquiries@gatezencbd.co<br /></span>
                                </p>
                                <p class="line-second-message" style="margin-top: -15px;">
                                    <span style="font-size: xx-small;">Saint Roches Sunglasses are offered via <b>THE GATE ECOMMERCE (CY) LTD</b></span>
                                </p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>