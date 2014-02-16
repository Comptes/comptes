<?php

namespace Yomen\AccountsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/* BaseEntity contains commons fields that are used by all Yomen entities To do
so, BaseEntity must be extended by other entities, using the Sinle tabel inheritance scheme, provided by Doctrine 
(http://docs.doctrine-project.org/en/2.0.x/reference/inheritance-mapping.html#single-table-inheritance) */

/**
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"account" = "\Yomen\AccountsBundle\Entity\Account", 
 *   "operation" = "\Yomen\AccountsBundle\Entity\Operation",
 *   "category" = "\Yomen\CategoryBundle\Entity\Category"
 * })
 */
class BaseEntity
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime")
     */
    private $createdOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_on", type="datetime")
     */
    private $modifiedOn;

    /**
     * @ORM\ManyToOne(targetEntity="\Yomen\UserBundle\Entity\User", inversedBy="items")
     */
    private $owner;

    public function __construct(){

        $this->createdOn = new \Datetime();  // Set creation datetime to "now" when entity is created
        $this->modifiedOn = new \Datetime(); // Set last modification datetime to "now" when entity is created
    }
    public function __toString(){
        return $this->name;
    }
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
     * Set name
     *
     * @param string $name
     * @return BaseEntity
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
     * Set description
     *
     * @param string $description
     * @return BaseEntity
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
     * Set createdOn
     *
     * @param \DateTime $createdOn
     * @return BaseEntity
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime 
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set modifiedOn
     *
     * @param \DateTime $modifiedOn
     * @return BaseEntity
     */
    public function setModifiedOn($modifiedOn)
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }

    /**
     * Get modifiedOn
     *
     * @return \DateTime 
     */
    public function getModifiedOn()
    {
        return $this->modifiedOn;
    }

    /**
     * Add owner
     *
     * @param \Yomen\UserBundle\User $owner
     * @return BaseEntity
     */
    public function addOwner(\Yomen\UserBundle\User $owner)
    {
        $this->owner[] = $owner;

        return $this;
    }

    /**
     * Remove owner
     *
     * @param \Yomen\UserBundle\User $owner
     */
    public function removeOwner(\Yomen\UserBundle\User $owner)
    {
        $this->owner->removeElement($owner);
    }

    /**
     * Get owner
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set owner
     *
     * @param \Yomen\UserBundle\Entity\User $owner
     * @return BaseEntity
     */
    public function setOwner(\Yomen\UserBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    // Return True if given user is owner of this entity
    public function is_owner($user) {
        if ($this->getOwner() == $user){
            return true;
        }
        else {
            return false;
        }
    }
}
