<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\FOSRestBundle;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Rss;
use CoreBundle\Form\RssType;
use FOS\RestBundle\Controller\Annotations;


class RestRssController extends FOSRestController
{

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="RSS",
     *  description="Registration of user",
     * )
     * @Annotations\Get("/rss")
     */

    public function getRssAction(Request $request)
    {

        $rss = new Rss();

        $form = $this->createForm(RssType::class, $rss);

        $form->submit($request->request->all());

        $token = $request->headers->get('X-AUTH-TOKEN');

        $id_user = $this->get('core.handler.user')
                        ->getIdByToken($token);

        $user = $this->get('core.handler.user')
            ->getUserByToken($token);

        if($id_user){

            $result = $this->get('core.handler.rss')->getRssByIdUser($id_user);

            return array('result' => $result);

        }else{

            return array('auth' => false);

        }

    }

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="RSS",
     *  description="Registration of user",
     *  input={
     *    "class" = "CoreBundle\Form\RssType",
     *    "name" = ""
     *  },
     * )
     * @Annotations\Post("/rss")
     */

    public function postRssAction(Request $request)
    {

        $rss = new Rss();

        $form = $this->createForm(RssType::class, $rss);

        $form->submit($request->request->all());

        $token = $request->headers->get('X-AUTH-TOKEN');

        $user = $this->get('core.handler.user')
            ->getUserByToken($token);

        if($user){

            $result_rss = $this->get('core.handler.rss')->checkUniqueUrl($form->getData()); //check please $result_rss

            $this->get('core.handler.user_rss')->createUserRss($user, $result_rss); //check please returned value

            return array('user_rss' => 1);

        }else{

            return array('auth' => false);

        }

    }

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="RSS",
     *  description="Registration of user",
     *  requirements={
     *      {
     *          "name"="limit",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="Id of needle for deleting rss"
     *      }
     *  },
     *  parameters={
     *      {"name"="id_rss", "dataType"="integer", "required"=true, "description"="Id of rss"}
     *  }
     * )
     * @Annotations\Post("/rss/delete")
     */

    public function postRssDeleteAction(Request $request)
    {

        $id_rss = $request->request->get('id_rss');

        $token = $request->headers->get('X-AUTH-TOKEN');

        $user = $this->get('core.handler.user')
            ->getUserByToken($token);

        if($user){

            $this->get('core.handler.rss')->deleteRSS($id_rss);

            return array('delete' => 1);

        }else{

            return array('auth' => false);

        }

    }

}