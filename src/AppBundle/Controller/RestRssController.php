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

            //var_dump(1);

            $result_rss = $this->get('core.handler.rss')->checkUniqueUrl($form->getData());

            //var_dump($result_rss);

            $result = $this->get('core.handler.user_rss')->createUserRss($user, $form->getData());

            return array('user_rss' =>1);

        }else{

            return array('auth' => false);

        }

    }

}