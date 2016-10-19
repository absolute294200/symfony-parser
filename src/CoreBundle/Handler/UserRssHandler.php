<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Rss;
use CoreBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;;
use CoreBundle\Entity\UserRss;


class UserRssHandler
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


    public function createUserRss(User $user = null, Rss $rss = null) :Rss
    {

        $objectManager = $this->doctrine->getManager();

        $user_rss = new UserRss();

        $user_rss->setUser($user)->setRss($rss);

        $objectManager->persist($user_rss);

        $objectManager->flush();

        return $rss;

    }

}