<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return new RedirectResponse($this->generateUrl('book_list'));
    }

    /**
     * @Route("/list", name="book_list")
     * @Template()
     */
    public function listAction()
    {
        return [
            'entities' => $this->getRepository()->findAll()
        ];
    }
    /**
     * @param Request $request
     *
     * @Route("/add", name="book_add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $entity = new Book();
        $form = $this->createForm(new BookType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($entity);
            $this->getDoctrine()->getManager()->flush();

            return new RedirectResponse($this->generateUrl('book_list'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @param Request $request
     *
     * @Route("/edit", name="book_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $entity = $this->getRepository()->find($id);
        $form = $this->createForm(new BookType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($entity);
            $this->getDoctrine()->getManager()->flush();

            return new RedirectResponse($this->generateUrl('book_list'));
        }

        return array('form' => $form->createView());
    }

    /**
     * @return EntityRepository
     */
    private function getRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository('AppBundle:Book');
    }
}
