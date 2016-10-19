<?php

namespace AppBundle\Controller;

use FeedIo\FeedIo;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\FOSRestBundle;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Feed;
use CoreBundle\Form\FeedType;
use FOS\RestBundle\Controller\Annotations;


class RestFeedController extends FOSRestController
{

    /**
     * @ApiDoc(
     *  section="Feeds",
     *  description="Feeds description",
     *  requirements={
     *      {
     *          "name"="limit",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="Id of needle rss"
     *      }
     *  },
     *  parameters={
     *      {"name"="id_rss", "dataType"="integer", "required"=true, "description"="Id of rss"}
     *  }
     * )
     */

    public function getFeedAction(Request $request)
    {

        $token = $request->headers->get('X-AUTH-TOKEN');

        try{

            $user = $this->get('core.handler.user')
                ->getUserByToken($token);

            $id_rss = $request->query->get('id_rss');

            return $this->get('core.handler.feed')->getFeeds($id_rss, $user);

        }catch (\Exception $throwed_error){

            return new JsonResponse($throwed_error->getMessage(), $throwed_error->getCode());

        }




    }

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Feeds",
     *  description="Updating feeds",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     */

    public function putUpdateFeedsAction()
    {
            $updated_feeds = $this->get('core.handler.feed')->updateFeeds();

            return array('updated_feeds' => $updated_feeds);

    }

}