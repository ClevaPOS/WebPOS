<?php
    namespace  POSBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Response;


    class FrontDisplayController extends Controller
    {
        function messageAction()
        {
            return new Response(
                '<html><body>Test</body></html>'
            );

        }
    }



?>