<?php
/**
* Class ActiveDirectory
* @author Gabriel Heming <gabriel_heming@hotmail.com>
* 
*/ 
namespace App\AD;

class ActiveDirectory {

   private $ldap;//conexão básica do AD
   private $ldapBind;//conexão avançada do AD 
   private $serverAD = 'ldap://10.8.0.17';//IP do servidor LDAP
   
   private $userAD = 'administrador';//usuario para acesso geral do AD
   private $domain = '@ifto.local';
   private $passwordAD = 'Pmw_ifto_';//senha para acesso geral do AD
   private $dnAD = 'cn=administrador,cn=users,dc=ifto,dc=local';//Especifique o caminho CN (Common Name), OU(Organizational Unit), DC(Domain Component). Lembrando que é ao contrário LOL
   
   private $protocolVersion = 3;
   

   public function __construct() {
       $this->ldap = ldap_connect($this->serverAD) or die('não foi possível conectar'); 
       $this->ldapBind = false;
   }


   private function connect() {
       if($this->ldapBind === false) {        
           $this->ldapBind = $this->ldap;
           if ( !ldap_set_option($this->ldapBind, LDAP_OPT_PROTOCOL_VERSION, $this->protocolVersion ) ) {
               exit( 'Falha em definir protocolo na versao '.$this->protocolVersion );
           }
           ldap_set_option($this->ldapBind, LDAP_OPT_REFERRALS, 0 );
           ldap_bind($this->ldapBind);
           if ( ldap_errno($this->ldapBind) !== 0 ) {
               exit('Nao foi possivel conectar no servidor');
           }
           ldap_bind($this->ldapBind , $this->userAD.$this->domain , $this->passwordAD);
           
           if (ldap_errno($this->ldapBind) !== 0) {
               return false;
           }   
       }
       return true;
   }

   public function isUser($user) {        
       if($this->connect() === true) {
           $searchResults = ldap_search($this->ldapBind, $this->dnAD, '(|(samaccountname='.$user.'))');
           $a=ldap_get_entries($this->ldapBind , $searchResults);
           
           if (count(ldap_get_entries($this->ldapBind , $searchResults)) > 1) {
               return true; 
           } 
       }
       return false;
   }

   public function authUser($user , $password) {   
       if (strlen($password) > 0) {
           $bind = ldap_bind($this->ldap , $user.$this->domain , $password);   
           
           if ($bind) {
               return true;
           }
       }
       return false;
   }

   public function getUser($user) {   
     
       if($this->connect() === true) {
           $searchResults = ldap_search($this->ldapBind , 'cn=users,dc=ifto,dc=local' , '(|(sAMAccountName='.$user.'))'); 
           
            if (count(ldap_get_entries($this->ldapBind , $searchResults)) > 1) {
               $object = ldap_get_entries($this->ldapBind , $searchResults);
               $user = $object[0];
               return $user; 
           }
       }
       return false;
   }
}