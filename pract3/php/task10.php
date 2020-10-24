<?
session_start();
class User
{
    public static string $url = "https://api.github.com/users/";
    public string $login;
    public int $id;
    public string $htmlUrl;
    public string $followersUrl;
    public string $followingUrl;
    public string $gistsUrl;
    public string $reposUrl;

    public string $requestUrl;
    public  $userProps;

    public function __get($prop)
    {
        return (in_array($prop, $this->userProps)&&
                property_exists($this, $prop)) ? 
                $this->$prop : NULL;
    }

    public function __construct($login)
    {
        $this->login = $login;
        $this->requestUrl = $this->urlGenerate(self::$url, $this->login);
        $userInfo = $this->getInfo($this->requestUrl);
        $this->userProps = $userInfo;
        $this->setCookie();
        if ($userInfo)
        {
            $this->id = (int)$userInfo['id'];
            $this->htmlUrl = (string)$userInfo['html_url'];
            $this->followersUrl = (string)$userInfo['followers_url'];
            $this->followingUrl = (string)$userInfo['following_url'];
            $this->gistsUrl = (string)$userInfo['gists_url'];
            $this->reposUrl = (string)$userInfo['repos_url'];
        }     
    }
   
    public function urlGenerate($url, $login)
    {
        $requestUrl = $url.$login;
        return $requestUrl;
    }

    public function getInfo($requestUrl)
    {
        $result = $this->getCookie();
        if (!$result)
        {
            require("pwd.php");
       
            $cInit = curl_init();
            curl_setopt($cInit, CURLOPT_URL, $requestUrl);
            curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($cInit, CURLOPT_USERPWD, $user . ':' . $pwd);
            $output = curl_exec($cInit);
            $info = curl_getinfo($cInit, CURLINFO_HTTP_CODE);

            if ($info == 200)
            {
                echo"сделали запрос".'<br>';
                $result = json_decode($output, true);
            }
        }
        else 
        {
            echo"достали из сессии".'<br>';
        }
        return $result;
    }

    public function setCookie()
    {
        if ($this->userProps)
        {
            $date = date("d/m/Y H:m:s");
            if (setcookie($this->login, $date, time()+60))
            {   
                $_SESSION[$this->login] = $this->userProps;
            } 
        }
    }

    public function getCookie()
    {
        
        if (isset($_COOKIE[$this->login]) && $_COOKIE[$this->login])
        {
            return $_SESSION[$this->login];
        }
        else 
        {
            return 0;
        }
    }
}

$foo = new User("vadimburdukov");
echo $foo->id;