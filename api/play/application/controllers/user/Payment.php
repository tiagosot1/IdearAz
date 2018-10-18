<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('adm/payment');
	}
	public function Sessao_pagamento($id){
		
		if($id==1)
		{
			
				$checkout = new Checkout();
				$checkout->printSessionId();
				
		}	else if($id==2)
			{
					
					$checkout = new Checkout();
					$checkout->doPayment($_POST);
						
			}
	}
	public function teste($codeTrasaction){
			 $this->load->model("usuarios");
		  	$dados["id_Transaction"] = $this->usuarios->get_transacao_pagseguro($codeTrasaction);
			
			foreach($dados["id_Transaction"] as $idTransacao){
				$idTransacao = $idTransacao->id;
			}
			echo $idTransacao;
	}
	  public function transacao_pagseguro($codeTrasaction){
	
		  	if($codeTrasaction!=''){
			$data = date("d-m-Y H:i:s"); 
			$this->load->library('session');
			$id_usuario = $this->session->id_usuario; 
			
			try {
				  $this->load->model("usuarios");				  
				  $dados['codeTransaction'] = $codeTrasaction;
				//$dados['id_usuario'] = $id_usuario;
				  $dados['id_usuario'] = '1';
				  $dados['date_transacao'] = $data;
				  $this->usuarios->insert_transacao_pagseguro($dados);
						  
				   echo 'ok';
				   
			  } catch (Exception $e) {
				  echo 'error';
		  } }else{
			$this->load->helper('url');
   			
        
		}
	  }
	public function notificacao_pagseguro(){
		if($_POST['notificationType'] and $_POST['notificationType']=='transaction'){
			$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/'.$_POST['notificationCode'].'?email=tiagocdc2008@gmail.com&token=5EE76A162E704510AD0E8AC2E2A29796';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		$transactionCurl = curl_exec($curl);
		curl_close($curl);
		
		$transaction = simplexml_load_string($transactionCurl);
		/*echo $idPedido = $transaction->reference;
		echo '</br>';
		echo $status = $transaction->date;
		echo '</br>';
		echo $status = $transaction->paymentMethod->code;
		echo '</br>';
		echo $status = $transaction->paymentLink;
		echo '</br>';*/
		$status = $transaction->status;
		if($status==1){
			$status_pagamento =  'Aguardando pagamento';
		} else if($status==2){
			
			$status_pagamento =  'Em análise';
		}else if($status==3){
			
			$status_pagamento =  'Paga';
		}else if($status==4){
			
			$status_pagamento =  'Disponível';
		}else if($status==5){
			
			$status_pagamento =  'Em disputa';
		}else if($status==6){
			
			$status_pagamento =  'Devolvida';
		}else if($status==7){
			
			$status_pagamento =  'Cancelada';
		}else if($status==8){
			
			$status_pagamento =  'Debitado';
		}else if($status==9){
			
			$status_pagamento = 'Retenção temporária';
		}

		
		/*echo '</br>';
		
		var_dump($transaction);*/
		
//$variavel = $_GET["transaction_id"]; /* voce acabou de "pegar" o valor de "origem_internacional" que foi passado pelo metodo GET */
//echo $variavel; //ira imprimir CBW

	$this->load->model("usuarios");
	
	$dadosGet["id_Transaction"] = $this->usuarios->get_transacao_pagseguro($transaction->code);
			
			foreach($dadosGet["id_Transaction"] as $idTransacao){
				$idTransacao = $idTransacao->id;
			}
			
				
	$dados['fk_codeTransaction'] = $idTransacao;
	$dados['reference'] = $transaction->reference;
	$dados['date'] = $transaction->date;
	//$dados['paymentLink'] = $transaction->paymentLink;
	$dados['status'] = $status_pagamento;
	$dados['codeNotification'] = $_POST['notificationCode'];
	$dados['paymentMethodCode'] = $transaction->paymentMethod->code;
	$dados['paymentMethodType'] = $transaction->paymentMethod->type;
	$dados['transactionType'] = $transaction->type;
	
	$this->usuarios->inserir_noticacaoes_pagseguro($dados);
	
			
		}
		
		

	}
	
}

	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	class HttpConnection {

    private $status;
    private $response;

    public function __construct() {
        if (!function_exists('curl_init')) {
            throw new Exception('CURL library is required.');
        }
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getResponse() {
        return $this->response;
    }

    public function setResponse($response) {
        $this->response = $response;
    }

    public function post($url, array $data = null, $timeout = null, $charset = null) {
        return $this->curlConnection('POST', $url, $data, $timeout, $charset);
    }

    public function get($url, array $data = null, $timeout = null, $charset = null) {
        return $this->curlConnection('GET', $url, $data, $timeout, $charset);
    }

    private function curlConnection($method, $url, array $data = null, $timeout = 20, $charset = 'ISO-8859-1') {
        
        if (strtoupper($method) === 'POST') {
            $postFields = ($data ? http_build_query($data, '', '&') : "");
            $contentLength = "Content-length: " . strlen($postFields);
            $methodOptions = array(
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postFields,
            );
        } else {
			
			$url = $url.'?'.http_build_query($data, '', '&amp;');
			
			var_dump($url);
			
            $contentLength = null;
            $methodOptions = array(
                CURLOPT_HTTPGET => true
            );
        }
        
        $options = array(
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded; charset=" . $charset,
                $contentLength
            ),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_CONNECTTIMEOUT => $timeout
        );
        
        $options = ($options + $methodOptions);
        
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $resp = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error = curl_errno($curl);
        $errorMessage = curl_error($curl);
        
        curl_close($curl);

        $this->setStatus((int) $info['http_code']);
        $this->setResponse((String) $resp);
        
       
        
        if ($error) {
            throw new Exception("CURL can't connect: $errorMessage");
            
        } else {
            return true;
        }
        
    }
    
}
	
