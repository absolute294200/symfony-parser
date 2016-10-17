<?php

namespace CoreBundle\Handler;

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

    public function checkUniqueUrl(Rss $rss) : Rss
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

    public function getAllRss(){

        $repository = $this->doctrine->getRepository('CoreBundle:Rss');

        $rss_array = $repository->findAll();

        $channels_array = array();

        foreach ($rss_array as $channel){

            $channels_array[] = array('id' => $channel->getId(),
                                      'url' => $channel->getUrl());

        }

        return $channels_array;

    }

    public function getRssByIdUser($id_user)
    {

        return $this->doctrine->getEntityManager()
                              ->createQueryBuilder()
                              ->select('rss.id', 'rss.url', 'rss.name')
                              ->from('CoreBundle:Rss', 'rss')
                              ->innerJoin('CoreBundle:UserRss', 'user_rss', 'WITH', 'rss.id = user_rss.idRss')
                              ->where('user_rss.idUser = :id_user')
                              ->setParameter('id_user', $id_user)
                              ->getQuery()
                              ->getResult();

    }

}