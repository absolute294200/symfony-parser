<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_restuser_postlogin' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestUserController::postLoginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_restuser_postregister' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestUserController::postRegisterAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nelmio_api_doc_index' => array (  0 =>   array (    0 => 'view',  ),  1 =>   array (    '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',    'view' => 'default',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'view',    ),    1 =>     array (      0 => 'text',      1 => '/api/doc',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_users_get_user' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestUserController::getUserAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_users_post_login' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestUserController::postLoginAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_users_post_register' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestUserController::postRegisterAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/register',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_rss_get_rss' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestRssController::getRssAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/rss',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_rss_post_rss' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestRssController::postRssAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/rsses',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_rss_delete_rss' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestRssController::deleteRssAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/rss',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_feed_get_feed' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestFeedController::getFeedAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/feed',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_feed_put_update_feeds' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\RestFeedController::putUpdateFeedsAction',    '_format' => NULL,  ),  2 =>   array (    '_format' => 'json|html',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'json|html',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/api/update/feeds',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'feed_stream' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',    'id' => 'null',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/stream',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'feed_atom' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',    'format' => 'atom',    'id' => 'null',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/atom',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'feed_rss' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',    'format' => 'rss',    'id' => 'null',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/rss',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'mock_feed_rss' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',    'format' => 'rss',    'source' => 'debril.provider.mock',    'id' => 'null',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/mock/rss',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
