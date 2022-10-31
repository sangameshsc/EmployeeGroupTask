<?php
namespace Codilar\Gtask\Api\Data;

interface EmpInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getFirstname();

    /**
     * @return mixed
     */
    public function getLastname();

    /**
     * @param $date
     * @return mixed
     */

    public function getEmail();

    /**
     * @param $date
     * @return mixed
     */
    public function getPhone();

    /**
     * @param $date
     * @return mixed
     */
    public function setFirstname($firstname);

    /**
     * @param $lastnme
     * @return mixed
     */
    public function setLastname($lastnme);
/**
     * @param $email
     * @return mixed
     */

    public function setEmail($email);

    /**
     * @param $phone
     * @return mixed
     */
   
     public function setPhone($phone);

    
}