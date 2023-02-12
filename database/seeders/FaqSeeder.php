<?php

namespace Database\Seeders;

use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'title' => 'WHAT IS CANNABIDIOL (CBD)?',
                'content' => 'Cannabidiol (CBD) is a natural compound that comes from the leaves, stalks, and flowers of industrial hemp or marijuana cannabis. It is the most widely accepted non-intoxicating cannabinoid found in Cannabis sativa plant. Hemp-based CBD extracts should not be confused with CBD from marijuana, even though they both derive from the same plant – all of our Broad-Spectrum CBD products contain CBD extracted from industrial hemp'
            ],
            [
                'title' => 'WILL I GET "HIGH" FROM USING CBD?',
                'content' => 'Because CBD is a non-intoxicating component from industrial hemp, which legally must have less than 0.3 percent of Tetrahydrocannabinol (THC), there’s no “high” or euphoric effect as a result of using hemp-derived CBD.'
            ],
            [
                'title' => 'HOW LONG DOES IT TAKE TO FEEL THE EFFECTS OF CBD?',
                'content' => 'Properties of CBD will vary for each individual depending on height, weight, and the quantity of CBD taken. Because there are no intoxicating ingredients with CBD oil, there is no “high” effect; start with small amounts and gradually increase with each use until reaching desired results.'
            ],
            [
                'title' => 'WHAT IS A CANNABINOID?',
                'content' => 'Cannabinoids are molecular compounds naturally made from Cannabis sativa plants; however, they are also found in other plants and produce inside our bodies. Cannabinoids are classified as fatty compounds that play vital roles within our immune and central nervous system'
            ],
            [
                'title' => 'WHAT MAKES HEMP PLANTS DIFFERENT FROM MARIJUANA PLANTS?',
                'content' => 'Hemp and marijuana come from the same plant family, Cannabis sativa. The main difference between the two is their level of Tetrahydrocannabinol (THC) – the illegal, psychotropic cannabinoid. According to the Agricultural Act of 2014, American legislation describes legal hemp plants as containing less than 0.3 percent THC.'
            ],
            [
                'title' => 'WILL USING CBD OIL SHOW UP ON A DRUG TEST?',
                'content' => 'While hemp-based CBD products are manufactured from hemp plants containing less than 0.3% THC, there are still trace amounts. There is a small percentage that consuming CBD may lead to a positive drug test for THC, as it does with any product made from hemp. If this is a significant concern, we advise speaking with your employer or doctor before use.'
            ],
            [
                'title' => 'WHAT’S THE PROPER WAY TO STORE CBD PRODUCTS FROM GATE ZEN?',
                'content' => 'Store products in a dry, cool area with no direct exposure to constant light or excessive heat. For any questions, please contact us at support@gatezencbd.com'
            ],
            [
                'title' => 'WHAT INGREDIENTS ARE USED IN GATE ZEN BROAD-SPECTRUM CBD OIL?',
                'content' => 'Gate Zen products use THC-free, European-grown industrial hemp that is non-GMO and vegan. Please reference our product listing pages for a line-up of other ingredients per product.'
            ],
            [
                'title' => 'IS THERE AN EXPIRATION DATE FOR CBD PRODUCTS?',
                'content' => 'With proper storage, quality is maintained up to two years for our products'
            ],
            [
                'title' => 'HOW MUCH CBD SHOULD I TAKE?',
                'content' => 'Because each person’s body structure is unique, it is difficult to set a predetermined measurement that is right for everyone. It is recommended to consult a doctor or health professional to determine an amount right for you'
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create([
                'title' => $faq['title'],
                'content' => $faq['content'],
                'store_category_id' => 10, // Gatezen CBD
                'faq_category_id' => 1, // General
                'created_at' => Carbon::now()
            ]);
        }

        $saintRochesFaqs = [
            [
                'title' => 'I AM A SOCIAL MEDIA INFLUENCER. CAN I COLLABORATE WITH YOU?',
                'content' => 'Yes, we would love to. If you are interested, go to ‘Become an affiliate‘ in Menu and sign up. Or you can send us an email to affiliate@gatezen.co Important to provide following information: Your First name and Last name, Phone number, Email address, Country and Links to your social media accounts.'
            ],
            [
                'title' => 'HOW CAN I BECOME A RETAILER OR DISTRIBUTOR AND SELL YOUR PRODUCTS?',
                'content' => 'Please send your request to info@gatezen.co. Important to provide following information: Business name, Address and Country, Phone number, Email address, Contact person’s first name and last name. Please also include company presentation with additional information, other brands in your portfolio etc.'
            ],
            [
                'title' => 'HOW DO I UNSUBSCRIBE FROM NEWSLETTER UPDATES?',
                'content' => 'Click unsubscribe at the bottom of an email communication.'
            ],
            [
                'title' => 'WHAT METHODS OF PAYMENT ARE ACCEPTED?',
                'content' => 'We work with Klarna and PayPal. They support a large number of credit cards. Most common are Mastercard, Visa and American Express. To see the complete list of accepted credit cards, please go to Klarna and/or PayPal websites.'
            ],
            [
                'title' => 'WHEN I PUT SOMETHING IN MY SHOPPING CART, DOES IT MEAN THE ITEMS ARE AVAILABLE?',
                'content' => 'Products availability is checked when you complete the purchase and your order is processed. Placing a product in your shopping cart does not ensure it is available when you are ready to make your purchase, and all orders are subject to product availability.'
            ],
            [
                'title' => 'WILL THERE BE ANY ADDITIONAL COST TO MY ORDER?',
                'content' => 'If you order from a country that is part of the European Union, prices include Swedish VAT at 25%. For all countries outside the EU, local charges such as import duties and/or sales tax may apply. These charges are at your expense and we recommend you to contact your local customs office for more information.'
            ],
            [
                'title' => 'DO YOU OFFER INTERNATIONAL SHIPPING?',
                'content' => 'We offer worldwide shipping. All our shipments are sent out by DHL and/or UPS from our warehouse in Sweden. The estimated delivery time is 3-6 business days.'
            ],
            [
                'title' => 'FROM WHERE ARE YOUR PRODUCTS SHIPPED?',
                'content' => 'All orders are shipped from our warehouse in Sweden.'
            ],
            [
                'title' => 'HOW CAN I CHECK THE STATUS OF MY ORDER?',
                'content' => 'All orders are trackable. Once your package is sent, you will receive an email with your tracking number.'
            ],
            [
                'title' => 'HOW DO I CANCEL MY ORDER?',
                'content' => 'If you wish to cancel your order, please contact us. If we are unable to process the cancellation, usually because the package has already been shipped, we contact your courier to have the package returned to our warehouse. Only when the package has returned to our warehouse, we will be able to process the cancellation.'
            ],
            [
                'title' => 'CAN I RETURN OR EXCHANGE MY ORDER?',
                'content' => 'Customer who made a purchase from our webshop is eligible for a 14-day free exchange guarantee. Read more here: www.saintroches.gatezen.co/terms-and-conditions.'
            ],
            [
                'title' => 'CAN I CHANGE MY ORDER?',
                'content' => 'When an order is submitted, we are unable to change the ordered products or quantity selected. If this happens, we suggest you to contact us and cancel the incorrect order and thereafter we recommend you to place a new order on our website, with the correct product(s) and/or quantity.'
            ],
            [
                'title' => 'DO YOU OFFER A WARRANTY?',
                'content' => 'Yes, we offer a 1-year manufacturer warranty. For more information about warranty, please go to: www.saintroches.gatezen.co/warranty.'
            ],
            [
                'title' => 'CAN YOU SHIP TO A P.O BOX?',
                'content' => 'No, our courier is not able to delivery to: P.O. Boxes, Fleet Post Offices or Army Post Offices addresses.'
            ],
            [
                'title' => 'WHAT ARE YOUR TERMS & CONDITIONS?',
                'content' => 'Read about our terms and conditions here: www.saintroches.gatezen.co/terms-and-conditions.'
            ],
            [
                'title' => 'WHAT IS YOUR PRIVACY POLICY?',
                'content' => 'Read about our privacy policy here: www.saintroches.gatezen.co/privacy-policy.'
            ],
            [
                'title' => 'WHAT ARE THE CONDITIONS FOR CAMPAIGNS?',
                'content' => 'The campaigns offered on our website are only valid for orders made directly on our official website and for a limited amount of time. The campaign cannot be applied to orders made before or after the campaign period.'
            ],
            [
                'title' => 'HOW DO I USE MY DISCOUNT/COUPON CODE?',
                'content' => 'At the checkout page, you will find apply coupon code. Enter the code, and click on ”Apply coupon”. Kindly note that only one coupon code is valid per order. A coupon code cannot be combined with an additional promotion / coupon code.'
            ],
            [
                'title' => 'HOW DO I PLACE A PRE-ORDER?',
                'content' => 'When an upcoming item is available for pre-order, you’ll see a “PRE-ORDER” button on the item’s saintroches.gatezen.co page. Simply click the button, and we’ll guide you through the process to secure the item and place your order. A quick note: Just adding items to your cart does not reserve them. You need to finish the checkout process to confirm your pre-order.'
            ],
            [
                'title' => 'WHEN WILL MY PRE-ORDER SHIP?',
                'content' => 'The estimated shipping date is noted on the product page and in the checkout process. If you place an order with pre-order items and in-stock items, you will receive separate shipments and shipment confirmations when each item is dispatched.'
            ],
            [
                'title' => 'WHEN WILL I BE CHARGED IF I PLACE A PRE-ORDER?',
                'content' => 'When you place a pre-order with a credit or debit card, your card will be charged in full when you place the order. If you pay with an instant payment method like Pay Pal, you will be charged in full when you place the order.'
            ],
            [
                'title' => 'WHAT HAPPENS IF I ORDER IN-STOCK AND PRE-ORDER ITEMS?',
                'content' => 'If you order products that are in-stock along with pre-order items, you will receive multiple shipments: we will ship you the in-stock item as soon as possible, and the pre-order item when it becomes available.'
            ],
            [
                'title' => 'WHAT HAPPENS IF I ORDER MULTIPLE PRE-ORDER ITEMS?',
                'content' => 'If you order more than one pre-order item, and they have different shipping dates, they may be sent together at the later shipping date. This depends on the estimated inbounding date.'
            ],
            [
                'title' => 'WHAT IF I WANT TO RETURN A PRE-ORDER ITEM?',
                'content' => 'Our regular return policy applies to pre-order items. You will have 14 days from when you receive your item from your order to return any items from your order. For ease of return processing, we recommend only making one return shipment.'
            ],
        ];

        foreach ($saintRochesFaqs as $saintRochesFaq) {
            Faq::create([
                'title' => $saintRochesFaq['title'],
                'content' => $saintRochesFaq['content'],
                'store_category_id' => 4, // Saint Roches Sunglasses
                'faq_category_id' => 1, // General
                'created_at' => Carbon::now()
            ]);
        }

        $haugerFaqs = [
            [
                'title' => "I AM A SOCIAL MEDIA INFLUENCER. CAN I COLLABORATE WITH YOU?",
                'content' => "Send us an email to info@gatezen.co. Important to provide following information: Your First name and Last name, Phone number, Email address, Country and Links to your social media accounts."
            ],
            [
                'title' => "HOW CAN I BECOME A RETAILER OR DISTRIBUTOR AND SELL YOUR PRODUCTS?",
                'content' => "Please send your request to info@gatezen.co. Important to provide following information: Business name, Address and Country, Phone number, Email address, Contact person’s first name and last name. Please also include company presentation with additional information, other brands in your portfolio etc."
            ],
            [
                'title' => "HOW DO I UNSUBSCRIBE FROM NEWSLETTER UPDATES?",
                'content' => "Click unsubscribe at the bottom of an email communication."
            ],
            [
                'title' => "WHAT METHODS OF PAYMENT ARE ACCEPTED?",
                'content' => "We work with Klarna and PayPal. They support a large number of credit cards. Most common are Mastercard, Visa and American Express. To see the complete list of accepted credit cards, please go to Klarna and/or PayPal websites."
            ],
            [
                'title' => "WHEN I PUT SOMETHING IN MY SHOPPING CART, DOES IT MEAN THE ITEMS ARE AVAILABLE?",
                'content' => "Products availability is checked when you complete the purchase and your order is processed. Placing a product in your shopping cart does not ensure it is available when you are ready to make your purchase, and all orders are subject to product availability."
            ],
            [
                'title' => "Toggle Title",
                'content' => "Toggle Content."
            ],
            [
                'title' => "WILL THERE BE ANY ADDITIONAL COST TO MY ORDER?",
                'content' => "If you order from a country that is part of the European Union, prices include Swedish VAT at 25%. For all countries outside the EU, local charges such as import duties and/or sales tax may apply. These charges are at your expense and we recommend you to contact your local customs office for more information."
            ],
            [
                'title' => "DO YOU OFFER INTERNATIONAL SHIPPING?",
                'content' => "We offer worldwide shipping. All our shipments are sent out by DHL and/or UPS from our warehouse in Sweden. The estimated delivery time is 3-6 business days."
            ],
            [
                'title' => "FROM WHERE ARE YOUR PRODUCTS SHIPPED?",
                'content' => "All orders are shipped from our warehouse in Sweden."
            ],
            [
                'title' => "HOW CAN I CHECK THE STATUS OF MY ORDER?",
                'content' => "All orders are trackable. Once your package is sent, you will receive an email with your tracking number."
            ],
            [
                'title' => "HOW DO I CANCEL MY ORDER?",
                'content' => "If you wish to cancel your order, please contact us. If we are unable to process the cancellation, usually because the package has already been shipped, we contact your courier to have the package returned to our warehouse. Only when the package has returned to our warehouse, we will be able to process the cancellation."
            ],
            [
                'title' => "CAN I RETURN OR EXCHANGE MY ORDER?",
                'content' => "Customer who made a purchase from our webshop is eligible for a 14-day free exchange guarantee. Read more here: www.hauger.gatezen.co/terms-and-conditions."
            ],
            [
                'title' => "CAN I CHANGE MY ORDER?",
                'content' => "When an order is submitted, we are unable to change the ordered products or quantity selected. If this happens, we suggest you to contact us and cancel the incorrect order and thereafter we recommend you to place a new order on our website, with the correct product(s) and/or quantity."
            ],
            [
                'title' => "DO YOU OFFER A WARRANTY?",
                'content' => "For more information about warranty, please go to: www.hauger.gatezen.co/warranty."
            ],
            [
                'title' => "CAN YOU SHIP TO A P.O BOX?",
                'content' => "No, our courier is not able to delivery to: P.O. Boxes, Fleet Post Offices or Army Post Offices addresses."
            ],
            [
                'title' => "WHAT ARE YOUR TERMS & CONDITIONS?",
                'content' => "Read about our terms and conditions here: www.hauger.gatezen.co/terms-and-conditions."
            ],
            [
                'title' => "WHAT IS YOUR PRIVACY POLICY?",
                'content' => "Read about our privacy policy here: www.hauger.gatezen.co/privacy-policy."
            ],
            [
                'title' => "WHAT ARE THE CONDITIONS FOR CAMPAIGNS?",
                'content' => "The campaigns offered on our website are only valid for orders made directly on our official website and for a limited amount of time. The campaign cannot be applied to orders made before or after the campaign period."
            ],
            [
                'title' => "HOW DO I USE MY DISCOUNT/ COUPON CODE?",
                'content' => "At the checkout page, you will find apply coupon code. Enter the code, and click on ”Apply coupon”. Kindly note that only one coupon code is valid per order. A coupon code cannot be combined with an additional promotion / coupon code."
            ],
        ];

        foreach ($haugerFaqs as $haugerFaq) {
            Faq::create([
                'title' => $haugerFaq['title'],
                'content' => $haugerFaq['content'],
                'store_category_id' => 5, // Hauger Watches
                'faq_category_id' => 1, // General
                'created_at' => Carbon::now()
            ]);
        }

        // $getmbracedFaqs = [
        //     [
        //         'title' => "I AM A SOCIAL MEDIA INFLUENCER. CAN I COLLABORATE WITH YOU?",
        //         'content' => "Yes, we would love to. If you are interested, go to ‘Become an affiliate‘ in Menu and sign up. Or you can send us an email to affiliate@gatezen.co Important to provide following information: Your First name and Last name, Phone number, Email address, Country and Links to your social media accounts."
        //     ],
        //     [
        //         'title' => "HOW CAN I BECOME A RETAILER OR DISTRIBUTOR AND SELL YOUR PRODUCTS?",
        //         'content' => "Please send your request to info@gatezen.co. Important to provide following information: Business name, Address and Country, Phone number, Email address, Contact person’s first name and last name. Please also include company presentation with additional information, other brands in your portfolio etc."
        //     ],
        //     [
        //         'title' => "HOW DO I UNSUBSCRIBE FROM NEWSLETTER UPDATES?",
        //         'content' => "Click unsubscribe at the bottom of an email communication."
        //     ],
        //     [
        //         'title' => "WHAT METHODS OF PAYMENT ARE ACCEPTED?",
        //         'content' => "We work with Klarna and PayPal. They support a large number of credit cards. Most common are Mastercard, Visa and American Express. To see the complete list of accepted credit cards, please go to Klarna and/or PayPal websites."
        //     ],
        //     [
        //         'title' => "WHEN I PUT SOMETHING IN MY SHOPPING CART, DOES IT MEAN THE ITEMS ARE AVAILABLE?",
        //         'content' => "Products availability is checked when you complete the purchase and your order is processed. Placing a product in your shopping cart does not ensure it is available when you are ready to make your purchase, and all orders are subject to product availability."
        //     ],
        //     [
        //         'title' => "WILL THERE BE ANY ADDITIONAL COST TO MY ORDER?",
        //         'content' => "If you order from a country that is part of the European Union, prices include Swedish VAT at 25%. For all countries outside the EU, local charges such as import duties and/or sales tax may apply. These charges are at your expense and we recommend you to contact your local customs office for more information."
        //     ],
        //     [
        //         'title' => "DO YOU OFFER INTERNATIONAL SHIPPING?",
        //         'content' => "We offer worldwide shipping. All our shipments are sent out by DHL and/or UPS from our warehouse in Sweden. The estimated delivery time is 3-6 business days."
        //     ],
        //     [
        //         'title' => "FROM WHERE ARE YOUR PRODUCTS SHIPPED?",
        //         'content' => "All orders are shipped from our warehouse in Sweden."
        //     ],
        //     [
        //         'title' => "HOW CAN I CHECK THE STATUS OF MY ORDER?",
        //         'content' => "All orders are trackable. Once your package is sent, you will receive an email with your tracking number."
        //     ],
        //     [
        //         'title' => "HOW DO I CANCEL MY ORDER?",
        //         'content' => "If you wish to cancel your order, please contact us. If we are unable to process the cancellation, usually because the package has already been shipped, we contact your courier to have the package returned to our warehouse. Only when the package has returned to our warehouse, we will be able to process the cancellation."
        //     ],
        //     [
        //         'title' => "CAN I RETURN OR EXCHANGE MY ORDER?",
        //         'content' => "Customer who made a purchase from our webshop is eligible for a 14-day free exchange guarantee. Read more here: www.saintroches.gatezen.co/terms-and-conditions."
        //     ],
        //     [
        //         'title' => "CAN I CHANGE MY ORDER?",
        //         'content' => "When an order is submitted, we are unable to change the ordered products or quantity selected. If this happens, we suggest you to contact us and cancel the incorrect order and thereafter we recommend you to place a new order on our website, with the correct product(s) and/or quantity."
        //     ],
        //     [
        //         'title' => "DO YOU OFFER A WARRANTY?",
        //         'content' => "Yes, we offer a 1-year manufacturer warranty. For more information about warranty, please go to: www.getmbraced.com/warranty."
        //     ],
        //     [
        //         'title' => "CAN YOU SHIP TO A P.O BOX?",
        //         'content' => "No, our courier is not able to delivery to: P.O. Boxes, Fleet Post Offices or Army Post Offices addresses."
        //     ],
        //     [
        //         'title' => "WHAT IS YOUR PRIVACY POLICY?",
        //         'content' => "Read about our privacy policy here: www.getmbraced.com/privacy-policy."
        //     ],
        //     [
        //         'title' => "WHAT ARE THE CONDITIONS FOR CAMPAIGNS?",
        //         'content' => "The campaigns offered on our website are only valid for orders made directly on our official website and for a limited amount of time. The campaign cannot be applied to orders made before or after the campaign period."
        //     ],
        //     [
        //         'title' => "HOW DO I USE MY DISCOUNT/COUPON CODE?",
        //         'content' => "At the checkout page, you will find apply coupon code. Enter the code, and click on ”Apply coupon”. Kindly note that only one coupon code is valid per order. A coupon code cannot be combined with an additional promotion / coupon code."
        //     ],
        //     [
        //         'title' => "HOW DO I PLACE A PRE-ORDER?",
        //         'content' => "When an upcoming item is available for pre-order, you’ll see a “PRE-ORDER” button on the item’s getmbraced.com page. Simply click the button, and we’ll guide you through the process to secure the item and place your order. A quick note: Just adding items to your cart does not reserve them. You need to finish the checkout process to confirm your pre-order."
        //     ],
        //     [
        //         'title' => "WHEN WILL MY PRE-ORDER SHIP?",
        //         'content' => "The estimated shipping date is noted on the product page and in the checkout process. If you place an order with pre-order items and in-stock items, you will receive separate shipments and shipment confirmations when each item is dispatched."
        //     ],
        //     [
        //         'title' => "WHEN WILL I BE CHARGED IF I PLACE A PRE-ORDER?",
        //         'content' => "When you place a pre-order with a credit or debit card, your card will be charged in full when you place the order. If you pay with an instant payment method like Pay Pal, you will be charged in full when you place the order."
        //     ],
        //     [
        //         'title' => "WHAT HAPPENS IF I ORDER IN-STOCK AND PRE-ORDER ITEMS?",
        //         'content' => "If you order products that are in-stock along with pre-order items, you will receive multiple shipments: we will ship you the in-stock item as soon as possible, and the pre-order item when it becomes available."
        //     ],
        //     [
        //         'title' => "WHAT HAPPENS IF I ORDER MULTIPLE PRE-ORDER ITEMS?",
        //         'content' => "If you order more than one pre-order item, and they have different shipping dates, they may be sent together at the later shipping date. This depends on the estimated inbounding date."
        //     ],
        //     [
        //         'title' => "WHAT IF I WANT TO RETURN A PRE-ORDER ITEM?",
        //         'content' => "Our regular return policy applies to pre-order items. You will have 14 days from when you receive your item from your order to return any items from your order. For ease of return processing, we recommend only making one return shipment."
        //     ],
        // ];

        // foreach ($getmbracedFaqs as $getmbracedFaq) {
        //     Faq::create([
        //         'title' => $getmbracedFaq['title'],
        //         'content' => $getmbracedFaq['content'],
        //         'store_category_id' => 1, // Mbraced.by
        //         'faq_category_id' => 1, // General
        //         'created_at' => Carbon::now()
        //     ]);
        // }
    }
}
