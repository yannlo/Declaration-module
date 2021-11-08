<?php

namespace YannLo\Basic\Modules\Users\Apps;

use YannLo\Basic\Modules\Tools\Apps\Account;

/**
 * User
 */
class User extends Account
{

    // variables
    private string $cni;
    private string $address;
    private string $phoneNumber;

    // constants
    public const VISTIM = "victim";
    public const WITNESS = "witness";
    public const ALL = "victim, witness";

    // traits
    use \YannLo\Basic\Modules\Tools\Apps\Hydration;

    // constructor
    public function __construct(array $data = [])
    {
        $this -> hydrate($data);
    }

    //getters
    public function cni(): string
    {
        return $this->cni;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function phoneNumber(): string
    {
        return $this->phoneNumber;
    }

    // setters
    public function setCni(string $cni): void
    {
        if (preg_match('/[a-zA-Z][0-9]{10}/', $cni) <= 0) {
            throw new \InvalidArgumentException('invalid CNI');
            return;
        }

        $this -> cni = $cni;
    }

    public function setAddress(string $address): void
    {
        if (preg_match_all('/[\w+\-\'\ ]+,*/', $address) < 3) {
            throw new \InvalidArgumentException('invalid address format');
            return;
        }

        $this -> address = $address;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        if (preg_match('/[0-9]{10}/', $phoneNumber) <= 0) {
            throw new \InvalidArgumentException('invalid phone number size');
            return;
        }
        if (!in_array(substr($phoneNumber, 0, 2), ["01","05","O7"])) {
            throw new \InvalidArgumentException('invalid phone number prefix');
            return;
        }
        $this -> phoneNumber = $phoneNumber;
    }
}
