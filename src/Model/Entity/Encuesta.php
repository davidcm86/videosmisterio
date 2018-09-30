<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Encuesta Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $pregunta_principal
 * @property string $pregunta_radio_0
 * @property string $pregunta_radio_1
 * @property string $pregunta_radio_2
 * @property string $pregunta_radio_3
 * @property string $resultado_radio_0
 * @property string $resultado_radio_1
 * @property string $resultado_radio_2
 * @property string $resultado_radio_3
 * @property bool $activo
 * @property string $categoria_id
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Categoria $categoria
 */
class Encuesta extends Entity
{
    /*public $virtualFields = array(
      'suma_votos' => 'Encuesta.resultado_radio_0',
    );*/
    protected $_virtual = ['suma_votos'];
    protected function _getSumaVotos()
    {
        return $this->resultado_radio_0 + $this->resultado_radio_1 + $this->resultado_radio_2 + $this->resultado_radio_3;
    }
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
