<?php
namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
	public function showAll () {
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
	public function showDetails ($id) {
		$details = $this->getDoctrine()->getRepository(Event::class)->find($id);
		
		if (!$details) {
			throw $this->createNotFoundException('Event not found for ID: ' . $id);
		}

		return $this->render('events/show_details.html.twig', ['details' => $details]);
	}

	/**
	 * @Route ("/add", name="add")
	 */
	public function addEvent (Request $request) {

		$event = new Event();

		//Writing input fields here manually
		/*$event->setName('Lorem ipsum');
		$event->setImage('http://via.placeholder.com/350x150');
		$event->setDescription('Curabitur in blandit ante. Aliquam eu urna eleifend nunc rhoncus dapibus ac at erat. Pellentesque sed ligula ligula. Praesent velit enim, efficitur non mi non, accumsan pellentesque metus. Sed maximus tempor porta. Mauris accumsan massa nec aliquam lacinia. Aliquam ac augue sit amet elit bibendum varius a sed ex. Suspendisse et facilisis urna. Praesent finibus nunc viverra tellus porttitor ultricies in at mi. Duis accumsan volutpat ipsum, ultrices laoreet risus.');
		$event->setDateTime(new \DateTime('tomorrow'));
		$event->setCapacity(100);
		$event->setAddress('12 Meiereistraße, 1020 Wien');
		$event->setUrl('https://www.lipsum.com');
		$event->setPhoneNumber('+43 600 5554444');
		$event->setEmail('event@mail.com');
		$event->setType('theatre');*/

		$form = $this->createFormBuilder($event)
			->add('name', TextType::class)
			->add('image', TextType::class)
			->add('description', TextType::class)
			->add('datetime', DateType::class)
			->add('capacity', IntegerType::class)
			->add('address', TextType::class)
			->add('url', TextType::class)
			->add('phoneNumber', TextType::class)
			->add('email', TextType::class)
			->add('type', TextType::class)
			->add('save', SubmitType::class, array('label' => 'Create event'))
			->getForm();
		
			$form->handleRequest($request);

			if ($form->isSubmitted()) { //!!! && $form->isValid()
				// $form->getData() holds the submitted values
        // but, the original `$event` variable has also been updated
        $event = $form->getData();

      // Save the event to the database
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($event);
      $entityManager->flush();

      return $this->redirectToRoute('events');
			}

		return $this->render('events/add_event.html.twig', array('form' => $form->createView()));
	}
}