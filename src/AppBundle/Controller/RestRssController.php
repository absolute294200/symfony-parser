<?php

namespace AppBundle\Controller;

use CoreBundle\Entity\UserRss;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\FOSRestBundle;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Rss;
use CoreBundle\Form\RssType;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\HttpFoundation\Response;


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
     */

    public function getRssAction(Request $request)
    {

        $rss = new Rss();

        $form = $this->createForm(RssType::class, $rss);

        $form->submit($request->request->all());

        $token = $request->headers->get('X-AUTH-TOKEN');

        try{

            $user = $this->get('core.handler.user')
                ->getUserByToken($token);

            $result = $this->get('core.handler.rss')->getRssByUser($user);

            return array('result' => $result);

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
     *  section="RSS",
     *  description="Registration of user",
     *  input={
     *    "class" = "CoreBundle\Form\RssType",
     *    "name" = ""
     *  },
     * )
     */

    public function postRssAction(Request $request)
    {

        $rss = new Rss();

        $form = $this->createForm(RssType::class, $rss);

        $form->submit($request->request->all());

        $token = $request->headers->get('X-AUTH-TOKEN');

        try{

            $user = $this->get('core.handler.user')
                ->getUserByToken($token);

        }catch (\Exception $e){

            return new JsonResponse('Non authorized', 401);

        }

        $result_rss = $this->get('core.handler.rss')->getUniqueRSS($form->getData());

        $rss = $this->get('core.handler.user_rss')->createUserRss($user, $result_rss);

        return array('added_new_rss' => $rss->getName());

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
     */

    public function deleteRssAction(Request $request)
    {

        $id_rss = $request->request->get('id_rss');

        $token = $request->headers->get('X-AUTH-TOKEN');

        try{

            $user = $this->get('core.handler.user')
                ->getUserByToken($token);

            $this->get('core.handler.rss')->deleteRSS($id_rss, $user);

            return array('deleted' => 1);

        }catch (\Exception $throwed_error){

            return new JsonResponse($throwed_error->getMessage(), $throwed_error->getCode());

        }


    }

}