<?php

class User {
    private $Login;
	private $Nom;
	private $SI_Prenom;
	private $SI_Nom;
    private $Prenom;
    private $Username;
    private $Promotion;
    private $isAdmin;

    public function __construct($mail) {
      $URL = "https://intra.epitech.eu/";
      $temp = $URL . "user/" . $mail . "/?format=json";
      $url_event = rtrim($temp, "/");

      $ch = curl_init();
      $opts_base = array( CURLOPT_URL => $URL.'login',
                          CURLOPT_SSL_VERIFYPEER => FALSE,
                          CURLOPT_VERBOSE=> FALSE,
                          CURLOPT_COOKIEJAR => "cookie.txt",
                          CURLOPT_COOKIEFILE => "cookie.txt",
                          CURLOPT_RETURNTRANSFER => TRUE,
                          CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Connection: Keep-Alive')
                          );
      curl_setopt_array($ch, $opts_base);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, '{"login":"prenom.nm@epitech.eu","password":"password_unix"}');
      $response = curl_exec($ch);
      curl_setopt($ch, CURLOPT_POSTFIELDS, FALSE);
      curl_setopt($ch, CURLOPT_POST, FALSE);
      curl_setopt($ch, CURLOPT_URL, $url_event);
      $response = json_decode(curl_exec($ch));

      $err = curl_error($ch);
      curl_close($ch);
      if ($err)
          echo "cURL Error #:" . $err;
      else {
		  if (array_key_exists("message", $response)) {
			  echo "ERREUR : ";
			  echo $response->message;
		  }
		  else {
			$this->getData($response);  
		  }
	}
    }

     private function getData($resultat) {
         $this->Login        = $resultat->login;
         $this->Nom          = $resultat->lastname;
	     $this->SI_Nom	     = strtolower($resultat->lastname);
     	 $this->SI_Prenom    = strtolower($resultat->firstname);
		 $this->Prenom       = $resultat->firstname;
         $this->isAdmin	     = $resultat->admin;
		 $this->Username     = $this->SI_Prenom . "." . $this->SI_Nom;
		 if (!isset($resultat->promo))
			 $this->Promotion = "None";
		 else
			 $this->Promotion    = $resultat->promo;
	 }

     public function getLogin() { return $this->Login; }

     public function getAdmin() { return $this->isAdmin; }

     public function getUsername() { return $this->Username; }

     public function getNom() { return $this->Nom; }

     public function getPrenom() { return $this->Prenom; }

     public function getPromotion() { return $this->Promotion; }

     public function getSI_Prenom() { return $this->SI_Prenom; }

     public function getSI_Nom() { return $this->SI_Nom; }
}
?>
