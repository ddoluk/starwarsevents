<?php

namespace Yoda\EventBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Yoda\EventBundle\Reporting\EventReportManager;

class ReportController extends Controller
{
    /**
     * @Route("/events/report/recentlyUpdated.csv")
     */

    public function updatedEventsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $eventRepositoryManager = new EventReportManager($em);

        $content = $eventRepositoryManager->getRecentlyUpdatedReport();

        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/csv');

        return $response;
    }
}
