<?php

// $amount= $_GET['amount'] * '65'; 
// $package= $_GET['package']; 
$MERCHANT_KEY = "CArE3SVj";
$SALT = "uiuM3w7K54";
// Merchant Key and Salt as provided by Payu.

//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';
$currentDir    = 'http://www.prathamvision.com/payucart/';
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
     <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/include/wp-content/themes/rhapsody/images/logo.png" border="0" align="center" style="margin-left: 590px; margin-top: 29px;      background: black;"/></a>
    <br/>
    <br/>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table width="50%" border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#0099FF">
        <tr>
          <td><b>Mandatory Parameter</b></td>
        </tr>
        
        <?php 
          // if(empty($_GET['amount'])){

            $total_price=0;
            $dis_price=0;
  $ttl_qnty1 = $this->Dashboard_model->ttl_qnty();
  $ttl_qnty =  ($ttl_qnty1['ttl_qnty']);

  $ttl_amnt = $this->Dashboard_model->ttl_amnt();

  if(isset($ttl_amnt) && $ttl_amnt){

  foreach ($ttl_amnt as $key => $row) {
    $total_price+=$row['c_quantity']*$row['c_price'];
}
}
         if(isset($_SESSION['coupon']['discount_amnt']) &&  $_SESSION['coupon']['discount_amnt']!=''){
   $dis_price = $_SESSION['coupon']['discount_amnt'];
 }
 $Subtotal = $total_price - $dis_price; 

       // echo $Subtotal;


          ?>
          <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($Subtotal)) ? '' : $Subtotal ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($checkout['first_name'])) ? '' : $checkout['first_name']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($checkout['user_email'])) ? '' : $checkout['user_email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($checkout['phone_no'])) ? '' : $checkout['phone_no']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Total Quantity: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($ttl_qnty)) ? '' : $ttl_qnty; ?></textarea></td>
        </tr>
<!--  -->
     
        <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" />
        <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" />

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($checkout['last_name'])) ? '' : $checkout['last_name']; ?>" /></td>
         <!--  <td>Cancel URI: </td>
          <td><input name="curl" value="" /></td> -->
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($checkout['od_address'])) ? '' : $checkout['od_address']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($checkout['city'])) ? '' : $checkout['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($checkout['state'])) ? '' : $checkout['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($checkout['country'])) ? '' : $checkout['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($checkout['postal_code'])) ? '' : $checkout['postal_code']; ?>" /></td>
        </tr>
        <!-- <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr> -->
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
