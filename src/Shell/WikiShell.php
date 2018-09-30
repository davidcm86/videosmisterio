<?php
namespace App\Shell;

/**
* PROBLEMAS: NO PUEDO COGER LOS COMMENTS NUMERO DE LA VANGUARDIA Y EL ESPAÑOL (DE LOS MÁS VISITADOS)
*/

/*
* pintar los comentarios noticias
*select * from top_noticias order by modified desc,num_comentarios desc limit 5;
*/

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Database\Expression\QueryExpression;
use Cake\Utility\Inflector;


require_once(ROOT . DS . 'vendor' . DS . "html-dom" . DS . "simple_html_dom.php");
use SimpleHtmlDom;

class WikiShell extends Shell {
	
    public function main() {
       $this->loadModel('Videos');
       $videos = $this->Videos->find('all', [
           'conditions' => ['created > ' => '2015-02-01'],
           'order' => ['created']
       ]);
       foreach ($videos as $video) {
			$this->log(strtolower(Inflector::slug($video->titulo,'+')));
            $textoWiki = $this->__getTextFromWikipedia(strtolower(Inflector::slug($video->titulo,'+')));
            $video = $this->Videos->get($video->id);
            $video->descripcion = $video->descripcion . ' ' . $textoWiki;
            if (!empty($textoWiki)) {
                $this->log($textoWiki);
                $this->Videos->save($video);
            }
            sleep('10');
       }
    }

    // cogeomos texto de la wiki pasandole el titulo del video
    private function __getTextFromWikipedia($tituloBuscar) {
        $texto = "";
        $url = "https://es.wikipedia.org/w/api.php?action=query&format=php&list=search&utf8=1&srsearch=" . $tituloBuscar;
        $result = $this->__curl($url);
        $result = unserialize($result);
        if (!empty($result['query']['search'][0]['pageid'])) {
            $pageId = $result['query']['search'][0]['pageid'];
            $urlWikiPage = "https://es.wikipedia.org/w/api.php?action=query&format=php&prop=info&pageids=".$pageId."&inprop=url";
            $result = $this->__curl($urlWikiPage);
            $result = unserialize($result);
            if (!empty($result['query']['pages'][$pageId]['fullurl'])) {
                $html = file_get_html($result['query']['pages'][$pageId]['fullurl']);
                if (!empty($html)) {
					$enlaces = array();
					// busco todos los enlaces y quito los que no me sirven
					foreach($html->find('#mw-content-text p') as $key => $element) {
						$texto .= '</br>' . strip_tags($element) . '</br>';
						if ($key == 2) break; 
					}
					if (!empty($texto)) {
						return $texto;
					}
				}
            }
        }
        return false;

    }

    private function __curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
?>
