<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AsignaturaRepository")
 */
class Asignatura
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
     * @ORM\Column(name="nombre", type="string", length=512)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="acronimo", type="string", length=255)
     */
    private $acronimo;

    /**
     * Muchas asignaturas tienen un profesor.
     * @ORM\ManyToOne(targetEntity="Profesor", inversedBy="asignaturas")
     * @ORM\JoinColumn(name="profesor_id", referencedColumnName="id")
     */
    private $profesor;

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
     * @return Asignatura
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
     * Set acronimo
     *
     * @param string $acronimo
     *
     * @return Asignatura
     */
    public function setAcronimo($acronimo)
    {
        $this->acronimo = $acronimo;

        return $this;
    }

    /**
     * Get acronimo
     *
     * @return string
     */
    public function getAcronimo()
    {
        return $this->acronimo;
    }

    /**
     * Set profesor
     *
     * @param \AppBundle\Entity\Profesor $profesor
     *
     * @return Asignatura
     */
    public function setProfesor(\AppBundle\Entity\Profesor $profesor = null)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return \AppBundle\Entity\Profesor
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    public function __toString(){
      return $this->nombre;
    }
}
