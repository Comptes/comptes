<?php

namespace Yomen\AccountsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Yomen\AccountsBundle\Entity\BaseEntity;
/**
 * Operation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yomen\AccountsBundle\Entity\OperationRepository")
 */
class Operation extends BaseEntity
{    

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;


    /**
     * Set value
     *
     * @param integer $value
     * @return Operation
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }
}
