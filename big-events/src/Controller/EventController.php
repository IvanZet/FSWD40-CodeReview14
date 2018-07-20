<?php
namespace App\Controller;

use App\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller {
	
	//Show all the events from DB
	/**
	 * @Route("/events", name="events")
	 */
	public function showAll () {
		$repository = $this->getDoctrine()->getRepository(Event::class);
		$events = $repository->findAll();

		if (!$events) {
			throw $this->createNotFoundException('No events found in DB');
		}

		return $this->render('events/show_events.html.twig', ['events' => $events]);
	}

	/**
	 * @Route("details/{id}", name="details")
	 */
	public function showDetails ($id) {
		$details = $this->getDoctrine()->getRepository(Event::class)->find($id);
		
		if (!$details) {
			throw $this->createNotFoundException('Event not found for ID: ' . $id);
		}

		return $this->render('events/show_details.html.twig', ['details' => $details]);
	}
}