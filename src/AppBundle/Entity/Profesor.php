<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Profesor
 *
 * @ORM\Table(name="profesor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProfesorRepository")
 */
class Profesor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=512)
     */
    private $apellidos;

    /**
     * Un profesor tiene muchas asignaturas.
     * @ORM\OneToMany(targetEntity="Asignatura", mappedBy="profesor")
     */
    private $asignaturas;

    public function __construct() {
        $this->asignaturas = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Profesor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Profesor
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Add asignatura
     *
     * @param \AppBundle\Entity\Asignatura $asignatura
     *
     * @return Profesor
     */
    public function addAsignatura(\AppBundle\Entity\Asignatura $asignatura)
    {
        $this->asignaturas[] = $asignatura;

        return $this;
    }

    /**
     * Remove asignatura
     *
     * @param \AppBundle\Entity\Asignatura $asignatura
     */
    public function removeAsignatura(\AppBundle\Entity\Asignatura $asignatura)
    {
        $this->asignaturas->removeElement($asignatura);
    }

    /**
     * Get asignaturas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaturas()
    {
        return $this->asignaturas;
    }

    public function __toString(){
      return $this->nombre;
    }
}
