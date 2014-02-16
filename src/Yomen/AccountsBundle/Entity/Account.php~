<?php

namespace Yomen\AccountsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Yomen\AccountsBundle\Entity\BaseEntity;

/* An account represente a bank account in real life */

/**
 * Account
 * @ORM\Entity
 */

class Account extends BaseEntity
{
    
    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=255)
     */
    private $iban; // Used to store International Bank Account Number


    /**
     * Set iban
     *
     * @param string $iban
     * @return Account
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string 
     */
    public function getIban()
    {
        return $this->iban;
    }
}
