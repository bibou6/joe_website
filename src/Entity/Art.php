<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtRepository")
 * @Vich\Uploadable
 */
class Art
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medium;
    
    /**
     * @ORM\Column(type="float")
     */
    private $height;
    
    /**
     * @ORM\Column(type="float")
     */
    private $width;
    
    /**
     * @ORM\Column(type="float")
     */
    private $price;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $available;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;
    
    
    /**
     * @Vich\UploadableField(mapping="art_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;
    
    public function __construct(){
    	$this->updatedAt = new \Datetime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    
    public function getMedium(): ?string
    {
    	return $this->medium;
    }
    
    public function setMedium(string $medium): self
    {
    	$this->medium = $medium;
    	
    	return $this;
    }
    
    public function getHeight(): ?float
    {
    	return $this->height;
    }
    
    public function setHeight(float $height): self
    {
    	$this->height = $height;
    	
    	return $this;
    }
    
    public function getWidth(): ?float
    {
    	return $this->width;
    }
    
    public function setWidth(float $width): self
    {
    	$this->width = $width;
    	
    	return $this;
    }
    
    
    public function getPrice(): ?float
    {
    	return $this->price;
    }
    
    public function setPrice(float $price): self
    {
    	$this->price = $price;
    	
    	return $this;
    }
    
    
    public function getAvailable()
    {
    	return $this->available;
    }
    
    public function setAvailable($available): self
    {
    	$this->available = $available;
    	
    	return $this;
    }
        
    public function setImageFile(File $image = null)
    {
    	$this->imageFile = $image;
    	
    	// VERY IMPORTANT:
    	// It is required that at least one field changes if you are using Doctrine,
    	// otherwise the event listeners won't be called and the file is lost
    	if ($image) {
    		// if 'updatedAt' is not defined in your entity, use another property
    		$this->updatedAt = new \Datetime('now');
    	}
    }
    
    public function getImageFile()
    {
    	return $this->imageFile;
    }
    
    public function setImage($image)
    {
    	$this->image = $image;
    }
    
    public function getImage()
    {
    	return $this->image;
    }
    
    public function getUpdatedAt(){
    	return $this->updatedAt;
    }
    
    public function setUpdateAt(){
    	$this->updateAt = new \DateTime('now');
    }
    
    public function getSize(): ?string
    {
    	return $this->getHeight().'\'x'.$this->getWidth().'\'';	
    }
}
