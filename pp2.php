<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<!-- Saved buttons use the "secure click" command -->
<input type="hidden" name="cmd" value="_s-xclick">

<!-- Saved buttons are identified by their button IDs -->
<input type="hidden" name="hosted_button_id" value="221">

<!-- Saved buttons display an appropriate button image. -->
<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>



<form action="Checkout/paypal_ec_redirect.php" method="POST">
      <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="10.00"></input>
      <input type="hidden" name="currencyCodeType" value="USD"></input>
      <input type="hidden" name="paymentType" value="Sale"></input>
      <!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here
      	https://developer.paypal.com/webapps/developer/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/
      	 -->
      <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal"></input>
</form>