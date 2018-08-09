<?php
namespace App\Controller;

use App\Form\EventType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller {
	
	//Show all the events from DB
	/**
	 * @Route("/events", name="events")
	 */
	public function showAllAction() {
		$repository = $this->getDoctrine()->getRepository(Event::class);
		$events = $repository->findAll();

		if (!$events) {
			throw $this->createNotFoundException('No events found in DB');
		}

		return $this->render('events/show_events.html.twig', ['events' => $events]);
	}

	/**
	 * @Route("/details/{id}", name="details")
	 */
	public function showDetailsAction($id) {
		$details = $this->getDoctrine()->getRepository(Event::class)->find($id);
		
		if (!$details) {
			throw $this->createNotFoundException('Event not found for ID: ' . $id);
		}

		return $this->render('events/show_details.html.twig', ['details' => $details]);
	}

	/**
	 * @Route ("/add", name="add")
	 */
	public function addAction(Request $request) {

		$event = new Event();

		// Create form from a custom form class
		$form = $this->createForm(EventType::class, $event);
		
		$form->handleRequest($request);

		/*if ($form->isSubmitted()) { //!!! && $form->isValid()
			// $form->getData() holds the submitted values
      // but, the original `$event` variable has also been updated
      $event = $form->getData();*/

    if ($form->isSubmitted() && $form->isValid()) { //!!! && $form->isValid()
    	$event = $form->getData();
	    // Save the event to the database
	    $entityManager = $this->getDoctrine()->getManager();
	    $entityManager->persist($event);
	    $entityManager->flush();

	    //Show info message
			$this->addFlash('notice', 'Event added');

	    return $this->redirectToRoute('events');
    }

		return $this->render('events/add_event.html.twig', array('form' => $form->createView()));
	}

	/**
	 * @Route("/edit/{id}", name="edit")
	 */
	public function editAction(Request $request, $id) {
		//Find the event to update
		$entityManager = $this->getDoctrine()->getManager();
		$event = $entityManager->getRepository(Event::class)->find($id);

		if (!$event) {
			throw $this->createNotFoundException('Event not found with ID: ' . $id);
		}

		//Read current values
		/*$event->setName($event->getName());
		$event->setImage($event->getImage());
		$event->setDescription($event->getDescription());
		$event->setDateTime($event->getDateTime());
		$event->setCapacity($event->getCapacity());
		$event->setAddress($event->getAddress());
		$event->setUrl($event->getUrl());
		$event->setPhoneNumber($event->getPhoneNumber());
		$event->setEmail($event->getEmail());
		$event->setType($event->getType());*/

		//Try to aupdate the event
		//Create form from a custom form class
		$form = $this->createForm(EventType::class, $event);

		//Request filled form
		$form->handleRequest($request);

		//Get data from form
		if ($form->isSubmitted() && $form->isValid()) { //!!! && $form->isValid()
    	//Read new values from form
			$name = $form['name']->getData();
			$image = $form['image']->getData();
			$description = $form['description']->getData();
			$dateTime = $form['datetime']->getData();
			$capacity = $form['capacity']->getData();
			$address = $form['address']->getData();
			$url = $form['url']->getData();
			$phoneNumber = $form['phoneNumber']->getData();
			$email = $form['email']->getData();
			$type = $form['type']->getData();

	    //Set new fields values !!! Set all the fields
    	$event->setName($name);
    	$event->setImage($image);
    	$event->setDescription($description);
    	$event->setDateTime($dateTime);
    	$event->setCapacity($capacity);
    	$event->setAddress($address);
    	$event->seturl($url);
    	$event->setPhoneNumber($phoneNumber);
    	$event->setEmail($email);
    	$event->setType($type);

			//Update DB record
			$entityManager->flush();

			//Show info message
			$this->addFlash('notice', 'Event updated');

			//Redirect to all events
	    return $this->redirectToRoute('events');
    }
		return $this->render('events/edit_event.html.twig', array('form' => $form->createView(), 'event' => $event)); 
	}

	/**
	 * @Route("/delete/{id}", name="delete")
	 */
	public function deleteAction(Request $request, $id) {
		// Find the vent to delte
		$entityManager = $this->getDoctrine()->getManager();
		$event = $entityManager->getRepository(Event::class)->find($id);

		// Check event to exist
		if (!$event) {
			throw $this->createNotFoundException('Event not found with ID: ' . $id);
		} else {
			// Delete the event
			$entityManager->remove($event);
			$entityManager->flush();

			//Show info message
			$this->addFlash('notice', 'Event deleted');
		}

		// Redirect to list of all evetns
		return $this->redirectToRoute('events');
	}
}