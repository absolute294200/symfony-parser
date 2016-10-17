<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rss
 *
 * @ORM\Table(name="rss")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\RssRepository")
 */
class Rss
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="UserRss", mappedBy="rss")
     */
    private $channels;

    public function __construct()
    {

        $this->channels = new ArrayCollection();

    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Rss
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Rss
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param mixed $channels
     * @return Rss
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
        return $this;
    }

    /**
     * @param UserRss $channels
     */
    public function deleteChannel(UserRss $channel)
    {
        $this->channels->remove($channel);
    }



}

