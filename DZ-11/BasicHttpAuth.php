<?php
class BasicHttpAuth
{
    private $fPath;
    private $accounts = [];

    public function __construct($file)
    {
        $this->fPath = $file;
        $this->loadAccounts();     
    }

    public function reg($email, $hash)
    {
        if(!$this->accountExists($email)) {
            return $this->accounts[$email] = $hash;
        }
        return false;
    }
    public function log($email, $pass)
    {
        $dataPass=json_decode(
            file_get_contents(
                $this->fPath
            ),
            true
        );
        if(!$this->accountExists($email)) {
          if(password_verify($pass, $dataPass[$email])){
            echo "<style>body{background-color: rgb(89, 248, 124);}</style>";
            echo "<h1 style=\"text-align: center; margin-top:200px;\">Ви увійшли</h1>";
          }
        }
        return false;
    }
    public function accountExists($email)
    {
        if (is_array($this->accounts) && count($this->accounts) > 0) {
             if(array_key_exists($email, $this->accounts) === $email){
                return array_key_exists($email, $this->accounts);
             }
             return false;
        }
        return false;
    }
    private function loadAccounts()
    {
        $this->accounts = json_decode(
            file_get_contents(
                $this->fPath
            ), JSON_OBJECT_AS_ARRAY
        );
    }

    private function saveAccounts()
    {
        return file_put_contents(
            $this->fPath, json_encode(
                $this->accounts
            )
        );
    }
    function __destruct()
    {
        $this->saveAccounts();
        
    }
}