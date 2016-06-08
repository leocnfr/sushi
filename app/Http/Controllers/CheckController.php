<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

use App\Http\Requests;
use JMS\Payment\CoreBundle\Tests\Functional\TestBundle\Entity\Order;

class CheckController extends Controller
{
    //
    public function detailsAction(Order  $order)
    {
        $request = $this->get('request');
        $em = $this->get('doctrine')->getEntityManager();
        $router = $this->get('router');
        $ppc = $this->get('payment.plugin_controller');

        $confirm = new \StdClass();

        $form = $this->createFormBuilder($confirm)
            ->add('save', 'submit', array('label' => 'confirmer'))
            ->getForm();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $instruction = new PaymentInstruction($order->getAmount(), 978, 'sips');

                $ppc->createPaymentInstruction($instruction);

                $order->setPaymentInstruction($instruction);
                $em->persist($order);
                $em->flush($order);

                return new RedirectResponse($router->generate('payment_gateway', array(
                    'id' => $order->getId(),
                )));
            }
        }

        return array(
            'order' => $order,
            'form' => $form->createView()
        );
    }
}
