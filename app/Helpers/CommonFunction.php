<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Route;

class CommonFunction extends Auth
{
    static function getClientIP()
    {
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    static function rand_string($length)
    {
        $str ='';
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }
        return $str;
    }

    static function uploadImageBase64($data,$path){
        list($mime, $dataImage) = explode(';', $data);
        $mime = str_replace("data:","",$mime);
        $mime = str_replace("image/","",$mime);
        $image = preg_replace('#^data:image/\w+;base64,#i', '', $data);
        $fileName = self::rand_string(5).time().'_img_.'.$mime;
        file_put_contents(public_path($path)."/".$fileName, base64_decode($image));
        return $fileName;
    }
    /**
     * @param $str
     * @return mixed|string
     */

    public static function CreateKeyFromNameHtml($str)
    {
        $str = ltrim($str);
        $str = rtrim($str);
        $str = self::htmlToUtf8($str);
        $str = str_replace(" - ", "-", $str);
        $str = str_replace(",", "-", $str);
        $str = str_replace(";", "-", $str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "y", $str);
        $str = preg_replace("/(đ|Đ)/", "d", $str);
        $str = str_replace(" ", "-", $str);
        $str = strtolower($str);
        return $str;
    }

    public static function htmlToUtf8($string){
        //http://www.petefreitag.com/cheatsheets/ascii-codes/
        $arrReplace = [
            "128" => "€",
            "129" => "",//&#129;
            "130" => "‚",//&#130;
            "131" => "ƒ",//&#131;
            "132" => "„",//&#132;
            "133" => "…",//&#133;
            "134" => "†",//&#134;
            "135" => "‡",//&#135;
            "136" => "ˆ",//&#136;
            "137" => "‰",//&#137;
            "138" => "Š",//&#138;
            "139" => "‹",//&#139;
            "140" => "Œ",//&#140;
            "141" => "",//&#141;
            "142" => "Ž",//&#142;
            "143" => "",//&#143;
            "144" => "",//&#144;
            "145" => "‘",//&#145;
            "146" => "’",//&#146;
            "147" => "“",//&#147;
            "148" => "”",//&#148;
            "149" => "•",//&#149;
            "150" => "–",//&#150;
            "151" => "—",//&#151;
            "152" => "˜",//&#152;
            "153" => "™",//&#153;
            "154" => "š",//&#154;
            "155" => "›",//&#155;
            "156" => "œ",//&#156;
            "157" => "",//&#157;
            "158" => "ž",//&#158;
            "159" => "Ÿ",//&#159;
            "160" => " ",//&#160;
            "161" => "¡",//&#161;
            "162" => "¢",//&#162;
            "163" => "£",//&#163;
            "164" => "¤",//&#164;
            "165" => "¥",//&#165;
            "166" => "¦",//&#166;
            "167" => "§",//&#167;
            "168" => "¨",//&#168;
            "169" => "©",//&#169;
            "170" => "ª",//&#170;
            "171" => "«",//&#171;
            "172" => "¬",//&#172;
            "173" => "­",//&#173;
            "174" => "®",//&#174;
            "175" => "¯",//&#175;
            "176" => "°",//&#176;
            "177" => "±",//&#177;
            "178" => "²",//&#178;
            "179" => "³",//&#179;
            "180" => "´",//&#180;
            "181" => "µ",//&#181;
            "182" => "¶",//&#182;
            "183" => "·",//&#183;
            "184" => "¸",//&#184;
            "185" => "¹",//&#185;
            "186" => "º",//&#186;
            "187" => "»",//&#187;
            "188" => "¼",//&#188;
            "189" => "½",//&#189;
            "190" => "¾",//&#190;
            "191" => "¿",//&#191;
            "192" => "À",//&#192;
            "193" => "Á",//&#193;
            "194" => "Â",//&#194;
            "195" => "Ã",//&#195;
            "196" => "Ä",//&#196;
            "197" => "Å",//&#197;
            "198" => "Æ",//&#198;
            "199" => "Ç",//&#199;
            "200" => "È",//&#200;
            "201" => "É",//&#201;
            "202" => "Ê",//&#202;
            "203" => "Ë",//&#203;
            "204" => "Ì",//&#204;
            "205" => "Í",//&#205;
            "206" => "Î",//&#206;
            "207" => "Ï",//&#207;
            "208" => "Ð",//&#208;
            "209" => "Ñ",//&#209;
            "210" => "Ò",//&#210;
            "211" => "Ó",//&#211;
            "212" => "Ô",//&#212;
            "213" => "Õ",//&#213;
            "214" => "Ö",//&#214;
            "215" => "×",//&#215;
            "216" => "Ø",//&#216;
            "217" => "Ù",//&#217;
            "218" => "Ú",//&#218;
            "219" => "Û",//&#219;
            "220" => "Ü",//&#220;
            "221" => "Ý",//&#221;
            "222" => "Þ",//&#222;
            "223" => "ß",//&#223;
            "224" => "à",//&#224;
            "225" => "á",//&#225;
            "226" => "â",//&#226;
            "227" => "ã",//&#227;
            "228" => "ä",//&#228;
            "229" => "å",//&#229;
            "230" => "æ",//&#230;
            "231" => "ç",//&#231;
            "232" => "è",//&#232;
            "233" => "é",//&#233;
            "234" => "ê",//&#234;
            "235" => "ë",//&#235;
            "236" => "ì",//&#236;
            "237" => "í",//&#237;
            "238" => "î",//&#238;
            "239" => "ï",//&#239;
            "240" => "ð",//&#240;
            "241" => "ñ",//&#241;
            "242" => "ò",//&#242;
            "243" => "ó",//&#243;
            "244" => "ô",//&#244;
            "245" => "õ",//&#245;
            "246" => "ö",//&#246;
            "247" => "÷",//&#247;
            "248" => "ø",//&#248;
            "249" => "ù",//&#249;
            "250" => "ú",//&#250;
            "251" => "û",//&#251;
            "252" => "ü",//&#252;
            "253" => "ý",//&#253;
        ];
        foreach ($arrReplace as $key=>$value){
            $string = str_replace("&#".$key.";",$value,$string);
        }
        $string = str_replace("www.cooky.vn","monngontulam.com",$string);
        $string = str_replace("cooky.vn","monngontulam.com",$string);
        $string = str_replace("cooky","monngontulam",$string);
        return rtrim(ltrim($string));
    }

