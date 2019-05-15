<?php
/**
 * Created by PhpStorm.
 * User: sidatybrahim
 * Date: 2019-05-13
 * Time: 10:29
 */

namespace App\Entity;


class Scrap
{

    private $name;
    private $ref;
    private $image;
    private $description;
    private $price;
    private $brand;
    private $reviews;
    private $asin;

    /**
     * @return mixed
     */
    public function getAsin()
    {
        return $this->asin;
    }

    /**
     * @param mixed $asin
     */
    public function setAsin($asin): void
    {
        $this->asin = $asin;
    }

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
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref): void
    {
        $this->ref = $ref;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param mixed $reviews
     */
    public function setReviews($reviews): void
    {
        $this->reviews = $reviews;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        echo 'name=>' . $this->name . '<br> ref=>' . $this->ref . '<br>Asin=>' .$this->asin .'<br>Price=>'.
            $this->price . '<br>Brand=>' . $this->brand .'<br>Description=>' . $this->description . '<br>Image=>' . $this->image
            . '<br>note=>'. $this->reviews;

    }


}
