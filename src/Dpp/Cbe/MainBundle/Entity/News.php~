<?php

namespace Dpp\Cbe\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * News
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dpp\Cbe\MainBundle\Entity\NewsRepository")
 */
class News
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="mediafile", type="string", length=255)
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/gif", "image/png" })
     */
    private $mediafile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showTitre", type="boolean")
     */
    private $showTitre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showDescription", type="boolean")
     */
    private $showDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showDate", type="boolean")
     */
    private $showDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showNote", type="boolean")
     */
    private $showNote;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showTitreOnHover", type="boolean")
     */
    private $showTitreOnHover;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showDescriptionOnHover", type="boolean")
     */
    private $showDescriptionOnHover;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showDateOnHover", type="boolean")
     */
    private $showDateOnHover;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showNoteOnHover", type="boolean")
     */
    private $showNoteOnHover;

    /**
     * @var
     *
     * @ORM\OneToOne(targetEntity="Article", cascade="persist")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return News
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return News
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set mediafile
     *
     * @param string $mediafile
     * @return News
     */
    public function setMediafile($mediafile)
    {
        $this->mediafile = $mediafile;

        return $this;
    }

    /**
     * Get mediafile
     *
     * @return string 
     */
    public function getMediafile()
    {
        return $this->mediafile;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return News
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set showTitre
     *
     * @param boolean $showTitre
     * @return News
     */
    public function setShowTitre($showTitre)
    {
        $this->showTitre = $showTitre;

        return $this;
    }

    /**
     * Get showTitre
     *
     * @return boolean 
     */
    public function getShowTitre()
    {
        return $this->showTitre;
    }

    /**
     * Set showDescription
     *
     * @param boolean $showDescription
     * @return News
     */
    public function setShowDescription($showDescription)
    {
        $this->showDescription = $showDescription;

        return $this;
    }

    /**
     * Get showDescription
     *
     * @return boolean 
     */
    public function getShowDescription()
    {
        return $this->showDescription;
    }

    /**
     * Set showDate
     *
     * @param boolean $showDate
     * @return News
     */
    public function setShowDate($showDate)
    {
        $this->showDate = $showDate;

        return $this;
    }

    /**
     * Get showDate
     *
     * @return boolean 
     */
    public function getShowDate()
    {
        return $this->showDate;
    }

    /**
     * Set showNote
     *
     * @param boolean $showNote
     * @return News
     */
    public function setShowNote($showNote)
    {
        $this->showNote = $showNote;

        return $this;
    }

    /**
     * Get showNote
     *
     * @return boolean 
     */
    public function getShowNote()
    {
        return $this->showNote;
    }

    /**
     * Set showTitreOnHover
     *
     * @param boolean $showTitreOnHover
     * @return News
     */
    public function setShowTitreOnHover($showTitreOnHover)
    {
        $this->showTitreOnHover = $showTitreOnHover;

        return $this;
    }

    /**
     * Get showTitreOnHover
     *
     * @return boolean 
     */
    public function getShowTitreOnHover()
    {
        return $this->showTitreOnHover;
    }

    /**
     * Set showDescriptionOnHover
     *
     * @param boolean $showDescriptionOnHover
     * @return News
     */
    public function setShowDescriptionOnHover($showDescriptionOnHover)
    {
        $this->showDescriptionOnHover = $showDescriptionOnHover;

        return $this;
    }

    /**
     * Get showDescriptionOnHover
     *
     * @return boolean 
     */
    public function getShowDescriptionOnHover()
    {
        return $this->showDescriptionOnHover;
    }

    /**
     * Set showDateOnHover
     *
     * @param boolean $showDateOnHover
     * @return News
     */
    public function setShowDateOnHover($showDateOnHover)
    {
        $this->showDateOnHover = $showDateOnHover;

        return $this;
    }

    /**
     * Get showDateOnHover
     *
     * @return boolean 
     */
    public function getShowDateOnHover()
    {
        return $this->showDateOnHover;
    }

    /**
     * Set showNoteOnHover
     *
     * @param boolean $showNoteOnHover
     * @return News
     */
    public function setShowNoteOnHover($showNoteOnHover)
    {
        $this->showNoteOnHover = $showNoteOnHover;

        return $this;
    }

    /**
     * Get showNoteOnHover
     *
     * @return boolean 
     */
    public function getShowNoteOnHover()
    {
        return $this->showNoteOnHover;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return News
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return News
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set article
     *
     * @param \Dpp\Cbe\MainBundle\Entity\Article $article
     * @return News
     */
    public function setArticle(\Dpp\Cbe\MainBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Dpp\Cbe\MainBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
}
