<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // app_restfeed_getupdatefeeds
        if ($pathinfo === '/feeds/update') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_app_restfeed_getupdatefeeds;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\RestFeedController::getUpdateFeedsAction',  '_route' => 'app_restfeed_getupdatefeeds',);
        }
        not_app_restfeed_getupdatefeeds:

        if (0 === strpos($pathinfo, '/rss')) {
            // app_restrss_getrss
            if ($pathinfo === '/rss') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_app_restrss_getrss;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\RestRssController::getRssAction',  '_route' => 'app_restrss_getrss',);
            }
            not_app_restrss_getrss:

            // app_restrss_postrss
            if ($pathinfo === '/rss') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_app_restrss_postrss;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\RestRssController::postRssAction',  '_route' => 'app_restrss_postrss',);
            }
            not_app_restrss_postrss:

        }

        // app_restuser_postlogin
        if ($pathinfo === '/login') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_app_restuser_postlogin;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\RestUserController::postLoginAction',  '_route' => 'app_restuser_postlogin',);
        }
        not_app_restuser_postlogin:

        // app_restuser_postregister
        if ($pathinfo === '/register') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_app_restuser_postregister;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\RestUserController::postRegisterAction',  '_route' => 'app_restuser_postregister',);
        }
        not_app_restuser_postregister:

        if (0 === strpos($pathinfo, '/api')) {
            // nelmio_api_doc_index
            if (0 === strpos($pathinfo, '/api/doc') && preg_match('#^/api/doc(?:/(?P<view>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_nelmio_api_doc_index;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
            }
            not_nelmio_api_doc_index:

            // api_users_get_user
            if (0 === strpos($pathinfo, '/api/user') && preg_match('#^/api/user(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_users_get_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_users_get_user')), array (  '_controller' => 'AppBundle\\Controller\\RestUserController::getUserAction',  '_format' => NULL,));
            }
            not_api_users_get_user:

            // api_users_post_login
            if (0 === strpos($pathinfo, '/api/login') && preg_match('#^/api/login(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_users_post_login;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_users_post_login')), array (  '_controller' => 'AppBundle\\Controller\\RestUserController::postLoginAction',  '_format' => NULL,));
            }
            not_api_users_post_login:

            if (0 === strpos($pathinfo, '/api/r')) {
                // api_users_post_register
                if (0 === strpos($pathinfo, '/api/register') && preg_match('#^/api/register(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_users_post_register;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_users_post_register')), array (  '_controller' => 'AppBundle\\Controller\\RestUserController::postRegisterAction',  '_format' => NULL,));
                }
                not_api_users_post_register:

                if (0 === strpos($pathinfo, '/api/rss')) {
                    // api_rss_get_rss
                    if (preg_match('#^/api/rss(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_rss_get_rss;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_rss_get_rss')), array (  '_controller' => 'AppBundle\\Controller\\RestRssController::getRssAction',  '_format' => NULL,));
                    }
                    not_api_rss_get_rss:

                    // api_rss_post_rss
                    if (preg_match('#^/api/rss(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_rss_post_rss;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_rss_post_rss')), array (  '_controller' => 'AppBundle\\Controller\\RestRssController::postRssAction',  '_format' => NULL,));
                    }
                    not_api_rss_post_rss:

                }

            }

            if (0 === strpos($pathinfo, '/api/feed')) {
                // api_feed_get_feed
                if (preg_match('#^/api/feed(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_feed_get_feed;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_feed_get_feed')), array (  '_controller' => 'AppBundle\\Controller\\RestFeedController::getFeedAction',  '_format' => NULL,));
                }
                not_api_feed_get_feed:

                // api_feed_get_update_feeds
                if (0 === strpos($pathinfo, '/api/feeds/update') && preg_match('#^/api/feeds/update(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_feed_get_update_feeds;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_feed_get_update_feeds')), array (  '_controller' => 'AppBundle\\Controller\\RestFeedController::getUpdateFeedsAction',  '_format' => NULL,));
                }
                not_api_feed_get_update_feeds:

            }

        }

        // feed_stream
        if (0 === strpos($pathinfo, '/stream') && preg_match('#^/stream(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'feed_stream')), array (  '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',  'id' => 'null',));
        }

        // feed_atom
        if (0 === strpos($pathinfo, '/atom') && preg_match('#^/atom(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'feed_atom')), array (  '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',  'format' => 'atom',  'id' => 'null',));
        }

        // feed_rss
        if (0 === strpos($pathinfo, '/rss') && preg_match('#^/rss(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'feed_rss')), array (  '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',  'format' => 'rss',  'id' => 'null',));
        }

        // mock_feed_rss
        if (0 === strpos($pathinfo, '/mock/rss') && preg_match('#^/mock/rss(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'mock_feed_rss')), array (  '_controller' => 'Debril\\RssAtomBundle\\Controller\\StreamController::indexAction',  'format' => 'rss',  'source' => 'debril.provider.mock',  'id' => 'null',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
