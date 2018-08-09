<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EventType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
			$builder
				->add('name', TextType::class)
				->add('image', TextType::class)
				->add('description', TextType::class)
				->add('datetime', DateTimeType::class)
				->add('capacity', IntegerType::class)
				->add('address', TextType::class)
				->add('url', TextType::class)
				->add('phoneNumber', TextType::class)
				->add('email', TextType::class)
				->add('type', TextType::class)
				->add('save', SubmitType::class);
	}	
}