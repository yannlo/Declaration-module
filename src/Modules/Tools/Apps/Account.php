<?php

namespace YannLo\Basic\Modules\Tools\Apps;

abstract class Account
{

    //variables
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $password;


    //Traits
    use \YannLo\Basic\Modules\Tools\Apps\NameVerified;

    // getters
    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    // setters
    public function setFirstName(string $firstName): void
    {
        $this -> verfierName($firstName);

        $this -> firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this -> verfierName($lastName);

        $this -> lastName = $lastName;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('invalid address format');
            return;
        }

        $this ->email = $email;
    }

    public function setPassword(string $password): void
    {
        dd(strlen($password));
        if (strlen($password) !== 255) {
            if (strlen($password) > 16 || strlen($password) < 8) {
                throw new \InvalidArgumentException('invalid registration number');
                return;
            }

            if (preg_match("/([A-Za-z\d@$!%*?&]{8,16}/", $password)) {
                throw new \InvalidArgumentException('invalid registration number');
                return;
            }
        }
        $this -> password = $password;
    }
}
