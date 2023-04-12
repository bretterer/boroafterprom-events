<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Boro Afterprom Order Confirmation (Update)</title>
</head>

<body style="background-color: #f7f7f7;margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;width: 100% !important;height: 100%">

<!-- body -->
<table class="body-wrap" style="background-color: #f7f7f7;margin: 0;padding: 20px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;width: 100%">
    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6"></td>
        <td class="container" bgcolor="#FFFFFF" style="margin: 0 auto !important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;border: 1px solid #f0f0f0;display: block !important;max-width: 600px !important;clear: both !important">

            <!-- content -->
            <div class="content" style="color: #888;margin: 0 auto;padding: 20px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;max-width: 600px;display: block">
                <table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;width: 100%">
                    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
                        <td style="text-align: center;padding: 10px;margin: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
                            <h1> Springboro After Prom </h1>
                            <h4> Ticket Order Confirmation (Updated)</h4>
                            <p> There was an error in some previous confirmation emails you received specifying "THIS IS NOT YOUR TICKET". This was a mistake on our part. </p>
                            <p>This year, there is NO PHYSICAL ticket. ANY EMAIL CONFIRMATION  received is your ticket.</p>
                            <p>If you paid via credit card, you are all set. If you chose to pay via cash, please see the rest of this email for details on how to pay.</p>
                        </td>
                    </tr>
                    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
                        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
















   <!-- Cash Payment -->
   @if($attendee->ticket->paid_on == null)
<br><br>
<strong>Pending Payment</strong>
<br><br>
You chose to pay with cash, Please bring a screenshot of this and cash with you to lunch <br/>on <span class="font-bold text-xl">April 13</span> or <span class="font-bold text-xl">April 14</span> to compete your registration!
<br><br>
@endif


<h3>Order Details</h3>
Order Reference: <strong>#{{ explode('-', $attendee->ticket->uuid)[0] }}</strong><br>
Order Name: <strong>{{$attendee->first_name}} {{$attendee->last_name}}</strong><br>
Order Date: <strong>{{ $attendee->ticket->orderDate }}</strong><br>
Order Email: <strong>{{$attendee->email}}</strong><br>



<h3>Order Items</h3>
<div style="padding:10px; background: #F9F9F9; border: 1px solid #f1f1f1;">
    <table style="width:100%; margin:10px;">
        <tr>
            <td>
                <strong>Ticket</strong>
            </td>
            <td>
                <strong>For</strong>
            </td>
            <td>
                <strong>Price</strong>
            </td>
        </tr>

        <tr>
            <td>Springboro Afterprom 2023</td>
            <td>{{$attendee->first_name}} {{$attendee->last_name}}</td>
            <td>$10.00</td>
        </tr>
        @if ($attendee->guest)
        <tr>
            <td>Springboro Afterprom 2023</td>
            <td>{{$attendee->guest->first_name}} {{$attendee->guest->last_name}}</td>
            <td>$10.00</td>
        </tr>
        @endif
        <tr>
            <td></td>
            <td style="text-align: right; padding:10px;"><strong>Total</strong></td>
            <td>@if ($attendee->guest) $20.00 @else $10.00 @endif</td>
        </tr>
    </table>
    <br><br>


</div>


@if($attendee->ticket->payment_type != "cash")
    <!-- Card Payment -->
    <h3 style="margin-bottom: 4px;">Payment Details</h3>
Payment Date: <strong>{{$attendee->ticket->paid_on->format('F j, Y')}}</strong><br>
Payment Type: <strong>{{strtoupper($paymentInfo->payment_method_details->card->brand)}}</strong><br>
Ending In: <strong>{{$paymentInfo->payment_method_details->card->last4}}</strong><br>
Transaction ID: <strong>{{$paymentInfo->id}}</strong><br>
@endif

@if($attendee->ticket->payment_type == "cash" && $attendee->ticket->paid_on != null)
    <!-- Cash Payment -->
    <h3 style="margin-bottom: 4px;">Payment Details</h3>
Payment Date: <strong>{{$attendee->ticket->paid_on->format('F j, Y')}}</strong><br>
Payment Type: <strong>Cash</strong><br>
@endif
<br><br>
Thank you





















                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->

        </td>
        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6"></td>
    </tr>
</table>
<!-- /body -->

<!-- footer -->
<table class="footer-wrap" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;width: 100%;clear: both !important">
    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6"></td>
        <td class="container" style="margin: 0 auto !important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;display: block !important;max-width: 600px !important;clear: both !important">

            <!-- content -->
            <div class="content" style="margin: 0 auto;padding: 20px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;max-width: 600px;display: block">
                <table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6;width: 100%">
                    <tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
                        <td align="center" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6">
                            @yield('footer')
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->

        </td>
        <td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;font-size: 100%;line-height: 1.6"></td>
    </tr>
</table>
<!-- /footer -->

</body>
</html>