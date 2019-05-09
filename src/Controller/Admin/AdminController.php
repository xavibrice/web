<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Form\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @return Response
     * @Route("/admin", name="admin")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $blog = new Blog();
        $blog->setTranslatableLocale($request->getLocale());

        $form = $this->createForm(BlogType::class, $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($blog);
            $em->flush();

            $this->addFlash('success', 'Blog creado correctamente');
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
