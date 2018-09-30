<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/amp', ['controller' => 'Pages', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'index']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
Router::connect('/amp/videos/misterio/:slug', array('controller' => 'videos', 'action' => 'misterio'));
Router::connect('/sitemap.xml', array('controller' => 'Videos', 'action' => 'sitemap', 'ext' => 'xml'));
Router::connect('/politicaDePrivacidad', array('controller' => 'Pages', 'action' => 'politica_de_privacidad'));
Router::connect('/documentales-de-misterio', array('controller' => 'Pages', 'action' => 'video'));
Router::connect('/mi-cuenta', array('controller' => 'Pages', 'action' => 'mi_cuenta'));
Router::connect('/top-usuarios', array('controller' => 'Pages', 'action' => 'top_usuarios'));
Router::connect('/', array('controller' => 'Pages', 'action' => 'index'));
Router::connect(
    '/categoria/index/:categoriaAlias',
    ['controller' => 'Pages', 'action' => 'index'],
    [ 'pass' => ['categoriaAlias']]
);
// redirigir rutas antiguas, para que google vea que no existen
Router::redirect(
    '/videos/ver/*', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);
Router::redirect(
    '/videos/topVideosMisterio', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);	
Router::redirect(
    '/pages/*', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);
Router::redirect(
    '/necesidad_videosmisterio', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);	
Router::redirect(
    '/usuarios/acceso_publico', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);
Router::redirect(
    '/que_es_videosmisterio', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);	
Router::redirect(
    '/videos/exportarVideos', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);	
Router::redirect(
    '/categorias/mostrar', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);	
Router::redirect(
    '/users/pages/que-es-videos-misterio', 
    array(
        'controller' => 'Pages', 
        'action' => 'index'
    ), 
    array('status' => 301)
);	
Router::extensions('xml');
