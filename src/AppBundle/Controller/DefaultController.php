<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @return Response
     * @Route("/ssl", name="ssl_path")
     */
    public function sslAction()
    {
        return new Response("This is seen if https");
    }


    /**
     * @Route("/profile", name="profile_page")
     */
    public function profileAction()
    {
        return $this->render('AppBundle::profile.html.twig', ['message' => 'Profile page for logged in user']);
    }
}
