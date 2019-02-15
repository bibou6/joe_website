<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @Vich\Uploadable
 */
class Product
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
    private $name;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;
    
    
    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
    		$this->setUpdateAt();
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
}
