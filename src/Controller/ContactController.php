<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer,ManagerRegistry $managerRegistry ): Response
    {
        $entityManager = $managerRegistry->getManager();

        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $email = (new Email())
                ->from($contact->getEmail())
                ->to('test@example.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject($contact->getMessage())
                ->text($contact->getNom())
                ->html('<p>Bonjour toi HTML integration!</p>');

            $mailer->send($email);

            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', 'Votre message a été envoyé');
            return $this->redirectToRoute('app_contact');

        }else{
            $this ->addFlash('danger','Il y a eut une erreur lors de l\'envoi du message');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' =>$form->createView()
        ]);
    }
}
