<?php

class Product
{
    private $id;
    private $featured;
    private $name;
    private $image;
    private $price;
    private $amount;
    private $show;

    public function __construct(int $id, bool $featured, string $name, string $image, float $price, int $amount)
    {
        $this->id = $id;
        $this->featured = $featured;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->amount = $amount;
        $show = false;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of featured
     */ 
    public function isFeatured()
    {
        return $this->featured;
    }

    /**
     * Set the value of featured
     *
     * @return  self
     */ 
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get the value of show
     */ 
    public function isShow()
    {
        return $this->show;
    }

    /**
     * Set the value of show
     *
     * @return  self
     */ 
    public function setShow($show)
    {
        $this->show = $show;

        return $this;
    }
}
