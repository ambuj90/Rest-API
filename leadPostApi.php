<?php

$ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

$to_post = array();
$to_post['username']             = 'BlueRibbon_Min.25cents';
$to_post['apikey']               = '707e779dbf5d7d7b2cf86b11c04579830aa426e7';
$to_post['campaignId']           = '1234';
$to_post['ip_address']           = $ip;
$to_post['agent']                = 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:10.0) Gecko/20100101 Firefox/10.0';
$to_post['min_price']            = '0.25';
$to_post['amount']               = '500';
$to_post['fName']                = $_POST["txtName"];
$to_post['lName']                = $_POST["txtLname"];
$to_post['zip']                  = $_POST["txtZip"];
$to_post['city']                 = $_POST["txtCity"];
$to_post['state']                = $_POST["txtState"];
$to_post['address']              = $_POST["txtAdd"];
$to_post['lengthAtAddress']      = $_POST['txtLatAdd'];
$to_post['licenseState']         = $_POST['txtIssuingState'];
$to_post['email']                = $_POST["txtEmail"];
$to_post['license']              = $_POST['txtLicense'];
$to_post['rentOwn']              = $_POST['txtHomeType'];
$to_post['phone']                = $_POST['txtPhone1'];
$to_post['workPhone']            = $_POST['txtWorkPhone1'];
$to_post['callTime']             = $_POST['txtCallTime'];
$to_post['bMonth']               = date("m",strtotime($_POST['txtDob']));
$to_post['bDay']                 = date("d",strtotime($_POST['txtDob']));
$to_post['bYear']                = date("Y",strtotime($_POST['txtDob']));
$to_post['ssn']                  = $_POST['txtSocialSecurityNum'];;
$to_post['armedForces']          = $_POST['txtArmedForces'];;
$to_post['incomeSource']         = $_POST['txtIncomeSource'];
$to_post['employerName']         = $_POST['txtEmployerName'];
$to_post['timeEmployed']         = $_POST['txtTimeEmployed'];
$to_post['employerPhone']        = $_POST['txtEmployerPhone1'];
$to_post['jobTitle']             = $_POST['txtJobTitle'];
$to_post['paidEvery']            = $_POST['txtGetPaid'];
$to_post['nextPayday']           = date('d-m-Y', strtotime($_POST['txtNextPayDate']));
$to_post['secondPayday']         = date('d-m-Y', strtotime($_POST['txtSecPayDate']));
$to_post['abaNumber']            = $_POST['txtAbaNumber'];
$to_post['accountNumber']        = $_POST['txtAccountNumber'];
$to_post['accountType']          = $_POST['txtAccountType'];
$to_post['bankName']             = $_POST['txtBankName'];
//$to_post['bankPhone']            = $_POST[''];
$to_post['monthsBank']           = $_POST['txtMonthsAtBank'];
$to_post['directDeposit']        = $_POST['txtPaidWithDD'];
$to_post['monthlyNetIncome']     = $_POST['txtGrossIncome'];
// $to_post['ownCar']               = 'no';
$to_post['note']                 = 'First Lead';
$to_post['websiteName']          = 'www.itmedia.xyz';
$to_post['timeout']              = '240';
//$to_post['lead_type']            = 'installment';
$to_post['loan_reason']          = $_POST['txtLoanReason'];
$to_post['credit_type']          = $_POST['txtCreditType'];
//$to_post['atrk']                 = 'XYZ123654';
$to_post['unsecuredDebt']        = $_POST['txtUnsecuredDebt'];

$ch = curl_init();
$posting_url = "https://api.itmedia.xyz/post/testjson/api/v2";
//$posting_url = "https://api.itmedia.xyz/post/productionjson/api/v2";


curl_setopt(    $ch,    CURLOPT_URL,               $posting_url             );
curl_setopt(    $ch,    CURLOPT_POST,              1                        );
curl_setopt(    $ch,    CURLOPT_POSTFIELDS,        $to_post                 );
curl_setopt(    $ch,    CURLOPT_FAILONERROR,       1                        );
curl_setopt(    $ch,    CURLOPT_HEADER,            0                        );
curl_setopt(    $ch,    CURLOPT_RETURNTRANSFER,    1                        );
curl_setopt(    $ch,    CURLOPT_SSL_VERIFYPEER,    false                    );
curl_setopt(    $ch,    CURLOPT_SSL_VERIFYHOST,    false                    );
curl_setopt(    $ch,    CURLOPT_TIMEOUT,           0                        );


$ret = curl_exec($ch);
curl_close($ch);


$ret_pkt = json_decode($ret);

$leadStatus = $ret_pkt -> Status;

createdLead();

createLeadResponse();

function createLeadResponse(){
     INSERT INTO LeadResponse (
          leadID = $ret_pkt->LeadID,
          lStatus = $ret_pkt->Status,
          lRedirect = $ret_pkt->Redirect,
          lPrice = $ret_pkt->Price
          lPriceRejectAmount = $ret_pkt->PriceRejectAmount,
          lMessage = $ret_pkt->Messages,
          createdBy = $ret_pkt->LeadID,
          updatedBy = "RadCred"
     );
}

function createLead(){

     INSERT INTO Customers (
     leadID = $_POST['leadID'],
     Name    = $_POST['txtName'],
     Lname   = $_POST['txtLname'],
     Dob  = $_POST['txtDob'],
     Add   = $_POST['txtAdd'],
     Add1    = $_POST['txtAdd1'],
     Zip   = $_POST['txtZip'],
     City    = $_POST['txtCity'],
     State   = $_POST['txtState'],
     Email   = $_POST['txtEmail'],
     Phone  = $_POST['txtPhone'],
     LatAdd    = $_POST['txtLatAdd'],
     HomeType    = $_POST['txtHomeType'],
     CallTime    = $_POST['txtCallTime'],
     IncomeSource    = $_POST['txtIncomeSource'],
     TimeEmployed    = $_POST['txtTimeEmployed'],
     GetPaid   = $_POST['txtGetPaid'],
     ArmedForces   = $_POST['txtArmedForces'],
     EmployerName    = $_POST['txtEmployerName'],
     EmployerPhone   = $_POST['txtEmployerPhone'],
     JobTitle    = $_POST['txtJobTitle'],
     GrossIncome   = $_POST['txtGrossIncome'],
     NextPayDate   = $_POST['txtNextPayDate'],
     SecPayDate    = $_POST['txtSecPayDate'],
     License   = $_POST['txtLicense'],
     IssuingState    = $_POST['txtIssuingState'],
     SocialSecurityNum   = $_POST['txtSocialSecurityNum'],
     AccountType   = $_POST['txtAccountType'],
     BankName    = $_POST['txtBankName'],
     PaidWithDD    = $_POST['txtPaidWithDD'],
     MonthsAtBank    = $_POST['txtMonthsAtBank'],
     AbaNumber = $_POST['txtAbaNumber'],
     AccountNumber  = $_POST['txtAccountNumber'],
     LoanReason    = $_POST['txtLoanReason'],
     CreditType    = $_POST['txtCreditType'],
     UnsecuredDebt   = $_POST['txtUnsecuredDebt'],
     createdBy   = $_POST['leadID'],
     updatedBy   = $_POST['leadID'],
     status = 1);

}
//}

echo $ret;


?>
