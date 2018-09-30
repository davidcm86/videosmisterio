<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * FuncionesGenerales component
 */
class FuncionesGeneralesComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function guardarImagen($tmpName, $nombreImagen, $ruta, $idBlog) {
        // si editamos miramos si hay imagen y borramos para meter la nueva
        if (!empty($idBlog)) {
            $this->Blog = TableRegistry::get('Blog');
            $blog = $this->Blog->get($idBlog, [
                'contain' => []
            ]);
            if (!empty($blog->imagen) && file_exists(WWW_ROOT . $blog->imagen)) {
                unlink(WWW_ROOT . $blog->imagen);
            }
        }
        $extension = $this->__tipoImagen($tmpName);
        $rutaCarpeta =  WWW_ROOT . $ruta;
        $rutaDestino = $rutaCarpeta . DS . strtotime('now') . $extension;
        if (!file_exists($rutaCarpeta)) {
            mkdir($rutaCarpeta, 0755);
        }
        if (copy($tmpName, $rutaDestino)) {
            return DS . $ruta . DS . strtotime('now') . $extension;
        }
    }

    // obtenemos el formato de la imagen
    private function __tipoImagen($tmpName) {
        switch (exif_imagetype($tmpName)) {
            case '1':
                return '.gif';
                break;
            case '2':
                return '.jpg';
                break;
            case '3':
                return '.png';
                break;
            case '17':
                return '.ico';
                break;
            default:
                return '.png';
        }
    }
}
