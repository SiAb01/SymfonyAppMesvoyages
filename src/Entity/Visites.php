<?php

namespace App\Entity;
use DateTime;
use DateTimeInterface;
use App\Repository\VisitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use  Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=VisitesRepository::class)
 */
class Visites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avis;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempmin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempmax;

    /**
     * @ORM\ManyToMany(targetEntity=Environnement::class)
     */
    private $environnements;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="visites", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function __construct()
    {
        $this->environnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(?\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getTempmin(): ?int
    {
        return $this->tempmin;
    }

    public function setTempmin(?int $tempmin): self
    {
        $this->tempmin = $tempmin;

        return $this;
    }

    public function getTempmax(): ?int
    {
        return $this->tempmax;
    }

    public function setTempmax(?int $tempmax): self
    {
        $this->tempmax = $tempmax;

        return $this;
    }

    public function getDatecreationString(): string
    {
        if($this->datecreation == null){
            return "";
        }else{
            return $this->datecreation->format('d/m/Y');
        }
    }

    /**
     * @return Collection<int, Environnement>
     */
    public function getEnvironnements(): Collection
    {
        return $this->environnements;
    }

    public function addEnvironnement(Environnement $environnement): self
    {
        if (!$this->environnements->contains($environnement)) {
            $this->environnements[] = $environnement;
        }

        return $this;
    }

    public function removeEnvironnement(Environnement $environnement): self
    {
        $this->environnements->removeElement($environnement);

        return $this;
    }
 
    //                  Getter setters pour les images

    function getImageFile(): ?File {
        return $this->imageFile;
    }

    function getImageName(): ?string {
        return $this->imageName;
    }

    
/**
 * Définit le fichier image associé à cette visite.
 *
 * @param File|null $imageFile Le fichier image à associer (ou null pour supprimer l'image actuelle).
 *
 * @return Visites L'objet visite courant pour permettre un enchaînement fluide des méthodes.
 */
function setImageFile(?File $imageFile): Visites {
    // Affecte la valeur de $imageFile à la propriété $imageFile de la visite courante.
    $this->imageFile = $imageFile;

    // Vérifie si $imageFile est une instance de la classe Symfony UploadedFile.
    if ($this->imageFile instanceof UploadedFile) {
        // Si c'est le cas, cela signifie qu'un nouveau fichier a été téléchargé.
        
        // Met à jour la propriété $updated_at avec la date et l'heure actuelles.
        $this->updated_at = new DateTime('now');
    }

    // Renvoie l'objet visite courant pour permettre un enchaînement fluide des méthodes.
    return $this;
}

    
    
   

    function setImageName(?string $imageName) {
        $this->imageName = $imageName;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }









    
    /**
     * Cette méthode est appelée automatiquement lors de la validation de l'entité Visites.
    * Elle vérifie si le fichier image associé à la visite respecte certaines contraintes.
     * 
     * @Assert\Callback
     * @param ExecutionContextInterface $context
     */
    public function validate(ExecutionContextInterface $context){
        $image = $this->getImageFile();
        if($image != null && $image != ""){
            $tailleImage = @getimagesize($image);
            if(!($tailleImage==false)){
                if($tailleImage[0]>1300 || $tailleImage[1]>1300){
                    $context->buildViolation("Cette image est trop grande (1300x1300 max)")
                            ->atPath('imageFile')
                            ->addViolation();
                }
            }else{
                $context->buildViolation("Ce n'est pas une image")
                        ->atPath('imageFile')
                        ->addViolation();
            }
        }
    }









}
