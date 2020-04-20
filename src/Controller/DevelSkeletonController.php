<?php

namespace Drupal\devel_skeleton\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Prezent\Soap\Client\SoapClient;
use SoapFault;

class DevelSkeletonController extends ControllerBase {

  /**
   * Build.
   */
  public function build() {
//    $client = new SoapClient('https://' . urlencode('ISU_INT034_Drupal_Recruiting') . ':' . urlencode('WDDrupalk{6O/H') . '@wd3-services1.myworkday.com/ccx/service/stageentertainment/Custom/Data/Recruiting/v32.1?wsdl');
    $client = new SoapClient('/home/alex/vhosts/seplatform.local/htdocs/docroot/modules/contrib/devel_skeleton/src/Controller/local.wsdl');
    $wss_ns = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

    $auth = new \stdClass();
    $auth->Username = new \SoapVar('ISU_INT034_Drupal_Recruiting@stageentertainment', XSD_STRING, NULL, $wss_ns, NULL, $wss_ns);
    $auth->Password = new \SoapVar('WDDrupalk{6O/H', XSD_STRING, NULL, $wss_ns, NULL, $wss_ns);

    $username_token = new \stdClass();
    $username_token->UsernameToken = new \SoapVar($auth, SOAP_ENC_OBJECT, NULL, $wss_ns, 'ISU_INT034_Drupal_Recruiting@stageentertainment', $wss_ns);

    $security_sv = new \SoapVar(new \SoapVar($username_token, SOAP_ENC_OBJECT, NULL, $wss_ns, 'ISU_INT034_Drupal_Recruiting@stageentertainment', $wss_ns), SOAP_ENC_OBJECT, NULL, $wss_ns, 'Security', $wss_ns);

    $client->__setSoapHeaders(new \SoapHeader($wss_ns, 'Security', $security_sv, true));
    try {
//      kint($client->Get_Location());
//      $result = $client->Get_Job_Postings();
      $result = $client->Get_Job_Postings(['Response_Filter' => [
        'Count' => 999,
      ]]);
      kint($result);
      kint($result->Response_Data->Job_Posting[0]->Job_Posting_Data);
      kint($result->Response_Data->Job_Posting[1]->Job_Posting_Data);
      kint($result->Response_Data->Job_Posting[10]->Job_Posting_Data);
      kint($result->Response_Data->Job_Posting[25]->Job_Posting_Data);
      kint($result->Response_Data->Job_Posting[50]->Job_Posting_Data);
      kint($result->Response_Data->Job_Posting[75]->Job_Posting_Data);
      kint($result->Response_Data->Job_Posting[90]->Job_Posting_Data);
//      kint($result->Response_Data->Job_Posting[0]->Job_Posting_Data->Job_Posting_Location_Data);
//      kint($result->Response_Data->Job_Posting[1]->Job_Posting_Data->Job_Posting_Location_Data);
//      kint($result->Response_Data->Job_Posting[10]->Job_Posting_Data->Job_Posting_Location_Data);
//      kint($result->Response_Data->Job_Posting[25]->Job_Posting_Data->Job_Posting_Location_Data);
//      kint($result->Response_Data->Job_Posting[50]->Job_Posting_Data->Job_Posting_Location_Data);
//      kint($result->Response_Data->Job_Posting[75]->Job_Posting_Data->Job_Posting_Location_Data);
//      kint($result->Response_Data->Job_Posting[90]->Job_Posting_Data->Job_Posting_Location_Data);
      return [
//        '#markup' => $client->Get_Server_Timestamp()->Server_Timestamp_Data,
        '#markup' => 'OK',
      ];
    }
    catch (SoapFault $soapFault) {
      kint($soapFault->getMessage());
    }


//    $client = new SoapClient('/home/alex/vhosts/seplatform.local/htdocs/docroot/modules/contrib/devel_skeleton/src/Controller/local.wsdl');
//    $wss_ns = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
//
//    $auth = new \stdClass();
//    $auth->Username = new \SoapVar('ISU_INT034_Drupal_Recruiting@stageentertainment', XSD_STRING, NULL, $wss_ns, NULL, $wss_ns);
//    $auth->Password = new \SoapVar('WDDrupalk{6O/H', XSD_STRING, NULL, $wss_ns, NULL, $wss_ns);
//
//    $username_token = new \stdClass();
//    $username_token->UsernameToken = new \SoapVar($auth, SOAP_ENC_OBJECT, NULL, $wss_ns, 'ISU_INT034_Drupal_Recruiting@stageentertainment', $wss_ns);
//
//    $security_sv = new \SoapVar(
//    new \SoapVar($username_token, SOAP_ENC_OBJECT, NULL, $wss_ns, 'ISU_INT034_Drupal_Recruiting@stageentertainment', $wss_ns), SOAP_ENC_OBJECT, NULL, $wss_ns, 'Security', $wss_ns);
//
//    $client->__setSoapHeaders(new \SoapHeader($wss_ns, 'Security', $security_sv, true));
//    try {
//      return [
//        '#markup' => $client->Get_Server_Timestamp()->Server_Timestamp_Data,
//      ];
//    }
//    catch (SoapFault $soapFault) {
//      kint($soapFault->getMessage());
//    }


//    $client = new SoapClient('https://' . urlencode('ISU_INT034_Drupal_Recruiting') . ':' . urlencode('WDDrupalk{6O/H') . '@wd3-services1.myworkday.com/ccx/service/stageentertainment/Custom/Data/Recruiting/v32.1?wsdl');
//
//    kint($client);
//
//    try {
//      kint($client->Get_Server_Timestamp());
//    }
//    catch (SoapFault $soapFault) {
//      kint($soapFault->getMessage());
//    }

//    $client = new SoapClient('https://wd3-services1.myworkday.com/ccx/service/stageentertainment/Custom/Data/Recruiting/v32.1?wsdl');

//    $client = new SoapClient('/home/alex/vhosts/seplatform.local/htdocs/docroot/modules/contrib/devel_skeleton/src/Controller/local.wsdl', [
//      'login' => 'ISU_INT034_Drupal_Recruiting',
//      'password' => 'WDDrupalk{6O/H',
//      'UsernameToken' => 'ISU_INT034_Drupal_Recruiting@stageentertainment',
//      'trace' => 1,
//    ]);
//
//    kint($client);
//    try {
//      kint($client->Get_Server_Timestamp());
//    }
//    catch (SoapFault $soapFault) {
//      kint($soapFault->getMessage());
//    }

    return [
      '#markup' => '',
    ];
  }

}
