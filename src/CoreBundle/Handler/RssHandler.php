<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use CoreBundle\Entity\UserRss;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use CoreBundle\Entity\Rss;


class RssHandler
{

    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */

    protected $doctrine;

    public function __construct(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getUniqueRSS(Rss $rss) : Rss
    {

        $repository = $this->doctrine->getRepository('CoreBundle:Rss');

        $rss_result = $repository->findOneBy(array(
            'url' => $rss->getUrl()
        ));

        if($rss_result)
            return $rss_result;
        else
            return $rss;

    }


    public function getUrlById($id_rss)
    {

        $repository = $this->doctrine->getRepository('CoreBundle:Rss');

        $rss = $repository->findBy(array(
            'id' => $id_rss
        ));

        if($rss)
            return $rss[0]->getUrl();
        else
            return false;

    }

    /**
     * @return RSS[]
     */
    public function getAllRss()
    {

        $repository = $this->doctrine->getRepository('CoreBundle:Rss');

        $rss_array = $repository->findAll();

        return $rss_array;

    }

    public function getRssByUser(User $user)
    {

        $userRss = $this->doctrine->getEntityManager()
                          ->getRepository('CoreBundle:UserRss')
                          ->findBy(['user' => $user]);
        if(!$userRss)
            throw new \Exception("Not found", 404);

        $rss = array();

        foreach ($userRss as $item){

            $rss[] = $item->getRss();

        }

        if(!$rss)
            throw new \Exception("", 204);


        return $rss;

    }

    /**
     * @param string $id_rss
     * @param User $user
     * @return int
     * @throws \Exception
     */
    public function deleteRSS($id_rss, User $user)
    {

        $object_manager = $this->doctrine->getEntityManager();

        $repository = $this->doctrine->getRepository('CoreBundle:Rss');

        $rss = $repository->findOneBy(array(
            'id' => $id_rss
        ));

        $rss_user = $this->doctrine->getRepository('CoreBundle:UserRss')->findOneBy([
            'rss' => $rss,
            'user' => $user
        ]);

        if(!$rss_user)
            throw new \Exception("Not found", 404);
        else{

            $object_manager->remove($rss);

            $object_manager->flush();

        }

        return 1;


    }

}