<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use CoreBundle\Entity\Feed;
use FeedIo\FeedIo;


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
     * @internal param FeedIo $feedIO
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
     * @param User $user
     * @return array
     * @throws \Exception
     */
    public function getFeeds(string $id_rss, User $user = null)
    {

        $rss = $this->doctrine->getRepository('CoreBundle:Rss')->findOneBy([
            'id' => $id_rss
        ]);

        $rss_user = $this->doctrine->getRepository('CoreBundle:UserRss')->findOneBy([
            'rss' => $rss,
            'user' => $user
        ]);

        if(!$rss_user)
            throw new \Exception("Not found", 404);

        $repository = $this->doctrine->getRepository('CoreBundle:Feed');

        $feed = $repository->findBy(array(
            'rss' => $rss_user->getRss()
        ));

        if(!$feed)
            throw new \Exception("", 204);

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

            $feeds = $this->feedIO->readSince($channel->getUrl(), $modifiedSince)->getFeed();

            $i = 0;

            foreach ($feeds as $feed) {

                if($this->checkUniqueFeed($feed->getLink())){

                    $feed_entity = new Feed();

                    $feed_entity->setLink($feed->getLink());

                    $feed_entity->setName($feed->getTitle());

                    $feed_entity->setDescription($feed->getDescription());

                    $feed_entity->setRss($channel);

                    $this->saveFeed($feed_entity);

                    $i++;


                }

            }

        }

        return $i;
    }

    /**
     * @param array $urls
     * @return boolean
     */
    public function checkUniqueFeed($link)
    {

        $repository = $this->doctrine->getRepository('CoreBundle:Feed');

        $feed = $repository->findOneBy(array(
            'link' => $link
        ));

        if($feed)
            return 0;
        else
            return 1;

    }

    /**
     * @param Feed $feed_info
     * @param integer $channel_id
     * @return boolean
     */
    public function saveFeed(Feed $feed)
    {

        $objectManager = $this->doctrine->getManager();

        $objectManager->persist($feed);

        $objectManager->flush();

        return 1;

    }

}