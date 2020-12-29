<?php

use Illuminate\Http\Request;
use App\Services\Options;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

function getOption($key, $default = null)
{
    $option = new Options();
    return $option->get($key, $default);
}

/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
function isActive($path)
{
    return Request::is($path) ? 'active' : '';
}

function niceSlug($string, $separator = '-')
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array('&' => 'and', "'" => '');
    $string = mb_strtolower(trim($string), 'UTF-8');
    $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
    $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}


function getChildCatForDropdown($id)
{
    $query = Category::where('parent', $id)->pluck('name', 'id');

    return ($query) ? $query : array();
}


function words($value, $words = 100, $end = '...')
{
    return \Illuminate\Support\Str::words($value, $words, $end);
}

function partitionArray($arr, $p = 3)
{
    //check array is an array
    if (is_array($arr)) :

        //count the given array
        $listlen = count($arr);

        //floor pertition
        $partlen = floor($listlen / $p);
        $partrem = $listlen % $p;
        $partition = array();
        $mark = 0;

        //loop through array
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition[$px] = array_slice($arr, $mark, $incr);
            $mark += $incr;
        }
        return $partition;

    else :
        return $arr;
    endif;
}


///for chat feature increase
function formatUrlsInText($text)
{
    // The Regular Expression filter
    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

    // Check if there is a url in the text
    if (preg_match($reg_exUrl, $text, $url)) {

        // make the urls hyper links
        return preg_replace($reg_exUrl, "<a href=" . $url[0] . " title=" . $url[0] . " target='_blank'>.$url[0].</a> ", $text);

    } else {

        return $text;
    }
}

function check_base64_image($data)
{

    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif

        if (in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
            return true;
        }

        $data = base64_decode($data);

        if ($data === false) {
            return false;
        }
    }
    return false;
}


function checkMessage($data)
{
    //youtube video
    if (strpos($data, 'youtube') > 0) {
        $data = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"200\" height=\"100\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $data);

    } elseif (strpos($data, 'youtu') > 0) {
        $data = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"200\" height=\"100\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $data);

    } //        //base64
    else if (check_base64_image($data)) {
        $data = '<a href="' . $data . '" target="_blank"><img src="' . $data . '" style="overflow:auto; height:100px;width:170px;"></a>';
    } //normal text
    else {
        $data = formatUrlsInText($data);
    }

    return html_entity_decode($data);
}


function escapePhpString($target)
{
    $replacements = array(
        "'" => '"',
        "\\" => '\\\\',
        "\r\n" => "\\r\\n",
        "\n" => "\\n"
    );
    return strtr($target, $replacements);
}

//return currency sign
function getCurrencySignByName($str)
{
    if ($str == 'euro') {
        return '€';
    } elseif ($str == 'afn') {
        return '؋';
    } else {
        return '$';
    }
}

//add http to url
function addhttp($url)
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}


function addMissingMonth($months, $array)
{

    if (is_array($array)) {
        $data = $array;
    } else {
        $data = $array->toArray();
    }

    $newArr = array_merge($months, $array);
    ksort($newArr);
    return $newArr;
}
