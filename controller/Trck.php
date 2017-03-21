<?php

class Trck extends Controller
{
    public $name = 'cards';

    public function index($e)
    {
      echo '
///////////////////////////////////////////////////////////////////////////////|
//                                           __________  __   __   __    __   ||
//  Cards.php                              / _________/ | |  / /  /  |  /  |  ||
//                                        / /_______    | | / /  /   | /   |  ||
//                                        \______   \   | |/ /  / /| |/ /| |  ||
//  Created: 2015/10/29 12:30:05         ________/  /   |   /  / / |   / | |  ||
//  Updated: 2015/10/29 21:45:22        /__________/    /  /  /_/  |__/  |_|  ||
//                                      ScrapYoMama    /__/    by barney.im   ||
//____________________________________________________________________________||
//-----------------------------------------------------------------------------*
    ';
    }

    public function link($e)
    {
      $this->sym(['Trck','link',$e]);
      $mailinfo = json_decode(file_get_contents(dirname(dirname(__FILE__)).'/info.json'),'true');
      header('location: '.$mailinfo['link']);
      die();

    }

    public function img($e)
    {
      $this->sym(['Trck','img',$e]);
      $mailinfo = json_decode(file_get_contents(dirname(dirname(__FILE__)).'/info.json'),'true');
      header('location: '.$mailinfo['link']);
      die();
    }

    public function imgSrc($e)
    {

    }

    public function kit($e)
    {
        echo file_get_contents(dirname(dirname(__FILE__)).'/kit.html');
    }

    public function info($e)
    {
      print_r(json_decode(file_get_contents(dirname(dirname(__FILE__)).'/info.json'),'true'));
    }

    public function infoDB($e)
    {
      //infodb
    }

    public function unsuscribe($e)
    {
      // replace
      echo file_get_contents(dirname(dirname(__FILE__)).'template/unsuscribe.html');
    }

    public function unsuscribeOk($e)
    {
      //sauvdb
      echo file_get_contents(dirname(dirname(__FILE__)).'template/unsuscribeOk.html');
    }

    private function sym($e)
    {
      $url = 'https://scrapyomama.herokuapp.com/'.$e[0].'/'.$e[1];
      foreach($e[3] as $k=>$v)
      {
        $url .= '/'.$v;
      }
      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      $res = curl_exec($curl);
      curl_close($curl);
      if (!$res)
          print_r("No curl result, proxy was probably locked or wrong.\n");
          print_r("--".$res."--");
      return ($res);
    }
}
