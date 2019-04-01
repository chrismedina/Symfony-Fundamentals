<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ProductsRepository")
 */
class Product
{
    const STATUSES = array( 'new', 'pending', 'in review', 'approved', 'inactive', 'deleted' );

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     *
     * @var int
     */
    private $issn;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, options={"default": "new"})
     * @var string
     */
    private $status = 'new';

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $deletedAt = null;

    /**
     * Many products have one customer. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="products")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set issn.
     *
     * @param int $issn
     *
     * @return Products
     */
    public function setIssn($issn)
    {
        $this->issn = $issn;

        return $this;
    }

    /**
     * Get issn.
     *
     * @return int
     */
    public function getIssn()
    {
        return $this->issn;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Products
     */
    public function setStatus($status)
    {
        if( !in_array( $status, self::STATUSES ) ){
            throw new \InvalidArgumentException("Invalid status type");
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Products
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        // WILL be saved in the database
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Products
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt.
     *
     * @param \DateTime $deletedAt
     *
     * @return Products
     */
    public function setDeletedAt(\DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt.
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}
