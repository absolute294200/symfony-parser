<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\FOSRestBundle;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\User;
use CoreBundle\Form\UserType;
use FOS\RestBundle\Controller\Annotations;


class RestUserController extends FOSRestController
{

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Users",
     *  description="This is a description of your API method",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     */

    public function getUserAction(Request $request){

        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->submit($request->request->all());

        $serializer = $this->get('serializer');

        $form_data = $serializer->serialize($form, 'json');

        $view = $this->view($form_data, 200);

        return $this->handleView($view);


    }

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Users",
     *  description="Registration of user",
     *  input={
     *    "class" = "CoreBundle\Form\UserType",
     *    "name" = ""
     *  },
     * )
     * @Annotations\Post("/login")
     */

    public function postLoginAction(Request $request)
    {

        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->submit($request->request->all());

        if($form->isSubmitted()){

            $token = $this->get('core.handler.user')
                           ->getUserToken($form['email']->getData(),
                                          $form['password']->getData());

            return array('token' => $token);

        }

    }

    /**
     * This is the documentation description of your method, it will appear
     * on a specific pane. It will read all the text until the first
     * annotation.
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Users",
     *  description="Registration of user",
     *  input={
     *    "class" = "CoreBundle\Form\UserType",
     *    "name" = ""
     *  },
     * )
     * @Annotations\Post("/register")
     */

    public function postRegisterAction(Request $request)
    {

        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->submit($request->request->all());

        if($form->isSubmitted()){

            $user = $form->getData();

            $user = $this->get('core.handler.user')->createUser($user);

            return array('token' => $user);

        }

    }

}
