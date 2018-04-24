<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Auction
 *
 * @ORM\Table(name="auction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuctionRepository")
 */
class Auction
{
    const STATUS_ACTIVE = "active";
    const STATUS_FINISHED = "finished";
    const STATUS_CANCELLED = "cancelled";

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(name="starting_price", type="decimal", precision=10, scale=2)
     *
     * @var float
     *
     */
    private $startingPrice;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     *
     * @var \DateTime
     *
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="expires_at", type="datetime")
     *
     * @var \DateTime
     */
    private $expiresAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10)
     */
    private $status;

    /**
     * @var Offer[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Offer", mappedBy="auction")
     */
    private $offers;

    /**
     * Auction constructor.
     */
    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

// ********************************************** GETTERY SETTERY ************************************************

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status){
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * @param \DateTime $expiresAt
     * @return $this
     */
    public function setExpiresAt($expiresAt){
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt(){
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(){
        return $this->createdAt;
    }

    /**
     * @param $startingPrice
     * @return $this
     */
    public function setStartingPrice($startingPrice){
        $this->startingPrice = $startingPrice;

        return $this;
    }


    /**
     * @return float
     */
    public function getStartingPrice(){
        return $this->startingPrice;
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
     * Set title
     *
     * @param string $title
     *
     * @return Auction
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Auction
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
     * Set price
     *
     * @param string $price
     *
     * @return Auction
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return Offer[]|ArrayCollection
     */
    public function getOffers(){
        return $this->offers;
    }

    /**
     * @param Offer $offer
     * @return $this
     */
    public function addOffer(Offer $offer){
        $this->offers[] = $offer;

        return $this;
    }
}
