<?php
    /**
     * Created by PhpStorm.
     * User: thelinhuk
     * Date: 03/01/2016
     * Time: 23:25
     */

    namespace POSBundle\Controller;

    use POSBundle\Entity\Category;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Request;
    use POSBundle\Entity\Item;
    use POSBundle\Form\CategoryType;
    use POSBundle\Form\CategoryRemoveType;




    class POSAdminController extends Controller
    {
        function manageItemAction(Request $request)
        {

            // Build the form
            // Handle the submit - POST

            $category = new Category();
            $form = $this->createForm(CategoryType::class ,$category);
            $form->handleRequest($request);

            $categoryOne = new Category();
            $categoryOne->setName('Test');
            $form_remove = $this->createForm(CategoryRemoveType::class ,$categoryOne);
            $form_remove->handleRequest($request);



            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();

                $this->addFlash('notice', 'Congratulations, your action succeeded!');
                return $this->redirectToRoute('pos_admin');
            }

            return $this->render('POSBundle:Default:admin.html.twig',
                    array('form' => $form->createView(),
                          'form_remove'=> $form_remove->createView() )
                );

        }


        /**
         * Get categories
         *
         * @return array category
         */
        function getCategoryList()
        {
            $category = $this->getDoctrine()
                ->getRepository('POSBundle:Category')
                ->findAll();
            if (!$category) {
                throw $this->createNotFoundException(
                    'No Cateogry is avaiable '
                );
            } else {
                return $category;
            }

        }

        /**
         *
         */
        function deleteCategory($categories)
        {
//            $item = '';
//
//            $em = $this->getDoctrine()->getManager();
//
//            if (!$categories)
//            {
//                throw $this->createNotFoundException(
//                    'No Cateogry is availabe for deletion'
//                );
//
//            } else {
//                foreach ($categories as $category )
//                {
//                    $em = $this->getDoctrine()->getManager();
//                    $item = $em->getRepository('POSBundle:Categories')->find($category->getId());
//                    dump($item);
//                    dump($category->getId());
//                    $em->remove($item);
//                    $em->flush();
//                }
//            }


        }


    }


?>