class XmlParser {

    private $dom;

    public function __construct($xml) {
		$xml = mb_convert_encoding($xml, "UTF-8", "UTF-8,ISO-8859-1");
        $parser = xml_parser_create();
        if (!xml_parse($parser, $xml)) {
            throw new Exception("XML parsing error: (" . xml_get_error_code($parser) .") " . xml_error_string(xml_get_error_code($parser)));
        } else {
            $this->dom = new DOMDocument();
            $this->dom->loadXml($xml);
        }
    }

    public function getResult($node = null) {
        $result = $this->toArray($this->dom);
        if ($node) {
            if (isset($result[$node])) {
                return $result[$node];
            } else {
                throw new Exception("XML parsing error: undefined index [$node]");
            }
        } else {
            return $result;
        }
    }

    private function toArray($node) {
        
        
        $occurrence = array();
        $result = null;
        /** @var $node DOMNode */

        if ($node->hasChildNodes()) {
            foreach ($node->childNodes as $child) {
                if (!isset($occurrence[$child->nodeName])) {
                    $occurrence[$child->nodeName] = null;
                }
                $occurrence[$child->nodeName]++;
            }
        }
        if (isset($child)) {
            if ($child->nodeName == '#text') {
                $result = html_entity_decode(
                    htmlentities($node->nodeValue, ENT_COMPAT, 'UTF-8'),
                    ENT_COMPAT,
                    'ISO-8859-15'
                );
            } else {
                if ($node->hasChildNodes()) {
                    $children = $node->childNodes;
                    for ($i = 0; $i < $children->length; $i++) {
                        $child = $children->item($i);
                        if ($child->nodeName != '#text') {
                            if ($occurrence[$child->nodeName] > 1) {
                                $result[$child->nodeName][] = $this->toArray($child);
                            } else {
                                $result[$child->nodeName] = $this->toArray($child);
                            }
                        } else {
                            if ($child->nodeName == '0') {
                                $text = $this->toArray($child);
                                if (trim($text) != '') {
                                    $result[$child->nodeName] = $this->toArray($child);
                                }
                            }
                        }
                    }
                }
                if ($node->hasAttributes()) {
                    $attributes = $node->attributes;
                    if (!is_null($attributes)) {
                        foreach ($attributes as $key => $attr) {
                            $result["@" . $attr->name] = $attr->value;
                        }
                    }
                }
            }
            
            // One error array fix
			if (isset($result['errors']) && isset($result['errors']['error']['code'])) {
				$firstError = $result['errors']['error'];
				$result['errors']['error'] = Array(0 => $firstError);
			}
            
            return $result;
        } else {
            return null;
        }
    }
    
}
	
	class PagSeguroData {
		
		private $sandbox;
		
		private $sandboxData = Array(
			
			'credentials' => array(
				"email" => "tiagocdc2008@gmail.com",
				"token" => "5EE76A162E704510AD0E8AC2E2A29796"
			),
			
			'sessionURL' => "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions",
			'transactionsURL' => "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions",
			'javascriptURL' => "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"
		);
		
		private $productionData = Array(
			
			'credentials' => array(
				"email" => "Your e-mail",
				"token" => "Your token"
			),
			
			'sessionURL' => "https://ws.pagseguro.uol.com.br/v2/sessions",
			'transactionsURL' => "https://ws.pagseguro.uol.com.br/v2/transactions",
			'javascriptURL' => "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"
			
		);
		
		public function __construct($sandbox = false) {
			$this->sandbox = (bool)$sandbox;
		}
		
		private function getEnviromentData($key) {
			if ($this->sandbox) {
				return $this->sandboxData[$key];
			} else {
				return $this->productionData[$key];
			}
		}
		
		public function getSessionURL() {
			return $this->getEnviromentData('sessionURL');
		}
		
		public function getTransactionsURL() {
			return $this->getEnviromentData('transactionsURL');
		}
		
		public function getJavascriptURL() {
			return $this->getEnviromentData('javascriptURL');
		}
		
		public function getCredentials() {
			return $this->getEnviromentData('credentials');
		}
		
		public function isSandbox() {
			return (bool)$this->sandbox;
		}
		
	}
	
	class Checkout {
		
		private $pagSeguroData;
		
		
		public function __construct($sandbox = true) {
			$this->pagSeguroData = new PagSeguroData($sandbox);
		}
		
		
		
		
		public function printSessionId() {
			
			// Creating a http connection (CURL abstraction)
			$httpConnection = new HttpConnection();
			
			// Request to PagSeguro Session API using Credentials
			$httpConnection->post($this->pagSeguroData->getSessionURL(), $this->pagSeguroData->getCredentials());
			
			// Request OK getting the result
			if ($httpConnection->getStatus() === 200) {
				
				$data = $httpConnection->getResponse();
				
				$sessionId = $this->parseSessionIdFromXml($data);
				
				echo $sessionId;
				
			} else {
				
				throw new Exception("API Request Error: ".$httpConnection->getStatus());
				
			}
			
		}
		
		public function getSessionId() {
			
			// Creating a http connection (CURL abstraction)
			$httpConnection = new HttpConnection();
			
			// Request to PagSeguro Session API using Credentials
			$httpConnection->post($this->pagSeguroData->getSessionURL(), $this->pagSeguroData->getCredentials());
			
			// Request OK getting the result
			if ($httpConnection->getStatus() === 200) {
				
				$data = $httpConnection->getResponse();
				
				$sessionId = $this->parseSessionIdFromXml($data);
				
				return $sessionId;
				
			} else {
				
				throw new Exception("API Request Error: ".$httpConnection->getStatus());
				
			}
			
		}		
		
		public function doPayment($params) {
			
			// Adding parameters
			
			$params += $this->pagSeguroData->getCredentials(); // add credentials
			$params['paymentMode'] = 'default'; // paymentMode
			$params['currency'] = 'BRL'; // Currency (only BRL)
			$params['reference'] = rand(0, 9999); // Setting the Application Order to Reference on PagSeguro
			
			// treat parameters here!
			$httpConnection = new HttpConnection();
			$httpConnection->post($this->pagSeguroData->getTransactionsURL(), $params);
			
			// Get Xml From response body
			$xmlArray = $this->paymentResultXml($httpConnection->getResponse());

			// Setting http status and show json as result
			//http_response_code($httpConnection->getStatus());
			header("HTTP/1.1 ".$httpConnection->getStatus());
			
			echo json_encode($xmlArray);
			
		}
		
		private function parseSessionIdFromXml($data) {
			
			// Creating an xml parser 
			$xmlParser = new XmlParser($data);
			
			// Verifying if is an XML
			if ($xml = $xmlParser->getResult("session")) {
				
				// Retrieving the id from "session node"
				return $xml['id'];
				
			} else {
				throw new Exception("[$data] is not an XML");
			}
			
		}
		
		
		private function paymentResultXml($data) {
			
			// Creating an xml parser 
			$xmlParser = new XmlParser($data);
			
			// Verifying if is an XML
			if ($xml = $xmlParser->getResult()) {
				return $xml;
			} else {
				throw new Exception("[$data] is not an XML");
			}
			
		}
		
		
		
	}
	