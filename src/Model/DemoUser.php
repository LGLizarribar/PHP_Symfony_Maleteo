<?php


namespace App\Model;


class DemoUser
{
    private $name;
    private $email;
    private $city;
    private $policyAccept;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPolicyAccept()
    {
        return $this->policyAccept;
    }

    /**
     * @param mixed $policyAccept
     */
    public function setPolicyAccept($policyAccept): void
    {
        $this->policyAccept = $policyAccept;
    }

}