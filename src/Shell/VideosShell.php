<?php
namespace App\Shell;

use Cake\Console\Shell;

class VideosShell extends Shell
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Videos');
    }
    // guardamos todas las imágenes de los videos por años para tenerlas disponibles en nuestro sistema de ficheros
    public function guardarImagenesVideos()
    {
        $videos = $this->Videos->find('all')->toArray();
        foreach ($videos as $video) {
            $year = date('Y', strtotime($video->created));
            if (!file_exists(WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year)) {
                mkdir(WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year, 0777);
            }
            $image = "http://img.youtube.com/vi/" . $video->enlace . "/0.jpg";
            copy($image, WWW_ROOT . 'img' . DS . 'thumbnails' . DS . $year . DS .$video->id . '.jpg');
        }
    }

    public function amazonAfiliados() {
        $iframes = $this->iframesAmazon();
        $videos = $this->Videos->find('all')->toArray();
        $contIframes = 0;
        foreach ($videos as $key => $video) {
            if (empty($video->libro_afiliado_1) || $video->libro_afiliado_1 = null) {
                $data = array();
                $data = array('Videos.libro_afiliado_1' => $iframes[$contIframes]);
                $videoGet = $this->Videos->get($video->id); // Return article with id 12
                $videoGet->libro_afiliado_1 = $iframes[$contIframes];
                $videoGet = $this->Videos->patchEntity($videoGet, $data);
                if(!$this->Videos->save($videoGet)) {
                    $this->out($this->Videos->errors());
                }
                $contIframes++;
            }
            if ($contIframes == 9) {
                $contIframes = 0;
                $iframes = array();
                $iframes = $this->iframesAmazon();
            }
            if (empty($video->libro_afiliado_2) || $video->libro_afiliado_1 = null) {
                $data = array();
                $data = array('Videos.libro_afiliado_2' => $iframes[$contIframes]);
                $videoGet = $this->Videos->get($video->id); // Return article with id 12
                $videoGet->libro_afiliado_2 = $iframes[$contIframes];
                $videoGet = $this->Videos->patchEntity($videoGet, $data);
                $this->Videos->save($videoGet);
                $contIframes++;
            }
            if ($contIframes == 9) {
                $contIframes = 0;
                $iframes = array();
                $iframes = $this->iframesAmazon();
            }
        }
    }

    private function iframesAmazon() {
        $iframes = array(
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441433569&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441435421&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441433518&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441417792&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441418772&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441417725&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441435804&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441412804&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=B009ZDE7IE&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr',
            'https://rcm-eu.amazon-adsystem.com/e/cm?t=indiscretoes-21&o=30&p=8&l=as1&asins=8441414076&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=0000FF&bc1=FFFFFF&bg1=FFFFFF&f=ifr'
        );
        return $iframes;
    }

    // limpiamos la cache de facebook de los videos para que coja de nuevo las imágenes y texto
    public function limpiarCacheFacebook()
    {
        $videos = $this->Videos->find('all', [
                'conditions' => ['Videos.publicado' => 1],
                'fields' => ['Videos.slug_titulo'],
            ]
        )->toArray();
        $ch = curl_init("https://graph.facebook.com/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //enviamos el array data
        foreach ($videos as $video) {
            $data = array("id" => "http://www.videosmisterio.com/videos/misterio/$video->slug_titulo","scrape" => true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            //obtenemos la respuesta
            curl_exec($ch);
            sleep(1);
        }
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
    }

}