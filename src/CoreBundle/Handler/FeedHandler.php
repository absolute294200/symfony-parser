<?php

namespace CoreBundle\Handler;

use FeedIo\FeedIo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use CoreBundle\Entity\Feed;


class FeedHandler
{

    /**
     * @var \Symfony\Bridge\Doctrine\RegistryInterface
     */

    protected $doctrine;

    /**
     * @var \FeedIo\FeedIo
     */

    private $feedIO;

    /**
     * @var RssHandler
     */

    private $rss;

    /**
     * FeedHandler constructor.
     * @param \Symfony\Bridge\Doctrine\RegistryInterface $doctrine
     * @param FeedIo $feedIO
     * @param RssHandler $rss
     */
    public function __construct(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine, FeedIo $feedIO, RssHandler $rss)
    {
        $this->doctrine = $doctrine;
        $this->feedIO = $feedIO;
        $this->rss = $rss;
    }


    /**
     * @param string $id_rss
     * @return array
     */
    public function getFeeds(string $id_rss)
    {

        $repository = $this->doctrine->getRepository('CoreBundle:Feed');

        $feed = $repository->findBy(array(
            'idChannel' => $id_rss
        ));

        return $feed;
    }

    /**
     * @return boolean
     */
    public function updateFeeds()
    {
        $rss_array = $this->rss->getAllRss();

        foreach ($rss_array as $channel){

            $modifiedSince = new \DateTime(date("Y-m-d H:i:s", strtotime("-1 day")));

            $feeds = $this->feedIO->readSince($channel['url'], $modifiedSince)->getFeed();

            foreach ($feeds as $feed) {

                $feed_array = array();

                if($this->checkUniqueFeed($feed->getLink())){

                    $feed_array = array(

                        'link' => $feed->getLink(),

                        'title' => $feed->getTitle(),

                        'description' =>$feed->getDescription()

                    );

                    $this->saveFeed($feed_array, $channel['id']);

                }


            }

        }

        return 1;
    }

    /**
     * @param array $urls
     * @return boolean
     */
    public function checkUniqueFeed($link)
    {

        $repository = $this->doctrine->getRepository('CoreBundle:Feed');

        $feed = $repository->findBy(array(
            'link' => $link
        ));

        if($feed)
            return 0;
        else
            return 1;

    }

    /**
     * @param array $feed_info
     * @param integer $channel_id
     * @return boolean
     */
    public function saveFeed($feed_info, $channel_id)
    {

        $objectManager = $this->doctrine->getManager();

        $feed = new Feed();

        $feed->setIdChannel($channel_id);

        $feed->setName($feed_info['title']);

        $feed->setDescription($feed_info['description']);

        $feed->setLink($feed_info['link']);

        $objectManager->persist($feed);

        $objectManager->flush();

        return 1;

    }

}