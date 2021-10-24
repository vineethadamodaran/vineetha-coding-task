<?php /*code for add registration details as salesforce lead*/
			
			
			
								 define ("salesforce_username", 'developer@wearetenzing.com');
								 define ("salesforce_password", 'Vineetha123*');
								 define ("salesforce_token", 'URJjE6ojyTwSqBwJ06GkIh4Qi');
								 
								 define ("salesforce_wsdl", '../soapclient/partner.wsdl.xml');
								  
								 require_once ('../soapclient/SforcePartnerClient.php');
								 
								 	
								 ini_set('soap.wsdl_cache_enabled', 0);
								 ini_set('soap.wsdl_cache_ttl', 0);
								  
								 //Create a new Salesforce Partner object
								 $connection = new SforcePartnerClient();
								 
								 //Create the SOAP connection to Salesforce
								 try {
									 
								  $connection->createConnection(salesforce_wsdl);
								 } catch (Exception $e) {
									
									 
									//Salesforce could be down, or you have an error in configuration
								  //Check your WSDL path
								  //Otherwise, handle this exception
								 
								 }
								 
								 //Pass login details to Salesforce
								 try {
								  $connection->login(salesforce_username, salesforce_password.salesforce_token);
								 } catch (Exception $e) {
								  //Make sure your username and password is correct
								  //Otherwise, handle this exception
								  
								  
								 }
								 
									 //Describing the Leads object and printing the array
									 $describe = $connection->describeSObjects(array('Lead'));
								  
								 
									 //Create New Lead
									 $leadFirstName = $userdata['first_name'];
									 $leadLastName = "n";
									 $leadCompany = $userdata['display_name'];
									 $leadEmail = $userdata['user_email'];
								 
									 //Creating the Lead Object
									 $lead = new stdClass;
									 $lead->type = 'Lead';
									 $lead->fields = array(
										  'FirstName' => $leadFirstName,
										  'LastName' => $leadLastName,
										  'Company' => $leadCompany,
										  'Email' => $leadEmail
									 );
								 
									 //Submitting the Lead to Salesforce
									 $result = $connection->create(array($lead), 'Lead');	
			
			
			/*  Ends code for salesforce*/
            ?>