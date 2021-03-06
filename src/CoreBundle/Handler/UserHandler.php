<?php

namespace CoreBundle\Handler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use CoreBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserHandler
{

    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */

    protected $doctrine;

    /**
     * UserHandler constructor.
     * @param \Symfony\Bridge\Doctrine\RegistryInterface $doctrine
     */
    public function __construct(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }


    public function createUser(User $user)
    {

        $objectManager = $this->doctrine->getManager();

        $token = $this->createToken($user->getEmail());

        $user->setToken($token);

        $objectManager->persist($user);

        $objectManager->flush();

        return $user;

    }

    private function createToken($email)
    {

        $token = $email . "123";

        return $token;

    }

    public function getUserToken($email, $password)
    {

        $token = false;

        $repository = $this->doctrine->getRepository('CoreBundle:User');

        $user= $repository->findBy(array(
            'email' => $email,
            'password' => $password
        ));


        if($user)
            $token = $user[0]->getToken();

        return $token;

    }

    public function getIdByToken($token)
    {

        $id_user = false;

        $repository = $this->doctrine->getRepository('CoreBundle:User');

        $user = $repository->findBy(array(
            'token' => $token
        ));

        if($user)
            $id_user = $user[0]->getId();

        return $id_user;

    }

    public function getUserByToken($token): User
    {

        $repository = $this->doctrine->getRepository('CoreBundle:User');

        $user = $repository->findOneBy(array(
            'token' => $token
        ));

        if(!$user)
            throw new \Exception('Non authorized', Response::HTTP_UNAUTHORIZED);

        return $user;

    }

}