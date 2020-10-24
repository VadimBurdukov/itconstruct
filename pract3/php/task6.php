<?
class UserInfo
{
    public static string $url = "https://api.github.com/users/";

    public static function getInfo($login)
    {
        $requestUrl = self::$url.$login;

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
            $userInfo = json_decode($output, true);

            foreach ($userInfo as $name => &$value) 
            {
                switch(gettype($value))
                {
                    case 'integer':
                        $value = (int)$value;
                        break;
                    case 'float':
                        $value = (float)$value;
                        break;
                    case 'NULL':
                        unset($value);
                        break;
                    case 'bool':
                        $value = (bool)$value;
                        break;
                    case 'array':
                        $value = (array)$value;
                        break;
                    case 'string':
                        $value = htmlspecialchars($value);
                        if ($name == "email")
                        {
                            $checkValue = filter_var($value, FILTER_VALIDATE_EMAIL);
                            if ($checkValue)
                            {
                                $value = $checkValue;
                            }
                        }
                        break;
                    default:   
                        break;
                }             
            }
            unset($value);
                
            echo '<pre>';
                var_dump($userInfo); 
            echo '</pre>';
        }
    }
}
//task7
$getInfo = "getInfo";
UserInfo::$getInfo("vadimburdukov");
//task6
//UserInfo::getInfo("vadimburdukov");