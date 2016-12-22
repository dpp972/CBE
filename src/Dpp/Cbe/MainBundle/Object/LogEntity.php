<?php

namespace Dpp\Cbe\MainBundle\Object;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
trait LogEntity
{
    /**
     * @var \Dpp\Cbe\MainBundle\Entity\CbeUser
     *
     * @ORM\ManyToOne(targetEntity="CbeUser")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $owner;

    /**
     * @var \Dpp\Cbe\MainBundle\Entity\CbeUser
     *
     * @ORM\ManyToOne(targetEntity="CbeUser")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $modifier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    protected $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLastModif", type="date")
     */
    protected $dateLastModif;
}
