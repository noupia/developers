<?php


/**
 * Noupia for Developers
 * 
 * @version 1.0.0
 * @since 1.0.0
 * @link https://noupia.com/developers
 * @author Noupia Limited
 * @copyright © 2022 Noupia, Ltd.
 * 
 */


  /**
	 * Noupia Pay - Function to initiate a debit request from customer.
	 * @return json $response A response object
	 * 
	 */
	
	function NoupiaPayInititatePayment()
	{
		
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.noupia.com/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
          "operation" => "initiate",           // Specify the operation will like to perform.
          "reference" => "An EBook",           // Provide a reason for the payment.
          "amount"    => 100,                  // Amount (100 CFA minimum and should be a multiple of 5).
          "phone"     => "6XXXXXXXX",          // Customer's Noupia phone number (should be provided to you by the payer).
        )),
        CURLOPT_HTTPHEADER => array(
          'Noupia-API-Signature: np-live',
          'Noupia-API-Key: YOUR_NOUPIA_DEVELOPER_KEY',
          'Noupia-Product-Key: YOUR_NOUPIA_PAY_SUBSSCRIPTION_KEY',
          'Content-Type: application/json',
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      print $response;  // use json_decode($response) to manipulate the data returned
	}




  /**
	 * Noupia Pay - Function to verify the status of a payment made.
	 * @return json $response A response object
	 * 
	 */
	
	function NoupiaPayVerifyPayment()
	{
		
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.noupia.com/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
          "operation"   => "verify",                  // Specify the operation will like to perform.
          "transaction" => "PAYXXXXXXXXXXXXXXXXX"     // Specify the transaction ID earlier returned when payment was successfully initiated.
        )),
        CURLOPT_HTTPHEADER => array(
          'Noupia-API-Signature: np-live',
          'Noupia-API-Key: YOUR_NOUPIA_DEVELOPER_KEY',
          'Noupia-Product-Key: YOUR_NOUPIA_PAY_SUBSSCRIPTION_KEY',
          'Content-Type: application/json',
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      print $response;  // use json_decode($response) to manipulate the data returned
	}
