<?php

$url = 'https://jsonplaceholder.typicode.com/users';
$url = 'http://localhost/ahrefs/endpoint.php?k=annie&c=1';
$result = curlGet($url);

$response = new CurlResponse(
    $result['body'],
    $result['info'],
    $result['error']
);

header('content-type: application/json');
exit($response->getBody());

final class CurlResponse
{
    private $_body;
    private $_info;
    private $_error;

    public function __construct($body, $info, $error)
    {
        $this->_body = $body;
        $this->_info = $info;
        $this->_error = $error;
    }

    public function getBodyJson()
    {
        return json_decode($this->_body, true);
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function getError()
    {
        return $this->_error;
    }

    public function getHttpCode()
    {
        return $this->_info['http_code'];
    }
}

function curlGet($url)
{

    $domain = 'ducthuan.net';
    $referer = 'https://e-web.vn';
    $clientIP = '198.175.6.5';
    $useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36';

    # sử dụng cookie để request đối với 1 trang cần xác thực qua cookie
    # ví dụ: request tới 1 trang laravel yêu cầu logged
    $httpCookie = [
        '__nomean' => '7428',
        'laravel_session' => 'eyJpdiI6Ilc0ZkQvc2YxSlNVc3EyWU13TWdUU3c9',
    ];

    # khi truyển tham số header là `CLIENT-IP`, 
    # thì sẽ tự động chuyển thành `HTTP_CLIENT_IP` trên request
    $headerParams = [
        'access_token'      => 'Bearer jd3t2-qh36r',
        'Host'              => $domain,
        'X-FORWARDED-FOR'   => $clientIP,      // => HTTP_X_FORWARDED_FOR 
        'X-FORWARDED'       => $clientIP,      // => HTTP_X_FORWARDED
        'CLIENT-IP'         => $clientIP,      // => HTTP_CLIENT_IP        
    ];

    # map array thành value cho header
    $headers = array_map(
        fn ($key, $value) => sprintf('%s: %s', $key, $value),
        array_keys($headerParams),
        array_values($headerParams)
    );

    $cookieFile = dirname(__FILE__) . '/cookie.txt';
    if (!file_exists($cookieFile)) {
        fopen($cookieFile, 'w') or die('Can not create file');
    }
   
    # khởi tạo curl
    $curl = curl_init($url);

    # số giây chờ kết nối. 0 là vô thời hạn
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

    # curl với cookie, cách này chuẩn hơn so với ném cookie lên headers
    curl_setopt($curl, CURLOPT_COOKIE, http_build_query($httpCookie, '', ';'));

    # custom header cho request
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    # set useragent, trùng lặp vs set header, nhưng vẫn để 
    curl_setopt($curl, CURLOPT_USERAGENT, $useragent);

    # giả lập trang trước đó là google
    curl_setopt($curl, CURLOPT_REFERER, $referer);

    # trả về giá trị khi thực hiện curl_exec
    # mặc định, giá trị sau curl sẽ đc print ra
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    # disable verify ssl
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    # ghi cookie từ của CURL trả về vào file
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookieFile);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookieFile);

    $result = [
        'body' => curl_exec($curl),
        'info' => curl_getinfo($curl),
        'error' => curl_error($curl),
    ];

    curl_close($curl);

    return $result;
}
