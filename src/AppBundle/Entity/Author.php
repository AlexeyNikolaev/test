<?php
namespace AppBundle\Entity;

use AppBundle\Entity\Book;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="\AppBundle\Entity\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var String
     *
     * @ORM\Column(name="first_name", type="string")
     */
    private $firstName;

    /**
     * @var String
     *
     * @ORM\Column(name="last_name", type="string")
     */
    private $lastName;


    /**
     * @var Book[]|ArrayCollection
     */
    private $books;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param String $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return String
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param String $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return Book[]|ArrayCollection
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param Book[]|ArrayCollection $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