    public static function sendUserInfoUpdateOnePay($data){
        try{
            $url = env('STNHD_API_URL').'/UserInfo/ResponeOnepay?';
            foreach($data as $key => $value){
                $url .= $key.'='.$value.'&';
            }
            $url = rtrim($url, '&');
    
            $client = new Client();
            $request = new GuzzleRequest('GET', $url);

            $promise = $client->sendAsync($request)->then(function ($response) {
            });
            $promise->wait();
        }
        catch(\Exception $e){

        }
    }

    public static function getProvince(){
        $provinceFromTTL = file_get_contents(config('params.provinceApiTTL'));
        $provinceData = [];
        if($provinceFromTTL){
            $tmp = json_decode($provinceFromTTL);
            if(gettype($tmp) == 'object'){
                if($tmp->retCode === 0){
                    foreach($tmp->data as $data){
                        $provinceData[$data->id] = $data->name;
                    }
                }
            }
        }
        return $provinceData;
    }

    public static function getDistrict($province){
        $districtFromTTL = file_get_contents(config('params.districtApiTTL').$province);
        $districtData = [];
        if($districtFromTTL){
            $tmp = json_decode($districtFromTTL);
            if(gettype($tmp) == 'object'){
                if($tmp->retCode === 0){
                    foreach($tmp->data as $data){
                        $districtData[$data->id] = $data->name;
                    }
                }
            }
        }
        return $districtData;
    }

    public static function sendMailByTemplate($templateName, $orderData){
        $emailTemplateResource = MConfig::where('key', $templateName)->first();

        if($emailTemplateResource){
            $emailTemplate = html_entity_decode($emailTemplateResource->content);

            $arrayReplace = ['gender', 'name', 'phone', 'type', 'active_code', 'email', 'address', 'district', 'province'];
            $provinceData = self::getProvince();
            $districtData = self::getDistrict($orderData['province_id']);

            foreach($arrayReplace as $item){
                if($item == 'gender'){
                    $gender = '';
                    if($orderData['gender'] == 0){
                        $gender = 'chị';
                    }
                    else {
                        $gender = 'anh';
                    }
                    $emailTemplate = str_replace('@[gender]', $gender, $emailTemplate);
                }
                else if($item == 'type'){
                    $type = '';
                    if($orderData['type'] == 'event'){
                        $type = 'sự kiện';
                    }
                    else{
                        $type = 'khóa học';
                    }
                    $emailTemplate = str_replace('@[type]', $type, $emailTemplate);
                }
                else if($item == 'active_code'){
                    $emailTemplate = str_replace('@[active_code]', mb_strtoupper($orderData['order_code']), $emailTemplate);
                }
                else if($item == 'district'){
                    $district = '';
                    if(isset($districtData[$orderData['district_id']])){
                        $district = $districtData[$orderData['district_id']];
                    }
                    $emailTemplate = str_replace('@[district]', $district, $emailTemplate);
                }
                else if($item == 'province'){
                    $province = '';
                    if(isset($provinceData[$orderData['province_id']])){
                        $province = $provinceData[$orderData['province_id']];
                    }
                    $emailTemplate = str_replace('@[province]', $province, $emailTemplate);
                }
                else{
                    $emailTemplate = str_replace('@['.$item.']', $orderData[$item], $emailTemplate);
                }
            }
        }
        else{
            $emailTemplate = '';
        }

        return $emailTemplate;
    }

    public static function setActiveMenu($current, $routeName = []){
        if(in_array($current, $routeName)){
            return 'active';
        }
        return '';
    }

    public static function createMenu($route, $icon = null, $trans, $routeName = [], $class="sidebar-nav-item"){
        if($icon){
            $icon = '<i class="'.$icon.'"></i> ';
        }
        return '
            <li class="'.$class.'">
                <a href="'.route($route).'" class="sidebar-nav-link 
                    '.self::setActiveMenu(Route::currentRouteName(), $routeName).'"
                >
                    '.$icon.trans($trans).'
                </a>
            </li>
        ';
    }
}
