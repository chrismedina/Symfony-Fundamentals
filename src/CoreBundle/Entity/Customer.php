<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ramsey\Uuid\UuidInterface;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * Customer
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\CustomersRepository")
 */
class Customer
{

    const STATUSES = array( 'new', 'pending', 'in review', 'approved', 'inactive', 'deleted' );

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id;

    /**
     * The internal primary identity key.
     *
     * @var UuidInterface|null
     *
     * @ORM\Column(type="uuid", unique=true)
     *
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=100, options={"default": "new"})
     *
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
     * @var string
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Product", mappedBy="customer")
     */
    private $products;


    public function __construct() {
        $this->products = new ArrayCollection();
    }

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
     * Set uuid.
     *
     * @param UuidInterface|null $uuid
     *
     * @return Customer
     */
    public function setUuid( UuidInterface $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid.
     *
     * @return UuidInterface|null
     */
    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dateOfBirth.
     *
     * @param \DateTime $dateOfBirth
     *
     * @return Customer
     */
    public function setDateOfBirth( \DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth.
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set status.
     * new, pending, in review, approved, inactive, deleted.
     * @param string $status
     *
     * @return Customer
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
     * @return Customer
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
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
     * @return Customer
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

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
     * @return Customer
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

    /**
     * Set products.
     *
     * @param string $products
     *
     * @return Customer
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products.
     *
     * @return string
     */
    public function getProducts()
    {
        return $this->products;
    }
}
