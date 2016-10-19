<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * UserRss
 *
 * @ORM\Table(name="user_rss")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\UserRssRepository")
 */
class UserRss
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="channels", cascade={"all"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Rss", inversedBy="channels", cascade={"all"})
     * @ORM\JoinColumn(name="rss_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $rss;


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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return UserRss
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRss()
    {
        return $this->rss;
    }

    /**
     * @param mixed $rss
     * @return UserRss
     */
    public function setRss($rss)
    {
        $this->rss = $rss;
        return $this;
    }


}

